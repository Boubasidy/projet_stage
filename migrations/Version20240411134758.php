<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411134758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choix (specialite VARCHAR(10) NOT NULL, etudiant VARCHAR(8) NOT NULL, enterminale TINYINT(1) NOT NULL, INDEX IDX_4F488091E7D6FCC1 (specialite), INDEX IDX_4F488091717E22E3 (etudiant), PRIMARY KEY(specialite, etudiant)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choix ADD CONSTRAINT FK_4F488091E7D6FCC1 FOREIGN KEY (specialite) REFERENCES specialite (codespe)');
        $this->addSql('ALTER TABLE choix ADD CONSTRAINT FK_4F488091717E22E3 FOREIGN KEY (etudiant) REFERENCES etudiant (numetd)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choix DROP FOREIGN KEY FK_4F488091E7D6FCC1');
        $this->addSql('ALTER TABLE choix DROP FOREIGN KEY FK_4F488091717E22E3');
        $this->addSql('DROP TABLE choix');
    }
}
