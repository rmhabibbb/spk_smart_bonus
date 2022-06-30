<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        
                <div class="menu">
                    <ul class="list">
                        <li class="header">Menu </li>
                        <!-- if unconfirmed -->

                        <?php if ($index == 1): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin')?>">
                                <i class="material-icons">home</i>
                                <span>Beranda</span>
                            </a>
                         </li>  
                         <?php if ($index == 2): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/bonus')?>">
                                <i class="material-icons">card_giftcard</i>
                                <span>Bonus Tahunan</span>
                            </a>
                        </li>  
 
 
                        <?php if ($index == 3): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/divisi')?>">
                                <i class="material-icons">domain</i>
                                <span>Divisi</span>
                            </a>
                        </li>  

                        <?php if ($index == 4): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/karyawan')?>">
                                <i class="material-icons">people</i>
                                <span>Karyawan</span>
                            </a>
                        </li>  


                        <li class="header">Kriteria </li>


                        <?php if ($index == 5): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/kriteriaumum')?>">
                                <i class="material-icons">public</i>
                                <span>Umum</span>
                            </a>
                        </li>  

                        <?php if ($index == 6): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/kriteriajobdesk')?>">
                                <i class="material-icons">business_center</i>
                                <span>Jobdesk</span>
                            </a>
                        </li>  

 
                   
                       
                      
                        <li class="header">Pengaturan</li> 
                        <?php if ($index == 7): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/profil')?>">
                                <i class="material-icons">person_pin</i>
                                <span>Profil</span>
                            </a>
                        </li>    
                      



         
                          <li> 
                            <a href="<?=base_url('logout')?>">
                                <i class="material-icons">input</i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div> 
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                 
            </div>
            <div class="version">
                
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    
    <!-- #END# Right Sidebar -->
</section>
