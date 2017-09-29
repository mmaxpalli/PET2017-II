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
        <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de incidencia </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=resolucion&a=RechazarIncidencia" method="post" enctype="multipart/form-data">
              <div class="box-body">


                       
                           
                        <div class="form-group">
                            <label for="CATE_Id" class="col-sm-3 control-label">Categoria</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="CATE_Id"  id="CATE_Id" disabled>
                                     <?php foreach($this->model->SelectCategorias() as $r): ?>
                                     <option   <?php echo $resolucion->CATE_Id == $r->CATE_Id ? 'selected' : ''; ?> value=<?php echo $r->CATE_Id; ?>><?php echo $r->CATE_Descripcion; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="AREA_Id" class="col-sm-3 control-label">Area</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="AREA_Id"  id="AREA_Id" disabled>
                                     <?php foreach($this->model->SelectAreas() as $r): ?>
                                     <option   <?php echo $resolucion->AREA_Id == $r->AREA_Id ? 'selected' : ''; ?> value=<?php echo $r->AREA_Id; ?>><?php echo $r->AREA_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <label  class="col-md-3 control-label">Titulo</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="INCI_Titulo" placeholder="Nombre" name="INCI_Titulo" value="<?php echo $resolucion->INCI_Titulo; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                             <label for="INCI_Titulo" > </label>
                            </div>
                        </div>

                          <div class="form-group">
                            <label  class="col-md-3 control-label">Descripcion</label>
                            <div class="col-md-6">
                             <textarea id="INCI_Descripcion" name="INCI_Descripcion" class="form-control" rows="3" readonly><?php echo $resolucion->INCI_Descripcion; ?></textarea>
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
               
             
              </div>
              <!-- /.box-footer -->
            </form>
          </div> 
          <!-- /.box -->
          <!-- general form elements disabled -->
   
          <!-- /.box -->
        </div>


          <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Resolucion de incidencia </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=resolucion&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                        <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                        </div>

                        

                        
                      
                     
                        <div class="form-group">
                            <label for="REIN_TipoSolucion" class="col-sm-3 control-label">Tipo solucion</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="REIN_TipoSolucion"  id="REIN_TipoSolucion">
                                     <option value="Virtual">Virtual</option>
                                     <option value="Presencial">Presencial</option>
                                  
                                </select>
                            </div>
                        </div>




                         <div class="form-group">
                            <label  class="col-md-3 control-label">Descripción</label>
                            <div class="col-md-6">
                             <textarea id="REIN_Descripcion" name="REIN_Descripcion" class="form-control" rows="5" placeholder="Describa detallademente los pasos a realizar para la resolucion de la incidencia"></textarea>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nombre" > </label>
                            </div>
                        </div>

                        
                        
                <input type="hidden" name="TRIN_Id" id="TRIN_Id" value="<?php echo $resolucion->TRIN_Id; ?> ">
               <input  type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $resolucion->INCI_Id; ?> ">

               <input type="hidden" class="form-control" id="REIN_TipoMovimiento" name="REIN_TipoMovimiento" value="Operacion"> 

              <input type="hidden" class="form-control" id="REIN_FechaMovimiento" name="REIN_FechaMovimiento" value="<?php echo date("Y,m,d"); ?>">
   
              <input type="hidden" name="USUA_Id" id="USUA_Id" value="<?php echo $_SESSION['USUA_Id']; ?>">

              <input type="hidden" class="form-control" id="REIN_FechaAuditoria" name="REIN_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">

                

              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-success" name="Guardar" value ="Guardar"><i class="fa fa-fw fa-floppy-o"></i>Guardar</button>
                <button class="btn btn-danger" name="Rechazar" value ="Rechazar"><i class="fa fa-fw fa-remove"></i>No puedo resolverlo</button>
                <button class="btn btn-warning pull-right" name="Notificar" value ="Notificar"><i class="fa fa-fw  fa-exclamation"></i>Notificar para cierre</button>
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

