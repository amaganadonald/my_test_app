<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230210033159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaire_settings (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, description LONGTEXT DEFAULT NULL, entree TIME NOT NULL, exit_break TIME NOT NULL, return_break TIME NOT NULL, exit_work TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees ADD code VARCHAR(50) NOT NULL, ADD status TINYINT(1) NOT NULL, ADD quart TINYINT(1) NOT NULL, ADD hour_package INT DEFAULT NULL, CHANGE firstname firstname VARCHAR(80) NOT NULL, CHANGE lastname lastname VARCHAR(80) NOT NULL, CHANGE register_number register_number VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE horaire_settings');
        $this->addSql('ALTER TABLE employees DROP code, DROP status, DROP quart, DROP hour_package, CHANGE firstname firstname VARCHAR(255) NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE register_number register_number VARCHAR(255) NOT NULL');
    }
}
