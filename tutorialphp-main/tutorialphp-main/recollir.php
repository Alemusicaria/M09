<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estils.css">
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $nom = $_POST["Nom"];
        $cicle = [];
        if (isset($_POST["DAM"])) {
            $cicle[] = $_POST["DAM"];
        }
        if (isset($_POST["DAW"])) {
            $cicle[] = $_POST["DAW"];
        }
        if (isset($_POST["ASIX"])) {
            $cicle[] = $_POST["ASIX"];
        }
        if (isset($_POST["SMX"])) {
            $cicle[] = $_POST["SMX"];
        }
        $correu = $_POST["correu"];
        $password = $_POST["password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $data = $_POST["data"];
        $sexe = $_POST["sexe"];
        $foto = $_FILES["foto"]["name"];
        $ruta = $_FILES["foto"]["tmp_name"];
        $desti = "imatges/" . $foto;
        move_uploaded_file($ruta, $desti);

        $mysql = new mysqli("localhost", "root", "", "tutorialPHP");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $mysql->query("insert into usuaris(nom, cicles, correu, contrasenya, data_naixement, sexe, foto) 
        values ('$nom', '" . implode(",", $cicle) . "', '$correu', '$hash', '$data', '$sexe', '$desti')") or
            die($mysql->error);
        $mysql->close();

        header("Location: mostrar.php");
        
    }

    ?>
</body>

</html>