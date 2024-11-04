<?php

namespace App\Controllers;
use App\Entity\User;
use App\UserStory\CreateAccount;
use App\UserStory\Login;
use Doctrine\ORM\EntityManager;

class ConnexionController
{
    private EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */

    public function __construct(EntityManager $entityManager){
        $this->entityManager = $entityManager;
    }
    public function creer() {
        $erreurs = [];
        $pseudo = "";
        $email = "";
        $mdp = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $pseudo = $_POST["pseudo"];
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];

            if (empty($pseudo)) {
                $erreurs['pseudo'] = "Le pseudo est obligatoire";
            }
            if (empty($email)) {
                $erreurs['email'] = "Le email est obligatoire";
            }
            if (empty($mdp)) {
                $erreurs['mdp'] = "Le mdp est obligatoire";
            }
            if (count($erreurs) == 0) {
                $nvcompte = new CreateAccount($this->entityManager);
                $nvcompte->execute($pseudo, $email, $mdp);
            }

        }
        require_once __DIR__ . "/../../views/compte/createaccount.php";

    }


    public function login()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = new Login($this->entityManager);
            $user = $login->execute($_POST['email'], $_POST['password']);
            if ($user) {
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_name'] = $user->getPseudo();
                header('Location: index.php?route=acceuil');
                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }
        require __DIR__ . '/../../views/compte/Login.php';
    }


}