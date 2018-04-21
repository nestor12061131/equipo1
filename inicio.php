<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION['Admin'])) 
{

   header("Location: index.php?error");

}
else{}
 ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My kitchen</title>
  <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDF-uDlHYs6iuAOgj8JwQvaM36kG-DpKsg",
    authDomain: "prubafire.firebaseapp.com",
    databaseURL: "https://prubafire.firebaseio.com",
    projectId: "prubafire",
    storageBucket: "prubafire.appspot.com",
    messagingSenderId: "109109229088"
  };
  firebase.initializeApp(config);
</script>
  <script>
  var rootRef = firebase.database().ref();

    rootRef.child("Digital0").on("value", function(snapshot){
      console.log(snapshot.val());
      if (snapshot.val() == 0) {document.getElementById("s1").textContent = "Apagado";}
      else{document.getElementById("s1").textContent = "Encendido";}
    });

    rootRef.child("Digital1").on("value", function(snapshot){
      console.log(snapshot.val());
       if (snapshot.val() == 0) {document.getElementById("s2").textContent = "Abierto";}
      else{document.getElementById("s2").textContent = "Cerrado";}
    });

    rootRef.child("Digital2").on("value", function(snapshot){
      console.log(snapshot.val());
       if (snapshot.val() == 0) {document.getElementById("s3").textContent = "Abierto";}
      else{document.getElementById("s3").textContent = "Cerrado";}
    });

    rootRef.child("Digital3").on("value", function(snapshot){
      console.log(snapshot.val());
             if (snapshot.val() == 0) {document.getElementById("s4").textContent = "Abierto";}
      else{document.getElementById("s4").textContent = "Cerrado";}
    });
     rootRef.child("Digital4").on("value", function(snapshot){
      console.log(snapshot.val());
             document.getElementById("s5").textContent = "Temperatura  "+snapshot.val()+" ℃";
     
    });

  </script>
</head>
<body>
<a href="LogOut.php"><button >Cerrar Sesion </button></a>

<table id="TablaUsers" class="table bg-info"  cellspacing="0" >

                      <thead>
                <th >ID SENSOR</th> 
                <th>NOMBRE DEL SENSOR</th>          
                <th>ESTADO DEL SENSOR</th>   
                <th>CAMBIAR</th>
                </thead>
              <tbody >
            <tr >
    <td style = 'width: 25%;'>1</td>
    <td  style = 'width: 25%;'>SENSOR DE GAS </td>
    <td style = 'width: 25%; ' id="s1"> </td>
    <td> <button style = 'color: #fff;  width:80%; display:block; background-color: #37C4C2; border: none; font-size: 21px; outline:none; border-bottom:1px solid #bbbbbb; border-radius: 4px; height: 90%; font-weight: 800;'>Cambiar</button></td></tr>
             <tr >
    <td style = 'width: 25%;'>2</td>
    <td  style = 'width: 25%;'>CAJON </td>
    <td style = 'width: 25%; ' id="s2"> </td>
    <td> <button style = 'color: #fff;  width:80%; display:block; background-color: #37C4C2; border: none; font-size: 21px; outline:none; border-bottom:1px solid #bbbbbb; border-radius: 4px; height: 90%; font-weight: 800;'>Cambiar</button></td></tr>
             <tr >
    <td style = 'width: 25%;'>3</td>
    <td  style = 'width: 25%;'>CAJON 2 </td>
    <td style = 'width: 25%; ' id="s3"> </td>
    <td> <button style = 'color: #fff;  width:80%; display:block; background-color: #37C4C2; border: none; font-size: 21px; outline:none; border-bottom:1px solid #bbbbbb; border-radius: 4px; height: 90%; font-weight: 800;'>Cambiar</button></td></tr>
             <tr >
    <td style = 'width: 25%;'>4</td>
    <td  style = 'width: 25%;'>CAJON 3</td>
    <td style = 'width: 25%; ' id="s4"> </td>
    <td> <button style = 'color: #fff;  width:80%; display:block; background-color: #37C4C2; border: none; font-size: 21px; outline:none; border-bottom:1px solid #bbbbbb; border-radius: 4px; height: 90%; font-weight: 800;'>Cambiar</button></td></tr>
      <tr >
    <td style = 'width: 25%;'>5</td>
    <td  style = 'width: 25%;'>Temperatura</td>
    <td style = 'width: 25%; ' id="s5"> </td>
    <td> <button style = 'color: #fff;  width:80%; display:block; background-color: #37C4C2; border: none; font-size: 21px; outline:none; border-bottom:1px solid #bbbbbb; border-radius: 4px; height: 90%; font-weight: 800;'>Cambiar</button></td></tr>
                </tbody> 
            </table>
</body>
</html>