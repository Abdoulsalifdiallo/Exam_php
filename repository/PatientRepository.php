<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../config/Database.php';
class PatientRepository {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getConnection();
    }
    public function save(Patient $patient): bool {
        $sql = "INSERT INTO patient (nom, prenom, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $pwd = password_hash($patient->getPassword(), PASSWORD_DEFAULT);
        return $stmt->execute([
            $patient->getNom(),
            $patient->getPrenom(),
            $patient->getEmail(),
            $pwd
        ]);
    }
    public function findByEmail($email): ?Patient {
        $sql = "SELECT * FROM patient WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if ($row) {
            return new Patient($row['nom'], $row['prenom'], $row['email'], $row['password'], $row['id']);
        }
        return null;
    }
    public function findById($id): ?Patient {
        $sql = "SELECT * FROM patient WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Patient($row['nom'], $row['prenom'], $row['email'], $row['password'], $row['id']);
        }
        return null;
    }
}
