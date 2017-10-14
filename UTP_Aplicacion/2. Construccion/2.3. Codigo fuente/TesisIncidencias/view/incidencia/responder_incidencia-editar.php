  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Revisar mi incidencia
   
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
              <form id="frm-generol" class="form-horizontal"  action="#" method="post" enctype="multipart/form-data">
              <div class="box-body">


                        <input type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $incidencia->INCI_Id; ?> ">
                           
                        <div class="form-group">
                            <label for="CATE_Id" class="col-sm-3 control-label">Categoria</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="CATE_Id"  id="CATE_Id" disabled>
                                     <?php foreach($this->model->SelectCategorias() as $r): ?>
                                     <option   <?php echo $incidencia->CATE_Id == $r->CATE_Id ? 'selected' : ''; ?> value=<?php echo $r->CATE_Id; ?>><?php echo $r->CATE_Descripcion; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="AREA_Id" class="col-sm-3 control-label">Area</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="AREA_Id"  id="AREA_Id" disabled>
                                     <?php foreach($this->model->SelectAreas() as $r): ?>
                                     <option   <?php echo $incidencia->AREA_Id == $r->AREA_Id ? 'selected' : ''; ?> value=<?php echo $r->AREA_Id; ?>><?php echo $r->AREA_Nombre; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <label  class="col-md-3 control-label">Titulo</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="INCI_Titulo" placeholder="Nombre" name="INCI_Titulo" value="<?php echo $incidencia->INCI_Titulo; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                             <label for="INCI_Titulo" > </label>
                            </div>
                        </div>

                          <div class="form-group">
                            <label  class="col-md-3 control-label">Descripcion</label>
                            <div class="col-md-6">
                             <textarea id="INCI_Descripcion" name="INCI_Descripcion" class="form-control" rows="3" readonly><?php echo $incidencia->INCI_Descripcion; ?></textarea>
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
               
               <a 
                  data-toggle="modal" 
                  title="Ver detalle" 
                  data-target="#ModalHistorialIncidencias"
                  onclick="ModalHistorialIncidencias()"
                  class="btn btn-info pull-left" ><i class="fa fa-fw fa-eye" ></i>Ver traza generada</a>


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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Describa su respuesta</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=incidencia&a=ResponderIncidencia" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                        <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                              
                              <input type="hidden" name="INCI_Id" id="INCI_Id" value="<?php echo $incidencia->INCI_Id; ?> ">
                        </div>


                        <div class="form-group">
                            <label  class="col-md-3 control-label">Respuesta</label>
                            <div class="col-md-6">
                             <textarea id="INCI_DescripcionRespuesta" name="INCI_DescripcionRespuesta" class="form-control" rows="8" placeholder="Enviar mensaje"></textarea>
                            </div>
                            <div class="col-md-3">
                             <label for="INCI_DescripcionRespuesta" > </label>
                            </div>
                        </div>

   
              <input type="hidden" name="USUA_Id" id="USUA_Id" value="<?php echo $_SESSION['USUA_Id']; ?>">

              <input type="hidden" class="form-control" id="INCI_FechaAuditoria" name="INCI_FechaAuditoria" value="<?php echo date("Y,m,d h:i:s"); ?>">

                

              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-success pull-left"><i class="fa fa-fw fa-send"></i>Enviar</button>
              </div>
              <!-- /.box-footer -->
            </form>


           <div class="modal fade" id="ModalHistorialIncidencias" tabindex="-1" role="dialog" aria-labelledby="ModalHistorialIncidencias" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="ModalHistorialIncidencias">Historial de incidencia </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                           <div class="row table-responsive">
                                 <div class="col-sm-12">

                      
                         
                                       <table  id="TablaModalHistorialIncidencias"  class="table table-striped table-bordered table-hover">
                                              <thead>
                                                  <tr>
                                                   
                                                      <th>Interno </th>
                                                      <th>Cod. Ticket </th>
                                                      <th>Fec. Movimiento</th>  
                                                      <th>Tipo Movimiento</th> 
                                                      <th>Solucion</th> 
                                                      <th>Noti. cierre</th>                                                     
                                                      <th>Descripcion</th> 
                                                      <th>Usuario</th> 
                                                      <th></th> 
                                                 </tr>
                                              </thead>
                                              <tbody>
                                                   
                                              </tbody>
                                           </table> 
                                     
                               
                              </div>
                          </div>
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                
                    </div>
                  </div>
                </div>
            </div>


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

