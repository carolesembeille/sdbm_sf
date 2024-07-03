<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240702150003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom_marque_id INT NOT NULL, fabricant_id INT NOT NULL, INDEX IDX_5A6F91CEDCD6C8F3 (nom_marque_id), INDEX IDX_5A6F91CECBAAAAB3 (fabricant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CEDCD6C8F3 FOREIGN KEY (nom_marque_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CECBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CEDCD6C8F3');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CECBAAAAB3');
        $this->addSql('DROP TABLE marque');
    }
}
