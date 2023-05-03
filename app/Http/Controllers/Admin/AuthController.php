<?php



namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class  AuthController extends Controller
{
    public function register(){
        return view('admin.auth.register');

    }

        public function registerSave(Request $request){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'image' => 'nullable|mimes:jpg,png',
                'password' => 'required|min:6|confirmed'
            ]);


            $input = $request->all();


            $data = $request->only('name','email');
            $data['password']= bcrypt($request->password);

            if($request->hasFile('image')){
                $destination ='public/Admin/images/users';
                $image = $request->file('image');
                $image_name =$image ->getClientOriginalName();
                $path=$request-> file('image')->storeAs($destination,$image_name);

                $data['image']=$image_name;
            }
            $users = User::create($data);
            auth()->guard()->login($users);
            if ($users) {
                return view(('Admin/index'));
            }
    }

    public function index(){
        // return 'aaaa';
        return view('admin.auth.login');
    }


    public function loginAction(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        } else {
            return redirect()->back();
        }

    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');

    }

    public function update(Request $request){
        // dd($request->all());
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'nullable|mimes:jpg,png',

        ]);

        $user= User::findOrFail(Auth::user()->id);


        if($request->image){
            Storage::delete('public/images/users'.$user->image);
            $destination ='public/images/users';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $user->update($data);
       return redirect()->route('profile');
    }









}
