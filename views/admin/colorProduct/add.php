<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thiết lập thông tin <?=$item['value']?> cho sản phẩm <?=$item['name']?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thiết lập màu sắc</li>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ma_hh">MÃ MÀU SẢN PHẨM (Tự động tăng)</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="Tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">GIẢM GIÁ</label>
                                <input value="<?=isset($old_field['price_sale']) ? $old_field['price_sale'] : ''?>" name="price_sale" type="text" class="form-control" id="giam_gia" placeholder="Nhập giảm giá">
                                <?= isset($errors['price_sale']) ? '<span id="error-name" class="text-danger">'.$errors['price_sale'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                           




                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quantity">SỐ LƯỢNG</label>
                                <input value="<?=isset($old_field['quantity']) ? $old_field['quantity'] : ''?>" name="quantity" type="text" class="form-control" id="quantity" placeholder="Nhập số lượng sản phẩm">
                                <?= isset($errors['quantity']) ? '<span id="error-name" class="text-danger">'.$errors['quantity'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                            <div class="form-group">
                            <label for="confirm_password">TRẠNG THÁI</label>
                            <div class="custom-control custom-switch">
                                <input  <?=isset($old_field['active']) && $old_field['active'] == 0 ? 'checked' : ''?> type="checkbox" class="custom-control-input" id="kich-hoat" name="active">
                                <label class="custom-control-label" for="kich-hoat">Kích hoạt ?</label>
                            </div>
                        </div>
                          
                            
                           
                        </div>

                        <div class="col-md-4">


                            <div class="form-group">
                                <label for="don_gia">ĐƠN GIÁ</label>
                                <input value="<?=isset($old_field['price']) ? $old_field['price'] : ''?>" name="price" type="number" class="form-control" id="don_gia" placeholder="Nhập đơn giá">
                                <?= isset($errors['price']) ? '<span id="error-name" class="text-danger">'.$errors['price'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>

                        </div>
                       

                    </div>

                    <h5>Định danh hàng hóa</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">HÌNH ẢNH ĐẠI DIỆN</label>
                                <div class="custom-file ">

                                    <input accept="image/*" name="thumb" type="file" class=" custom-file-input" id="customFile">
                                    <label class="custom-file-label customFile" for="customFile">Chọn một ảnh đại diện màu sản phẩm</label>
                                </div>
                            </div>
                           
                            <div class="filtr-item col-sm-4" >
                                <img id="#imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" class="img-fluid mb-2" alt="white sample" />
                            </div>
                            <?= isset($errors['thumb']) ? '<span id="error-name" class="text-danger">'.$errors['thumb'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-12 col-sm-8">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">THƯ VIỆN HÌNH ẢNH</label>
                                <div class="custom-file ">

                                    <input id="uploadMultiple" accept="image/*" name="library[]" type="file" class=" custom-file-input" multiple>
                                    <label class="multiple custom-file-label customFile" for="customFile">Chọn nhiều ảnh cho thư viện sản phẩm</label>
                                </div>
                            </div>
                           
                            <div class="row render-library">
                                <div class="filtr-item col-sm-3" >
                                    <img id="#imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" class=" mb-2" alt="white sample" />
                                </div>
                                <div class="filtr-item col-sm-3" >
                                    <img id="#imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" class=" mb-2" alt="white sample" />
                                </div>
                                <div class="filtr-item col-sm-3" >
                                    <img id="#imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" class=" mb-2" alt="white sample" />
                                </div>
                                <div class="filtr-item col-sm-3" >
                                    <img id="#imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" class=" mb-2" alt="white sample" />
                                </div>
                                
                            </div>
                            <?= isset($errors['library']) ? '<span id="error-name" class="text-danger">'.$errors['library'].'</span>' : '<span id="error-name" class="text-danger">* Phải ít nhất 2 hình ảnh cho thư viện sản phẩm</span>'?>
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
                    <a href="" class=""><button type="button" class="btn btn-danger m-2">Nhập lại</button> </a>
                    <a href="" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>



        </div>
    </div>
</section>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {

            $('#error-customFile').text("");
            $('.custom-file-label').removeClass("border-danger");
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
    
    function preview_image(event) {
        var total_file = document.getElementById("uploadMultiple").files.length;
        $('.render-library').empty();
        for (var i = 0; i < total_file; i++) {
           
            $(".render-library").append(`
                <div class="filtr-item col-sm-3" >
                    <img style="width : 160px; height : 190px;" id="#imgSrc" src="${URL.createObjectURL(event.target.files[i])}" class=" mb-2" alt="white sample" />
                </div>
            `);
        }
   } 

    $("#uploadMultiple").change(function (event) {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".multiple").addClass("selected").html(fileName);
        $(".custom-upload-item").remove();
        preview_image(event);
    });
</script>
<?php $this->loadView('admin/Layout/footer') ?>