<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>





<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa thông tin flash sale sản phẩm <?=$item['name']?> </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa flash sale</li>
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


            <form id="submit-form" action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                               
                                <label for="ma_hh">TÊN SẢN PHẨM</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="<?=$item['name']?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">GIẢM GIÁ FLASH SALE (%)</label>
                                <input value="<?=$item['discount_new']?>" name="discount_new" type="text" class="form-control" id="giam_gia" placeholder="Nhập giảm giá">
                                <?= isset($errors['discount_new']) ? '<span id="error-name" class="text-danger">'.$errors['discount_new'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label for="giam_gia">NGÀY BẮT ĐẦU </label>
                                <input id="party" type="datetime-local" name="start_date" value="<?=substr($item['start_date'], 0, 16)?>" class="form-control" />
                                <?= isset($errors['start_date']) ? '<span id="error-name" class="text-danger">'.$errors['start_date'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label for="giam_gia">NGÀY KẾT THÚC </label>
                                <input id="party" type="datetime-local" name="end_date" value="<?=substr($item['end_date'], 0, 16)?>" class="form-control" />
                            </div>
                           

                           <!-- 2017-06-01T08:30 -->




                        </div>
                      

                       
                       

                    </div>

                    <h5>Hình sản phẩm</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                        <div class="filtr-item col-sm-4" >
                                <img id="#imgSrc" src="<?=IMAGE_DIR_PRODUCT.$item['thumb']?>" class="img-fluid mb-2" alt="white sample" />
                            </div>
                        </div>

                    </div>
                   

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                    <a href="/admin/flashsale/list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>



        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>