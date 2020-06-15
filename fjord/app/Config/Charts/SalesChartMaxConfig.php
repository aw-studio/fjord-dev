<?php

namespace FjordApp\Config\Charts;

use App\Models\Sale;
use Carbon\CarbonInterface;
use Fjord\Chart\ChartConfig;

class SalesChartMaxConfig extends ChartConfig
{
    /**
     * Variant
     *
     * @var string
     */
    public $variant = 'white';

    /**
     * Chart title.
     *
     * @return string
     */
    public function title()
    {
        return 'Max Sales Price';
    }

    /**
     * Select.
     *
     * @return void
     */
    public function select()
    {
        return Sale::selectRaw('SELECT MAX(price)');
    }

    /**
     * Default value.
     *
     * @param Builder $query
     * @return mixed
     */
    public function value($query)
    {
        return $query->first()->price;
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
