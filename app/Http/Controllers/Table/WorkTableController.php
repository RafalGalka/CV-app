<?php

declare(strict_types=1);

namespace App\Http\Controllers\Table;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Invest;

class WorkTableController extends Controller
{

  public function workList(Request $request)
  {
    // Protocol::create($request->all());

    $user = Auth::user();
    return view('tables.workList', ['user' => $user]);
  }
}
