 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                        <li> <a href="<?=base_url('divisi/')?>"> Input Nilai</a> </li> 
                        <li>   <?=$bonus->periode?>/<?=$bonus->tahun?></li>  
                    </ol>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                    
                                     <tr>
                                         <th style="width: 30%">
                                             ID Penilaian
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
                                             Status Penilaian
                                         </th>
                                         <td> 
                                           <?php  
                                              $n = $this->Karyawan_m->get_num_row(['kd_divisi' => $ddivisi->kd_divisi]);
                                              echo  $x . ' / ' . $n .' Karyawan ' ;
                                           ?>
                                         </td>
                                     </tr>   
                                     <tr>
                                         <th style="width: 30%">
                                             Batas Waktu Penilaian Divisi
                                         </th>
                                         <td> 
                                           <?= date('d-m-Y',strtotime($bonus->bataswaktu_penilaian_divisi)) ?>
                                         </td>
                                     </tr>   
                                   
                                </tbody>

                            </table>  
                            
                         </div>
                    </div>
                    <div class="card">
                      <div class="header">
                            <center><h2>NILAI KARYAWAN</h2></center>                          
                        </div>
                        <div class="body">
                        <a data-toggle="modal" data-target="#input"  href=""><button class="btn bg-brown">Input Nilai</button></a>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>ID Karyawan</th> 
                                            <th>Nama Karyawan</th> 

                                            <?php  foreach ($list_kriteria as $k): ?> 
                                              <th><?=$k->nama_kriteria?></th>  
                                            <?php endforeach; ?>
                                            <th>Aksi</th>  
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php 

                                      $i = 1;    
                                      foreach ($list_karyawan as $row): ?> 
                                        <?php if ($this->PenilaianDivisi_m->get_num_row(['nip' => $row->nip,'id_bonus' => $bonus->id_bonus]) != 0) { ?>
                                          <tr>    
                                              <td><?=$row->nip?></td>  
                                              <td><?=$row->nama?></td>  
                                              <?php  foreach ($list_kriteria as $k): ?> 
                                                <td> 
                                                  <?=$this->PenilaianDivisi_m->get_row(['nip' => $row->nip, 'id_bonus' => $bonus->id_bonus,'id_kriteria_jobdesk' => $k->id_kriteria_jobdesk])->keterangan?>
                                                </td>  
                                              <?php endforeach; ?>
                                                
                                               <td style="vertical-align: middle;"> 
                                                    <a data-toggle="modal" data-target="#edit-<?=$row->nip?>"  href=""><button  class="btn btn-block bg-brown" style="margin-bottom: 4px">Edit</button></a>
                                                    <a data-toggle="modal" data-target="#delete-<?=$row->nip?>"  href=""><button  class="btn btn-block bg-red">Hapus</button></a>
                                               </td>             
                                          </tr>
                                      <?php } endforeach; ?>
                                    </tbody>
                                </table>

     
                            </div>
                        </div>
                    </div>
 
                    
                </div>
    </div>
</section>
 
 
<div class="modal fade" id="selesai" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header"> 
              <h4 class="modal-title" id="defaultModalLabel"><center>SELESAI INPUT NILAI ?</center></h4>
          </div>

                        <div class="modal-body">
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/inputnilai')?>" method="Post" > 
                                        <input type="hidden" value="<?=$bonus->id_bonus?>" name="id_bonus">  
                                        <input  type="submit" class="btn bg-green btn-block "  name="selesai" value="SELESAI">
                                         
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <button type="button"  class="btn bg-red btn-block" data-dismiss="modal">BELUM</button>
                                    </div>
                                        <?php echo form_close() ?> 
                                </div> 
                            </div> 
          </div> 
          
      </div>
  </div>
</div> 
 
<div class="modal fade" id="input" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM INPUT NILAI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('divisi/penilaian')?>" method="Post"  >  
                            
                            <input type="hidden" name="id_bonus" value="<?=$bonus->id_bonus?>">
                            <table class="table table-bordered">
                              <tr>
                                <th style="width: 30%">Nama Karyawan</th>
                                <td>
                                  <select class="form-control" name="nip" required>
                                    <option value="">Pilih Karyawan</option>
                                    <?php  foreach ($list_karyawan as $k): ?> 
                                    <?php if ($this->PenilaianDivisi_m->get_num_row(['nip' => $k->nip,'id_bonus' => $bonus->id_bonus]) == 0) { ?>
                                      <option value="<?=$k->nip?>"> [<?=$k->nip?>]  <?=$k->nama?></option>
                                    <?php } endforeach; ?>
                                  </select>
                                </td>
                              </tr>
                              <?php $i= 1; foreach ($list_kriteria as $row): ?>  
 
                                <tr>
                                    <th><?=$row->nama_kriteria?></th>
                                    <td>
                                        <select class="form-control"  required name="kriteria_<?=$row->id_kriteria_jobdesk?>">
                                            <option value="">- Pilih -</option> 
                                            <?php $list_param = $this->DSubJobdesk_m->get(['id_kriteria_jobdesk' => $row->id_kriteria_jobdesk]);?>
                                              <?php foreach ($list_param as $row2): ?>  
                                                <option value="<?=$row2->id_sub_jobdesk?>"> [<?=$row2->nilai?>] <?=$row2->keterangan?> </option> 
                                              <?php endforeach; ?> 
                                         </select> 
                                    </td>
                                </tr>
                                <?php   endforeach; ?>
                              
                            </table>
                                
                        <input  type="submit" class="btn bg-brown btn-block"  name="input" value="Input">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 
 
 

<?php $i = 1; foreach ($list_karyawan as $row): ?> 
<?php if ($this->PenilaianDivisi_m->get_num_row(['nip' => $row->nip,'id_bonus' => $bonus->id_bonus]) != 0) { ?>
  <div class="modal fade" id="edit-<?=$row->nip?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT NILAI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('divisi/penilaian')?>" method="Post"  > 
 
                            <input type="hidden" value="<?=$bonus->id_bonus?>" name="id_bonus">  
                          <table class="table table-bordered">
                              <tr>
                                <th style="width: 30%">Nama Karyawan</th>
                                <td>
                                  <input type="hidden" name="nip" value="<?=$row->nip?>">
                                  [<?=$k->nip?>] <?=$row->nama?>
                                </td>
                              </tr>
                              <?php $i= 1; foreach ($list_kriteria as $row2): ?>  
 
                                <tr>
                                    <th><?=$row2->nama_kriteria?></th>
                                    <td>
                                        <select class="form-control"  required name="kriteria_<?=$row2->id_kriteria_jobdesk?>">
                                             
                                              <?php $nilaix = $this->PenilaianDivisi_m->get_row(['id_kriteria_jobdesk' => $row2->id_kriteria_jobdesk, 'id_bonus' => $bonus->id_bonus, 'nip' => $row->nip])->id_sub_jobdesk; ?>


                                            <option value="<?=$nilaix?>"> [<?=$this->DSubJobdesk_m->get_row(['id_sub_jobdesk' => $nilaix])->nilai?>] <?=$this->DSubJobdesk_m->get_row(['id_sub_jobdesk' => $nilaix])->keterangan?></option> 
                                            <?php $list_param = $this->DSubJobdesk_m->get(['id_kriteria_jobdesk' => $row2->id_kriteria_jobdesk]);?>
                                              <?php foreach ($list_param as $row3): ?> 
                                              <?php if ($row3->id_sub_jobdesk != $nilaix) { ?>
                                                <option value="<?=$row3->id_sub_jobdesk?>"> [<?=$row3->nilai?>] <?=$row3->keterangan?> </option> 
                                              <?php } endforeach; ?> 
                                         </select> 
                                    </td>
                                </tr>
                                <?php   endforeach; ?>
                              
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
<?php } endforeach; ?>



<?php $i = 1; foreach ($list_karyawan as $row): ?>  
<?php if ($this->PenilaianDivisi_m->get_num_row(['nip' => $row->nip,'id_bonus' => $bonus->id_bonus]) != 0) { ?>
 <div class="modal fade" id="delete-<?=$row->nip?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus Nilai?</center></h4> 
                            <center><span style="color :red"><i>Nilai <?=$row->nama?> ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('divisi/penilaian')?>" method="Post" > 
                                        <input type="hidden" value="<?=$bonus->id_bonus?>" name="id_bonus"> 
                                        <input type="hidden" value="<?=$row->nip?>" name="nip">  
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
<?php } endforeach; ?>