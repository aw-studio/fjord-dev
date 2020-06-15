<?php

namespace FjordApp\Config\Charts;

use App\Models\Sale;
use Carbon\CarbonInterface;
use Fjord\Chart\ChartConfig;

class SalesChartAvgConfig extends ChartConfig
{
    /**
     * Variant
     *
     * @var string
     */
    public $variant = 'secondary';

    /**
     * Chart title.
     *
     * @return string
     */
    public function title()
    {
        return 'Average Sales Price';
    }

    /**
     * Select.
     *
     * @return void
     */
    public function select()
    {
        return Sale::select('price');
    }

    /**
     * Default value.
     *
     * @param Builder $query
     * @return mixed
     */
    public function value($query)
    {
        return $query->average('price');
    }

    /**
     * Get result.
     *
     * @return void
     */
    public function result($values)
    {

        return round($values->average(), 2);
    }
}
