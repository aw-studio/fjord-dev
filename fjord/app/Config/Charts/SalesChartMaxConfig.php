<?php

namespace FjordApp\Config\Charts;

use App\Models\Sale;
use Fjord\Chart\Config\AreaChartConfig;

class SalesChartMaxConfig extends AreaChartConfig
{
    /**
     * Variant
     *
     * @var string
     */
    public $variant = 'white';

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
        return 'Max Sales Price';
    }

    /**
     * Default value.
     *
     * @param Builder $query
     * @return mixed
     */
    public function value($query): int
    {
        return $query->first()->price ?? 0;
    }

    /**
     * Get result.
     *
     * @return void
     */
    public function result($values): int
    {
        return round($values->average(), 2);
    }
}
