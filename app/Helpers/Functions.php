<?php 

    use App\Models\Tinh;
    use App\Models\LoaiTour;
    use App\Models\DiaDiem;
    use App\Models\Tour;



    function getAllTinh(){
        $tinhs = new Tinh();
        return $tinhs->getAll();
    }

    function getAllLoaiTour(){
        $loaitours = new LoaiTour();
        return $loaitours->getAll();
    }

    function getAllDiaDiem(){
        $diadiems = new DiaDiem();
        return $diadiems->getAll();
    }

    function getAllTour(){
        $tours = new Tour();
        return $tours->getAll();
    }

    function getDetailTour($id){
        $tour = new Tour();
        return $tour->getDetail($id);
    }

    function dinhDangNgayThang($date){
        $date = date("d-m-Y", strtotime($date));
        return $date;
    }

    function PathImages($hinh_anh){
        $hinh_anh = 'uploads/images/' . $hinh_anh;
        return $hinh_anh;
    }

    function currency_format($number) {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "đ";
        }
    }
?>