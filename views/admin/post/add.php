<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm bài đăng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm bài đăng</li>
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
                                <label for="ma_hh">MÃ BÀI ĐĂNG (Tự động tăng)</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="Tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">TIÊU ĐỀ</label>
                                <input value="<?=isset($old_field['title']) ? $old_field['title'] : ''?>" name="title" type="text" class="form-control" id="giam_gia" placeholder="Nhập tiêu đề">
                                <?= isset($errors['title']) ? '<span id="error-name" class="text-danger">'.$errors['title'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                            <div class="form-group">
                                <label>DANH MỤC BÀI VIẾT</label>
                                <select name="category_id" class="custom-select">
                                        <?php foreach($listCategory as $key => $value){?>
                                            <option  <?= isset($old_field['category_id']) && $old_field['category_id'] == $value['id'] ? 'selected' : ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                        <?php }?>
                                   
                                        
                                    
                                </select>
                            </div>




                        </div>
                        <div class="col-md-12">
                           
                        <div class="form-group">
                                <label for="giam_gia">MÔ TẢ</label>
                                <input value="<?=isset($old_field['description']) ? $old_field['description'] : ''?>" name="description" type="text" class="form-control" id="giam_gia" placeholder="Nhập mô tả">
                                <?= isset($errors['description']) ? '<span id="error-name" class="text-danger">'.$errors['description'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
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

                    <h5>Định danh bài viết</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">HÌNH ẢNH</label>
                                <div class="custom-file ">

                                    <input accept="image/*" name="thumb" type="file" class=" custom-file-input" id="customFile">
                                    <label class="custom-file-label customFile" for="customFile">Chọn một ảnh đại diện bài viết</label>
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