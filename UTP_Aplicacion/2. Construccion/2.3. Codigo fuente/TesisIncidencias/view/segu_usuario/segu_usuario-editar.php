  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Registrar Usuarios
   
        <small>Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Maestro</a></li>
        <li class="active">Usuario</li>
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
              <form id="frm-generol" class="form-horizontal"  action="?c=segu_usuario&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                        <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                              
                              <input type="hidden" name="USUA_Id" id="USUA_Id" value="<?php echo $segu_usuario->USUA_Id; ?> ">
                        </div>

                        
                         <div class="form-group">
                            <label  class="col-md-3 control-label">Nombre Comercial</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="USUA_Nombre" placeholder="Nombre" name="USUA_Nombre" value="<?php echo $segu_usuario->USUA_Nombre; ?>" data-validacion-tipo="requerido|min:3">
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nombre" > </label>
                            </div>
                        </div>



                        <div class="form-group">
                            <label  class="col-md-3 control-label">Nick</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="USUA_Nick" placeholder="Nick" name="USUA_Nick" value="<?php echo $segu_usuario->USUA_Nick; ?>" data-validacion-tipo="requerido|min:3">
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nick" ></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-3 control-label">Password</label>
                            <div class="col-md-6">
                              <input type="password" class="form-control" id="USUA_Password" placeholder="password" name="USUA_Password" value="<?php echo $segu_usuario->USUA_Password; ?>" data-validacion-tipo="requerido|min:3">
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Password" ></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-3 control-label">Repite Password</label>
                            <div class="col-md-6">
                              <input type="password" class="form-control" id="USUA_Password2" placeholder="password" name="USUA_Password2" value="" >
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Password2" ></label>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="ROL_Id" class="col-sm-3 control-label">Area</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="ROL_Id"  id="ROL_Id">
                                     <?php foreach($this->model->SelectRol() as $r): ?>
                                     <option   <?php echo $segu_usuario->ROL_Id == $r->ROL_Id ? 'selected' : ''; ?> value=<?php echo $r->ROL_Id; ?>><?php echo $r->ROL_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>



                <input type="hidden" class="form-control" id="USUA_FechaCreacion" name="USUA_FechaCreacion" value="<?php echo date("Y,m,d"); ?>">

                <input type="hidden" class="form-control" id="USUA_FechaAuditoria" name="USUA_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">

              
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

