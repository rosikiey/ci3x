<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Mcustomer_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Mcustomer_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function get_customer($id)
  {
    $SQL = " select * from customer c where kode_cust like '$id%' ";

    return $this->db->query($SQL);
  }


  // ------------------------------------------------------------------------

}

/* End of file Mcustomer_model.php */
/* Location: ./application/models/Mcustomer_model.php */