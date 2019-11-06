<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Product extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

 	public function index()
  {
      $data['active']   = 'product';
    	$data['title']    = 'Product Management';

      $data['data']     = $this->m_admin->getProduct();  
      $data['navbar']   = 'layouts/navbar';
      $data['sidebar']  = 'layouts/sidebar';
      $data['content']  = 'product/index';
      $data['footer']   = 'layouts/footer';
      $this->load->view('layouts/master_view', $data);
  }

  public function addProduct()
  {

  		$data['title'] = 'Add Product';

  		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim');
  		$this->form_validation->set_rules('nama', 'Product Name', 'required|trim');
  		// $this->form_validation->set_rules('image', 'Image', 'required|trim');
  		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
  		$this->form_validation->set_rules('warna', 'Warna', 'required|trim');
  		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');


      if ($this->form_validation->run() == false) {
        $data['active']      = 'product';
        $data['kode_produk'] = kode_produk();
        $data['navbar']      = 'layouts/navbar';
        $data['sidebar']     = 'layouts/sidebar';
        $data['content']     = 'product/add-product';
        $data['footer']      = 'layouts/footer';
        $this->load->view('layouts/master_view', $data);
      } else {
        $data = [
            'kode_barang' => $this->input->post('kode_barang', true),
            'nama' => $this->input->post('nama', true),
            'kategori' => $this->input->post('kategori', true),
            'image' => str_replace(' ', '_', $_FILES['image']['name']),
            'harga' => $this->input->post('harga', true),
            'warna' => $this->input->post('warna', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'created' => $this->session->userdata('kode_admin', true)
        ];

        $file_name = $this->uploadImage($_FILES['image']['tmp_name']);

        $result = $this->db->insert('tbl_product', $data);
        if ($result > 0) {
            $size = $this->input->post('size');
            $stock = $this->input->post('stock');
            $data_stock = [];
            $no = 0;
            foreach ($size as $siz) {
              $data_stock[$no]['kode_barang'] = $data['kode_barang'];
              $data_stock[$no]['size']  = $siz;
              $data_stock[$no]['total'] = $stock[$no];
              $no++;
            }

            $this->db->insert_batch('tbl_stock', $data_stock);
            $this->session->set_flashdata('message', 'Has Been Sent');
            // $this->session->set_flashdata('show', 'tampil data edit');
        } else {
            $this->session->set_flashdata('message', 'Has Not Been Sent');
        }
        redirect('product');
      }

  }

  public function editProduct()
  {
    $kode_barang = $this->uri->segment(3);
    $get_barang = $this->m_admin->getProdukByKodeBarang($kode_barang);
    
    $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim');
    $this->form_validation->set_rules('nama', 'Product Name', 'required|trim');
    // $this->form_validation->set_rules('image', 'Image', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
    $this->form_validation->set_rules('warna', 'Warna', 'required|trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

    if ($this->form_validation->run() == TRUE) {
      $data = [
        'kode_barang' => $this->input->post('kode_barang', true),
        'nama' => $this->input->post('nama', true),
        'kategori' => $this->input->post('kategori', true),
        'image' => str_replace(' ', '_', $_FILES['image']['name']),
        'harga' => $this->input->post('harga', true),
        'warna' => $this->input->post('warna', true),
        'deskripsi' => $this->input->post('deskripsi', true),
        'created' => $this->session->userdata('kode_admin', true)
      ];
      
      $kode_barang = $data['kode_barang'];
      if ($data['image'] == '') {
        unset($data['image']);
        unset($data['kode_barang']);
      } else {
        unset($data['kode_barang']);
        $file_name = $this->uploadImage($_FILES['image']['tmp_name']);
      }
      $this->db->where('kode_barang', $kode_barang);
      $result_update = $this->db->update('tbl_product', $data);

      if ($result_update > 0) {
        $id_stock = $this->input->post('id_stock');
        $size = $this->input->post('size');
        $stock = $this->input->post('stock');
        $data_stock = [];
        $no = 0;
        foreach ($size as $siz) {
          $data_stock[$no]['id_stock']    = $id_stock[$no];
          $data_stock[$no]['kode_barang'] = $kode_barang;
          $data_stock[$no]['kode_barang'] = $kode_barang;
          $data_stock[$no]['size']        = $siz;
          $data_stock[$no]['total']       = $stock[$no];
          $no++;
        }
          $this->db->update_batch('tbl_stock', $data_stock, 'id_stock');
          $this->session->set_flashdata('message', 'Has Been Sent');
        } else {
          $this->session->set_flashdata('message', 'Has Not Been Sent');
        }
      redirect('product');
    } else {
      $data['active']       = 'product';
      $data['title']        = 'Update Product';
      $data['navbar']       = 'layouts/navbar';
      $data['sidebar']      = 'layouts/sidebar';
      $data['data_produk']  = $get_barang;
      $data['content']      = 'product/update-product';
      $data['footer']       = 'layouts/footer';
      $this->load->view('layouts/master_view', $data);
    }
    
  }

  public function uploadImage()
  {
      $this->data['notification'] = '';
        $config['upload_path']   = './_assets/img/product'; 
        $config['allowed_types'] = 'jpg|png|jpeg'; 
        $config['max_size']      = 2048;
        $config['overwrite']     = true; 


      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('image'))
      {
          $this->session->set_flashdata('error', "Swal.fire('ERROR', 'File too big', 'error')");
          redirect('product/addProduct');
      }
      else
      {
          $data = array('upload_data' => $this->upload->data());
          return $this->upload->data("file_name");   
      }

  }

  public function deleteProduct()
  {
    $id = $this->uri->segment(3);

    $get_old_image = $this->db->get_where('tbl_product', ['id_product' => $id])->row_array()['image'];
      if ($get_old_image != 'default.jpg') {
        unlink(FCPATH . '_assets/img/product/' . $get_old_image);
      }
    $result = $this->m_admin->deleteProduct($id);

    if ($result > 0) {
      $this->session->set_flashdata('message', 'Has Been Deleted');
    } else {
      $this->session->set_flashdata('message', 'Has Not Been Deleted');
    }
    redirect('product');
  }

  






























}