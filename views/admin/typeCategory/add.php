<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm Biến thể cho nền tảng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm biến thể</li>
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
            <form id="submit-form" action="/admin/value-category/add" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NỀN TẢNG</label>
                                <select name="category_id" class="custom-select">
                                    <?php foreach($listCategory as $key => $value){?>
                                        <option <?=isset($old_field['category_id']) &&  $old_field['category_id'] == $value['id'] ? 'selected': ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                    <?php } ?>
                                </select>
                                <?= isset($errors['name']) ? '<span id="error-name" class="text-danger">'.$errors['name'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label>LOẠI BIẾN THỂ</label>
                                <select name="type_id" class="custom-select">
                                    <?php foreach($listType as $key => $value){?>
                                        <option <?=isset($old_field['type_id']) &&  $old_field['type_id'] == $value['id'] ? 'selected': ''?> value="<?=$value['id']?>"><?=$value['description']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
                    <a href="/admin/value-categoy/add" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                    <a href="/admin/value-category/list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>

        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>