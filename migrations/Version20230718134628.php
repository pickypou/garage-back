<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718134628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces CHANGE img_une img_une LONGBLOB NOT NULL, CHANGE img_deux img_deux LONGBLOB NOT NULL, CHANGE img_trois img_trois LONGBLOB NOT NULL, CHANGE img_quatre img_quatre LONGBLOB NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces CHANGE img_une img_une VARCHAR(255) NOT NULL, CHANGE img_deux img_deux VARCHAR(255) NOT NULL, CHANGE img_trois img_trois VARCHAR(255) NOT NULL, CHANGE img_quatre img_quatre VARCHAR(255) NOT NULL');
    }
}
