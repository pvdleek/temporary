<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20201023092658 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add transactions to accounts';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
            CREATE TABLE `transaction` (
                id INT AUTO_INCREMENT NOT NULL,
                account_id INT DEFAULT NULL,
                timestamp DATETIME NOT NULL,
                mutation DOUBLE PRECISION NOT NULL,
                INDEX IDX_723705D19B6B5FBA (account_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('
            ALTER TABLE transaction ADD CONSTRAINT FRK_account_account_id
            FOREIGN KEY (account_id) REFERENCES account (id)
        ');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE IF EXISTS `transaction`');
    }
}
