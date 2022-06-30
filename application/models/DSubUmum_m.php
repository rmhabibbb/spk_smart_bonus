<?php 
class DSubUmum_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_sub_umum';
    $this->data['table_name'] = 'detailsubkriteria_umum';
  }

  public function get_max($id){ 
    $this->db->select('MAX(nilai) AS max');
    $this->db->where('id_kriteria_umum' , $id);
    return $this->db->get($this->data['table_name'])->row()->max; 
  }

  public function get_min($id){ 
    $this->db->select('MIN(nilai) AS min');
    $this->db->where('id_kriteria_umum' , $id);
    return $this->db->get($this->data['table_name'])->row()->min; 
  }
 

}

 ?>
