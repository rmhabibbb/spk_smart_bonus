<?php 
class KriteriaJobdesk_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_kriteria_jobdesk';
    $this->data['table_name'] = 'kriteria_jobdesk';
  }

  public function get_totalbobot($id){
  		$this->db->select('sum(bobot) as total'); 
  		$this->db->where('kd_divisi' , $id);
		return $this->db->get($this->data['table_name'])->row()->total;
  }

 

}

 ?>
