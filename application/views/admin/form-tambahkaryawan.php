
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/Karyawan')?>"><i class="material-icons">people</i> Kelola Data Karyawan</a> </li>  
                    <li>  Form Tambah Data Karyawan</li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>FORM TAMBAH KARYAWAN</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/karyawan/') ?>
    
                            <fieldset> 
                                <div class="form-group">
                                    <div class="form-line">
                                         <div class="row">
                                             <div class="col-md-3">
                                                 <label class="control-label">NIP</label>
                                                 <input type="text" onkeypress='validate(event)' minlength="1" name="nip" class="form-control" placeholder="Masukkan NIP"  required id="cekidkaryawan"  >
                                                 
                                             </div>  

                                             <div class="col-md-3">
                                                 <label class="control-label">Nama Karyawan</label>
                                                 <input type="text" name="nama_karyawan" class="form-control" placeholder="Masukkan Nama Karyawan"  required  >
                                                 
                                             </div>  
                                             
                                             <div class="col-md-3">
                                                 <label class="control-label">Email Karyawan</label>
                                                 <input type="email" name="email" class="form-control" placeholder="Masukkan Email Karyawan"  required  >
                                                 
                                             </div> 

                                             <div class="col-md-3">
                                                 <label class="control-label">Password</label>
                                                 <input type="password" name="password" class="form-control" placeholder="Masukkan Password"  required  >
                                                 
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
                                                     <option value="">Pilih Divisi</option>
                                                     <?php foreach ($list_divisi as $d) { ?>
                                                         <option value="<?=$d->kd_divisi?>"><?=$d->nama_divisi?></option>
                                                      <?php } ?>
                                                 </select> 
                                             </div> 
                                             <div class="col-md-4">
                                                        <label class="control-label">Jenis Kelamin</label><br>
                                                        <input name="jk" type="radio" id="jk1"  value="Laki - Laki" required /> 
                                                        <label  for="jk1">Laki - Laki</label>
                                                        <input name="jk" type="radio" id="jk2"   value="Perempuan" required />
                                                        <label  for="jk2">Perempuan</label>
                                                    </div>
                                             <div class="col-md-4">
                                               <div class="row">
                                                    
                                                 <label class="control-label">Nomor HP/Telepon</label>
                                                 <input type="text" name="no_hp" class="form-control"  placeholder="Masukkan Nomor HP/Telepon" >
                                                </div>
                                                 
                                             </div> 

                                             <div class="col-md-12">
                                               <div class="row"> 
                                                    <div class="col-md-12">
                                                        <label class="control-label">Alamat</label><br>
                                                        <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                                                    </div>
                                                </div>
                                                 
                                             </div> 
                                         </div> 
                                   </div>
                                 </div>
                            </fieldset> 
                            
                              
                            <input  type="submit" class="btn bg-brown btn-block btn-lg"  name="tambah" value="Tambah">  <br><br>
                             <?php echo form_close() ?> 

     
                            </div>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
