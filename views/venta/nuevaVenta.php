<?php
require_once ROOT_PATH."views/layout/header.php";
 ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nuevo Registro de Venta</h1>  
    </div>

    <!-- Content Row -->
    <div class="row">
    <div class="card-body shadow">

    
    <form method="post" action="?c=venta&a=guardar">
        <div class="row mb-3">
            <label for="cliente" class="col-sm-2 col-form-label">Cliente</label>
            <div class="col-sm-4">
                <select class="form-control" name="cliente" required>
                    <option value="0">Seleccione Cliente</option> 
                    <?php
                    $ocli = new ModeloCliente();
                    $datocli = $ocli->listaClientes();
                    foreach($datocli as $filacli) {
                        echo "<option value='".$filacli["idcliente"]."'>".$filacli["nomcliente"]."</option>";
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-4">
                <select class="form-control" name="usuario" required>
                    <option value="0">Seleccione Usuario</option> 
                    <?php
                    $ouss = new ModeloUsuario;
                    $datouss = $ouss->listaUsuarios();
                    foreach($datouss as $filauss) {
                        echo "<option value='".$filauss["idusuario"]."'>".$filauss["nombres"]."</option>";
                    } 
    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="condicion" class="col-sm-2 col-form-label">Condicion Venta</label>
            <div class="col-sm-4">
                <select class="form-control" name="condicion" required>
                    <option value="0">Seleccione Condición Venta</option> 
                    <?php
                    $ocon = new ModeloCondicion;
                    $datocon = $ocon->listaCondicion();
                    foreach($datocon as $filacon) {
                        echo "<option value='".$filacon["idcondicion"]."'>".$filacon["nomcondicion"]."</option>";
                    } 
    ?>
                </select>
            </div>
        </div>
<!-- Detalle de venta -->
<div class="card-body">
    <h4 class="mb-3">Agregar Producto</h4>
    <form id="formDetalleVenta" class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="idproducto">Producto</label>
                <select class="form-control" id="idproducto" name="idproducto" required>
                    <option value="">Seleccione Producto</option>
                    <?php
                    $oprod = new ModeloProducto(); // Asegúrate de tener esta clase
                    $datoprod = $oprod->listaProductos();
                    foreach($datoprod as $filaprod) {
                        echo "<option value='".$filaprod["idproducto"]."'>".$filaprod["nomproducto"]."</option>";
                    } 
                    ?>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="cant">Cantidad</label>
                <input type="number" class="form-control" id="cant" name="cant" required min="1">
            </div>
            <div class="col-md-2 mb-3">
                <label for="cosuni">Costo Unitario</label>
                <input type="number" class="form-control" id="cosuni" name="cosuni" step="0.0001" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="preuni">Precio Unitario</label>
                <input type="number" class="form-control" id="preuni" name="preuni" step="0.0001" required>
            </div>
            <div class="col-md-2 mb-3">
                <label>&nbsp;</label>
                <button type="button" class="btn btn-primary btn-block" onclick="agregarDetalle()">Agregar</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered" id="tablaDetalleVenta" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Costo Unitario</th>
                    <th>Precio Unitario</th>
                    <th>Importe</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán dinámicamente las filas de detalle -->
            </tbody>
        </table>
    </div>
</div>

<script>
function agregarDetalle() {
    // Obtener los valores del formulario
    var producto = document.getElementById('idproducto');
    var cant = document.getElementById('cant').value;
    var cosuni = document.getElementById('cosuni').value;
    var preuni = document.getElementById('preuni').value;

    // Calcular el importe
    var importe = (cant * preuni).toFixed(2);

    // Crear una nueva fila en la tabla
    var tabla = document.getElementById('tablaDetalleVenta').getElementsByTagName('tbody')[0];
    var nuevaFila = tabla.insertRow(tabla.rows.length);

    // Insertar celdas con los datos
    nuevaFila.insertCell(0).innerHTML = producto.value;
    nuevaFila.insertCell(1).innerHTML = producto.options[producto.selectedIndex].text;
    nuevaFila.insertCell(2).innerHTML = cant;
    nuevaFila.insertCell(3).innerHTML = cosuni;
    nuevaFila.insertCell(4).innerHTML = preuni;
    nuevaFila.insertCell(5).innerHTML = importe;
    nuevaFila.insertCell(6).innerHTML = '<button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">Eliminar</button>';

    // Limpiar el formulario
    document.getElementById('formDetalleVenta').reset();
}

function eliminarFila(btn) {
    var fila = btn.parentNode.parentNode;
    fila.parentNode.removeChild(fila);
}
</script>

          <hr>
          <div class="row mb-3">          
          <div class="col-sm-6">
           
            <input class="btn btn-primary" type="submit" value="Guardar">
            <a class="btn btn-secondary" href="?c=venta&a=index">Cancelar</a>
            </div>
        </div>
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