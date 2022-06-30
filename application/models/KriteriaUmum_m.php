<?php 
class KriteriaUmum_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_kriteria_umum';
    $this->data['table_name'] = 'kriteria_umum';
  }

  public function get_totalbobot(){
  		$this->db->select('sum(bobot) as total'); 
		return $this->db->get($this->data['table_name'])->row()->total;
  }

 

}

 ?>
