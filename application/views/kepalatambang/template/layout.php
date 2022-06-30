<?php
$data =[ 
  'index' => $index
];
$this->load->view('kepalatambang/template/header',$data);
$this->load->view('kepalatambang/template/navbar');
$this->load->view('kepalatambang/template/sidebar',$data);
$this->load->view($content);
$this->load->view('kepalatambang/template/footer');
 ?>
