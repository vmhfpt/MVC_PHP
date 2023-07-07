<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa giá biến thể <?=$detail['description'].": ". $detail['value']?> cho sản phẩm <?=$detail['name_product']?>  <?=$detail['color']?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa giá biến thể</li>
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

            <form id="submit-form" action="" method="POST" >
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ma_hh">TÊN SẢN PHẨM</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="<?=$detail['name_product']?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="ma_hh">MÀU SẢN PHẨM</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="<?=$detail['color']?>" disabled>
                            </div>
                            <div class="form-group">
                            <label for="confirm_password">TRẠNG THÁI</label>
                            <div class="custom-control custom-switch">
                                <input  <?=$item['active'] == 0 ? 'checked' : ''?> type="checkbox" class="custom-control-input" id="kich-hoat" name="active">
                                <label class="custom-control-label" for="kich-hoat">Kích hoạt ?</label>
                            </div>
                        </div>
                           




                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                                <label>BIẾN THỂ</label>
                                <input  type="text" class="form-control" placeholder="<?=$detail['description'].": ". $detail['value']?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">SỐ LƯỢNG</label>
                                <input value="<?=$item['quantity']?>" name="quantity" type="text" class="form-control" id="giam_gia" placeholder="Nhập số lượng">
                                <?= isset($errors['quantity']) ? '<span id="error-name" class="text-danger">'.$errors['quantity'].'</span>' : ''?>
                            </div>

                        </div>

                        <div class="col-md-4">

                        <div class="form-group">
                                <label for="giam_gia">ĐƠN GIÁ</label>
                                <input value="<?=$item['price']?>" name="price" type="text" class="form-control" id="giam_gia" placeholder="Nhập đơn giá">
                                <?= isset($errors['price']) ? '<span id="error-name" class="text-danger">'.$errors['price'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label for="giam_gia">GIẢM GIÁ</label>
                                <input value="<?=$item['price_sale']?>" name="price_sale" type="text" class="form-control" id="giam_gia" placeholder="Nhập giảm giá">
                                <?= isset($errors['price_sale']) ? '<span id="error-name" class="text-danger">'.$errors['price_sale'].'</span>' : ''?>
                            </div>
                          




                        </div>
                      

                    </div>


                    <div class="row">
                        <div class="col-12 col-sm-6">
                            
                           
                            <div class="filtr-item col-sm-4" data-category="1" data-sort="white sample">
                                <img id="#imgSrc" src="<?=IMAGE_DIR_PRODUCT.$detail['thumb']?>" />
                            </div>
                        </div>



                    </div>

                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                <a href="" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
               
            </div>
            </form>

        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>