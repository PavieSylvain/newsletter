<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211028102150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE civility DROP description');
        $this->addSql('ALTER TABLE news_letter ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE news_letter ADD CONSTRAINT FK_2AB2D7EF675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_2AB2D7EF675F31B ON news_letter (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE civility ADD description VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE news_letter DROP FOREIGN KEY FK_2AB2D7EF675F31B');
        $this->addSql('DROP INDEX IDX_2AB2D7EF675F31B ON news_letter');
        $this->addSql('ALTER TABLE news_letter DROP author_id');
    }
}
