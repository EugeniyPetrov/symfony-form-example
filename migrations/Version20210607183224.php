<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607183224 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Ronald V. Flores", "RonaldVFlores@rhyta.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Brandon E. Freeze", "BrandonEFreeze@armyspy.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Ron J. Vigna", "RonJVigna@jourrapide.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Darryl A. Austin", "DarrylAAustin@rhyta.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Steven Y. Stevens", "StevenYStevens@dayrep.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Randy S. Bechtold", "RandySBechtold@rhyta.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Francis E. Walker", "FrancisEWalker@jourrapide.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Carrie D. Smith", "CarrieDSmith@armyspy.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("James A. Stackhouse", "JamesAStackhouse@jourrapide.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Kendra J. Isom", "KendraJIsom@teleworm.us")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("Daniel G. Rodriquez", "DanielGRodriquez@jourrapide.com")');
        $this->addSql('INSERT INTO user (name, email) VALUES ("David C. Miller", "DavidCMiller@jourrapide.com")');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
    }
}
