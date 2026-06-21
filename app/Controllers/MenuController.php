<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;

class MenuController extends BaseController
{
    protected $menuModel;

    function __construct()
    {
        helper('form');
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        return view('menu/index', [
            'menu' => $this->menuModel->findAll()
        ]);
    }

    public function create()
    {
        $fileFoto = $this->request->getFile('foto');

        $dataForm = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'kategori'  => $this->request->getPost('kategori'),
            'harga'     => $this->request->getPost('harga')
        ];

        if ($fileFoto && $fileFoto->getName() != '') {
            $fileName = $fileFoto->getRandomName();
            $fileFoto->move('img/', $fileName);
            $dataForm['foto'] = $fileName;
        }

        $this->menuModel->insert($dataForm);

        return redirect()->to(base_url('menu'))
            ->with('success', 'Data Menu Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dataMenu = $this->menuModel->find($id);

        $dataForm = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'kategori'  => $this->request->getPost('kategori'),
            'harga'     => $this->request->getPost('harga')
        ];

        if ($this->request->getPost('check') == 1) {
            if ($dataMenu['foto'] != '' && file_exists('img/' . $dataMenu['foto'])) {
                unlink('img/' . $dataMenu['foto']);
            }

            $fileFoto = $this->request->getFile('foto');

            if ($fileFoto->isValid()) {
                $fileName = $fileFoto->getRandomName();
                $fileFoto->move('img/', $fileName);
                $dataForm['foto'] = $fileName;
            }
        }

        $this->menuModel->update($id, $dataForm);

        return redirect()->to(base_url('menu'))
            ->with('success', 'Data Menu Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataMenu = $this->menuModel->find($id);

        if (!empty($dataMenu['foto']) && file_exists('img/' . $dataMenu['foto'])) {
            unlink('img/' . $dataMenu['foto']);
        }

        $this->menuModel->delete($id);

        return redirect()->to(base_url('menu'))
            ->with('success', 'Data Menu Berhasil Dihapus');
    }

    public function pesan($menu_id)
    {
        $pesananModel       = new PesananModel();
        $detailPesananModel = new DetailPesananModel();

        $dataMenu = $this->menuModel->find($menu_id);

        if (!$dataMenu) {
            return redirect()->to(base_url('home'))
                ->with('failed', 'Menu tidak ditemukan.');
        }

        $user_id = session()->get('user_id');
        $jumlah  = max(1, (int) $this->request->getPost('jumlah'));

        // Cari pesanan aktif milik user
        $pesanan = $pesananModel->where('user_id', $user_id)
                                ->where('status', 'pending')
                                ->first();

        if (!$pesanan) {
            $pesananModel->insert([
                'user_id'         => $user_id,
                'tanggal_pesanan' => date('Y-m-d H:i:s'),
                'total_bayar'     => 0,
                'status'          => 'pending'
            ]);
            $pesanan_id = $pesananModel->getInsertID();
        } else {
            $pesanan_id = $pesanan['id'];
        }

        // Cek apakah menu sudah ada di detail pesanan
        $detailAda = $detailPesananModel->where('pesanan_id', $pesanan_id)
                                        ->where('menu_id', $menu_id)
                                        ->first();

        if ($detailAda) {
            $jumlahBaru   = $detailAda['jumlah'] + $jumlah;
            $subtotalBaru = $dataMenu['harga'] * $jumlahBaru;

            $detailPesananModel->update($detailAda['id'], [
                'jumlah'   => $jumlahBaru,
                'subtotal' => $subtotalBaru
            ]);
        } else {
            $detailPesananModel->insert([
                'pesanan_id' => $pesanan_id,
                'menu_id'    => $menu_id,
                'nama_menu'  => $dataMenu['nama_menu'],
                'foto'       => $dataMenu['foto'] ?? null,
                'jumlah'     => $jumlah,
                'harga'      => $dataMenu['harga'],
                'subtotal'   => $dataMenu['harga'] * $jumlah
            ]);
        }

        // Update total bayar pesanan
        $allDetail  = $detailPesananModel->where('pesanan_id', $pesanan_id)->findAll();
        $totalBayar = array_sum(array_column($allDetail, 'subtotal'));
        $pesananModel->update($pesanan_id, ['total_bayar' => $totalBayar]);

        return redirect()->to(base_url('home'))
            ->with('success', $jumlah . 'x ' . $dataMenu['nama_menu'] . ' berhasil ditambahkan ke pesanan!');
    }
}