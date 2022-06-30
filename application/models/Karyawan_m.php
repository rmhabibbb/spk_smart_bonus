<?php 
class Karyawan_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'nip';
    $this->data['table_name'] = 'karyawan';
  }

 public function get_nilai($id,$id_karyawan){
          $smart_divisi = $this->PenilaianDivisi_m->SMART($id);
          $smart_hrd = $this->PenilaianHRD_m->SMART($id);
          $hasilakhir = array();
          for ($i=0; $i < sizeof($smart_hrd['nilai_akhir']) ; $i++) { 

            if ($id_karyawan == $smart_hrd['nilai_akhir'][$i]['nip']) {
              $data = [
                'hasil_akhir' => $smart_hrd['nilai_akhir'][$i]['nilai'] + $smart_divisi['nilai_akhir'][$i]['nilai'],
                'nip' => $smart_hrd['nilai_akhir'][$i]['nip'],
                'nama_karyawan' => $smart_hrd['nilai_akhir'][$i]['nama_karyawan'],
                'divisi' => $smart_divisi['nilai_akhir'][$i]['nilai'],
                'hrd' => $smart_hrd['nilai_akhir'][$i]['nilai']
              ]; 
              array_push($hasilakhir, $data);
            }
            
           

          }
          rsort($hasilakhir);
          return $hasilakhir;
}


}

 ?>
