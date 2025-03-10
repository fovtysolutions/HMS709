<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing_model extends CI_Model {

	private $marketing_table  = 'marketing';
	private $multinights_table='tb_multinights';
    private $eailybird_table='tbl_eailybird';
    public function insert_marketing($postData) {
        $this->db->insert('marketing', $postData);
        if ($this->db->affected_rows() > 0) {
            return true; // Successfully inserted
        } else {
            log_message('error', 'Marketing Data Insertion Failed: ' . $this->db->last_query());
            return false; // Insert failed
        }
    }


    public function insert_multynights($data) {
        return $this->db->insert('tb_multinights', $data);
    }
   

    public function get_all_nights() {
       
        $this->db->from('tb_multinights');
        return $this->db->get()->result();
    }
    public function insert_eailybird($data) {
        return $this->db->insert('tbl_eailybird', $data);
    }
    public function get_all_eaily_bird() {
       
        $this->db->from('tbl_eailybird');
        return $this->db->get()->result();
    }
    
    public function delete_night($id) {
        return $this->db->where('id', $id)->delete('tb_multinights');
    }

}

?>