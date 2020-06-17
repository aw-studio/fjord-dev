<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Comment;
use App\Models\Project;
use Fjord\Chart\ChartSet;
use Fjord\Support\Facades\Form;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function __invoke()
    {
        $time = now()->subWeek()->startOfWeek();

        $query = Sale::query();

        $values = null;
        for ($i = 0; $i < 30; $i++) {
            $value = (clone $query)
                ->selectRaw("COUNT(*) as value")
                ->whereInDay('created_at', $time->addDays($i));

            if (!$values) {
                $values =  $value;
            } else {
                $values->unionAll($value);
            }
        }

        $result = $values->get()->pluck('value');

        return view('test')->withResult($result);
    }

    public function getValue($query)
    {
        return $query->average('price');
    }
}
