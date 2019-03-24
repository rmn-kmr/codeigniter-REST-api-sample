<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Api_Controller extends REST_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('log_model');
  }

  protected function _log_request($authorized = FALSE)
     {
echo "string";
         $data = array('uri' => $this->uri->uri_string(),
                        'method' => $this->request->method,
                        'params' => $this->_args ? (config_item('rest_logs_json_params') ? json_encode($this->_args) : serialize($this->_args)) : null,
                        'api_key'=>isset($this->rest->key) ? $this->rest->key : '',
                        'ip_address' => $this->input->ip_address(),
                        'time' => function_exists('now') ? now() : time(),
                        'authorized' => $authorized);

          $r = $this->log_model->insert($data);
          $this->response($r);
     }

}

?>
