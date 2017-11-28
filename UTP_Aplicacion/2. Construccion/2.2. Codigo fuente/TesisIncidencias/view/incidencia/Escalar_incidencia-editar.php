  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Escalar incidencia
   
        <small>Incidencias</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Expreso Marvisur</a></li>
        <li><a href="?c=escalar">Lista incidencias</a></li>
        <li class="active">Incidencias</li>
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
              <h3 class="box-title">Escalar incidencia </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=escalar&a=EscalarIncidencia" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                        <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                              
                              <input type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $incidencia->INCI_Id; ?> ">
                        </div>

                        
                         <div class="form-group">
                            <label  class="col-md-3 control-label">Nivel Actual</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="NIVE_Nombre" name="NIVE_Nombre" value="<?php echo $incidencia->NIVE_Nombre; ?>" data-validacion-tipo="requerido|min:3" readonly>
                            </div>
                            <div class="col-md-3">
                             <label for="NIVE_Nombre" > </label>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="NIVE_Id" class="col-sm-3 control-label">Nivel</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="NIVE_Id"  id="NIVE_Id">
                                     <?php foreach($this->modelNivel->ListarNivel() as $r): ?>
                                     <option   <?php echo $incidencia->NIVE_Id == $r->NIVE_Id ? 'selected' : ''; ?> value=<?php echo $r->NIVE_Id; ?>><?php echo $r->NIVE_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                           
                        <div class="form-group">
                            <label for="USUA_Id" class="col-sm-3 control-label">Asignar a</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="USUA_Id"  id="USUA_Id">
                                     <?php foreach($this->modelUsuarios-> ListarUsuariosTecnicos() as $r): ?>
                                     <option   <?php echo $incidencia->USUA_Id == $r->USUA_Id ? 'selected' : ''; ?> value=<?php echo $r->USUA_Id; ?>><?php echo $r->USUA_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label  class="col-md-3 control-label">Motivo</label>
                            <div class="col-md-6">
                             <textarea id="Motivo" name="Motivo" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="col-md-3">
                             <label for="Motivo" > </label>
                            </div>
                        </div>

                         
                        

                <input type="hidden" class="form-control" id="INCI_FechaAuditoria" name="INCI_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">

              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-info pull-left"><i class="fa fa-fw fa-floppy-o"></i>Actualizar</button>
                <a class="btn btn-danger pull-right" href="?c=escalar"><i class="fa fa-fw fa-times-circle "></i>Cancel </a>                
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

