<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger confirm-delete">Xóa</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="error-empty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title custom-error-lable" id="exampleModalLabel">Bạn chưa chọn mục nào</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Xác nhận</button>
            </div>
        </div>
    </div>
</div>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa thông tin <?=$item['value']?> cho sản phẩm <?=$item['name']?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa màu sắc</li>
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


            <form id="submit-form" action="/admin/color-product-update/<?=$item['id']?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="old_image" type="hidden" value="<?=$dataColor['thumb']?>"  >
                                <input name="color_product_id" type="hidden" value="<?=$dataColor['id']?>"  >
                                <label for="ma_hh">MÃ MÀU SẢN PHẨM (Tự động tăng)</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="Tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">GIẢM GIÁ</label>
                                <input value="<?=$dataColor['price_sale']?>" name="price_sale" type="text" class="form-control" id="giam_gia" placeholder="Nhập giảm giá">
                                <?= isset($errors['price_sale']) ? '<span id="error-name" class="text-danger">'.$errors['price_sale'].'</span>' : ''?>
                            </div>
                           




                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quantity">SỐ LƯỢNG</label>
                                <input value="<?=$dataColor['quantity']?>" name="quantity" type="text" class="form-control" id="quantity" placeholder="Nhập số lượng sản phẩm">
                                <?= isset($errors['quantity']) ? '<span id="error-name" class="text-danger">'.$errors['quantity'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                            <label for="confirm_password">TRẠNG THÁI</label>
                            <div class="custom-control custom-switch">
                                <input  <?=$dataColor['active'] == 0 ? 'checked' : ''?> type="checkbox" class="custom-control-input" id="kich-hoat" name="active">
                                <label class="custom-control-label" for="kich-hoat">Kích hoạt ?</label>
                            </div>
                        </div>
                          
                            
                           
                        </div>

                        <div class="col-md-4">


                            <div class="form-group">
                                <label for="don_gia">ĐƠN GIÁ</label>
                                <input value="<?=$dataColor['price']?>" name="price" type="number" class="form-control" id="don_gia" placeholder="Nhập đơn giá">
                                <?= isset($errors['price']) ? '<span id="error-name" class="text-danger">'.$errors['price'].'</span>' : ''?>
                            </div>

                        </div>
                       

                    </div>

                    <h5>Định danh hàng hóa</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">THAY ĐỔI HÌNH ẢNH ĐẠI DIỆN</label>
                                <div class="custom-file ">

                                    <input accept="image/*" name="thumb" type="file" class=" custom-file-input" id="customFile">
                                    <label class="custom-file-label customFile" for="customFile">Chọn một ảnh đại diện màu sản phẩm</label>
                                </div>
                            </div>
                           
                            <div class="filtr-item col-sm-4" >
                                <img id="#imgSrc" src="<?=IMAGE_DIR_PRODUCT.$dataColor['thumb']?>" class="img-fluid mb-2" alt="white sample" />
                            </div>
                            <?= isset($errors['thumb']) ? '<span id="error-name" class="text-danger">'.$errors['thumb'].'</span>' : ''?>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-12 col-sm-8">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">THÊM VÀ XÓA THƯ VIỆN HÌNH ẢNH</label>
                                <div class="custom-file ">

                                    <input id="uploadMultiple" accept="image/*" name="library[]" type="file" class=" custom-file-input" multiple>
                                    <label class="multiple custom-file-label customFile" for="customFile">Chọn nhiều ảnh cho thư viện sản phẩm</label>
                                </div>
                            </div>
                           
                            <div class="row render-library my-4">
                                <?php foreach($dataLibraryColor as $key => $value){?>
                                    <div id="delete-<?=$value['id']?>" class="filtr-item col-sm-3 " >
                                        <div class=" position-relative">
                                        <div data-delete="<?=$value['id']?>" style="font-size : 20px;width : 25px; height : 25px; cursor: pointer;" class="delete-library d-flex justify-content-center align-items-center position-absolute top-0 start-0 translate-middle badge border border-light rounded-circle bg-danger ">&times;</div>
                                       <img style="width : 180px; height: 220px;object-fit: cover;" id="#imgSrc" src="<?=IMAGE_DIR_LIBRARY.$value['thumb']?>" class=" mb-2" alt="white sample" />
                                        </div>
                                    </div>
                                <?php }?>
                               
                                
                            </div>
                            <div class="row append-image"></div>
                            
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                    <a href="" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>



        </div>
    </div>
</section>
<script type="text/javascript">
    var idDelete = 0;
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
    $(".delete-library").click(function() {
        
        idDelete = $(this).attr("data-delete");
        $('.confirm-delete').attr('type-delete', 'single');
        $('#exampleModalLabel').text(`Bạn có chắc muốn xóa "Hình này" không`);
        $('#exampleModal').modal('toggle');
    });
    $('.confirm-delete').click(function() {
        $('#exampleModal').modal('toggle');
        $.ajax({
                method: "POST",
                url: "/admin/library-product/delete/ajax",
                data: {
                    id: idDelete,
                }
            })
            .done(function(msg) {
                msg = JSON.parse(msg);
                if (msg.status == "success") {
                    $('#delete-' + idDelete).remove();
                }else {
                    $('.custom-error-lable').text('Xóa thất bại');
                    $('#error-empty').modal('toggle');
                }
            });

    });
    
    function preview_image(event) {
        var total_file = document.getElementById("uploadMultiple").files.length;
        $('.append-image').empty();
        for (var i = 0; i < total_file; i++) {
           
            $(".append-image").append(`
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