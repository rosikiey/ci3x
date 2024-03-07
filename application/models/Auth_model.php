<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function Auth_cektoken()
  {
    $headers = $this->input->request_headers(); 
    if (isset($headers['Authorization'])) {
      $jwt = new JWT();
      $JwtSecretKey =  $this->globalvar->keytoken();
      $decodedToken = $jwt->decode($headers['Authorization'],$JwtSecretKey,'HS256');
      if ($decodedToken) {
        return TRUE;
      }else{
        return FALSE;
      }
    }else{
      return FALSE;
    } 
  }

  public function Auth_createtoken($data)
  {
    $jwt = new JWT();
    $JwtSecretKey = $this->globalvar->keytoken();
    return $jwt->encode($data,$JwtSecretKey,'HS256');
  }

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */