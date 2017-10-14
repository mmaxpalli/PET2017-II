  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inicio
        <small>Administrador</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
                 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4> Bienvenido al sistema de gestion de incidencias - Expreso Marvisur</h4>
                Usted ha iniciado sesion como <?php echo $_SESSION['USUA_Nombre'].' - '.date('d/m/Y');?> 
              </div> 
        </div>
        
      </div>
     
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>