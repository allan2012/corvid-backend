<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PeopleController extends Controller
{
    public function fetchAllCorvidPatients()
    {
        return People::where('confirmed_corvid', true)->paginate(15);
    }

    public function fetchAllQuarantinedPatients()
    {
        return People::where('on_quarantine', true)->paginate(15);
    }

    public function fetchOne($id)
    {
        return People::find($id);
    }

    public function save(Request $request, $id)
    {
        $person = People::find($id);
        $person->update($request->except(['page_loaded']));
        return response()->json([
            'status' => 'success'
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        $person = People::find($id)->purge();
        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
