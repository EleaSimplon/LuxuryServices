<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531141154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, offer_id INT DEFAULT NULL, applied_at DATETIME NOT NULL, INDEX IDX_A45BDDC153C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application_user (application_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7A7FBEC13E030ACD (application_id), INDEX IDX_7A7FBEC1A76ED395 (user_id), PRIMARY KEY(application_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, info_admin_client_id INT DEFAULT NULL, society_name VARCHAR(255) NOT NULL, name_contact VARCHAR(255) NOT NULL, mail_contact VARCHAR(255) NOT NULL, phone_number_contact INT NOT NULL, created_at DATETIME NOT NULL, activity_type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C74404551A30DA6A (info_admin_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, experience VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_admin_candidat (id INT AUTO_INCREMENT NOT NULL, notes LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME NOT NULL, files VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_admin_client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, post_occupied VARCHAR(255) NOT NULL, num_contact INT NOT NULL, mail_contact VARCHAR(255) NOT NULL, notes LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, type_id INT NOT NULL, client_id INT NOT NULL, title_job VARCHAR(255) NOT NULL, is_visible TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, expired_at DATETIME NOT NULL, salary INT NOT NULL, location VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_288A3A4E12469DE2 (category_id), INDEX IDX_288A3A4EC54C8C93 (type_id), INDEX IDX_288A3A4E19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, experience_id INT NOT NULL, category_id INT NOT NULL, info_admin_candidat_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, passport VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, search_location VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, birth_location VARCHAR(255) NOT NULL, is_available TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64946E90E27 (experience_id), INDEX IDX_8D93D64912469DE2 (category_id), UNIQUE INDEX UNIQ_8D93D64949359CA1 (info_admin_candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC153C674EE FOREIGN KEY (offer_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE application_user ADD CONSTRAINT FK_7A7FBEC13E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application_user ADD CONSTRAINT FK_7A7FBEC1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404551A30DA6A FOREIGN KEY (info_admin_client_id) REFERENCES info_admin_client (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E12469DE2 FOREIGN KEY (category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EC54C8C93 FOREIGN KEY (type_id) REFERENCES job_type (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64946E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64912469DE2 FOREIGN KEY (category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64949359CA1 FOREIGN KEY (info_admin_candidat_id) REFERENCES info_admin_candidat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application_user DROP FOREIGN KEY FK_7A7FBEC13E030ACD');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E19EB6921');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64946E90E27');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64949359CA1');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404551A30DA6A');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E12469DE2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64912469DE2');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC153C674EE');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4EC54C8C93');
        $this->addSql('ALTER TABLE application_user DROP FOREIGN KEY FK_7A7FBEC1A76ED395');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE application_user');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE info_admin_candidat');
        $this->addSql('DROP TABLE info_admin_client');
        $this->addSql('DROP TABLE job_category');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE job_type');
        $this->addSql('DROP TABLE user');
    }
}
