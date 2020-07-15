<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200714223147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX numBatiment ON batiment');
        $this->addSql('ALTER TABLE chambre ADD batiment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FFD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('CREATE INDEX IDX_C509E4FFD6F6891B ON chambre (batiment_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX numBatiment ON batiment (num_batiment)');
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FFD6F6891B');
        $this->addSql('DROP INDEX IDX_C509E4FFD6F6891B ON chambre');
        $this->addSql('ALTER TABLE chambre DROP batiment_id');
    }
}
