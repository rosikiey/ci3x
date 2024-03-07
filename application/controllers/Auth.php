<?php
defined('BASEPATH') or exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
class Auth extends RestController
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
  }

  public function token_get(){
    $data = array(
      'userid'=> 145,
      'email'=>'test@email.com',
      'userType'=> 'admin'
    );
    $data['token'] = $this->Auth_model->Auth_createtoken($data);
    $this->response( $data, 200 );
  }

  public function tokenx_get(){
    $jwt = new JWT();
    $JwtSecretKey = "myScrettKey";
    $data = array(
      'userid'=> 145,
      'email'=>'test@email.com',
      'userType'=> 'admin'
    );
    $data['token'] = $jwt->encode($data,$JwtSecretKey,'HS256');
    $this->response( $data, 200 );
  }

}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */