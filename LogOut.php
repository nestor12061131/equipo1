<?php 
session_start();

  if(!isset($_SESSION['Admin']))
   {
        echo "No hay ninguna sesion iniciada";
//esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
        session_destroy();
         header("Location: index.php?sesion");
   }
         
 ?>