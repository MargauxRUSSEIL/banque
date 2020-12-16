<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201216102848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction ADD compte_credite_id INT NOT NULL, ADD compte_debite_id INT NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D19EB8264F FOREIGN KEY (compte_credite_id) REFERENCES compte_bancaire (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1167B0AA9 FOREIGN KEY (compte_debite_id) REFERENCES compte_bancaire (id)');
        $this->addSql('CREATE INDEX IDX_723705D19EB8264F ON transaction (compte_credite_id)');
        $this->addSql('CREATE INDEX IDX_723705D1167B0AA9 ON transaction (compte_debite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D19EB8264F');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1167B0AA9');
        $this->addSql('DROP INDEX IDX_723705D19EB8264F ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1167B0AA9 ON transaction');
        $this->addSql('ALTER TABLE transaction DROP compte_credite_id, DROP compte_debite_id');
    }
}
