<?php

namespace App\Http\Controllers\Auth\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function mark(User $user)
    {
        try {
            if ($user->status){
                $user->status = false;
            }else{
                $user->status = true;
            }
            $user->save();
            return back()->withFlashSuccess('Successfully updated.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.dashboard')->withFlashError('Error updating');
        }
    }
}
