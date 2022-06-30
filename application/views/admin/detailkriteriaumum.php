 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/kriteriaumum')?>"><i class="material-icons">public</i> Kelola Data Kriteria Umum</a> </li> 
                        <li> <i class="material-icons">class</i> <?=$kriteria->nama_kriteria?> </li>  
                    </ol>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                    
                                     <tr>
                                         <th style="width: 30%">
                                             ID Kriteria
                                         </th>
                                         <td> 
                                          
                                            <?=$kriteria->id_kriteria_umum?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Nama Kriteria
                                         </th>
                                         <td> 
                                          
                                            <?=$kriteria->nama_kriteria?>
 
                                         </td>
                                     </tr>  
                                     <tr>
                                         <th style="width: 30%">
                                             Bobot
                                         </th>
                                         <td> 
                                          
                                            <?=$kriteria->bobot?>
 
                                         </td>
                                     </tr>
                                      <tr>
                                         <th style="width: 30%">
                                             Normalisasi Bobot
                                         </th>
                                         <td> 
                                          
                                          <?= round(($kriteria->bobot/$totalbobot), 4) ?>
 
                                         </td>
                                     </tr> 
                                      
                                   
                                </tbody>

                            </table>  
                            <center>
                            <a data-toggle="modal" data-target="#delete"  href=""><button class="btn bg-red">Hapus</button></a>
                            <a data-toggle="modal" data-target="#edit"  href=""><button class="btn bg-brown">Edit</button></a> 
                             </center>
                         </div>
                    </div>
                    <div class="card">
                      <div class="header">
                            <center><h2>Detail</h2></center>                          
                        </div>
                        <div class="body">
                        <a data-toggle="modal" data-target="#tambahsub"  href=""><button class="btn bg-brown">Tambah Detail</button></a>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>No.</th> 
                                            <th>Keterangan</th>  
                                            <th>Nilai</th>   
                                            <th>Aksi</th>  
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php 

                                      $i = 1;   
                                      foreach ($list_detail as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?></a></td>  
                                              <td><?=$row->keterangan?></td>   
                                              <td><?=$row->nilai?></td>   
                                              
                                               <td style="vertical-align: middle;"> 
                                                    
                                                  <a data-toggle="modal" data-target="#edit-<?=$row->id_sub_umum?>"  href=""><button class="btn bg-brown"> Edit</button></a>
                                                  

                                                  <a data-toggle="modal" data-target="#delete-<?=$row->id_sub_umum?>"  href=""><button class="btn bg-red">Hapus</button></a>
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
</section>
 
 
<div class="modal fade" id="edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header"> 
              <h4 class="modal-title" id="defaultModalLabel"><center>EDIT KRITERIA</center></h4>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/kriteriaumum')?>" method="Post"  >   
                          <input type="hidden" class="form-control" name="id_kriteria_umum" placeholder="ID Kriteria" required  value="<?=$kriteria->id_kriteria_umum?>" > 
                           <table class="table table-bordered"> 
                          <tr>   
                              <th>Nama Kriteria</th> 
                              <th>
                                 <input type="text" class="form-control" name="nama_kriteria" placeholder="Masukkan Nama Kriteria" required autofocus  value="<?=$kriteria->nama_kriteria?>" >
                              </th>  
                          </tr> 
                           <tr>   
                              <th>Bobot Kriteria</th> 
                              <th>
                                 <input type="text" class="form-control" name="bobot" placeholder="Masukkan Bobot Kriteria" required autofocus  value="<?=$kriteria->bobot?>" >
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
 
<div class="modal fade" id="tambahsub" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>TAMBAH DETAIL</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/detailkriteriaumum')?>" method="Post"  >  
                            
                            <input type="hidden" name="id_kriteria_umum" value="<?=$kriteria->id_kriteria_umum?>"> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required autofocus  >
                                    </div>
                          </div>
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="nunmber" class="form-control" name="nilai" placeholder="Nilai" min="1" required autofocus  >
                                    </div>
                          </div>    
                                
                        <input  type="submit" class="btn bg-brown btn-block"  name="tambah" value="Tambah">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 
 

<?php $i = 1; foreach ($list_detail as $row): ?> 
  <div class="modal fade" id="edit-<?=$row->id_sub_umum?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT DETAIL</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/detailkriteriaumum')?>" method="Post"  > 
 
                            <input type="hidden" value="<?=$kriteria->id_kriteria_umum?>" name="id_kriteria_umum">  
                            <input type="hidden" value="<?=$row->id_sub_umum?>" name="id_sub_umum">   
                            
                            
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required autofocus value="<?=$row->keterangan?>"  >
                                    </div>
                          </div> 

                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="nunmber" class="form-control" name="nilai" placeholder="Nilai" min="1" required autofocus value="<?=$row->nilai?>" >
                                    </div>
                          </div>    
 

                            <input  type="submit" class="btn bg-brown btn-block"  name="edit" value="Simpan">  <br><br>
                      
                                <?php echo form_close() ?> 
                            </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                            </div>
                    </div>
                </div>
    </div> 
<?php endforeach; ?>



<?php $i = 1; foreach ($list_detail as $row): ?> 
 <div class="modal fade" id="delete-<?=$row->id_sub_umum?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data detail?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan detail ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/detailkriteriaumum')?>" method="Post" > 
                                        <input type="hidden" value="<?=$kriteria->id_kriteria_umum?>" name="id_kriteria_umum">  
                                        <input type="hidden" value="<?=$row->id_sub_umum?>" name="id_sub_umum">  
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
<?php endforeach; ?>

 <div class="modal fade" id="delete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data kriteria?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan <?=$kriteria->nama_kriteria?> akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/kriteriaumum')?>" method="Post" > 
                                        <input type="hidden" value="<?=$kriteria->id_kriteria_umum?>" name="id_kriteria_umum">  
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