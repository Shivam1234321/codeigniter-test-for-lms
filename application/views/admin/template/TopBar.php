<header class="header white-bg">
      <div class="sidebar-toggle-box">
          <i class="fa fa-bars"></i>
      </div>
    <!--logo start-->
    <a href="<?= BASE_URL;?>dashboard" class="logo"><span><img src="<?= LOGO; ?>" style="height:47px;width:95px;"></span></a>
    <!--logo end-->

    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
           
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="<?= LOGO; ?>" style="height:30px;width:30px;">
                    <span class="username"><?= $this->data['app_name'];?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout dropdown-menu-right">
                    <div class="log-arrow-up"></div>
                    <!-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                    <li><a href="<?= BASE_URL;?>CP"><i class="fa fa-key"></i> Change Password</a></li>
                    <li data-toggle="modal" data-target="#logoutModal"><a href="#"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>