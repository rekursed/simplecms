<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131231153505 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE site ADD email_name VARCHAR(100) DEFAULT NULL, CHANGE slogan slogan VARCHAR(300) DEFAULT NULL, CHANGE meta_copyright meta_copyright VARCHAR(100) DEFAULT NULL, CHANGE meta_application meta_application VARCHAR(100) DEFAULT NULL, CHANGE facebook_title facebook_title VARCHAR(300) DEFAULT NULL, CHANGE facebook_type facebook_type VARCHAR(100) DEFAULT NULL, CHANGE facebook_image facebook_image VARCHAR(200) DEFAULT NULL, CHANGE facebook_url facebook_url VARCHAR(300) DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE site DROP email_name, CHANGE slogan slogan LONGTEXT DEFAULT NULL, CHANGE meta_copyright meta_copyright LONGTEXT DEFAULT NULL, CHANGE meta_application meta_application LONGTEXT DEFAULT NULL, CHANGE facebook_title facebook_title LONGTEXT DEFAULT NULL, CHANGE facebook_type facebook_type LONGTEXT DEFAULT NULL, CHANGE facebook_image facebook_image LONGTEXT DEFAULT NULL, CHANGE facebook_url facebook_url LONGTEXT DEFAULT NULL");
    }
}
