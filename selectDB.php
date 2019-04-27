<html>
<body>
    <h2>INSTITUTO MODELO DE CARDIOLOGIA</h2>
    </br>
    <h3>Recordatorio de turno</h3>
    <?php
    $servername = "localhost";
    $username = "id9005594_juanpablo7";
    $password = "qwerty777";
    $dbname = "id9005594_turnos_imc";

    // Creo la conexion
    $conn = new mysqli($servername, $username, $password, $dbname);
    // verifico la conexion
    if ($conn->connect_error) {
        die("<Br>LA CONEXION FALLO!: " . $conn->connect_error);
    } 
    $sql = "SELECT id, paciente, dni, servicio, profesional, fecha, mail, hora FROM sacardatos_db";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        /*/echo  "<br>Paciente: " . $row["paciente"]."<br>". "<br>N° Documento: ".$row["dni"]. "<br>". "<br>Servicio: ". $row["servicio"]. "<br>". "<br>Profesional: ". $row["profesional"]. "<br>". "<br>Fecha: ". $row["fecha"]. "<br>". "<br>";
        */
        echo "<br>ID: ". $row["id"]."<br>";
        echo "<br>PACIENTE: ". $row["paciente"]."<br>";
        echo "<br>Nro DOCUMENTO: ". $row["dni"]."<br>";
        echo "<br>SERVICIO: ". $row["servicio"]."<br>";
        echo "<br>PROFESIONAL: ". $row["profesional"]."<br>";
        echo "<br>FECHA: ". $row["fecha"]."<br>";
        echo "<br>HORA: ". $row["hora"]."<br>";
        echo "<br>EMAIL: ". $row["mail"]."<br>";
        echo "<br>*******************************<br>";
        
            $id = $row["id"];
            $paciente = $row["paciente"];
            $documento = $row["dni"];
            $servicio = $row["servicio"];
            $profesional = $row["profesional"];
            $fecha = $row["fecha"];
            $fecha = $row["hora"];
            $mail = $row["mail"];
            $stateS = "SI";
            $stateN = "NO";
            
            $cabeceras = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'X-Mailer: PHP/" . phpversion()' . " \r\n";
            $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
            //realiza el envio de mail por cada uno de los pacientes consultados a la db
           //$destino= "juan-pablo7@live.com";//$row["mail"];
           $destino= $row["mail"];
           
           //echo "QUE MAIL RECIBE: ". $destino;
           
            //$contenido= "Nombre: " . $paciente ."\nDocumento: " . $documento ."\nServicio: " . $servicio ."\nProfesional: " . $profesional .  "\nFecha: " . $fecha;
            $contenidoHTML=   '<!DOCTYPE html>'.
                                '<html>'.
                                  '<head>'.
                                  '<meta charset="utf-8">'.
                                  '<meta name="viewport" content="width=device-width, initial-scale=1">'.
                                  '<body>'.
                                  '<fieldset>'.
                                  '<legend><strong>RECORDATORIO DE TURNO:</strong></legend>'.
                                  '<header>'.
                                  '<center>'.
                                  '<div class="container" "background-color:red;" >'.
                                  '<img src="http://www.imcnet.com.ar/wp-content/uploads/2017/05/2017.05_07.jpg" class="img-fluid" class="float-center" width="400" height="200"> '.
                                  '</centre>'.
                                  '</header>'.
                                  '<br>';
            $contenidoHTML .=   '<div style = "float left">PACIENTE : '.'&nbsp;'.'&nbsp;'.$row["paciente"];'</div></br></br>'.
            
            $contenidoHTML .=  	'<div style = "float left">DOCUMENTO : '.'&nbsp;'.$row["dni"];'</div></br></br>'.
           
            $contenidoHTML .=   '<div style = "float left">SERVICIO : '.'&nbsp;'.'&nbsp;'.$row["servicio"];'</div><br><br>'.'<p>HOLA MUNDO HOLA MUNDO</p>'.
            
            $contenidoHTML .=   '<div style = "float: left">PROFESIONAL :  '.'&nbsp;'.$row["profesional"];'</div><br><br>'.'<p></p>'.'<p>HOLA MUNDO HOLA MUNDO</p>'.
              
            $contenidoHTML .=   '<div style = "float: left">FECHA :  '.'&nbsp;'.'&nbsp;'.'&nbsp;'.$row["fecha"];'</div><br><br>'.
         
            $contenidoHTML .=   '<div style = "float: left">HORA : '.'&nbsp;'.'&nbsp;'.'&nbsp;'.$row["hora"];'</div><br><br>'.
        
            $contenidoHTML .=   '<div style = "float: left">DIRECCI&Oacute;N:'.'&nbsp;'.  'Av. Sagrada Familia 359 - C&oacute;rdoba</div>'.'</br>'.'</br>'.
                                '</div>'.
                        	    '<center>'.
                        	    '<a href="https://imcturnos.000webhostapp.com/insertDBYES.php?ide='.$id.'&stateS='.$stateS.'"><button>CONFIRMAR</button></a>'.'&nbsp;'.'&nbsp;'.
                        	    '<a href="https://imcturnos.000webhostapp.com/insertDBNO.php?ide='.$id.'&stateN='.$stateN.'"><button>CANCELAR</button></a>'.'<br>'.'<br>'.
                                //'<a href="http://www.imcnet.com.ar/pacientes/turnos-por-email/"><button>NUEVO</button></a>'.
                                '<a href="http://www.imcnet.com.ar/pacientes/turnos-por-email/"><label><strong>SOLICITAR UN NUEVO TURNO</strong></label></a>'.'<br>'.'<br>'.
                                '</center>'.
                                //'<label>IMC - Instituto Modelo de Cardiología Privado S.R.L. 2019</label>'.
                                '</fieldset>'.
                                '</body>'.
                                '</html>';
            mail($destino,"RECORDATORIO DE TURNO",$contenidoHTML, $cabeceras);
            //ide='.$id.'&estado1='.$stateN.'
        }
    } else {
        echo "NO HAY DATOS EN LA DB!!!";
    }
    $conn->close();
    ?>
</body>
</html>