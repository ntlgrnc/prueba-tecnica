<?php
if (isset($_GET['editar'])) {
    require 'Conexion.php';
    $con = new Conexion();

    $consulta = $con->conectar();

    $res = $consulta->query("SELECT * FROM `usuario` WHERE documento={$_GET['id']}");

     if($campos = $res->fetch_object()){
     
        $campos->razon_social;
        $campos->documento;
        $campos->tipo_doc;
        $campos->telefono;
        $campos->celular;
        $campos->correo;
        $campos->tipo_persona;
        $campos->activo;
        $campos->fecha_ingreso;
     }  
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
            <a class="navbar-brand">Bienvenido/a</a>
            <ul class="nav">
                <li class="nav-item justify-content-end">
                    <a class="nav-link active" href="registros.php"><i class="fas fa-eye"></i> Ver registros</a>
                </li>
            </ul>
        </nav>
        
        <div class="container mt-5">
            <form class="mt-5" action="proceso.php" method="POST">
                <div class="form-group row">
                    <label for="razon_social" class="col-sm-2 col-form-label">Razón social:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="razon_social" name="razon_social" value="<?php echo @$campos->razon_social; ?>" placeholder="Escriba el nombre aquí" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tipodoc" class="col-sm-2 col-form-label">Tipo de documento:</label>
                    <div class="col-sm-10">
                        <select class="custom-select mr-sm-2" id="tipodoc" name="tipodoc" value="<?php echo @$tipodoc; ?>"  required>
                            <option selected>Elegir</option>
                            <option value="Cédula de Ciudadanía">Cédula de ciudadanía</option>
                            <option value="Tarjeta de Identidad">Tarjeta de identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Nit">NIT</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="numdoc" class="col-sm-2 col-form-label">No. de Documento:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="numdoc" name="numdoc" value="<?php echo @$campos->documento; ?>" placeholder="Escriba el numero de su documento aquí"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo @$campos->telefono; ?>" placeholder="Escriba su teléfono fijo aquí"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="celular" class="col-sm-2 col-form-label">Celular:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo @$campos->celular; ?>" placeholder="Escriba su número celular aquí"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="correo" class="col-sm-2 col-form-label">Correo electrónico:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo @$campos->correo; ?>" placeholder="Escriba su correo aquí"  required>
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Tipo de persona:</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="tipopersona" id="natural" value="Natural">
                                <label class="custom-control-label" for="natural">
                                    Natural
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="tipopersona" id="juridica" value="Jurídica">
                                <label class="custom-control-label" for="juridica">
                                    Jurídica
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-2">Activo:</div>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="activo" name="activo" value="Si">
                            <label class="custom-control-label" for="activo">Si</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="inactivo" name="inactivo" value="No">
                            <label class="custom-control-label" for="inactivo">No</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha de ingreso:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo @$campos->fecha_ingreso; ?>" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <?php if(isset($_GET['editar'])) { ?>
                            <script type="text/javascript">
                                function cambiar() {
                                    var cambio = document.querySelector("button");
                                    cambio.setAttribute("value","Actualizar");
                                }
                                //document.getElementById("accion").value=Actualizar;
                            </script>
                        <?php } ?>
                            <button type="submit" class="btn btn-info" id="accion" name="accion" value="Guardar" onclick="cambiar()"> Aceptar </button>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
