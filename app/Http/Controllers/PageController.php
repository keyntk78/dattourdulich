<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ChiTietTour;
use App\Models\ChuongTrinhTour;
use App\Models\User;
use App\Models\PhieuDat;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    
    private $chitiettours;
    private $chuongtrinhtour;
    private $users;
    private $phieuDat;


    public function __construct()
    {
        $this->chitiettours = new ChiTietTour();
        $this->chuongtrinhtour = new ChuongTrinhTour();
        $this->users = new User();
        $this->phieuDat = new PhieuDat();

    }

    // Trang chủ 
    public function index(){
        $title = 'Trang chủ';
        $chitiettour = $this->chitiettours->getCTTTrangChu();
        return view('pages.trangchu', compact('chitiettour', 'title'));
    }

    public function chitiettour(Request $request){
        
        $id = $request->route('id');
        $toptourlienquan = $this->chitiettours->getCTTTrangChu();
        $chitiettour =   $this->chitiettours->getXemChiTietTour($id);
        $chitiettour = $chitiettour[0];
        $id_tour = $chitiettour->id_tour;
        $listChuongtrinhtour = $this->chuongtrinhtour->getAllChuongTrinhTourIDTour($id_tour);
        $title = $chitiettour->tour;


        return view('pages.chitiettour', compact('chitiettour', 'toptourlienquan', 'listChuongtrinhtour', 'title'));
    }

    // trang loại tour
    public function loaitour(Request $request){
        $id = $request->route('id');
        
        $chitiettour = $this->chitiettours->getAllCTTbyLoaitour($id);
        $title = $chitiettour[0]->ten_loai_tour;
        return view('pages.loaitour', compact('chitiettour', 'title'));
    }

   
    
    public function TimKiem(Request $request){
        $keywword = null;
        if (!empty($request->tim_kiem)) {
            $keyword = $request->tim_kiem;
            $ketqua = $this->chitiettours->getAllTimKiem($keyword);
        } else{
            return redirect('/');
        }

        $title = $keyword;

        return view('pages.timkiem', compact('ketqua', 'title'));
    }

    public function getDangky(){
        
        $title = "Đăng ký";
        return view('pages.dangky', compact('title'));
    }

     public function postDangky(Request  $request){

        $request->validate([
            'ho_ten' => 'required|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'c_password' => ['required','min:6', 'same:password'],
            'so_dien_thoai' => ['required', 'string', 'max:15'],
            
        ],
        [
            'ho_ten.required' => 'Họ và tên là trường bắt buộc',
			'ho_ten.max' => 'Họ và tên không quá 255 ký tự',
			'email.required' => 'Email là trường bắt buộc',
			'email.email' => 'Email không đúng định dạng',
			'email.max' => 'Email không quá 255 ký tự',
			'email.unique' => 'Email đã tồn tại',
			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
			'c_password.required' => 'Nhập lại mật khẩu là trường bắt buộc',
			'c_password.min' => 'Nhập lại mật khẩu phải chứa ít nhất 6 ký tự',
			'c_password.same' => 'Xác nhận mật khẩu không đúng',
			'so_dien_thoai.max' => 'Số Điện thoại không quá  15 ký tự',
			'so_dien_thoai.required' => 'Số Điện thoại là trường bắt buộc',
        ]);
        

        
        $dataInsert = [
                    'hoten' => $request->ho_ten,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'dienthoai' => $request->so_dien_thoai,
                    'level' => 0,          
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s'),
                ];

        $this->users->dangky($dataInsert);
        return redirect()->route('dangnhap')->with('thongbao', 'Đăng ký tài khoản thành công');
    }


    public function getDangnhap(){
        
        $title = "Đăng nhập";
        return view('pages.dangnhap', compact('title'));
    }

    public function postDangnhap(Request $request){
        
         
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required|min:6|max:32'
        ], 
        [
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu từ 6 kí tự trở lên',
            'password.max'=>'Mật khẩu không được quá 32 kí tự'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return redirect(route('trangchu'));
        } else {
            return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công: sai email hoặc mật khẩu');
        }
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect(route('trangchu'));
    }

    public function getNguoidung()
    {
        $user = Auth::user();
        
        $phieudat = $this->phieuDat->chitietPheudat(Auth::user()->id);
        
        $title = Auth::user()->hoten;
        return view('pages.nguoidung', compact('user', 'phieudat', 'title'));
    }

    public function postNguoidung(Request $request)
    {
       
        $this->validate($request,[
            'hoten'=> 'required',
            'dienthoai' => ['required', 'string', 'max:15'],
            'diachi' => ['required', 'string', 'max:255'],
            'cmnd' => ['required', 'string', 'max:15'],
            'gender' => ['required'],
            
        ],
        [
            'hoten.required'=>'Bạn chưa nhập tên người dùng',
            'dienthoai.max' => 'Số Điện thoại không quá  15 ký tự',
			'dienthoai.required' => 'Số Điện thoại là trường bắt buộc',
			'diachi.required' => 'Địa chỉ là trường bắt buộc',
			'diachi.max' => 'Địa chỉ không quá 255 ký tự',
			'cmnd.max' => 'Số Điện thoại không quá  15 ký tự',
			'cmnd.required' => 'CMND/CCCD là trường bắt buộc',
			'gender.required' => 'Gioi tính là trường bắt buộc',
        ]);

        $id = Auth::user()->id;
        
        $user = User::find($id);
        $user->hoten = $request->hoten;
        $user->level = $request->level;
        $user->dienthoai = $request->dienthoai;
        $user->diachi = $request->diachi;
        $user->cmnd = $request->cmnd;
        $user->gender = $request->gender;
        $user->level = 0;
        $user->updated_at =  date('Y-m-d H:i:s');

        $user->save();
        
        
        return back()->with('thongbao','Chỉnh sửa người dùng thành công');
    }


    public function getDoiMatKhau()
    {
       $title = "Đổi mật khẩu";
        return view('pages.doimatkhau', compact('title'));
    }

    public function postDoiMatKhau(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'mk_cu' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Nhập sai mật khẩu hiện tại');
                    }
                }
            ],
            'mk_moi' => [
                'required', 'min:6', 'different:mk_cu'
            ], 
            'mk_nhaplai' => [
                'required', 'min:6', 'same:mk_moi',
            ]
        ], [
            'mk_cu.required' => 'Mật khẩu hiện tại bắt buộc phải nhập',
            'mk_moi.required' => 'Mật khẩu hiện tại bắt buộc phải nhập',
            'mk_moi.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại',
            'mk_nhaplai.same' => 'Nhập lại mật khẩu không chính xác',
            'mk_nhaplai.required' => 'Mật khẩu hiện tại bắt buộc phải nhập',
            'mk_moi.min' => 'Trên 6 ký tự',
            'mk_nhaplai.min' => 'Trên 6 ký tự',
        ]);
        
        $id = Auth::user()->id;
        $user = User::find($id);
        $mk_moi = Hash::make($request->mk_moi);
        
        $user->password = $mk_moi;

        $user->save();
        return back()->with('thongbao','Đổi mật khẩu thành công');
    }
}