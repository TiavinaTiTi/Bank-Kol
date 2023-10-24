
<?php
if (isset($_POST["montant"]) && isset($_POST["client"])) {
    $montant = $_POST["montant"];
    $client = $_POST["client"];


    if ($montant != "" && $montant != 0) {
        require_once("connexion.php");
        $con = new Connexion();
        $ps = $con->insert("UPDATE utilisateur SET solde = solde + $montant WHERE id_utilisateur = $client");
        $res = $ps->execute();
        if ($res) {
            $pst = $con->insert("INSERT INTO historique(ref_utilisateur, action, date, montant) VALUES (?,?,?,?)");
            $now = new DateTime();
            $dateStr = $now->format('Y-m-d H:i:s');
            // echo gettype($dateStr);
            $parm = array($client, "depot", $dateStr, intval($montant));
            $r = $pst->execute($parm);
            header("location:../ajoutArgent.php");
            exit;
        }
    }
} else {
    echo '<script>window.history.back();</script>';
    exit;
}


?>
