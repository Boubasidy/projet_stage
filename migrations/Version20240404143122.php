<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240404143122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bloc (codebloc VARCHAR(20) NOT NULL, filiere VARCHAR(20) NOT NULL, nom_bloc VARCHAR(60) NOT NULL, note_placher INT DEFAULT NULL, INDEX IDX_C778955A2ED05D9E (filiere), PRIMARY KEY(codebloc)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve (codeepreuve VARCHAR(20) NOT NULL, matiere VARCHAR(20) NOT NULL, num_chance INT NOT NULL, annee INT NOT NULL, type_epreuve VARCHAR(25) NOT NULL, salle VARCHAR(50) DEFAULT NULL, duree INT NOT NULL, INDEX IDX_D6ADE47F9014574A (matiere), PRIMARY KEY(codeepreuve)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (codefiliere VARCHAR(20) NOT NULL, nom_filiere VARCHAR(60) NOT NULL, resp_filiere VARCHAR(60) DEFAULT NULL, PRIMARY KEY(codefiliere)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (codemat VARCHAR(20) NOT NULL, unite VARCHAR(20) NOT NULL, nom_mat VARCHAR(60) NOT NULL, periode VARCHAR(4) NOT NULL, INDEX IDX_9014574A1D64C118 (unite), PRIMARY KEY(codemat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unite (codeunite VARCHAR(20) NOT NULL, bloc VARCHAR(20) NOT NULL, nom_unite VARCHAR(60) NOT NULL, coef INT NOT NULL, rep_unite VARCHAR(60) DEFAULT NULL, INDEX IDX_1D64C118C778955A (bloc), PRIMARY KEY(codeunite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955A2ED05D9E FOREIGN KEY (filiere) REFERENCES filiere (codefiliere)');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT FK_D6ADE47F9014574A FOREIGN KEY (matiere) REFERENCES matiere (codemat)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A1D64C118 FOREIGN KEY (unite) REFERENCES unite (codeunite)');
        $this->addSql('ALTER TABLE unite ADD CONSTRAINT FK_1D64C118C778955A FOREIGN KEY (bloc) REFERENCES bloc (codebloc)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955A2ED05D9E');
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY FK_D6ADE47F9014574A');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A1D64C118');
        $this->addSql('ALTER TABLE unite DROP FOREIGN KEY FK_1D64C118C778955A');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE unite');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
