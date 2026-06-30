<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailPesananModel;
use App\Models\MenuModel;
use Dompdf\Dompdf;

class DetailPesananController extends BaseController
{
    protected $detailPesananModel;
    protected $menuModel;

    function __construct()
    {
        helper('form');
        $this->detailPesananModel = new DetailPesananModel();
        $this->menuModel          = new MenuModel();
    }

public function index($pesanan_id = null)
{
    $user_id = session()->get('user_id');

    if (session()->get('role') === 'pelanggan') {
        $detail = $this->detailPesananModel
                       ->select('detail_pesanan.*')
                       ->join('pesanan', 'pesanan.id = detail_pesanan.pesanan_id')
                       ->where('pesanan.user_id', $user_id)
                       ->where('detail_pesanan.deleted_at', null)
                       ->findAll();
    } else {
        $detail = $pesanan_id
                    ? $this->detailPesananModel->getByPesanan($pesanan_id)
                    : $this->detailPesananModel
                           ->select('detail_pesanan.*, user.nama as nama_user')
                           ->join('pesanan', 'pesanan.id = detail_pesanan.pesanan_id')
                           ->join('user', 'user.id = pesanan.user_id')
                           ->findAll();
    }

    return view('detail_pesanan/index', [
        'pesanan_id' => $pesanan_id,
        'detail'     => $detail,
        'menu'       => $this->menuModel->findAll()
    ]);
}



    public function delete($id)
    {
        $detail = $this->detailPesananModel->find($id);
        $this->detailPesananModel->delete($id);

        return redirect()->to(base_url('detail_pesanan/' . $detail['pesanan_id'])) // ← strip bukan underscore
            ->with('success', 'Detail Pesanan Berhasil Dihapus');
    }
    public function download()
{
    $user_id = session()->get('user_id');

    if (session()->get('role') === 'pelanggan') {
        $detail = $this->detailPesananModel
                       ->select('detail_pesanan.*')
                       ->join('pesanan', 'pesanan.id = detail_pesanan.pesanan_id')
                       ->where('pesanan.user_id', $user_id)
                       ->where('detail_pesanan.deleted_at', null)
                       ->findAll();
    } else {
        $detail = $this->detailPesananModel->findAll();
    }

    $html = view('detail_pesanan/download_pdf', [
        'detail' => $detail
    ]);

    $filename = date('Y-m-d-H-i-s') . '-detail-pesanan.pdf';

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream($filename, [
        'Attachment' => true
    ]);
}
}