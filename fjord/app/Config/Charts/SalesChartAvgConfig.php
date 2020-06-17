<?php

namespace FjordApp\Config\Charts;

use App\Models\Sale;
use Illuminate\Support\Collection;
use Fjord\Chart\Config\AreaChartConfig;

class SalesChartAvgConfig extends AreaChartConfig
{
    /**
     * Variant
     *
     * @var string
     */
    public $variant = 'secondary';

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
        return 'Average Sales Price';
    }

    /**
     * Default value.
     *
     * @param Builder $query
     * @return integer
     */
    public function value($query)
    {
        return $this->average($query, 'price');
    }

    /**
     * Get result.
     *
     * @return void
     */
    public function result(Collection $values): int
    {
        return round($values->average(), 2);
    }
}
