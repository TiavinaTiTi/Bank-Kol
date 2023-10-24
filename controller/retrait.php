<?php
if(isset($_POST["montant"])&&isset($_POST["pwd"])&&isset($_POST["id"])){
    $montant = $_POST["montant"];
    $pwd = $_POST["pwd"];
    $id = intval($_POST["id"]);


    if($montant != "" && $montant != 0){
        require_once("connexion.php");
        $con = new Connexion();
        $confirmPwd = $con->query("SELECT mdp FROM utilisateur WHERE id_utilisateur=$id AND mdp = '".$pwd."' AND solde > $montant LIMIT 1");
        var_dump($confirmPwd);
        if(count($confirmPwd)>0){
            $ps = $con->insert("UPDATE utilisateur SET solde = solde - $montant WHERE id_utilisateur = $id");
            $res = $ps->execute();
            if($res){
                echo 'GO';
                $pst = $con->insert("INSERT INTO historique(ref_utilisateur, action, date, montant) VALUES (?,?,?,?)");
                $now = new DateTime();
                $dateStr = $now->format('Y-m-d H:i:s');
                // echo gettype($dateStr);
                $parm = array($id, "retrait", $dateStr, intval($montant));
                $r = $pst->execute($parm);
                header("location:../viewUser.php?id=$id");
                exit;
            }
        }else{
            echo "<script>alert('Mot de passe incorrect ou solde invalide')</script>";
            echo '<script>window.history.back();</script>';
            exit;
        }
    }

}else{
    echo '<script>window.history.back();</script>';
    exit;
}


?>
