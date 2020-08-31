<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users_index',User::all());
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, $this->rulesStore());
        $validatedData['password'] = Hash::make($request->password);
        return $this->model()::create($validatedData);
    }

    public function show($id)
    {
        return $this->findOrFail($id);
    }

    public function edit($id)
    {
        //Essa é a rota do formulário
    }

    public function update(Request $request, $id)
    {
        if($request['password']){
            $request['password'] = bcrypt($request['password']);
        }

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

    public function destroy($id)
    {
        $dataToBeDeleted = $this->findOrFail($id);
        $dataToBeDeleted->delete();

        return response()->noContent();
    }

    protected function rulesStore()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,12',
            'type_user' => 'always|in:'.implode(',',User::TYPE_USER),
        ];
    }

    protected function rulesUpdate()
    {
        return [
            'name' => 'sometimes|string',
            'password' => 'sometimes|between:6,12',
            'type_user' => 'always|in:'.implode(',',User::TYPE_USER),
        ];
    }

    protected function model()
    {
        return User::class;
    }

}
