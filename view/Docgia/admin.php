<?php
require 'view/template/header.php';
//file hiển thị thông báo lỗi
require_once 'view/commons/message.php';
?>
<main>
    <div class="container">
        <div class="row">
            <div class="">
                <p><?php echo isset($_GET['tt']) ? $_GET['tt'] : ''?></p>
            </div>
            <a href="index.php?controller=docgia&action=index" class="text-decoration-none"><i class="bi bi-arrow-left"></i>  Quay Lại</a>
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Chi Tiết Nhân Viên</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=docgia&action=add"><button class="btn btn-primary">Thêm độc gỉa</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã độc giả</th>
                            <th scope="col">Họ và tên </th>
                            <th scope="col">giới tính/th>
                            <th scope="col">năm sinh</th>
                            <th scope="col">nghề nghiệp</th>
                            <th scope="col">Ngày cấp thẻ</th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($bdonor as $bd) {
                            $urlEdit =
                            "index.php?controller=docgia&action=edit&bdid=" . $bd['ID'];
                            $urlDelete =
                            "index.php?controller=docgia&action=delete&bdid=" . $bd['ID'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $bd['bd_id'] ?></th>
                                <td><?php echo $bd['hovaten'] ?></td>
                                <td><?php echo $bd['gioitinh'] ?></td>
                                <td><?php echo $bd['namsinh'] ?></td>
                                <td><?php echo $bd['nghenghiep'] ?></td>
                                <td><?php echo $bd['ngaycapthe'] ?></td>
                                <td><?php echo $bd['ngayhethan'] ?></td>
                                <td><?php echo $bd['diachi'] ?></td>
                                <td><a href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo $urlDelete ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>