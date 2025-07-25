<?php
require_once __DIR__ . '/../models/RendezVous.php';
require_once __DIR__ . '/../config/Database.php';
class RendezVousRepository {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getConnection();
    }
    public function save(RendezVous $rv): bool {
        $sql = "INSERT INTO rendezvous (date_rv, heure_rv, statut, patient_id, medecin_id, demande_annulation)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $rv->getDateRv(),
            $rv->getHeureRv(),
            $rv->getStatut(),
            $rv->getPatientId(),
            $rv->getMedecinId(),
            $rv->getDemandeAnnulation()
        ]);
    }
    public function findByPatient($patient_id): array {
        $sql = "SELECT * FROM rendezvous WHERE patient_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$patient_id]);
        $result = [];
        while ($row = $stmt->fetch()) {
            $result[] = new RendezVous(
                $row['date_rv'], $row['heure_rv'], $row['statut'],
                $row['patient_id'], $row['medecin_id'], $row['demande_annulation'], $row['id']
            );
        }
        return $result;
    }
    public function demanderAnnulation($id_rv): bool {
        $sql = "UPDATE rendezvous SET demande_annulation = 1 WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_rv]);
    }
}
