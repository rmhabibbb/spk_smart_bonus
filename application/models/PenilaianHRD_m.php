<?php 
class PenilaianHRD_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_penilaian_hrd';
    $this->data['table_name'] = 'penilaian_hrd';
  }

  public function SMART($id_bonus){ 
    $list_karyawan = $this->Karyawan_m->get();
    $list_kriteria = $this->KriteriaUmum_m->get();
    $list_penilaian = $this->PenilaianDivisi_m->get(['id_bonus' => $id_bonus ]);

    $nilai_awal = array(); 
    $bobot = array();
    $nilai_utility = array();
    $nilai_pre = array();
    $nilai_akhir = array();
   
	foreach ($list_karyawan as $kar) { 
	  	$a = array();
	 	foreach ($list_kriteria as $k) {

      if ($this->PenilaianHRD_m->get_num_row(['id_bonus' => $id_bonus, 'id_kriteria_umum' => $k->id_kriteria_umum, 'nip' => $kar->nip]) != 0) {
        $nilai = $this->PenilaianHRD_m->get_row(['id_bonus' => $id_bonus, 'id_kriteria_umum' => $k->id_kriteria_umum, 'nip' => $kar->nip])->nilai;
      }else{
        $nilai = 0;
      }

  	 	array_push($a, $nilai);
  	}
  	array_push($nilai_awal, ['nip' => $kar->nip, 'nama_karyawan' => $kar->nama, 'nilai' => $a]);
	} 	

	
    

    
  	$total = 0;
    foreach ($list_kriteria as $l) { 
  	  	$total =  $total + $l->bobot;
  	} 
	foreach ($list_kriteria as $l) {  
		$max = $this->DSubUmum_m->get_max($l->id_kriteria_umum);
	  	$min = $this->DSubUmum_m->get_min($l->id_kriteria_umum); 
	  	$bm = $l->bobot/$total;  
	    array_push($bobot, ['id_kriteria_umum' => $l->id_kriteria_umum, 'nama_kriteria' => $l->nama_kriteria, 'bobot' => $l->bobot, 'normalisasi' => $bm ,'max' => $max, 'min' => $min]);
	}  
      

    for ($i=0; $i < sizeof($nilai_awal) ; $i++) {  
      $a = array(); 
      for ($j=0; $j < sizeof($nilai_awal[$i]['nilai']) ; $j++) { 
      	
      	 	if($nilai_awal[$i]['nilai'][$j] == 0){
            $x = 0;
          }else{
           $x = ($nilai_awal[$i]['nilai'][$j] - $bobot[$j]['min'])/ ( $bobot[$j]['max'] - $bobot[$j]['min']); 
          }	
        	array_push($a, ['id_kriteria_umum' =>$bobot[$j]['id_kriteria_umum'], 'nama_kriteria' => $bobot[$j]['nama_kriteria'], 'nilai' => $x]); 
      }
      array_push($nilai_utility, ['nip' => $nilai_awal[$i]['nip']  , 'nama_karyawan' => $nilai_awal[$i]['nama_karyawan'] , 'utility' => $a ]);
    } 


	for ($i=0; $i < sizeof($nilai_utility) ; $i++) {  
      $a = array(); 
      for ($j=0; $j < sizeof($nilai_utility[$i]['utility']) ; $j++) { 
      	
      	 	$x = $nilai_utility[$i]['utility'][$j]['nilai'] * $bobot[$j]['normalisasi'];
      	 	 	
        	array_push($a, ['id_kriteria_umum' =>$bobot[$j]['id_kriteria_umum'], 'nama_kriteria' => $bobot[$j]['nama_kriteria'], 'nilai' => $x]); 
      }
      array_push($nilai_pre, ['nip' => $nilai_utility[$i]['nip']  , 'nama_karyawan' => $nilai_utility[$i]['nama_karyawan'] , 'nilai_pre' => $a ]);
    } 
 
         
    for ($i=0; $i < sizeof($nilai_pre) ; $i++) {  
      $a = array(); 
      $x = 0;
      for ($j=0; $j < sizeof($nilai_pre[$i]['nilai_pre']) ; $j++) { 
      	
      	 	$x = $x + $nilai_pre[$i]['nilai_pre'][$j]['nilai'];
      	 	 
      }
      array_push($nilai_akhir, ['nip' => $nilai_utility[$i]['nip']  , 'nama_karyawan' => $nilai_utility[$i]['nama_karyawan'] , 'nilai' => $x ]);
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
