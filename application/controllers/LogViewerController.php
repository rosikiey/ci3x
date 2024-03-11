<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LogViewerController extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->logViewer = new \CILogViewer\CILogViewer();
  }

  public function index()
  {
    echo $this->logViewer->showLogs();
    return; 
  }

}


/* End of file LogViewerController.php */
/* Location: ./application/controllers/LogViewerController.php */