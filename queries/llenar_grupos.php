<?php
require_once('database/conn.php');
if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $consulta="SELECT Usuario_empleado,Pass_empleado,Nombres_empleado,Apellidos_empleado,
    Correo, Edad, Telefono FROM empleado WHERE Usuario_empleado='$usuario'";
    $result = mysqli_query($con, $consulta);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo '
            <tr>
                        <td><h4>Usuario:</h4></td>  
                        <td><p>'.$row[0].'</p></td>                     
                    </tr>
                    <tr>
                        <td><h4>Nombres:</h4></td>
                        <td><p>'.$row[2].'</p></td>
                    </tr>
                    <tr>
                        <td><h4>Apellios:</h4></td>      
                        <td><p>'.$row[3].'</p></td>                   
                    </tr>
                    <tr>
                        <td><h4>Email:</h4></td> 
                        <td><p>'.$row[4].'</p></td>                         
                    </tr>
                    <tr>
                        <td><h4>Edad:</h4></td>  
                        <td><p>'.$row[5].'</p></td>                        
                    </tr>
                    <tr>
                        <td><h4>Número de teléfono:</h4></td>
                        <td><p>'.$row[6].'</p></td>  
                    </tr>';
        }
    }
}
?>