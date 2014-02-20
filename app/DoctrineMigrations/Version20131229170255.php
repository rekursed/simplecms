<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131229170255 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(300) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE menu_link (menu_id INT NOT NULL, link_id INT NOT NULL, INDEX IDX_FEE369BFCCD7E912 (menu_id), INDEX IDX_FEE369BFADA40271 (link_id), PRIMARY KEY(menu_id, link_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) DEFAULT NULL, target VARCHAR(128) DEFAULT NULL, href VARCHAR(128) DEFAULT NULL, sort INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE menu_link ADD CONSTRAINT FK_FEE369BFCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE menu_link ADD CONSTRAINT FK_FEE369BFADA40271 FOREIGN KEY (link_id) REFERENCES link (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE menu_link DROP FOREIGN KEY FK_FEE369BFCCD7E912");
        $this->addSql("ALTER TABLE menu_link DROP FOREIGN KEY FK_FEE369BFADA40271");
        $this->addSql("DROP TABLE menu");
        $this->addSql("DROP TABLE menu_link");
        $this->addSql("DROP TABLE link");
    }
}
