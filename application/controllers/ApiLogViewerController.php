<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ApiLogViewerController extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    echo $this->logViewer->showLogs();
  }

}


/* End of file ApiLogViewerController.php */
/* Location: ./application/controllers/ApiLogViewerController.php */