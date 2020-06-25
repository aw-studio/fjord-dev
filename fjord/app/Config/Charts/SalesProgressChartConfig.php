<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\ProgressChartConfig;

class SalesProgressChartConfig extends ProgressChartConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = \App\Models\Sale::class;

    /**
     * Chart title.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Sales Count C';
    }

    /**
     * Calculate value.
     *
     * @param Builder $query
     * @return integer
     */
    public function value($query)
    {
        return $this->count($query);
    }

    /**
     * Get goal value.
     *
     * @return integer|float
     */
    public function goal()
    {
        return 200;
    }

    /**
     * Get start value.
     *
     * @return integer|float
     */
    public function start()
    {
        return 0;
    }
}
