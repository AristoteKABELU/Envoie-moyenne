<?php 

namespace App\src;


class QueryBuilder
{
    public function __construct(private $query)
    {
        $this->query = $query;
    }
}
