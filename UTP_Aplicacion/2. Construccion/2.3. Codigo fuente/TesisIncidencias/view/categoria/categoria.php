  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Categoria
        <small>Areas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Maestros</a></li>
        <li class="active">Categoria</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">Listado de Categoria</h3>
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
                         <a class="btn btn-block btn-success" href="?c=categoria&a=Crud">Nuevo </a>
                  <br>
              </div>
            </div>

            <table   id="tbDTb" class="table table-striped  table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>                        
                   </tr>
                </thead>
                <tbody>
                  <?php foreach($this->model->Listar() as $r): ?>
                    <tr>
                      <td><?php echo $r->CATE_Id; ?></td>
                      <td><?php echo $r->CATE_Descripcion; ?></td>                      
                      <td> <a href="?c=categoria&a=Crud&Id=<?php echo $r->CATE_Id; ?>" data-toggle="tooltip" title="Editar" class="btn btn-social-icon btn-danger btn-sm" ><i class="fa fa-fw fa-edit " ></i></a>  </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table> 
             
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


