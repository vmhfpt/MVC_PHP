<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>



    <style>
        .un-success {
            opacity: 0.22 !important;

        }

        .over-layer {
            display: none;
            background: rgba(0, 0, 0, 0.71);
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vh;
            z-index: 998;
        }

        .address-custum {
            display: none;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px !important;
            background-color: white !important;
            width: 400px !important;

            position: fixed !important;
            left: 50% !important;
            top: 50% !important;
            transform: translate(-50%, -50%) !important;
            z-index: 999 !important;

        }

    </style>
   
    <div class="over-layer">

    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thống kê tiến trình đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Timeline</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="address-custum">
        <div class="card-body">

            <div class="form-group">
                <label>Tỉnh,Thành phố :</label>
                <select id="select-city"  name="city" class="city form-control">
                    <option value=""> -- Lựa chọn --</option>
                    <?php foreach($dataCity as $key => $value){?>
                        <option value="<?=$value['matp']?>"> <?=$value['name']?></option>
                    <?php }?>

                </select>
            </div>

            <div id="result">
                <div class="form-group">
                    <label>Quận, Huyện :</label>
                    <select id="district-show" name="district" class="district form-control">
                        <option value=""> -- Lựa chọn--</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Xã,phường,thị trấn :</label>
                    <select id="show-warge" name="wards" class="form-control">
                        <option value=""> -- Lựa chọn--</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Đỉa chỉ nhận hàng</label>
                <input name="address-detail" type="text" class="form-control" placeholder="Nhập địa chỉ">
            </div>

            <div class="card-footer">
                <button type="button" class="submit-address-oder btn btn-primary">Thay đổi</button>
            </div>


        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User profile picture">
                            </div>


                            <h3 data-id="<?= $dataItem['id']?>" class="get-order-id profile-username text-center name"><?=$dataItem['name']?> <i data-edit="name"
                                    class='fas fa-pen'></i></h3>

                            <p class="text-muted text-center   number"><?=$dataItem['phone_number']?> <i data-edit="number"
                                    class='fas fa-pen'></i></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tạm tính</b> <a
                                        class="float-right get-total"><?=currency_format($dataItem['total'])?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mã đơn hàng</b> <a
                                        class="float-right address-change-ajax"><?=$dataItem['CODE']?>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Địa chỉ</b> <a
                                        class="float-right address-change-ajax"><?=$dataItem['address_detail']?><i
                                            data-edit="address-detail" class='address-change fas fa-eraser'></i>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ghi chú</b> <a class="float-right"><?=$dataItem['note']?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mã giảm giá</b> <a
                                        class="float-right"><?= $dataItem["coupon_name"] ? $dataItem["coupon_name"] : 'không áp dụng' ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phí vận chuyển</b> <a class="float-right transport-change-ajax">
                                    <?= $dataItem["transport_fee"] == 0 ? "Free ship" : currency_format($dataItem["transport_fee"]) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ngày đặt hàng</b> <a class="float-right"><?=$dataItem['createdAt']?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tổng tiền</b> <a
                                        class="float-right total"><?=currency_format($dataItem['total'])?></a>
                                </li>
                            </ul>

                            <a href="/admin/order/<?=$dataItem['id']?>" class="btn btn-primary btn-block"><b>Xem chi tiết đơn hàng</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- The time line -->

                </div>
                <div class="col-lg-6">

                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-red">Bắt đầu</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                       
                        <?php if(!isset($statusOder[0])){?>
                            <div class="slider-5 un-success">
                                <i class='far fa-comments bg-dark'></i>
                                <div class="timeline-item ">
                                    <span class="time time-5"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header-5"><a href="#">Đã tiếp nhận đơn hàng</a> Bộ
                                        phận
                                        chăm sóc khách hàng </h3>
                                    <div class="timeline-body timeline-5">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="5" class="success success-5 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php } else {?>
                            <div class="slider-5 ">
                                <i class='far fa-comments bg-dark'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        <?=$statusOder[0]['createdAt']?></span>
                                    <h3 class="timeline-header timeline-header-5"><a href="#">Đã tiếp nhận đơn hàng</a> Bộ
                                        phận
                                        chăm sóc khách hàng </h3>
                                    <div class="timeline-body"><?=$statusOder[0]['content']?></div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                        <?=$statusOder[0]['name']?></a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>


                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <?php if(!isset($statusOder[1])){?>
                            <div class="slider-4 un-success">
                                <i class='fas fa-home bg-danger'></i>
                                <div class="timeline-item ">
                                    <span class="time time-4"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-4"><a href="#">Đã rời khỏi
                                            kho</a> Bộ phận quản lý kho</h3>
                                    <div class="timeline-body timeline-4">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="4" class="success success-4 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php } else {?>
                            <div class="slider-4 ">
                                <i class='fas fa-home bg-danger'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                    <?=$statusOder[1]['createdAt']?></span>
                                    <h3 class="timeline-header timeline-header timeline-header-4"><a href="#">Đã rời khỏi
                                            kho</a> Bộ phận quản lý kho</h3>
                                    <div class="timeline-body"><?=$statusOder[1]['content']?></div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                        <?=$statusOder[1]['name']?></a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php if(!isset($statusOder[2])){?>
                            <div class="slider-3 un-success">
                                <i class='fas fa-ambulance bg-warning'></i>
                                <div class="timeline-item ">
                                    <span class="time time-3"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-3"><a href="#">Đang vận
                                            chuyển</a>
                                        Bộ phận vận chuyển </h3>
                                    <div class="timeline-body timeline-3">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="3" class="success success-3 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php } else {?>
                            <div class="slider-3 ">
                                <i class='fas fa-ambulance bg-warning'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                    <?=$statusOder[2]['createdAt']?></span>
                                    <h3 class="timeline-header timeline-header timeline-header-3"><a href="#">Đang vận
                                            chuyển</a>
                                        Bộ phận vận chuyển </h3>
                                    <div class="timeline-body"><?=$statusOder[2]['content']?></div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                        <?=$statusOder[2]['name']?></a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        <!-- END timeline item -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-green">Tiếp cận</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <?php if(!isset($statusOder[3])){?>
                            <div class="slider-2 un-success">
                                <i class='fas fa-map-marker-alt bg-cyan'></i>
                                <div class="timeline-item ">
                                    <span class="time time-2"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-2"><a href="#">Đã đến
                                            nơi</a> Bộ
                                        phận vận chuyển </h3>
                                    <div class="timeline-body timeline-2">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="2" class="success success-2 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php } else {?>
                            <div class="slider-2 ">
                                <i class='fas fa-map-marker-alt bg-cyan'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i
                                            class="fas fa-clock"></i><?=$statusOder[3]['createdAt']?></span>
                                    <h3 class="timeline-header timeline-header timeline-header-2"><a href="#">Đã đến
                                            nơi</a> Bộ
                                        phận vận chuyển </h3>
                                    <div class="timeline-body"><?=$statusOder[3]['content']?></div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                        <?=$statusOder[3]['name']?></a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>

                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <?php if(!isset($statusOder[4])){?>
                            <div class="slider-1 un-success">
                                <i class='fas fa-tasks bg-success'></i>
                                <div class="timeline-item ">
                                    <span class="time time-1"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-1"><a href="#">Hoàn
                                            thành</a> Bộ
                                        phận vận chuyển</h3>
                                    <div class="timeline-body timeline-1">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="1" class="success success-1 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php } else {?>
                            <div class="slider-1 ">
                                <i class='fas fa-tasks bg-success'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                    <?=$statusOder[4]['createdAt']?></span>
                                    <h3 class="timeline-header timeline-header timeline-header-1"><a href="#">Hoàn
                                            thành</a> Bộ
                                        phận vận chuyển</h3>
                                    <div class="timeline-body"><?=$statusOder[4]['content']?></div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                        <?=$statusOder[4]['name']?></a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>

                        <!-- END timeline item -->
                        <?php if(!isset($statusOder[5])){?>



                        <div class="slider-0 ">
                            <i class='far fa-frown bg-dark'></i>
                            <div class="timeline-item ">
                                <span class="time time-0"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                <h3 class="timeline-header timeline-header-0"><a href="#">Hủy đơn hàng</a> Toàn nhân viên
                                </h3>
                                <div class="timeline-body timeline-0">
                                    <div class="form-group form-group-0"><label>Nội dung</label>
                                        <textarea id="content-0" class="form-control" rows="3"> Lý do ... </textarea>
                                    </div>
                                </div>
                                <div class="timeline-footer">
                                    <a data-active="0" class="success-0 btn btn-dark btn-sm submit">Xác nhận</a>
                                </div>
                            </div>
                        </div>
                        <?php } else {?>

                        <div class="slider-0 ">
                            <i class='far fa-frown bg-dark'></i>
                            <div class="timeline-item ">
                                <span class="time "><i class="fas fa-clock"></i>
                                <?=$statusOder[5]['createdAt']?></span>
                                <h3 class="timeline-header timeline-header timeline-header-0"><a href="#">Đơn hàng đã bị hủy</a> Toàn nhân viên</h3>
                                <div class="timeline-body"><?=$statusOder[5]['content']?></div>
                                <div class="timeline-footer">
                                    <a href=":;" class="btn btn-danger btn-sm">Nhân viên :
                                    <?=$statusOder[5]['name']?></a>
                                    <a href="javascript:;" class="btn btn-dark btn-sm">Đã xác nhận</a>
                                </div>
                            </div>
                        </div>
                        <?php }?>

                    </div>
                </div>
                <!-- /.col -->

                <!-- Timelime example  -->


                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
    <script> //success-1
$(document).on("click", ".success", function () {
    var that = this;
    var order_id = $('.get-order-id').attr('data-id');

    var button = $(this).data("active");
    var url = "/admin/order/change-active-detail/" + order_id;
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            active: button,
            type: "check",
        },
        dataType: "json",
        success: function (result) {
    
            if (result.status == true) {
                $(that).removeClass("success");
                $(".slider-" + button).removeClass("un-success");
                $(".timeline-" + button).empty();
                $(".timeline-" + button).append(
                    `<div class="form-group form-group-${button}"><label>Nội dung</label><textarea id="content-${button}" class="form-control" rows="3" placeholder="Enter ...">   </textarea></div>`
                );
                $(".success-" + button).addClass("submit");
            }else {
                alert('Không hợp lệ');
            }
        },
    });
});
$(document).on("click", ".submit", function () {
    var button = $(this).data("active");
    var order_id = $('.get-order-id').attr('data-id');
    var content = $("#content-" + button).val();
    var url = "/admin/order/change-active-detail/" + order_id;
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            active: button,
            type: "update",
            content: content,
        },
        dataType: "json",
        success: function (result) {

            if(result.status == "success"){
                var name = result.user_name;
            var date = result.date;

            var templateTime = `<i class="fas fa-clock"</i> ${date}`;
            $(`.time-${button}`).empty();
            $(`.time-${button}`).append(templateTime);
            $(`.success-${button}, .form-group-${button}`).remove();
            var template =
                `<div class="timeline-body">${content}</div>` +
                '<div class="timeline-footer">' +
                ` <a href=":;" class="btn btn-primary btn-sm">Nhân viên : ${name}</a>` +
                ' <a href="javascript:;" class="btn btn-warning btn-sm">Đã xác nhận</a></div>';
            $(".timeline-header-" + button).after(template);
            }else {
                alert("Xác thực không hợp lệ");
            }
        },
    });
});
$(document).on("click", ".fa-pen", function () {
    var button = $(this).data("edit");
    var valueInputCurrent = ($(`.${button}`).text());
    $("." + button).empty();
    $("." + button).append(
        `<input name="${button}" type="text" value="${valueInputCurrent}" placeholder="Enter ..."> <i data-edit="${button}" class='far fa-check-circle'></i>`
    );
   
});
$(document).on("click", ".fa-check-circle", function () {
    
    var url = window.location.pathname;

    var button = $(this).data("edit");
    value_input = $(`input[name*='${button}']`).val();
     
    $("." + button).empty();
    $("." + button).append(
        `${value_input}<i data-edit="${button}" class='fas fa-pen'></i>`
    );
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            changeColumn: button,
            value: value_input,
        },
        dataType: "json",
        success: function (result) {
           
        },
    });
});
$(document).on("click", ".address-change", function () {
    $(".over-layer").fadeIn(200);
    $(".address-custum").fadeIn(400);
});
$(document).on("click", ".over-layer", function () {
    $(this).fadeOut(200);
    $(".address-custum").fadeOut(400);
});

$(document).on("click", ".submit-address-oder", function () {
    var city_id = $('select[name*="city"]').val();
    var district_id = $(`select[name*='district']`).val();
    var ward_id = $(`select[name*='wards']`).val();
    var address_detail = $(`input[name*='address-detail']`).val();
    console.log(city_id, district_id, ward_id, address_detail);
     
    var url = window.location.pathname;
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            changeColumn: "address-detail",
            city_id: city_id,
            district_id: district_id,
            ward_id: ward_id,
            address_detail: address_detail,
        },
        dataType: "json",
        success: function (result) {
            
            var address = result.address_detail;
            var transportFee = result.transport_fee;
    
      
            $(".total").text(
                String(result.total).replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ"
            );
            $(".address-change-ajax").empty();
            $(".address-change-ajax").append(
                address +
                    '<i data-edit="address-detail"class="address-change fas fa-eraser"></i>'
            );
            $(".transport-change-ajax").empty();
            $(".transport-change-ajax").append(transportFee + "đ");
            $(".over-layer").fadeOut(200);
            $(".address-custum").fadeOut(400);
        },
    });
});</script>
    <script>
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


<!-- Đối với trạng thái của một đơn hàng đã đẩy lên hệ thốn

 0 => chưa tiếp nhận
 1 => đã tiếp nhận
 2 => đã xuất kho
 3 => đang di chuyển
 4 => đã đến nơi
 5 => {
     + đã nhận (thời gian)
     + 6 đã hủy {
         lý do : trả hàng

     }
 }

-->



<?php $this->loadView('admin/Layout/footer') ?>