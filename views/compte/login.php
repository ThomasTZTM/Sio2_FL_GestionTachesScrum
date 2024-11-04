<h1 class="text-danger">Connexion</h1>

<?php if (isset($error)): ?>
    <p class="text-danger mb-4"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="index.php?route=login" method="post" class="max-w-md">
    <div class="mb-4">
        <label for="email" class="">Email :</label>
        <input type="email" id="email" name="email" required class="">
    </div>
    <div class="mb-6">
        <label for="password" class="">Mot de passe :</label>
        <input type="password" id="password" name="password" required class="">
    </div>
    <div class="button">
        <button type="submit" class="button ">
            Se connecter
        </button>
        <a href="index.php?route=creercompte" class="">
            Créer un compte
        </a>
    </div>
</form>
