  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Aprobar/Rechazar incidencias
        <small>Incidencias recibidas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mis incidencias</a></li>
        <li><a href="#">Maestros</a></li>
        <li class="active">Mis incidencias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">Lista de incidencias enviadas</h3>
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
                              $alerta="Operacion realizada con exito";
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
                        <th>F. Registro</th>
                        <th>Categoria</th>
                        <th>Estado</th>   
                        <th></th> 
                   </tr>
                </thead>
                <tbody>
                  <?php foreach($this->model->ListaIncidenciasEnviadas() as $r): ?>
                    <tr>
                 
                      <td><?php echo $r->INCI_Id; ?></td>
                      <td><?php echo $r->INCI_Titulo; ?></td>
                      <td><?php echo $r->INCI_FechaRegistro; ?></td>   
                      <td><?php echo $r->CATE_Descripcion; ?></td>                          
                      <td>Enviado</td>
                      <td> <a href="?c=aprobarrechazar_incidencia&a=Crud&Id=<?php echo $r->INCI_Id; ?>" data-toggle="tooltip" title="Aprobar/Rechazar" class="btn btn-social-icon btn-info btn-sm" ><i class="fa fa-fw fa-retweet " ></i></a>  </td>
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

