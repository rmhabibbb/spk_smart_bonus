
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">people</i> Kelola Data Karyawan </li> 
                </ol>
                <div class="card"> 
                        <div class="body">

                        <a    href="<?=base_url('admin/formkaryawan')?>"><button class="btn bg-brown">Tambah Karyawan</button></a> 
                        <br><br>
                       

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>    
                                            <th>NIP</th>   
                                            <th>Nama Karyawan</th>  
                                            <th>Jenis Kelamin</th>
                                            <th>Divisi</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_karyawan as $row): ?> 
                                          <tr>     
                                              <td><?=$row->nip?>  </td>   
                                              <td><?=$row->nama?>  </td>  
                                              <td> <?=$row->jk?></td>    
                                              <td> <?=$this->Divisi_m->get_row(['kd_divisi' => $row->kd_divisi])->nama_divisi ?></td>   
                                              <td> <?=$row->email?></td>  
                                              <td> <?=$row->no_telp?></td>    
                                               <td>
                                                  <a href="<?=base_url('admin/Karyawan/'.$row->nip)?>"> 
                                                    <button class="btn bg-brown btn-block" style="margin-bottom: 5px">
                                                      Detail
                                                    </button>
                                                  </a> 
                                                   <a data-toggle="modal" data-target="#delete-<?=$row->nip?>"  href=""><button class="btn bg-red btn-block">Hapus</button></a>
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
 
 
<?php $i = 1; foreach ($list_karyawan as $row): ?> 
 <div class="modal fade" id="delete-<?=$row->nip?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data karyawan?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan data ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/Karyawan')?>" method="Post" >  
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