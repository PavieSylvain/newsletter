<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027102451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adress (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_5CECC7BEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE civility (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE management (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, dsecription VARCHAR(255) NOT NULL, INDEX IDX_B4E954FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsorship (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_C0F10CD4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_profile (user_id INT NOT NULL, profile_id INT NOT NULL, INDEX IDX_D95AB405A76ED395 (user_id), INDEX IDX_D95AB405CCFA12B8 (profile_id), PRIMARY KEY(user_id, profile_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_agency (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_1592DDDBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_platform (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_D9DF34CBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adress ADD CONSTRAINT FK_5CECC7BEA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE management ADD CONSTRAINT FK_B4E954FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE sponsorship ADD CONSTRAINT FK_C0F10CD4A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_agency ADD CONSTRAINT FK_1592DDDBA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_platform ADD CONSTRAINT FK_D9DF34CBA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user ADD author_id INT DEFAULT NULL, ADD level_id INT DEFAULT NULL, ADD civility_id INT NOT NULL, ADD histories_id INT NOT NULL, ADD firstname VARCHAR(255) DEFAULT NULL, ADD lastname VARCHAR(255) DEFAULT NULL, ADD cellphone VARCHAR(255) DEFAULT NULL, ADD email_sponsorship VARCHAR(255) DEFAULT NULL, ADD born_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD real_estate_projects VARCHAR(255) DEFAULT NULL, ADD bank_details LONGTEXT DEFAULT NULL, ADD description VARCHAR(255) DEFAULT NULL, ADD is_pickable TINYINT(1) NOT NULL, ADD is_pickable_validated TINYINT(1) NOT NULL, ADD has_newsletter TINYINT(1) NOT NULL, ADD siret VARCHAR(255) DEFAULT NULL, ADD has_waiver TINYINT(1) NOT NULL, ADD status VARCHAR(255) DEFAULT NULL, ADD is_active TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64923D6A298 FOREIGN KEY (civility_id) REFERENCES civility (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64922BC1E8C FOREIGN KEY (histories_id) REFERENCES history (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F675F31B ON user (author_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6495FB14BA7 ON user (level_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64923D6A298 ON user (civility_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64922BC1E8C ON user (histories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64923D6A298');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64922BC1E8C');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6495FB14BA7');
        $this->addSql('ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB405CCFA12B8');
        $this->addSql('DROP TABLE adress');
        $this->addSql('DROP TABLE civility');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE management');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE sponsorship');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE user_agency');
        $this->addSql('DROP TABLE user_platform');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649F675F31B');
        $this->addSql('DROP INDEX IDX_8D93D649F675F31B ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D6495FB14BA7 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D64923D6A298 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D64922BC1E8C ON `user`');
        $this->addSql('ALTER TABLE `user` DROP author_id, DROP level_id, DROP civility_id, DROP histories_id, DROP firstname, DROP lastname, DROP cellphone, DROP email_sponsorship, DROP born_at, DROP real_estate_projects, DROP bank_details, DROP description, DROP is_pickable, DROP is_pickable_validated, DROP has_newsletter, DROP siret, DROP has_waiver, DROP status, DROP is_active, DROP created_at, DROP updated_at');
    }
}
