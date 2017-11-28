  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Priorizar incidencia
   
        <small>Incidencias</small>
      </h1>
     <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Expreso Marvisur</a></li>
        <li><a href="?c=clasificar">Priorizar incidencias</a></li>
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
              <h3 class="box-title">Priorizar incidencia </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=priorizar&a=PriorizarIncidencia" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                        <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                              
                              <input type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $incidencia->INCI_Id; ?> ">
                        </div>

                        
                        <div class="form-group">
                            <label for="PRIO_Id" class="col-sm-3 control-label">Urgencia</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="PRIO_Id"  id="PRIO_Id">
                                     
                                     <option value="0">Sencillo</option>
                                     <option value="1">Bajo</option>
                                     <option value="2">Medio</option>
                                     <option value="3">Alto</option>
                                     
                                </select>
                            </div>
                        </div>
                           

                         <div class="form-group">
                            <label  class="col-md-3 control-label">Titulo</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="INCI_Titulo" placeholder="Nombre" name="INCI_Titulo" value="<?php echo $incidencia->INCI_Titulo; ?>" data-validacion-tipo="requerido|min:3" readonly>
                            </div>
                            <div class="col-md-3">
                             <label for="INCI_Titulo" > </label>
                            </div>
                        </div>

                         <div class="form-group">
                            <label  class="col-md-3 control-label">Descripcion</label>
                            <div class="col-md-6">
                             <textarea id="INCI_Descripcion" name="INCI_Descripcion" class="form-control" rows="3" placeholder="Enter ..." readonly><?php echo $incidencia->INCI_Descripcion; ?></textarea>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nombre" > </label>
                            </div>
                        </div>

                          <div class="form-group">
                            <label  class="col-md-3 control-label">Comentario</label>
                            <div class="col-md-6">
                             <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nombre" > </label>
                            </div>
                        </div>
                        

                <input type="hidden" class="form-control" id="INCI_FechaAuditoria" name="INCI_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">

              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-info pull-left"><i class="fa fa-fw fa-floppy-o"></i>Actualizar</button>
                <a class="btn btn-danger pull-right" href="?c=clasificar"><i class="fa fa-fw fa-times-circle "></i>Cancel </a>                
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

