<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm hàng hóa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm hàng hóa</li>
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
                                <label for="ma_hh">MÃ HÀNG HÓA (Tự động tăng)</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="Tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">GIẢM GIÁ</label>
                                <input value="<?=isset($old_field['price_sale']) ? $old_field['price_sale'] : ''?>" name="price_sale" type="text" class="form-control" id="giam_gia" placeholder="Nhập giảm giá">
                                <?= isset($errors['price_sale']) ? '<span id="error-name" class="text-danger">'.$errors['price_sale'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                            <div class="form-group">
                                <label>DANH MỤC HÀNG HÓA</label>
                                <select name="category_id" class="custom-select">
                                        <?php foreach($listCategory as $key => $value){?>
                                            <option  <?= isset($old_field['category_id']) && $old_field['category_id'] == $value['id'] ? 'selected' : ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                        <?php }?>
                                   
                                        
                                    
                                </select>
                            </div>




                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">TÊN HÀNG HÓA</label>
                                <input value="<?=isset($old_field['name']) ? $old_field['name'] : ''?>" name="name" type="text" class="form-control" id="name" placeholder="Nhập tên hàng hóa">
                                <?= isset($errors['name']) ? '<span id="error-name" class="text-danger">'.$errors['name'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>

                            <div class="form-group">
                                <label>SỐ LƯỢT XEM</label>
                                <input type="number" class="form-control" placeholder="0" disabled>
                            </div>
                            <div class="form-group">
                                <label>THƯƠNG HIỆU</label>
                                <select name="brand_id" class="custom-select">

                                   
                                      <?php foreach($listBrand as $key => $value){?>
                                            <option <?= isset($old_field['brand_id']) && $old_field['brand_id'] == $value['id'] ? 'selected' : ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                        <?php }?>
                                    
                                </select>
                            </div>
                           
                        </div>

                        <div class="col-md-4">


                            <div class="form-group">
                                <label for="don_gia">ĐƠN GIÁ</label>
                                <input value="<?=isset($old_field['price']) ? $old_field['price'] : ''?>" name="price" type="number" class="form-control" id="don_gia" placeholder="Nhập đơn giá">
                                <?= isset($errors['price']) ? '<span id="error-name" class="text-danger">'.$errors['price'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>


                            <div class="form-group">
                                <label for="confirm_password">HÀNG ĐẶC BIỆT?</label>
                                <div class="custom-control border border-success rounded ">
                                    <div class="row">
                                        <div style="width : 140px ;padding : 5.9px 0px;" class=" custom-radio ml-3">
                                            <input value="0" name="view_model" class="custom-control-input custom-control-input-danger" type="radio" id="customRadio3" checked="">
                                            <label for="customRadio3" class="custom-control-label">Mua nhiều nhất</label>
                                        </div>
                                        <div style="width : 130px;padding : 5.9px 0px;" class=" custom-radio ">
                                            <input value="1" name="view_model" class="custom-control-input custom-control-input-danger" type="radio" id="customRadio4">
                                            <label for="customRadio4" class="custom-control-label">Sản phẩm hot</label>
                                        </div>
                                        <div style="width : 130px;padding : 5.9px 0px;" class=" custom-radio ">
                                            <input value="2" name="view_model" class="custom-control-input custom-control-input-danger" type="radio" id="customRadio5">
                                            <label for="customRadio5" class="custom-control-label">Bán chạy</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                            <label for="confirm_password">TRẠNG THÁI</label>
                            <div class="custom-control custom-switch">
                                <input  <?=isset($old_field['active']) && $old_field['active'] == 0 ? 'checked' : ''?> type="checkbox" class="custom-control-input" id="kich-hoat" name="active">
                                <label class="custom-control-label" for="kich-hoat">Kích hoạt ?</label>
                            </div>
                        </div>




                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NỘI DUNG</label>
                                <textarea name="content" id="compose-textarea" class="form-control" style="height: 300px !important"><?=isset($old_field['content']) ? $old_field['content'] : ''?> </textarea>
                                <?= isset($errors['content']) ? '<span id="error-name" class="text-danger">'.$errors['content'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                        </div>

                    </div>

                    <h5>Định danh hàng hóa</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">HÌNH ẢNH</label>
                                <div class="custom-file ">

                                    <input accept="image/*" name="thumb" type="file" class=" custom-file-input" id="customFile">
                                    <label class="custom-file-label customFile" for="customFile">Chọn một ảnh đại diện sản phẩm</label>
                                </div>
                            </div>
                           
                            <div class="filtr-item col-sm-4" data-category="1" data-sort="white sample">
                                <img id="#imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" class="img-fluid mb-2" alt="white sample" />
                            </div>
                            <?= isset($errors['thumb']) ? '<span id="error-name" class="text-danger">'.$errors['thumb'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                        </div>



                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
                    <a href="" class=""><button type="button" class="btn btn-danger m-2">Nhập lại</button> </a>
                    <a href="list/" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
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
    $.getScript('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js', function() {
        $('#compose-textarea').summernote();

    });
</script>
<?php $this->loadView('admin/Layout/footer') ?>