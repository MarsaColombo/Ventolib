<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905085237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE consultation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE consultation (id INT NOT NULL, animal_id INT NOT NULL, last_date DATE NOT NULL, reasons VARCHAR(255) NOT NULL, diagnosis VARCHAR(255) NOT NULL, treatment VARCHAR(255) NOT NULL, created_at DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_964685A68E962C16 ON consultation (animal_id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A68E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE consultation_id_seq CASCADE');
        $this->addSql('ALTER TABLE consultation DROP CONSTRAINT FK_964685A68E962C16');
        $this->addSql('DROP TABLE consultation');
    }
}
