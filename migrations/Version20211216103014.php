<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216103014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_EEB7D1CAED5CA9E6');
        $this->addSql('DROP INDEX IDX_EEB7D1CA19EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__report_client AS SELECT id, client_id, service_id, adresse, ville, cp, datetime, description, created_at, updated_at FROM report_client');
        $this->addSql('DROP TABLE report_client');
        $this->addSql('CREATE TABLE report_client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, service_id INTEGER DEFAULT NULL, adresse VARCHAR(255) NOT NULL COLLATE BINARY, ville VARCHAR(255) NOT NULL COLLATE BINARY, cp INTEGER NOT NULL, datetime DATETIME NOT NULL, description CLOB NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , file_path VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_EEB7D1CA19EB6921 FOREIGN KEY (client_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EEB7D1CAED5CA9E6 FOREIGN KEY (service_id) REFERENCES categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO report_client (id, client_id, service_id, adresse, ville, cp, datetime, description, created_at, updated_at) SELECT id, client_id, service_id, adresse, ville, cp, datetime, description, created_at, updated_at FROM __temp__report_client');
        $this->addSql('DROP TABLE __temp__report_client');
        $this->addSql('CREATE INDEX IDX_EEB7D1CAED5CA9E6 ON report_client (service_id)');
        $this->addSql('CREATE INDEX IDX_EEB7D1CA19EB6921 ON report_client (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_EEB7D1CA19EB6921');
        $this->addSql('DROP INDEX IDX_EEB7D1CAED5CA9E6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__report_client AS SELECT id, client_id, service_id, adresse, ville, cp, datetime, description, created_at, updated_at FROM report_client');
        $this->addSql('DROP TABLE report_client');
        $this->addSql('CREATE TABLE report_client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, service_id INTEGER DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp INTEGER NOT NULL, datetime DATETIME NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO report_client (id, client_id, service_id, adresse, ville, cp, datetime, description, created_at, updated_at) SELECT id, client_id, service_id, adresse, ville, cp, datetime, description, created_at, updated_at FROM __temp__report_client');
        $this->addSql('DROP TABLE __temp__report_client');
        $this->addSql('CREATE INDEX IDX_EEB7D1CA19EB6921 ON report_client (client_id)');
        $this->addSql('CREATE INDEX IDX_EEB7D1CAED5CA9E6 ON report_client (service_id)');
    }
}
