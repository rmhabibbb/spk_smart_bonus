 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                        <li> <a href="<?=base_url('hrd/bonus/')?>"><i class="material-icons">card_giftcard</i> Bonus Tahunan</a> </li>  
                        <li><a href="<?=base_url('hrd/bonus/'.$bonus->id_bonus)?>"> Periode <?=$bonus->periode?>/<?=$bonus->tahun?> </a></li>  
                        <li> Hasil Penilaian HRD</li> 
                    </ol>
                    <div class="card">
                        <div class="header">
                            <center><h2>Hasil Penilaian HRD (Metode SMART)</h2></center>                          
                        </div>
                        <div class="body"> 

                            <h4>1. Nilai Awal Alternatif</h4>  
                            <table class="table table-bordered"> 
                                    <tr>
                                        <th style="text-align: center;width: 30%">Nama Karyawan</th>
                                         <?php foreach ($list_kriteria as $kri) {  ?>
                                            <th style="text-align: center;"><?=$kri->nama_kriteria?></th>
                                        <?php  } ?>
                                         
                                    </tr>
                                    <?php  for ($i=0; $i < sizeof($nilai_awal) ; $i++) {  ?> 
                                        <tr>
                                            <td><?=$nilai_awal[$i]['nama_karyawan'] ?></td>
                                            <?php for ($j=0; $j < sizeof($nilai_awal[$i]['nilai']) ; $j++) {  ?>
                                                <td style="text-align: center;"><?=$nilai_awal[$i]['nilai'][$j] ?></td>
                                            <?php  } ?>
                                        </tr>
                                    <?php  } ?>
                            </table> 

                            <hr>

                            <h4>2. Nilai Utility</h4> 
                            <table class="table table-bordered"> 
                                    <tr>
                                        <th style="text-align: center;width: 30%">Nama Karyawan</th>
                                         <?php foreach ($list_kriteria as $kri) {  ?>
                                            <th style="text-align: center;"><?=$kri->nama_kriteria?></th>
                                        <?php  } ?>
                                         
                                    </tr>
                                    <?php  for ($i=0; $i < sizeof($nilai_utility) ; $i++) {  ?> 
                                        <tr>
                                            <td><?=$nilai_utility[$i]['nama_karyawan'] ?></td>
                                            <?php for ($j=0; $j < sizeof($nilai_utility[$i]['utility']) ; $j++) {  ?>
                                                <td style="text-align: center;"><?=$nilai_utility[$i]['utility'][$j]['nilai'] ?></td>
                                            <?php  } ?>
                                        </tr>
                                    <?php  } ?>
                            </table> 

                             <h4>3. Hasil Akhir</h4> 
                            <table class="table table-bordered"> 
                                    <tr>
                                        <th style="text-align: center;width: 30%">Nama Karyawan</th>
                                         <?php foreach ($list_kriteria as $kri) {  ?>
                                            <th style="text-align: center;"><?=$kri->nama_kriteria?></th>
                                        <?php  } ?>
                                        <th style="text-align: center;">Hasil</th>
                                         
                                    </tr>
                                    <?php  for ($i=0; $i < sizeof($nilai_pre) ; $i++) {  ?> 
                                        <tr>
                                            <td><?=$nilai_pre[$i]['nama_karyawan'] ?></td>
                                            <?php $x = 0 ;for ($j=0; $j < sizeof($nilai_pre[$i]['nilai_pre']) ; $j++) { 
                                                $x = $x + $nilai_pre[$i]['nilai_pre'][$j]['nilai'];
                                             ?>
                                                <td style="text-align: center;"><?= round($nilai_pre[$i]['nilai_pre'][$j]['nilai'],4) ?></td>
                                            <?php  } ?>
                                            <th style="text-align: center;"><?=round($x,4)?></th>
                                        </tr>
                                    <?php  } ?>
                            </table> 


                            <a href="<?=base_url('hrd/bonus/'.$bonus->id_bonus)?>"><button class="btn bg-brown">Kembali</button></a>

                             <a href="<?=base_url('hrd/bonus/hasildivisi/'.$bonus->id_bonus)?>"><button class="btn bg-green">Lihat Hasil Penilaian Divisi</button></a>
                            

                            <hr>


                         </div>
                    </div> 
 
                    
                </div>
    </div>
</section>
  