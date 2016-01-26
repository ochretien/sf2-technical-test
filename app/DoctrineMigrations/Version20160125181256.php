<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160125181256 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE git (id INT AUTO_INCREMENT NOT NULL, galerie INT DEFAULT NULL, date DATETIME NOT NULL, repositoryOwner VARCHAR(255) NOT NULL, repository VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_518E617C9E7D1590 (galerie), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE git ADD CONSTRAINT FK_518E617C9E7D1590 FOREIGN KEY (galerie) REFERENCES user (id)');
        $this->addSql('DROP TABLE comment');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, author INT NOT NULL, date DATETIME NOT NULL, repositoryOwner VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, repository VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, comment LONGTEXT NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE git');
    }
}
