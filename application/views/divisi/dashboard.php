  
    <section class="content">
        
        <?= $this->session->flashdata('msg') ?>
          <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li> 
                </ol>
                    <div class="card">
                        
                      <div class="header">
                            <center><h2>DAFTAR PENILAIAN YANG BELUM SELESAI</h2></center>                          
                        </div>
                        <div class="body">
                        
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>No.</th> 
                                             <th style="vertical-align: middle;text-align: center;">Periode</th>
                                            <th style="vertical-align: middle;text-align: center;">Tahun</th>    
                                            <th style="vertical-align: middle;text-align: center;">Batas Waktu<br>Penilaian Divisi</th>   
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
                                                 <?=$row->bataswaktu_penilaian_divisi?>
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
                                                 
                                                  
                                                  
                                                 <center>
                                                    <a href="<?=base_url('divisi/penilaian/'.$row->id_bonus)?>"><button class="btn bg-brown">Input Nilai</button></a>
                                                 </center>
                                                 
                                               </td>        
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>

     
                            </div>
                        </div>
                    </div>

              
       
    </section>
 