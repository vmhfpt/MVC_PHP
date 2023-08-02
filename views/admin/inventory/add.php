<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nhập kho hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Nhập kho</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
   
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nhập kho</h3>
                    </div>
                    <div class="wrapper">



                

            <form id="submit-form" action="" method="POST" >
                <div class="card-body">
                    <div class="row next-element">
                        <div class="col-12">
                            <h3 class="">Thêm sản phẩm vào kho</h3>
                        </div>
                        <div class="col-md-2 "> 
                            <div class="form-group">
                                <label>VỊ TRÍ KHO</label>
                                <select  name="inventory_address" class="custom-select">
                                       
                                       <?php foreach($addressInventory as $key => $value){?>
                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                       <?php }?>
                                </select>
                               
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>TÊN SẢN PHẨM</label>
                            
                                <select name="product_id" id="select-product"  class="get-value custom-select">
                                       <option value="">-- Lựa chọn --</option>
                                       <?php foreach($listProduct as $key => $value){?>
                                          <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                       <?php }?>
                                      
                                </select>
                                <?= isset($errors['city_id']) ? '<span id="error-name" class="text-danger">'.$errors['city_id'].'</span>' : ''?>
                            </div>
                        </div>
                        <div class="col-md-2 "> 
                            <div class="form-group">
                                <label>MÀU SẢN PHẨM</label>
                                <select id="show-color-product" name="color_product_id" class="get-value custom-select">
                                       <option value="">-- Lựa chọn --</option>
                                      
                                </select>
                               
                            </div>
                        </div>
                      
                        
                        
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
            $('.show-attribute-product-list').remove();
                $('#show-color-product').append(`<option value="">-- Lựa chọn --</option>`);
        } else {
            $.ajax({
                 method: "POST",
                 url: "/admin/order/get-color/not-inventory",
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
                    $('#show-color-product').append(`<option value=${value.id}>${value.value} </option>`);
                       
                })
                 
             });
       
        }

    });

    $('#show-color-product').change(function() {
        if ($(this).val() == '') {
            $('.show-attribute-product-list').remove();
        } else {
            $('.show-attribute-product-list').remove();
                $('.next-element').after(`<div class="row show-attribute-product-list">
    <div class="col-md-2"> 
        <div class="form-group">
            <label>SỐ LƯỢNG</label>
            <input value="1" name="quantity" type="number" class="form-control" placeholder="Nhập số lượng">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success m-2">Thêm</button>
        </div>
        
    </div></div>`);
       
        }

    });







    
</script>
<?php $this->loadView('admin/Layout/footer') ?>