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
        return $this->bookRepository->getBookSale($request);
    }

    public function getRecommend(Request $request)
    {
        return $this->bookRepository->getRecommend($request);
    }
    public function getPopular(Request $request)
    {
        return $this->bookRepository->getPopular($request);
    }

    public function getBooksAll(Request $request)
    {
        return $this->bookRepository->getBooksAll($request);
    }

    public function getBookDetails($id)
    {
        return $this->bookRepository->getBookDetails($id);
    }
    public function getAuthorCategory()
    {
        return $this->bookRepository->getAuthorCategory();
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
