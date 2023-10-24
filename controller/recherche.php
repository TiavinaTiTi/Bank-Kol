<?php
    // require_once("controller/connexion.php");
    // $select = new Connexion();
    if(isset($_GET['search']) && $_GET['search'] != ""){
        $search = $_GET['search'];
        // $affichage = $select->query("SELECT * FROM utilisateur WHERE type= 'CE' AND nom= $search");
        header("location:../dashbord.php?name=$search");
    }else{
        header("location:../dashbord.php?name=");
    }
?>