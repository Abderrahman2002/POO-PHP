
<?php

require_once('Person.php'); // Inclure la classe abstraite Personne

// Définition de la classe Formateur, fille de Personne
class Formateur extends Person {
    // Propriétés spécifiques à la classe Formateur
    protected $niveau;
    protected $salaireFixe;

    // Constructeur de la classe Formateur
    public function __construct($numero, $nom, $prenom, $heuresup, $salairehoraires, $niveau, $salaireFixe) {
        // Appeler le constructeur de la classe parente Personne
        parent::__construct($numero, $nom, $prenom, $heuresup, $salairehoraires);
        
        // Initialiser les propriétés spécifiques à la classe Formateur
        $this->niveau = $niveau;
        $this->salaireFixe = $salaireFixe;
    }

    // Méthodes magiques __get et __set pour accéder aux propriétés spécifiques
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

   // Méthode pour calculer le salaire total du formateur en fonction du niveau
public function calculerSalaire() {
    // Salaire de base
    $salaireTotal = $this->salairehoraires * $this->heuresup;

    // Ajouter le salaire fixe en fonction du niveau
    switch ($this->niveau) {
        case "S":
            $salaireTotal += 1000; // Salaire fixe pour le niveau S
            break;
        case "Q":
            $salaireTotal += 1500; // Salaire fixe pour le niveau Q
            break;
        case "T":
                $salaireTotal += 1500; // Salaire fixe pour le niveau T
                break;
        case "TS":
                    $salaireTotal += 1500; // Salaire fixe pour le niveau TS
                    break;
        default:
            $salaireTotal += 500; // Salaire fixe par défaut pour les autres niveaux
    }

    return $salaireTotal;
}


    // Méthode pour afficher les détails du formateur
    public function afficherDetails() {
        echo "Numéro: " . $this->numero . "<br>";
        echo "Nom: " . $this->nom . "<br>";
        echo "Prénom: " . $this->prenom . "<br>";
        echo "Niveau: " . $this->niveau . "<br>";
        echo "Salaire horaire: " . $this->salairehoraires . "<br>";
        echo "Salaire fixe: " . $this->salaireFixe . "<br>";
        echo "Heures supplémentaires: " . $this->heuresup . "<br>";
        echo "Salaire total: " . $this->calculerSalaire() . "DH <br>";
    }
}

// Test de la classe Formateur
$formateur = new Formateur(1, "Doe", "John", 5, 20, "TS", 1000);
$formateur->afficherDetails();


