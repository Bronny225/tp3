<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261020110756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD numero VARCHAR(255) NOT NULL, ADD total NUMERIC(12, 2) NOT NULL, CHANGE client_id client_id INT DEFAULT NULL, CHANGE date_commande date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE ligne_commande ADD prix_unitaire NUMERIC(10, 2) NOT NULL, ADD montant NUMERIC(12, 2) NOT NULL, CHANGE commande_id commande_id INT DEFAULT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD reference VARCHAR(255) NOT NULL, ADD date DATETIME NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE prix prix NUMERIC(10, 2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE telephone telephone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande DROP numero, DROP total, CHANGE client_id client_id INT NOT NULL, CHANGE date date_commande DATETIME NOT NULL');
        $this->addSql('ALTER TABLE ligne_commande DROP prix_unitaire, DROP montant, CHANGE commande_id commande_id INT NOT NULL, CHANGE produit_id produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit DROP reference, DROP date, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL');
    }
}
