<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>




<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa sản phẩm "<?= $dataColorProductCurrent['product_name'] ?>" Trong đơn hàng Anh Chị :<?= $dataColorProductCurrent['name'] ?> Mã đơn hàng :<?= $dataColorProductCurrent['CODE'] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách phí vận chuyển</li>
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
                <h3 class="card-title">Thay đổi thông tin sản phẩm</h3>
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
                    

                   <?php foreach($dataListColorProductInit as $key => $value){?>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light"><img src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>" style="width : 120px; height : 80px; object-fit:cover "/></span>
                            <div class="info-box-content">
                                <span class="info-box-text">+ <?=currency_format($value['price'] - ($value['price'] * $value['price_sale'])) ?></span>
                                
                                   <div class="custom-control custom-radio">
                                        <input <?=$value['id'] == $dataColorProductCurrent['product_color_id'] ? 'checked' : '' ?> class="custom-control-input click-color-product" type="radio" id="customRadio<?=$key?>" name="color_product_id" value="<?=$value['id']?>">
                                        <label for="customRadio<?=$key?>" class="custom-control-label"><?=$value['value']?></label>
                                    </div>
                                
                            </div>

                        </div>

                    </div>
                   <?php }?>

                </div>
                <div class="row">
                <div class="col-md-2">
                <div class="form-group">
                                <label for="giam_gia">Số lượng</label>
                                <input value="<?=$dataColorProductCurrent['quantity']?>" name="quantity" type="text" class="form-control" id="giam_gia" placeholder="Nhập số lượng">
                
                            </div>
                        </div>
                </div>


            </div>
                <div class="card-body">
                    <div class="row" id="show-change-attribute">
                        <?php foreach ($dataListAttributeProductCurrent as $key => $value) { ?>
                            <div class="col-md-2" >
                                <div class="form-group">
                                    <label><?= $value['description'] ?></label>

                                    <select name="attribute_price_id[]" class="get-value custom-select">
                                        <?php foreach ($dataListAttributeProductInit as $key1 => $value1) {
                                            if ($value1['type_id'] == $value['type_id']) { ?>
                                                <option <?= $value['attribute_price_id'] == $value1['attribute_price_id'] ? 'selected' : '' ?> value="<?= $value1['attribute_price_id'] ?>"><?= $value1['type_name'] ?> - <?= $value1['value'] ?> </option>
                                        <?php }
                                        } ?>

                                    </select>

                                </div>
                            </div>
                        <?php } ?>



                       
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success m-2">Cập nhật</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>


            <div class="card-footer">
                <a href="" class=""><button type="button" class="btn btn-warning m-2 ">Nhập lại</button></a>


            </div>


        </div>
    </div>
</section>
<script>
      $(document).on("click", ".click-color-product", function() {
          var colorProductId = $(this).val();
          $.ajax({
                method: "POST",
                url: "/api/admin/change-order",
                data: {
                    id: colorProductId,

                }
            })
            .done(function(msg) {
                
                $('#show-change-attribute').html(msg);
            });
      });
  
</script>
<?php $this->loadView('admin/Layout/footer') ?>