<div class="sidebar " data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          CT
        </a>

        <?php if($numerito==1){ ?>
          <a href="" class="simple-text logo-normal">
         <?php echo($user);?>
        </a>
    <?php }else{?>
      <a href="" class="simple-text logo-normal">
         CurseTopia
        </a>
    <?php }?>
        <a href="" class="simple-text logo-normal">
          Course Topia
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./index.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if($numerito==1){?>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="./user.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Perfil de Usuario</p>
            </a>
          </li>
          <li>
            <a href="./dashboard/dash.php">
            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Courses</p>
            </a>
          </li>
          <?php
          if($status==='profesor'){?>
          <li>
            <a href="./mycourses.php">
            <i class="now-ui-icons files_box"></i>
              <p>My courses</p>
            </a>
          </li>
          <?php } ?>
          <?php } ?>
        </ul>
      </div>
    </div>
