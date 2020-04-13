<?php
$nav = $this->uri->segment(1);

?>
<div class="footer-menu footer-5-icons footer-menu-center-icon">
            <a href=""><i class="fa fa-file"></i><span>Pages</span></a>
            <a href=""><i class="fa fa-gift"></i><span>Features</span></a>
            <a href="" class="<?= $this->uri->segment(1) == '' ? 'active-nav' : '' ?>"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="<?=base_url();?>" class=""><i class="fa fa-history"></i><span>calls</span></a>
            <a href=""><i class="fa fa-bars"></i><span>Menu</span></a>
            <div class="clear"></div>
 </div>

