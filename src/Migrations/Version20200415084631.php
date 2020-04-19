<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200415084631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, nip INT DEFAULT NULL, regon INT DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, building VARCHAR(255) DEFAULT NULL, floor VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, is_company TINYINT(1) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, short_company_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, is_contact_adrees TINYINT(1) DEFAULT NULL, contact_street VARCHAR(255) DEFAULT NULL, contact_building VARCHAR(255) DEFAULT NULL, contact_flat_number VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, contact_country VARCHAR(255) DEFAULT NULL, contact_city VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, second_phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE customer');
    }
}
