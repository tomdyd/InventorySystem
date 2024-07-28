<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717115217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localization (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE printer (id INT AUTO_INCREMENT NOT NULL, localization_id INT NOT NULL, serial_number VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, mac_address_lan VARCHAR(255) DEFAULT NULL, ip_address VARCHAR(255) NOT NULL, INDEX IDX_8D4C79ED6A2856C7 (localization_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE printer ADD CONSTRAINT FK_8D4C79ED6A2856C7 FOREIGN KEY (localization_id) REFERENCES localization (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE printer DROP FOREIGN KEY FK_8D4C79ED6A2856C7');
        $this->addSql('DROP TABLE localization');
        $this->addSql('DROP TABLE printer');
    }
}
