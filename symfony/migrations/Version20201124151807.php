<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124151807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_beneficiare DROP FOREIGN KEY FK_C7A5D1B0F6054787');
        $this->addSql('CREATE TABLE beneficiaire (id INT AUTO_INCREMENT NOT NULL, compte_bancaire_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B140D802AF1E371E (compte_bancaire_id), INDEX IDX_B140D802A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE beneficiaire ADD CONSTRAINT FK_B140D802AF1E371E FOREIGN KEY (compte_bancaire_id) REFERENCES compte_bancaire (id)');
        $this->addSql('ALTER TABLE beneficiaire ADD CONSTRAINT FK_B140D802A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE beneficiare');
        $this->addSql('DROP TABLE user_beneficiare');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE beneficiare (id INT AUTO_INCREMENT NOT NULL, compte_bancaire_id INT NOT NULL, INDEX IDX_6EBE1825AF1E371E (compte_bancaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_beneficiare (user_id INT NOT NULL, beneficiare_id INT NOT NULL, INDEX IDX_C7A5D1B0A76ED395 (user_id), INDEX IDX_C7A5D1B0F6054787 (beneficiare_id), PRIMARY KEY(user_id, beneficiare_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE beneficiare ADD CONSTRAINT FK_6EBE1825AF1E371E FOREIGN KEY (compte_bancaire_id) REFERENCES compte_bancaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user_beneficiare ADD CONSTRAINT FK_C7A5D1B0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_beneficiare ADD CONSTRAINT FK_C7A5D1B0F6054787 FOREIGN KEY (beneficiare_id) REFERENCES beneficiare (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE beneficiaire');
    }
}
