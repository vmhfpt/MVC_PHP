<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách màu sản phẩm <?=$item['name']?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách màu </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
   
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tổng số <?=count($dataItem)?>màu sản phẩm</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách màu sản phẩm</h3>
                                <div class="card-tools">
                                    <form class="input-group input-group-sm" style="width: 150px;">
                                        <input name="btn_list" type="hidden" class="">
                                        <input value="<?=isset($_GET['key']) ? $_GET['key'] : ''?>" type="text" name="key" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>STT</th>
                                            <th>TÊN SẢN PHẨM</th>
                                            <th>HÌNH</th>
                                            <th>TÊN MÀU</th>
                                            <th>SỐ LƯỢNG </th>
                                            <th>GIÁ </th>
                                            <th>GIẢM GIÁ (%)</th>
                                            <th>TRẠNG THÁI</th>
                                            <th style="width: 140px"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($dataItem as $key => $value){?>
                                        <tr >
                                            
                                            <td><?=$key + 1?></td>
                                            <td ><?=$value['name']?></td>
                                          
                                            <td><img src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>" style="width : 80px; height : 80px"  /></td>
                                            <td><?=$value['value']?></td>
                                            <td><?=$value['quantity']?></td>
                                            <td><?=$value['price']?></td>
                                            <td><?=$value['price_sale']?></td>
                                            <td > <?=$value['active'] == 0 ? '<span class="badge badge-success">kích hoạt</span>' : '<span class="badge badge-danger">Chưa kích hoạt</span>'?></td>
                                            <td class="project-actions text-right">
                                           

                                                    <a class="btn btn-danger btn-sm" href="/admin/color-product/<?=$value['attribute_product_id']?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                      Chi tiết
                                                   </a>

                            
                                               
                                            </td>
                                        </tr>
                                      <?php }?>

                                    </tbody>
                                </table>
                            </div>

                          

                        </div>

                    </div>



                </div>


            </div>

           


        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>