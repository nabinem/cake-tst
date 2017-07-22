<?php $curController = $this->request->param('controller');
      $curAction = $this->request->param('action'); ?>
<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
                
                <!--Horizontal top Menu-->
                <button type="button" id="horiz_topmenu_toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#horiz_topmenu" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
       <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $this->Html->image('../images/user.png'); ?>
                        <?php echo $this->AuthUser->user('firstname'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'editProfile']); ?>"> 
                            Edit Profile</a></li>
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'changePassword', 'plugin' => false]); ?>"> 
                            Change Password</a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'logout', 'plugin' => false]); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->