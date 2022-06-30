
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li> <i class="material-icons">card_giftcard</i> Laporan Bonus Tahunan </li>
                   
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>LAPORAN BONUS TAHUNAN</h2></center>                          
                        </div>
                        <div class="body">
                        
                      
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th style="vertical-align: middle;text-align: center;">No.</th> 
                                            <th style="vertical-align: middle;text-align: center;">Periode</th>
                                            <th style="vertical-align: middle;text-align: center;">Tahun</th>  
                                            <th style="vertical-align: middle;text-align: center;">Jumlah<br>Penima Bonus</th>  
                                            <th style="vertical-align: middle;text-align: center;">Batas Waktu<br>Penilaian Divisi</th> 
                                            <th style="vertical-align: middle;text-align: center;">Batas Waktu<br>Penilaian HRD</th>
                                            <th style="vertical-align: middle;text-align: center;">Status</th>        
                                            <th style="vertical-align: middle;text-align: center;">Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php 
                                       $i = 1; 
                                       foreach ($list_bonus as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td>
                                                <?=$row->periode?>
                                              </td> 
                                              <td>
                                                 <?=$row->tahun?>
                                              </td>  
                                              <td>
                                                 <?=$row->jumlah_bonus?>
                                              </td> 
                                              <td>
                                                 <?=$row->bataswaktu_penilaian_divisi?>
                                              </td> 
                                              <td>
                                                 <?=$row->bataswaktu_penilaian_hrd?>
                                              </td> 
                                               
                                              <td>
                                              <?php
                                                if ($row->status == 1) {
                                                  echo "Proses Input Nilai Divisi";
                                                }elseif ($row->status == 2) {
                                                  echo "Proses Input Nilai HRD";
                                                }else{
                                                  echo "Selesai";
                                                }

                                              ?></td>    
                                              
                                               <td style="vertical-align: middle;">
                                                 
                                                  
                                                  
                                                  <a href="<?=base_url('kepalatambang/bonus/'.$row->id_bonus)?>"><button class="btn bg-brown">Lihat Detail</button></a>
                                                 
                                               </td>        
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>

     
                            </div>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
 <div class="modal fade" id="tambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Form Buat Bonus Tahunan</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/bonus')?>" method="Post"  >  
                         
                                 <table class="table table-bordered"> 
                                        <tr>   
                                            <th style="vertical-align: middle;">Periode</th> 
                                            <th> 
                                                        <input name="periode" type="radio" id="periode1"  value="1" required /> 
                                                        <label  for="periode1">Satu</label>
                                                        <input name="periode" type="radio" id="periode2"   value="2" required />
                                                        <label  for="periode2">Dua</label>
                                            </th>  
                                        </tr> 
                                        <tr >   
                                            <th style="vertical-align: middle;">Tahun</th> 
                                            <th>
                                               <input type="number" class="form-control" name="tahun" max="<?=date('Y')?>"  required autofocus value="<?=date('Y')?>" >
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th style="vertical-align: middle;">Jumlah Penima Bonus</th> 
                                            <th>
                                               <input type="number" class="form-control" name="jmh" min="1"  required autofocus value="1" >
                                            </th>  
                                        </tr> 

                                        <tr>   
                                            <th style="vertical-align: middle;">Batas Waktu Penilaian Divisi</th> 
                                            <th>
                                               <input type="date" class="form-control" name="dl_divisi"   required autofocus   >
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th style="vertical-align: middle;">Batas Waktu Penilaian HRD</th> 
                                            <th>
                                               <input type="date" class="form-control" name="dl_hrd"   required autofocus   >
                                            </th>  
                                        </tr> 
                                </table>
                         
                        <input  type="submit" class="btn bg-brown btn-block"  name="tambah" value="Buat">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 