<?php
require_once("DBAccess.php");
	 $nom = ($_POST['Nombre']);
     $us = ($_POST['User']);
     $co = ($_POST['Pass']);
     $co2 = ($_POST['Pass2']);
     $DBA = new DBAccess();
     $Data = $DBA->GetData("SELECT * FROM Users where User ='$us'");
	if(mysqli_num_rows($Data)) {
		 echo '<body><script language="javascript" src="js/jquery-1.12.4.js"></script>
        <script src="js/vex.combined.min.js"></script>
        <script>vex.defaultOptions.className = "vex-theme-os"</script>
	<link rel="stylesheet" href="css/vex.css" />
       
        <link rel="stylesheet" href="css/vex-theme-os.css" />
	<script language = javascript>
       
        vex.dialog.confirm({
        message: "Usuario ya Existe",
        callback: function (value) {
        if (value) {
        self.location = "Registra.php";    
        } else {
        self.location = "Registra.php";
        }
        }
        })
	</script></body>';
	}
	else{
       if ($co == $co2) {
       	$hashm = password_hash($co, PASSWORD_DEFAULT);
   
     	 $DBA->insert("INSERT INTO Users VALUES ('','$us','$hashm','$nom')");
     	 echo '<body><script language="javascript" src="js/jquery-1.12.4.js"></script>
        <script src="js/vex.combined.min.js"></script>
        <script>vex.defaultOptions.className = "vex-theme-os"</script>
	<link rel="stylesheet" href="css/vex.css" />
       
        <link rel="stylesheet" href="css/vex-theme-os.css" />
       
	<script language = javascript>
        vex.dialog.confirm({
        message: "Usuario Registrado Con Exito",
        callback: function (value) {
        if (value) {
        self.location = "inicio.php";    
        } else {
        self.location = "inicio.php";
        }
        }
        })
	</script></body>';
     	

     }
     else{
     	echo '<body><script language="javascript" src="js/jquery-1.12.4.js"></script>
        <script src="js/vex.combined.min.js"></script>
        <script>vex.defaultOptions.className = "vex-theme-os"</script>
	<link rel="stylesheet" href="css/vex.css" />
        
        <link rel="stylesheet" href="css/vex-theme-os.css" />
	<script language = javascript>
        localStorage.setItem("Login", "0");
        vex.dialog.confirm({
        message: "Contraseña no coincide",
        callback: function (value) {
        if (value) {
        self.location = "Registra.php";    
        } else {
        self.location = "Registra.php";
        }
        }
        })
	</script></body>';

     }
 }
   
?>