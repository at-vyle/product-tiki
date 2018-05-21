<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Models\UserInfo;
use App\Mail\SendMailUser;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::with('userinfo')->paginate(config('define.product.limit_rows'));
        $data['result'] = $result;
        return view('admin.pages.users.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = User::with('userinfo')->find($id);
        $data['result'] = $result;
        return view('admin.pages.users.show', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $password = str_random(6);
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->save();

        $insertedId = $user->id;
        $user_info = new UserInfo;
        $user_info->user_id = $insertedId;
        $user_info->full_name = $request->full_name;
        $user_info->address = $request->address;
        $user_info->phone = $request->phone;
        $user_info->identity_card = $request->identity_card;
        $user_info->gender = $request->gender;
        $user_info->dob = $request->dob;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nameNew = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $user_info->avatar = $nameNew;
            $user_info->save();
            $image->move($destinationPath, $nameNew);
        } else {
        $user_info->avatar = $request->avatar;
            $user_info->save();
        }
        $data['email'] = $user->email;
        $data['password'] = $password;
        Mail::to($user->email)->send(new SendMailUser($data));
        return redirect()->route('admin.users.index')->with('message', trans('messages.create_user_success'));
    }
}
