<?php
require 'conexion.php';
$con = new Conexion();
$conectar = $con->conectar();

    
    $documento = @$_POST['documento'];

    $mensaje = "";
    
    if ($documento != "") {
       $res = $conectar->query("SELECT * FROM `usuario` WHERE documento = $documento"); 
    } else {
       header('location:registros.php');
       echo $mensaje = "No existe un registro con: $documento";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Prueba Tecnica</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Listado de registros</a>
            <ul class="nav">
                <li class="nav-item justify-content-end">
                    <a class="nav-link active" href="index.php"><i class="fas fa-plus-circle"></i> Añadir nuevo</a>
                </li>
                <li class="nav-item justify-content-end">
                    <a class="nav-link active" href="registros.php"><i class="far fa-list-alt"></i> Ver todos</a>
                </li>
            </ul>
            <form class="form-inline" method="POST" action="resultado.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search"  data-toggle="tooltip" data-placement="bottom" title="Ingrese un documento">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="accion" value="Consultar">
                    <i class="fas fa-search"></i></button>
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
                    while (@$campos = $res->fetch_object()) {
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
        </div
    </body>
</html>
