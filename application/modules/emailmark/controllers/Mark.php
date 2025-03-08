<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mark  extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'channel_model',
      // 'hotel_details'
		));	
    }
   


    public function show()
    {
     
      $data['module'] = "emailmark";
      $data['page']   = "mark";   
      echo Modules::run('template/layout', $data); 
   
    }
    
    public function basicShow()
    {
     
      $data['module'] = "emailmark";
      $data['page']   = "basicMark";   
      echo Modules::run('template/layout', $data); 
   
    }
    public function saveOnbording()
    {
      // var_dump($this->input->server('REQUEST_METHOD') === 'POST');
        if ($this->input->server('REQUEST_METHOD') === 'POST') { // Check if request is POST
            $otacode = $this->input->post('otacode');
            // var_dump($otacode);
            // **Check if OTA Code exists in channel_manager table**
            if (!$this->channel_model->check_ota_exists($otacode)) {
              
                $this->session->set_flashdata('error', 'Invalid OTA Code!');
                redirect('manage-channels/agoda-ota-manage/onboarding');
                return;
            }
      
            // **Prepare data array**
            $data = array(
              // 'otacode' => $this->input->post('otacode')
                'hotel_name'    => $this->input->post('hotel_name'),
                'hotel_id'      => $this->input->post('hotel_id'),
                'hotel_catagory' => $this->input->post('hotel_catagory'),
                'decription'    => $this->input->post('decription'),
                'currency'      => $this->input->post('currency'),
                'full_name'     => $this->input->post('full_name'),
                'email'         => $this->input->post('email'),
                'phomeNum'      => $this->input->post('phomeNum'),
                'language'      => $this->input->post('language'),
                'channels'      => $this->input->post('channels'),
                'addr_line'     => $this->input->post('addr_line'),
                'city_name'     => $this->input->post('city_name'),
                'country'       => $this->input->post('country'),
                'postel_code'   => $this->input->post('postel_code'),
                'longitude'     => $this->input->post('longitude'),
                'latitude'      => $this->input->post('latitude'),
                'chk_in_time'   => $this->input->post('chk_in_time'),
                'chk_in_out'    => $this->input->post('chk_in_out'),
                'services'      => $this->input->post('services'),
                'cncl_penalty_policy' => $this->input->post('cncl_penalty_policy'),
                'max_infant_age' => $this->input->post('max_infant_age'),
                'max_child_age' => $this->input->post('max_child_age'),
                'night_num'     => $this->input->post('night_num'),
                'ota_name'      => $this->input->post('ota_name'),
                'otacode'       => $otacode // Same OTA Code as in `channel_manager`
            );
   
            // **Insert hotel details**
            if ($this->channel_model->insert_hotel_details($data)) {
              var_dump($data);
                $this->session->set_flashdata('success', 'Hotel details added successfully!');
                redirect('manage-channels/agoda-ota-manage/onboarding');
            } else {
                $this->session->set_flashdata('error', 'Failed to add hotel details!');
                redirect('manage-channels/agoda-ota-manage/adddetails');
            }
        } else {
            show_error("Invalid request method.", 405);
        }
    }
  	  
}
