<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_user extends CI_Model {
    public function check_login($email, $password){
        return $this->db->where(['email' => $email, 'password' => $password])->get('tbl_user')->row_array();
    }
}