<?php

$id = $_GET['id'];
$estado = $_GET['estado'];
$servername = "localhost";
$database = "id9005594_turnos_imc";
$username = "id9005594_juanpablo7";
$password = "qwerty777";
$ide = $_GET['ide'];
$estadoSI = $_GET['stateS'];


echo "ID: ". $ide;
echo "ESTADO: ". $estadoSI;

//$ide = $_SESSION["favid"];
//$estadoSI = $_SESSION["favestadoSI"];
//echo "ESTADO : ". $estadoSI;
// crea la conexion
$conn = mysqli_connect($servername, $username, $password, $database);

// verifico la conexion
if (!$conn) {
      die("<br>La conexion fallo!: " . mysqli_connect_error());
}
 
//$paciente=($_GET['paciente']);
//$documento=($_GET['dni']);
//$servicio=($_GET['servicio']);
//$profesional=($_GET['profesional']);
//$fecha=($_GET['fecha']);

//echo "Conexion exitosa!<br><br>";

//echo "-ID ". $ide. "<br>";
//echo "-ESTADO ". $estadoSI. "<br><br>";

//$sql = "SELECT id FROM turnos_cancel";

$sql2 = "INSERT INTO turnos_cancel (id, estado) VALUES ($ide, '$estadoSI')";
if (mysqli_query($conn, $sql2)) {
   $url="https://imcturnos.000webhostapp.com/MSG-CONFIRMACION.php"; 
    echo "<SCRIPT>window.location='$url';</SCRIPT>"; 
} else {
    echo "NOTIFICACION: " . $sql2 . "<br>" . mysqli_error($conn);
    $url="https://imcturnos.000webhostapp.com/MSG-YACON.php"; 
    echo "<SCRIPT>window.location='$url';</SCRIPT>"; 
}
mysqli_close($conn);
?>
