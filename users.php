<?php
require_once('database.php');
require_once("validar.php");
try {

    //llenador de tabla
    $consulta = new Consultas();
    $res = $consulta -> listarUsuarios();

    if (isset($_POST['enviar'])) {
        $model2 = new Consultas();
        $model2 -> rut = htmlspecialchars($_POST["nusuario"]);
        $model2 -> nombre = htmlspecialchars($_POST["pass"]);
        $model2 -> nombusuario = htmlspecialchars($_POST["nombusuario"]);

        $model2 -> agregarUsuario();
        $mensaje2 = $model2 -> mensaje2;
        
    }
    if(isset($_POST['editar'])){
        // echo "borrar ".$_POST['id_proh'];
        $model2 = new Consultas();
        $datos = $model2 -> mostrarDatosUser($_POST['id_usr']);
    }
    if(isset($_POST['borrar'])){
        // echo "borrar ".$_POST['id_proh'];
        $model2 = new Consultas();
        $model2 -> eliminarUsuario($_POST['id_usr']);
    }
    

} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes PEP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/datatables.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/datatablesBootstrap4.min.js"></script>
	<script src="js/bootstrap.min.4.5.0.js"></script>
    <script src="js/dataTablesButton.min.js"></script>
	<script src="js/js.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableApp').DataTable();
        } );
    </script>
    <script>
    function cap(){
        var a = '0';
			a = document.getElementById("val1").value;
			//b = document.getElementById("valu1").value;
			console.log(a);
            //mirar();
			switch (a) {
				case '1':
					$("#editar_entrada").modal({backdrop:'static',keyboard:false});
                       
                    console.log("AUTOEX");
					break;
				default:
					break;
		}
    };
    </script>
    <script>
        function modalAgregar(){
            $( document ).ready(function() {
                $('#privModal').modal('toggle')
            });
        }
        $( function() {
            $( "#datepickerDesde" ).datepicker({
                dateFormat: "dd-mm-yy"
            });
        });
        $( function() {
            $( "#datepickerHasta" ).datepicker({
                dateFormat: "dd-mm-yy"
            });
        });
        
    </script>
    <script>
		window.onload=cap;
	</script>
</head>
<body>
<strong id="mensajes" value=""><?php echo $mensaje3; ?></strong>
<input type="hidden" name="rut_cli" id="rut_cli" value="">
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Administrar <b>Clientes PEP</b></h2>
                        <?php echo $resultado[""];?>
                        </div>
                        <div class="col-sm-6">
                            <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir nuevo colegio</span></a>-->
                            <a href="login.php" class="btn btn-danger"><i class="material-icons">exit_to_app</i><span>Salir</span></a>
                            <a href="subir.php" class="btn btn-danger"><i class="material-icons">analytics</i> <span>Volver</span></a>
                            <a href="#" class="btn btn-danger" onclick="modalAgregar()"><i class="material-icons">analytics</i> <span>Nuevo</span></a>
                        </div>
                    </div>
                </div>
                <table id="tableApp" class="table table-striped table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($res as $resultado){ ?>
                        
                        <tr>
                            <td><?php echo $resultado["n_usuario"]?></td>
                            <td><?php echo $resultado["nombre_usuario"]?></td>
                            <td>
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                <input type="hidden" name="id_usr" id="id_usr" value="<?php echo $resultado["id_usuario"]?>">
                                    <input type="hidden" name="insertar3">
                                    <button class="btn" type="submit" name="editar" value="editar">
                                        <span class="material-icons white-color">update</span>
                                    </button>
                                    <button class="btn" type="submit" name="borrar" value="borrar">
                                        <span class="material-icons white-color">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Mostrando <b>5</b> de <b><?php //echo $res_pg["total_reg"]?></b> entradas</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Anterior</a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                    </ul>
                </div>
            </div>
        </div> 
        <!-- MODAL INGRESO DE PEP -->
        <div class="modal fade" id="privModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">INGRESAR USUARIO</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="nusuario" class="form-label">USUARIO</label>
                                <input type="text" class="form-control input-s" name="nusuario" id="nusuario" required onfocus/>
                            </div>
                            <div class="mb-3">
                                <label for="nombusuario" class="form-label">NOMBRE COMPLETO</label>
                                <input type="text" class="form-control input-s" name="nombusuario" id="nombusuario" required/>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">CONTRASEÑA</label>
                                <input type="password" class="form-control" name="pass" id="pass" required/>
                            </div>
                        <hr>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="hidden" name="enviar">
                        <button type="submit" name="btnAction" value="Confirmar" class="btn btn-primary">Confirmar</button>   
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>