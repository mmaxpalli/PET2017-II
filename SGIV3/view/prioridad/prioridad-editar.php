  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Establecer prioridad incidencia
   
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
              <form id="frm-generol" class="form-horizontal"  action="?c=prioridad&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                

                   <input type="hidden" id="btnClass" value="0">
                        <div class="form-group">
                              <input type="hidden" id="btnClass" value="0">
                              
                              <input type="hidden" name="PRIO_Id" id="PRIO_Id" value="<?php echo $prioridad->PRIO_Id; ?> ">
                              <input type="hidden" name="PRIO_FechaAuditoria" id="PRIO_FechaAuditoria" value="<?php echo $prioridad->PRIO_FechaAuditoria; ?> ">
                              <input type="hidden" name="USUA_Id" id="USUA_Id" value="<?php echo $_SESSION['USUA_Id']; ?>">
                        </div>


                       
                           <div class="form-group">
                            <label for="PRIO_Impacto" class="col-sm-3 control-label">Impacto</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="PRIO_Impacto"  id="PRIO_Impacto">                                    
                                     <option value="Alto">Alto</option>
                                     <option value="Medio">Medio</option>
                                     <option value="Bajo">Bajo</option>                                     
                                </select>
                            </div>
                          </div>




                        <div class="form-group">
                            <label  class="col-md-3 control-label">Urgencia</label>
                            <div class="col-md-6">
                              <input type="number" class="form-control" id="PRIO_Urgencia"  name="PRIO_Urgencia" value="<?php echo $prioridad->PRIO_Urgencia; ?>">
                            </div>
                            <div class="col-md-3">
                             <label for="PRIO_Urgencia" ></label>
                            </div>
                        </div>


                          <div class="form-group">
                            <label  class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="checkbox"> Considerar puntos de area
                                </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nick" ></label>
                            </div>
                        </div>


                      <div class="form-group">
                            <label  class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="checkbox"> Establecer como tarea SENCILLA
                                </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nick" ></label>
                            </div>
                        </div>

                        
                        

                         <div class="form-group">
                            <label  class="col-md-3 control-label"></label>
                            <div class="col-md-2">
                               <button class="btn btn-info pull-right"><i class="fa fa-fw fa-calculator"></i>Calcular</button>
                            </div>
                        </div>


                        <div class="form-group">
                            <label  class="col-md-3 control-label">Posicion atencion</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="USUA_Nick"  name="USUA_Nick" readonly>
                            </div>
                            <div class="col-md-3">
                             <label for="USUA_Nick" ></label>
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

