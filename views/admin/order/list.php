<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
        <div class="container-fluid">
            <div class="row">
               
                <div class="col-md-12">
                 
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách Đơn hàng</h3>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>SĐT</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt</th>
                                    <th>Phí vận chuyển</th>
                                    <th>Giảm giá</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dataItem as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value["name"] ?></td>
                                        <td><?= $value["phone_number"] ?></td>
                                        <td><?= $value["address_detail"] ?></td>
                                        <td><?= currency_format($value["total"]) ?></td>
                                        <td>
                                            <?php
                                            if ($value['active'] == 6) {
                                                echo '<span class="badge badge-danger">Chưa tiếp nhận</span>';
                                            }
                                            if ($value['active'] == 5) {
                                                echo '<span class="badge badge-warning">Đã tiếp nhận</span>';
                                            }
                                            if ($value['active'] == 4) {
                                                echo '<span class="badge badge-warning">Đã rời kho</span>';
                                            }
                                            if ($value['active'] == 3) {
                                                echo '<span class="badge badge-danger">Đang vận chuyển</span>';
                                            }
                                            if ($value['active'] == 2) {
                                                echo '<span class="badge badge-warning">Đã đến nơi</span>';
                                            }
                                            if ($value['active'] == 1) {
                                                echo '<span class="badge badge-success">Hoàn thành</span>';
                                            }
                                            if ($value['active'] == 0) {
                                                echo '<span class="badge badge-dark">Đã hủy</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="sparkbar"><?= $value["createdAt"] ?></div>
                                        </td>
                                        <td>
                                            <div class="sparkbar"><?= $value["transport_fee"] == 0 ? "Free ship" : currency_format($value["transport_fee"]) ?></div>
                                        </td>
                                        <td>
                                            <div class="sparkbar"><?= $value["coupon_name"] ? $value["coupon_name"] : 'không áp dụng' ?></div>
                                        </td>
                                        <td><a href="/admin/order/detail/<?= $value["id"] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </section>


<?php $this->loadView('admin/Layout/footer') ?>