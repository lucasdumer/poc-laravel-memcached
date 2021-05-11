<?php

namespace App\Repositories;

use App\Requests\ProductCreateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function create(ProductCreateRequest $request): Product
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->save();
            return $product;
        } catch(\Exception $e) {
            throw new \Exception("Database error on creating product. ".$e->getMessage());
        }
    }

    // public function find(int $id): ?Book
    // {
    //     try {
    //         $book = Book::find($id);
    //         return $book;
    //     } catch(\Exception $e) {
    //         throw new \Exception("Database error on find book. ".$e->getMessage());
    //     }
    // }

    // public function list(BookListRequest $request)
    // {
    //     try {
    //         $book = DB::table('book');
    //         if (!empty($request->name)) {
    //             $book->where('name', 'like', '%'.$request->name.'%');
    //         }
    //         if (!empty($request->authorId)) {
    //             $book->where('author_id', '=', $request->authorId);
    //         }
    //         return $book->get();
    //     } catch(\Exception $e) {
    //         throw new \Exception("Database error on list book. ".$e->getMessage());
    //     }
    // }

    // public function delete(int $id): void
    // {
    //     try {
    //         $book = Book::find($id);
    //         if (empty($book)) {
    //             throw new \Exception("No find with id.");
    //         }
    //         $book->delete();
    //     } catch(\Exception $e) {
    //         throw new \Exception("Database error on delete book. ".$e->getMessage());
    //     }
    // }
}
