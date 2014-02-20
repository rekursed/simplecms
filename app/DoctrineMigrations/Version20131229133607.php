<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131229133607 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP INDEX UNIQ_C53D045F989D9B62 ON image");
        $this->addSql("ALTER TABLE image DROP title, DROP slug, CHANGE name name TINYTEXT DEFAULT NULL, CHANGE body body LONGTEXT DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE image ADD title LONGTEXT NOT NULL, ADD slug VARCHAR(128) DEFAULT NULL, CHANGE name name LONGTEXT NOT NULL, CHANGE body body LONGTEXT NOT NULL");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_C53D045F989D9B62 ON image (slug)");
    }
}
