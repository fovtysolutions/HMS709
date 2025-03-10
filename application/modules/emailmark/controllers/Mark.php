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
    public function nightShowpage()
    { $this->permission->method('emailmark','read')->redirect();
     
      $data['module'] = "emailmark";
      $data['page']   = "nights";   
      // $data['services'] = $this->Bookingengine_model->get_all_services();
      $data['postData']= $this->Marketing_model->get_all_nights();
      // var_dump($data['postData']);
      // exit();
      echo Modules::run('template/layout', $data); 

     

   
    }
    public function eailyShowpage()
    {
     
      // $this->permission->method('emailmark','read')->redirect();
      $data['module'] = "emailmark";
      $data['page']   = "eailyBird";  
      // var_dump($data['postData']);
      // exit();
      // $data['postData']= $this->Marketing_model->get_all_eaily_bird(); 

     
      echo Modules::run('template/layout', $data); 
   
    }
    public function dayOfWeekShowpage()
    {
     
      $data['module'] = "emailmark";
      $data['page']   = "day";   
      echo Modules::run('template/layout', $data); 
   
    }
    public function sameDayShowpage()
    {
     
      $data['module'] = "emailmark";
      $data['page']   = "sameDay";   
      echo Modules::run('template/layout', $data); 
   
    }
    // public function nightsList(){
  
    // // {   echo"hello";
    // //   exit();
    //   // $this->form_validation->set_rules('marketing_name',display('marketing_name'),'required');
    //   // $this->form_validation->set_rules('discount_in',display('discount_in'),'required');
     
    //     if ($this->form_validation->run()) {
    //         $postData = array(
    //             // 'facilitytypeid'        => $this->input->post('facilitytypeid', TRUE),
    //             'marketing_name'        => $this->input->post('marketing_name', TRUE),
    //             // 'select_channels'       => $this->input->post('select_channels', TRUE),
    //             // 'discount_in'           => $this->input->post('discount_in', TRUE),
    //             // 'start_date'            => $this->input->post('start_date', TRUE),
    //             // 'end_date'              => $this->input->post('no_end_date') ? NULL : $this->input->post('end_date', TRUE),
    //             // 'blackout_status'       => $this->input->post('blackout_status', TRUE),
    //             // 'blackout_date'         => ($this->input->post('blackout_status') === 'yes') ? $this->input->post('blackout_date', TRUE) : NULL,
    //             // 'only_mobile_users'     => $this->input->post('only_mobile_users') ? 'yes' : 'no',
    //             // 'only_member'           => $this->input->post('only_member') ? 'yes' : 'no',
    //             // 'all_the_room_rate_plan'=> $this->input->post('all_the_room_rate_plan') ? 'yes' : 'no',
    //         );
           
    //         if ($this->Marketing_model->insert_marketing($postData)) {
           
    //           echo"hel'xv c:lo";
    //           // exit();
    //           redirect("email-marketing/basic-marketing");  
        
    //         } else {
    //           var_dump('helljkfglfjlo');
    //           exit();
    //             echo json_encode(['status' => 'error', 'message' => 'Please try again']);
    //         }
    //     } 

        
    //     else {
    //       var_dump('hello');
    //       exit();
    //         echo json_encode(['status' => 'error', 'message' => validation_errors()]);
    //     }
    //     exit();
    // }
    
    public function nightsList(){
  
      // {   echo"hello";
      //   exit();
        $this->form_validation->set_rules('marketing_name',display('marketing_name'),'required');
        $this->form_validation->set_rules('discount_in',display('discount_in'),'required');
       
          if ($this->form_validation->run()) {
              $data = array(
                  // 'facilitytypeid'        => $this->input->post('facilitytypeid', TRUE),
                  'marketing_name'        => $this->input->post('marketing_name', TRUE),
                  // 'select_channels'       => $this->input->post('select_channels', TRUE),
                  'discount_in'           => $this->input->post('discount_in', TRUE),
                  'start_date'            => $this->input->post('start_date', TRUE),
                  'end_date'              => $this->input->post('no_end_date') ? NULL : $this->input->post('end_date', TRUE),
                  'blackout_status'       => $this->input->post('blackout_status', TRUE),
                  'blackout_date'         => ($this->input->post('blackout_status') === 'yes') ? $this->input->post('blackout_date', TRUE) : NULL,
                  // 'only_mobile_users'     => $this->input->post('only_mobile_users') ? 'yes' ,
                  // 'only_member'           => $this->input->post('only_member') ? 'yes' : 'no',
                  // 'all_the_room_rate_plan'=> $this->input->post('all_the_room_rate_plan') ? 'yes' : 'no',
              );
             
              if ($this->Marketing_model->insert_eailybird($data)) {
                redirect('email-marketing/multi-nights');
            }else {
              
                  echo json_encode(['status' => 'error', 'message' => 'Please try again']);
              }
          } 
  
          
          else {
            // var_dump('hello');
            // exit();
              echo json_encode(['status' => 'error', 'message' => validation_errors()]);
          }
          exit();
      }

      public function eailylist(){
  
        // {   echo"hello";
        //   exit();
          $this->form_validation->set_rules('marketing_name',display('marketing_name'),'required');
          $this->form_validation->set_rules('discount_in',display('discount_in'),'required');
         
            if ($this->form_validation->run()) {
                $data = array(
                    // 'facilitytypeid'        => $this->input->post('facilitytypeid', TRUE),
                    'marketing_name'        => $this->input->post('marketing_name', TRUE),
                    // 'select_channels'       => $this->input->post('select_channels', TRUE),
                    'discount_in'           => $this->input->post('discount_in', TRUE),
                    'start_date'            => $this->input->post('start_date', TRUE),
                    'end_date'              => $this->input->post('no_end_date') ? NULL : $this->input->post('end_date', TRUE),
                    'blackout_status'       => $this->input->post('blackout_status', TRUE),
                    'blackout_date'         => ($this->input->post('blackout_status') === 'yes') ? $this->input->post('blackout_date', TRUE) : NULL,
                    // 'only_mobile_users'     => $this->input->post('only_mobile_users') ? 'yes' ,
                    // 'only_member'           => $this->input->post('only_member') ? 'yes' : 'no',
                    // 'all_the_room_rate_plan'=> $this->input->post('all_the_room_rate_plan') ? 'yes' : 'no',
                );
               
                if ($this->Marketing_model->get_all_eaily_bird($data)) {
                  redirect('email-marketing/eaily-bird');
              }else {
                
                    echo json_encode(['status' => 'error', 'message' => 'Please try again']);
                }
            } 
    
            
            else {
              // var_dump('hello');
              // exit();
                echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            }
            exit();
        }

        public function delete_night($id) {
          if ($this->Marketing_model->delete_night($id)) {
            redirect('email-marketing/multi-nights');
          } else {
              echo json_encode(['status' => 'error', 'message' => 'Failed to delete service.']);
          }
      }
  }
