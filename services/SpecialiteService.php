<?php
require_once __DIR__ . '/../repository/SpecialiteRepository.php';
class SpecialiteService {
    private SpecialiteRepository $repo;
    public function __construct() {
        $this->repo = new SpecialiteRepository();
    }
    public function getAllSpecialites(): array {
        return $this->repo->findAll();
    }
    public function getSpecialiteById($id): ?Specialite {
        return $this->repo->findById($id);
    }
}
