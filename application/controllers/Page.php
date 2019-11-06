<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Page extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        session_administrator();
    }

    public function index()
    {
        $array_data['product']  = $this->db->get('tbl_product')->num_rows();
        $array_data['order']    = $this->db->get('tbl_order')->num_rows();
        $array_data['user']     = $this->db->get('tbl_user')->num_rows();

        $data['active']     = 'dashboard';
        $data['navbar']     = 'layouts/navbar';
        $data['sidebar']    = 'layouts/sidebar';
        $data['data']       = $array_data;
        $data['content']    = 'dashboard';
        $data['footer']     = 'layouts/footer';
        $this->load->view('layouts/master_view', $data);
    }
    
    public function administrator()
    {
        $data['active']         = 'admin';
        $data['administrator']  = $this->db->get('tbl_admin')->result_array();
        $data['kode_admin']     = kode_admin();

        $data['navbar']         = 'layouts/navbar';
        $data['sidebar']        = 'layouts/sidebar';
        $data['content']        = 'admin/list';
        $data['footer']         = 'layouts/footer';

        $this->load->view('layouts/master_view', $data);
    }

    public function administrator_tambah()
    {
        $this->form_validation->set_rules('kode_admin', 'Kode Admin', 'trim|required');
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $upload_foto = $this->upload_foto();
            $result_insert = $this->m_admin->simpan_admin($upload_foto);
            if ($result_insert > 0) {
                $this->session->set_flashdata('simpan', 'Has Been Send');
            } else {
                $this->session->set_flashdata('gagal', 'Has Not Been Send');
            }
            redirect('page/administrator');
        } else {
            redirect('page/administrator');
        }
    }

    public function administrator_edit()
    {
        
        $this->form_validation->set_rules('edit_kode_admin', 'Kode Admin', 'trim|required');
        $this->form_validation->set_rules('edit_nama_admin', 'Nama Admin', 'trim|required');
        $this->form_validation->set_rules('edit_username', 'Username', 'trim|required');
        $this->form_validation->set_rules('edit_password', 'Password', 'trim');
        
        if ($this->form_validation->run() == TRUE) {
            $data['admin'] = $this->db->get_where('tbl_admin', ['kode_admin' => $this->input->post('kode_admin')])->row_array();
            $upload_foto = $_FILES['edit_foto']['name'];

            if ($upload_foto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './_assets/img/foto_profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('edit_foto')) {
                    $foto = $data['admin']['foto'];
                    if ($foto != 'default.jpg') {
                        unlink(FCPATH . '_assets/img/foto_profile/' . $foto);
                    }

                    $new_image = $this->upload->data('file_name');
                    $result_insert = $this->m_admin->edit_admin($new_image);
                    if ($result_insert > 0) {
                        $this->session->set_flashdata('simpan', 'Has Been Send');
                    } else {
                        $this->session->set_flashdata('gagal', 'Has Not Been Send');
                    }
                } echo "gagal";
            }

            redirect('page/administrator');
        } else {
            redirect('page/administrator');
        }
        
    }

    public function administrator_hapus()
    {
        $id_admin = $this->uri->segment(3);
        
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('tbl_admin');

        $this->session->set_flashdata('simpan', 'Has Been Deleted');
        redirect('page/administrator');
    }

    public function user()
    {
        $data['title']          = 'Data User';
        $data['active']         = 'user';
        $data['data']  = $this->db->get('tbl_user')->result_array();
        $data['navbar']         = 'layouts/navbar';
        $data['sidebar']        = 'layouts/sidebar';
        $data['content']        = 'data_user/list';
        $data['footer']         = 'layouts/footer';

        $this->load->view('layouts/master_view', $data);
    }

    public function upload_foto() {
		$config['upload_path'] 		= './_assets/img/foto_profile/';
		$config['allowed_types'] 	= 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] 		= 8048;
		$config['overwrite']		= TRUE;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('foto');
		
        $upload = $this->upload->data();
		return $upload['file_name'];
	}
}        
                            