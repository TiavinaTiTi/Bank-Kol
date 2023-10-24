<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>
<body>
    <main class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card col-md-6 col-12 p-4">
            <h2>Nouveau compte</h2>
            <form action="controller/insertCompte.php" method="POST">
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="my-2">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" name="cin" class="form-control" id="cin" placeholder="Veuillez saisir numero CIN" required>
                        </div>
                        <div class="my-2">
                            <label for="name" class="form-label">Nom complet</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Veuillez saisir votre nom complet" required>
                        </div>
                        <div class="my-2">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" id="contact" placeholder="Veuillez votre contact" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="my-2">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="mail" name="email" class="form-control" id="email" placeholder="Veuillez saisir votre adresse mail" required>
                        </div>
                        <div class="my-2">
                            <label for="pwd" class="form-label">Mot de passe</label>
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Veuillez saisir votre mot de passe" required>
                        </div>
                        <div class="my-2">
                            <label for="confirm" class="form-label">Confirmer mot de passe</label>
                            <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Veuillez confirmer" required>
                        </div>
                    </div>
                </div>
                <div class="my-2">
                    <label class="form-label">Type de compte</label>
                    <select class="form-select" name="type" required>
                        <option value="CE">Compte Eparne</option>
                        <option value="CA">Compte Avu</option>
                        <option value="CB">Compte Bloquer</option>
                    </select>
                </div>
                <div class="mt-2">
                    <a href="index.php" style="text-decoration: none;">Se connecter a votre compte ?</a>
                </div>
                <div class="mt-2">
                    <input type="submit" value="Sauvegarder" class="btn btn-success">
                </div>
            </form>
        </div>
    </main>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>
</html>
