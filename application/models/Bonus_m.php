<?php 
class Bonus_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_bonus';
    $this->data['table_name'] = 'bonus';
  }

 

}

 ?>
