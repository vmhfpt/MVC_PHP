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
                <h1>Danh sách phí vận chuyển</h1>
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
    <?php if(isset($status)) {?>
        <div class="alert alert-success">
        <strong>Thành công</strong><?=$status?>
    </div>

    <?php }?>
  

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tổng số <?=count($dataItem)?> phí vận chuyển</h3>
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
                                <h3 class="card-title">Thêm, xóa danh sách phí vận chuyển</h3>
                                <div class="card-tools">
                                    
                                        <form action="" method="GET" class="input-group input-group-sm" style="width: 150px;">
                                        <input type="hidden" name="btn_list" value="true">
                                        <input value="<?=isset($_GET['key']) ? $_GET['key'] : '' ?>" type="text" name="key" class="form-control float-right" placeholder="Search">
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
                                            <th>STT</th>
                                            <th>TỈNH</th>
                                            <th>QUẬN HUYỆN</th>
                                            <th>XÃ</th>
                                            <th>GIÁ</th>
                                            <th style="width: 220px"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($dataItem as $key => $value){?>
                                        
                                        <tr id="<?=$value['id']?>">
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input value="<?=$value['id']?>" name="danh_dau[]" class="get-check custom-control-input custom-control-input-danger" type="checkbox" id="customCheckbox<?=$key?>">
                                                        <label for="customCheckbox<?=$key?>" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td><?=$key + 1?></td>
                                                <td  class="ten_loai"><?=$value['name_city']?></td>
                                                <td><?=$value['name_district']?></td>
                                                <td class=""><?=$value['name_ward']?></td>
                                                <td class=""><?=currency_format($value['ship'])?></td>
                                                <td class="project-actions text-right">

                                                    <a class="btn btn-danger btn-sm delete-single" data-delete="<?=$value['id']?>" href="javascript:;">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Xóa
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

            <form id="submit-form" action="" method="POST" >
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>TỈNH</label>
                            
                                <select id="select-city" name="city_id" class="get-value custom-select">
                                       <option value="">-- Lựa chọn --</option>
                                       <?php foreach($listCity as $key => $value){?>
                                          <option value="<?=$value['matp']?>" class=""><?=$value['name']?></option>
                                       <?php }?>
                                </select>
                                <?= isset($errors['city_id']) ? '<span id="error-name" class="text-danger">'.$errors['city_id'].'</span>' : ''?>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>QUẬN, HUYỆN</label>
                            
                                <select  id="district-show" name="district_id" class="get-value custom-select">
                                       <option value="">-- Lựa chọn --</option>
                                       
                                </select>
                                <?= isset($errors['district_id']) ? '<span id="error-name" class="text-danger">'.$errors['district_id'].'</span>' : ''?>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>XÃ, PHƯỜNG</label>
                            
                                <select id="show-warge" name="ward_id" class="get-value custom-select">
                                       <option value="">-- Lựa chọn --</option>
                                       
                                </select>
                                <?= isset($errors['ward_id']) ? '<span id="error-name" class="text-danger">'.$errors['ward_id'].'</span>' : ''?>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>PHÍ VẬN CHUYỂN</label>
                                <input value="<?=isset($old_field['ship']) ? $old_field['ship'] : ''?>" name="ship" type="number" class="form-control" id="don_gia" placeholder="Nhập phí vận chuyển">
                                <?= isset($errors['ship']) ? '<span id="error-name" class="text-danger">'.$errors['ship'].'</span>' : '<span id="error-name" class="text-danger">* Bắt buộc nhập</span>'?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mt-4">
                               <button type="submit" class="btn btn-success m-2">Thêm</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>


            <div class="card-footer">
                <button type="button" class="btn btn-warning m-2 check-all">Chọn tất cả</button>
                <button type="button" class="btn btn-primary m-2 cancel-all">Bỏ chọn tất cả</button>
                <button type="button" class="btn btn-danger m-2 delete-all">Xóa các mục đã chọn</button>
               
            </div>


        </div>
    </div>
</section>
<script>
 var idDelete = false;
    function deleteAjax(dataPayload) {
        $.ajax({
                method: "POST",
                url: "/admin/transport-fee/delete",
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

    $('#select-city').change(function() {
        if ($(this).val() == '') {
            $('#show-warge').empty();
            $('#show-warge').append(` <option value="">Phường/ Xã</option>`);
            $('#district-show').empty();
            $('#district-show').append(`<option value=""> Quận/ Huyện</option>`);
        } else {
            $('#show-warge').empty();
            $('#show-warge').append(` <option value="">Phường/ Xã</option>`);
            $.ajax({
                    method: "POST",
                    url: "/admin/transport-fee/get-district",
                    data: {
                        city_id: String($(this).val()),
                    }
                })
                .done(function(msg) {
                    msg = JSON.parse(msg);
                    $('#district-show').empty();
                    $('#district-show').append(`<option value=""> Quận/ Huyện</option>`);
                    msg.map((value, key) => {
                        $('#district-show').append(`<option value=${value.maqh}>${value.name}</option>`);
                    })
                });
        }

    });
    $('#district-show').change(function() {
        $.ajax({
                method: "POST",
                url: "/admin/transport-fee/get-ward",
                data: {
                    district_id: String($(this).val()),

                }
            })
            .done(function(msg) {
                /*<select name="" id="show-warge">
                                              <option value="">Phường/ Xã</option>
                                           </select>*/
                msg = JSON.parse(msg);

                $('#show-warge').empty();
                $('#show-warge').append(` <option value="">Phường/ Xã</option>`);
                msg.map((value, key) => {
                    $('#show-warge').append(`<option value=${value.xaid}>${value.name}</option>`);
                })
            });
    })

</script>
<?php $this->loadView('admin/Layout/footer') ?>