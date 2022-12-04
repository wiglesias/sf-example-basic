<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20221204124425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add slug in `product` and `category` table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE category ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE category DROP slug');
        $this->addSql('ALTER TABLE product DROP slug');
    }
}
