
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                    <li> <i class="material-icons">public</i> Kelola Data Kriteria Umum </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>KELOLA DATA KRITERIA UMUM</h2></center>                          
                        </div>
                        <div class="body">
                        
                        <a   data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-brown">Tambah Kriteria Umum</button></a> 
                        <br><br>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>Nama Kriteria</th> 
                                            <th>Bobot</th>      
                                            <th>Normalisasi</th>      
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php 

                                       $i = 1;
                                       $n = sizeof($list_kriteria);
                                       $x = 1;

                                       foreach ($list_kriteria as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama_kriteria?>  </td> 
                                              <td><?=$row->bobot?></td>   
                                                   
                                              <th><?= round(($row->bobot/$totalbobot), 4) ?></th>  
                                                  
                                               <td style="vertical-align: middle;">
                                                  <a href="<?=base_url('admin/kriteriaumum/'.$row->id_kriteria_umum)?>"> 
                                                    <button class="btn bg-brown ">
                                                      Lihat
                                                    </button>
                                                  </a>
                                                   
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>Form Tambah Kriteria Umum</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/kriteriaumum')?>" method="Post"  >  
                         
                                 <table class="table table-bordered"> 
                                        <tr>   
                                            <th>ID Kriteria</th> 
                                            <th>
                                               <input type="text" class="form-control" name="id_kriteria_umum" placeholder="Masukkan ID Kriteria" required autofocus >
                                            </th>  
                                        </tr> 

                                        <tr>   
                                            <th>Nama Kriteria</th> 
                                            <th>
                                               <input type="text" class="form-control" name="nama_kriteria" placeholder="Masukkan Nama Kriteria" required autofocus >
                                            </th>  
                                        </tr> 


                                        <tr>   
                                            <th>Bobot Kriteria</th> 
                                            <th>
                                               <input type="number" class="form-control" name="bobot" placeholder="Masukkan Bobot Kriteria" required autofocus >
                                            </th>  
                                        </tr> 
                                </table>
                         
                        <input  type="submit" class="btn bg-brown btn-block"  name="tambah" value="Tambah">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 