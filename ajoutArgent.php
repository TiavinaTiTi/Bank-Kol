<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>

    <div class="row vh-100 p-0 m-0 col-12">
        <div class="col-2 p-0">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4">CEM</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="dashbord.php" class="nav-link text-white">
                            Compte Eparne
                        </a>
                    </li>
                    <li>
                        <a href="listeCA.php" class="nav-link text-white">
                            Compte Avu
                        </a>
                    </li>
                    <li>
                        <a href="listeCB.php" class="nav-link text-white">
                            Compte Bloquer
                        </a>
                    </li>
                    <li>
                        <a href="ajoutArgent.php" class="nav-link text-white active">
                            Depot Argent
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-10">
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
            require_once("controller/connexion.php");
            $select = new Connexion();
            $affichage = $select->query("SELECT * FROM utilisateur");
            // var_dump($affichage);
            ?>
            <div class="mt-4 container">
                <div class="row row-cols-2 mt-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Depot</div>
                            </div>
                            <div class="card-body">
                                <form action="controller/depot.php" method="POST" onsubmit="return validateForm()">
                                    <div class="">
                                        <label for="client">Client</label>
                                        <select name="client" id="client" class="form-select">
                                            <option value="">--selectionner--</option>
                                            <?php 
                                                foreach($affichage as $val){?>
                                                <option value="<?= $val["id_utilisateur"] ?>"><?= $val["nom"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="montant" class="form-label">Montant (Ariary)</label>
                                        <input type="number" name="montant" id="montant" class="form-control" placeholder="Saisir le montant" require>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" value="Valider" class="btn btn-success">
                                    </div>
                                </form>
                                <script>
                                    function validateForm() {
                                        // Récupérer la valeur du champ "Montant"
                                        var montant = document.getElementById("montant").value;
                                        var client = document.getElementById("client").value;
                                        
                                        // Vérifier si le montant est vide ou égal à zéro
                                        if (montant === "" || montant == 0) {
                                            // Afficher une alerte
                                            alert("Saisir un montant valide");
                                            return false; // Empêcher l'envoi du formulaire
                                        }

                                        if (client === "" || client == 0) {
                                            // Afficher une alerte
                                            alert("Selectionner un client");
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
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $historique = $select->query("SELECT * FROM historique");
                                // var_dump($historique);
                                ?>
                                <?php foreach ($historique as $valeur) { ?>
                                    <tr>
                                        <td> <?= $valeur["ref_utilisateur"] ?> </td>
                                        <td> <?= $valeur["action"] ?> </td>
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
    </div>


    <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>