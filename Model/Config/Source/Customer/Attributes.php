<?php
/**
 * IntegraCommerce Platform | B2W - Companhia Digital
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  IntegraCommerce
 * @package   Mycostum_IntegraCommerce
 *
 * @copyright Copyright (c) 2018 B2W Digital - IntegraCommerce Platform.
 *
 * Access https://ajuda.integracommerce.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace Mycostum\IntegraCommerce\Model\Config\Source\Customer;

use Mycostum\IntegraCommerce\Model\Config\Source\AbstractSource;
use Magento\Catalog\Api\ProductAttributeRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaFactory;

class Attributes extends AbstractSource
{
    
    /** @var ProductAttributeRepositoryInterface */
    protected $productAttributeRepository;

    /** @var $searchCriteriaFactory */
    protected $searchCriteriaFactory;

    /** @var \Mycostum\IntegraCommerce\Helper\Catalog\Product\Attribute */
    protected $attributeHelper;

    
    /**
     * Attributes constructor.
     *
     * @param \Mycostum\IntegraCommerce\Helper\Catalog\Product\Attribute $attributeHelper
     * @param ProductAttributeRepositoryInterface               $productAttributeRepository
     * @param SearchCriteriaFactory                             $searchCriteriaFactory
     */
    public function __construct(
        \Mycostum\IntegraCommerce\Helper\Catalog\Product\Attribute $attributeHelper,
        ProductAttributeRepositoryInterface $productAttributeRepository,
        SearchCriteriaFactory $searchCriteriaFactory
    )
    {
        $this->productAttributeRepository = $productAttributeRepository;
        $this->searchCriteriaFactory      = $searchCriteriaFactory;
        $this->attributeHelper            = $attributeHelper;
    }


    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [10=>'Teste Att'];

        $attributes     = [];
        $searchCriteria = $this->searchCriteriaFactory->create();
        $result         = $this->productAttributeRepository->getList($searchCriteria);
        
        /** @var \Magento\Catalog\Model\ResourceModel\Eav\Attribute $attribute */
        foreach ($result->getItems() as $attribute) {
            if ($this->attributeHelper->isAttributeCodeInBlacklist($attribute->getAttributeCode())) {
                continue;
            }

            $attributes[$attribute->getId()] = $attribute->getName();
        }
        
        return $attributes;
    }
}
