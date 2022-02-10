<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function loadJabatan()
    {
        $jabatan = DB::table('jabatan')->select('*')->get();
        return $jabatan;
    }
}
