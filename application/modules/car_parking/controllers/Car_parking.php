<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_parking extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'carparking_model'
		));	
    }
	public function zoneList($id = null)
    {        
		$this->permission->method('car_parking','read')->redirect();
        $data['title']    = display('zone'); 
		if(empty($id)){
			$data["zone_details"] = $this->carparking_model->read('tbl_zone', 'zone_id');
			$data['module'] = "car_parking";
			$data['page']   = "zone_list";   
			echo Modules::run('template/layout', $data); 
		}else{
			$data["intinfo"] = $this->carparking_model->findById($id, 'zone_id', 'tbl_zone');
			$data['module'] = "car_parking";
			$this->load->view("edit_zone", $data);
		}
    }
	public function zoneCreate($id = null)
    {
	  $data['title'] = display('car_parking_add');
	  $this->form_validation->set_rules('zone_type',display('zone_type'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if($this->input->post('isactive',TRUE)==NULL | $this->input->post('isactive',TRUE)==0){
		$isactive = 0;
	  }else{
		  $isactive=1;
	  }
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('zone_id', TRUE))) {
		 $data['car_parking']   = (Object) $postData = array(
		   'zone_id'     	 => $this->input->post('zone_id', TRUE),
		   'zone_type' 	     => $this->input->post('zone_type',TRUE),
		   'isactive' 	     => 1,
		  );
		$this->permission->method('car_parking','create')->redirect();
		if ($this->carparking_model->create('tbl_zone', $postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('car_parking/zoneList');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("car_parking/zoneList"); 
	
	   } else {
		$this->permission->method('car_parking','update')->redirect();
		$data['car_parking']   = (Object) $postData = array(
		   'zone_id'     	 => $this->input->post('zone_id', TRUE),
		   'zone_type' 	     => $this->input->post('zone_type',TRUE),
		   'isactive' 	     => $isactive,
		  );
	 
		if ($this->carparking_model->update($postData, 'zone_id', 'tbl_zone')) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("car_parking/zoneList");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('car_parking_edit');
		$data['intinfo']   = $this->carparking_model->findById($id);
	   }
	   
	   $data['module'] = "car_parking";
	   $data['page']   = "zone_list";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
	public function zoneDelete($id = null)
    {
        $this->permission->module('car_parking','delete')->redirect();
		
		if ($this->carparking_model->delete($id, 'zone_id', 'tbl_zone')) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('car_parking/zoneList');
    } 
	public function slotList($id = null)
    {
        
		$this->permission->method('car_parking','read')->redirect();
        $data['title']    = display('slot'); 
		$data["zone_list"] = $this->carparking_model->read('tbl_zone', 'zone_id');
		if(empty($id)){
			$data["slot_details"] = $this->carparking_model->read('tbl_slot', 'slot_id');
			$data['module'] = "car_parking";
			$data['page']   = "slot_list";   
			echo Modules::run('template/layout', $data); 
		}
		else{
			$data["intinfo"] = $this->carparking_model->findById($id, 'slot_id', 'tbl_slot');
			$data['module'] = "car_parking";
			$this->load->view("edit_slot", $data);
		}
    }
	public function slotCreate($id = null)
    {
	  $data['title'] = display('car_parking_add');
	  $this->form_validation->set_rules('slot_type',display('slot_type'),'required|xss_clean');
	  $this->form_validation->set_rules('zone_type',display('zone_type'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if($this->input->post('isactive',TRUE)==NULL | $this->input->post('isactive',TRUE)==0){
		$isactive = 0;
	  }else{
		  $isactive=1;
	  }
	  if ($this->form_validation->run()) { 
		$slot_type = $this->input->post('slot_type',TRUE);
		$zone_id = $this->input->post('zone_type',TRUE);
		$this->db->where('zone_id',$zone_id);
		$this->db->where('LOWER(slot_type)',strtolower($slot_type));
		if(!empty($this->input->post('slot_id', TRUE))){
			$this->db->where('slot_id!=',$this->input->post('slot_id',TRUE));
		}
		$this->db->FROM('tbl_slot');
		$query = $this->db->get();
		$result = $query->num_rows();
		if($result>0){
			$this->session->set_flashdata('exception',  "Slot Already Exists");
			redirect("car_parking/slotList"); 
		}
	   if(empty($this->input->post('slot_id', TRUE))) {
			$slot_type = $this->input->post('slot_type',TRUE);
			$zone_id = $this->input->post('zone_id',TRUE);
			$this->db->where('zone_id',$zone_id);
			$this->db->where('LOWER(slot_type)',strtolower($slot_type));
			$this->db->FROM('tbl_slot');
			$query = $this->db->get();
			$result = $query->row();
			if($result<=0)
				$data['car_parking']   = (Object) $postData = array(
				'slot_id'     	 => $this->input->post('slot_id', TRUE),
				'slot_type' 	     => $this->input->post('slot_type',TRUE),
				'zone_id' 	     => $this->input->post('zone_type',TRUE),
				'isactive' 	     => 1,
				);
				$this->permission->method('car_parking','create')->redirect();
				if ($this->carparking_model->create('tbl_slot', $postData)) { 
				$this->session->set_flashdata('message', display('save_successfully'));
				redirect('car_parking/slotList');
				} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("car_parking/slotList"); 
	   } else {
		$this->permission->method('car_parking','update')->redirect();
		$data['car_parking']   = (Object) $postData = array(
		   'slot_id'     	 => $this->input->post('slot_id', TRUE),
		   'slot_type' 	     => $this->input->post('slot_type',TRUE),
		   'isactive' 	     => $isactive,
		  );
	 
		if ($this->carparking_model->update($postData, 'slot_id', 'tbl_slot')) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("car_parking/slotList");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('car_parking_edit');
		$data['intinfo']   = $this->carparking_model->findById($id);
	   }
	   
	   $data['module'] = "car_parking";
	   $data['page']   = "slot_list";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
	public function slotDelete($id = null)
    {
        $this->permission->module('car_parking','delete')->redirect();
		
		if ($this->carparking_model->delete($id, 'slot_id', 'tbl_slot')) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('car_parking/slotList');
    } 
	public function vehicleList($id = null)
    {
		$this->permission->method('car_parking','read')->redirect();
        $data['title']    = display('vehicle'); 
		if(empty($id)){
			$data["vehicle_details"] = $this->carparking_model->read('tbl_vehicle', 'vehicle_id');
			$data['module'] = "car_parking";
			$data['page']   = "vehicle_list";   
			echo Modules::run('template/layout', $data); 
		}
		else{
			$data["intinfo"] = $this->carparking_model->findById($id, 'vehicle_id', 'tbl_vehicle');
			$data['module'] = "car_parking";
			$this->load->view("edit_vehicle", $data);
		}
    }
	public function vehicleCreate($id = null)
    {
	  $data['title'] = display('car_parking_add');
	  $this->form_validation->set_rules('vehicle_type',display('vehicle_type'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if($this->input->post('isactive',TRUE)==NULL | $this->input->post('isactive',TRUE)==0){
		$isactive = 0;
	  }else{
		  $isactive=1;
	  }
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('vehicle_id', TRUE))) {
		 $data['car_parking']   = (Object) $postData = array(
		   'vehicle_id'     	 => $this->input->post('vehicle_id', TRUE),
		   'vehicle_type' 	     => $this->input->post('vehicle_type',TRUE),
		   'isactive' 	     => 1,
		  );
		$this->permission->method('car_parking','create')->redirect();
		if ($this->carparking_model->create('tbl_vehicle', $postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('car_parking/vehicleList');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("car_parking/vehicleList"); 
	
	   } else {
		$this->permission->method('car_parking','update')->redirect();
		$data['car_parking']   = (Object) $postData = array(
		   'vehicle_id'     	 => $this->input->post('vehicle_id', TRUE),
		   'vehicle_type' 	     => $this->input->post('vehicle_type',TRUE),
		   'isactive' 	     => $isactive,
		  );
	 
		if ($this->carparking_model->update($postData, 'vehicle_id', 'tbl_vehicle')) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("car_parking/vehicleList");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('car_parking_edit');
		$data['intinfo']   = $this->carparking_model->findById($id);
	   }
	   
	   $data['module'] = "car_parking";
	   $data['page']   = "vehicle_list";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
	public function vehicleDelete($id = null)
    {
        $this->permission->module('car_parking','delete')->redirect();
		
		if ($this->carparking_model->delete($id, 'vehicle_id', 'tbl_vehicle')) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('car_parking/vehicleList');
    } 
	public function settingList($id = null)
    {
        
		$this->permission->method('car_parking','read')->redirect();
        $data['title']    = display('carparking'); 
		$data["zone_list"] = $this->carparking_model->read('tbl_zone', 'zone_id');
		$data["vehicle_list"] = $this->carparking_model->read('tbl_vehicle', 'vehicle_id');
		if(empty($id)){
			$data["setting_details"] = $this->carparking_model->read('tbl_parkingSetting', 'parkingSetting_id');
			$data['module'] = "car_parking";
			$data['page']   = "setting_list";   
			echo Modules::run('template/layout', $data); 
		}
		else{
			$data["intinfo"] = $this->carparking_model->findById($id, 'parkingSetting_id', 'tbl_parkingSetting');
			$data['module'] = "car_parking";
			$this->load->view("edit_setting", $data);
		}
    }
	public function settingCreate($id = null)
    {
	  $data['title'] = display('car_parking_add');
	  $this->form_validation->set_rules('zone_type',display('zone_type'),'required|xss_clean');
	  $this->form_validation->set_rules('vehicle_type',display('vehicle_type'),'required|xss_clean');
	  $this->form_validation->set_rules('time',display('time'),'required|xss_clean');
	  $this->form_validation->set_rules('price',display('price'),'required|xss_clean');
	  $this->form_validation->set_rules('vat',display('vat'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('parkingSetting_id', TRUE))) {
		 $data['car_parking']   = (Object) $postData = array(
		   'zone_id'  	 => $this->input->post('zone_type', TRUE),
		   'vehicle_id'  => $this->input->post('vehicle_type',TRUE),
		   'time' 	     => $this->input->post('time',TRUE),
		   'price' 	     => $this->input->post('price',TRUE),
		   'vat' 	     => $this->input->post('vat',TRUE),
		  );
		$this->permission->method('car_parking','create')->redirect();
		if ($this->carparking_model->create('tbl_parkingSetting', $postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('car_parking/settingList');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("car_parking/settingList"); 
	
	   } else {
		$this->permission->method('car_parking','update')->redirect();
		$data['car_parking']   = (Object) $postData = array(
		   'parkingSetting_id'  => $this->input->post('parkingSetting_id', TRUE),
		   'zone_id'  	 	    => $this->input->post('zone_type', TRUE),
		   'vehicle_id' 	    => $this->input->post('vehicle_type',TRUE),
		   'time' 	     	    => $this->input->post('time',TRUE),
		   'price' 	     		=> $this->input->post('price',TRUE),
		   'vat' 	     		=> $this->input->post('vat',TRUE),
		  );
	 
		if ($this->carparking_model->update($postData, 'parkingSetting_id', 'tbl_parkingSetting')) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("car_parking/settingList");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('car_parking_edit');
		$data['intinfo']   = $this->carparking_model->findById($id);
	   }
	   
	   $data['module'] = "car_parking";
	   $data['page']   = "setting_list";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
	public function settingDelete($id = null)
    {
        $this->permission->module('car_parking','delete')->redirect();
		
		if ($this->carparking_model->delete($id, 'parkingSetting_id', 'tbl_parkingSetting')) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('car_parking/settingList');
    } 
	public function bookParking($id = null)
    {   
		$this->permission->method('car_parking','read')->redirect();
        $data['title']    = display('carparking'); 
        $data["booking_details"] = $this->carparking_model->readWhere('booking_number,bookedid,room_no', 'booked_info', 'bookedid', array('bookingstatus' => array(0,4)));
        $data["vehicle_details"] = $this->carparking_model->readWhere('vehicle_id,vehicle_type', 'tbl_vehicle', 'vehicle_id');
        $data['module'] = "car_parking";
        $data['page']   = "book_parking";   
        echo Modules::run('template/layout', $data); 
    }
	public function bookParkingList($id = null)
    {
		$this->permission->method('car_parking','read')->redirect();
        $data['title']    = display('carparking'); 
        $data["bookParking_details"] = $this->carparking_model->read('tbl_bookParking', 'bookParking_id');
        $data['module'] = "car_parking";
        $data['page']   = "book_parking";   
        echo Modules::run('template/layout', $data); 
    }
	public function getZone(){
		$parkingSetting_id = $this->input->post("zone", true);
		$vehicle_id = $this->input->post("vehicle_type", true);
		$details = $this->db->select("tz.zone_id, tz.zone_type")->from("tbl_zone tz")->join("tbl_parkingSetting tps", "tps.zone_id=tz.zone_id", "left")->where("tps.vehicle_id", $vehicle_id)->group_by("tps.zone_id")->get()->result();
		echo json_encode($details);
	}
	public function getTime(){
		$vehicle_id = $this->input->post("vehicle_id", true);
		$zone_id = $this->input->post("zone", true);
		$details = $this->db->select("parkingSetting_id,time")->from("tbl_parkingSetting")->where("vehicle_id", $vehicle_id)->where("zone_id", $zone_id)->get()->result();
		echo json_encode($details);
	}
	public function getSlot(){
		$zone_id = $this->input->post("zone", true);
		$parkingId = $this->input->post("parkingId", true);
		$checkin = $this->input->post("checkinTime", true);
		$checkout = $this->input->post("checkoutTime", true);
		$status="status=1";
		$exits = $this->db->select("*")->from('tbl_bookParking')->where('checkin<=',$checkin)->where('checkout>',$checkin)->where($status)->where("zone_id",$zone_id)->where("bookParking_id!=",$parkingId)->get()->result();
		$exit = $this->db->select("*")->from('tbl_bookParking')->where('checkin<',$checkout)->where('checkout>=',$checkout)->where($status)->where("zone_id",$zone_id)->where("bookParking_id!=",$parkingId)->get()->result();
		$check = $this->db->select("*")->from('tbl_bookParking')->where('checkin>',$checkin)->where('checkout<=',$checkout)->where($status)->where("zone_id",$zone_id)->where("bookParking_id!=",$parkingId)->get()->result();
		$totalslot1 = $this->db->select("count(bookParking_id) as allslot")->from('tbl_bookParking')->where('checkin<=',$checkin)->where('checkout>',$checkin)->where($status)->where("zone_id",$zone_id)->where("bookParking_id!=",$parkingId)->get()->row();
		$totalslot2 = $this->db->select("count(bookParking_id) as allslot")->from('tbl_bookParking')->where('checkin<',$checkout)->where('checkout>=',$checkout)->where($status)->where("zone_id",$zone_id)->where("bookParking_id!=",$parkingId)->get()->row();
		$totalslot3 = $this->db->select("count(bookParking_id) as allslot")->from('tbl_bookParking')->where('checkin>=',$checkin)->where('checkout<=',$checkout)->where($status)->where("zone_id",$zone_id)->where("bookParking_id!=",$parkingId)->group_by('checkin')->get()->result();
		$allbookedslot3 = (!empty($allbookedslot3)?max(array_column($totalslot3, 'allslot')):0);
		$totalslotfound=$this->db->select("count(slot_id) as totalslot")->from('tbl_slot')->where('zone_id',$zone_id)->get()->row();
		$numberlist=$this->db->select("*")->from('tbl_slot')->where('zone_id',$zone_id)->get()->result();
		$slotlist='';
		foreach($numberlist as $singleno){
			$slotlist.=$singleno->slot_id.',';
		}
		$gtslot=rtrim($slotlist,',');
		if(empty($exits)&&empty($exit)&&empty($check)){
			$allslot=$gtslot;
			$data['isfound']=0;
		}
		else{
			$bookedslot="";
			if(!empty($exits)){
				foreach($exits as $booked){
					$bookedslot.=$booked->slot_id.',';
				}
			}
			if(!empty($exit)){
				foreach($exit as $ex){
					$bookedslot.=$ex->slot_id.',';
				}
			}
			if(!empty($check)){
				foreach($check as $ch){
					$bookedslot.=$ch->slot_id.',';
				}
			}
			$getbookedall=rtrim($bookedslot,',');
			$allbookedslot1=$totalslot1->allslot;
			$allbookedslot2=$totalslot2->allslot;
			$allbookedslot=max((int)$allbookedslot1,(int)$allbookedslot2,(int)$allbookedslot3);
			$allfreeslot=$totalslotfound->totalslot;
					if($allfreeslot>$allbookedslot){
						$output=$this->Differences($getbookedall, $gtslot);
						if(!empty($output)){
						$allslot=$output;
						$data['isfound']='1';
							}
						else{
							$allslot='';
							$data['isfound']='2';
							}
					}
					else{
						$allslot='';
						$data['isfound']='2';
						}
				}	
		$availableslot = explode(",",$allslot);
		$slot_list = explode(",",$gtslot);
		$free_slot = array_intersect($slot_list, $availableslot);
		$free_slot = array_values($free_slot);
		if(count($free_slot)>0){
			$slot = $this->db->select("slot_type,slot_id")->from("tbl_slot")->where_in("slot_id",$free_slot)->get()->result();
		}else{
			$slot = "";
		}
		$data = array(
			'slot' => $slot,
			);
		echo json_encode($data);
	}
	public function getBill(){
		$parkingSetting_id = $this->input->post("parkingSetting_id", true);
		$details = $this->db->select("price,vat")->from("tbl_parkingSetting")->where("parkingSetting_id", $parkingSetting_id)->get()->row();
		echo json_encode($details);
	}
	public function Differences ($Arg1, $Arg2){
		$Arg1 = explode (',', $Arg1);
		$Arg2 = explode (',', $Arg2);
		
		$Difference_1 = array_diff($Arg1, $Arg2);
		$Difference_2 = array_diff($Arg2, $Arg1);
		$Diff = array_merge($Difference_1, $Difference_2);
		$Difference = implode(',', $Diff);
		return $Difference;
	}
	public function submitParking(){
		$parkingId = $this->input->post("parkingId", true);
		$booking_number = $this->input->post("booking_number", true);
		$parkingSetting_id = $this->input->post("parkingSetting_id", true);
		$checkin = $this->input->post("checkin", true);
		$checkout = $this->input->post("checkout", true);
		$zone_id = $this->input->post("zone_id", true);
		$slot_id = $this->input->post("slot_id", true);
		$total_price = $this->input->post("total_price", true);
		$comment = $this->input->post("comment", true);
		$slot_id = explode(",", $slot_id);
		$allslot_id = "";
		for($i=0; $i<count($slot_id); $i++){
			$slot = $this->db->select("slot_id")->from("tbl_slot")->where("slot_type", $slot_id[$i])->where("zone_id", $zone_id)->get()->row();
			$allslot_id .= $slot->slot_id.",";
		}
		$data = array(
			'bookedid' =>$booking_number,
			'parkingSetting_id' =>$parkingSetting_id,
			'zone_id' =>$zone_id,
			'slot_id' =>trim($allslot_id,","),
			'total_price' =>$total_price,
			'checkin' =>$checkin,
			'checkout' =>$checkout,
			'status' =>1,
			'paymentStatus' =>0,
			'comment' =>$comment,
		);
		if(empty($parkingId)){
			$insert = $this->db->insert("tbl_bookParking", $data);
		}else{
			$insert = $this->db->where("bookParking_id", $parkingId)->update("tbl_bookParking", $data);
		}
		if($insert){
			$this->session->set_flashdata('message', display('save_successfully'));
		}else{
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}

	}
	public function parkingList($id = null)
    {
		$this->permission->method('car_parking','read')->redirect();
        $data['title']    = display('parking'); 
		$data["parking_details"] = $this->carparking_model->read('tbl_bookParking', 'bookParking_id');
		$data['module'] = "car_parking";
		if(empty($id)){
			$data['page']   = "parking_list";   
			echo Modules::run('template/layout', $data); 
		}else{
			$data["intinfo"] = $this->carparking_model->findById($id, 'bookParking_id', 'tbl_bookParking');
			$data["vehicle"] = $this->carparking_model->findById($data["intinfo"]->parkingSetting_id, 'parkingSetting_id', 'tbl_parkingsetting');
			$data["zone"] = $this->carparking_model->findById($data["intinfo"]->zone_id, 'zone_id', 'tbl_zone');
			$data["booking_details"] = $this->carparking_model->readWhere('booking_number,bookedid,room_no', 'booked_info', 'bookedid', array('bookingstatus' => array(0,4)));
			$data["vehicle_details"] = $this->carparking_model->readWhere('vehicle_id,vehicle_type', 'tbl_vehicle', 'vehicle_id');
			$this->load->view("edit_parking", $data);
		}
    }
	public function parkingCancel($id = null)
    {
        $this->permission->module('car_parking','delete')->redirect();
		
		$postData = array(
			'bookParking_id'=>$id,
			'status'=>2
		);

		if ($this->carparking_model->update($postData, 'bookParking_id', 'tbl_bookParking')) {
			#set success message
			$this->session->set_flashdata('message',"Cancelled Successfully");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('car_parking/parkingList');
    } 
}
