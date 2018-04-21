<?php  
require_once("DBAccess.php");
$usuario = $_POST["User"];
$password = $_POST["Pass"];
$DBA = new DBAccess();
$Data = $DBA->GetData("SELECT Id, User, Pass, Nombre FROM Users WHERE  User = '$usuario'");
if (mysqli_num_rows($Data)) {
$row = mysqli_fetch_array($Data);

$sesion = $row['Id'];

if(password_verify($password, $row['Pass']))
                {
                        session_start();
                    $_SESSION['Admin']= $sesion;

                     echo '<body><script language="javascript" src="js/jquery-1.12.4.js"></script>
        <script src="js/vex.combined.min.js"></script>
        <script>vex.defaultOptions.className = "vex-theme-os"</script>
	<link rel="stylesheet" href="css/vex.css" />
       
        <link rel="stylesheet" href="css/vex-theme-os.css" />
       
	<script language = javascript>
        vex.dialog.confirm({
        message: "Bienvenido ';echo $row['Nombre']; echo '",
        callback: function (value) {
        if (value) {
        self.location = "inicio.php";    
        } else {
        self.location = "inicio.php";
        }
        }
        })
	</script></body>';
 
                }//cierra verificacion de contrase;a
                else {
   
   
                     echo '<body><script language="javascript" src="js/jquery-1.12.4.js"></script>
        <script src="js/vex.combined.min.js"></script>
        <script>vex.defaultOptions.className = "vex-theme-os"</script>
	<link rel="stylesheet" href="css/vex.css" />
       
        <link rel="stylesheet" href="css/vex-theme-os.css" />
       
	<script language = javascript>
        vex.dialog.confirm({
        message: "Usuario o Contrase;a incorrectos",
        callback: function (value) {
        if (value) {
        self.location = "index.php";    
        } else {
        self.location = "index.php";
        }
        }
        })
	</script></body>';
}






}


//cierra if row count


?> 