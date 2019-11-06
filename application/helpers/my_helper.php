<?php 

    function session_administrator() {
        if(isset($_SESSION['administrator'])) {
            return TRUE;
        } else {
        redirect(base_url('auth'), 'refresh');
        }
    }

    function kode_admin()
    {
        $CI =& get_instance();
        $query = $CI->db->query("SELECT MAX(id_admin) AS kd_max FROM tbl_admin");
        
        $kd = "";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $kodejadi = "ADM" . $kd;
        return $kodejadi;
    }

    function kode_produk()
    {
        $CI =& get_instance();
        $query = $CI->db->query("SELECT MAX(id_product) AS kd_max FROM tbl_product");
        
        $kd = "";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $kodejadi = "KD" . $kd;
        return $kodejadi;
    }

    function kode_order()
    {
        $CI =& get_instance();
        $query = $CI->db->query("SELECT MAX(id_order) AS kd_max FROM tbl_order");
        
        $kd = "";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $kodejadi = "ODR" . $kd;
        return $kodejadi;
    }

    function kode_cart()
    {
        $CI =& get_instance();
        $query = $CI->db->query("SELECT MAX(id_cart) AS kd_max FROM tbl_cart");
        
        $kd = "";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $kodejadi = "CART" . $kd;
        return $kodejadi;
    }

    function get_provinsi()
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
		  	return $parse_decode['rajaongkir']['results'];
		}
    }

    function getKodeBarang($id_cart)
    {
        $CI =& get_instance();
        return $CI->db->select('kode_barang')->where('id_cart', $id_cart)->get('tbl_cart')->row_array()['kode_barang'];
    }

    function getName($kode_barang)
    {
        $CI =& get_instance();
        return $CI->db->select('nama')->where('kode_barang', $kode_barang)->get('tbl_product')->row_array()['nama'];
    }
    
    function getNameAdmin($kode_admin)
    {
        $CI =& get_instance();
        return $CI->db->select('nama_admin')->where('kode_admin', $kode_admin)->get('tbl_admin')->row_array()['nama_admin'];
    }
?>