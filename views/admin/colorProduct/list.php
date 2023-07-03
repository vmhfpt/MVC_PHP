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
                <h1>Danh sách màu sản phẩm</h1>
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
    <?php if(isset($status)) {?>
        <div class="alert alert-success">
        <strong>Thành công</strong><?=$status?>
    </div>

    <?php }?>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tổng số <?=count($dataItem)?> màu sản phẩm</h3>
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
                                <h3 class="card-title">Sửa, xóa danh sách màu sản phẩm</h3>
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
                                            <th style="width: 10px"></th>
                                            <th>MÃ HH</th>
                                            <th>TÊN HÀNG HÓA</th>
                                            <th>DANH MỤC</th>
                                            <th>ĐƠN GIÁ</th>
                                            <th style="width : 90px">GIẢM GIÁ</th>
                                            <th>LƯỢT XEM</th>
                                            <th style="width: 280px"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($dataItem as $key => $value){?>
                                        <tr id="<?=$value['id']?>" >
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input name="check[]" value="<?=$value['id']?>" class="custom-control-input custom-control-input-danger get-check" type="checkbox" id="customCheckbox<?=$key?>">
                                                    <label for="customCheckbox<?=$key?>" class="custom-control-label"></label>
                                                </div>
                                            </td>
                                            <td><?=$value['id']?></td>
                                            <td class="ten_loai" ><?=$value['name']?></td>
                                            <td><?=$value['category']?></td>
                                            <td><?=currency_format($value['price'])?></td>
                                            <td><img src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>" style="width : 80px; height : 80px"  /></td>
                                            <td><?=$value['view_total']?></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-success btn-sm" href="/admin/attribute-product/<?=$value['slug']?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Thiết lập biến thể
                                                </a>
                                                <a class="btn btn-info btn-sm" href="/admin/product/edit/<?=$value['slug']?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Sửa
                                                </a>
                                                <a data-delete="<?=$value['id']?>" class="btn btn-danger btn-sm delete-single" href="javascript:;">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                      <?php }?>

                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                   <?=$page > 1 ? ' <li class="page-item"><a class="page-link" href="/admin/product/list/'.($page -1).'">«</a></li>' : ''?>
                                    <?php for($i = 1; $i <= ceil($totalItem / $limitShow); $i ++) {?>

                                        <li  class="page-item  <?=$page == $i ? 'active' : '' ?>"><a class="page-link" href="/admin/product/list/<?=$i?>"><?=$i?></a></li>
                                    <?php }?>
                                   
                                    <?= $page >= ceil($totalItem / $limitShow) ? '' :  '<li class="page-item"><a class="page-link" href="/admin/product/list/'.($page + 1).'">»</a></li>' ?>
                                </ul>
                            </div>

                        </div>

                    </div>



                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-warning m-2 check-all">Chọn tất cả</button>
                <button type="submit" class="btn btn-primary m-2 cancel-all">Bỏ chọn tất cả</button>
                <button type="submit" class="btn btn-danger m-2 delete-all">Xóa các mục đã chọn</button>
                <a href="/admin/product/add" class=""> <button type="button" class="btn btn-success m-2">Nhập thêm</button></a>
            </div>


        </div>
    </div>
</section>
<script>
 var idDelete = false;
    function deleteAjax(dataPayload) {
        $.ajax({
                method: "POST",
                url: "/admin/product/delete",
                data: {
                    arr: dataPayload,
                }
            })
            .done(function(msg) {
                msg = JSON.parse(msg);
                if (msg.status == "success") {
                    dataPayload.forEach(function(item, index) {
                        $('#' + item).remove();
                    });
                }else {
                    $('.custom-error-lable').text('Xóa thất bại');
                    $('#error-empty').modal('toggle');
                }
            });
    }
    $('.delete-single').click(function() {
        idDelete = $(this).attr("data-delete");
        $('.confirm-delete').attr('type-delete', 'single');
        var index = Number($('.delete-single').index(this));
        var name = $('.ten_loai').eq(index).text();
        $('#exampleModalLabel').text(`Bạn có chắc muốn xóa "${name}" không`);
        $('#exampleModal').modal('toggle');
    });
    $('.confirm-delete').click(function() {
        $('#exampleModal').modal('toggle');
        if ($(this).attr("type-delete") == 'single') {
            var arrDelete = [];
            arrDelete[0] = idDelete;
            deleteAjax(arrDelete);
        } else if ($(this).attr("type-delete") == 'multiple') {
            var arrDelete = [];
            $(".get-check:checked").each(function(i) {
                arrDelete[i] = $(this).val();
            });
            deleteAjax(arrDelete);
        }

    });
    $('.delete-all').click(function() {

        if ($(".get-check:checked").length == 0) {
            $('#error-empty').modal('toggle');
        } else {
            $('.confirm-delete').attr('type-delete', 'multiple');
            $('#exampleModalLabel').text(`Bạn có chắc muốn xóa ${$(".get-check:checked").length} mục đã chọn`);
            $('#exampleModal').modal('toggle');
        }
    });
    $('.check-all').click(function() {
        $('.get-check').each(function() {
            $(this).prop('checked', true);
        })
    });
    $('.cancel-all').click(function() {
        $('.get-check').each(function() {
            $(this).prop('checked', false);
        })
    });
</script>
<?php $this->loadView('admin/Layout/footer') ?>