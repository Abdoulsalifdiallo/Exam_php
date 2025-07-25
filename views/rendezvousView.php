<?php
function afficherMenuPatient() {
    echo "\n=== MENU PATIENT ===\n";
    echo "1. Prendre un rendez-vous\n";
    echo "2. Mes rendez-vous\n";
    echo "3. Demander l'annulation d'un rendez-vous\n";
    echo "0. Déconnexion\n";
}
function demanderSpecialite($specialites) {
    echo "--- Spécialités ---\n";
    foreach ($specialites as $s) {
        echo $s->getId() . ". " . $s->getNom() . "\n";
    }
    return readline("ID spécialité : ");
}
function demanderMedecin($medecins, $idSpecialite) {
    echo "--- Médecins ---\n";
    foreach ($medecins as $m) {
        if ($m->getSpecialiteId() == $idSpecialite) {
            echo $m->getId() . ". " . $m->getNom() . " " . $m->getPrenom() . "\n";
        }
    }
    return readline("ID médecin : ");
}
function demanderDateHeureRv() {
    $date_rv = readline("Date du RV (YYYY-MM-DD) : ");
    $heure_rv = readline("Heure du RV (HH:MM:SS) : ");
    return [$date_rv, $heure_rv];
}
function afficherRendezVous($rvs, $medecinService) {
    if (empty($rvs)) {
        echo "Aucun rendez-vous trouvé.\n";
    } else {
        foreach ($rvs as $rv) {
            $medecin = $medecinService->getMedecinById($rv->getMedecinId());
            $nomMedecin = $medecin ? ($medecin->getNom() . " " . $medecin->getPrenom()) : "Inconnu";
            echo "ID: " . $rv->getId()
                . " | Date: " . $rv->getDateRv()
                . " | Heure: " . $rv->getHeureRv()
                . " | Statut: " . $rv->getStatut()
                . " | Médecin: " . $nomMedecin
                . " | Demande annulation: " . ($rv->getDemandeAnnulation() ? "Oui" : "Non")
                . "\n";
        }
    }
}
