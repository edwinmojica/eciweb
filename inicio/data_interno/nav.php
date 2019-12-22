
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!--form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-<?php echo $tono ?>" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form-->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
                    <?php 
                    $name = $_SESSION['nick'];
                    $date = '12345';
                    $dates= $name.$date;
                    ?>
                      <?php $es= sha1($dates);?>
                    <?php 
                    $ids= $_SESSION['id'];
                      $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$ids'");
                    ?>
                    <?php while ($vaaa = $selectioner->fetch_assoc()) { 
                      $pass = $vaaa['pass']; 
                      $carrera = $vaaa['carrera']; 
                      $semestre = $vaaa['semestre']; 
                    }
                    ?>

            <!-- Nav Item - Alerts -->
            <li id="ref" class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-<?php echo $tono ?> badge-counter">
                  <?php 
                  if ($pass==$es){  
                  $val1= 1 ;}
                  else{
                  $val1= 0 ;
                  };
                  if ($carrera=='N/A'){ 
                  $val2= 1 ;}
                  else{
                  $val2= 0 ;
                  };
                  if ($semestre=='N/A'){
                  $val3= 1 ;}
                  else{
                  $val3= 0 ;
                  };


                  $valor= $val1+$val2+$val3;
                  ?>
                  
                  <?php if($valor==1):?>
                  1
                  <?php else: ?>
                   <?php if($valor==2):?>
                    2<?php endif; ?>
                   <?php if($valor==3):?>
                    3<?php endif; ?>
                   <?php if($valor==0):?>
                    0<?php endif; ?>
                  
                  
                  
                  <?php endif; ?>

                </span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificaciones
                </h6>
                <!--a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Noviembre 10, 2019</div>
                    <span class="font-weight-bold">Tienes un nuevo reporte disponible</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Noviembre 11, 2019</div>
                    $290.29 Haz recibido un giro!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Enero 2, 2019</div>
                    Mensaje de alerta, Tu cuenta puede estar en peligro.
                  </div>
                </a-->
               <?php if ($pass==$es):  ?>
                      <a class="dropdown-item d-flex align-items-center" href="perfil/">
                        <div class="mr-3">
                          <div class="icon-circle bg-warning">
                           <i class="fas fa-exclamation-triangle text-white"></i>
                         </div>
                        </div>
                        <div>
                          <div class="small text-gray-500">Enero 1, <?php echo date('y')?></div>
                          Mensaje de alerta, Tu cuenta puede estar en peligro cambia tu contraseña.
                        </div>
                      </a>
                    <?php else: ?>
                      <a href="#!" hidden><i class="fas fa-user-plus text-success"> Pass Aceptada</i></a>
                    <?php endif; ?>
                    <?php if ($carrera=='N/A'):  ?>
                      <a class="dropdown-item d-flex align-items-center" href="perfil/">
                        <div class="mr-3">
                          <div class="icon-circle bg-warning">
                           <i class="fas fa-exclamation-triangle text-white"></i>
                         </div>
                        </div>
                        <div>
                          <div class="small text-gray-500">Enero 1, <?php echo date('y')?></div>
                          Mensaje de alerta, Actualiza tu carrera.
                        </div>
                      </a>
                    <?php else: ?>
                      <a href="#!" hidden><i class="fas fa-user-plus text-success"> Pass Aceptada</i></a>
                    <?php endif; ?>
                    <?php if ($semestre=='N/A'):  ?>
                      <a class="dropdown-item d-flex align-items-center" href="perfil/">
                        <div class="mr-3">
                          <div class="icon-circle bg-warning">
                           <i class="fas fa-exclamation-triangle text-white"></i>
                         </div>
                        </div>
                        <div>
                          <div class="small text-gray-500">Enero 1, <?php echo date('y')?></div>
                          Mensaje de alerta, Actualiza tu semestre.
                        </div>
                      </a>
                    <?php else: ?>
                      <a href="#!" hidden><i class="fas fa-user-plus text-success"> Pass Aceptada</i></a>
                    <?php endif; ?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar mas notificaciones</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li id="rel" class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-<?php echo $tono ?> badge-counter">1</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Mensajes
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="../blank.php">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/descarga.png" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Le invitamos a ver la informacion importante antes de continuar</div>
                    <div class="small text-gray-500">Administrador · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Ver todos los mensajes</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nick']?></span>
                <img class="img-profile rounded-circle" src="../img/descarga.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../perfil/">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="../configure/">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Visual (WEB)
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../destroy.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
            <script>
      $(window).ready(function(){
           $("li").animate({ scrollTop: $(document).height()}, 2500);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#ref').load(' #ref'); // Selector de la div y el fichero a refrescar
      }, 2500);
  </script><script>
      $(window).ready(function(){
           $("li").animate({ scrollTop: $(document).height()}, 2500);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#rel').load(' #rel'); // Selector de la div y el fichero a refrescar
      }, 2500);
  </script>