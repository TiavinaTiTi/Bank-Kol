<?php

if(isset($_POST["cin"])&&isset($_POST["name"])&&isset($_POST["contact"])&&isset($_POST["email"])&&isset($_POST["pwd"])&&isset($_POST["confirm"])&&isset($_POST["type"])){

    $cin = $_POST["cin"];
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confirm = $_POST["confirm"];
    $type = $_POST["type"];
    $statut = 'desactiver';
    $role = 'user';

    if($pwd != $confirm){
        header("location:../index.php");
    }elseif($cin === "" && $name ==="" && $contact === "" && $email === "" && $pwd === "" && $confirm === ""){
        header("location:../index.php");
    }else{
        require_once("connexion.php");
        $con = new Connexion();
        $ps = $con->insert("INSERT INTO utilisateur(utilisateur,mdp,statut,nom,type,solde,contact,role,CIN) VALUES (?,?,?,?,?,?,?,?,?)");
        $parm = array($email, $pwd, $statut, $name, $type, 0, $contact, $role, $cin);
        $ps->execute($parm);
        header("location:../ajoutCompte.php");
    }

}


?>
