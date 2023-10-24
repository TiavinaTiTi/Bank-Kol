<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mt-1" aria-label="Eleventh navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CEM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample09">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <a href="controller/deconnexion.php" class="btn btn-primary">
                        Deconnexion
                    </a>
                </div>
            </div>
        </nav>

        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            require_once("controller/connexion.php");
            $select = new Connexion();
            $affichage = $select->query("SELECT * FROM utilisateur WHERE id_utilisateur= $id LIMIT 1");
            // var_dump($affichage);
        }
        ?>
        <div class="mt-4 container">
            <div class="row row-cols-3 ">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-white fw-light" style="margin-top: -25px;">
                                <span class="p-1 bg-success border border-white rounded">Solde</span>
                            </div>
                            <p class="fs-1 d-flex flex-column">
                                <?= $affichage[0]["solde"] ?>
                                <i class="fs-6 text-secondary">Ariary</i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-white fw-light" style="margin-top: -25px;">
                                <span class="p-1 bg-success border border-white rounded">A propos</span>
                            </div>
                            <p class="fs-1 d-flex flex-column">
                                <?= $affichage[0]["nom"] ?>
                                <i class="fs-6">
                                    <?php
                                    $type = "";
                                    switch ($affichage[0]["type"]) {
                                        case "CE":
                                            $type = "Compte Epargne";
                                            break;
                                        case "CA":
                                            $type = "Compte Avu";
                                            break;
                                        case "CB":
                                            $type = "Compte Bloquer";
                                            break;
                                    }
                                    echo $type;
                                    ?>
                                </i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-white fw-light" style="margin-top: -25px;">
                                <span class="p-1 bg-success border border-white rounded">Nombre de transaction</span>
                            </div>
                            <p class="fs-1 d-flex flex-column">
                                <?php 
                                    $count = $select->query("SELECT COUNT(*) FROM historique WHERE ref_utilisateur= $id");
                                    echo $count[0]["COUNT(*)"];
                                ?>
                                <i class="fs-6">/ transaction</i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Retrait</div>
                        </div>
                        <div class="card-body">
                            <form action="controller/retrait.php" method="POST" onsubmit="return validateForm()">
                                <input type="text" name="id" value="<?=$_GET["id"]?>" id="" class="invisible d-none">
                                <div class="">
                                    <label for="montant" class="form-label">Montant (Ariary)</label>
                                    <input type="number" name="montant" id="montant" class="form-control" placeholder="Saisir le montant" require>
                                </div>
                                <div class="">
                                    <label for="pwd" class="form-label">Mot de passe</label>
                                    <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Saisir mot de passe" require>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="Valider" class="btn btn-success">
                                </div>
                            </form>
                            <script>
                                function validateForm() {
                                    // Récupérer la valeur du champ "Montant"
                                    var montant = document.getElementById("montant").value;

                                    // Vérifier si le montant est vide ou égal à zéro
                                    if (montant === "" || montant == 0) {
                                        // Afficher une alerte
                                        alert("Saisir un montant valide");
                                        return false; // Empêcher l'envoi du formulaire
                                    }

                                    // Si le montant est valide, le formulaire sera soumis
                                    return true;
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <table class="table table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">Date</th>
                                <th scope="col">Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $historique = $select->query("SELECT * FROM historique WHERE ref_utilisateur= $id");
                                // var_dump($historique);
                            ?>
                            <?php foreach ($historique as $valeur) { ?>
                                <tr>
                                    <td> <?= $valeur["action"]?> </td>
                                    <td> <?= $valeur["date"] ?> </td>
                                    <td> <?= $valeur["montant"] ?> </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>