<?php

    namespace MageMastery\Blog\ViewModel;

    use Magento\Framework\UrlInterface;
    use Magento\Framework\View\Element\Block\ArgumentInterface;
    use MageMastery\Blog\Model\Post;

    class PostViewModel implements ArgumentInterface
    {
        private UrlInterface $url;

        public function __construct(UrlInterface $url)
        {
            $this->url = $url;
        }

        public function getPostUrl(Post $post): string
        {
            return $this->url->getBaseUrl() . 'blog/' . $post->getData('url_key');
        }
    }
