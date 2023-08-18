<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>






<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách hồ sơ trả góp online</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách hồ sơ trả góp online</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
    <?php if(isset($status)) {?>
        <div class="alert alert-success">
        <strong>Thành công</strong><?=$status?>
    </div>

    <?php }?>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tổng số <?=count($dataItem)?> Hồ sơ trả góp</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách trả góp</h3>
                                <div class="card-tools">
                                    <form class="input-group input-group-sm" style="width: 150px;">
                                        <input name="btn_list" type="hidden" class="">
                                        <input value="<?=isset($_GET['key']) ? $_GET['key'] : ''?>" type="text" name="key" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px"></th>
                                            <th>Code</th>
                                            <th>TÊN SẢN PHẨM</th>
                                            <th>GIÁ SP</th>
                                            <th>MÀU</th>
                                            <th style="width : 90px">HÌNH</th>
                                            <th>LÃI SUẤT</th>
                                            <th>TRẢ TRƯỚC</th>
                                            <th>GÓI TRẢ GÓP</th>
                                            <th>THANH TOÁN/THÁNG</th>
                                            <th>HỌ TÊN</th>
                                            <th>NGÀY ĐĂNG KÝ</th>
                                            <th>TỔNG TIỀN </th>
                                            <th>TRẠNG THÁI</th>
                                            <th style="width: 150px"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($dataItem as $key => $value){?>
                                        <tr id="" >
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input name="check[]" value="<?=$value['id']?>" class="custom-control-input custom-control-input-danger get-check" type="checkbox" id="customCheckbox<?=$key?>">
                                                    <label for="customCheckbox<?=$key?>" class="custom-control-label"></label>
                                                </div>
                                            </td>
                                            <td><?=$value['code']?></td>
                                            <td class="ten_loai" ><?=$value['name_product']?></td>
                                            <td><?=currency_format($value['init_price'])?></td>
                                            <td><?=$value['value']?></td>
                                            <td><img src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>" style="width : 80px; height : 80px"  /></td>
                                            <td><?=$value['interest_rate']?>%</td>
                                            <td><?=$value['prepay']?></td>
                                            <td><?=$value['month_number']?> Tháng</td>
                                            <td><?=$value['pay_each_month']?></td>
                                            <td><?=$value['name']?></td>
                                            <td><?=$value['createdAt']?></td>
                                            <td><?=($value['total_price'])?></td>
                                            <td>Chưa xác nhận</td>
                                            <td class="project-actions text-right">
                                                
                                                <a class="btn btn-info btn-sm" href="">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Sửa
                                                </a>
                                                <a data-delete="<?=$value['id']?>" class="btn btn-danger btn-sm delete-single" href="javascript:;">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                      <?php }?>

                                    </tbody>
                                </table>
                            </div>

                           

                        </div>

                    </div>



                </div>


            </div>

            


        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>