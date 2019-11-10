<?php

namespace Nickescobedo\Microbilt\Resources;

trait EmailSearch
{
    public function emailSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'EmailSearch', $parameters);
    }
}
