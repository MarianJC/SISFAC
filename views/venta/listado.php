<?php
require_once "views/layout/header.php";
 ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Listado de Ventas</h3>
        <a href="index.php?c=venta&a=nuevo" class="btn btn-success">Registrar Nueva Venta</a>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Vendedor</th>
                        <th>Cliente</th>
                        <th>Doc.</th>
                        <th>Importe</th>
                        <th>IGV</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                       foreach ($datos as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['nombres']; ?></td>
                        <td><?php echo $row['nomcliente']; ?></td>
                        <td><?php echo $row['docu']; ?></td>
                        <td><?php echo $row['importe']; ?></td>
                        <td><?php echo $row['igv']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td>
                        <a href="index.php?c=venta&a=verDetalle&id=<?php echo $row['id']; ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                        </a>
                        <a href="index.php?c=venta&a=borrar&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


</div>

<?php
require_once "views/layout/footer.php"; 
?>

 