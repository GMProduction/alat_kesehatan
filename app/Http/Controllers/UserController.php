<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    function datatable()
    {
        return DataTables::of(User::where('role','!=','klinik')->get())->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->isMethod('POST')) {
            return $this->create();
        }

        return view('admin.user', ['sidebar' => 'user']);
    }

    /**
     * @return array|string
     */
    public function create()
    {
        //
        $field = \request()->validate(
            [
                'nama'     => 'required',
                'username' => 'required',
                'password' => 'required|confirmed',
                'role'     => 'required',
            ]
        );

        if (\request('id')) {
            $cekUsername = User::where([['username', '=', \request('username')], ['id', '!=', \request('id')]])->first();
            if ($cekUsername) {
                return \request()->validate(
                    [
                        'username' => 'required|string|unique:users,username',
                    ]
                );
            }
            if (strpos($field['password'], '*') === false) {
                $password = Hash::make($field['password']);
                Arr::set($field, 'password', $password);
            }
            $user = User::find(\request('id'));
            $user->update($field);
        } else {
            \request()->validate(
                [
                    'username' => 'required|string|unique:users,username',
                ]
            );
            $user     = new User();
            $password = Hash::make($field['password']);
            Arr::set($field, 'password', $password);
            $user->create($field);
        }

        return 'berhasil';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
