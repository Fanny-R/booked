<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190416111820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Save format as a string instead of an entity';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331D629F605');
        $this->addSql('DROP TABLE format');
        $this->addSql('DROP INDEX IDX_CBE5A331D629F605 ON book');
        $this->addSql('ALTER TABLE book ADD format VARCHAR(255) NOT NULL, DROP format_id');
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE format (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE book ADD format_id INT NOT NULL, DROP format');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331D629F605 FOREIGN KEY (format_id) REFERENCES format (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CBE5A331D629F605 ON book (format_id)');
    }
}
