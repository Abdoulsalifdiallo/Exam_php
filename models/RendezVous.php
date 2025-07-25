<?php
class RendezVous {
    private ?int $id;
    private string $date_rv;
    private string $heure_rv;
    private string $statut;
    private int $patient_id;
    private int $medecin_id;
    private bool $demande_annulation;
    public function __construct($date_rv, $heure_rv, $statut, $patient_id, $medecin_id, $demande_annulation = false, $id = null) {
        $this->id = $id;
        $this->date_rv = $date_rv;
        $this->heure_rv = $heure_rv;
        $this->statut = $statut;
        $this->patient_id = $patient_id;
        $this->medecin_id = $medecin_id;
        $this->demande_annulation = $demande_annulation;
    }
    public function getId() { return $this->id; }
    public function getDateRv() { return $this->date_rv; }
    public function getHeureRv() { return $this->heure_rv; }
    public function getStatut() { return $this->statut; }
    public function getPatientId() { return $this->patient_id; }
    public function getMedecinId() { return $this->medecin_id; }
    public function getDemandeAnnulation() { return $this->demande_annulation; }
    public function setId($id) { $this->id = $id; }
    public function setDateRv($date_rv) { $this->date_rv = $date_rv; }
    public function setHeureRv($heure_rv) { $this->heure_rv = $heure_rv; }
    public function setStatut($statut) { $this->statut = $statut; }
    public function setPatientId($pid) { $this->patient_id = $pid; }
    public function setMedecinId($mid) { $this->medecin_id = $mid; }
    public function setDemandeAnnulation($demande) { $this->demande_annulation = $demande; }
}
