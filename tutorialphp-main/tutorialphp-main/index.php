<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Insertar usuari</h1>
    <form action="recollir.php" method="post" enctype="multipart/form-data" >
    
    <label for="Nom">Nom</label>
    <input type="text" name="Nom" id="Nom" required><br>
    <label for="Cicle">Tria els cicles que estàs interessat</label>
    <input type="checkbox" name="DAM" id="DAM" value="DAM">DAM
    <input type="checkbox" name="DAW" id="DAW" value="DAW">DAW
    <input type="checkbox" name="ASIX" id="ASIX" value="ASIX">ASIX
    <input type="checkbox" name="SMX" id="SMX" value="SMX">SMX <br>
    <label for="correu">Correu</label>
    <input type="email" name="correu" id="correu"><br>
    <label for="password">Contrasenya</label>
    <input type="password" name="password" id="password" required><br>
    <label for="data">Data de naixement</label>
    <input type="date" name="data" id="data" required><br>
    <label for="sexe">Sexe</label>
    <input type="radio" name="sexe" id="home" value="home">Home
    <input type="radio" name="sexe" id="dona" value="dona">Dona
    <input type="radio" name="sexe" id="altre" value="altre">Altres <br>
    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto"><br>
    <br>
    <input type="submit" name="submit" value="Enviar">
    </form>
    <a href="mostrar.php">Mostrar Usuaris</a>

</body>
</html>