<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717132220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mouse_and_keyboard (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, device_type_id INT NOT NULL, serial_number VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, INDEX IDX_706299FF217BBB47 (person_id), INDEX IDX_706299FF4FFA550E (device_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, device_type_id INT NOT NULL, imei_number VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, mac_address_wifi VARCHAR(255) NOT NULL, pin VARCHAR(4) NOT NULL, puk VARCHAR(8) NOT NULL, INDEX IDX_444F97DD217BBB47 (person_id), INDEX IDX_444F97DD4FFA550E (device_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scanner (id INT AUTO_INCREMENT NOT NULL, localization_id INT NOT NULL, device_type_id INT NOT NULL, serial_number VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, INDEX IDX_55EFDF296A2856C7 (localization_id), INDEX IDX_55EFDF294FFA550E (device_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tablet (id INT AUTO_INCREMENT NOT NULL, device_type_id INT NOT NULL, localization_id INT NOT NULL, serial_number VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, mac_address_lan VARCHAR(255) NOT NULL, ip_address VARCHAR(255) NOT NULL, INDEX IDX_1A2397824FFA550E (device_type_id), INDEX IDX_1A2397826A2856C7 (localization_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terminal (id INT AUTO_INCREMENT NOT NULL, localization_id INT NOT NULL, serial_number VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, INDEX IDX_8F7B15416A2856C7 (localization_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mouse_and_keyboard ADD CONSTRAINT FK_706299FF217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE mouse_and_keyboard ADD CONSTRAINT FK_706299FF4FFA550E FOREIGN KEY (device_type_id) REFERENCES device_type (id)');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD4FFA550E FOREIGN KEY (device_type_id) REFERENCES device_type (id)');
        $this->addSql('ALTER TABLE scanner ADD CONSTRAINT FK_55EFDF296A2856C7 FOREIGN KEY (localization_id) REFERENCES localization (id)');
        $this->addSql('ALTER TABLE scanner ADD CONSTRAINT FK_55EFDF294FFA550E FOREIGN KEY (device_type_id) REFERENCES device_type (id)');
        $this->addSql('ALTER TABLE tablet ADD CONSTRAINT FK_1A2397824FFA550E FOREIGN KEY (device_type_id) REFERENCES device_type (id)');
        $this->addSql('ALTER TABLE tablet ADD CONSTRAINT FK_1A2397826A2856C7 FOREIGN KEY (localization_id) REFERENCES localization (id)');
        $this->addSql('ALTER TABLE terminal ADD CONSTRAINT FK_8F7B15416A2856C7 FOREIGN KEY (localization_id) REFERENCES localization (id)');
        $this->addSql('ALTER TABLE monitor ADD device_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE monitor ADD CONSTRAINT FK_E11599854FFA550E FOREIGN KEY (device_type_id) REFERENCES device_type (id)');
        $this->addSql('CREATE INDEX IDX_E11599854FFA550E ON monitor (device_type_id)');
        $this->addSql('ALTER TABLE printer ADD device_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE printer ADD CONSTRAINT FK_8D4C79ED4FFA550E FOREIGN KEY (device_type_id) REFERENCES device_type (id)');
        $this->addSql('CREATE INDEX IDX_8D4C79ED4FFA550E ON printer (device_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mouse_and_keyboard DROP FOREIGN KEY FK_706299FF217BBB47');
        $this->addSql('ALTER TABLE mouse_and_keyboard DROP FOREIGN KEY FK_706299FF4FFA550E');
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DD217BBB47');
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DD4FFA550E');
        $this->addSql('ALTER TABLE scanner DROP FOREIGN KEY FK_55EFDF296A2856C7');
        $this->addSql('ALTER TABLE scanner DROP FOREIGN KEY FK_55EFDF294FFA550E');
        $this->addSql('ALTER TABLE tablet DROP FOREIGN KEY FK_1A2397824FFA550E');
        $this->addSql('ALTER TABLE tablet DROP FOREIGN KEY FK_1A2397826A2856C7');
        $this->addSql('ALTER TABLE terminal DROP FOREIGN KEY FK_8F7B15416A2856C7');
        $this->addSql('DROP TABLE mouse_and_keyboard');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE scanner');
        $this->addSql('DROP TABLE tablet');
        $this->addSql('DROP TABLE terminal');
        $this->addSql('ALTER TABLE printer DROP FOREIGN KEY FK_8D4C79ED4FFA550E');
        $this->addSql('DROP INDEX IDX_8D4C79ED4FFA550E ON printer');
        $this->addSql('ALTER TABLE printer DROP device_type_id');
        $this->addSql('ALTER TABLE monitor DROP FOREIGN KEY FK_E11599854FFA550E');
        $this->addSql('DROP INDEX IDX_E11599854FFA550E ON monitor');
        $this->addSql('ALTER TABLE monitor DROP device_type_id');
    }
}
