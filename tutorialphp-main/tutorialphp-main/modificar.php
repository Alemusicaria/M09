<!doctype html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuari</title>
    <link rel="stylesheet" href="estils.css">
</head>

<body>
    <h1>Modificar Usuari</h1>

    <?php
    $mysql = new mysqli("localhost", "root", "", "tutorialPHP");
    if ($mysql->connect_error) {
        die("Problemes amb la connexió a la base de dades");
    }

    // Obtenir els valors de l'usuari de la base de dades
    $registre = $mysql->query("SELECT nom, cicles, correu, contrasenya, data_naixement, sexe, foto 
                               FROM usuaris WHERE id=$_REQUEST[id]") or die($mysql->error());

    if ($reg = $registre->fetch_assoc()) {
    ?>
        <form action="modificar_usuari.php" method="post" enctype="multipart/form-data">
            <!-- Camp Nom -->
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" value="<?php echo $reg['nom']; ?>" required><br>

            <!-- Camps Cicles (Checkboxes) -->
            <label for="cicles">Tria els cicles que t'interessen:</label>
            <input type="checkbox" name="cicles[]" value="DAM" <?php if (strpos($reg['cicles'], 'DAM') !== false) echo 'checked'; ?>>DAM
            <input type="checkbox" name="cicles[]" value="DAW" <?php if (strpos($reg['cicles'], 'DAW') !== false) echo 'checked'; ?>>DAW
            <input type="checkbox" name="cicles[]" value="ASIX" <?php if (strpos($reg['cicles'], 'ASIX') !== false) echo 'checked'; ?>>ASIX
            <input type="checkbox" name="cicles[]" value="SMX" <?php if (strpos($reg['cicles'], 'SMX') !== false) echo 'checked'; ?>>SMX
            <br>
            <br>

            <!-- Camp Correu -->
            <label for="correu">Correu:</label>
            <input type="email" name="correu" id="correu" value="<?php echo $reg['correu']; ?>"><br>

            <!-- Camp Contrasenya (deixar en blanc si no es vol canviar) -->
            <label for="contrasenya">Contrasenya:</label>
            <input type="password" name="contrasenya" id="contrasenya" placeholder="Deixa en blanc si no la vols canviar"><br>

            <!-- Camp Data de Naixement -->
            <label for="data_naixement">Data de naixement:</label>
            <input type="date" name="data_naixement" id="data_naixement" value="<?php echo $reg['data_naixement']; ?>"><br>

            <!-- Camp Sexe (Radio Buttons) -->
            <label for="sexe">Sexe:</label>
            <input type="radio" name="sexe" value="home" <?php if ($reg['sexe'] == 'home') echo 'checked'; ?>>Home
            <input type="radio" name="sexe" value="dona" <?php if ($reg['sexe'] == 'dona') echo 'checked'; ?>>Dona
            <input type="radio" name="sexe" value="altre" <?php if ($reg['sexe'] == 'altre') echo 'checked'; ?>>Altres
            <br>
            <br>

            <!-- Camp Foto -->
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">

            <!-- Camp Hidden per l'ID -->
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">

            <br>
            <input type="submit" value="Modificar">
        </form>

    <?php
    } else {
        echo 'No existeix un usuari amb aquest ID';
    }

    $mysql->close();
    ?>
    <br>
    <br>

    <a href="mostrar.php">Mostrar Usuaris</a>
</body>

</html>