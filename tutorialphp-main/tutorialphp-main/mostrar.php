<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Taula d'usuaris</h1>
    <a href="index.php">Inserir nou usuari</a>



    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Cicles</th>
            <th>Correu</th>
            <th>Data Naixement</th>
            <th>Sexe</th>
            <th>Foto</th>
        </tr>
        <?php
        $mysql = new mysqli("localhost", "root", "", "tutorialPHP");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $registres = $mysql->query("select * from usuaris") or
            die($mysql->error);
        while ($reg = $registres->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $reg["nom"] . "</td>";
            echo "<td>" . $reg["cicles"] . "</td>";
            echo "<td>" . $reg["correu"] . "</td>";
            echo "<td>" . $reg["data_naixement"] . "</td>";
            echo "<td>" . $reg["sexe"] . "</td>";
            echo "<td><img src='" . $reg["foto"] . "' width='100'></td>";
            echo "</tr>";
        }
        $mysql->close();
        ?>
</body>
</html>