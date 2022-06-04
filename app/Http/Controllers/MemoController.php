<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function store(Request $request)
    {
        return Memo::create($request->all());
    }

    public function getMemo()
    {
        $memo = Memo::with('user')->get();
        return view('sekretaris.memo.list-memo', ['memo' => $memo]);
    }

    public function detailMemo(Request $request)
    {
        return Memo::with('user')->where('id', '=', $request->id)->first();
    }

    public function getLastMemo()
    {
        return Memo::with('user')->where('user_id', '=', Auth::user()->id)->latest()->first();

        // return view('sekretaris.memo.list-memo', ['memo' => $memo]);
    }
}
