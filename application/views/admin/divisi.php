
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                    <li> <i class="material-icons">domain</i> Kelola Data Divisi </li> 
                </ol>
                <div class="card"> 
                        <div class="body">

                        <a    href="<?=base_url('admin/formdivisi')?>"><button class="btn bg-brown">Tambah Divisi</button></a> 
                        <br><br>
                       

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>    
                                            <th>Kode Divisi</th>  
                                            <th>Nama Divisi</th>   
                                            <th>Email Divisi</th>   
                                            <th>Deskripsi</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_divisi as $row): ?> 
                                          <tr>     
                                              <td><?=$row->kd_divisi?>  </td> 
                                              <td><?=$row->nama_divisi?>  </td>   
                                              <td> <?=$row->email?></td>  
                                              <td> <?=$row->deskripsi?></td>    
                                               <td>
                                                  <a href="<?=base_url('admin/divisi/'.$row->kd_divisi)?>"> 
                                                    <button class="btn bg-brown btn-block" style="margin-bottom: 5px">
                                                      Edit
                                                    </button>
                                                  </a> 
                                                   <a data-toggle="modal" data-target="#delete-<?=$row->kd_divisi?>"  href=""><button class="btn bg-red btn-block">Hapus</button></a>
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
 
 
<?php $i = 1; foreach ($list_divisi as $row): ?> 
 <div class="modal fade" id="delete-<?=$row->kd_divisi?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data divisi?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan data ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/divisi')?>" method="Post" >  
                                        <input type="hidden" value="<?=$row->email?>" name="email">  
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