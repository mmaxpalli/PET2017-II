  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Cierre de incidencias
        <small>Notificadas y acpetadas</small>
      </h1>
       <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Expreso Marvisur</a></li>        
        <li class="active"><i class="fa fa-list-alt"></i> Lista incidencias</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">Lista de incidencias</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>

      
            <div class="box-body">
         
             <div class="row">
              <div class="col-lg-2">
               <input type="hidden" id="btnClass" value="<?php echo isset($_SESSION['TipoVentanaEmergente'])?$_SESSION['TipoVentanaEmergente']:''; ?>">
                    <?php 
                          if(isset($_SESSION['TipoVentanaEmergente'])){
                            if($_SESSION['TipoVentanaEmergente']=="success"){
                              $titulo="Exito";
                              $alerta="Registro insertado con exito";
                            }
                            else if( $_SESSION['TipoVentanaEmergente']=="fail"){
                              $titulo="Error";
                              $alerta="Ocurrio un error inesperado";
                            }
                            else{
                              $titulo="";
                              $alerta="";
                            }
                          }
                          else{

                            $titulo="";
                            $alerta="";
                          }
                        unset($_SESSION['TipoVentanaEmergente']); ?>                
             
                  <br>
              </div>
            </div>
            <table   id="tbDTb" class="table table-striped  table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Titulo</th>
                        <th>Categoria</th> 
                        <th>Prioridad</th>   
                        <th>Estado</th>  
                        <th>Responsable</th>                        
                        <th></th> 
                   </tr>
                </thead>
                <tbody>
                  <?php foreach($this->modelIncidencias->ListaIncidenciasParaCierre() as $r): ?>
                    <tr id="<?php echo $r->INCI_Id; ?>">
                 
                      <td><?php echo $r->INCI_Id; ?></td>
                      <td><?php echo $r->INCI_Titulo; ?></td>
                      <td><?php echo $r->CATE_Descripcion; ?></td> 
                      <td><?php echo $r->Prioridad; ?></td>                                                                      
                      <td><?php echo $r->ESTA_Nombre; ?></td>   
                      <td><?php echo $r->USUA_Nombre; ?></td>
                      <td> 
        

                      <a                                
                              data-toggle="modal" 
                              title="Ver detalle" 
                              data-target="#ModalHistorialIncidencias"
                              onclick="ModalHistorialIncidenciasCierre()"
                              class="btn btn-social-icon btn-info btn-sm" ><i class="fa fa-fw fa-eye" ></i></a>



                              <a href="#" 
                            data-href="?c=cierre&a=Guardar&INCI_Id=<?php echo $r->INCI_Id;?>&TRIN_Id=<?php echo $r->TRIN_Id; ?>"
                              data-toggle="modal" 
                              title="Cerrar incidencia" 
                              data-target="#confirm-delete"
                              class="btn btn-social-icon btn-danger btn-sm" ><i class="fa fa-fw fa-legal" ></i></a>  

                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table> 

             
           

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="mensaje ">
                              <strong><?php echo $titulo?></strong> <?php echo $alerta?>
                        </div>               
                </div>
              </div>
            </div>




             <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Cerrar incidencia</h4>
                            </div>
                        
                            <div class="modal-body">
                                <p>¿Esta seguro que desea cerrar la incidencia seleccionada?</p>
                                <p class="debug-url"></p>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger btn-ok">Si seguro</a>
                            </div>
                        </div>
                    </div>
             </div>

               <div class="modal fade" id="VerDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Borrar Elemento</h4>
                            </div>
                        
                            <div class="modal-body">
                                <p>Deseas Borrar este elemento</p>
                                <p class="debug-url"></p>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger btn-ok">Delete</a>
                            </div>
                        </div>
                    </div>
             </div>


             



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
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


