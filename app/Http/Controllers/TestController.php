<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Comment;
use App\Models\Project;
use Fjord\Chart\ChartSet;
use Fjord\Support\Facades\Form;

class TestController extends Controller
{
    public function __invoke()
    {
        $time = now()->subWeek()->startOfWeek();

        $set = ChartSet::make(
            Sale::select('price'),
            fn ($query) => $this->getValue($query),
            fn ($time, $i) => $time->addDays($i),
            fn ($query, $time) => $query->whereInDay('created_at', $time),
        )
            ->label(fn ($time) => $time->format('l'))
            ->iterations(7);

        $thisWeek = $set->load($time);
        $lastWeek = $set->load($time->copy()->subWeek());
        dd($thisWeek, $lastWeek);
    }

    public function getValue($query)
    {
        return $query->average('price');
    }
}
