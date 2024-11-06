<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106145421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE acteurs');
        $this->addSql('DROP TABLE jouer');
        $this->addSql('DROP TABLE realisateurs');
        $this->addSql('DROP TABLE realiser');
        $this->addSql('DROP TABLE regarder');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('ALTER TABLE film ADD id INT AUTO_INCREMENT NOT NULL, DROP id_film, CHANGE titre titre VARCHAR(50) NOT NULL, CHANGE annee_sortie annee_sortie DATE NOT NULL, CHANGE duree duree INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acteurs (id_acteur INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, role VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, date_naissance DATE DEFAULT NULL, PRIMARY KEY(id_acteur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jouer (id_film INT NOT NULL, id_acteur INT NOT NULL, role VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX id_acteur (id_acteur), PRIMARY KEY(id_film, id_acteur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE realisateurs (id_realisateur INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id_realisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE realiser (id_film INT NOT NULL, id_realisateur INT NOT NULL, UNIQUE INDEX id_film (id_film), INDEX id_realisateur (id_realisateur), PRIMARY KEY(id_film, id_realisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE regarder (id_utilisateur INT NOT NULL, id_film INT NOT NULL, INDEX id_film (id_film), PRIMARY KEY(id_utilisateur, id_film)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateurs (id_utilisateur INT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, email VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, mot_de_passe VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, role VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, UNIQUE INDEX email (email), PRIMARY KEY(id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE film MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON film');
        $this->addSql('ALTER TABLE film ADD id_film INT NOT NULL, DROP id, CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE annee_sortie annee_sortie DATE DEFAULT NULL, CHANGE duree duree INT DEFAULT NULL');
        $this->addSql('ALTER TABLE film ADD PRIMARY KEY (id_film)');
    }
}
