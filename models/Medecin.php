<?php
class Medecin {
    private ?int $id;
    private string $nom;
    private string $prenom;
    private int $specialite_id;
    public function __construct($nom, $prenom, $specialite_id, $id = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->specialite_id = $specialite_id;
    }
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getSpecialiteId() { return $this->specialite_id; }
    public function setId($id) { $this->id = $id; }
    public function setNom($nom) { $this->nom = $nom; }
    public function setPrenom($prenom) { $this->prenom = $prenom; }
    public function setSpecialiteId($sid) { $this->specialite_id = $sid; }
}
