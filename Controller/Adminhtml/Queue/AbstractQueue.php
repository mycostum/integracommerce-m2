<?php
/**
 * BSeller Platform | B2W - Companhia Digital
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  ${MAGENTO_MODULE_NAMESPACE}
 * @package   ${MAGENTO_MODULE_NAMESPACE}_${MAGENTO_MODULE}
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br)
 *
 * Access https://ajuda.integracommerce.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace Mycostum\IntegraCommerce\Controller\Adminhtml\Queue;

use Mycostum\IntegraCommerce\Api\QueueRepositoryInterface;
use Mycostum\IntegraCommerce\Controller\Adminhtml\AbstractController;
use Magento\Backend\App\Action\Context as BackendContext;
use Mycostum\IntegraCommerce\Helper\Context as HelperContext;

abstract class AbstractQueue extends AbstractController
{
    
    /** @var QueueRepositoryInterface */
    protected $queueRepository;
    
    
    /**
     * AbstractQueue constructor.
     *
     * @param BackendContext           $context
     * @param HelperContext            $helperContext
     * @param QueueRepositoryInterface $queueRepository
     */
    public function __construct(
        BackendContext $context,
        HelperContext $helperContext,
        QueueRepositoryInterface $queueRepository
    ) {
        parent::__construct($context, $helperContext);
        $this->queueRepository = $queueRepository;
    }
}
