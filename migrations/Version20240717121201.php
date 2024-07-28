<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717121201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monitor (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, localization_id INT NOT NULL, serial_number VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, INDEX IDX_E1159985217BBB47 (person_id), INDEX IDX_E11599856A2856C7 (localization_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monitor ADD CONSTRAINT FK_E1159985217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE monitor ADD CONSTRAINT FK_E11599856A2856C7 FOREIGN KEY (localization_id) REFERENCES localization (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monitor DROP FOREIGN KEY FK_E1159985217BBB47');
        $this->addSql('ALTER TABLE monitor DROP FOREIGN KEY FK_E11599856A2856C7');
        $this->addSql('DROP TABLE monitor');
    }
}
