<?php

    declare(strict_types=1);

    namespace MageMastery\Blog\Controller\Index;

    use Magento\Framework\App\Action\HttpGetActionInterface;
    use Magento\Framework\Controller\ResultInterface;
    use Magento\Framework\View\Result\PageFactory;

    class Index implements HttpGetActionInterface
    {
        private PageFactory $pageFactory;

        public function __construct(PageFactory $pageFactory)
        {
            $this->pageFactory = $pageFactory;
        }

        public function execute(): ResultInterface
        {
            $page = $this->pageFactory->create();
            $page->getConfig()->getTitle()->set(__('Blog'));

            return $page;
        }
    }
