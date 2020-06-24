<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\BarChartConfig;

class SalesCountColumnChartConfig extends BarChartConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = \App\Models\Sale::class;

    /**
     * Compare to previous time.
     *
     * @var boolean
     */
    public $compare = false;

    /**
     * Chart title.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Sales Count A';
    }

    // public function dailyGoal()
    // {
    //     return 10;
    // }

    /**
     * Mount.
     *
     * @param Chart $chart
     * @return void
     */
    public function mount(Chart $chart)
    {
        $chart->format('0,00');
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
     * Number that is displayed at the bottom left corner.
     *
     * @param \Illuminate\Support\Collection
     * @return integer
     */
    public function result(Collection $values): int
    {
        return $values->sum();
    }
}
