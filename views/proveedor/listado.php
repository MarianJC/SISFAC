<?php
require_once "views/layout/header.php";
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Listado de Proveedores</h3>
        <a href="index.php?c=proveedor&a=nuevo" class="btn btn-success">
            <?php include_once 'assets/icons/add_circle.svg'; ?>
            Nuevo Proveedor
        </a> 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>RUC</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                       foreach ($datos as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['idproveedor']; ?></td>
                        <td><?php echo $row['nomproveedor']; ?></td>
                        <td><?php echo $row['rucproveedor']; ?></td>
                        <td><?php echo $row['dirproveedor']; ?></td>
                        <td><?php echo $row['telproveedor']; ?></td>
                        <td><?php echo $row['emailproveedor']; ?></td>
                        <td class="text-center">
                        <a href="index.php?c=proveedor&a=editar&id=<?php echo $row['idproveedor']; ?>" class="btn btn-success btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?c=proveedor&a=borrar&id=<?php echo $row['idproveedor']; ?>" class="btn btn-danger btn-circle btn-sm">
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

<?php
require_once "views/layout/footer.php"; 
?>
