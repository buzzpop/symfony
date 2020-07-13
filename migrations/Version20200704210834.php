<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200704210834 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE batiment (id INT AUTO_INCREMENT NOT NULL, num_batiment INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, batiment_id INT DEFAULT NULL, num_chambre VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, num_batiment INT NOT NULL, INDEX IDX_C509E4FFD6F6891B (batiment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, num_dept INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, departement_id INT DEFAULT NULL, matricule VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, email VARCHAR(255) NOT NULL, tel INT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_717E22E3CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FFD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FFD6F6891B');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3CCF9E01E');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE etudiant');
    }
}
