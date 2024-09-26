<?php
$mysql = new mysqli("localhost", "root", "", "tutorialPHP");
if ($mysql->connect_error) {
    die("Problemes amb la connexió a la base de dades");
}

// Obtenir els valors actuals de l'usuari
$id = (int)$_REQUEST['id'];  // Convertim l'ID a enter per seguretat
$query = $mysql->query("SELECT * FROM usuaris WHERE id = $id");
$usuari_actual = $query->fetch_assoc();

// Array per emmagatzemar els camps a actualitzar
$camps_a_actualitzar = array();

// Escapem les entrades per seguretat
$nom = $mysql->real_escape_string($_REQUEST['nom']);
$correu = $mysql->real_escape_string($_REQUEST['correu']);
$data_naixement = $mysql->real_escape_string($_REQUEST['data_naixement']);
$sexe = $mysql->real_escape_string($_REQUEST['sexe']);

// Comparar i actualitzar només si el camp ha canviat
if ($usuari_actual['nom'] != $nom) {
    $camps_a_actualitzar[] = "nom = '$nom'";
}

// Gestió dels cicles com a array i comparació correcta
if (!empty($_REQUEST['cicles'])) {
    $cicles_nous = implode(",", $_REQUEST['cicles']);  // Convertim l'array en una cadena
    if ($usuari_actual['cicles'] != $cicles_nous) {
        $camps_a_actualitzar[] = "cicles = '$cicles_nous'";
    }
}

if ($usuari_actual['correu'] != $correu) {
    $camps_a_actualitzar[] = "correu = '$correu'";
}

// Si es proporciona una nova contrasenya, la xifrem i l'actualitzem
if (!empty($_REQUEST['contrasenya'])) {
    $contrasenya = password_hash($_REQUEST['contrasenya'], PASSWORD_DEFAULT);
    $camps_a_actualitzar[] = "contrasenya = '$contrasenya'";
}

if ($usuari_actual['data_naixement'] != $data_naixement) {
    $camps_a_actualitzar[] = "data_naixement = '$data_naixement'";
}

if ($usuari_actual['sexe'] != $sexe) {
    $camps_a_actualitzar[] = "sexe = '$sexe'";
}

// Gestió de la pujada de la foto
if (!empty($_FILES['foto']['name'])) {
    $foto_nom = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $directori = 'imatges/';  // Directori on es guarden les fotos
    $ruta_foto = $directori . basename($foto_nom);

    // Movem la foto al directori d'uploads
    if (move_uploaded_file($foto_tmp, $ruta_foto)) {
        $camps_a_actualitzar[] = "foto = '$ruta_foto'";
    } else {
        die("Error en pujar la foto.");
    }
}

// Si hi ha camps modificats, executem l'actualització
if (count($camps_a_actualitzar) > 0) {
    $query_update = "UPDATE usuaris SET " . implode(", ", $camps_a_actualitzar) . " WHERE id = $id";
    $mysql->query($query_update) or die($mysql->error);
}

// Tanquem la connexió
$mysql->close();

// Redirigim a mostrar.php
header('Location: mostrar.php');
?>
