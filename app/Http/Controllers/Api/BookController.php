<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
    protected $bookRepository;
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    public function index()
    {
    }

    public function getBookSale(Request $request)
    {
        return new BookCollection($this->bookRepository->getBookSale($request));
    }

    public function getRecommnad()
    {
        return new BookCollection($this->bookRepository->getRecommnad());
    }
    public function getPopular()
    {
        return new BookCollection($this->bookRepository->getPopular());
    }

    public function getAllBook(Request $request)
    {
        return new BookCollection($this->bookRepository->getAllBook($request));
    }

    public function getSortSale(Request $request)
    {
        return new BookCollection($this->bookRepository->getSortSale($request));
    }

    public function getPopula(Request $request)
    {
        return new BookCollection($this->bookRepository->getPopula($request));
    }

    public function getPriceHighLow(Request $request)
    {
        return new BookCollection($this->bookRepository->getPriceHighLow($request));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
