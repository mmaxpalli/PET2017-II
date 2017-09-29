  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Reportar incidencia
   
        <small>Incidencias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Maestro</a></li>
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
              <h3 class="box-title">Reportar incidencia </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=incidencia&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                        <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                              
                              <input type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $incidencia->INCI_Id; ?> ">
                        </div>

                        

                        
                           
                        <div class="form-group">
                            <label for="CATE_Id" class="col-sm-3 control-label">Categoria</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="CATE_Id"  id="CATE_Id">
                                     <?php foreach($this->model->SelectCategorias() as $r): ?>
                                     <option   <?php echo $incidencia->CATE_Id == $r->CATE_Id ? 'selected' : ''; ?> value=<?php echo $r->CATE_Id; ?>><?php echo $r->CATE_Descripcion; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="AREA_Id" class="col-sm-3 control-label">Area</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="AREA_Id"  id="AREA_Id">
                                     <?php foreach($this->model->SelectAreas() as $r): ?>
                                     <option   <?php echo $incidencia->AREA_Id == $r->AREA_Id ? 'selected' : ''; ?> value=<?php echo $r->AREA_Id; ?>><?php echo $r->AREA_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <label  class="col-md-3 control-label">Titulo</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="INCI_Titulo" placeholder="Titulo de incidencia" name="INCI_Titulo" value="" data-validacion-tipo="requerido|min:3">
                            </div>
                            <div class="col-md-3">
                             <label for="INCI_Titulo" > </label>
                            </div>
                        </div>

                         <div class="form-group">
                            <label  class="col-md-3 control-label">Descripcion</label>
                            <div class="col-md-6">
                             <textarea id="INCI_Descripcion" name="INCI_Descripcion" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="col-md-3">
                             <label for="INCI_Descripcion" > </label>
                            </div>
                        </div>
                        

                         <div class="form-group">
                            <label  class="col-md-3 control-label">Adjunto</label>
                            <div class="col-md-6">
                               <input type="file" id="exampleInputFile">
                                <p class="help-block">Archivo seleccionado</p>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nombre" > </label>
                            </div>
                        </div>
                        
                       
                     


                     
               <input type="hidden" name="USUA_Id" id="USUA_Id" value="<?php echo $_SESSION['USUA_Id']; ?>">

                <input type="hidden" class="form-control" id="INCI_FechaAuditoria" name="INCI_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">

              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-success pull-left"><i class="fa fa-fw fa-floppy-o"></i>Guardar</button>
                <a class="btn btn-danger pull-right" href="?c=segu_usuario"><i class="fa fa-fw fa-times-circle "></i>Cancel </a>                
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

