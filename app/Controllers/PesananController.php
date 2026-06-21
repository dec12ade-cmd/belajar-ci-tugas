<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class PesananController extends BaseController
{
    protected $pesananModel;

    function __construct()
    {
        helper('form');
        $this->pesananModel = new PesananModel();
    }

    public function index()
{
    if (session()->get('role') === 'pelanggan') {
        $pesanan = $this->pesananModel
                        ->select('pesanan.*, user.nama as nama_user')
                        ->join('user', 'user.id = pesanan.user_id')
                        ->where('pesanan.user_id', session()->get('user_id'))
                        ->findAll();
    } else {
        $pesanan = $this->pesananModel
                        ->select('pesanan.*, user.nama as nama_user')
                        ->join('user', 'user.id = pesanan.user_id')
                        ->findAll();
    }

    return view('pesanan/index', ['pesanan' => $pesanan]);
}

    public function create()
    {
        $dataForm = [
            'user_id'         => $this->request->getPost('user_id'),
            'tanggal_pesanan' => $this->request->getPost('tanggal_pesanan'),
            'total_bayar'     => $this->request->getPost('total_bayar'),
            'status'          => $this->request->getPost('status') ?? 'pending'
        ];

        $this->pesananModel->insert($dataForm);

        return redirect()->to(base_url('pesanan'))
            ->with('success', 'Data Pesanan Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dataForm = [
            'user_id'         => $this->request->getPost('user_id'),
            'tanggal_pesanan' => $this->request->getPost('tanggal_pesanan'),
            'total_bayar'     => $this->request->getPost('total_bayar'),
            'status'          => $this->request->getPost('status')
        ];

        $this->pesananModel->update($id, $dataForm);

        return redirect()->to(base_url('pesanan'))
            ->with('success', 'Data Pesanan Berhasil Diubah');
    }

    public function delete($id)
    {
        $this->pesananModel->delete($id);

        return redirect()->to(base_url('pesanan'))
            ->with('success', 'Data Pesanan Berhasil Dihapus');
    }
}