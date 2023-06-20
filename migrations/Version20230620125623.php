<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620125623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD annonce_id INT NOT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonces (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A8805AB2F ON images (annonce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A8805AB2F');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A8805AB2F ON images');
        $this->addSql('ALTER TABLE images DROP annonce_id');
    }
}
