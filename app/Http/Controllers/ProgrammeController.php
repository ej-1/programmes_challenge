<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\ProgrammeFinder;

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
    public function show($string)
    {
        $ProgrammeFinder = new ProgrammeFinder($string);
        $results = $ProgrammeFinder->hello();
        //
        echo "HELLO THERE SHOW ->> $results ";
    }
}