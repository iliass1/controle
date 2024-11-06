<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106150835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE annee_sortie annee_sortie INT NOT NULL, CHANGE duree duree INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AEDDA6F574A FOREIGN KEY (acteur_id) REFERENCES acteurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film CHANGE titre titre VARCHAR(50) NOT NULL, CHANGE annee_sortie annee_sortie DATE NOT NULL, CHANGE duree duree INT NOT NULL');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED567F5183');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AEDDA6F574A');
    }
}
