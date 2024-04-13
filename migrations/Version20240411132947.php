<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411132947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiant (numetd VARCHAR(8) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(60) NOT NULL, sexe VARCHAR(1) NOT NULL, adresse VARCHAR(70) DEFAULT NULL, tel VARCHAR(40) DEFAULT NULL, filiere VARCHAR(40) DEFAULT NULL, datnaiss DATE NOT NULL, depnaiss VARCHAR(40) DEFAULT NULL, villnaiss VARCHAR(40) DEFAULT NULL, paysnaiss VARCHAR(40) DEFAULT NULL, nationalite VARCHAR(50) DEFAULT NULL, sports VARCHAR(80) DEFAULT NULL, handicape VARCHAR(80) DEFAULT NULL, derdiplome VARCHAR(50) DEFAULT NULL, dateinsc DATE NOT NULL, registre VARCHAR(30) DEFAULT NULL, statut VARCHAR(30) DEFAULT NULL, hide TINYINT(1) DEFAULT 0, UNIQUE INDEX UNIQ_717E22E3E7927C74 (email), PRIMARY KEY(numetd)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etudiant');
    }
}
