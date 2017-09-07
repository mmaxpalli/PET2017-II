
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SGI | Expreso Marvisur</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="css/img/favicon.ico"/>



  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->


  <!-- Theme style -->
  <link rel="stylesheet" href="css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="css/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/plugins/datatables/dataTables.bootstrap.css">


  <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />

  <link rel="stylesheet" href="css/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="css/plugins/datatables/fixedHeader.dataTables.min.css">


  <!-- sleect -->

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">


<!-- sleect -->

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/fileinput/fileinput.css" media="all" rel="stylesheet" type="text/css"/>



  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



  <![endif]-->




<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

      <link rel="stylesheet" href="css/plugins/datepicker/datepicker3.css">

</head>
<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper">   
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>GI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SGI</b> E. Marvisur</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo 'Recursos/Imagen/logo.png' ;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php  echo  $_SESSION['USUA_Nombre'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo 'Recursos/Imagen/logo.png' ;?>" class="img-circle" alt="User Image">
                <p>

                    <?php  date_default_timezone_set("America/Lima");
                      echo  $_SESSION['USUA_Nombre'].' - '.$_SESSION['ROL_Nombre'];?>
                  <small><?php echo date("l j ")." de ".date(" F")." del ".date("Y"); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?c=user_perfil" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="?c=login&a=Eliminar" class="btn btn-default btn-flat">Cerrar cesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo 'Recursos/Imagen/logo.png';?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php  echo  $_SESSION['USUA_Nombre'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>


      <?php isset($_REQUEST['c'])?$active=$_REQUEST['c']:$active='';?>
        
        
        <?php foreach($this->herramientas->MenuValidacionCabeceras() as $t): ?>
           <?php foreach($this->herramientas->ActiveMenus($active) as $p): ?>
          

        <li class="<?php echo $p->MENU_Padre==$t->MENU_Padre? 'active' : '';?> treeview">
          <a href="#">
            
              <i class="fa fa-folder"></i> <span><?php echo $t->MENU_Padre; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php foreach($this->herramientas->MenuValidacion($t->MENU_Padre) as $r): ?>
              <li class="<?php echo $active == $r->MENU_NombreFormulario ? 'active' : ''; ?>"><a href="?c=<?php echo $r->MENU_NombreFormulario; ?>"><i class="<?php echo $r->MENU_Icono; ?>"></i><?php echo $r->MENU_Nombre; ?></a></li>                                            
             <?php endforeach; ?>
 
          </ul>
        </li>
           <?php endforeach; ?>
        <?php endforeach; ?>
       
   
        <li><a href=""><i class="fa fa-book"></i> <span>Soporte</span></a></li>
        <li class="header">MIS FAVORITOS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>









