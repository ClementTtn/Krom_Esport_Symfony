<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304204330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualites ADD visible TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualites DROP visible, CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texte texte LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_couverture img_couverture VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE video video LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE auteur auteur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sous_titre sous_titre VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_texte_1 img_texte_1 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_texte_2 img_texte_2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_texte_3 img_texte_3 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_texte_4 img_texte_4 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE calendrier CHANGE heure heure VARCHAR(7) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE intitule intitule VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_evenement lien_evenement VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipe CHANGE role role VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img img VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien lien LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE circuit circuit LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE voiture voiture LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE palmares palmares LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
