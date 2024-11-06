<?php
require_once 'Film.php';

$filmService = new Film();

echo "\n--- Ajout de films ---\n";
$filmService->ajouterFilm('Inception', 2010, 148);
$filmService->ajouterFilm('The Matrix', 1999, 136);

echo "\n--- Affichage des films ---\n";
$filmService->afficherFilms();

echo "\n--- Mise à jour d'un film ---\n";
$filmService->mettreAJourFilm(1, 'Inception', 2010, 150);

echo "\n--- Affichage des films après mise à jour ---\n";
$filmService->afficherFilms();

echo "\n--- Suppression d'un film ---\n";
$filmService->supprimerFilm(2);

echo "\n--- Affichage des films après suppression ---\n";
$filmService->afficherFilms();
