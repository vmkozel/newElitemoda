<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191110194316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_tag ADD prod_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_tag ADD CONSTRAINT FK_E3A6E39C1C83F75 FOREIGN KEY (prod_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_E3A6E39C1C83F75 ON product_tag (prod_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_tag DROP FOREIGN KEY FK_E3A6E39C1C83F75');
        $this->addSql('DROP INDEX IDX_E3A6E39C1C83F75 ON product_tag');
        $this->addSql('ALTER TABLE product_tag DROP prod_id');
    }
}
