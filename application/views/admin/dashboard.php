  
    <section class="content">
        
          <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-brown align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li> 
                    </ol>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                           
                            <div class="body"> 
                                <h3 style="text-align: center;">Sistem Pendudung Keputusan Pemberian Bonus Tahunan Karyawan (Metode SMART)</h3>
                                <p style="text-align: justify;  text-indent: 50px;margin-top: 10px">SMART (Simple Multi Attribute Rating Technique) merupakan 
                                    metode pengambilan keputusan yang multiatribut yang dikembangkan oleh 
                                    Edward. Teknik pembuatan keputusan multiatribut ini digunakan untuk 
                                    mendukung pembuat keputusan dalam memilih antara beberapa alternatif. 
                                    Setiap pembuat keputusan harus memilih sebuah alternatif yang sesuai 
                                    dengan tujuan yang telah dirumuskan. Setiap alternatif terdiri dari 
                                    sekumpulan atribut dan setiap atribut mempunyai nilai-nilai. Nilai ini diratarata dengan skala tertentu. Setiap atribut mempunyai bobot yang 
                                    menggambarkan seberapa penting dibandingkan dengan atribut lain. 
                                    Pembobotan dan pemberian peringkat ini digunakan untuk menilai setiap 
                                    alternatif agar diperoleh alternatif terbaik (Yonata, 2018). Metode SMART 
                                    merupakan metode pengambilan keputusan untuk menyelesaikan masalah 
                                    penentuan pilihan yang bersifat multi objective diantara beberapa kriteria 
                                    (Setiawan et al., 2020).</p>
                                 

                            </div>
                        </div>
                </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                           
                            <div class="body">
                                <!-- Nav tabs -->
                                <!-- Widgets -->
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="info-box bg-brown hover-expand-effect">
                                            <div class="icon">
                                                <i class="material-icons">card_giftcard</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Bonus Tahunan</div>
                                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->Bonus_m->get_num_row([''])?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="info-box bg-brown hover-expand-effect">
                                            <div class="icon">
                                                <i class="material-icons">domain</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Divisi</div>
                                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->Divisi_m->get_num_row([''])?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="info-box bg-brown hover-expand-effect">
                                            <div class="icon">
                                                <i class="material-icons">people</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Karyawan</div>
                                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->Karyawan_m->get_num_row([''])?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="info-box bg-brown hover-expand-effect">
                                            <div class="icon">
                                                <i class="material-icons">public</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Kriteria Umum</div>
                                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->KriteriaUmum_m->get_num_row([''])?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="info-box bg-brown hover-expand-effect">
                                            <div class="icon">
                                                <i class="material-icons">business_center</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Kriteria Jobdesk</div>
                                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->KriteriaJobdesk_m->get_num_row([''])?></div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  
                                </div>
                <!-- #END# Widgets -->

                            </div>
                        </div>
                    </div>
                  
       
    </section>


 