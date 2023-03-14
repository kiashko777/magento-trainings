<?php

    declare(strict_types=1);

    namespace MageMastery\Blog\Block\Adminhtml\Post\Edit;

    use Magento\Framework\UrlInterface;

    class GenericButton
    {
        private UrlInterface $url;

        public function __construct(
            UrlInterface $url
        )
        {
            $this->url = $url;
        }

        public function getUrl(string $route = '', array $params = []): string
        {
            return $this->url->getUrl($route, $params);
        }
    }
