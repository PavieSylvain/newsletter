<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112120431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mailer_planning DROP INDEX IDX_13602A8F22DB1917, ADD UNIQUE INDEX UNIQ_13602A8F22DB1917 (newsletter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mailer_planning DROP INDEX UNIQ_13602A8F22DB1917, ADD INDEX IDX_13602A8F22DB1917 (newsletter_id)');
    }
}
