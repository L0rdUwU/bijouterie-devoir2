<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018120523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bijou DROP FOREIGN KEY FK_E4B4D7949E2EF1B5');
        $this->addSql('DROP INDEX IDX_E4B4D7949E2EF1B5 ON bijou');
        $this->addSql('ALTER TABLE bijou CHANGE description description VARCHAR(100) NOT NULL, CHANGE bijou_id categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE bijou ADD CONSTRAINT FK_E4B4D794BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_E4B4D794BCF5E72D ON bijou (categorie_id)');
        $this->addSql('ALTER TABLE client CHANGE tel_fix tel_fixe VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB64D218E');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBCEF51D20');
        $this->addSql('DROP INDEX IDX_5E9E89CBCEF51D20 ON location');
        $this->addSql('DROP INDEX IDX_5E9E89CB64D218E ON location');
        $this->addSql('ALTER TABLE location ADD bijou_id INT NOT NULL, ADD client_id INT NOT NULL, DROP location_id, DROP id_bijou_id');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB9E2EF1B5 FOREIGN KEY (bijou_id) REFERENCES bijou (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB9E2EF1B5 ON location (bijou_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB19EB6921 ON location (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB9E2EF1B5');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB19EB6921');
        $this->addSql('DROP INDEX IDX_5E9E89CB9E2EF1B5 ON location');
        $this->addSql('DROP INDEX IDX_5E9E89CB19EB6921 ON location');
        $this->addSql('ALTER TABLE location ADD location_id INT NOT NULL, ADD id_bijou_id INT NOT NULL, DROP bijou_id, DROP client_id');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB64D218E FOREIGN KEY (location_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBCEF51D20 FOREIGN KEY (id_bijou_id) REFERENCES bijou (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CBCEF51D20 ON location (id_bijou_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB64D218E ON location (location_id)');
        $this->addSql('ALTER TABLE client CHANGE tel_fixe tel_fix VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE bijou DROP FOREIGN KEY FK_E4B4D794BCF5E72D');
        $this->addSql('DROP INDEX IDX_E4B4D794BCF5E72D ON bijou');
        $this->addSql('ALTER TABLE bijou CHANGE description description VARCHAR(255) NOT NULL, CHANGE categorie_id bijou_id INT NOT NULL');
        $this->addSql('ALTER TABLE bijou ADD CONSTRAINT FK_E4B4D7949E2EF1B5 FOREIGN KEY (bijou_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_E4B4D7949E2EF1B5 ON bijou (bijou_id)');
    }
}
