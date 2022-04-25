<?php

declare(strict_types=1);

namespace App\Http\Controllers\Table;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\TestType;
use Illuminate\View\View;

class TestTableController extends Controller
{
  public function testList(Request $request): View
  {
    $testType = TestType::all();
    // Protocol::create($request->all());

    $user = Auth::user();
    return view('tables.testList', ['testType' => $testType]);
  }
}
