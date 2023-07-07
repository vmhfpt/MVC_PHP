<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm mã giảm giá</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm mã giảm giá</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
  

      <?= isset($errors) ? ' <div class="alert alert-danger"> <span class="">Lỗi</span></div>' : ''?>

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
            <form id="submit-form" action="/admin/brand/add" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">CODE (Ngẫu nhiên)</label>
                                <input type="text" class="form-control" id="code" placeholder="Hdedf234nd" >
                            </div>

                            <div class="form-group">
                                <label for="name-category">TÊN</label>
                                <input value="<?=isset($old_field['name']) ? $old_field['name'] : ''?>" name="name" type="text" class="form-control " id="name-category" placeholder="Nhập tên">
                                <?= isset($errors['name']) ? '<span id="error-name" class="text-danger">'.$errors['name'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                            <div class="form-group">
                                <label for="name-category">SỐ LƯỢNG</label>
                                <input value="<?=isset($old_field['usage_limit']) ? $old_field['usage_limit'] : ''?>" name="usage_limit" type="number" class="form-control " id="name-category" placeholder="Nhập số lượng">
                                <?= isset($errors['usage_limit']) ? '<span id="error-name" class="text-danger">'.$errors['usage_limit'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                            <div class="form-group">
                                <label>LOẠI ƯU ĐÃI</label>
                                <select name="type" class="custom-select">
                                   <option value="0">% (phần trăm)</option>
                                   <option value="1">Giá tùy chọn</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name-category">GIÁ ƯU ĐÃI</label>
                                <input value="<?=isset($old_field['discount_amount']) ? $old_field['discount_amount'] : ''?>" name="discount_amount" type="number" class="form-control " id="name-category" placeholder="Nhập giá ưu đãi">
                                <?= isset($errors['discount_amount']) ? '<span id="error-name" class="text-danger">'.$errors['discount_amount'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>

                        </div>
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
                    <a href="/admin/brand/add" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                    <a href="/admin/brand/list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>

        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>