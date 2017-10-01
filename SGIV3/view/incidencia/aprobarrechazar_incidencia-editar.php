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
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de incidencia </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=aprobarrechazar_incidencia&a=RechazarIncidencia" method="post" enctype="multipart/form-data">
              <div class="box-body">


                        <input type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $aprobarrechazar_incidencia->INCI_Id; ?> ">
                           
                        <div class="form-group">
                            <label for="CATE_Id" class="col-sm-3 control-label">Categoria</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="CATE_Id"  id="CATE_Id" disabled>
                                     <?php foreach($this->model->SelectCategorias() as $r): ?>
                                     <option   <?php echo $aprobarrechazar_incidencia->CATE_Id == $r->CATE_Id ? 'selected' : ''; ?> value=<?php echo $r->CATE_Id; ?>><?php echo $r->CATE_Descripcion; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="AREA_Id" class="col-sm-3 control-label">Area</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="AREA_Id"  id="AREA_Id" disabled>
                                     <?php foreach($this->model->SelectAreas() as $r): ?>
                                     <option   <?php echo $aprobarrechazar_incidencia->AREA_Id == $r->AREA_Id ? 'selected' : ''; ?> value=<?php echo $r->AREA_Id; ?>><?php echo $r->AREA_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <label  class="col-md-3 control-label">Titulo</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="INCI_Titulo" placeholder="Nombre" name="INCI_Titulo" value="<?php echo $aprobarrechazar_incidencia->INCI_Titulo; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                             <label for="INCI_Titulo" > </label>
                            </div>
                        </div>

                          <div class="form-group">
                            <label  class="col-md-3 control-label">Descripcion</label>
                            <div class="col-md-6">
                             <textarea id="INCI_Descripcion" name="INCI_Descripcion" class="form-control" rows="3" readonly><?php echo $aprobarrechazar_incidencia->INCI_Descripcion; ?></textarea>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nombre" > </label>
                            </div>
                        </div>

                         <div class="form-group">
                            <label  class="col-md-3 control-label">Adjunto</label>
                            <div class="col-md-6">
                               <a href="#" target="_blank">Ver imagen 1</a><br>
                               <a href="#" target="_blank">Ver imagen 2</a>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nombre" > </label>
                            </div>
                        </div>
                        
                       
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button class="btn btn-danger pull-left"><i class="fa fa-fw fa-times-circle"></i>Rechazar esta incidencia</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div> 
          <!-- /.box -->
          <!-- general form elements disabled -->
   
          <!-- /.box -->
        </div>


          <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Valores iniciales para aprobar incidencia </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=aprobarrechazar_incidencia&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                        <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                              
                              <input type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $aprobarrechazar_incidencia->INCI_Id; ?> ">
                        </div>

                        

                        
                           
                        <div class="form-group">
                            <label for="CATE_IdNueva" class="col-sm-3 control-label">Categoria</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="CATE_IdNueva"  id="CATE_IdNueva">
                                     <?php foreach($this->model->SelectCategorias() as $r): ?>
                                     <option   <?php echo $aprobarrechazar_incidencia->CATE_Id == $r->CATE_Id ? 'selected' : ''; ?> value=<?php echo $r->CATE_Id; ?>><?php echo $r->CATE_Descripcion; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="AREA_IdNueva" class="col-sm-3 control-label">Area</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="AREA_IdNueva"  id="AREA_IdNueva">
                                     <?php foreach($this->model->SelectAreas() as $r): ?>
                                     <option   <?php echo $aprobarrechazar_incidencia->AREA_Id == $r->AREA_Id ? 'selected' : ''; ?> value=<?php echo $r->AREA_Id; ?>><?php echo $r->AREA_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="NIVE_IdNueva" class="col-sm-3 control-label">Nivel</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="NIVE_IdNueva"  id="NIVE_IdNueva">
                                     <?php foreach($this->model->SelectNivel() as $r): ?>
                                     <option value=<?php echo $r->NIVE_Id; ?>><?php echo $r->NIVE_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
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
                           <label for="USUA_IdResponsable" class="col-sm-3 control-label">Asignar a:</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="USUA_IdResponsable"  id="USUA_IdResponsable">
                                     <?php foreach($this->model->SelectUsuariosTecnicos() as $r): ?>
                                     <option value=<?php echo $r->USUA_Id; ?>><?php echo $r->USUA_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        

                        
              <input type="hidden" class="form-control" id="TRIN_FechaRegistro" name="TRIN_FechaRegistro" value="<?php echo date("Y,m,d"); ?>">
   
              <input type="hidden" name="USUA_Id" id="USUA_Id" value="<?php echo $_SESSION['USUA_Id']; ?>">

              <input type="hidden" class="form-control" id="TRIN_FechaAuditoria" name="TRIN_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">

                

              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-success pull-left"><i class="fa fa-fw fa-check-square-o"></i>Aprobar esta incidencia</button>
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
