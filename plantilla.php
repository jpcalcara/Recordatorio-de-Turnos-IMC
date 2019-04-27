<!DOCTYPE html>
<html>

  <head>
    <?php  
    //variables que recibo de la consulta a la DB origen
    $id = $_GET['id'];
    $pa = $_GET['paciente'];
    $dni = $_GET['documento'];
    $ser = $_GET['servicio'];
    $pro = $_GET['profesional'];
    $fe = $_GET['fecha'];
    
    
    //$_SESSION["favestadoSI"] = "SI";
    //$_SESSION["favestadoNO"] = "NO";
    $estado1 = "SI";
    $estado2 = "NO";
    ?>

  </head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <body>
	<fieldset>
    <legend>RECORDATORIO DE TURNO:</legend>
    <header>
	  <div class="container" "background-color:red;" >
	  <img src="http://www.imcnet.com.ar/wp-content/uploads/2017/05/2017.05_07.jpg" class="img-fluid" class="float-center" width="400" height="200"> 
    </header>
		<br>
 		<div style = "float left">PACIENTE :<strong><?php  echo $pa; ?></strong></div><br>
		<div style = "float left">DOCUMENTO :<strong><?php  echo $dni; ?></strong></div><br>
		<div style = "float left">SERVICIO :<strong><?php  echo $ser; ?></strong></div><br>
        <div style = "float: left">PROFESIONAL :<strong><?php  echo $pro; ?></strong></div><br><br>
        <div style = "float: left">FECHA :<strong><?php  echo $fe; ?></strong></div><br><br>
        <div style = "float: left">HORA :</div><br><br>
        <div style = "float: left">DIRECCI&Oacute;N: <strong> Av. Sagrada Familia 359 - C&oacute;rdoba</strong></div>
        <p>&nbsp;</p>
    </div>
	  <center>
      <a href="https://imcturnos.000webhostapp.com/insertDBYES.php?ide=<?php echo $id;?>&estado1=<?php echo $estado1?>"  ><button>CONFIRMAR</button></a>
      <a href="https://imcturnos.000webhostapp.com/insertDBNO.php?ide=<?php echo $id;?>&estado2=<?php echo $estado2?>"><button>CANCELAR</button></a>
	  </center>
	  </fieldset>
  </body>
</html>