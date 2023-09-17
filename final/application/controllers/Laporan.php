<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//create a pdf for users to download
class Laporan extends CI_Controller {

  public function index()
  {
    $this->load->library('mypdf');
    $data['data'] = array(
      ['id'=>'001','name'=>'Ronaldo','e-mail'=>'junyi.fan@uqconnect.edu.au'],
      ['id'=>'002', 'name'=>'Kaka', 'e-mail'=>'fanjunyi1998@163.com']
    );
    $this->mypdf->generate('dompdf', $data, 'infs7202-Mypdf', 'A4', 'landscape');
  }

}
