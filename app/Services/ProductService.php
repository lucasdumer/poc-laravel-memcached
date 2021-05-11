<?php

namespace App\Services;

use App\Requests\ProductCreateRequest;
use App\Repositories\ProductRepository;
use App\Models\Product;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function create(ProductCreateRequest $request): Product
    {
        try {
            $product = $this->productRepository->create($request);
            return $product;
        } catch(\Exception $e) {
            throw new \Exception("Error on creating product. ".$e->getMessage());
        }
    }

    // public function find(BookFindRequest $request): ?Book
    // {
    //     try {
    //         return $this->bookRepository->find((int) $request->id);
    //     } catch(\Exception $e) {
    //         throw new \Exception("Error on find book. ".$e->getMessage());
    //     }
    // }

    // public function list(BookListRequest $request)
    // {
    //     try {
    //         $books = $this->redisService->get('books');
    //         if (!empty($books)) {
    //             return $books;
    //         }
    //         $books = $this->bookRepository->list($request);
    //         $this->redisService->set('books', $books);
    //         return $books;
    //     } catch(\Exception $e) {
    //         throw new \Exception("Error on list book. ".$e->getMessage());
    //     }
    // }

    // public function delete(BookDeleteRequest $request): void
    // {
    //     try {
    //         $this->bookRepository->delete((int) $request->id);
    //         $this->redisService->clear('books');
    //     } catch(\Exception $e) {
    //         throw new \Exception("Error on delete book. ".$e->getMessage());
    //     }
    // }
}
