<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620125222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE options ADD annonce_id INT NOT NULL');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_D035FA878805AB2F FOREIGN KEY (annonce_id) REFERENCES annonces (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D035FA878805AB2F ON options (annonce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_D035FA878805AB2F');
        $this->addSql('DROP INDEX UNIQ_D035FA878805AB2F ON options');
        $this->addSql('ALTER TABLE options DROP annonce_id');
    }
}
