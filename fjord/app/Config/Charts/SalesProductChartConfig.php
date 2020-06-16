<?php

namespace FjordApp\Config\Charts;

use App\Models\Sale;
use Fjord\Chart\Config\DonutChartConfig;

class SalesProductChartConfig extends DonutChartConfig
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
     * Value.
     *
     * @param Builder $query
     * @return array
     */
    public function value($query): array
    {
        return [
            (clone $query)->where('product', 'T-shirt')->count(),
            (clone $query)->where('product', 'Schuh')->count(),
            (clone $query)->where('product', 'Pullover')->count(),
        ];
    }

    /**
     * Labels.
     *
     * @return array
     */
    public function labels(): array
    {
        return [
            'T-shirt',
            'Schuh',
            'Pullover'
        ];
    }
}
