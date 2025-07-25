<?php
require_once __DIR__ . '/../repository/MedecinRepository.php';
class MedecinService {
    private MedecinRepository $repo;
    public function __construct() {
        $this->repo = new MedecinRepository();
    }
    public function getAllMedecins(): array {
        return $this->repo->findAll();
    }
    public function getMedecinById($id): ?Medecin {
        return $this->repo->findById($id);
    }
}
