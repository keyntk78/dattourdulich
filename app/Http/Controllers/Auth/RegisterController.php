<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $dataP
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'hoten' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'dienthoai' => ['required', 'string', 'max:15'],
            'diachi' => ['required', 'string', 'max:255'],
            'cmnd' => ['required', 'string', 'max:15'],
            'gender' => ['required'],
        ],	
        [
			'hoten.required' => 'Họ và tên là trường bắt buộc',
			'hoten.max' => 'Họ và tên không quá 255 ký tự',
			'email.required' => 'Email là trường bắt buộc',
			'email.email' => 'Email không đúng định dạng',
			'email.max' => 'Email không quá 255 ký tự',
			'email.unique' => 'Email đã tồn tại',
			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
			'password.confirmed' => 'Xác nhận mật khẩu không đúng',
			'dienthoai.max' => 'Số Điện thoại không quá  15 ký tự',
			'dienthoai.required' => 'Số Điện thoại là trường bắt buộc',
			'diachi.required' => 'Địa chỉ là trường bắt buộc',
			'diachi.max' => 'Địa chỉ không quá 255 ký tự',
			'cmnd.max' => 'Số Điện thoại không quá  15 ký tự',
			'cmnd.required' => 'CMND/CCCD là trường bắt buộc',
			'gender.required' => 'Gioi tính là trường bắt buộc',
		]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'hoten' => $data['hoten'],
            'email' => $data['email'],
            'dienthoai' => $data['dienthoai'],
            'diachi' => $data['diachi'],
            'cmnd' => $data['cmnd'],
            'gender' => $data['gender'],
            'level' => 1,
            'password' => Hash::make($data['password']),
        ]);
    }
}