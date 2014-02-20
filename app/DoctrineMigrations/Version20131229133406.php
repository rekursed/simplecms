<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131229133406 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE gallery_image (gallery_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_21A0D47C4E7AF8F (gallery_id), INDEX IDX_21A0D47C3DA5256D (image_id), PRIMARY KEY(gallery_id, image_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE gallery_image ADD CONSTRAINT FK_21A0D47C4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE gallery_image ADD CONSTRAINT FK_21A0D47C3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4E7AF8F");
        $this->addSql("DROP INDEX IDX_C53D045F4E7AF8F ON image");
        $this->addSql("ALTER TABLE image DROP gallery_id");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE gallery_image");
        $this->addSql("ALTER TABLE image ADD gallery_id INT NOT NULL");
        $this->addSql("ALTER TABLE image ADD CONSTRAINT FK_C53D045F4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)");
        $this->addSql("CREATE INDEX IDX_C53D045F4E7AF8F ON image (gallery_id)");
    }
}
