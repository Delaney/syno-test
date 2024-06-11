<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240611001832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panelists (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, receive_newsletters TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_475FB6B7E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panelists_surveys (panelist_id INT NOT NULL, survey_id INT NOT NULL, INDEX IDX_537D54857E8B14D (panelist_id), INDEX IDX_537D5485B3FE509D (survey_id), PRIMARY KEY(panelist_id, survey_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE surveys (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panelists_surveys ADD CONSTRAINT FK_537D54857E8B14D FOREIGN KEY (panelist_id) REFERENCES panelists (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panelists_surveys ADD CONSTRAINT FK_537D5485B3FE509D FOREIGN KEY (survey_id) REFERENCES surveys (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panelists_surveys DROP FOREIGN KEY FK_537D54857E8B14D');
        $this->addSql('ALTER TABLE panelists_surveys DROP FOREIGN KEY FK_537D5485B3FE509D');
        $this->addSql('DROP TABLE panelists');
        $this->addSql('DROP TABLE panelists_surveys');
        $this->addSql('DROP TABLE surveys');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
