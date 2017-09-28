<?php
namespace JRB\CreateAttribute\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
 
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        
        //product attribute
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'custom_product_attribute',
			[
				'type' => 'int',
				'backend' => '',
				'frontend' => '',
				'label' => 'Custom Prodct Atrribute',
				'input' => '',
				'class' => '',
				'source' => '',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => true,
				'user_defined' => false,
				'default' => '',
				'searchable' => false,
				'filterable' => false,
				'comparable' => false,
				'visible_on_front' => false,
				'used_in_product_listing' => true,
				'unique' => false,
				'apply_to' => ''
			]
		);
        
        //category attribute
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'custom_category_attribute',
            [
                'type' => 'textarea',
                'label' => 'Custom category attribute',
                'input' => 'text',
                'required' => false,
                'sort_order' => 4,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'wysiwyg_enabled' => true,
                'is_html_allowed_on_front' => true,
                'group' => 'General Information',
            ]
        );
        
        //customer attribute
        $eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'custom_customer_attribute',
			[
				'type' => 'int',
				'label' => 'Custom Customer Attribute',
				'input' => 'select',
				'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
				'required' => true,
				'default' => '0',
				'sort_order' => 100,
				'system' => false,
				'position' => 100
			]
		);
	}
 
}
