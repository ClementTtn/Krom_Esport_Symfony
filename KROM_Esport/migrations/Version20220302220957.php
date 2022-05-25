<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302220957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualites ADD sous_titre VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE admin CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualites DROP sous_titre, CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texte texte LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_couverture img_couverture VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE video video LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE auteur auteur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE calendrier CHANGE heure heure VARCHAR(7) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE intitule intitule VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_evenement lien_evenement VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipe CHANGE role role VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img img VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien lien LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE circuit circuit LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE voiture voiture LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE palmares palmares LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
