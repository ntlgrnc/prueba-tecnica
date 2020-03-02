<?php
require 'conexion.php';
$con = new Conexion();
$conectar = $con->conectar();

$res = $conectar->query("SELECT * FROM `usuario`");


if (isset($_GET['eliminar'])) {
    $conectar->query("DELETE FROM usuario WHERE documento={$_GET['documento']}");
    header("location:registros.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prueba Tecnica</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Listado de registros</a>
            <ul class="nav">
                <li class="nav-item justify-content-end">
                    <a class="nav-link active" href="index.php"><i class="fas fa-plus-circle"></i> Añadir nuevo</a>
                </li>
            </ul>
            <form class="form-inline" method="POST" action="resultado.php">
                <input class="form-control mr-sm-2" type="search" id="documento" name="documento" placeholder="Buscar" aria-label="Search"  data-toggle="tooltip" data-placement="bottom" title="Ingrese un documento">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="accion" value="Consultar"><i class="fas fa-search"></i></button>
            </form>
        </nav>

        <div class="container-fluid mt-5">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">Razón Social</th>
                        <th scope="col">Tipo Doc.</th>
                        <th scope="col">No. Documento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Tipo Persona</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Fecha Ingreso</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($campos = $res->fetch_object()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $campos->razon_social; ?></th>
                            <td><?php echo $campos->tipo_doc; ?></td>
                            <td><?php echo $campos->documento; ?></td>
                            <td><?php echo $campos->telefono; ?></td>
                            <td><?php echo $campos->celular; ?></td>
                            <td><?php echo $campos->correo; ?></td>
                            <td><?php echo $campos->tipo_persona; ?></td>
                            <td><?php echo $campos->activo; ?></td>
                            <td><?php echo $campos->fecha_ingreso; ?></td>
                            <td scope="col">
                                <button type="button" class="btn btn-info" onclick="window.location.href = 'index.php?editar&id=<?php echo $campos->documento; ?>'"><i class="fas fa-user-edit"></i></button>
                                <button type="button" class="btn btn-info" onclick="if (confirm('Realmente desea eliminar a <?php echo $campos->razon_social; ?>')) {
                                            window.location.href = '?eliminar&documento=<?php echo $campos->documento; ?>'
                                        }"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <div>
        </div>
     
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
