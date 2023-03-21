<?php

    namespace MageMastery\Blog\Controller\Adminhtml\Post;

    use MageMastery\Blog\Model\PostFactory;
    use MageMastery\Blog\Model\ResourceModel\Post as PostResource;
    use Magento\Backend\App\Action;
    use Magento\Backend\App\Action\Context;
    use Magento\Framework\App\Action\HttpPostActionInterface;
    use Magento\Framework\Controller\ResultInterface;

    class Delete extends Action implements HttpPostActionInterface
    {
        private PostResource $resource;
        private PostFactory $postFactory;

        public function __construct(
            Context      $context,
            PostResource $resource,
            PostFactory  $postFactory
        )
        {
            $this->postFactory = $postFactory;
            $this->resource = $resource;
            parent::__construct($context);
        }

        public function execute(): ResultInterface
        {
            $postId = (int)$this->getRequest()->getParam('post_id');
            $resultRedirect = $this->resultRedirectFactory->create();
            if (!$postId) {
                $this->messageManager->addErrorMessage(__('We can\'t find post to delete!'));
                return $resultRedirect->setPath('*/*/');
            }
            $model = $this->postFactory->create();
            try {
                $this->resource->load($model, $postId);
                $this->resource->delete($model);
                $this->messageManager->addSuccessMessage(__('You have deleted the post!'));
            } catch (\Throwable $exception) {
                $this->messageManager->addErrorMessage($exception->getMessage());
            }
            return $resultRedirect->setPath('*/*/');
        }
    }
