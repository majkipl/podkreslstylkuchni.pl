<?php

namespace App\Http\Controllers\Panel;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('panel/application/index');
    }

    public function show(int $id)
    {
        $application = Application::where('id','=',$id)->first();

        return view('panel/application/show', [
            'application' => $application
        ]);
    }
}
