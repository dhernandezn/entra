<?php  
session_start();
require_once("database.php");
require_once("validar.php");

/*
if (isset($_SESSION['rut'])) {
	//echo '<script> window.location="clientes.php";</script>';
	$profile = $_SESSION['rut'];
}
*/
date_default_timezone_set("America/Santiago");
$hoy = date ("d-m-Y",time());
$mensaje = "";
try {

if(isset($_POST['ingresar'])){
    $model = new Consultas();
    $model -> login(htmlspecialchars($_POST["user"]),htmlspecialchars($_POST["pass"]));
    $mensaje = $model -> mensaje; 
}

$mensaje = null;

} catch (PDOException $e) {
	 echo "ERROR: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>##Revisión De Clientes##</title>
	<link rel="apple-touch-icon" sizes="180x180" href="css/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="css/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="css/favicon/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/style.css">


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.4.5.0.js"></script>
	<script src="js/js.js"></script>

	
  <script>
	function dirigirA(){
		window.location="subir.php"
	}
	document.addEventListener("keydown", e =>{
		if(e.ctrlKey && e.altKey && e.key.toLowerCase() === "6"){
			dirigirA()
		}
	})
  </script>
  <style>
.login-form {
    width: 340px;
    margin: 50px auto;
    border-radius: 5%;
}
.login-form form {        
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.input-group-addon .fa {
    font-size: 18px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
.bottom-action {
  	font-size: 14px;
}
</style>
</head>
<body>
    <div class="contenedor">
	<div class="login-form">
	    <header>
		    <span class="titulo"><h2 class="main_title">Consultar Cliente</h2></span><br><br>
		</header>
		<div class="logincont">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> 
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="material-icons">person</span>
                        </span>                    
                    </div>
                    <input type="text" name="user" class="form-control" placeholder="Usuario" required="required" autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">password</i>
                        </span>                    
                    </div>
                    <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="required">
                </div>
            </div>        
            <div class="form-group">
                <button type="hidden" name="ingresar"></button>
                <button type="submit" class="btn btn-primary btn-block">INGRESAR</button>
            </div>
            <p>asda<strong id="mensajes" value="<?php echo "asdas".$mensaje; ?>"><?php echo $mensaje; ?></strong></p>
            <div class="bottom-action clearfix">
                <!-- <label class="float-left form-check-label"><input type="checkbox"> Remember me</label> -->
                <!-- <a href="#" class="float-right">Forgot Password?</a> -->
            </div>
            </form>
        </div>
	</div>
    </div>
</body>
</html>
