
<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa giá trị "<?=$item['value']?>" thuộc biến thể "<?=$item['description']?>" </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa giá trị</li>
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
                                <label for="code">MÃ GIÁ TRỊ (Tự động tăng)</label>
                                <input name="description" type="hidden" value="<?=$item['description']?>" >
                                <input type="text" class="form-control" id="code" placeholder="Mã giá trị tự động tăng" disabled>
                            </div>
                            <div class="form-group">
                                <label>BIẾN THỂ</label>
                                <select name="type_id" class="custom-select">
                                    
                                    <?php foreach($list as $key => $value){?>
                                        <option <?=$item['type_id'] == $value['id'] ? "selected" : "" ?> value="<?=$value['id']?>"><?=$value['description']?></option>
                                    <?php }?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name-category">TÊN GIÁ TRỊ</label>
                                <input value="<?=$item['value']?>" name="value" type="text" class="form-control " id="name-category" placeholder="Nhập tên giá trị">
                                <?= isset($errors['value']) ? '<span id="error-name" class="text-danger">'.$errors['value'].'</span>' : ''?>
                            </div>

                          
                        </div>
                    </div>



                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                <a href="" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                <a href="/admin/value/list" class=""> <button type="button" class="btn btn-success m-2">Danh sách</button></a>
            </div>
            </form>

        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>