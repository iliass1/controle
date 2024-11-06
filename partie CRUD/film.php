<?php
// Film.php
require_once 'database.php';

class Film {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ajouter un film
    public function ajouterFilm($titre, $anneeSortie, $duree) {
        $sql = "INSERT INTO film (titre, annee_sortie, duree) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titre, $anneeSortie, $duree]);
        echo "Film ajouté : $titre\n";
    }

    // Afficher tous les films
    public function afficherFilms() {
        $sql = "SELECT * FROM film";
        $stmt = $this->conn->query($sql);
        $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "=== Liste des Films ===\n";
        foreach ($films as $film) {
            // Assurez-vous que les clés correspondent aux noms de colonnes de votre base de données
            echo "ID : " . $film['id'] . ", Titre : " . $film['titre'] . ", Année : " . $film['annee_sortie'] . ", Durée : " . $film['duree'] . " minutes\n";
        }
    }

    // Mettre à jour un film
    public function mettreAJourFilm($id, $titre, $anneeSortie, $duree) {
        $sql = "UPDATE film SET titre = ?, annee_sortie = ?, duree = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titre, $anneeSortie, $duree, $id]);
        echo "Film mis à jour avec succès (ID : $id)\n";
    }

    // Supprimer un film
    public function supprimerFilm($id) {
        $sql = "DELETE FROM film WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        echo "Film supprimé avec succès (ID : $id)\n";
    }
}
