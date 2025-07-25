<?php
require_once __DIR__ . '/../models/Medecin.php';
require_once __DIR__ . '/../config/Database.php';
class MedecinRepository {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getConnection();
    }
    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM medecin");
        $result = [];
        while ($row = $stmt->fetch()) {
            $result[] = new Medecin($row['nom'], $row['prenom'], $row['specialite_id'], $row['id']);
        }
        return $result;
    }
    public function findById($id): ?Medecin {
        $sql = "SELECT * FROM medecin WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Medecin($row['nom'], $row['prenom'], $row['specialite_id'], $row['id']);
        }
        return null;
    }
}
