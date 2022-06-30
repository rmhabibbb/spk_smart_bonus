
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/Karyawan')?>"><i class="material-icons">people</i> Kelola Data Karyawan</a> </li>  
                    <li>  <?=$karyawan->nama?></li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>FORM EDIT KARYAWAN</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/karyawan/') ?>
                            <div class="row">
                           
                            <div class="col-md-12">
                                <fieldset> 
                                    <div class="form-group">
                                        <div class="form-line">
                                             <div class="row">
                                                <div class="col-md-4">
                                                     <label class="control-label">ID Karyawan</label>
                                                     <input type="number" name="nip" class="form-control"   required  value="<?=$karyawan->nip?>"  >
                                                     <input type="hidden" name="nip_x"  value="<?=$karyawan->nip?>"  >
                                                     
                                                 </div>  
                                                 

                                                 <div class="col-md-4">
                                                     <label class="control-label">Nama Karyawan</label>
                                                     <input type="text" name="nama_karyawan" class="form-control" placeholder="Masukkan Nama Karyawan"  required   value="<?=$karyawan->nama?>">
                                                     
                                                 </div>  
                                                 
                                                 <div class="col-md-4">
                                                     <label class="control-label">Email Karyawan</label>
                                                     <input type="email" name="email" class="form-control" placeholder="Masukkan Email Karyawan"  required  value="<?=$karyawan->email?>" >
                                                     <input type="hidden" name="email_x"   value="<?=$karyawan->email?>" >
                                                     
                                                 </div> 
     
                                             </div> 

                                       </div>
                                     </div>
     
                                     <div class="form-group">

                                    <div class="form-line">
                                        <div class="row">
                                             <div class="col-md-4">

                                                 <label class="control-label">Divisi</label>


                                                 <select class="form-control" name="kd_divisi" required>
                                                     <option value="<?=$karyawan->kd_divisi?>"><?=$this->Divisi_m->get_row(['kd_divisi' => $karyawan->kd_divisi])->nama_divisi ?></option>
                                                     <?php foreach ($list_divisi as $d) {
                                                        if ($d->kd_divisi != $karyawan->kd_divisi) { 
                                                      ?>
                                                         <option value="<?=$d->kd_divisi?>"><?=$d->nama_divisi?></option>
                                                      <?php  } } ?>
                                                 </select> 
                                             </div> 
                                              <div class="col-md-4">
                                                    <label class="control-label">Jenis Kelamin</label><br>
                                                    <input name="jk" type="radio" id="jk1" <?php if ($karyawan->jk== "Laki - Laki") {echo "checked";}?>  value="Laki - Laki" required /> 
                                                    <label  for="jk1">Laki - Laki</label>
                                                    <input name="jk" type="radio" id="jk2" <?php if ($karyawan->jk== "Perempuan") {echo "checked";}?>  value="Perempuan" required />
                                                    <label  for="jk2">Perempuan</label>
                                             </div>
                                             <div class="col-md-4">
                                               <div class="row">
                                                    
                                                 <label class="control-label">Nomor HP/Telepon</label>
                                                 <input type="text" name="no_hp" class="form-control"  placeholder="Masukkan Nomor HP/Telepon" value="<?=$karyawan->no_telp?>" >
                                                </div>
                                                 
                                             </div> 

                                             <div class="col-md-12">
                                               <div class="row"> 
                                                    <div class="col-md-12">
                                                        <label class="control-label">Alamat</label><br>
                                                        <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"><?=$karyawan->alamat?></textarea>
                                                    </div>
                                                </div>
                                                 
                                             </div> 
                                         </div> 
                                   </div>
                                 </div>
                            <center>
                                 
                            <input  type="submit" class="btn bg-brown"  name="edit" value="Simpan"> 
                            </center>
                                </fieldset> 
                            </div>

                            
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
                          <form action="<?= base_url('admin/karyawan')?>" method="Post"  >  
                            <input type="hidden" name="email" value="<?=$karyawan->email?>">
                            <input type="hidden" name="nip" value="<?=$karyawan->nip?>">
                         
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data karyawan?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan data karyawan ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/karyawan')?>" method="Post" >  
                                        <input type="hidden" value="<?=$karyawan->email?>" name="email">  
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
