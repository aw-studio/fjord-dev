<?php

namespace FjordApp\Config\Charts;

use App\Models\Sale;
use Fjord\Chart\ChartConfig;
use Fjord\Chart\Config\AreaChartConfig;

class SalesChartCountConfig extends AreaChartConfig
{
    /**
     * Variant
     *
     * @var string
     */
    public $variant = 'primary';

    /**
     * Model class.
     *
     * @var string
     */
    public $model = Sale::class;

    /**
     * Chart title.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Sales Count F';
    }

    public function dailyGoal()
    {
        return 30;
    }

    /**
     * Default value.
     *
     * @param Builder $query
     * @return mixed
     */
    public function value($query)
    {
        return $this->count($query);
    }

    /**
     * Get result.
     *
     * @return void
     */
    public function result($values): int
    {
        return $values->sum();
    }
}
