<?php

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';
use App\Entity\User;
use App\UserStory\CreateAccount;

$pseudo = "NolanA1000Caro";
$email = "NolanA1000Caro@gmail.com";
$password = "NolanA1000..Caro";

$compte1 = new CreateAccount($entityManager);
$compte1->execute($pseudo, $email, $password);

