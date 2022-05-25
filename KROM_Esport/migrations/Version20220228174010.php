<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220228174010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE direction');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE direction (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, age INT DEFAULT NULL, ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, img VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lien LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, circuit LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, voiture LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, palmares LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE actualites CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texte texte LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_couverture img_couverture VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE video video LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE auteur auteur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE calendrier CHANGE heure heure VARCHAR(7) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE intitule intitule VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_evenement lien_evenement VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipe CHANGE role role VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img img VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien lien LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE circuit circuit LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE voiture voiture LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE palmares palmares LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
