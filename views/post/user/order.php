<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<style>
    .detail-bill {
        margin : 20px 30px;
    }
    .bill-red {
        color :red;
    }
    .app-user-popup__cart {
        display: none;
        animation: identifier-cart 0.4s ease-in-out;
        position: fixed;
        top: 0px;
        left: 0px;
        background: rgba(43, 43, 43, 0.536);
        z-index: 999;
        width: 100vw;
        height: 100vh;
    }


    .app-user-content__table table {
        background: red;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        font-size: 16px;
    }

    td,
    th {

        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .app-user-content__table-btn-edit {
        text-align: center;
        color: orange;
        cursor: pointer;
    }

    .app-user-content__table-btn-delete {
        text-align: center;
        color: red;
        cursor: pointer;
    }


    @keyframes identifier-cart {
        0% {
            opacity: 0.0;
            top: 40px;
        }

        100% {
            opacity: 1.0;
            top: 0px;
        }
    }

    .app-user-popup__cart-container {
        background: white;
        width: 790px;
        height: 75vh;
    }

    .app-user-popup__cart-tab {
        border-bottom: 1px solid #eee;
        font-weight: 500;
        font-size: 19px;
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
    }

    .app-user-content__table img {
        width: 45px;
        height: 45px;
    }

    .app-user-popup__cart-tab-close {
        cursor: pointer;
    }

    /****************************************************8 */
    .popup-success {
        font-size: 17px;
        padding: 10px 0px;
        color: white;
        background: #5cb85c;
        width: 100%;
        text-align: center;
    }

    @keyframes identifier-in {
        0% {
            opacity: 0.0;
            top: 30px;
        }

        100% {
            opacity: 1.0;
            top: 0px;
        }
    }

    @keyframes identifier-out {
        0% {
            opacity: 1.0;
            top: 0px;

        }

        100% {
            opacity: 0.0;
            top: -100vh;
        }
    }

    .app-popup {
        display: none;
        animation: identifier-in 0.5s ease-in-out;
        animation-fill-mode: forwards;
        z-index: 9999 !important;
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100vh !important;
        background: rgba(9, 9, 9, 0.733);

        align-items: center;
        justify-content: center;

    }

    .app-popup-delete {
        display: none;
        z-index: 9999 !important;
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100vh !important;
        background: rgba(9, 9, 9, 0.733);
        padding: 140px 0px;
        align-items: flex-start;
        justify-content: center;


    }

    .container-popup-delete {
        width: 350px;
        background: red;
        padding: 20px;
    }

    .container-popup-delete__tab {
        color: white;
        font-weight: 600;
        display: flex;
        gap: 15px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .container-popup-delete__tab span:first-child {
        font-size: 20px;
    }

    .container-popup-delete__btn {
        display: flex;
        padding: 20px 0px;

        justify-content: space-evenly;
    }

    .container-popup-delete__btn button:first-child {
        background: black;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }

    .container-popup-delete__btn button:last-child {
        background: #5cb85c;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }

    .container-popup-delete__tab img {
        object-fit: cover;
    }

    @keyframes alert {
        0% {

            transform: rotate(15deg)
        }

        50% {
            transform: rotate(-15deg)
        }

        100% {
            transform: rotate(0deg)
        }
    }

    @keyframes popup-in {
        0% {
            opacity: 0.0;
            transform: scale(0.0);
        }

        50% {
            opacity: 0.5;
            transform: scale(1.3);
        }

        100% {
            opacity: 1.0;
            transform: scale(1);
        }
    }

    @keyframes popup-out {
        0% {
            opacity: 1.0;
            transform: scale(1);

        }

        50% {
            opacity: 0.5;
            transform: scale(1.3);
        }

        100% {
            opacity: 0.0;
            transform: scale(0.0);
        }
    }
    .btn-cancel-order {
        background: red;
        color : white;
        padding : 10px;
        border : none;
    }
</style>
<section class="app-user container-fluid ">
         <div class="container">
             <div class="app-user-content">
                

             <div class="app-user-content__item ">
                <div class="app-user-content__item-content">
                    <div class="app-user-content__item-content-tab">
                        <?php
                        if ($user['image']) {
                            echo ' <img style="border-radius : 100%; width : 50px; height : 50px;" src="'.IMAGE_DIR_USER.$user['image'].'" alt="" class="">';
                        } else {
                            echo ' <i class="fa fa-user" aria-hidden="true"></i>';
                        }
                        ?>
                        <span class="">Xin chào,</span>
                        <b class=""> <?= $user['name'] ?></b>
                    </div>

                    <div class="app-user-content__item-content-list">
                        <div class="app-user-content__item-content-list-item app-user-content__item-content-list-item-active">
                            <div class="">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="">
                                <a href="/dashboard" class=""> <span class="">Thông tin tài khoản </span></a>
                               
                            </div>
                        </div>
                        <div class="app-user-content__item-content-list-item">
                            <div class="">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </div>
                            <div class="">
                               
                                <a href="/order" class=""> <span class="">Quản lý đơn hàng</span></a>
                            </div>
                        </div>
                     <?php if($user['role'] != 0) {?>
                        <div class="app-user-content__item-content-list-item">
                            <div class="">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </div>
                            <div class="">
                               
                                <a href="/admin/user/list" class=""> <span class="">Quản trị website</span></a>
                            </div>
                        </div>
                     <?php }?>
            
                        <div class="app-user-content__item-content-list-item">
                            <div class="">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                            </div>


                            <div class="">
                                <a href="/logout" class=""><span class="">Đăng xuất</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="container-fluid app-popup-delete">
    <div class="container container-popup-delete remove-animation">
        <div class="container-popup-delete__tab">
            <span class="">Bạn có chắc muốn xóa ?</span>
            <span class="container-popup-delete__tab-name">

            </span>

        </div>
        <div class="container-popup-delete__btn">

        </div>
    </div>

</section>
<section class="app-user-popup__cart container-fluid">
    <div class="app-user-popup__cart-container">
        <div class="app-user-popup__cart-tab">
            <span class="">Chi tiết đơn hàng </span>
            <span class="app-user-popup__cart-tab-close">&times;</span>
        </div>
        <div class="app-user-content__table show-app-user-content__table">

        </div>
    </div>
</section>
<div class="app-user-content__item ">
    <div class="app-user-content__item-detail">
        <div class="app-user-content__item-detail-title">
            <h3 class="">Quản lý đơn hàng</h3>
        </div>

        <div class="app-user-content__item-detail-content">
            <?php
            if (!$dataItem) {


            ?>
                <span class="">Bạn chưa thực hiện bất kỳ đơn đặt hàng nào trước đó!</span>
            <?php
            } else {
            ?>



                <div class="app-user-content__table">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tổng tiền</th>
                            <th>SĐT</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th></th>
                           
                        </tr>

                        <?php
                        foreach ($dataItem as $key => $value) {
                        ?>
                            <tr id="<?= $value['id'] ?>">
                                <td>#<?= $key + 1 ?></td>
                                <td><?= currency_format($value['total'] )?> </td>
                                <td><?= $value['phone_number'] ?></td>
                                <td><?= $value['createdAt'] ?></td>
                                <td><?php
                                    if ($value['active'] == 6) {
                                        echo '<span class="badge badge-danger">Chưa tiếp nhận</span>';
                                    }
                                    if ($value['active'] == 5) {
                                        echo '<span class="badge badge-warning">Đã tiếp nhận</span>';
                                    }
                                    if ($value['active'] == 4) {
                                        echo '<span class="badge badge-warning">Đã rời kho</span>';
                                    }
                                    if ($value['active'] == 3) {
                                        echo '<span class="badge badge-danger">Đang vận chuyển</span>';
                                    }
                                    if ($value['active'] == 2) {
                                        echo '<span class="badge badge-warning">Đã đến nơi</span>';
                                    }
                                    if ($value['active'] == 1) {
                                        echo '<span class="badge badge-success">Hoàn thành</span>';
                                    }
                                    if ($value['active'] == 0) {
                                        echo '<span class="badge badge-dark">Đã hủy</span>';
                                    }
                                    ?></td>
                                <td class="app-user-content__table-btn-edit"><i class="fa fa-pencil-square-o click-render-show" data-id="<?= $value['id'] ?>" aria-hidden="true"></i></td>
                              
                            </tr>
                        <?php
                        }
                        ?>




                    </table>
                </div>


            <?php
            }
            ?>

        </div>
    </div>
</div>



             </div>
         </div>
     </section>

     <script>
    var GLOBAL;
    $(document).on("click", ".click-btn-delete", function() {
        var id = ($(this).attr('data-item'));
        var name = ($(this).attr('data-name'));
        var price = ($(this).attr('data-price'));
        $('.container-popup-delete__tab-name').text(name);
        $('.container-popup-delete__btn').html(`<button data-delete="${id}" data-price="${price}" data-click="true" class="confirm">Có</button>
            <button data-click="false" class="confirm">Hủy</button>`);
        $('.app-popup-delete').css('display', 'flex');
        $('.app-popup-delete').css('animation', '0.5s ease-in-out 0s 1 normal forwards running popup-in');
    });

    $(document).on("click", ".app-user-popup__cart-tab-close", function() {
        $('.app-user-popup__cart').css('display', 'none');
    });
    $(document).on("click", ".click-render-show", function() {
        GLOBAL = $(this).attr('data-id');
        $.ajax({
                method: "POST",
                url: "/api/user/get-orderdetail",
                data: {
                    id: $(this).attr('data-id')
                }
            })
            .done(function(msg) {
                $('.show-app-user-content__table').html(msg);
                $('.app-user-popup__cart').css('display', 'flex');
            });
    });
    $(document).on("click", ".app-popup-delete", function(e) {
        var id = ($(this).attr('data-item'));
        if ($(e.target).children(".container-popup-delete").length === 0) {

        } else {
            $('.remove-animation').removeAttr('style');
            $('.remove-animation').removeClass('container-popup-delete');
            window.requestAnimationFrame(function() {
                $('.remove-animation').addClass('container-popup-delete');
                $('.container-popup-delete').css('animation', '0.5s ease-in-out 0s 1 normal forwards running alert');
            });
        }
    });

    $(document).on("click", ".confirm", function(e){
     var total_price = ($(this).attr("data-price"));
      var id = $(this).attr("data-delete");
       if($(this).attr("data-click") == 'true'){
        $.ajax({
                method: "POST",
                url: "/api/user/delete-item/order",
                data: {
                    type: 'POST',
                    id: id,
                    order_id : GLOBAL,
                    price : total_price
                }
            })
            .done(function(msg) {
                msg = JSON.parse(msg);
                if(msg.status == 'success'){
                    $('#data-delete-' + id).remove();
                    $('.app-popup-delete').css('animation', '0.5s ease-in-out 0s 1 normal forwards running popup-out');
                    $(".bill-red").text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number($(".bill-red").attr('data-total')) - Number(total_price)));
                    $('.bill-red').attr("data-total", (Number($(".bill-red").attr('data-total')) - Number(total_price)));
                }else {
                    alert('Cần ít nhất một sản phẩm trong đơn hàng');
                }
                
            });
       }else {
        $('.app-popup-delete').css('animation', '0.5s ease-in-out 0s 1 normal forwards running popup-out');
       }


    });
</script>

<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>