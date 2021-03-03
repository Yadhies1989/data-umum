 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/img/profile/'). $user['image'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php 
          $role_id = $this->session->userdata('role_id');
          $queryMenu = " select `user_menu`.`id` , `menu`, `icon`
                         from `user_menu` join `user_access_menu`
                         on `user_menu`.`id` = `user_access_menu`. `menu_id`
                         where `user_access_menu`. `role_id` = $role_id
                         order by `user_access_menu`. `menu_id` ASC
                       ";

          $menu = $this->db->query($queryMenu)->result_array();

          ?>

          <?php foreach ($menu as $m) : ?>
            
            <?php $uri = $this->uri->segment(1) ?>

            <?php if ($uri == strtolower($m['menu'])) : ?>
            <li class="nav-item has-treeview menu-open">
            <?php else : ?>
            <li class="nav-item has-treeview">
            <?php endif;  ?>

            <?php if ($uri == strtolower($m['menu'])) : ?>
            <a href="#" class="nav-link active">
            <?php else : ?>
            <a href="#" class="nav-link">
            <?php endif;  ?>

              <i class="<?php echo $m['icon'];?>"></i>
              <p>
                <?php echo $m['menu'];?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <?php 
            $menuID = $m['id'];
            $querySubmenu = " select *
                         from `user_sub_menu`
                         where `menu_id` = $menuID
                         and `is_active` = 1
                       ";


            $subMenu = $this->db->query($querySubmenu)->result_array();
            ?>
            <?php foreach ($subMenu as $sm) : ?>
              <ul class="nav nav-treeview active">
                <li class="nav-item">
                  <?php if ($title == $sm['title']) : ?>
                  <a href="<?php echo base_url($sm['url']) ?>" class="nav-link active">
                  <?php else : ?>
                  <a href="<?php echo base_url($sm['url']) ?>" class="nav-link">
                  <?php endif;  ?>
                    <i class="<?php echo $sm['icon'];?>"></i>
                    <p><?php echo $sm['title'];?></p>
                  </a>
                </li>
              </ul>
            <?php endforeach; ?>

          </li>
        <?php endforeach; ?>
          
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url().'welcome/logout/'?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>