<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class channel_model extends CI_Model {

	private $channel_table  = 'channel_manager';
	private $hotel_table= 'hotel_details';

    public function insert_channel($data) {
        return $this->db->insert('channel_manager', $data);
    }
    public function insert_hotel_details($data) {
        return $this->db->insert('hotel_details', $data);
    }

    // Get All OTA Channels
    public function get_channels() {
        return $this->db->get('channel_manager')->result();
    }

    // Get Single OTA by ID
    public function get_channel_by_id($id) {
        return $this->db->where('id', $id)->get('channel_manager')->row();
    }

    // Delete OTA
    public function delete_channel($id) {
        return $this->db->where('id', $id)->delete('channel_manager');
    }
    public function check_ota_exists($otacode) {
        return $this->db->where('otacode', $otacode)->get($this->channel_table)->num_rows() > 0;
    }
    public function get_hotels_with_channels() {
        $this->db->select('hotel_details.*, channel_manager.ota_name, channel_manager.otacode');
        $this->db->from($this->hotel_table);
        $this->db->join($this->channel_table, 'hotel_details.otacode = channel_manager.otacode', 'inner'); 
        $query = $this->db->get();
        
        return ($query->num_rows() > 0) ? $query->result() : false;
    }
}

?>