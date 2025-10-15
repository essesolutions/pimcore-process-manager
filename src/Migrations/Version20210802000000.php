<?php

/**
 * Created by valantic CX Austria GmbH
 *
 */

namespace Elements\Bundle\ProcessManagerBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Elements\Bundle\ProcessManagerBundle\ElementsProcessManagerBundle;
use Pimcore\Migrations\BundleAwareMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210802000000 extends BundleAwareMigration
{
    protected function getBundleName(): string
    {
        return ElementsProcessManagerBundle::BUNDLE_NAME;
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $configurationTable = $schema->getTable('bundle_process_manager_configuration');

        if ($configurationTable->hasColumn('id')) {
            $this->addSql('ALTER TABLE `bundle_process_manager_configuration` MODIFY COLUMN `id` varchar(190)');
        }

        if (!$configurationTable->hasIndex('id')) {
            $this->addSql('ALTER TABLE `bundle_process_manager_configuration` ADD UNIQUE INDEX `id` (`id`)');
        }

        if ($configurationTable->hasColumn('id')) {
            $this->addSql('ALTER TABLE `bundle_process_manager_configuration` DROP PRIMARY KEY');
            $this->addSql('ALTER TABLE `bundle_process_manager_configuration` ADD PRIMARY KEY (`id`)');
        }

        if ($configurationTable->hasIndex('name')) {
            $this->addSql('ALTER TABLE `bundle_process_manager_configuration` DROP KEY `name`');
        }

        $monitoringItemTable = $schema->getTable('bundle_process_manager_monitoring_item');
        if ($monitoringItemTable->hasColumn('configurationId')) {
            $this->addSql('ALTER TABLE `bundle_process_manager_monitoring_item` MODIFY COLUMN `configurationId` varchar(190)');
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
    }

}
