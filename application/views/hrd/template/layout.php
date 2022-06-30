<?php
$data =[ 
  'index' => $index
];
$this->load->view('hrd/template/header',$data);
$this->load->view('hrd/template/navbar');
$this->load->view('hrd/template/sidebar',$data);
$this->load->view($content);
$this->load->view('hrd/template/footer');
 ?>
