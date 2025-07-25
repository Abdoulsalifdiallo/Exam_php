<?php
require_once __DIR__ . '/../repository/PatientRepository.php';
class PatientService {
    private PatientRepository $repo;
    public function __construct() {
        $this->repo = new PatientRepository();
    }
    public function register($nom, $prenom, $email, $password): bool {
        if ($this->repo->findByEmail($email)) {
            echo "Email déjà utilisé.\n";
            return false;
        }
        $patient = new Patient($nom, $prenom, $email, $password);
        return $this->repo->save($patient);
    }
    public function login($email, $password): ?Patient {
        $patient = $this->repo->findByEmail($email);
        if ($patient && password_verify($password, $patient->getPassword())) {
            return $patient;
        }
        return null;
    }
}
