<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateAccount
{
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager){
    // L'entityManager est injecté par dépendence
        $this->entityManager = $entityManager;
    }

    // Cette méthode permettra d'exécuter la userStory
    public function execute(string $pseudo, string $email, string $password) : User
    {
        // Vérifier que les données sont présentes
        // Si t'elle n'est pas le cas, on lance une exception

        if (empty($pseudo) || empty($email) || empty($password)) {
            throw new \InvalidArgumentException("Tous les champs (pseudo, email, mot de passe) doivent être renseignés."); }

        // Vérifier si l'email est valide
        // Si t'elle n'est pas le cas, on lance une exception

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("L'adresse email fournie n'est pas valide."); }

        // Vérifier la longueur du pseudo, entre deux et cinquente
        // Si t'elle n'est pas le cas, on lance une exception

        if (strlen($pseudo) < 2 || strlen($pseudo) > 50) {
            throw new \InvalidArgumentException("Le pseudo doit contenir entre 2 et 50 caractères."); }

        // Vérifier si le mot de passe est sécuriser
        // Si t'elle n'est pas le cas, on lance une exception

        if (strlen($password) < 8 ||  !preg_match('/[A-Z]/', $password) ||  !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) ||  !preg_match('/[\W_]/', $password)) {
            throw new \InvalidArgumentException("Le mot de passe doit contenir au moins 8 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.");}

        // Vérifier que l'email n'existe pas déjà (uniciter)
        // Si t'elle n'est pas le cas, on lance une exception

        $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if ($existingUser !== null) {
            throw new \InvalidArgumentException("L'adresse email est déjà utilisée par un autre compte.");}

        // Insérer dans la base de données
        // 1. Hacher le mot de passe

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // 2. Créer une instance de la classe User

        $user = new User();
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);

        // 3. On persiste l'instance en utilisant l'entityManager

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Envoie du mail de confirmation

        echo "Un email de confirmation à été envoyé à l'utilisateur";
        return $user;
    }


}