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
                            <a href="<?=base_url('karyawan/bonus')?>">
                                <i class="material-icons">card_giftcard</i>
                                <span>Laporan Bonus Tahunan</span>
                            </a>
                        </li> 

                         <?php if ($index == 2): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('karyawan/nilaisaya')?>">
                                <i class="material-icons">assignment</i>
                                <span>Penilaian Saya</span>
                            </a>
                        </li>  


                        <?php if ($index == 6): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('karyawan/profil')?>">
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
