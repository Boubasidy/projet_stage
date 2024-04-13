<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411135358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudsup (formation VARCHAR(20) NOT NULL, etudiant VARCHAR(8) NOT NULL, anneedeb INT DEFAULT NULL, INDEX IDX_5DDD686404021BF (formation), INDEX IDX_5DDD686717E22E3 (etudiant), PRIMARY KEY(formation, etudiant)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudsup ADD CONSTRAINT FK_5DDD686404021BF FOREIGN KEY (formation) REFERENCES formation_ant (codef)');
        $this->addSql('ALTER TABLE etudsup ADD CONSTRAINT FK_5DDD686717E22E3 FOREIGN KEY (etudiant) REFERENCES etudiant (numetd)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudsup DROP FOREIGN KEY FK_5DDD686404021BF');
        $this->addSql('ALTER TABLE etudsup DROP FOREIGN KEY FK_5DDD686717E22E3');
        $this->addSql('DROP TABLE etudsup');
    }
}
