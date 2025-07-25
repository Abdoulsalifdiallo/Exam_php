<?php
require_once __DIR__ . '/../repository/RendezVousRepository.php';
class RendezVousService {
    private RendezVousRepository $repo;
    public function __construct() {
        $this->repo = new RendezVousRepository();
    }
    public function prendreRendezVous($date_rv, $heure_rv, $patient_id, $medecin_id): bool {
        $rv = new RendezVous($date_rv, $heure_rv, 'EN_ATTENTE', $patient_id, $medecin_id, false);
        return $this->repo->save($rv);
    }
    public function listerRendezVousPatient($patient_id): array {
        return $this->repo->findByPatient($patient_id);
    }
    public function demanderAnnulation($id_rv): bool {
        return $this->repo->demanderAnnulation($id_rv);
    }
}
