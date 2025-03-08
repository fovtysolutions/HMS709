<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mark  extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'Marketing_model',
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
    public function basicListadd()
    {
      // var_dump($this->input->server('REQUEST_METHOD') === 'POST');
        if ($this->input->server('REQUEST_METHOD') === 'POST') { // Check if request is POST
          
      
          $data = array(
            'facilityname'          => $this->input->post('facilityname'),
            'facilititypeyname'     => $this->input->post('facilititypeyname'),
            'discount_in'           => $this->input->post('discount_in'),
            'start_date'            => $this->input->post('start_date'),
            'end_date'              => $this->input->post('end_date'),
            'no_end_date'           => $this->input->post('no_end_date') ? 1 : 0,
            'blackout_status'       => $this->input->post('blackout_status') == 'yes' ? 1 : 0,
            'blackout_date'         => $this->input->post('blackout_date'),
            'only_mobile_users'     => $this->input->post('only_mobile_users') ? 1 : 0,
            'only_member'           => $this->input->post('only_member') ? 1 : 0,
            'all_the_room_rate_plan'=> $this->input->post('all_the_room_rate_plan') ? 1 : 0,
        );
   
            // **Insert hotel details**
            if ($this->marketing->insert_marketing($data)) {
              var_dump($data);
                $this->session->set_flashdata('success', 'M');
                redirect('email-marketing/basic-marketing');
            } else {
                $this->session->set_flashdata('error', 'Failed to add hotel details!');
                // redirect('manage-channels/agoda-ota-manage/adddetails');
            }
        } else {
            show_error("Invalid request method.", 405);
        }
    }
  	  
}
