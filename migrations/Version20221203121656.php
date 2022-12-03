<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221203121656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change `product.price` to integer';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE product CHANGE price price INT NOT NULL');
		$this->addSql('UPDATE product SET price = price * 100');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE product CHANGE price price DOUBLE PRECISION NOT NULL');
    }
}
