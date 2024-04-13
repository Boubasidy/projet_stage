<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411134356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resultatbac (bac INT NOT NULL, etudiant VARCHAR(8) NOT NULL, anneebac INT NOT NULL, mention VARCHAR(20) DEFAULT NULL, moyennebac DOUBLE PRECISION DEFAULT NULL, etabbac VARCHAR(50) DEFAULT NULL, depbac VARCHAR(50) DEFAULT NULL, INDEX IDX_A83D80341C4FAC58 (bac), INDEX IDX_A83D8034717E22E3 (etudiant), PRIMARY KEY(bac, etudiant)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resultatbac ADD CONSTRAINT FK_A83D80341C4FAC58 FOREIGN KEY (bac) REFERENCES bac (idbac)');
        $this->addSql('ALTER TABLE resultatbac ADD CONSTRAINT FK_A83D8034717E22E3 FOREIGN KEY (etudiant) REFERENCES etudiant (numetd)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultatbac DROP FOREIGN KEY FK_A83D80341C4FAC58');
        $this->addSql('ALTER TABLE resultatbac DROP FOREIGN KEY FK_A83D8034717E22E3');
        $this->addSql('DROP TABLE resultatbac');
    }
}
