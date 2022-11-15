<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhieuDat extends Model
{
    use HasFactory;

     protected $table = 'phieudat';

    public function addPhieuDat($data)
    {
       return DB::table($this->table)->insert($data);
    }

    //chi tiêt phiếu đạt theo người dùng
     public function chitietPheudat($id)
    {
        $deltail = DB::table($this->table)
            ->select('phieudat.*', 'tour.ten_tour as ten_tour','tour.gia_tre_em as gia_tre_em', 'tour.gia_nguoi_lon as gia_nguoi_lon')
            ->join('chitiettour', 'phieudat.id_chitiet', '=', 'chitiettour.id')
            ->join('tour', 'chitiettour.id_tour', '=', 'tour.id')
            ->where('phieudat.id_user', '=', $id)
            ->get();

       return $deltail;
    }
}