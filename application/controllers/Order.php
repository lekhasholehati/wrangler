<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Order extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

   	public function index()
    {
		$data['active']   = 'order';
    	$data['title'] 	  = 'Data Order';
		$data['data'] 	  = $this->m_admin->getOrder();

        $data['navbar']	  = 'layouts/navbar';
        $data['sidebar']  = 'layouts/sidebar';
        $data['content']  = 'data_order/index';
		$data['footer']   = 'layouts/footer';

        $this->load->view('layouts/master_view', $data);
    }

    public function resi()
    {
    	$data = [
    		'kode_order' => $this->input->post('kode_order'),
    		'email' => $this->input->post('email'),
    		'jasa_kirim' => $this->input->post('jasa_kirim'),
    		'no_resi' => $this->input->post('no_resi'),
            'tgl_kirim' => $this->input->post('tgl_kirim')
		];

    	$result = $this->db->insert('tbl_resi', $data);
            if ($result > 0) {
            	$update_resi = [
            		'status' => $data['no_resi']
            	];

            	$this->db->where('kode_order', $data['kode_order']);
            	$this->db->update('tbl_order', $update_resi);
            	
                $this->session->set_flashdata('message', 'Has Been Sent');
            } else {
                $this->session->set_flashdata('message', 'Has Not Been Sent');
            }
            redirect('order');
    }

    public function detailOrder($id)
    {
		$data['active']   = 'order';
    	$data['title'] 	  = 'Detail Order';
        $data['data'] 	  = $this->m_admin->getOrderById($id);

        $data['navbar']   = 'layouts/navbar';
        $data['sidebar']  = 'layouts/sidebar';
        $data['content']  = 'data_order/detail-order';
        $data['footer']   = 'layouts/footer';
        $this->load->view('layouts/master_view', $data);
	}
	
	public function print_order()
	{
		$data['active']     = 'order';
		$data['title']      = 'Laporan Penjualan';
		$data['data']       = $this->m_admin->getOrder();

		$this->load->view('data_order/print_order', $data);
	}

    public function deleteResi($id)
    {
        $id = $this->uri->segment(3);

        $result = $this->m_admin->deleteOrder($id);

        echo json_encode($result);
        die();

       if ($result > 0) {
            $this->session->set_flashdata('message', 'Has Been Deleted');
            // $this->session->set_flashdata('show', 'tampil data edit');
            } else {
                $this->session->set_flashdata('message', 'Has Not Been Deleted');
            }
            redirect('order');
    }

    public function get_province()
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ab4425544d2e9e15b675a9a93fec3ec2"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$data_provinsi  = [];

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$parse_decode = json_decode($response, true);
		  	$data_provinsi = $parse_decode['rajaongkir']['results'];
		}

		$data['title']		= "Data Provinsi";
		$data['data_provinsi']	= $data_provinsi;
		$data['navbar'] = 'layouts/navbar';
        $data['sidebar'] = 'layouts/sidebar';
        $data['content'] = 'data_order/data_provinsi';
        $data['footer'] = 'layouts/footer';
        $this->load->view('layouts/master_view', $data);

    }

    public function cek_ongkir()
    {
    	$origin = $this->input->post('kirim_dari');
    	$destination = $this->input->post('ke_provinsi');
    	$expedisi = $this->input->post('expedisi');
    	$weight = 1000;
		$curl = curl_init();

		$post_fields = "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$expedisi;
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_fields,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: ab4425544d2e9e15b675a9a93fec3ec2"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$parse_decode = json_decode($response, true);
		  echo json_encode($parse_decode['rajaongkir']['results'][0]['costs'][2]['cost']);
		}
    }
}
