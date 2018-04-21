<?php
    class DBAccess {
 
        public function GetData($Query) {
        $con= mysqli_connect("localhost", "root", "", "hwht");
        $acentos = $con->query("SET NAMES 'utf8'");
            //Si no se logró establecer la conexión se retorna FALSE
            if (!$con) {
                return FALSE;
            } else {
            //Si no, se retornan los datos obtenidos de la consulta

               $Data = mysqli_query($con, $Query) or die(mysqli_error($con));
                return $Data;
                
              
            }
             mysqli_close($con);
        }
        public function insert($Query){
            $con= mysqli_connect("localhost", "root", "", "hwht") or die("Error de conexion");
            //Si no se logró establecer la conexión se retorna FALSE
            if (!$con) {
                return FALSE;
            } else {
            //Si no, se retornan los datos obtenidos de la consulta

               mysqli_query($con, $Query) or die(mysqli_error($con)); 
               $Data = 'OK';
              return $Data;
              
        }
         mysqli_close($con);
    }
  
    }

?>