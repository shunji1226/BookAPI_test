<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        //出版社一覧取得
        $publishers = Publisher::all();

        return response()->json($publishers);
    }

    public function show($publisherId)
    {
        //出版社詳細情報（書籍と著者も含む）取得
        $publisher = Publisher::with('books.author', 'relatedAuthors')->find($publisherId);

        return response()->json($publisher);
    }

    public function store(Request $request)
    {
        //出版社作成
        $publisher = Publisher::create($request->all());

        return response()->json($publisher, 201);
    }

    public function update(Request $request, $publisherId)
    {
        //出版社更新
        $publisher = Publisher::findOrFail($publisherId);
        $publisher->update($request->all());

        return response()->json($publisher, 200);
    }

    public function destroy($publisherId)
    {
        //出版社削除（書籍も同時に削除）
        Publisher::findOrFail($publisherId)->delete();

        return response()->json(null, 204);
    }
}
