<?php

namespace RichBrains\BehaveExtension\Gherkin\Loader;

use Behat\Gherkin\Loader\AbstractFileLoader;

use RichBrains\BehaveExtension\Service\FeatureLoaderService;

class Loader extends AbstractFileLoader
{
    private $featureLoaderService;

    public function __construct($featureLoaderService)
    {
        $this->featureLoaderService = $featureLoaderService;
    }

    public function supports($resource)
    {
        return $this->featureLoaderService->supports($resource);
    }

    public function load($resource)
    {
        return $this->featureLoaderService->load($resource);
    }
}
