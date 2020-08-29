<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stores_index',Store::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores_create');
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
        $this->model()::create($validatedData);
        return view('stores_index', Store::all());
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
            'document_number' => 'required|string|size:11',
            'address' => 'required|string',
            'phone' => 'required|string',
        ];
    }

    protected function rulesUpdate(){
        return[
            'name' => 'always|string',
            'document_number' => 'always|string|size:11',
            'address' => 'always|string',
            'phone' => 'always|string',
        ];
    }

    protected function model()
    {
        return Store::class;
    }
}
