<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm danh mục</li>
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
            <form id="submit-form" action="/admin/category/add" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">MÃ DANH MỤC (Tự động tăng)</label>
                                <input type="text" class="form-control" id="code" placeholder="Mã danh mục tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="name-category">TÊN DANH MỤC</label>
                                <input value="<?=isset($old_field['name']) ? $old_field['name'] : ''?>" name="name" type="text" class="form-control " id="name-category" placeholder="Nhập tên danh mục">
                                <?= isset($errors['name']) ? '<span id="error-name" class="text-danger">'.$errors['name'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>

                            <div class="form-group">
                                <label>DANH MỤC</label>
                                <select name="category" class="custom-select">
                                <option value="0">-- Danh mục gốc --</option>
                                    <?php foreach($list as $key => $value){?>
                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
                    <a href="/admin/category/add" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                    <a href="/admin/category/list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>

        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>