<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use App\Editor\Repositories\Contracts\UserInterface as Profile;
use App\Http\Controllers\Controller;
class ProfileController extends Controller
{
   private $profile;

    public function __construct(Profile $profile){
        $this->profile = $profile;
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\View\View
     */
    public function edit()
	{
        if (\Auth::user())
        {
            $user = $this->profile->getById(\Auth::user()->uuid);

            return view('users.profile', compact('user'));
        }
        return redirect('profile');
	}

    /**
     * Update the specified resource in storage.
     * @param ProfileFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProfileFormRequest $request)
	{
        if (\Auth::user())
        {
            $user = $this->profile->getById(\Auth::user()->uuid);
            $data =  array(
                      'username'      =>$request->username,
                      'name'          =>$request->name,
                      'email'         =>$request->email,
                      'phone'         =>$request->phone
            );
            if ($request->hasFile('avatar'))
            {
                $file = $request->file('avatar');
                $filename = strtolower(str_random(50) . '.' . $file->getClientOriginalExtension());
                $file->move('assets/img/uploads', $filename);
                \Image::make(sprintf('assets/img/uploads/%s', $filename))->resize(200, 200)->save();
                \File::delete('assets/img/uploads/'.$user->photo);
                $data['avatar']= $filename;
            }

            if($request->get('password') != ''){
                $data['password']= bcrypt($request->password);
            }
            $this->profile->updateById($user->uuid, $data);

            flash()->success('Profile updated');
            return redirect()->route('profile');
        }
	}
}
