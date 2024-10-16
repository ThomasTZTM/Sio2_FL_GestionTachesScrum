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

        if (!(!empty($pseudo) && !empty($email) && !empty($password))) {
            truc
        }

        // Vérifier si l'email est valide
        // Si t'elle n'est pas le cas, on lance une exception





        // Vérifier la longueur du pseudo, entre deux et cinquente
        // Si t'elle n'est pas le cas, on lance une exception



        // Vérifier si le mot de passe est sécuriser
        // Si t'elle n'est pas le cas, on lance une exception



        // Vérifier que l'email n'existe pas déjà (uniciter)
        // Si t'elle n'est pas le cas, on lance une exception


        // Insérer dans la base de donnée
        // 1. Hash le mot de passe



        // 2. Créer une instance de la classe User

        $user = new User(); // instance

        // 3. On perciste l'instence en utilisant l'entityManager

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Envoie du mail de confirmation

        echo "Un email de confirmation à été envoyé à l'utilisateur";
        return $user;
    }


}