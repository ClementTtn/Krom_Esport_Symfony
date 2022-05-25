<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220225174935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendrier (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, heure VARCHAR(7) NOT NULL, intitule VARCHAR(255) NOT NULL, lien_evenement VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE calendrier');
        $this->addSql('ALTER TABLE actualites CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texte texte LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_couverture img_couverture VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE video video LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE auteur auteur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
