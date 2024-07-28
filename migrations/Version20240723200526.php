<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240723200526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mouse_and_keyboard DROP FOREIGN KEY FK_706299FF217BBB47');
        $this->addSql('DROP INDEX IDX_706299FF217BBB47 ON mouse_and_keyboard');
        $this->addSql('ALTER TABLE mouse_and_keyboard CHANGE person_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE mouse_and_keyboard ADD CONSTRAINT FK_706299FFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_706299FFA76ED395 ON mouse_and_keyboard (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mouse_and_keyboard DROP FOREIGN KEY FK_706299FFA76ED395');
        $this->addSql('DROP INDEX IDX_706299FFA76ED395 ON mouse_and_keyboard');
        $this->addSql('ALTER TABLE mouse_and_keyboard CHANGE user_id person_id INT NOT NULL');
        $this->addSql('ALTER TABLE mouse_and_keyboard ADD CONSTRAINT FK_706299FF217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_706299FF217BBB47 ON mouse_and_keyboard (person_id)');
    }
}
