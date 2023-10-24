<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <main class="text-center d-flex justify-content-center align-items-center min-vh-100">
        <div class="card col-md-8 col-12 p-4">
            <div class="row row-cols-2 ">
                <div class="col">
                    <img src="asset/LOGO-CEM-WEB.png" alt="logo" srcset="" width="100%" height="100%">
                </div>
                <div class="col">
                    <h2>Authentification</h2>
                    <form action="controller/loginController.php" method="POST">
                        <div class="form-floating">
                            <input type="email" name="utilisateur" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="mdp" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <a href="ajoutCompte.php" style="text-decoration: none;" class="mt-3">Creer un nouveau compte ?</a>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
                    </form>
                </div>
            </div>

        </div>
    </main>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>