<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202232014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add indexes in `product` for `sku` and `price`';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX IDX_product_sku ON product (sku)');
        $this->addSql('CREATE INDEX IDX_product_price ON product (price)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX IDX_product_sku ON product');
        $this->addSql('DROP INDEX IDX_product_price ON product');
    }
}
