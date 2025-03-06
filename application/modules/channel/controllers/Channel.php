<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'hallroom_model'
		));	
    }
   

    public function index($id = null)
    {
      $this->load->view('dashboard');
      // echo "hello";
      // echo view('rooms');
    }

    public function show($id = null)
    {
      $this->load->view('channels');
      // echo "hello";
      // echo view('rooms');
    }
    
    public function show1($id = null)
    {
      $this->load->view('ota');
      // echo "hello";
      // echo view('rooms');
    }
    
	
    

	
	  
}
