<?php
    require_once("connexion.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $update = new Connexion();
        $ps = $update->insert("UPDATE utilisateur SET solde= 5000, statut='activer' WHERE id_utilisateur = $id");
        $ps->execute();
        header("location:../dashbord.php");
    }
?>
