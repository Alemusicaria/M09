<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estils.css">
</head>

<body>
    <h1>Taula d'usuaris</h1>
    <br>
    <a href="index.php">Inserir nou usuari</a>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Cicles</th>
            <th>Correu</th>
            <th>Data Naixement</th>
            <th>Sexe</th>
            <th>Foto</th>
            <th>actualitzar</th>
            <th>eliminar</th>
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
            echo "<td>";
            echo "<a href='eliminar.php?id=" . $reg["id"] . "'>Eliminar</a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='modificar.php?id=" . $reg["id"] . "'>Modificar</a>";
            echo "</td>";
            echo "</tr>";
        }
        $mysql->close();
        ?>
</body>

</html>