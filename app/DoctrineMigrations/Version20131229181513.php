<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131229181513 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE category CHANGE name name VARCHAR(228) NOT NULL");
        $this->addSql("ALTER TABLE page DROP name, CHANGE title title VARCHAR(800) NOT NULL");
        $this->addSql("ALTER TABLE blog_post CHANGE title title VARCHAR(800) NOT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE blog_post CHANGE title title LONGTEXT NOT NULL");
        $this->addSql("ALTER TABLE category CHANGE name name LONGTEXT NOT NULL");
        $this->addSql("ALTER TABLE page ADD name LONGTEXT NOT NULL, CHANGE title title LONGTEXT NOT NULL");
    }
}
