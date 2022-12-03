<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221203094533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change `product` for `id` int to string';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE product CHANGE id id CHAR(36) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE product CHANGE id id CHAR(36) NOT NULL');
    }
}
