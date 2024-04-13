<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411133717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_ant (codef VARCHAR(20) NOT NULL, nomf VARCHAR(50) NOT NULL, etablissement VARCHAR(80) DEFAULT NULL, diplome VARCHAR(10) DEFAULT NULL, PRIMARY KEY(codef)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (codegrp VARCHAR(50) NOT NULL, nomgrp VARCHAR(50) NOT NULL, nbetds INT NOT NULL, capacite INT NOT NULL, PRIMARY KEY(codegrp)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE formation_ant');
        $this->addSql('DROP TABLE groupe');
    }
}
