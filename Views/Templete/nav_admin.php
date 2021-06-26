    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['userData']['nombre']." ".$_SESSION['userData']['apellido'];?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombre_rol'];  ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item" href="<?= base_url(); ?>/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span>
          </a>
        </li>

        <?php 
        switch ($_SESSION['userData']['idrol']) {
          case 1:
            echo '<li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">            
            <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
            <span class="app-menu__label">Usuarios</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a> 

          <ul class="treeview-menu">
            <li><a class="treeview-item" href="'.base_url().'/usuarios"><i class="icon fa fa-circle-o"></i>Usuarios Activos</a></li>
            <li><a class="treeview-item" href="'.base_url().'/usuarios/usuarios_inactivos"><i class="icon fa fa-circle-o"></i>Usuarios Inactivos</a></li>
          </ul>
        </li>

        <li><a class="app-menu__item" href="'.base_url().'/fichas"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Fichas</span></a></li>';
            break;
          case 2:
            echo '
            <li>
              <a class="app-menu__item" href="'.base_url().'/clases"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">clases</span>
              </a>
            <li> 
            <li>
              <a class="app-menu__item" href="'.base_url().'/Fichas_asignadas">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Fichas Asignadas</span>
              </a>
            </li> ';
            break;
          case 3:
            echo '<li><a class="app-menu__item" href="'.base_url().'/asistencia"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Historial</span></a></li>';
            break;
          case 4:
            echo '<li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">            
            <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
            <span class="app-menu__label">Historiales</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a> 

          <ul class="treeview-menu">
            <li><a class="treeview-item" href="'.base_url().'"/asistencia"><i class="icon fa fa-circle-o"></i>Historial Personal</a></li>
            <li><a class="treeview-item" href="'.base_url().'/asistencia"><i class="icon fa fa-circle-o"></i>Historial Grupal</a></li>
          </ul>
        <li>';
            break;
          
          default:
            // code...
            break;
        }
      ?>

         


        <li>
          <a class="app-menu__item" href="<?= base_url(); ?>/logout">
            <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
            <span class="app-menu__label" >Logout</span>
          </a>
        </li>

      </ul>
    </aside>