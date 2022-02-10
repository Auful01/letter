<?php

namespace App\Http\Controllers;

use App\Models\Sktm;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function store(Request $request)
    {
        Sktm::create($request->all());
        return redirect()->back();
    }
}
