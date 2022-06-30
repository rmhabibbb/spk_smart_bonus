 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                        <li> <a href="<?=base_url('hrd/')?>"> Input Nilai</a> </li> 
                        <li> <a href="<?=base_url('hrd/penilaian/'.$bonus->id_bonus)?>"><?=$bonus->periode?>/<?=$bonus->tahun?> </a></li>  
                        <li> Hasil Penilaian Divisi</li> 
                    </ol>
                    <div class="card">
                        <div class="header">
                            <center><h2>Hasil Penilaian Divisi (Metode SMART)</h2></center>                          
                        </div>
                        <div class="body"> 

                            <h4>1. Nilai Awal Alternatif</h4> 
                            <?php $x = 1; for ($i=0; $i < sizeof($nilai_awal) ; $i++) {  ?> 
                            <table class="table table-bordered"> 
                                    <tr >   
                                        <th style="vertical-align: middle;text-align: center;" colspan="999?>"><?=$nilai_awal[$i]['nama_divisi'] ?></th> 
                                    </tr>  
                                    <?php  for ($j=0; $j < sizeof($nilai_awal[$i]['data']) ; $j++) {  ?>
                                        <?php if ($j == 0) { ?>
                                            <tr>
                                            <th style="width: 30%">Nama Karyawan</th>
                                             <?php for ($k=0; $k < sizeof($nilai_awal[$i]['data'][$j]['nilai']) ; $k++) {  ?>
                                                <th style="text-align: center;">J<?=$x++; ?></th>
                                            <?php  } ?>
                                             
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?=$nilai_awal[$i]['data'][$j]['nama_karyawan'] ?></td>
                                            <?php for ($k=0; $k < sizeof($nilai_awal[$i]['data'][$j]['nilai']) ; $k++) {  ?>
                                                <td style="text-align: center;"><?=$nilai_awal[$i]['data'][$j]['nilai'][$k] ?></td>
                                            <?php  } ?>
                                        </tr>
                                    <?php  } ?>
                            </table>
                            <?php  } ?>

                            <hr>

                            <h4>2. Nilai Utility</h4> 
                            <?php $x = 1; for ($i=0; $i < sizeof($nilai_utility) ; $i++) {  ?> 
                            <table class="table table-bordered"> 
                                    <tr >   
                                        <th style="vertical-align: middle;text-align: center;" colspan="999?>"><?=$nilai_utility[$i]['nama_divisi'] ?></th> 
                                    </tr>  
                                    <?php  for ($j=0; $j < sizeof($nilai_utility[$i]['data']) ; $j++) {  ?>
                                        <?php if ($j == 0) { ?>
                                            <tr>
                                            <th style="width: 30%">Nama Karyawan</th>
                                             <?php for ($k=0; $k < sizeof($nilai_utility[$i]['data'][$j]['utility']) ; $k++) {  ?>
                                                <th style="text-align: center;">J<?=$x++; ?></th>
                                            <?php  } ?>
                                             
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?=$nilai_utility[$i]['data'][$j]['nama_karyawan'] ?></td>
                                            <?php for ($k=0; $k < sizeof($nilai_utility[$i]['data'][$j]['utility']) ; $k++) {  ?>
                                                <td style="text-align: center;"><?=$nilai_utility[$i]['data'][$j]['utility'][$k]['nilai'] ?></td>
                                            <?php  } ?>
                                        </tr>
                                    <?php  } ?>
                            </table>
                            <?php  } ?>

                             <h4>3. Hasil Akhir</h4> 
                            <?php $x = 1; for ($i=0; $i < sizeof($nilai_pre) ; $i++) {  ?> 
                            <table class="table table-bordered"> 
                                    <tr >   
                                        <th style="vertical-align: middle;text-align: center;" colspan="999?>"><?=$nilai_pre[$i]['nama_divisi'] ?></th> 
                                    </tr>  
                                    <?php  for ($j=0; $j < sizeof($nilai_pre[$i]['data']) ; $j++) {  ?>
                                        <?php if ($j == 0) { ?>
                                            <tr>
                                            <th style="width: 30%">Nama Karyawan</th>
                                             <?php for ($k=0; $k < sizeof($nilai_pre[$i]['data'][$j]['nilai_pre']) ; $k++) {  ?>
                                                <th style="text-align: center;">J<?=$x++; ?></th>
                                            <?php  } ?>
                                            <th style="text-align: center;">Hasil</th>
                                             
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?=$nilai_pre[$i]['data'][$j]['nama_karyawan'] ?></td>
                                            <?php $z = 0; for ($k=0; $k < sizeof($nilai_pre[$i]['data'][$j]['nilai_pre']) ; $k++) {
                                                $z = $z + $nilai_pre[$i]['data'][$j]['nilai_pre'][$k]['nilai'];
                                              ?>
                                                <td style="text-align: center;"><?= round($nilai_pre[$i]['data'][$j]['nilai_pre'][$k]['nilai'],4) ?></td>
                                            <?php  } ?>
                                            <th style="text-align: center;"><?=round($z,4)?></th>
                                        </tr>
                                    <?php  } ?>
                            </table>
                            <?php  } ?>


                            <a href="<?=base_url('hrd/penilaian/'.$bonus->id_bonus)?>"><button class="btn bg-brown">Kembali</button></a>
                            

                            <hr>


                         </div>
                    </div> 
 
                    
                </div>
    </div>
</section>
  
 <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Form Edit Bonus Tahunan</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/bonus')?>" method="Post"  >  
                         
                                 <table class="table table-bordered"> 
                                        <tr >   
                                            <th style="vertical-align: middle;">ID Bonus</th> 
                                            <th>
                                               <input type="hidden" class="form-control" name="id_bonus"  value="<?=$bonus->id_bonus?>" ><?=$bonus->id_bonus?>
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th style="vertical-align: middle;">Periode/Tahun</th> 
                                            <th> 
                                                       <?=$bonus->periode?>/<?=$bonus->tahun?>
                                            </th>  
                                        </tr> 
                                        
                                        <tr>   
                                            <th style="vertical-align: middle;">Jumlah Penima Bonus</th> 
                                            <th>
                                               <input type="number" class="form-control" name="jmh" min="1"  required autofocus value="<?=$bonus->jumlah_bonus?>" >
                                            </th>  
                                        </tr> 

                                        <tr>   
                                            <th style="vertical-align: middle;">Batas Waktu Penilaian Divisi</th> 
                                            <th>
                                               <input type="date" class="form-control" name="dl_divisi"   required autofocus value="<?=$bonus->bataswaktu_penilaian_divisi?>"   >
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th style="vertical-align: middle;">Batas Waktu Penilaian HRD</th> 
                                            <th>
                                               <input type="date" class="form-control" name="dl_hrd"   required autofocus value="<?=$bonus->bataswaktu_penilaian_hrd?>"   >
                                            </th>  
                                        </tr> 
                                </table>
                         
                        <input  type="submit" class="btn bg-brown btn-block"  name="edit" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div>

 <div class="modal fade" id="delete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus Data Bonus?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan data ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/bonus')?>" method="Post" > 
                                        <input type="hidden" value="<?=$bonus->id_bonus?>" name="id_bonus">  
                                        <input  type="submit" class="btn bg-red btn-block "  name="hapus" value="Ya">
                                         
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <button type="button"  class="btn bg-green btn-block" data-dismiss="modal">Tidak</button>
                                    </div>
                            <?php echo form_close() ?> 
                                </div>
                        </div> 
                    </div>
                </div>
    </div>

   <div class="modal fade" id="selesai" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Tahap Penilaian Divisi telah selesai?</center></h4> 
                            <center><span style="color :red"><i>beralih ke tahap penilaian HRD</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/bonus')?>" method="Post" > 
                                        <input type="hidden" value="<?=$bonus->id_bonus?>" name="id_bonus">  
                                        <input  type="submit" class="btn bg-green btn-block "  name="selesai" value="Ya">
                                         
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <button type="button"  class="btn bg-red btn-block" data-dismiss="modal">Tidak</button>
                                    </div>
                            <?php echo form_close() ?> 
                                </div>
                        </div> 
                    </div>
                </div>
    </div>