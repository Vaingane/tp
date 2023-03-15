<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315090843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sb_critiques AS SELECT id, note, avis FROM sb_critiques');
        $this->addSql('DROP TABLE sb_critiques');
        $this->addSql('CREATE TABLE sb_critiques (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, film_id INTEGER NOT NULL, note INTEGER DEFAULT NULL --entre 0 et 5
        , avis CLOB NOT NULL, CONSTRAINT FK_A9BDCD20567F5183 FOREIGN KEY (film_id) REFERENCES sb_films (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sb_critiques (id, note, avis) SELECT id, note, avis FROM __temp__sb_critiques');
        $this->addSql('DROP TABLE __temp__sb_critiques');
        $this->addSql('CREATE INDEX IDX_A9BDCD20567F5183 ON sb_critiques (film_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sb_critiques AS SELECT id, note, avis FROM sb_critiques');
        $this->addSql('DROP TABLE sb_critiques');
        $this->addSql('CREATE TABLE sb_critiques (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, note INTEGER DEFAULT NULL --entre 0 et 5
        , avis CLOB NOT NULL)');
        $this->addSql('INSERT INTO sb_critiques (id, note, avis) SELECT id, note, avis FROM __temp__sb_critiques');
        $this->addSql('DROP TABLE __temp__sb_critiques');
    }
}
