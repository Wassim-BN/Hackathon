<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261112095555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hackathon CHANGE date_heure_debut date_heure_debut DATETIME NOT NULL, CHANGE date_heure_fin date_heure_fin DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE hackathon ADD CONSTRAINT FK_8B3AF64FD936B2FA FOREIGN KEY (organisateur_id) REFERENCES organisateur (id)');
        $this->addSql('CREATE INDEX IDX_8B3AF64FD936B2FA ON hackathon (organisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hackathon DROP FOREIGN KEY FK_8B3AF64FD936B2FA');
        $this->addSql('DROP INDEX IDX_8B3AF64FD936B2FA ON hackathon');
        $this->addSql('ALTER TABLE hackathon CHANGE date_heure_debut date_heure_debut VARCHAR(100) DEFAULT NULL, CHANGE date_heure_fin date_heure_fin VARCHAR(100) DEFAULT NULL');
    }
}
