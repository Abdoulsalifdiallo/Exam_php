<?php
function afficherMenuAuth() {
    echo "\n=== MENU CLINIQUE ===\n";
    echo "1. Inscription Patient\n";
    echo "2. Connexion Patient\n";
    echo "0. Quitter\n";
}
function demanderInfosInscription() {
    echo "--- Inscription ---\n";
    $nom = readline("Nom : ");
    $prenom = readline("Prénom : ");
    $email = readline("Email : ");
    $password = readline("Mot de passe : ");
    return ['nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email, 'password'=>$password];
}
function demanderInfosConnexion() {
    echo "--- Connexion ---\n";
    $email = readline("Email : ");
    $password = readline("Mot de passe : ");
    return ['email'=>$email, 'password'=>$password];
}
