<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706122442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonces (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, mileage VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, fuel VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, annonce_id INT NOT NULL, img_une VARCHAR(255) NOT NULL, img_deux VARCHAR(255) NOT NULL, img_trois VARCHAR(255) NOT NULL, img_quatre VARCHAR(255) NOT NULL, img_cinq VARCHAR(255) NOT NULL, img_six VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E01FBE6A8805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, annonce_id INT NOT NULL, gps VARCHAR(255) NOT NULL, regulateur VARCHAR(255) NOT NULL, limitateur VARCHAR(255) NOT NULL, clim VARCHAR(255) NOT NULL, sfu VARCHAR(255) NOT NULL, sac VARCHAR(255) NOT NULL, bluetooth VARCHAR(255) NOT NULL, camera VARCHAR(255) NOT NULL, sas VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D035FA878805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonces (id)');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_D035FA878805AB2F FOREIGN KEY (annonce_id) REFERENCES annonces (id)');
        $this->addSql('ALTER TABLE user CHANGE fristname firstname VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A8805AB2F');
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_D035FA878805AB2F');
        $this->addSql('DROP TABLE annonces');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE options');
        $this->addSql('ALTER TABLE `user` CHANGE firstname fristname VARCHAR(255) NOT NULL');
    }
}
