<?php


namespace App\Http\Controllers;
use App\User;

class UsersController extends Controller
{

    public function fetchOne($id) {
        return User::findOrFail($id);
    }

    public function usersCount()
    {
        return response()->json([
            'count' => User::all()->count()
        ]);
    }

    public function delete($id)
    {
        if ( true === User::find($id)->purge()) {
            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'failed'
        ]);
    }

}
