<?php require_once 'class/class_login.php'; 
$blog = new blog();
if (isset($_POST['grabar']) and $_POST['grabar']=='si')
{
	$blog->nueva_sesion();
}else{

}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ingreso al sistema</title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/formulario.css">
    </head>
    <body>
    <center><h1 class="page-header">Aplicativo SAAP</h1></center>
    <?php
	include 'view/header.php';
	?>
        <p>Ingrese usuario y password</p>
        <div class="Registro">
        <center>
        <form name="form" action="" method="post">

                   <input type="text" name="nom" placeholder="Nombre de usuario" autocomplete="off"><br><br> 
               <input type="hidden" name="grabar" value="si">

                    <input type="password" name="pass" placeholder="Contraseña" autocomplete="off"><br><br>
                <?php
				
				if(isset($_GET['usuario']))
				{
				?>
			
				<?php
				
					switch($_GET['usuario'])
					{
						case 'no_existe':
						echo"<script type='text/javascript'>
	 					alert('Los datos no existen o son incorrectos');
	window.location='index.php';
	</script>";
						?>
						
						<?php
					}
				}
				?>
				
                   <input type="submit" value="Inicia sesión" onClick="validar()"> 
               
      </form>
      </center>
      <?php
	  include 'view/footer.php';
	  ?>
    </body>
</html>