
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
                        <a href="listeCB.php" class="nav-link text-white active">
                            Compte Bloquer
                        </a>
                    </li>
                    <li>
                        <a href="ajoutArgent.php" class="nav-link text-white">
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
            <div class="mt-2">
                <form action="controller/rechercheCB.php" method="GET">
                    <div class="input-group mb-2">
                        <input type="text" name="search" id="floatingInput" class="form-control" placeholder="Rechercher..." value="<?php if(isset($_GET['name'])){ echo($_GET['name']); } ?>">
                        <input type="submit" value="Rechercher" class="input-group-text btn btn-warning" id="floatingInput">
                    </div>
                </form>
                <table class="table table-striped">
                    <?php
                    require_once("controller/connexion.php");
                    $select = new Connexion();
                    if(isset($_GET['name']) && $_GET['name'] != ''){
                        $search = $_GET["name"];
                        $affichage = $select->query("SELECT * FROM utilisateur WHERE type= 'CB' AND nom='$search'");
                    }else{
                        $affichage = $select->query("SELECT * FROM utilisateur WHERE type= 'CB'");
                    }
                    ?>
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">CIN</th>
                            <th scope="col">Nom comptet</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Solde</th>
                            <th scope="col">Statut</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($affichage as $valeur){ ?>
                        <tr>
                            <td> <?= $valeur["CIN"] ?> </td>
                            <td> <?= $valeur["nom"] ?> </td>
                            <td> <?= $valeur["contact"] ?> </td>
                            <td> <?= $valeur["solde"] ?> </td>
                            <td> <?= $valeur["statut"] ?> </td>
                            <td class="d-flex">
                                <?php if($valeur["statut"] != "activer"){?>
                                    <a href="controller/validerCompte.php?id=<?= $valeur["id_utilisateur"] ?>" class="btn btn-success">Valider</a>
                                <?php }?>
                                <a href="" class="btn btn-danger">Supr</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
