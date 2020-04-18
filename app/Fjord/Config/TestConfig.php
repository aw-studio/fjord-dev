<?php

namespace App\Fjord\Config;

use Fjord\Configuration\Types\CrudConfig;
use Illuminate\Database\Eloquent\Builder;

class TestConfig extends CrudConfig
{
    protected function query(Builder $query)
    {
        $query->with('test');
        dump("query()");
    }
}
