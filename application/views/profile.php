<div id="menu-instant-3" class="menu-box" data-menu-type="menu-box-right" data-menu-height="100%" data-menu-width="100%" data-menu-effect="menu-over">
            <div class="caption shadow-huge" id="mySidenav">
                <div class="caption-top top-10 right-10">
                    <a href="#" class="close-menu icon icon-xs float-right"><i class="fa fa-times-circle color-red2-light font-24"></i></a>
                </div>
                <div class="down top-30">
                    <a><img src="https://newcrm.fullbasketproperty.com/uploads/<?= $this->session->userdata('profile_pic');?>"></a>
                    <a ><span class=" name-caret" style="color: black !important;"><?= $this->session->userdata('user_name');?></span></a>
                    <p style="color: black !important;">RM : <?= $this->session->userdata('manager_name');?> </p>

                </div>

            </div>
            <div class="content">
                <!-- <div class="divider top-10"></div> -->
                <!-- <p> Here all the details will be here of user</p> -->
                <ul>
                  <li>Email : <?= $this->session->userdata('user_email');?></li>
                     <li>Mobile : <?= $this->session->userdata('user_mobile');?></li>
                     <li>Employee Code : <?= $this->session->userdata('user_emp_code');?></li>  
                    <li>Last Login : <?= $this->session->userdata('last_login');?></li>
                </ul>
                <div class="divider top-10"></div>
                <a href="<?=base_url('login/logout')?>" class=" button button-full button-m button-margins round-small bg-red2-dark bottom-30">Log out</a>
            </div>
        </div>