<?php

namespace RichBrains\BehaveExtension\Service;


class JiraService
{
   
    public function __construct($host, $user, $password, $project)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->project = $project;
    }


    public function fetchIssues($timestamp = null)
    {
    }

  
    public function fetchIssue($id)
    {
    }


}
