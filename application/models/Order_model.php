<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Order_model extends CI_Model
{

  function __construct()
  {
     parent::__construct();
     $this->load->database();
  }

  public function getOrder($uId)
  {
    $result = $this->db->query("SELECT * FROM orders WHERE uId = $id");
    return $result->result_array();
  }

  public function insert($data)
  {
     $this->uId = $data['uId'];
     $this->pId = $data['pId'];
     $this->quantity = $data['quantity'];

    if ($this->db->insert('orders',$this)) {
      return 'Order placed successfully';
    }else {
      return 'Error has occured';
    }
  }

  public function update($id, $data)
  {
    $this->uId = $data['uId'];
    $this->pId = $data['pId'];
    $this->quantity = $data['quantity'];

    if ($this->db->update('orders', $this, array('id' =>  $id))) {
        return 'Order updated successfully';
    }else {
        return 'Error occured';
    }
  }

  public function delete($id)
  {
    $result = $this->db->query("DELETE FROM orders WHERE id = $id");
     if($result) {
        return "Order deleted successfully";
     }else {
       return "Error has occured";
     }
  }
}
 ?>
