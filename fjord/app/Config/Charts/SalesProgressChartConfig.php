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
        return 'Sales Count';
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
     * Get maximum value.
     *
     * @return integer|float
     */
    public function maxValue()
    {
        return 500;
    }

    /**
     * Get minimum value.
     *
     * @return integer|float
     */
    public function minValue()
    {
        return 0;
    }
}
