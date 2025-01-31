<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411135812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant ADD codegrp VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3BE4E55D8 FOREIGN KEY (codegrp) REFERENCES groupe (codegrp) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_717E22E3BE4E55D8 ON etudiant (codegrp)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3BE4E55D8');
        $this->addSql('DROP INDEX IDX_717E22E3BE4E55D8 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP codegrp');
    }
}
