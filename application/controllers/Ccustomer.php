<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Ccustomer extends RestController
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mcustomer_model');
    $this->load->database();
  }

  public function customer_get()
  {
    $id = $this->get( 'id' );
    $headers = $this->input->request_headers(); 
    if (isset($headers['Authorization'])) {
      $jwt = new JWT();
      $JwtSecretKey = "myScrettKey";
      $decodedToken = $jwt->decode($headers['Authorization'],$JwtSecretKey,'HS256');
      if ($decodedToken) {
        $dCustomer = $this->Mcustomer_model->get_customer($id);
        $r_dCustomer = $dCustomer->row();
        if (isset($r_dCustomer)) {
          $data['customer'] =  $dCustomer->result();
          $data['rtoken'] =  $decodedToken;
          $data['status'] = true;
          $this->response( $data, 200 );
        } else {
          $this->response( [
            'status' => false,
            'message' => 'No users were found'
          ], 404 );
        }
      } else {
        $this->response( [
          'status' => false,
          'message' => 'Invalid Token'
        ], 404 );
      }
    }else{
      $this->response( [
        'status' => false,
        'message' => 'Authorization Failed'
      ], 404 );
    }
  }

  public function customerr_get()
  {
    $cek_token = $this->Auth_model->Auth_cektoken();
    if(!$cek_token){
      $this->response( [
        'status' => false,
        'message' => 'Authorization Failed'
      ], 401 );
      exit;
    }

    $id = $this->get( 'id' );
    $dCustomer = $this->Mcustomer_model->get_customer($id);
    $r_dCustomer = $dCustomer->row();
    if (isset($r_dCustomer)) {
      $data['customer'] =  $dCustomer->result();
      $data['status'] = true;
      $this->response( $data, 200 );
    } else {
      $this->response( [
        'status' => false,
        'message' => 'No users were found'
      ], 404 );
    }
  }

}


/* End of file Ccustomer.php */
/* Location: ./application/controllers/Ccustomer.php */