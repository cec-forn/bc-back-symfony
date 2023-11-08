<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011124921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresses (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, zipcode INT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresses_user (adresses_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_CF98122985E14726 (adresses_id), INDEX IDX_CF981229A76ED395 (user_id), PRIMARY KEY(adresses_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, users_id_id INT NOT NULL, quantity INT NOT NULL, UNIQUE INDEX UNIQ_BA388B798333A1E (users_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, drop_time DATETIME NOT NULL, pick_up_time DATETIME NOT NULL, UNIQUE INDEX UNIQ_3781EC109D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, discount_code VARCHAR(255) DEFAULT NULL, payment_method VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, descritpion LONGTEXT NOT NULL, state VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_service (product_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_304481624584665A (product_id), INDEX IDX_30448162ED5CA9E6 (service_id), PRIMARY KEY(product_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresses_user ADD CONSTRAINT FK_CF98122985E14726 FOREIGN KEY (adresses_id) REFERENCES adresses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adresses_user ADD CONSTRAINT FK_CF981229A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B798333A1E FOREIGN KEY (users_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC109D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE product_service ADD CONSTRAINT FK_304481624584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_service ADD CONSTRAINT FK_30448162ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD genre VARCHAR(255) DEFAULT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD birthdate DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresses_user DROP FOREIGN KEY FK_CF98122985E14726');
        $this->addSql('ALTER TABLE adresses_user DROP FOREIGN KEY FK_CF981229A76ED395');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B798333A1E');
        $this->addSql('ALTER TABLE delivery DROP FOREIGN KEY FK_3781EC109D86650F');
        $this->addSql('ALTER TABLE product_service DROP FOREIGN KEY FK_304481624584665A');
        $this->addSql('ALTER TABLE product_service DROP FOREIGN KEY FK_30448162ED5CA9E6');
        $this->addSql('DROP TABLE adresses');
        $this->addSql('DROP TABLE adresses_user');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_service');
        $this->addSql('DROP TABLE service');
        $this->addSql('ALTER TABLE `user` DROP genre, DROP lastname, DROP firstname, DROP birthdate');
    }
}
