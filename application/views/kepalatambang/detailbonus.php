 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li> <a href="<?=base_url('hrd/bonus')?>"><i class="material-icons">card_giftcard</i> Laporan Bonus Tahunan</a> </li> 
                        
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

                                     
                                     <tr>
                                         <th style="width: 30%">
                                             Status Bonus
                                         </th>
                                         <td> 
                                            Selesai 
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
                         </div>
                    </div> 
 
                    
                </div>
    </div>
</section>
   