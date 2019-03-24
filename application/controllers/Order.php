<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Order extends REST_Controller
{

  function __construct( )
  {
    parent::__construct();
    $this->load->model('Order_model', 'order');
  }

  public function getlist_post()
  {
     $uId = $this->input->post('uId');
     $r = $this->order->getOrder($uId);
     $this->response($r);
  }

  public function place_post()
  {
     $data = array('uId' => $this->input->post('uId'),
                   'pId' => $this->input->post('pId'),
                   'quantity' => $this->input->post('quantity')
                    );
      $r = $this->order->insert($data);
      $this->response($r);
  }

  public function update_post()
  {
     $id = $this->input->post('id');
     $data = array('uId' => $this->input->post('uId'),
                   'pId' => $this->input->post('pId'),
                   'quantity' => $this->input->post('quantity')
                    );
     $r = $this->order->update($id, $data);
     $this->response($r);
  }

  public function remove_post()
  {
    $id = $this->input->post('id');
    $r = $this->order->delete($id);
    $this->response($r);
  }
}

 ?>
