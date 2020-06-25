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

    public $compare = true;

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
            $this->count((clone $query)->where('product', 'T-shirt')),
            $this->count((clone $query)->where('product', 'Schuh')),
            $this->count((clone $query)->where('product', 'Pullover')),
            $this->count((clone $query)->where('product', 'T-shirt')),
            $this->count((clone $query)->where('product', 'Schuh')),
            $this->count((clone $query)->where('product', 'Pullover')),
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
