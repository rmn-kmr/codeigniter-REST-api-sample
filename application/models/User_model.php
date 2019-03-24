<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class User_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('encryption');

  }

  public function read()
  {
     $query = $this->db->query("select * from `User`");
     return $query->result_array();
  }

  public function login($data)
  {
    $cipherPass = $this->encryption->encrypt($data['pass']);
    $name = $data['name'];
    $query = $this->db->query("select * from User where user_name = $name");
    printf($query->result_array());
    return $query->result_array();
  }

  public function insert($data)
  {

    //$key = $this->encryption->create_key(16);
    $key = bin2hex($this->encryption->create_key(16));
    //printf($key);
     $this->user_name = $data['name'];
     $passChipher = $this->encryption->encrypt($data['pass']);
     $this->user_password = $passChipher ;
     $this->user_type = $data['type'];

     if ($this->db->insert('User',$this)) {
       // code...
       return 'Data is inserted successfully';
     }else {
       return "Error has occured";
     }
  }


  public function update($id,$data){

   $this->user_name    = $data['name']; // please read the below note
    $this->user_password  = $data['pass'];
    $this->user_type = $data['type'];
    $result = $this->db->update('User', $this, array('id' => $id));
      if($result)
        {
            return "Data is updated successfully";
        }
      else
        {
            return "Error has occurred";
        }
    }
    public function delete($id){

        $result = $this->db->query("delete from `User` where id = $id");
        if($result)
          {
              return "Data is deleted successfully";
          }
        else
          {
              return "Error has occurred";
          }
    }

}


 ?>
