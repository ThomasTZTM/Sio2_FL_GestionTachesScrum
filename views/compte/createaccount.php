<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer un compte</title>
</head>
<body>

<?php
?>

<div class="mt-5 mb-5">
    <div>
        <div class="container">
            <h1 class="text-center text-danger border border-1 border-danger">En cours de développement</h1>
            <div class="w-50 mx-auto shadow p-4 my-5">


                <form action="" method="POST" novalidate>

                    <h1 class="mb-5 text-center">Créer un compte : </h1>

                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>

                    <div class="mb-3">
                        <label for="pseudo" class="form-label text-white">Pseudo : </label>
                        <input
                            type="text"
                            class="form-control <?= isset($erreurs['pseudo']) ? "border border-2 border-danger" : "" ?>"
                            id="pseudo"
                            name="pseudo"
                            value="<?= $pseudo ?>"
                            placeholder="Saisir votre pseudo"
                        >
                        <?php if (isset($erreurs['pseudo'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['pseudo'] ?></p>
                        <?php endif; ?>
                    </div>


                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>


                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Adresse EMAIL : </label>
                        <input
                            type="text"
                            class="form-control <?= isset($erreurs['email']) ? "border border-2 border-danger" : "" ?>"
                            id="email"
                            name="email"
                            value="<?= $email ?>"
                            placeholder="Saisir l'adresse mail'"
                        >
                        <?php if (isset($erreurs['email'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['email'] ?></p>
                        <?php endif; ?>
                    </div>


                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>


                    <div class="mb-3">
                        <label for="mdp" class="form-label text-white">Mot de passe : </label>
                        <input
                            type="text"
                            class="form-control <?= isset($erreurs['mdp']) ? "border border-2 border-danger" : "" ?>"
                            id="mdp"
                            name="mdp"
                            value="<?= $mdp ?>"
                            placeholder="Saisir le mot de passe"
                        >
                        <?php if (isset($erreurs['mdp'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['mdp'] ?></p>
                        <?php endif; ?>
                    </div>

                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>





                    <button type="submit" class="btn btn-outline-danger mt-4">Créer le compte</button>
                </form>

            </div>
        </div>
    </div>
</div>



</body>
</html>
