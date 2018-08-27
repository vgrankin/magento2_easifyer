<?php
/**
 *  @author Phpcoder
 *  @copyright Copyright (c) 2018 Phpcoder (https://github.com/vgrankin)
 *  @package Phpcoder_Easifyer
 */

namespace Phpcoder\Easifyer\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Phpcoder\Easifyer\Setup
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * Install new columns to quote_address, sales_order and  table
     *
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $quoteTable = $installer->getTable('quote');
        $salesOrderTable = $installer->getTable('sales_order');
        $salesOrderGridTable = $installer->getTable('sales_order_grid');

        $columns = [
            'external_order_id_field' => [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length'=> 40,
                'nullable' => true,
                'comment' => 'External Order ID',
            ],
            // add more columns here if needed
        ];

        $connection = $installer->getConnection();
        foreach ($columns as $columnName => $columnProperties) {
            $connection->addColumn($quoteTable, $columnName, $columnProperties);
            $connection->addColumn($salesOrderTable, $columnName, $columnProperties);
            $connection->addColumn($salesOrderGridTable, $columnName, $columnProperties);
        }
        $installer->endSetup();
    }
}