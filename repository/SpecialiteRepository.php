<?php
require_once __DIR__ . '/../models/Specialite.php';
require_once __DIR__ . '/../config/Database.php';
class SpecialiteRepository {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getConnection();
    }
    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM specialite");
        $result = [];
        while ($row = $stmt->fetch()) {
            $result[] = new Specialite($row['nom'], $row['id']);
        }
        return $result;
    }
    public function findById($id): ?Specialite {
        $sql = "SELECT * FROM specialite WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Specialite($row['nom'], $row['id']);
        }
        return null;
    }
}
