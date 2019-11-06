<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_admin extends CI_Model {
                        
    public function simpan_admin($upload_foto)
    {
        $data = [
            'kode_admin'    => $this->input->post('kode_admin'),
            'nama_admin'    => $this->input->post('nama_admin'),
            'username'      => $this->input->post('username'),
            'password'      => md5($this->input->post('password')),
            'foto'          => $upload_foto
        ];
        
        return $this->db->insert('tbl_admin', $data);
    }

    public function edit_admin($foto)
    {
        $kode_admin = $this->input->post('edit_kode_admin');
        $password   = $this->input->post('edit_password');

        if ($password != NULL || $password != "") {
            $data = [
                'nama_admin'    => $this->input->post('edit_nama_admin'),
                'username'      => $this->input->post('edit_username'),
                'password'      => md5($this->input->post('edit_password')),
                'foto'          => $foto
            ];
        } else {
            $data = [
                'nama_admin'    => $this->input->post('edit_nama_admin'),
                'username'      => $this->input->post('edit_username'),
                'foto'          => $foto
            ];
        }
        
        $this->db->where('kode_admin', $kode_admin);
        return $this->db->update('tbl_admin', $data);
    }

    public function getProduct()
    {
        $data = $this->db->select('*')->from('tbl_product')->order_by('id_product', 'desc')->get()->result_array();
        return $data;
    }

    public function getProductByKategori($kategori)
    {
        $data = $this->db->select('*')->from('tbl_product')->where('kategori', $kategori)->order_by('id_product', 'desc')->get()->result_array();
        return $data;
    }

    public function getProdukByKodeBarang($kode_barang)
    {
      return $this->db->where('kode_barang', $kode_barang)->get('tbl_product')->row_array();
    }

    public function deleteProduct($id)
    {
      $this->db->where('kode_barang', $id);
      $data = $this->db->delete('tbl_product');

      $result = "";
      if ($data > 0) {
        $this->db->where('kode_barang', $id);
        $result = $this->db->delete('tbl_stock');
      } else {
        $result = "0";
      }
      return $result;
    }

    public function getOrder()
    {
      // $test = $this->db->select('*')->from('tbl_order')->join('tbl_user', 'tbl_order.email = tbl_user.email')->join('tbl_transaksi', 'tbl_transaksi.email = tbl_order.email', 'left')->where('keterangan', '1')->order_by('date_order', 'desc')->get()->result_array();

      return $this->db->query("SELECT * from tbl_order, tbl_user, tbl_transaksi WHERE tbl_order.email = tbl_user.email AND tbl_transaksi.kode_order = tbl_order.kode_order AND keterangan = 1 ORDER BY date_order DESC")->result_array();
    }

    public function getInvoice()
    {
        return $this->db->select('*, tbl_order.kode_order as kode')->join('tbl_transaksi', 'tbl_order.kode_order = tbl_transaksi.kode_order', 'left')->order_by('tbl_order.kode_order', 'desc')->get('tbl_order')->result_array();
    }

    public function getOrderById($id)
    {
      return $this->db->select('*, tbl_order.kode_order as kode')->where('tbl_order.id_order', $id)->join('tbl_transaksi', 'tbl_order.kode_order = tbl_transaksi.kode_order', 'left')->join('tbl_resi', 'tbl_order.kode_order = tbl_resi.kode_order', 'left')->get('tbl_order')->row_array();
    }

    public function deleteOrder($id)
    {
        $this->db->where('id_order', $id);
        $delete_order = $this->db->delete('tbl_order');
        if($delete_order > 0){
          $this->db->where('id_order', $id);
          $delete_transaksi = $this->db->delete('tbl_transaksi');
          if ($delete_transaksi > 0){
            $this->db->where('id_order', $id);
            $delete_resi = $this->db->delete('tbl_resi');
            if($delete_transaksi >0){
              return 1;
            }else{
              return 0;
            }
            if($delete_resi > 0){
              return 1;
            }else{
              return 0;
            }
          }else{
            return 0;
          }
        }

    }

}    
                        