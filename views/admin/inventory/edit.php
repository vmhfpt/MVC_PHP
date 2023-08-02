<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa giá biến thể Bộ nhớ trong ROM: 64Gb cho sản phẩm Iphone 13  Màu đen</h1>
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
    <?php if (isset($status)) { ?>
            <div class="alert alert-success">
                <strong>Thành công</strong><?= $status ?>
            </div>

        <?php } ?>
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
                                <input type="text" class="form-control" id="ma_hh" placeholder="<?=$item['name']?>" disabled="">
                            </div>

                           
                            <div class="form-group">
                                <label for="giam_gia">SỐ LƯỢNG THỰC TẾ TRONG KHO</label>
                                <input value="<?=$item['quantity_in_inventory']?>" name="quantity_in_inventory" type="number" class="form-control" id="giam_gia" placeholder="Số lượng">
                                                            </div>
                           




                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="ma_hh">MÀU SẢN PHẨM</label>
                                <input type="text" class="form-control" id="ma_hh" placeholder="<?=$item['value']?>" disabled="">
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">SỐ LƯỢNG HÀNG LỖI</label>
                                <input value="<?=$item['quantity_product_error']?>" name="quantity_product_error" type="text" class="form-control" id="giam_gia" placeholder="Nhập số lượng hàng lỗi">
                            </div>

                        </div>

                        <div class="col-md-4">

                        <div class="form-group">
                                <label>VỊ TRÍ KHO</label>
                                <select name="address_id" class="custom-select">
                                    <?php foreach($dataAddress as $key => $value){?>
                                        <option <?=$item['address_id'] == $value['id'] ? "selected" : ""?> value="<?=$value['id']?>" class=""><?=$value['name']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        
                          




                        </div>
                      

                    </div>


                    <div class="row">
                        <div class="col-12 col-sm-6">
                            
                           
                            <div class="filtr-item col-sm-4" data-category="1" data-sort="white sample">
                                <img style="width : 150px; height : 150px ; object-fit: cover;" id="#imgSrc" src="<?=IMAGE_DIR_PRODUCT.$item['thumb']?>">
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