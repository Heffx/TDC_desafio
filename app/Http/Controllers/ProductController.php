<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use const http\Client\Curl\AUTH_GSSNEG;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return view('products_index',Product::where('store_id', Auth::user()->Store->id)->get());
        }else{
            return redirect()->route('login');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get current logged in user
        if (Auth::check()){
            $user = Auth::user();
        }else{
            return redirect()->route('login');
        }
        if ($user->can('create', Product::class)) {
            return view('products_create');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, $this->rulesStore());
        $validatedData['store_id'] = Auth::user()->Store->id;
        $this->model()::create($validatedData);
        return view('products_index', Product::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, $this->rulesUpdate());
        $dataToBeUpdated = $this->findOrFail($id);
        $dataToBeUpdated->update($validatedData);
        return $dataToBeUpdated;
    }

    protected function findOrFail($id)
    {
        $model = $this->model();
        $keyName = (new $model)->getRouteKeyName();
        return $this->model()::where($keyName, $id)->firstOrFail();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataToBeDeleted = $this->findOrFail($id);
        $dataToBeDeleted->delete();
        return response()->noContent();
    }

    protected function rulesStore(){
        return[
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0',
        ];
    }

    protected function rulesUpdate(){
        return[
            'name' => 'always|string',
            'price' => 'always|numeric|min:0',
            'amount' => 'always|numeric|min:0',
        ];
    }

    protected function model()
    {
        return Product::class;
    }
}
