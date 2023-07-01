<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa khách hàng "<?=$item['name']?>"</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa người dùng</li>
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
            <form id="submit-form" action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ma-khach-hang">SỐ ĐIỆN THOẠI</label>
                            <input name="old_image" type="hidden" value="<?=$item['image']?>"  >
                            <input value="<?=$item['phone_number']?>" name="phone_number" type="text" class="form-control" id="ma-khach-hang" placeholder="Số điện thoại">
                            <?= isset($errors['phone_number']) ? '<span id="error-name" class="text-danger">'.$errors['phone_number'].'</span>' : ''?>
                        </div>

                        <div class="form-group">
                            <label for="password">MẬT KHẨU</label>
                            <input value="" name="password" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                            <?= isset($errors['password']) ? '<span id="error-name" class="text-danger">'.$errors['password'].'</span>' : ''?>
                        </div>
                        <div class="form-group">
                            <label for="email">ĐỊA CHỈ EMAIL</label>
                            <input  value="<?=$item['email']?>" name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                            <?= isset($errors['email']) ? '<span id="error-name" class="text-danger">'.$errors['email'].'</span>' : ''?>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input  <?=$item['active'] == 0 ? 'checked' : ''?> type="checkbox" class="custom-control-input" id="kich-hoat" name="active">
                                <label class="custom-control-label" for="kich-hoat">Kích hoạt ?</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">HỌ VÀ TÊN</label>
                            <input  value="<?=$item['name']?>" name="name" type="text" class="form-control" id="name" placeholder="Nhập tên khách hàng">
                            <?= isset($errors['name']) ? '<span id="error-name" class="text-danger">'.$errors['name'].'</span>' : ''?>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">XÁC NHẬN MẬT KHẨU</label>
                            <input value="" name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Nhập mật khẩu">
                            <?= isset($errors['confirm_password']) ? '<span id="error-name" class="text-danger">'.$errors['confirm_password'].'</span>' : ''?>
                        </div>
                        <div class="form-group">
                            <label>VAI TRÒ</label>
                            <select id="vai-tro" name="role" class="custom-select">
                                <option <?=$item['role'] == 0 ? 'selected' : ''?> value="0" selected>Khách hàng</option>
                                <option <?=$item['role'] == 1 ? 'selected' : ''?> value="1">Nhân viên</option>

                            </select>
                        </div>



                    </div>

                </div>

                <h5>Định danh khách hàng</h5>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">HÌNH ẢNH</label>
                            <div class="custom-file">

                                <input  name="image" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label customFile" for="customFile">Chọn một ảnh đại diện sản phẩm</label>
                            </div>
                        </div>
                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                            <img id="#imgSrc" src="<?=$item['image'] ? IMAGE_DIR_USER.$item['image']: 'https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png'?>" class="img-fluid mb-2" alt="white sample" />
                        </div>
                        <?= isset($errors['image']) ? '<span id="error-name" class="text-danger">'.$errors['image'].'</span>' : ''?>
                    </div>



                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                <a href="" class=""><button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                <a href="/admin/user/list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                <a href="/admin/user/add" class=""> <button type="button" class="btn btn-info m-2">Thêm mới</button></a>
            </div>
       </form>

        </div>
    </div>
</section>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-fluid").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#customFile").change(function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".customFile").addClass("selected").html(fileName);
        readURL(this);
    });
    
</script>
<?php $this->loadView('admin/Layout/footer') ?>