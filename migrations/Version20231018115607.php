<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018115607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE tel_fixe tel_fix VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE location ADD id_bijou_id INT NOT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB64D218E FOREIGN KEY (location_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBCEF51D20 FOREIGN KEY (id_bijou_id) REFERENCES bijou (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CBCEF51D20 ON location (id_bijou_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB64D218E');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBCEF51D20');
        $this->addSql('DROP INDEX IDX_5E9E89CBCEF51D20 ON location');
        $this->addSql('ALTER TABLE location DROP id_bijou_id');
        $this->addSql('ALTER TABLE client CHANGE tel_fix tel_fixe VARCHAR(50) NOT NULL');
    }
}
