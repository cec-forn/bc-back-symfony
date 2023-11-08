<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231031135046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD ironning_cost NUMERIC(5, 2) DEFAULT NULL, ADD cleaning_cost NUMERIC(5, 2) DEFAULT NULL, ADD dry_cleaning_cost NUMERIC(5, 2) DEFAULT NULL, ADD removing_stains_cost NUMERIC(5, 2) DEFAULT NULL, ADD special_cleaning_cost NUMERIC(5, 2) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `product` DROP ironning_cost, DROP cleaning_cost, DROP dry_cleaning_cost, DROP removing_stains_cost, DROP special_cleaning_cost');
    }
}
