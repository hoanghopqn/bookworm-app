<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BookSaleRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $booksaleRepository;   
    public function __construct(BookSaleRepository $booksaleRepository)
    {
        $this->booksaleRepository = $booksaleRepository;
    }
    public function index()
    {
        
    }
    
    public function getBookSale()
    {
        return $this->booksaleRepository->getBookSale();
    }
    public function getRecommnad()
    {
        return $this->booksaleRepository->getRecommnad();
    }

    public function getBookShop()
    {
        return $this->booksaleRepository->getBookShop();
    }
    public function getSortSale()
    {
        return $this->booksaleRepository->getSortSale();
    }

    public function getPopula()
    {
        return $this->booksaleRepository->getPopula();
    }
    public function getPriceHighLow()
    {
        return $this->booksaleRepository->getPriceHighLow();
    }
    public function getPriceLowHigh()
    {
        return $this->booksaleRepository->getPriceLowHigh();
    }
    public function getFilterCategory()
    {
        return $this->booksaleRepository->getFilterCategory();
    }
    public function getFilterAuthor()
    {
        return $this->booksaleRepository->getFilterAuthor();
    }
    public function getFilterRatingReview()
    {
        return $this->booksaleRepository->getFilterRatingReview();
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
