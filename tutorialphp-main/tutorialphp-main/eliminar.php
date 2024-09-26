<?php
    $mysql=new mysqli("localhost","root","","tutorialPHP");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $mysql->query("delete from usuaris where id=$_REQUEST[id]") or
        die($mysql->error);    
    
    $mysql->close();
    
    header('Location:mostrar.php');
  ?>  
?>