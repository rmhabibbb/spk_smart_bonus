 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                        <li> <a href="<?=base_url('hrd/bonus')?>"><i class="material-icons">card_giftcard</i> Bonus Tahunan</a> </li> 
                        <li> Periode <?=$bonus->periode?>/<?=$bonus->tahun?></li>  
                    </ol>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                    
                                     <tr>
                                         <th style="width: 30%">
                                             ID Bonus
                                         </th>
                                         <td> 
                                          
                                            <?=$bonus->id_bonus?>

                                         </td>
                                     </tr>
                                      
                                     <tr>
                                         <th style="width: 30%">
                                             Periode/Tahun
                                         </th>
                                         <td> 
                                          
                                           <?=$bonus->periode ?>/<?=$bonus->tahun?>
 
                                         </td>
                                     </tr> 
                                     <tr>
                                         <th style="width: 30%">
                                             Jumlah Penerima Bonus
                                         </th>
                                         <td> 
                                           <?=$bonus->jumlah_bonus ?>
                                         </td>
                                     </tr>  

                                     <?php
                                            if ($bonus->status == 2 || $bonus->status == 3) { ?>

                                        <tr>
                                          <th>Hasil Penilaian Divisi</th>
                                          <td>
                                            <a href="<?=base_url('hrd/bonus/hasildivisi/'.$bonus->id_bonus)?>">Lihat Hasil</a>
                                          </td>
                                        </tr>
                                     <?php  } ?>

                                     <?php
                                            if ($bonus->status == 3) { ?>

                                        <tr>
                                          <th>Hasil Penilaian HRD</th>
                                          <td>
                                            <a href="<?=base_url('hrd/bonus/hasilhrd/'.$bonus->id_bonus)?>">Lihat Hasil</a>
                                          </td>
                                        </tr>
                                     <?php  } ?>
                                     <tr>
                                         <th style="width: 30%">
                                             Status Bonus
                                         </th>
                                         <td> 
                                           <?php
                                                if ($bonus->status == 2) {
                                                  echo "Proses Input Nilai HRD : "; ?>
                                                
                                                    <?php 
                                                      $list_karyawan = $this->Karyawan_m->get(); 
                                                      $n = sizeof($list_karyawan);   
                                                      $x = 0;
                                                      foreach ($list_karyawan as $k) {
                                                        if ($this->PenilaianHRD_m->get_num_row(['nip' => $k->nip,'id_bonus' => $bonus->id_bonus]) != 0) { 
                                                          $x++;
                                                        }
                                                      }

                                                     ?> 
                                                         <?php 

                                                         if ($x == $n) {
                                                           echo "<i style='color : green'>";
                                                         }else {
                                                           echo "<i style='color : red'>";
                                                         }

                                                         ?>
                                                         
                                                          
                                                            <?=$x?>/<?=$n?> Karyawan

                                                         </i>
                                                    
                                                  
                                                <?php  }elseif ($bonus->status == 1) {
                                                  echo "Proses Input Nilai Divisi : ";  
                                                 ?>
                                           
                                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                              <tbody>
                                                  <?php foreach ($list_divisi as $d) { ?>
                                                    <?php 
                                                      $n = $this->Karyawan_m->get_num_row(['kd_divisi' => $d->kd_divisi]);
                                                      $list_karyawan = $this->Karyawan_m->get(['kd_divisi' => $d->kd_divisi]);   
                                                      $x = 0;
                                                      foreach ($list_karyawan as $k) {
                                                        if ($this->PenilaianDivisi_m->get_num_row(['nip' => $k->nip,'id_bonus' => $bonus->id_bonus]) != 0) { 
                                                          $x++;
                                                        }
                                                      }

                                                     ?>
                                                      <tr>
                                                         <td style="width: 30%">
                                                             <?=$d->nama_divisi?>
                                                         </td>
                                                         <?php 

                                                         if ($x == $n) {
                                                           echo "<td style='color : green'>";
                                                         }else {
                                                           echo "<td style='color : red'>";
                                                         }

                                                         ?>
                                                         
                                                          
                                                            <?=$x?>/<?=$n?> Karyawan

                                                         </td>
                                                     </tr> 
                                                  <?php } ?>
                                                   
                                              </tbody>

                                          </table> 

                                            <?php
 
                                                }else{
                                                  echo "Selesai";
                                                }

                                              ?>
                                         </td>
                                     </tr> 


                                     <?php if ($bonus->status == 1) { ?>
                                       <tr>
                                         <th style="width: 30%">
                                             Batas Waktu Penilaian Divisi
                                         </th>
                                         <td> 
                                           <?= date('d-m-Y',strtotime($bonus->bataswaktu_penilaian_divisi)) ?>
                                         </td>
                                     </tr>   
                                     <?php }elseif ($bonus->status == 2) { ?>
                                      <tr>
                                         <th style="width: 30%">
                                             Batas Waktu Penilaian HRD
                                         </th>
                                         <td> 
                                           <?= date('d-m-Y',strtotime($bonus->bataswaktu_penilaian_hrd)) ?>
                                         </td>
                                     </tr>   
                                     <?php } ?>
                                       
                                </tbody>

                            </table>   
                            

                            <?php  if ($bonus->status == 3) { ?>
                             <table class="table table-bordered"> 
                                    <tr>
                                        <th style="text-align: center;">Peringkat</th>
                                        <th style="text-align: center;">ID Karyawan</th>
                                        <th style="text-align: center;">Nama Karyawan</th>
                                        <th style="text-align: center;">Divisi</th>
                                        <th style="text-align: center;">Penilaian Jobdesk</th>
                                        <th style="text-align: center;">Penilaian Umum</th>
                                        <th style="text-align: center;">Hasil</th>
                                         
                                    </tr>
                                    <?php $p = 1; for ($i=0; $i < sizeof($ha) ; $i++) {  
                                      $kar= $this->Karyawan_m->get_row(['nip' => $ha[$i]['nip']]);
                                      $divisi = $this->Divisi_m->get_row(['kd_divisi' => $kar->kd_divisi]); 
                                      ?> 
                                      <?php if($p <= $bonus->jumlah_bonus) { ?>  
                                          <tr style="color:green">
                                      <?php }else { ?> 
                                          <tr>
                                      <?php } ?>
                                        
                                            <td style="text-align: center;"><?=$p++?></td>
                                            <td style="text-align: center;"><?=$ha[$i]['nip'] ?></td>
                                            <td style="text-align: center;"><?=$ha[$i]['nama_karyawan'] ?></td>
                                            <td style="text-align: center;"><?=$divisi->nama_divisi ?></td>

                                            <td style="text-align: center;"><?= round($ha[$i]['divisi'],3) ?></td>
                                            <td style="text-align: center;"><?= round($ha[$i]['hrd'],3) ?></td>
                                     
                                            <th style="text-align: center;"><?= round($ha[$i]['hasil_akhir'],3) ?></th> 
                                        </tr>
                                    <?php  } ?>
                            </table> 
                            <?php } ?>
                         </div>
                    </div> 
 
                    
                </div>
    </div>
</section>
   