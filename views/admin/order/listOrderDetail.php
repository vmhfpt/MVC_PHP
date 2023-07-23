<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách Đơn hàng anh chị <?=$item['name']?></h3>
                    </div>
                    <div class="wrapper">



                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Chi tiết đơn hàng</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">


                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Ảnh</th>
                                                            <th>Tên</th>

                                                            <th>Giá</th>
                                                            <th>Số lượng</th>
                                                            <th>Màu sắc</th>
                                                            <th>Biến thể</th>
                                                            <th>Tổng</th>
                                                            <th >Sửa</th>
                                                            <th> Xóa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                       
                                                        $totalProduct = 0;
                                                        $totalOrder = 0;
                                                        $arrColor = ['bg-primary', 'bg-danger', 'bg-success', 'bg-secondary', 'bg-warning', 'bg-info', 'bg-dark']; 
                                                        foreach ($dataItem as $key => $value) {

                                                            $totalProduct = $totalProduct  + $value['quantity'];
                                                            $totalPrice =  $value["init_price"] + ($value['price'] - ($value['price'] * $value['price_sale']));
                                                        ?>
                                                            <tr id="data-delete-<?=$value['id']?>">
                                                                <td><?= $key + 1 ?></td>
                                                                <td> <img src="<?= IMAGE_DIR_PRODUCT.$value['thumb'] ?>" width="80" height="80"></td>
                                                                <td><?= $value['name'] ?></td>

                                                                <td><?= currency_format($value["init_price"]) ?></td>
                                                                <td><?= $value['quantity'] ?></td>
                                                                <td> 
                                                                           <a class="badge bg-info p-2">
                                                                            <span class="badge bg-dark"><?= $value['value']?></span>
                                                                             <span>+ <?= currency_format(($value['price'] - ($value['price'] * $value['price_sale']))) ?> </span>
                                                                            </a>
                                                                <td> 
                                                                    <?php $totalPrice2 = 0; foreach($this->product->getAttributePriceProductByOrderDetailID($value['id']) as $key1 => $value1){  
                                                                        $totalPrice2 = $totalPrice2 + ($value1['price'] - ($value1['price'] * $value1['price_sale']));
                                                                     ?>
                                                                        <a class="badge <?=$arrColor[$key1]?> p-2">
                                                                            <span class="badge bg-dark"><?=$value1['description']?></span>
                                                                            <span class="badge bg-light"><?=$value1['value']?></span>
                                                                             <span>+ <?=currency_format($value1['price'] - ($value1['price'] * $value1['price_sale']))?> </span>
                                                                            </a>
                                                                     <?php }?>
                                                                 </td>
                                                                <td> <?=currency_format($value['quantity'] * ($totalPrice+$totalPrice2))?> </td>
                                                                </td>
                                                                <td class=""><a class="btn btn-info btn-sm" href="/admin/order/change/<?=$value['product_id']?>/<?=$value['product_color_id']?>/<?=$item['id']?>/<?=$value['id']?>">
                                                                    <i class="fas fa-pencil-alt">
                                                                    </i>
                                                                    Sửa
                                                                    </a></td>
                                                                <td><a data-order="<?=$item['id']?>" data-order-detail="<?=$value['id']?>"  data-total="<?= $value['quantity'] * ($totalPrice+$totalPrice2)?>" href="javascript:;" class="btn btn-danger btn-delete-admin"><i class="fas fa-trash"></i></a></td>
                                                            </tr>

                                                        <?php
                                                                $totalOrder = $totalOrder + ($value['quantity'] * ($totalPrice+$totalPrice2));
                                                        }
                                                        ?>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            
                                                            <th>Tổng sản phẩm <?= $totalProduct ?>
                                                            </th>
                                                            <th>Tổng tiền :<?= currency_format($totalOrder) ?></th>
                                                            <th></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>

            <form id="submit-form" action="" method="POST" >
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="">Thêm sản phẩm vào đơn hàng</h3>
                        </div>
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>TÊN SẢN PHẨM</label>
                            
                                <select id="select-product"  class="get-value custom-select">
                                       <option value="">-- Lựa chọn --</option>
                                       <?php foreach($listProduct as $key => $value){?>
                                          <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                       <?php }?>
                                      
                                </select>
                                <?= isset($errors['city_id']) ? '<span id="error-name" class="text-danger">'.$errors['city_id'].'</span>' : ''?>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>MÀU SẢN PHẨM</label>
                                <select id="show-color-product" name="color_product_id" class="get-value custom-select">
                                       <option value="">-- Lựa chọn --</option>
                                      
                                </select>
                               
                            </div>
                        </div>
                      
                        
                        
                    </div>
                    <div class="row show-attribute-product-list">
                       
                    </div>
                </div>
            </form>


                        <div id="sidebar-overlay"></div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</section>

<script>
    $('#select-product').change(function() {
        if ($(this).val() == '') {
            $('#show-color-product').empty();
            $('.show-attribute-product-list').empty();
                $('#show-color-product').append(`<option value="">-- Lựa chọn --</option>`);
        } else {
            $.ajax({
                 method: "POST",
                 url: "/admin/order/get-color",
                 data: {
                     product_id : $(this).val()
                 }
             })
             .done(function(msg) {
                $('.show-attribute-product-list').empty();
                $('#show-color-product').empty();
                $('#show-color-product').append(`<option value="">-- Lựa chọn --</option>`);
                
                 msg = JSON.parse(msg);
                 msg.map((value, key) => {
                        $('#show-color-product').append(`<option value=${value.id}>${value.value}</option>`);
                })
                 
             });
       
        }

    });

    $('#show-color-product').change(function() {
        if ($(this).val() == '') {
            $('.show-attribute-product-list').empty();
            //  $('#show-color-product').empty();
            //  $('#show-color-product').append(`<option value="">-- Lựa chọn --</option>`);
        } else {
        
            $.ajax({
                 method: "POST",
                 url: "/admin/order/get-list-attribute-price",
                 data: {
                     id : $(this).val()
                 }
             })
             .done(function(msg) {
                $('.show-attribute-product-list').html(msg);
                // $('#show-color-product').empty();
                // $('#show-color-product').append(`<option value="">-- Lựa chọn --</option>`);
                
                //  msg = JSON.parse(msg);
                //  msg.map((value, key) => {
                //         $('#show-color-product').append(`<option value=${value.id}>${value.value}</option>`);
                // })
                 
             });
       
        }

    });







    $(document).on("click", ".btn-delete-admin", function(e) {
        if (confirm("Bạn có chắc muốn xóa không") == true) {
            
            var total = $(this).attr("data-total");
            var order_detail_id = $(this).attr("data-order-detail");
            var order_id = $(this).attr("data-order");
            $.ajax({
                 method: "POST",
                 url: "/admin/order/delete",
                 data: {
                     total : total,
                     order_detail_id : order_detail_id,
                     order_id : order_id
                 }
             })
             .done(function(msg) {
                
                 msg = JSON.parse(msg);
                 if (msg.status == 'success') {
                    location.reload();
                 }
                 
             });
        } 
    });
</script>
<?php $this->loadView('admin/Layout/footer') ?>