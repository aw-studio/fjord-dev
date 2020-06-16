<?php

namespace FjordApp\Config\Charts;

use Fjord\Chart\Chart;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\AreaChartConfig;

class TestConfig extends AreaChartConfig
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

    public function mount(Chart $chart)
    {
        $chart->currency('€');
    }

    /**
     * Default value.
     *
     * @param Builder $query
     * @return mixed
     */
    public function value($query): int
    {
        return $query->count();
    }

    /**
     * Number that is displayed at the bottom left corner.
     *
     * @return void
     */
    public function result(Collection $values): int
    {
        return $values->sum();
    }
}
