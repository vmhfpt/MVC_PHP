
<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa danh mục bài đăng "<?=$item['name']?>" </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa danh mục bài đăng</li>
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
            <form id="submit-form" action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">MÃ DANH MỤC (Tự động tăng)</label>
                                <input type="text" class="form-control" id="code" placeholder="Mã danh mục tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="name-category">TÊN DANH MỤC</label>
                                <input value="<?=$item['name']?>" name="name" type="text" class="form-control " id="name-category" placeholder="Nhập tên loại hàng">
                                <?= isset($errors['name']) ? '<span id="error-name" class="text-danger">'.$errors['name'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>

                        </div>
                    </div>



                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                <a href="" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                <a href="/admin/category-post/list" class=""> <button type="button" class="btn btn-success m-2">Danh sách</button></a>
            </div>
            </form>

        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>