<?php 
class PenilaianDivisi_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id';
    $this->data['table_name'] = 'penilaian_divisi';
  }

  public function SMART($id_bonus){ 
    $list_divisi = $this->Divisi_m->get();
    $list_penilaian = $this->PenilaianDivisi_m->get(['id_bonus' => $id_bonus ]);

    $nilai_awal = array(); 
    $bobot = array();
    $nilai_utility = array();
    $nilai_pre = array();
    $nilai_akhir = array();

    foreach ($list_divisi as $d) {
      $list_kriteria = $this->KriteriaJobdesk_m->get(['kd_divisi' => $d->kd_divisi]);
      $list_karyawan = $this->Karyawan_m->get(['kd_divisi' => $d->kd_divisi]);
      
      $b = array();
      foreach ($list_karyawan as $kar) { 
        $a = array();
        foreach ($list_kriteria as $k) {

          if ($this->PenilaianDivisi_m->get_num_row(['id_bonus' => $id_bonus, 'id_kriteria_jobdesk' => $k->id_kriteria_jobdesk, 'nip' => $kar->nip]) != 0) {
            $nilai = $this->PenilaianDivisi_m->get_row(['id_bonus' => $id_bonus, 'id_kriteria_jobdesk' => $k->id_kriteria_jobdesk, 'nip' => $kar->nip])->nilai;
          }else{
            $nilai = 0;
          }
          
          array_push($a, $nilai);
        }
        array_push($b, ['nip' => $kar->nip, 'nama_karyawan' => $kar->nama, 'nilai' => $a]);
      }

      array_push($nilai_awal, ['kd_divisi' => $d->kd_divisi, 'nama_divisi' => $d->nama_divisi, 'data' => $b]);   
    }

    foreach ($list_divisi as $d) {
      $list_kriteria = $this->KriteriaJobdesk_m->get(['kd_divisi' => $d->kd_divisi]);
      $b = array();
      $total = 0;
      foreach ($list_kriteria as $l) { 
        $total =  $total + $l->bobot;
      } 
      foreach ($list_kriteria as $l) {  
        $max = $this->DSubJobdesk_m->get_max($l->id_kriteria_jobdesk);
        $min = $this->DSubJobdesk_m->get_min($l->id_kriteria_jobdesk); 

        $bm = $l->bobot/$total;  
        array_push($b, ['id_kriteria_jobdesk' => $l->id_kriteria_jobdesk, 'nama_kriteria' => $l->nama_kriteria, 'bobot' => $l->bobot, 'normalisasi' => $bm ,'max' => $max, 'min' => $min]);
      }  
      array_push($bobot, ['kd_divisi' => $d->kd_divisi, 'nama_divisi' => $d->nama_divisi, 'data' => $b]);
    }


    for ($i=0; $i < sizeof($nilai_awal) ; $i++) {  
      $b = array();
      for ($j=0; $j < sizeof($nilai_awal[$i]['data']) ; $j++) { 
        $a = array();
        for ($k=0; $k < sizeof($nilai_awal[$i]['data'][$j]['nilai']) ; $k++) {

          if($nilai_awal[$i]['data'][$j]['nilai'][$k] == 0){
            $x = 0;
          }else{
            $x = ($nilai_awal[$i]['data'][$j]['nilai'][$k] - $bobot[$i]['data'][$k]['min'])/ ( $bobot[$i]['data'][$k]['max'] - $bobot[$i]['data'][$k]['min']); 
          }
          
            
          array_push($a, ['id_kriteria_jobdesk' => $bobot[$i]['data'][$k]['id_kriteria_jobdesk'], 'nama_kriteria' => $bobot[$i]['data'][$k]['nama_kriteria'], 'nilai' => $x]);
        }
        array_push($b, ['nip' => $nilai_awal[$i]['data'][$j]['nip'] , 'nama_karyawan' => $nilai_awal[$i]['data'][$j]['nama_karyawan'] , 'utility' => $a ]);
      }
      array_push($nilai_utility, ['kd_divisi' => $nilai_awal[$i]['kd_divisi'], 'nama_divisi' => $nilai_awal[$i]['nama_divisi'], 'data' => $b]);
    }

 

 
    for ($i=0; $i < sizeof($nilai_utility) ; $i++) {  
      $b = array();
      for ($j=0; $j < sizeof($nilai_utility[$i]['data']) ; $j++) { 
        $a = array();
        for ($k=0; $k < sizeof($nilai_utility[$i]['data'][$j]['utility']) ; $k++) { 
          $x =  $nilai_utility[$i]['data'][$j]['utility'][$k]['nilai'] * $bobot[$i]['data'][$k]['normalisasi'];
          array_push($a, ['id_kriteria_jobdesk' => $bobot[$i]['data'][$k]['id_kriteria_jobdesk'], 'nama_kriteria' => $bobot[$i]['data'][$k]['nama_kriteria'], 'nilai' => $x]);
        }
        array_push($b, ['nip' => $nilai_utility[$i]['data'][$j]['nip'] , 'nama_karyawan' => $nilai_utility[$i]['data'][$j]['nama_karyawan'] , 'nilai_pre' => $a ]);
      }
      array_push($nilai_pre, ['kd_divisi' => $nilai_utility[$i]['kd_divisi'], 'nama_divisi' => $nilai_utility[$i]['nama_divisi'], 'data' => $b]);
    } 
         
    for ($i=0; $i < sizeof($nilai_pre) ; $i++) {  
      $b = array();
      for ($j=0; $j < sizeof($nilai_pre[$i]['data']) ; $j++) { 
        $a = array();
        $x = 0;
        for ($k=0; $k < sizeof($nilai_pre[$i]['data'][$j]['nilai_pre']) ; $k++) { 
          $x = $x + $nilai_pre[$i]['data'][$j]['nilai_pre'][$k]['nilai'];
        }
        array_push($nilai_akhir, ['nip' => $nilai_pre[$i]['data'][$j]['nip'] , 'nama_karyawan' => $nilai_pre[$i]['data'][$j]['nama_karyawan'] , 'nilai' => $x ]);
      } 
    } 

    $this->data['nilai_awal'] = $nilai_awal; 
    $this->data['nilai_utility'] = $nilai_utility; 
    $this->data['nilai_pre'] = $nilai_pre; 
    $this->data['nilai_akhir'] = $nilai_akhir; 
    $this->data['bobot'] = $bobot; 

    return $this->data; 
  }
 
}

 ?>
