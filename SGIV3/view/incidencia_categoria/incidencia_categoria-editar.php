  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
              Reporte de incidencias
        <small> Reporte por categorias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Maestros</a></li>
       <li class="active">Reporte por categorias </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
 
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=gene_empresa&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                


                    <div class="col-md-3">
                        <div class="form-group">
                                       
                                          <label  class="col-md-3 control-label">Deste </label>                             
                                          <div class="col-md-9">
                                                <div class="input-group date">
                                                  <input type="text" class="form-control input-sm" id="datepicker" name="FechaInicio" value="" >
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                    <!-- /.input group -->
                                        </div>


                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">                                 
                                          <label  class="col-md-3 control-label">Hasta</label>
                                          <div class="col-md-9">
                                                <div class="input-group date">
                                                  <input type="text" class="form-control input-sm" id="datepicker2" name="FechaFin" value="" >
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                    <!-- /.input group -->
                                        </div>
                        </div>
                    </div>

  
                    

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="CATE_Id" class="col-sm-3 control-label">Categoria</label>
                            <div class="col-sm-6">
                                <select class="form-control " name="CATE_Id"  id="CATE_Id">
                                     <?php foreach($this->model->ListarCategorias() as $r): ?>
                                     <option   value=<?php echo $r->CATE_Id; ?>><?php echo $r->CATE_Descripcion; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        </div>


                  <div class="col-md-2">
                            <a class="btn btn-primary btn-sm pull-right" rel="tooltip" title="Vista Previa" onclick="TblReporteVen()">Vista Previa<i class="fa fa-fw fa-info-circle"></i></a> 
                  </div>
               
              </div>
              <!-- /.box-body -->
   
              <!-- /.box-footer -->
            </form>
          </div> 
          <!-- /.box -->
          <!-- general form elements disabled -->
   
          <!-- /.box -->
        </div>


        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=gene_empresa&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                

                  <div class="col-md-1">
                            <a class="btn btn-success btn-sm " rel="tooltip" title="Excel" onclick="TblExcelFormRpt('Excel')"  >Excel<i class="fa fa-fw fa-file-excel-o"></i></a> 
                  </div>

                       <div class="col-md-1">
                            <a class="btn btn-danger btn-sm " rel="tooltip" title="Pdf"  onclick="TblExcelFormRpt('Pdf')">Pdf<i class="fa fa-fw fa-file-pdf-o"></i></a> 
                  </div>
               
               
              </div>
              <!-- /.box-body -->
   
              <!-- /.box-footer -->
            </form>
          </div> 
          <!-- /.box -->
          <!-- general form elements disabled -->
   
          <!-- /.box -->
        </div>



        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form id="frm-generol" class="form-horizontal"  action="?c=gene_empresa&a=Guardar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                  


                    <div class="col-md-12">                         
                              <div class="form-group">
                                        <div class="box-body table-responsive no-padding">
                                          
                                                   <table id="RptVendedor"  class="table table-hover">
                                                      <thead>
                                                          <tr>
                                                              <th>Codigo</th>
                                                              <th>Titulo</th>
                                                              <th>F.Registro </th>  
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

                  
               
              </div>
              <!-- /.box-body -->
   
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