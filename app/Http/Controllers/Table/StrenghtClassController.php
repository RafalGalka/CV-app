<?php

declare(strict_types=1);

namespace App\Http\Controllers\Table;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StrenghtClass;
use Illuminate\View\View;
use App\Repository\Eloquent\ClassRepository;

class StrenghtClassController extends Controller
{
    private ClassRepository $classRepository;

    public function __construct(ClassRepository $repository)
    {
        $this->classRepository = $repository;
    }

    public function classList(Request $request): View
    {
        $material_types = $request->get('material_types', 'all');
        //    $strenghtClass = StrenghtClass::all();

        $result = $this->classRepository->filterBy($material_types);

        return view('tables.classList', ['strenghtClass' => $result, 'material_types' => $material_types]);
    }
}
