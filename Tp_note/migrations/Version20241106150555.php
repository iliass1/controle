<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106150555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acteurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, role VARCHAR(50) NOT NULL, date_naissance DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jouer (film_id INT NOT NULL, acteur_id INT NOT NULL, role VARCHAR(50) NOT NULL, INDEX IDX_825E5AED567F5183 (film_id), INDEX IDX_825E5AEDDA6F574A (acteur_id), PRIMARY KEY(film_id, acteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, role VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_497B315EE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AEDDA6F574A FOREIGN KEY (acteur_id) REFERENCES acteurs (id)');
        $this->addSql('ALTER TABLE film CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE annee_sortie annee_sortie INT NOT NULL, CHANGE duree duree INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED567F5183');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AEDDA6F574A');
        $this->addSql('DROP TABLE acteurs');
        $this->addSql('DROP TABLE jouer');
        $this->addSql('DROP TABLE realisateurs');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('ALTER TABLE film CHANGE titre titre VARCHAR(50) NOT NULL, CHANGE annee_sortie annee_sortie DATE NOT NULL, CHANGE duree duree INT NOT NULL');
    }
}
