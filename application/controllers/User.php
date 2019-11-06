<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	function __construct()
    {
        parent::__construct();
		$this->load->model(['m_admin', 'm_user']);
	}

	public function index()
	{
		$data['data_produk'] 	= $this->m_admin->getProduct();
		$data['header']			= 'frontend/header';
		$data['title']			= 'ALL PRODUCT';
		$data['content']	 	= 'frontend/home';
		$data['footer']	 	 	= 'frontend/footer';
		$this->load->view('frontend/master_view', $data);
	}
	
	public function kategori($kategori)
	{
		$data['data_produk'] 	= $this->m_admin->getProductByKategori($kategori);
		$data['header']			= 'frontend/header';
		$data['title']			= $kategori;
		$data['content']	 	= 'frontend/home';
		$data['footer']	 	 	= 'frontend/footer';
		$this->load->view('frontend/master_view', $data);
	}

	public function login_register()
	{
		$data['header']		 = 'frontend/header';
		$data['content']	 = 'frontend/login_register';
		$data['footer']	 	 = 'frontend/footer';
		$this->load->view('frontend/master_view', $data);
	}

	public function login()
	{
		if (!empty($this->session->userdata('email'))) {
			redirect('user/login_register');
		} else {
			if (!empty($this->input->post())) {
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
				$get_data = $this->m_user->check_login($email, $password);
				if ($get_data != NULL) {
					unset($get_data['password']);
					$this->session->set_userdata($get_data);
					$this->session->set_flashdata('simpan', 'Success Login');
				} else {
					$this->session->set_flashdata('gagal', 'Wrong Email/Password');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Wrong Email/Password');
			}
			redirect('user');
		}
	}

	public function register()
	{
		$data = [
			'email' 	=> $this->input->post('register-email'),
			'password' 	=> md5($this->input->post('register-password')),
			'nama'		=> $this->input->post('register-name'),
			'no_hp' 	=> $this->input->post('register-no_hp'),
			'alamat'	=> $this->input->post('register-alamat'),
			'image' 	=> str_replace(' ', '_', $_FILES['register-picture']['name']),
		];
		$get_email = $this->db->get_where('tbl_user', ['email' => $data['email']])->num_rows();
		if ($get_email > 0) {
			$this->session->set_flashdata('gagal', 'Email Already Exists');
		} else {
			$name = '';
			$path = './_assets/img/foto_profile';
			$file_name = $this->uploadImage('register-picture', $path, $name);

			$result = $this->db->insert('tbl_user', $data);
			if ($result > 0) {
				$this->session->set_flashdata('simpan', 'Success Register');
			} else {
				$this->session->set_flashdata('gagal', 'Failed Register');
			}
		}

		redirect('user/login_register');
	}

	public function my_account()
	{
		if (empty($this->session->userdata('email'))) {
			$this->session->set_flashdata('gagal', 'Please, Login/Register Your Account');
			redirect('user/login_register');
		} else {
			$email = $this->session->userdata('email');
			$get_data = $this->db->select('kode_order, date_order, status, total_harga')->where('email', $email)->order_by('date_order', 'desc')->get('tbl_order')->result_array();
	
			$data['data_order']	 = $get_data;
			$data['header']		 = 'frontend/header';
			$data['content']	 = 'frontend/my_account';
			$data['footer']	 	 = 'frontend/footer';
			$this->load->view('frontend/master_view', $data);
		}
	}

	public function update_account()
	{
		if (!empty($this->session->userdata())) {
			$id_user = $this->input->post('id_user');
			$password = $this->input->post('password');
			
			$data = [
				'nama' 		=> $this->input->post('nama'),
				'email' 	=> $this->input->post('email'),
				'alamat' 	=> $this->input->post('alamat'),
				'no_hp' 	=> $this->input->post('no_hp'),
				'image' 	=> str_replace(' ', '_', $_FILES['picture_profile']['name'])
			];

			if ($password != NULL || $password != "") {
				$data['password'] = md5($password);
			}

			if ($data['image'] == NULL || $data['image'] == "") {
				unset($data['image']);
			} else {
				$path 		= './_assets/img/foto_profile';
				$name		= '';
				$file_name 	= $this->uploadImage('picture_profile', $path, $name);
			}

			$this->db->where('id_user', $id_user);
			$result = $this->db->update('tbl_user', $data);
			if ($result > 0) {
				$unset = ['email', 'nama', 'image', 'alamat', 'no_hp'];
				$this->session->unset_userdata($unset);
				$this->session->set_userdata($data);
				$this->session->set_flashdata('simpan', 'Success Update Info Account');
			} else {
				$this->session->set_flashdata('Gagal', 'Failed Update Info Account');
			}

			redirect('user/my_account');
		}
	}

	public function get_stock()
	{
		$kode_barang = $this->input->post('kode_barang');
		$get_data = $this->db->select('size, total')->where('kode_barang', $kode_barang)->get('tbl_stock')->result_array();

		$result_data = [];
		$no = 0;

		foreach($get_data as $data){
			$result_data[$no]['size'] = str_replace('_', ' ', strtoupper($data['size']));
			$result_data[$no]['total'] = $data['total'];
			$no++;
		}
		echo json_encode($result_data);
	}

	public function add_cart()
	{
		$data = [
			'email'			=> $this->session->userdata('email'),
			'kode_cart'		=> kode_cart(),
			'kode_barang'	=> $this->input->post('kode_barang'),
			'qty'			=> $this->input->post('qty'),
			'size`'			=> $this->input->post('size'),
			'datetime'		=> date('d-m-Y H:i:d')
		];

		$this->db->insert('tbl_cart', $data);
	}

	public function get_cart()
	{
		$email = $this->input->post('email');
		$get_data = $this->db->join('tbl_product', 'tbl_product.kode_barang = tbl_cart.kode_barang')->where(['email' => $email, 'status' => 0])->get('tbl_cart')->result_array();
		echo json_encode($get_data);
	}

	public function delete_cart()
	{
		$kode_cart = $this->input->post('kode_cart');
		$this->db->where('kode_cart', $kode_cart);
		return $this->db->delete('tbl_cart');
	}

	public function checkout()
	{
		if (empty($this->session->userdata('email'))) {
			$this->session->set_flashdata('gagal', 'Please, Login/Register Your Account');
			redirect('user');
		} else {

			$email = $this->session->userdata('email');
			$get_data = $this->db->join('tbl_product', 'tbl_product.kode_barang = tbl_cart.kode_barang')->where(['email' => $email, 'status' => 0])->get('tbl_cart')->result_array();

			$data['data_checkout']	= $get_data;
			$data['header']		 = 'frontend/header';
			$data['content']	 = 'frontend/checkout';
			$data['footer']	 	 = 'frontend/footer';
			$this->load->view('frontend/master_view', $data);
		}
	}

	public function get_cost()
	{
		$shipping_address = $this->input->post('shipping_address');
		$expedisi = $this->input->post('expedisi');

    	$weight = 1000;
		$curl = curl_init();

		$post_fields = "origin=54&destination=".$shipping_address."&weight=".$weight."&courier=".$expedisi;
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
			$result = [
				'cost' => $parse_decode['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'],
				'estimate' => $parse_decode['rajaongkir']['results'][0]['costs'][1]['cost'][0]['etd'],
				'provinsi'	=>	 $parse_decode['rajaongkir']['destination_details']['province'],
				'kota'	=>	 $parse_decode['rajaongkir']['destination_details']['city_name'],
				'type'	=>	 $parse_decode['rajaongkir']['destination_details']['type']
			];
		  	echo json_encode($result);
		}
	}

	public function submit_checkout()
	{
		$id_cart = $this->input->post('id_cart');
		$data = [
			'kode_order'		=> kode_order(),
			'id_cart'			=> json_encode($id_cart),
			'nama_penerima'		=> $this->input->post('name'),
			'no_hp'				=> $this->input->post('no_hp'),
			'alamat_kirim'		=> $this->input->post('alamat'),
			'provinsi'			=> $this->input->post('provinsi'),
			'kota'				=> $this->input->post('kota'),
			'type'				=> $this->input->post('type'),
			'date_order'		=> date('d-m-Y H:i:s'),
			'email'				=> $this->session->userdata('email'),
			'ongkos_kirim'		=> $this->input->post('input_cost'),
			'estimasi'			=> $this->input->post('input_etd'),
			'total_harga'		=> $this->input->post('input_total_checkout'),
		];

		$result = $this->db->insert('tbl_order', $data);
		$insert_id = $this->db->insert_id();
		if ($result > 0) {
			foreach($id_cart as $id){
				$data_update['status']	= 1;
				$this->db->where('id_cart', $id);
				$this->db->update('tbl_cart', $data_update);

				$get_data_cart = $this->db->select('kode_barang, qty, size')->where('id_cart', $id)->get('tbl_cart')->row_array();

				$kode_barang_cart = $get_data_cart['kode_barang'];
				$cart_qty  = $get_data_cart['qty'];
				$cart_size = str_replace(' ', '_', strtolower($get_data_cart['size']));

				$get_total_stock = $this->db->select('total')->where(['kode_barang' => $kode_barang_cart, 'size' => $cart_size])->get('tbl_stock')->row_array();

				$update_stock['total'] = $get_total_stock['total'] - $cart_qty;
				$this->db->where(['kode_barang' => $kode_barang_cart, 'size' => $cart_size]);
				$this->db->update('tbl_stock', $update_stock);
			}

			$this->session->set_flashdata('simpan', 'Success Checkout. Mohon Lakukan Pembayaran');

			$get_rekening = $this->db->get_where('tbl_order', ['id_order' => $insert_id])->row_array();
			$data_parsing = [
				'kode_order'		=> $data['kode_order'],
				'email'				=> $data['email'],
				'jumlah_bayar'		=> $data['total_harga'],
				'ke_rekening'		=> $get_rekening['nama_bank']." ".$get_rekening['no_rekening']." a/n ".$get_rekening['nama_rekening'],
			];

			$data['data_pembayaran']	= $data_parsing;
			$data['header']		 		= 'frontend/header';
			$data['content']	 		= 'frontend/confirm_payment';
			$data['footer']	 	 		= 'frontend/footer';
			$this->load->view('frontend/master_view', $data);
		} else {
			$this->session->set_flashdata('Gagal', 'Failed Checkout');
			redirect('user/checkout');
		}
	}

	public function confirm_payment($kode_order)
	{
		// $id_order = $this->uri->segment(3);
		$get_data = $this->db->get_where('tbl_order', ['kode_order' => $kode_order])->row_array();
		$data_parsing = [
			'kode_order'		=> $get_data['kode_order'],
			'email'				=> $get_data['email'],
			'jumlah_bayar'		=> $get_data['total_harga'],
			'ke_rekening'		=> ucwords($get_data['nama_bank'])." ".$get_data['no_rekening']." a/n ".ucwords($get_data['nama_rekening']),
		];

		$data['data_pembayaran']	= $data_parsing;
		$data['header']		 		= 'frontend/header';
		$data['content']	 		= 'frontend/confirm_payment';
		$data['footer']	 	 		= 'frontend/footer';
		$this->load->view('frontend/master_view', $data);
	}

	public function submit_payment()
	{
		$data = [
			'kode_order'		=> $this->input->post('kode_order'),
			'email'				=> $this->input->post('email'),
			'jumlah_bayar'		=> $this->input->post('jumlah_bayar'),
			'dari_rekening'		=> strtolower($this->input->post('user_bank')). " " . $this->input->post('user_rekening')." a/n ".strtolower($this->input->post('rekening_name')),
			'ke_rekening'		=> strtolower($this->input->post('transfer_to')),
			'status_pembayaran'	=> 'Sudah Transfer',
			'keterangan'		=> 0
		];

		$path 		= './_assets/img/bukti_transfer';
		$name		= $data['kode_order'];
		$file_name 	= $this->uploadImage('files', $path, $name);
		
		if ($file_name == 'bukti_transfer') {
			redirect('user/my_account');
		}

		$data['file']	= $file_name;

		$result = $this->db->insert('tbl_transaksi', $data);
		if ($result > 0) {
			$this->session->set_flashdata('simpan', 'Success Upload File Transfer');
		} else {
			$this->session->set_flashdata('gagal', 'Failed Upload File Transfer');
		}
		redirect('user/my_account');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/login_register');
	}

	public function uploadImage($temp, $path, $name)
	{
		$config['upload_path']   = $path; 
		$config['allowed_types'] = 'jpg|png|jpeg'; 
		$config['max_size']      = 5048;
		$config['overwrite']     = true;
		$config['file_name']	 = $name;

		if ($name == '') {
			unset($config['file_name']);
		}

		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload($temp))
		{
			echo "gagal";
			die();
			$this->session->set_flashdata('error', "Swal.fire('ERROR', 'File too big', 'error')");
			if ($name == '') {
				redirect('user/login_register');
			} else {
				$return ="bukti_transfer";
				return $return;
			}
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			return $this->upload->data("file_name");   
		}

	}

	

	public function shirt()
	{
		$data['title'] = 'Shirt';

		$this->load->view('frontend/header');
		$this->load->view('frontend/shirt', $data);
        $this->load->view('frontend/footer');
	}

	public function tshirt()
	{
		$data['title'] = 'T-shirt';

		$this->load->view('frontend/header');
		$this->load->view('frontend/tshirt', $data);
        $this->load->view('frontend/footer');
	}

	public function bottom()
	{
		$data['title'] = 'Bottom';

		$this->load->view('frontend/header');
		$this->load->view('frontend/bottom', $data);
        $this->load->view('frontend/footer');
	}

	public function ladies()
	{
		$data['title'] = 'All Ladies';

		$this->load->view('frontend/header');
		$this->load->view('frontend/ladies', $data);
        $this->load->view('frontend/footer');
	}

	public function men()
	{
		$data['title'] = 'All Mens';

		$this->load->view('frontend/header');
		$this->load->view('frontend/men', $data);
        $this->load->view('frontend/footer');
	}

}