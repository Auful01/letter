<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

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
    public function getAllMemo()
    {
        $last = Memo::with('user')->where('user_id', '=', Auth::user()->id)->latest()->first();
        $data = Memo::with('user')->where('user_id', '=', Auth::user()->id)->where('id', '!=', $last->id)->orderBy('id', 'desc')->get();

        return DataTables::make($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<button type="button" class="btn btn-sm btn-warning edit-memo" data-id="' . $data->id . '"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-sm btn-danger hapus-memo" data-id="' . $data->id . '" ><i class="fas fa-eraser"></i> </button>';
            })
            ->addColumn('isi_memo', function ($data) {
                return $data->isi = substr($data->isi, 0, 200) . '...';
            })
            ->addColumn('tgl_memo', function ($data) {
                return $data->tgl_memo = date('d-m-Y', strtotime($data->created_at));
            })
            ->rawColumns(['action', 'isi_memo', 'tgl_memo'])
            ->make(true);
    }

    public function detailMemo(Request $request)
    {
        return Memo::with('user')->where('id', '=', $request->id)->first();
    }

    public function getLastMemo()
    {
        return Memo::with('user')->where('user_id', '=', Auth::user()->id)->latest()->first();
    }

    public function editMemo(Request $request)
    {
        return Memo::with('user')->where('id', '=', $request->id)->first();
    }

    public function updateMemo(Request $request)
    {
        $memo = Memo::find($request->id);
        $memo->update($request->all());
        return $memo;
    }

    public function deleteMemo(Request $request)
    {
        $memo = Memo::find($request->id);
        $memo->delete();
        return $memo;
    }
}
