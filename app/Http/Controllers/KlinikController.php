<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class KlinikController extends Controller
{

    function datatable()
    {
        return DataTables::of(User::with('klinik')->where('role','=','klinik')->get())->make(true);
    }

    /**
     * @return mixed
     */
    public function countKlinik(){
        return Klinik::count('*');
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function index()
    {
        if (\request()->isMethod('POST')){
            return $this->create();
        }
        return view('admin.klinik', ['sidebar' => 'klinik']);
    }

    /**
     * @return array|string
     */
    public function create()
    {
        //

        $field = \request()->validate(
            [
//                'nama'     => 'required',
                'username' => 'required',
                'password' => 'required|confirmed',
            ]
        );

        $fieldMember = \request()->validate(
            [
                'nama_klinik' => 'required',
                'alamat'      => 'required',
                'no_hp'       => 'required',
            ]
        );

        Arr::set($field, 'role', 'klinik');
        if (\request('id')){
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
            $user->klinik()->update($fieldMember);
        }else{
            \request()->validate(
                [
                    'username' => 'required|string|unique:users,username',
                ]
            );
            $user     = new User();
            $password = Hash::make($field['password']);
            Arr::set($field, 'password', $password);
            $userData = $user->create($field);
            $userData->klinik()->create($fieldMember);
        }

        return 'Berhasil';
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
