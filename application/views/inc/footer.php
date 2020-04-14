<?php
$nav = $this->uri->segment(1);

?>
<div class="footer-menu footer-5-icons footer-menu-center-icon">
            <a href="<?=base_url('search_callback');?>" class="<?= $this->uri->segment(1) == 'search_callback' ? 'active-nav' : '' ?>"><i class="fa fa-file"></i><span>Search</span></a>
            <a href="<?=base_url('imp_callbacks');?>" class="<?= $this->uri->segment(1) == 'imp_callbacks' ? 'active-nav' : '' ?>"><i class="fa fa-gift "></i><span>Favourates</span></a>
            <a href="<?=base_url();?>" class="<?= $this->uri->segment(1) == '' ? 'active-nav' : '' ?>"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="<?=base_url('callbacks');?>" class="<?= $this->uri->segment(1) == 'callbacks' ? 'active-nav' : '' ?>"><i class="fa fa-history"></i><span>calls</span></a>
            <a href="#"><i class="fa fa-bars"></i><span>Menu</span></a>
            <div class="clear"></div>
 </div>

