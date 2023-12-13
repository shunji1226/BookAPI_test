<?php


namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        //書籍一覧取得
        $books = Book::all();

        return response()->json($books);
    }

    public function show($isbn)
    {
        //書籍詳細情報（著者と出版社のサマリも含む）取得
        $book = Book::with('author', 'publisher')->where('isbn', $isbn)->first();

        return response()->json($book);
    }

    public function store(Request $request)
    {
        // 書籍作成
        $data = [
            'isbn' => $request->input('isbn'),
            'name' => $request->input('name'),
            'publishedAt' => $request->input('publishedAt'),
            'authorId' => $request->input('authorId'),
            'publisherId' => $request->input('publisherId'),
        ];

        $book = Book::create($data);

        return response()->json($book, 201);
    }

    public function update(Request $request, $isbn)
    {
        //書籍更新
        $book = Book::where('isbn', $isbn)->firstOrFail();
        $book->update($request->all());

        return response()->json($book, 200);
    }

    public function destroy($isbn)
    {
        //書籍削除（著者と出版社は削除しない）
        Book::where('isbn', $isbn)->delete();

        return response()->json(null, 204);
    }
}
