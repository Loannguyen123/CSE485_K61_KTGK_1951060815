<?php
//http://localhost/Baikiemtragiuaki/index.php?controller=docgia&action=admin
require_once 'model/Docgia.php';
class DocgiaController{
    function index(){
        var_dump(1);die;
        $bdModal = new BlooddonorModal();
        $bdonor = $bdModal->getAllBD();
        require_once 'view/Docgia/index.php';
    }
    function admin(){
        //var_dump(2);die;
        $bdModal = new BlooddonorModal();
        $bdonor = $bdModal->getAllBD();


        require_once 'view/Docgia/admin.php';
    }
    function add(){

        if(isset($_POST['submit'])){
            $hovaten = $_POST['hovaten'];
            $gioitinh=$_POST['gioitinh'];
            $namsinh=$_POST['namsinh'];
            $nghenghiep=$_POST['nghenghiep'];
            $ngaycapthe=$_POST['ngaycapthe'];
            $ngayhethan=$_POST['ngayhethan'];
            $diachi=$_POST['diachi'];




            
            if(empty($hovaten) 
            || empty($namsinh) 
            || empty($nghenghiep) 
            || empty($ngaycapthe)
            || empty($ngayhethan)
            || empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                
                $bdModal = new BlooddonorModal();
                $bdArr = [
                'hovaten'=>$hovaten,
                'gioitinh' =>$gioitinh,
                'namsinh'=>$namsinh,
                'nghenghiep'=>$nghenghiep,
                'ngaycapthe'=>$ngaycapthe,
                'ngayhethan'  =>$ngayhethan,
                'diachi'=>$diachi,
                    
                ];



                $isAdd = $bdModal->insert($bdArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }


                var_dump('sau insert');
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }

        }
        require_once 'view/Docgia/add.php';

    }
    function edit(){
        if (!isset($_GET['bdid'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        if (!is_numeric($_GET['bdid'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        $id = $_GET['bdid'];
        $bdModal = new BlooddonorModal();
        $BD = $bdModal->getBDById($id);
        $error = '';




        if (isset($_POST['submit'])) {
            $hovaten = $_POST['hovaten'];
            $gioitinh=$_POST['gioitinh'];
            $namsinh=$_POST['namsinh'];
            $nghenghiep=$_POST['nghenghiep'];
            $ngaycapthe=$_POST['ngaycapthe'];
            $ngayhethan=$_POST['ngayhethan'];
            $diachi=$_POST['diachi'];
            if(empty($hovaten) 
            ||empty($gioitinh)
            || empty($namsinh) 
            || empty($nghenghiep) 
            || empty($ngaycapthe)
            || empty($ngayhethan)
            || empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else {
                
                //xử lý update dữ liệu vào hệ thống
            
                $bdArr = [
                    'hovaten'=>$hovaten,
                    'gioitinh' =>$gioitinh,
                    'namsinh'=>$namsinh,
                    'nghenghiep'=>$nghenghiep,
                    'ngaycapthe'=>$ngaycapthe,
                    'ngayhethan'  =>$ngayhethan,
                    'diachi'=>$diachi,
                    'ID' => $id
                ];
                $isAdd = $bdModal->update($bdArr);

                if ($isAdd) {
                    $TT= "Sửa thành công";
                }
                else {
                    $TT = "Sửa thất bại";
                }
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }
        }
        require_once 'view/Docgia/edit.php';
    }
    function delete(){
        $id = $_GET['bdid'];
        if (!is_numeric($id)) {
            header("Location: index.php?controller=docgia&action=index");
            exit();
        }
        $bdModal = new BlooddonorModal();
        $isDelete = $bdModal->delete($id);
        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=docgia&action=admin&tt=$TT");
        exit();
    }
}

?>