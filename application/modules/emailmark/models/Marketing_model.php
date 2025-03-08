<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing_model extends CI_Model {

	private $marketing_table  = 'marketing';
	
    public function insert_marketing($data) {
        return $this->db->insert('marketing', $data);
    }
   

}

?>