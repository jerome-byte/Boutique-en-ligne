<?php
session_start();

require_once("../config/connexion.php"); // Remonte au dossier parent (htdocs/) puis va dans config/
require_once("../config/commandes.php");


if (isset($_SESSION['xRttpHo0greL39'])){

    $_SESSION['xRttpHo0greL39'] = array();

    session_destroy();

    header("Location: ../index.php");
}

?>