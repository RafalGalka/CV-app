<?php

namespace App\Http\Controllers\Sample;

use App\Model\TakeSample;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class TakeSamplesController extends Controller
{
    public function add(): View
    {
        $protocol = TakeSample::where('protocol_number', $_GET['nr'])->first();

        return view('samples.takeAdd', ['protocol' => $protocol]);
    }
}
