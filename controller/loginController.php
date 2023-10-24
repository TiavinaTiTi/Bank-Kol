<?php
/**
 * Interaction avec la formulaire de login
 */
require_once("connexion.php");
if(isset($_POST["utilisateur"]) && isset($_POST["mdp"]))
{
    $utilisateur = $_POST["utilisateur"];
    $mdp = $_POST["mdp"];
    if($utilisateur!="" && $mdp!="")
    {
        $con = new Connexion();
        $req = $con->insert("SELECT id_utilisateur ,utilisateur, mdp, statut, role, type FROM utilisateur WHERE utilisateur='". $utilisateur ."' AND mdp='". $mdp ."' AND statut= 'activer'");
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_NUM);
        var_dump($ligne);

        if($ligne){
            $res = '';
            switch($ligne[4]){
                case 'admin':
                    $res = 'admin';
                    break;
                case 'user':
                    $res = 'user';
                    break;
            }

            if($res == "admin" && $res != ""){
                session_start();
                $_SESSION['PROFILE'] = $ligne;
                header("location:../dashbord.php");
            }else{
                switch ($ligne[5]) {
                    case 'CE':
                        session_start();
                        $_SESSION['PROFILE'] = $ligne;
                        header("location:../viewUser.php?id=$ligne[0]");
                        break;
                    case 'CA':
                        session_start();
                        $_SESSION['PROFILE'] = $ligne;
                        header("location:../viewUser.php?id=$ligne[0]");
                        break;
                    case 'CB':
                        session_start();
                        $_SESSION['PROFILE'] = $ligne;
                        header("location:../viewUserCB.php?id=$ligne[0]");
                        break;
                }
            }
        }else{
            header("location:../index.php");
        }



        

        // if($ligne){
        //     session_start();
        //     $_SESSION['PROFILE'] = $ligne;
        //     header("location:../dashbord.php");
        // }else{
        //     header("location:../index.php");
        // }
    }else{
        header("location:../index.php");
    }
}else{
    header("location:../index.php");
}
?>