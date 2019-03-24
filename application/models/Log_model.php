<?php

 /**
  *
  */
 class Log_model extends CI_Model
 {

   function __construct() {
       parent::__construct();
       $this->load->database();
   }

   public function insert($data)
   {
      $this->uri = $data['uri'];
      $this->method = $data['method'];
      $this->params = $data['params'];
      $this->api_key = $data['api_key'];
      $this->ip_address = $data['ip_address'];
      $this->time = $data['time'];
      $this->rtime = $data['rtime'];
      $this->authorized = $data['authorized'];
      $this->response_code = $data['response_code'];

      if ($this->db->insert('logs',$this)) {
        return 'Data is inserted successfully';
      }else {
        return "Error has occured";
      }
   }

 }


 ?>
