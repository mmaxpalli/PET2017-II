  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Gestion de areas
   
        <small>areas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Maestro</a></li>
        <li class="active">areas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
 
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=areas&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">


                        <input type="hidden" name="AREA_Id" id="AREA_Id" value="<?php echo $areas->AREA_Id; ?> ">
                        <input type="hidden" class="form-control" id="AREA_FechaAuditoria" name="AREA_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">
                      <input type="hidden" name="USUA_Id" id="USUA_Id" value="<?php echo $_SESSION['USUA_Id']; ?>">
                
                       
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Nombre</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="AREA_Nombre" placeholder="Nick" name="AREA_Nombre" value="<?php echo $areas->AREA_Nombre; ?>"data-validacion-tipo="requerido|min:3">
                            </div>
                            <div class="col-md-3">
                             <label for="AREA_Nombre" ></label>
                            </div>
                        </div>


                         <div class="form-group">
                            <label  class="col-md-3 control-label">Descripcion</label>
                            <div class="col-md-6">
                              <textarea rows="4" cols="50" class="form-control" placeholder="Descripcion" name="AREA_Descripcion"><?php echo $areas->AREA_Descripcion; ?></textarea> 
                            </div>
                            <div class="col-md-3">
                             <label for="AREA_Descripcion" > </label>
                            </div>
                        </div>
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-danger" href="?c=segu_usuario"><i class="fa fa-fw fa-times-circle "></i>Cancel </a>
                <button class="btn btn-primary pull-right"><i class="fa fa-fw fa-floppy-o"></i>Guardar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div> 
          <!-- /.box -->
          <!-- general form elements disabled -->
   
          <!-- /.box -->
        </div>

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

