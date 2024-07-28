<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717092002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE computer (id INT AUTO_INCREMENT NOT NULL, device_type_id INT NOT NULL, person_id INT NOT NULL, serial_number VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, domain_name VARCHAR(255) NOT NULL, mac_address_lan VARCHAR(255) DEFAULT NULL, mac_address_wifi VARCHAR(255) DEFAULT NULL, ip VARCHAR(255) NOT NULL, localization VARCHAR(255) NOT NULL, date_from DATE NOT NULL, INDEX IDX_A298A7A64FFA550E (device_type_id), INDEX IDX_A298A7A6217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE device_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, department VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A64FFA550E FOREIGN KEY (device_type_id) REFERENCES device_type (id)');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A64FFA550E');
        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6217BBB47');
        $this->addSql('DROP TABLE computer');
        $this->addSql('DROP TABLE device_type');
        $this->addSql('DROP TABLE person');
    }
}
