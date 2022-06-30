 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/bonus/')?>"><i class="material-icons">card_giftcard</i> Bonus Tahunan</a> </li>  
                        <li><a href="<?=base_url('admin/bonus/'.$bonus->id_bonus)?>"> Periode <?=$bonus->periode?>/<?=$bonus->tahun?> </a></li>  
                        <li> Hasil Penilaian Divisi</li> 
                    </ol>
                    <div class="card">
                        <div class="header">
                            <center><h2>Hasil Penilaian Divisi (Metode SMART)</h2></center>                          
                        </div>
                        <div class="body"> 

                            <h4>1. Nilai Awal Alternatif</h4> 
                            <?php $x = 1; for ($i=0; $i < sizeof($nilai_awal) ; $i++) {  ?> 
                            <table class="table table-bordered"> 
                                    <tr >   
                                        <th style="vertical-align: middle;text-align: center;" colspan="999?>"><?=$nilai_awal[$i]['nama_divisi'] ?></th> 
                                    </tr>  
                                    <?php  for ($j=0; $j < sizeof($nilai_awal[$i]['data']) ; $j++) {  ?>
                                        <?php if ($j == 0) { ?>
                                            <tr>
                                            <th style="width: 30%">Nama Karyawan</th>
                                             <?php for ($k=0; $k < sizeof($nilai_awal[$i]['data'][$j]['nilai']) ; $k++) {  ?>
                                                <th style="text-align: center;">J<?=$x++; ?></th>
                                            <?php  } ?>
                                             
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?=$nilai_awal[$i]['data'][$j]['nama_karyawan'] ?></td>
                                            <?php for ($k=0; $k < sizeof($nilai_awal[$i]['data'][$j]['nilai']) ; $k++) {  ?>
                                                <td style="text-align: center;"><?=$nilai_awal[$i]['data'][$j]['nilai'][$k] ?></td>
                                            <?php  } ?>
                                        </tr>
                                    <?php  } ?>
                            </table>
                            <?php  } ?>

                            <hr>

                            <h4>2. Nilai Utility</h4> 
                            <?php $x = 1; for ($i=0; $i < sizeof($nilai_utility) ; $i++) {  ?> 
                            <table class="table table-bordered"> 
                                    <tr >   
                                        <th style="vertical-align: middle;text-align: center;" colspan="999?>"><?=$nilai_utility[$i]['nama_divisi'] ?></th> 
                                    </tr>  
                                    <?php  for ($j=0; $j < sizeof($nilai_utility[$i]['data']) ; $j++) {  ?>
                                        <?php if ($j == 0) { ?>
                                            <tr>
                                            <th style="width: 30%">Nama Karyawan</th>
                                             <?php for ($k=0; $k < sizeof($nilai_utility[$i]['data'][$j]['utility']) ; $k++) {  ?>
                                                <th style="text-align: center;">J<?=$x++; ?></th>
                                            <?php  } ?>
                                             
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?=$nilai_utility[$i]['data'][$j]['nama_karyawan'] ?></td>
                                            <?php for ($k=0; $k < sizeof($nilai_utility[$i]['data'][$j]['utility']) ; $k++) {  ?>
                                                <td style="text-align: center;"><?=$nilai_utility[$i]['data'][$j]['utility'][$k]['nilai'] ?></td>
                                            <?php  } ?>
                                        </tr>
                                    <?php  } ?>
                            </table>
                            <?php  } ?>

                             <h4>3. Hasil Akhir</h4> 
                            <?php $x = 1; for ($i=0; $i < sizeof($nilai_pre) ; $i++) {  ?> 
                            <table class="table table-bordered"> 
                                    <tr >   
                                        <th style="vertical-align: middle;text-align: center;" colspan="999?>"><?=$nilai_pre[$i]['nama_divisi'] ?></th> 
                                    </tr>  
                                    <?php  for ($j=0; $j < sizeof($nilai_pre[$i]['data']) ; $j++) {  ?>
                                        <?php if ($j == 0) { ?>
                                            <tr>
                                            <th style="width: 30%">Nama Karyawan</th>
                                             <?php for ($k=0; $k < sizeof($nilai_pre[$i]['data'][$j]['nilai_pre']) ; $k++) {  ?>
                                                <th style="text-align: center;">J<?=$x++; ?></th>
                                            <?php  } ?>
                                            <th style="text-align: center;">Hasil</th>
                                             
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?=$nilai_pre[$i]['data'][$j]['nama_karyawan'] ?></td>
                                            <?php $z = 0; for ($k=0; $k < sizeof($nilai_pre[$i]['data'][$j]['nilai_pre']) ; $k++) {
                                                $z = $z + $nilai_pre[$i]['data'][$j]['nilai_pre'][$k]['nilai'];
                                              ?>
                                                <td style="text-align: center;"><?= round($nilai_pre[$i]['data'][$j]['nilai_pre'][$k]['nilai'],4) ?></td>
                                            <?php  } ?>
                                            <th style="text-align: center;"><?=round($z,4)?></th>
                                        </tr>
                                    <?php  } ?>
                            </table>
                            <?php  } ?>


                            <a href="<?=base_url('admin/bonus/'.$bonus->id_bonus)?>"><button class="btn bg-brown">Kembali</button></a>

                            <?php if ($bonus->status == 3) { ?>
                                <a href="<?=base_url('admin/bonus/hasilhrd/'.$bonus->id_bonus)?>"><button class="btn bg-green">Lihat Hasil Penilaian HRD</button></a>
                            <?php  } ?>
                            

                            <hr>


                         </div>
                    </div> 
 
                    
                </div>
    </div>
</section>
  
 