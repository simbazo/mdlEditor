<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Editor\Repositories\Contracts\UserInterface as User;
class UsersController extends Controller
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->except('password');
        $data['password'] = bcrypt($request->get('password'));
        $data['user_created'] = auth()->user()->uuid;

        if($this->user->create($data)){
            flash()->success(trans('application.record_created'));
            return response()->json(['success'=>true,'msg'=>trans('application.record_created')],201);
        }
        flash()->error(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->getById($id);
        return view('users.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->getById($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
         $data = array('username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        );
        if($request->password != ''){
            $data['password'] = bcrypt($request->password);
        }
        if($this->user->updateById($uuid, $data)){
            flash()->success('User details updated ');
            return response()->json(array('success' => true, 'msg' => trans('application.record_updated')), 200);
        }
        return response()->json(array('success' => false, 'msg' => trans('application.record_update_failed')), 411);
    }

    public function profile(){
         if (\Auth::user())
        {
            $user = $this->profile->getById(\Auth::user()->uuid);
            $data =  array(
                      'username'=>$request->username,
                      'name'=>$request->name,
                      'email'=>$request->email,
                      'phone'=> $request->phone,
            );
            if ($request->hasFile('avatar'))
            {
                $file = $request->file('avatar');
                $filename = strtolower(str_random(50) . '.' . $file->getClientOriginalExtension());
                $file->move('assets/img/uploads', $filename);
                \Image::make(sprintf('assets/img/uploads/%s', $filename))->resize(200, 200)->save();
                \File::delete('assets/img/uploads/'.$user->photo);
                $data['photo']= $filename;
            }

            if($request->get('password') != ''){
                $data['password']= bcrypt($request->password);
            }
            $this->profile->updateById($user->uuid, $data);

            flash()->success('Profile updated');
            return redirect('profile');
    }
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
