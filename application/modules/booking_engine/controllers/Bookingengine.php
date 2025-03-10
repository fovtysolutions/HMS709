<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Bookingengine extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Bookingengine_model');
    }

    public function index() {
        $this->permission->method('booking_engine','read')->redirect();	
        $data['module'] = "booking_engine";
        $data['page']   = "paidservices";
        $data['services'] = $this->Bookingengine_model->get_all_services();
        // var_dump($this->Bookingengine_model->get_all_services());
    
    
       echo Modules::run('template/layout',$data);
     
    }

    public function save_service() {
       

        if (!$this->input->is_ajax_request()) {
            show_error('No direct script access allowed', 403);
        }
    
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_error('Invalid request method', 403);
        }
    
        $imagePath = ""; 
    
        
        $uploadPath = APPPATH . 'modules/booking_engine/assets/images/';
    
        
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true); 
        }
    
        // Image Upload Handling
        if (!empty($_FILES['picture']['name'])) { 
            $config['upload_path']   = $uploadPath; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; 
            $config['file_name']     = time() . '_' . $_FILES['picture']['name'];
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('picture')) { 
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
    
            $uploadData = $this->upload->data();
            $imagePath = 'application/modules/booking_engine/assets/images/' . $uploadData['file_name'];
        }
    
       
        $data = [
            'service_name'   => $this->input->post('service_name'),
            'service_amount' => $this->input->post('service_amount'),
            'tax'            => $this->input->post('tax'),
            'description'    => $this->input->post('description'),
            'image'          => $imagePath, 
        ];

        // log('error', json_encode($data));
    
        if ($this->Bookingengine_model->insert_booking_service($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Service added successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add service.']);
        }
    }

    public function edit_service($id) {
        $service = $this->Bookingengine_model->get_service_by_id($id);
        if ($service) {
            echo json_encode($service);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Service not found.']);
        }
    }

    public function update_service() {
        if (!$this->input->is_ajax_request()) {
            show_error('No direct script access allowed', 403);
        }
    
        $service_id = $this->input->post('service_id');
        $imagePath = $this->input->post('image');
    
    
        if (!empty($_FILES['picture']['name'])) {
            $uploadPath = APPPATH . 'modules/booking_engine/assets/images/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = time() . '_' . $_FILES['picture']['name'];
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('picture')) {
                $uploadData = $this->upload->data();
                $imagePath = 'application/modules/booking_engine/assets/images/' . $uploadData['file_name'];
            }
        }
    
        $data = [
            'service_name'   => $this->input->post('service_name'),
            'service_amount' => $this->input->post('service_amount'),
            'tax'            => $this->input->post('tax'),
            'description'    => $this->input->post('description'),
            'image'          => $imagePath,
        ];
    
        if ($this->Bookingengine_model->update_booking_service($service_id, $data)) {
            echo json_encode(['status' => 'success', 'message' => 'Service updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update service.']);
        }
    }
    

    public function delete_service($id) {
        if ($this->Bookingengine_model->delete_service($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Service deleted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete service.']);
        }
    }





    public function notification(){
        $data['module'] = "booking_engine";
        $data['page']   = "notificationpopup";
       echo Modules::run('template/layout', $data);
     
        }


        public function promotional(){
          
            $data['module'] = "booking_engine";
            $data['page']   = "promotionalslider";
           echo Modules::run('template/layout', $data);
            
        }

        
        public function coupon()
        {
            $data['module'] = "booking_engine";
         $data['page']   = "coupon";
        echo Modules::run('template/layout', $data);
           
           
            
        }
        
}
?>

    

   
