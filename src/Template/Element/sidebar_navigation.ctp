<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $this->Url->build('/'); ?>" class="site_title"><i class="fa fa-home"></i> 
                  <span>Dashboard</span>
              </a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                  <?php echo $this->Html->image('../images/user.png', ['class' => 'img-circle profile_img']); ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->AuthUser->user('firstname'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            
            <br/>
            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                    <li class="<?php echo $this->Common->getLinkActiveClass('Appointments', ['index', 'add', 'edit']); ?>">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-book"></i> Appointments <i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                              <li class="<?php echo $this->Common->getLinkActiveClass('Appointments', 'index'); ?>">
                                  <a href="<?php echo $this->Url->build(['controller' => 'Appointments', 'action' => 'index']); ?>">List Appointments</a>
                              </li>
                              <li class="<?php echo $this->Common->getLinkActiveClass('Appointments', 'add'); ?>">
                                  <a href="<?php echo $this->Url->build(['controller' => 'Appointments', 'action' => 'add']); ?>">Set New Appointment</a>
                              </li>
                            </ul>
                        </li>
                    <?php if ($this->AuthUser->hasRole(ROLE_ADMIN)): ?>
                            <li class="<?php echo $this->Common->getLinkActiveClass('Users', ['index', 'add']); ?>">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-secret"></i> Users <i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                              <li class="<?php echo $this->Common->getLinkActiveClass('Users', 'index'); ?>">
                                  <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>">List Users</a>
                              </li>
                              <li class="<?php echo $this->Common->getLinkActiveClass('Users', 'add'); ?>">
                                  <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'add']); ?>">Add New User</a>
                              </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>