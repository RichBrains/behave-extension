<?php

namespace RichBrains\BehaveExtension\Service;

use Behat\Gherkin\Node\FeatureNode,
    Behat\Gherkin\Parser;

class FeatureLoaderService
{
    private $jiraService;
    private $gherkinParser;
    private $featureField;

    public function __construct($jiraService, $gherkinParser, $featureField)
    {
        $this->jiraService = $jiraService;
        $this->gherkinParser = $gherkinParser;
        $this->featureField = $featureField;
    }

    private function getIssue($resource)
    {
        if (strncmp($resource, 'jira:', 5) === 0) {
            return substr($resource, 5);
        }

        return $this->jiraService->getIssue($resource);
    }

    private function parseFeature($issue)
    {
        $body = $this->getFeature($issue);
        $feature = $this->gherkinParser->parse($body, $url);
        return $feature;
    }

    public function load($resource)
    {
        if ($issue = $this->getIssue($resource)) {
            return $this->parseFeature($issue);
        }

        return array();
    }
}
