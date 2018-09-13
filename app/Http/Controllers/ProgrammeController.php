<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\ProgrammeFinder;
use Illuminate\Support\Facades\Input;


class ProgrammeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      echo "HELLO THERE INDEX ->> ";
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        echo "HELLO THERE SHOW ->>  ";
        return view('programmes.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function query()
    {
        $search = Input::get('search', 'default search');
        $ProgrammeFinder = new ProgrammeFinder();
        $results = $ProgrammeFinder->findProgrammes("somefile", $search); // add real filepath here
        return View::make('programmes.query')->with('programmes', $results);        
    }
}