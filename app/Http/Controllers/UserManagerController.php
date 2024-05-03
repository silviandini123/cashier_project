<?php

namespace App\Http\Controllers;

use App\Models\UserManager;
use App\Http\Requests\StoreUserManagerRequest;
use App\Http\Requests\UpdateUserManagerRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class UserManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['usermanager']=User::all();
        return view('user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserManagerRequest $request)
    {
        UserManager::create($request->all());
    
        return redirect('user')->with('success', 'Data User Manager berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserManager $userManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserManager $userManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserManagerRequest $request, string $id)
    {
        $user = UserManager::find($id)->update($request->all());
        return redirect('user')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        UserManager::find($id)->delete();
        return redirect('user')->with('success','Data User Manager berhasil dihapus!');
    }
}
