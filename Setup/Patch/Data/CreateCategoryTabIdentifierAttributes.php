<?php

namespace BED\TechnicalTest\Setup\Patch\Data;

use Magento\Catalog\Model\Category;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class CreateCategoryTabIdentifierAttributes implements DataPatchInterface, PatchRevertableInterface
{
    /** @var CategorySetupFactory */
    private $categorySetupFactory;

    /** @var ModuleDataSetupInterface */
    private $moduleDataSetup;

    /**
     * @param CategorySetupFactory $categorySetupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        CategorySetupFactory $categorySetupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->categorySetupFactory = $categorySetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        /** @var CategorySetup $categorySetup */
        $categorySetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);

        $categorySetup->addAttribute(
            Category::ENTITY,
            'category_tab_identifier_1',
            [
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'type' => 'varchar',
                'label' => 'Category Tab Identifier 1',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'sort_order' => 10,
                'group' => 'Category Tabs',
                'default' => 'Content for tab identifier 1'
            ]
        );

        $categorySetup->addAttribute(
            Category::ENTITY,
            'category_tab_identifier_2',
            [
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'type' => 'varchar',
                'label' => 'Category Tab Identifier 2',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'sort_order' => 20,
                'group' => 'Category Tabs',
                'default' => 'Content for tab identifier 2'
            ]
        );

        $categorySetup->addAttribute(
            Category::ENTITY,
            'category_tab_identifier_3',
            [
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'type' => 'varchar',
                'label' => 'Category Tab Identifier 3',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'sort_order' => 30,
                'group' => 'Category Tabs',
                'default' => 'Content for tab identifier 3'
            ]
        );

        $categorySetup->addAttribute(
            Category::ENTITY,
            'category_tab_identifier_4',
            [
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'type' => 'varchar',
                'label' => 'Category Tab Identifier 4',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'sort_order' => 40,
                'group' => 'Category Tabs',
                'default' => 'Content for tab identifier 4'
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function revert()
    {
        /** @var CategorySetup $categorySetup */
        $categorySetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);

        $categorySetup->removeAttribute(
            Category::ENTITY,
            'category_tab_identifier_1'
        );

        $categorySetup->removeAttribute(
            Category::ENTITY,
            'category_tab_identifier_2'
        );

        $categorySetup->removeAttribute(
            Category::ENTITY,
            'category_tab_identifier_3'
        );
    }
}
