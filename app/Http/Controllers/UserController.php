<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Gate;
use Throwable;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list(Request $request)
    {
        //dump(Gate::allows('admin-level'));
        //if (Gate::denies('admin-level', true)) {
        //    abort(403);
        //}

        //try {
        //    Gate::authorize('admin-level');
        //} catch (Throwable $exception) {
            //dd($exception);
        //}

        Gate::authorize('admin-level');

        //$response = Gate::inspect('admin-level');
        //if ($response->denied()) {
        //if (!$response->allowed()) {
        //    echo $response->message();
        //    dd('exit');
        //}


        $users = $this->userRepository->all();

        return view('user.list', ['users' => $users]);
    }

    public function show(Request $request, int $userId)
    {
        $user = $request->user();

        //Gate::authorize('admin-level');
        //if (!$user->can('admin-level')) {
        //if ($user->cannot('admin-level')) {
        //    abort(403);
        //}

        $this->authorize('admin-level');

        $userModel = $this->userRepository->get($userId);

        //Gate::authorize('view', $userModel);
        //if ($user->cannot('view', $userModel)) {
        //    abort(403);
        //}
        //if ($user->cannot('create', User::class)) {
        //    abort(403);
        //}
        //$this->authorize('create', User::class);

        $this->authorize('view', $userModel);

        return view ('user.show', [
            'user' => $this->userRepository->get($userId)
        ]);
    }
}
