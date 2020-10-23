<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20201023091707 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add accounts for users';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
            CREATE TABLE account (
                id INT AUTO_INCREMENT NOT NULL,
                user_id INT DEFAULT NULL,
                number VARCHAR(255) NOT NULL,
                balance DOUBLE PRECISION NOT NULL,
                INDEX IDX_7D3656A4A76ED395 (user_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('
            ALTER TABLE account ADD CONSTRAINT FRK_account_user_id FOREIGN KEY (user_id) REFERENCES user (id)
        ');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE IF EXISTS `account`');
    }
}
