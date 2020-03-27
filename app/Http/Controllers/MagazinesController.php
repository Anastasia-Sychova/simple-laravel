<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use Illuminate\Http\Request;

class MagazinesController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function getAll()
    {
        $magazines = DB::table('magazines')->get();
        return view('magazines', ['magazines' =>$magazines]);
    }

    function addMagazineForm()
    {
        return view('addMagazine');
    }

    function addMagazine(Request $request)
    {
        $validatedData = $request->validate([
            'title'              => 'required|max:256',
            'name'               => 'required|max:256',
            'publisher'          => 'required|max:256',
            'publication_code'   => 'required|unique:magazines|max:256',
            'publication_number' => 'required|unique:magazines|integer',
            'publication_date'   => 'required|date',
            'country'            => 'required|max:2',
            'language'           => 'required|max:5',
            'genres'             => 'required|array',
        ]);
        $magazine = $request->except(['_token']);
        $magazine['genres'] = \GuzzleHttp\json_encode($magazine['genres']);
        $magazines = DB::table('magazines')->insert($magazine);

        return redirect('/');
    }

    function deleteMagazine($id)
    {
        $result = DB::table('magazines')->where('id', '=', $id)->delete();

        return redirect('/');
    }
}
