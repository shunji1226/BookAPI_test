<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        //著者一覧取得
        $authors = Author::all();

        return response()->json($authors);
    }

    public function show($authorId)
    {
        //著者詳細情報（書籍と出版社も含む）取得
        $author = Author::with('books.publisher', 'relatedPublishers')->find($authorId);

        return response()->json($author);
    }

    public function store(Request $request)
    {
        //著者作成
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update(Request $request, $authorId)
    {
        //著者更新
        $author = Author::findOrFail($authorId);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function destroy($authorId)
    {
        //著者削除（書籍も同時に削除）
        Author::findOrFail($authorId)->delete();

        return response()->json(null, 204);
    }
}