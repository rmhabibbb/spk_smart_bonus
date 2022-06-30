
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/divisi')?>"><i class="material-icons">domain</i> Kelola Data divisi</a> </li>  
                    <li>  Form Tambah Data Divisi</li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>FORM TAMBAH DIVISI</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/divisi/') ?>
    
                            <fieldset> 
                                <div class="form-group">
                                    <div class="form-line">
                                         <div class="row">
                                            <div class="col-md-3">
                                                 <label class="control-label">Kode divisi</label>
                                                 <input type="text" name="kd_divisi" class="form-control" placeholder="Masukkan Kode divisi"  required  >
                                                 
                                             </div>  

                                             <div class="col-md-3">
                                                 <label class="control-label">Nama divisi</label>
                                                 <input type="text" name="nama_divisi" class="form-control" placeholder="Masukkan Nama divisi"  required  >
                                                 
                                             </div>  
                                             
                                             <div class="col-md-3">
                                                 <label class="control-label">Email divisi</label>
                                                 <input type="email" name="email" class="form-control" placeholder="Masukkan Email divisi"  required  >
                                                 
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
                                             <div class="col-md-12">
                                                 <label class="control-label">Deskripsi</label>
                                                 
                                                 <textarea  name="deskripsi" class="form-control"  placeholder="Masukkan Deskripsi" ></textarea> 
                                                 
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
 
 