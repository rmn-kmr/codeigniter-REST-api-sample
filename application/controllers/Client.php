<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *
 */
class Client extends CI_Controller
{

  function __construct( )
  {
    parent::__construct();
    $this->load->library('curl');
  }

  public function getUserList()
  {
    $result = $this->curl->simple_get('http://localhost/CodeIgniter/index.php/Api/user');
    printf($result);
  }

  public function addUser()
  {
    $result = $this->curl->simple_post('http://localhost/CodeIgniter/index.php/Api/user',
     array('name'=>'bar123456', 'pass'=>'123456', 'type'=>'1'));
     printf($result);
  }

}

 ?>
