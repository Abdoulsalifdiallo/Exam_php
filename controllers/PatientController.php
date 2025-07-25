<?php
require_once __DIR__ . '/../services/PatientService.php';
require_once __DIR__ . '/../views/patientView.php';

class PatientController {
    private $service;
    public function __construct() {
        $this->service = new PatientService();
    }
    public function menuPrincipal() {
        $patient = null;
        while (true) {
            afficherMenuAuth();
            $choix = readline("Votre choix : ");
            if ($choix == 1) {
                $infos = demanderInfosInscription();
                $this->service->register
