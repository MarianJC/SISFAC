<?php
require_once ROOT_PATH."views/layout/header.php";

 ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modificando Proveedor</h1>  
    </div>

    <!-- Content Row -->
    <div class="row">
    <div class="card-body shadow">
   
      <form method="post" action="?c=proveedor&a=actualizar">
          
        <div class="form-group">
            <input type="hidden" name="idprove" value="<?php echo $datos['idproveedor']; ?>">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nomprove" value="<?php echo $datos['nomproveedor']; ?>">
          </div>
          <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="text" class="form-control" name="rucprove" value="<?php echo $datos['rucproveedor']; ?>">
          </div>
          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="dirprove" value="<?php echo $datos['dirproveedor']; ?>">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telprove" value="<?php echo $datos['telproveedor']; ?>">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $datos['emailproveedor']; ?>">
          </div>
          
          <input class="btn btn-primary" type="submit" value="Guardar">
          <a class="btn btn-secondary" href="?c=proveedor&a=index">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once ROOT_PATH."views/layout/footer.php";
 ?>