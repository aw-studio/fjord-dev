<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\NumberChartConfig;

class SalesCountTotalChartConfig extends NumberChartConfig
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
        return 'Sales Count XYZ';
    }

    /**
     * Mount.
     *
     * @param Chart $chart
     * @return void
     */
    public function mount(Chart $chart)
    {
        $chart->format('0,0');
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
}
