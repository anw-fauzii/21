<?php

namespace App\Http\Controllers;

use App\User;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use App\Notifications\Aktivasi;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(10)]);
    }

    public function json()
    {
        $user = User::where('roles', 'User');
            return Datatables::of($user)
            ->addColumn('action', function($data){
                $button = '&nbsp;&nbsp;&nbsp;<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-icon p-2 text-white" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" style="height:15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m F Y') : '';
            })
            ->make(true);
    }

    public function export()
    {
        return Excel::download(new UserExport, 'Pengguna '.date('d-m-Y').'.xlsx');
    }

     /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, User $model)
    {
        $model->create($request->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]
        );

        $update = User::findOrFail($id);
        $update->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function aktivasi(Request $request, $id)
    {
        $aktivasi = User::findOrFail($id);
        $aktivasi->update(['status' => $request->status]);
        $aktivasi->notify(new Aktivasi);

        return back()->withStatusPassword(__('Pengguna successfully updated.'));
    }

    public function deaktivasi(Request $request, $id)
    {
        $deaktivasi = User::findOrFail($id);
        $deaktivasi->update(['status' => $request->status]);

        return back()->withStatusPassword(__('Pengguna successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {  

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
