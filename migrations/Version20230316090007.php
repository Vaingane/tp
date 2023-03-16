<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316090007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__ts_produits AS SELECT id, manuel_id, denomination, code, date_creation, actif, descriptif, manuel FROM ts_produits');
        $this->addSql('DROP TABLE ts_produits');
        $this->addSql('CREATE TABLE ts_produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_manuel INTEGER DEFAULT NULL, denomination VARCHAR(255) DEFAULT NULL, code VARCHAR(30) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, actif BOOLEAN DEFAULT NULL, descriptif CLOB DEFAULT NULL, manuel VARCHAR(255) NOT NULL, CONSTRAINT FK_4EE620445280CE2D FOREIGN KEY (id_manuel) REFERENCES ts_manuels (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ts_produits (id, id_manuel, denomination, code, date_creation, actif, descriptif, manuel) SELECT id, manuel_id, denomination, code, date_creation, actif, descriptif, manuel FROM __temp__ts_produits');
        $this->addSql('DROP TABLE __temp__ts_produits');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4EE620445280CE2D ON ts_produits (id_manuel)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__ts_produits AS SELECT id, id_manuel, denomination, code, date_creation, actif, descriptif, manuel FROM ts_produits');
        $this->addSql('DROP TABLE ts_produits');
        $this->addSql('CREATE TABLE ts_produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, manuel_id INTEGER DEFAULT NULL, denomination VARCHAR(255) DEFAULT NULL, code VARCHAR(30) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, actif BOOLEAN DEFAULT NULL, descriptif CLOB DEFAULT NULL, manuel VARCHAR(255) NOT NULL, CONSTRAINT FK_4EE620446E20D516 FOREIGN KEY (manuel_id) REFERENCES ts_manuels (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ts_produits (id, manuel_id, denomination, code, date_creation, actif, descriptif, manuel) SELECT id, id_manuel, denomination, code, date_creation, actif, descriptif, manuel FROM __temp__ts_produits');
        $this->addSql('DROP TABLE __temp__ts_produits');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4EE620446E20D516 ON ts_produits (manuel_id)');
    }
}
