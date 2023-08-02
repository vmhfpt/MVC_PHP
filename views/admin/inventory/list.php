<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>


<div class="modal fade bd-example-modal-xl" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lịch sử thay đổi tồn kho</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th >Số lượng hiện tại</th>
                                            <th>Phân loại</th>
                                            <th style="width: 25px">Tăng</th>
                                            <th style="width: 25px">Giảm</th>
                                            <th >Người quản lý</th>
                                            <th>Ngày</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-list-history-inventory">
                                        
                                       
                                    </tbody>
                                </table>
                            </div>

                           
                        </div>

                      

                    </div>
                </div>
    </div>
  </div>
</div>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách tồn kho</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách tồn kho</li>
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
                <h3 class="card-title">Tổng số <?= count($dataItem) ?> sản phẩm trong kho</h3>
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
                                <h3 class="card-title">Quản lý tồn kho</h3>
                                <div class="card-tools">

                                    <form action="" method="GET" class="input-group input-group-sm" style="width: 150px;">
                                        <input type="hidden" name="btn_list" value="true">
                                        <input value="<?= isset($_GET['key']) ? $_GET['key'] : '' ?>" type="text" name="key" class="form-control float-right" placeholder="Search">
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
                                            <th style="width: 10px"></th>
                                            <th>TÊN SẢN PHẨM</th>
                                            <th>PHÂN LOẠI</th>
                                            <th style="width: 120px">MÀU</th>
                                            <th>SỐ LƯỢNG THỰC TẾ TRONG KHO</th>
                                            <th>SỐ LƯỢNG HÀNG CÓ SẴN</th>
                                            <th style="width: 140px"> SỐ LƯỢNG DỰ TRỮ CHO ĐƠN ĐẶT HÀNG</th>
                                            <th style="width: 140px"> SỐ LƯỢNG SẢN PHẨM LỖI</th>
                                            <th style="width: 140px"> VỊ TRÍ KHO</th>
                                            <th style="width: 240px">THAO TÁC</th>
                                        </tr>
                                    </thead>
                                    <tbody >

                                        <?php foreach ($dataItem as $key => $value) { ?>

                                            <tr>
                                                <td>#<?= ($key + 1) ?></td>
                                                <td><?= $value['name'] ?></td>
                                                <td><img src="<?= IMAGE_DIR_PRODUCT . $value['thumb'] ?>" style="width : 80px; height : 80px" /> </td>
                                                <td><?= $value['value'] ?></td>
                                                <td><?= $value['quantity_in_inventory'] ?></td>
                                                <td><?= $value['quantity_current'] ?></td>
                                                <td><?= $value['quantity_temp_order'] ?></td>
                                                <td><?= $value['quantity_product_error'] ?></td>
                                                <td><?= $value['address'] ?></td>
                                                <td class="project-actions text-right">

                                                    <a class="btn btn-info btn-sm" href="/admin/inventory/edit/<?=$value['id']?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Sửa
                                                    </a>
                                                    <a data-inventory="<?=$value['id']?>" class="btn btn-danger btn-sm show-history" href="javascript:;">
                                                        <i class="fas fa-eye"></i>
                                                        Xem lịch sử
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>


                        </div>

                    </div>



                </div>


            </div>

            <div class="card-footer">
                <a href="/admin/inventory/add" class=""><button type="button" class="btn btn-success m-2">Nhập thêm</button></a>
            </div>


        </div>
    </div>
</section>

<script>
    $('.show-history').click(function() {
        var inventory_id = $(this).attr("data-inventory");
      //  alert(inventory_id);
        
        $.ajax({
                 method: "POST",
                 url: "/api/inventory/get-history",
                 data: {
                    id : inventory_id
                 }
             })
             .done(function(msg) {
                // $('.show-attribute-product-list').empty();
                // $('#show-color-product').empty();
                // $('#show-color-product').append(`<option value="">-- Lựa chọn --</option>`);
                 $('#show-list-history-inventory').empty();
                  msg = JSON.parse(msg);
                    msg.map((value, key) => {
                        $('#show-list-history-inventory').append(`<tr>
                                            <td>#${key + 1}</td>
                                            <td>${value.quantity_current}</td>
                                            <td>${value.type == 1 ? "Chỉnh sửa tồn kho" : "Thêm tồn kho"}</td>
                                            <td><span class="badge bg-success">+ ${value.increate}</span></td>
                                            <td><span class="badge bg-danger">- ${value.decreate}</span></td>
                                            <td>${value.name}</td>
                                            <td>${value.createdAt}</td>
                                        </tr>`);
                        
                    });
                $('#exampleModalScrollable').modal('show')
                 
             });
        
    });
</script>


<?php $this->loadView('admin/Layout/footer') ?>