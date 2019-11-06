<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Auth extends CI_Controller {

    public function index()
    {
        $this->load->view('login');
    }

    public function check_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == FALSE) {
            redirect('auth');
        } else {
            $this->_sistem_login();
        }
    }

    private function _sistem_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $data_admin = $this->db->get_where('tbl_admin', ['username' => $username, 'password' => $password])->row_array();
        if ($data_admin) {
            if ($data_admin['password'] == $password) {
                $data_admin['administrator']    = "admin";
                $this->session->set_userdata($data_admin);
                redirect('page');
            } else {
                $this->session->set_flashdata('gagal', 'Kamu Gagal Login');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Kamu Gagal Login');
        }
        redirect('auth');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
                            