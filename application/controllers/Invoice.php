<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Invoice extends CI_Controller {

function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

public function index()
{
    $data['active']     = 'invoice';
    $data['title']      = 'Data Invoice';
    $data['data']       = $this->m_admin->getInvoice();

    $data['navbar']     = 'layouts/navbar';
    $data['sidebar']    = 'layouts/sidebar';
    $data['content']    = 'data_invoice/index';
    $data['footer']     = 'layouts/footer';
    $this->load->view('layouts/master_view', $data);
}

public function detailInvoice($id)
{
    $data['active']  = 'invoice';
    $data['title']   = 'Detail Invoice';
    $data['data']    = $this->m_admin->getOrderById($id);

    $data['navbar']  = 'layouts/navbar';
    $data['sidebar'] = 'layouts/sidebar';
    $data['content'] = 'data_invoice/detail-invoice';
    $data['footer']  = 'layouts/footer';
    $this->load->view('layouts/master_view', $data);   
}

public function print_invoice($id)
{
    $data['active']     = 'invoice';
    $data['title']      = 'Invoice';
    $data['data']       = $this->m_admin->getOrderById($id);

    $this->load->view('data_invoice/print_invoice', $data);
}

public function detailPembayaran($id)
{
    $data['active']   = 'invoice';
    $data['title']    = 'Detail Pembayaran';
    $data['data']     = $this->m_admin->getOrderById($id);

    $data['navbar']   = 'layouts/navbar';
    $data['sidebar']  = 'layouts/sidebar';
    $data['content']  = 'data_invoice/detail-pembayaran';
    $data['footer']   = 'layouts/footer';
    $this->load->view('layouts/master_view', $data);
}

public function verifikasi($kode_order)
{
    $update_status_order['status']      = "Sedang Di Proses";
    $kode_order_first                   = $kode_order;
    $this->db->where('kode_order', $kode_order_first);
    $this->db->update('tbl_order', $update_status_order);

    $kode_order_transaksi               = $kode_order;
    $data_update['status_pembayaran']   = "Berhasil";
    $data_update['keterangan']          = 1;
    $this->db->where('kode_order', $kode_order_transaksi);
    $result = $this->db->update('tbl_transaksi', $data_update);
    if ($result > 0) {
        $this->session->set_flashdata('simpan', 'Success Verifikasi Kode Order '. $kode_order);
    } else {
        $this->session->set_flashdata('gagal', 'Failed Verifikasi Kode Order '. $kode_order);
    }

    redirect('invoice');
}















}