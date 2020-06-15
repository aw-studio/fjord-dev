<?php

namespace FjordApp\Config\Charts;

use App\Models\Sale;
use Fjord\Chart\ChartConfig;

class SalesChartCountConfig extends ChartConfig
{
    /**
     * Variant
     *
     * @var string
     */
    public $variant = 'primary';

    /**
     * Chart title.
     *
     * @return string
     */
    public function title()
    {
        return 'Sales Count';
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
        return $query->count();
    }

    /**
     * Get result.
     *
     * @return void
     */
    public function result($values)
    {
        return $values->sum();
    }
}
