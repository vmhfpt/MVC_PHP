
<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa mã giảm giá "<?=$item['name']?>" </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa mã giảm giá</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
  

    <?= isset($errors) ? '<div class="alert alert-danger"> <span class="">Lỗi</span></div>' : ''?>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Điền đầy đủ các thông tin phía dưới</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <form id="submit-form" action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">CODE</label>
                                <input name="code" type="text" class="form-control" id="code" value="<?=$item['code']?>" onlyread>
                            </div>

                            <div class="form-group">
                                <label for="name-category">TÊN</label>
                                <input value="<?=$item['name']?>" name="name" type="text" class="form-control " id="name-category" placeholder="Nhập tên mã giảm giá">
                                <?= isset($errors['name']) ? '<span id="error-name" class="text-danger">'.$errors['name'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label for="name-category">SỐ LƯỢNG</label>
                                <input value="<?=$item['usage_limit']?>" name="usage_limit" type="number" class="form-control " id="name-category" placeholder="Nhập số lượng">
                                <?= isset($errors['usage_limit']) ? '<span id="error-name" class="text-danger">'.$errors['usage_limit'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label>LOẠI ƯU ĐÃI</label>
                                <select name="type" class="custom-select">
                                   <option <?=$item['type'] == 0 ? 'selected' : ''?> value="0">% (phần trăm)</option>
                                   <option <?=$item['type'] == 1 ? 'selected' : ''?> value="1">Giá tùy chọn</option>
                                </select>
                            </div>


                            
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="name-category">GIÁ ƯU ĐÃI</label>
                                <input value="<?=$item['discount_amount']?>" name="discount_amount" type="text" class="form-control " id="name-category" placeholder="Nhập giá ưu đãi">
                                <?= isset($errors['discount_amount']) ? '<span id="error-name" class="text-danger">'.$errors['discount_amount'].'</span>' : ''?>
                            </div>
                            
                            <div class="form-group">
                                <label>NGÀY BẮT ĐẦU</label>
                                <input value="<?=$item['start_date']?>" placeholder="mm/dd/yyyy" name="start_date" type="date" class="form-control" id="date" />
                                <?= isset($errors['start_date']) ? '<span id="error-name" class="text-danger">'.$errors['start_date'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label>NGÀY KẾT THÚC</label>
                                <input value="<?=$item['end_date']?>" placeholder="mm/dd/yyyy" name="end_date" type="date" class="form-control" id="date" />
                                <?= isset($errors['end_date']) ? '<span id="error-name" class="text-danger">'.$errors['end_date'].'</span>' : ''?>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                <a href="" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                <a href="/admin/coupon/list" class=""> <button type="button" class="btn btn-success m-2">Danh sách</button></a>
            </div>
            </form>

        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>