<?php

namespace App\Http\Controllers\Shop\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\BaseController;
use App\Http\Requests\Shop\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Shop\Cabinet
 */
class UserController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('shop.cabinet.user.show')->with([
            'user' => auth()->user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('shop.cabinet.user.edit')->with([
            'user' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();
        
        $data = array_filter(
            $request->validated(),
            fn($val) => !is_null($val)
        );

        $result = $user->update($data);

        if ($result) {
            return back()->with(['status' => 'Data has been successfully updated']);
        }
        return back()->with(['error' => 'Something went wrong. Please try again']);
    }
}
