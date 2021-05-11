<?php

namespace App\Http\Controllers;

use App\Requests\ProductCreateRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create(ProductCreateRequest $request)
    {
        try {
            $author = $this->productService->create($request);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    // public function find(AuthorFindRequest $request)
    // {
    //     try {
    //         $author = $this->authorService->find($request);
    //         return $this->success($author);
    //     } catch(\Exception $e) {
    //         return $this->error($e);
    //     }
    // }

    // public function list(AuthorListRequest $request)
    // {
    //     try {
    //         $authors = $this->authorService->list($request);
    //         return $this->success($authors);
    //     } catch(\Exception $e) {
    //         return $this->error($e);
    //     }
    // }

    // public function delete(AuthorDeleteRequest $request)
    // {
    //     try {
    //         $this->authorService->delete($request);
    //         return $this->success();
    //     } catch(\Exception $e) {
    //         return $this->error($e);
    //     }
    // }
}
