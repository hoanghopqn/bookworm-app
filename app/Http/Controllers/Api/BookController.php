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
    
    public function getBookSale()
    {
        return new BookCollection( $this->bookRepository->getBookSale());
    }
    public function getRecommnad()
    {
        return new BookCollection( $this->bookRepository->getRecommnad());
    }

    public function getAllBook(Request $request)
    {
        return $this->bookRepository->getAllBook($request);
    }
    public function getSortSale()
    {
        return $this->bookRepository->getSortSale();
    }
    public function getPopula()
    {
        return $this->bookRepository->getPopula();
    }
    public function getPriceHighLow(Request $request)
    {
        return $this->bookRepository->getPriceHighLow($request);
    }
    public function getFilterCategory(Request $request)
    {
        return $this->bookRepository->getFilterCategory($request);
    }
    public function getFilterAuthor(Request $request)
    {
        return $this->bookRepository->getFilterAuthor($request);
    }
    public function getFilterRatingReview(Request $request)
    {
        return $this->bookRepository->getFilterRatingReview($request);
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
