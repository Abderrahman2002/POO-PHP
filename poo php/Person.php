<?php

// Définition de la classe abstraite Personne
abstract class Person {
    // Attributs protégés de la classe Personne
    protected $numero; // Numéro de la personne
    protected $nom; // Nom de la personne
    protected $prenom; // Prénom de la personne
    protected $heuresup; // Heures supplémentaires effectuées par la personne
    protected $salairehoraires; // Salaire horaire de la personne

    // Constructeur de la classe Personne
    public function __construct($numero, $nom, $prenom, $heuresup, $salairehoraires) {
        // Initialisation des attributs de la personne
        $this->numero = $numero;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->heuresup = $heuresup;
        $this->salairehoraires = $salairehoraires;
    }

     // Méthodes magiques __get et __set pour accéder aux attributs protégés
     public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Méthodes abstraites
    abstract public function calculerSalaire(); // Méthode abstraite pour calculer le salaire
    abstract public function afficherDetails(); // Méthode abstraite pour afficher les détails de la personne
}
