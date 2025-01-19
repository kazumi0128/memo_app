<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\MemoRequest;
use Termwind\Components\Raw;

class MemoController extends Controller

{
    public function index()
    {
        //全件取得
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(MemoRequest $request)
    {
        // インスタンスの作成
        $memo = new Memo();

        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->save();

        // 登録したらindexに戻る
        return redirect(route('memos.index'));
    }


    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }

    public function edit($id)
    {
        $memo = Memo::find($id);
        return view('memos.edit', ['memo' => $memo]);
    }

    public function update(MemoRequest $request, $id)
    {
        // 更新対象データの取得
        $memo = Memo::find($id);

        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->save();

        // 更新したらindexに戻る
        return redirect(route('memos.index'));
    }

    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo->delete();

        return redirect(route('memos.index'));
    }
}
