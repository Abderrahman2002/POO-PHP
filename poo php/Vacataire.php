<?php

require_once('Person.php'); // Inclure la classe Personne

// Définition de la classe Vacataire, fille de Personne
class Vacataire extends Person {
    // Propriété spécifique à la classe Vacataire
    protected $diplome;

    // Constructeur de la classe Vacataire
    public function __construct($numero, $nom, $prenom, $heuresup, $salairehoraires, $diplome) {
        // Appeler le constructeur de la classe parente Personne
        parent::__construct($numero, $nom, $prenom, $heuresup, $salairehoraires);
        
        // Initialiser la propriété spécifique à la classe Vacataire
        $this->diplome = $diplome;
    }

    // Méthodes magiques __get et __set pour accéder à la propriété spécifique
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

    // Méthode pour calculer le salaire total du vacataire en fonction du diplôme
    public function calculerSalaire() {
        // Salaire de base
        $salaireTotal = $this->salairehoraires * $this->heuresup;

        // Ajouter le salaire en fonction du diplôme
        switch ($this->diplome) {
            case "Bac":
                $salaireTotal += 100; // Salaire supplémentaire pour un Bac
                break;
            case "Bac+2":
                $salaireTotal += 200; // Salaire supplémentaire pour un Bac+2
                break;
            case "Bac+3":
                $salaireTotal += 300; // Salaire supplémentaire pour un Bac+3
                break;
            default:
                $salaireTotal += 50; // Salaire supplémentaire par défaut
        }

        return $salaireTotal;
    }

    // Méthode pour afficher les détails du vacataire
    public function afficherDetails() {
        echo "Numéro: " . $this->numero . "<br>";
        echo "Nom: " . $this->nom . "<br>";
        echo "Prénom: " . $this->prenom . "<br>";
        echo "Diplôme: " . $this->diplome . "<br>";
        echo "Salaire horaire: " . $this->salairehoraires . "<br>";
        echo "Heures supplémentaires: " . $this->heuresup . "<br>";
        echo "Salaire total: " . $this->calculerSalaire() . "<br>";
    }
}

// Test de la classe Vacataire
echo "Test de la classe Vacataire : <br>";
$vacataire = new Vacataire(1, "Doe", "Jane", 5, 20, "Bac+3");
$vacataire->afficherDetails();

