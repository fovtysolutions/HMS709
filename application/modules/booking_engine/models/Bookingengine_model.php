<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookingengine_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_booking_service($data) {
        return $this->db->insert('tbl_booking_engine_paid', $data);
    }
       
       public function get_all_services() {
        // return $this->db->get('tbl_booking_engine_paid')->result_array();
        return $this->db->select("*")
        ->from('tbl_booking_engine_paid')
        ->get()
        ->result();
       

      
    }

  
    public function get_service_by_id($id) {
        return $this->db->where('id', $id)->get('tbl_booking_engine_paid')->row();
    }

    public function update_booking_service($id, $data) {
        return $this->db->where('id', $id)->update('tbl_booking_engine_paid', $data);
    }

    public function delete_service($id) {
        return $this->db->where('id', $id)->delete('tbl_booking_engine_paid');
    }
}

?>