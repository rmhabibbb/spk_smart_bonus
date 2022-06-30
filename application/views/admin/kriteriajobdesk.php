
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                    <li> <i class="material-icons">business_center</i> Kelola Data Kriteria Jobdesk </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>KELOLA DATA KRITERIA JOBDESK</h2></center>                          
                        </div>
                        <div class="body">
                        
                        <a   data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-brown">Tambah Kriteria Jobdesk</button></a> 
                        <br><br>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>ID Kriteria</th> 
                                            <th>Nama Kriteria</th> 
                                            <th>Divisi</th>           
                                            <th>Bobot Kriteria</th>           
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

                                        <?php $totalbobot   = $this->KriteriaJobdesk_m->get_totalbobot($row->kd_divisi);    ?>
                                          <tr>   
                                              <td><?=$row->id_kriteria_jobdesk?>  </td> 
                                              <td><?=$row->nama_kriteria?>  </td> 
                                              <td><?=$this->Divisi_m->get_row(['kd_divisi' => $row->kd_divisi])->nama_divisi?> </td>   

                                              <td><?=$row->bobot?>  </td>  
                                              <th><?= round(($row->bobot/$totalbobot), 4) ?></th>
                                                  
                                               <td style="vertical-align: middle;">
                                                  <a href="<?=base_url('admin/kriteriajobdesk/'.$row->id_kriteria_jobdesk)?>"> 
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>Form Tambah Kriteria Jobdesk</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/kriteriajobdesk')?>" method="Post"  >  
                         
                                 <table class="table table-bordered"> 
                                        <tr>   
                                            <th>ID Kriteria</th> 
                                            <th>
                                               <input type="text" class="form-control" name="id_kriteria_jobdesk" placeholder="Masukkan ID Kriteria" required autofocus >
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th>Nama Kriteria</th> 
                                            <th>
                                               <input type="text" class="form-control" name="nama_kriteria" placeholder="Masukkan Nama Kriteria" required autofocus >
                                            </th>  
                                        </tr> 

                                        <tr>   
                                            <th>Divisi</th> 
                                            <th>
                                              <select class="form-control" name="kd_divisi" required>
                                                     <option value="">Pilih Divisi</option>
                                                     <?php foreach ($list_divisi as $d) { ?>
                                                         <option value="<?=$d->kd_divisi?>"><?=$d->nama_divisi?></option>
                                                      <?php } ?>
                                                 </select> 
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
 