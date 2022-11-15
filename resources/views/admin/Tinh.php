<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tinh extends Model
{
    use HasFactory;
    protected $table = 'tinh';

    public function getAllTinh(){
        //  lấy tất cả bản ghi table
        $list = DB::select('SELECT * FROM '.$this->table.' ORDER BY updated_at DESC');

        //$list = DB::table($this->table)->get();
        
        return $list;
    }

    public function addTinh($data)
    {
        // thêm dữ liệu
      return  DB::insert('INSERT INTO tinh (tentinh, created_at, updated_at) VALUES (?,?,?)', $data);
    }

    public function getDetail($id) {
        return DB::select('SELECT * FROM '.$this->table.' WHERE id_tinh = ?', [$id]);
    }

    public function updateTinh($data, $id) {
        $data = array_merge($data, [$id]);
        return DB::update('UPDATE  '.$this->table.' SET tentinh = ?, updated_at=? WHERE id_tinh = ?', $data);
    }

    public function DeleteTinh($id) {

        return  DB::delete('DELETE FROM '.$this->table.' WHERE id_tinh = ?', [$id]);
    }

    // lấy danh sách tỉnh sắp xếp theo họ tên
    public function getAll()
    {
       $tinhs = DB::table($this->table)
       ->orderBy('tentinh', 'ASC')
       ->get();

       return $tinhs;
    }
}