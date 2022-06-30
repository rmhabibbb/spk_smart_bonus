
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/divisi')?>"><i class="material-icons">domain</i> Kelola Data divisi</a> </li>  
                    <li> <?=$divisi->nama_divisi?></li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>FORM EDIT divisi</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/divisi/') ?>
                            <input type="hidden" name="email_x" value="<?=$divisi->email?>">
                            <input type="hidden" name="kd_divisi_x" value="<?=$divisi->kd_divisi?>">
                            <fieldset> 
                                <div class="form-group">
                                    <div class="form-line">
                                         <div class="row">
                                             <div class="col-md-4">
                                                 <label class="control-label">Kode Divisi</label>
                                                 <input type="text" name="kd_divisi" class="form-control" placeholder="Masukkan Kode divisi"  required value="<?=$divisi->kd_divisi?>" >
                                                 
                                             </div>  
                                             <div class="col-md-4">
                                                 <label class="control-label">Nama divisi</label>
                                                 <input type="text" name="nama_divisi" class="form-control" placeholder="Masukkan Nama divisi"  required value="<?=$divisi->nama_divisi?>" >
                                                 
                                             </div>  
                                             
                                             <div class="col-md-4">
                                                 <label class="control-label">Email divisi</label>
                                                 <input type="email" name="email" class="form-control" placeholder="Masukkan Email divisi"  required  value="<?=$divisi->email?>">
                                                 
                                             </div> 
 
                                         </div> 

                                   </div>
                                 </div>
 
                                <div class="form-group">

                                    <div class="form-line">
                                        <div class="row">
                                             <div class="col-md-12">
                                                 <label class="control-label">Deskripsi</label>
                                                 <textarea  name="deskripsi" class="form-control"  placeholder="Masukkan Deskripsi" ><?=$divisi->deskripsi?></textarea> 
                                                 
                                             </div>  
                                         </div> 
                                   </div>
                                 </div>
                            </fieldset> 
                            <a  style="" data-toggle="modal" data-target="#hapus"  href=""><button class="btn bg-red">Hapus</button></a> 
                            <a  style="" data-toggle="modal" data-target="#ganti"  href=""><button class="btn bg-blue">Ganti Password</button></a> 
                            <center>
                                 
                            <input  type="submit" class="btn bg-brown"  name="edit" value="Simpan"> 
                            </center>

                             <br><br>
                             <?php echo form_close() ?> 

     
                            </div>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
  <div class="modal fade" id="ganti" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Form Ganti Password</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/divisi')?>" method="Post"  >  
                            <input type="hidden" name="email" value="<?=$divisi->email?>">
                            <input type="hidden" name="kd_divisi" value="<?=$divisi->kd_divisi?>">
                         
                                 <table class="table table-bordered"> 
                                        <tr>   
                                            <th>Password Baru</th> 
                                            <th>
                                               <input type="Password" class="form-control" name="password" placeholder="Masukkan Password Baru" required autofocus >
                                            </th>  
                                        </tr> 
                                </table>
                         
                        <input  type="submit" class="btn bg-brown btn-block"  name="edit2" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
<div class="modal fade" id="hapus" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data divisi?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan data divisi ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/divisi')?>" method="Post" >  
                                        <input type="hidden" value="<?=$divisi->email?>" name="email">  
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
