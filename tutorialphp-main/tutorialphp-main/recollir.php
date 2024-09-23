<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_POST["submit"])){
        $nom = $_POST["Nom"];
        $cicle = [];
        if(isset($_POST["DAM"])){
            $cicle[] = $_POST["DAM"];
        }
        if(isset($_POST["DAW"])){
            $cicle[] = $_POST["DAW"];
        }
        if(isset($_POST["ASIX"])){
            $cicle[] = $_POST["ASIX"];
        }
        if(isset($_POST["SMX"])){
            $cicle[] = $_POST["SMX"];
        }
        $correu = $_POST["correu"];
        $password = $_POST["password"];
        $hash = password_hash($password,PASSWORD_DEFAULT); 
        $data = $_POST["data"];
        $sexe = $_POST["sexe"];
        $foto = $_FILES["foto"]["name"];
        $ruta = $_FILES["foto"]["tmp_name"];
        $desti = "imatges/".$foto;
        move_uploaded_file($ruta, $desti);
        echo "Nom: $nom <br>";
        echo "Cicle: ";
        foreach($cicle as $c){
            echo " $c ";
        }
        echo "<br>Correu: $correu <br>";
        echo "Password: $password <br>";
        echo "Hash: $hash <br>";
        $verify = password_verify($password, $hash);
        if($verify){
            echo "Password verificat <br>";
        }
        else{
            echo "Password incorrecte <br>";
        }
        echo "Data: $data <br>";
        echo "Sexe: $sexe <br>";
        echo "Foto: <img src='$desti' width='100px' height='100px'><br>";
    }

    ?>
</body>
</html>