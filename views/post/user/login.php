
<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<style>
    .app-form-container__right-form-item-force {
        display : flex;
        gap : 10px;
        font-size: 15px;
        color : #333;
        
    }
    .app-form-container__right-form-item-force label {
        cursor: pointer;
        
    }
</style>
<section class="app-bread-crumb container-fluid">
        <div class="container">
          <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li class=""><a href="" class="">Tin tức & Sự kiện</a></li>
          </ul>
        </div>
      </section>

      <div class="app-form container-fluid">
        <div class="container form-center">
             <div class="app-form-container">
                 <div class="app-form-container__left ">
                     <div class="app-form-container__left-img">
                        <img src="https://didongthongminh.vn/modules/members/assets/images/log.svg" alt="" class="">
                     </div>

                     <div class="app-form-container__left-list">
                        <span class="">QUYỀN LỢI THÀNH VIÊN</span>
                        <ul class="">
                            <li class=""><i class="fa fa-check-circle-o" aria-hidden="true"></i> <span class="">Mua hàng khắp thế giới cực dễ dàng, nhanh chóng</span></li>
                            <li class=""><i class="fa fa-check-circle-o" aria-hidden="true"></i><span class="">Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng</span></li>
                            <li class=""><i class="fa fa-check-circle-o" aria-hidden="true"></i> <span class="">Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi</span></li>
                        </ul>
                     </div>
                 </div>
                 <div class="app-form-container__right ">
                 <div class="show-force"></div>
                    <div class="app-form-container__right-tab">
                    <span class="app-form-container__right-tab-active" ><a  href="/login" class="app-form-container__right-tab-active">Đăng nhập</a></span>
                    <span class=""><a href="/register" class="">Đăng ký</a></span>
                    </div>

                    <div class="app-form-container__right-form">
                        <form id="submit-form" action="/login" class="" method="POST">
                            <div class="app-form-container__right-form-content">
                                <div class="app-form-container__right-form-item">
                                <input value="<?=(get_cookie("user")) ? get_cookie("user")->email : "" ?>" name="email" id="email" placeholder="Email đăng nhập*" type="email" class="">
                                <span id="error-email" style="font-size : 13px; color : red;" class=""><?= isset($errors['email']) ? $errors['email'] : '* Bắt buộc nhập'?></span>
                                </div>
                                <div class="app-form-container__right-form-item">
                                <input value="<?=(get_cookie("user")) ? get_cookie("user")->password : "" ?>" name="password" id="password" placeholder="Mật khẩu*" type="password" class="">
                                <span id="error-password" style="font-size : 13px; color : red;" class=""><?= isset($errors['password']) ? $errors['password'] : '* Bắt buộc nhập'?></span>
                               </div>
                               <?php
                            if (isset($message)) {
                                echo '<div class="popup-wrong-user"> '.$message.'</div>';
                            }

                            ?>
                               
                               <div class="app-form-container__right-form-item-force">
                                <input <?=(get_cookie("user")) ? "checked": "" ?> id="remember" name="remember" type="checkbox" class="">
                                <label for="remember" class="">Ghi nhớ tôi</label>
                            </div>
                            <div class="app-form-container__right-form-item app-form-container__right-form-item-right">
                                <span class="onclick-force">Quên mật khẩu?</span>
                            </div>


                           <div class="app-form-container__right-form-item">
                           <button type="submit" class="bg-login"> Đăng nhập</button>
                       </div>

                        <div class="wrapper">
                             <span class=""></span>
                             <span class="">Hoặc đăng nhập bằng</span>
                             <span class=""></span>
                        </div>

                        <div class="app-form-container__right-form-item">
                            <a href="<?php echo $client->createAuthUrl(); ?>" class=""><button type="button" class="bg-google"> Google</button></a>
                        </div>

                        <div class="app-form-container__right-form-item">
                          <a href="<?=htmlspecialchars($loginURL)?>" class="">  <button type="button" class="bg-facebook"> Facebook</button></a>
                          
                        </div>

                            </div>
                        </form>

                        <div class="app-form-container__right-form-policy">
                            <p class="">Di Động Thông Minh cam kết bảo mật và sẽ không bao giờ đăng hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>
                        </div>
                    </div>


                 </div>
             </div>
        </div>
    </div>
    <script>
    var errorPassword = $('#password').val() == '' ? true : false;
    var errorEmail = $('#email').val() == '' ? true : false;


    $(document).on("keyup paste", "#password", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-password').text("* Không được để trống");
            $('#password').addClass("border-danger");
            errorPassword = true;
        } else if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(text) && text[0] != ' ') {
            $('#error-password').text("");
            $('#password').removeClass("border-danger");
            errorPassword = false;
        } else {
            $('#error-password').text("* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số");
            $('#password').addClass("border-danger");
            errorPassword = true;
        }
    });
    $(document).on("keyup paste", "#email", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-email').text("* Không được để trống");
            $('#email').addClass("border-danger");
            errorEmail = true;
        } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text) && text[0] != ' ') {
            $('#error-email').text("");
            $('#email').removeClass("border-danger");
            errorEmail = false;
        } else {
            $('#error-email').text("* Email không hợp lệ");
            $('#email').addClass("border-danger");
            errorEmail = true;
        }
    });



    $('#submit-form').submit(function(e) {
  
        if ($('#password').val() == '') {
            $('#error-password').text("* Không được để trống");
            $('#password').addClass("border-danger");
            errorPassword = true;
        }

        if ($('#email').val() == '') {
            $('#error-email').text("* Không được để trống");
            $('#email').addClass("border-danger");
            errorEmail = true;
        }
        if (errorEmail || errorPassword) return false;
        return true;
    });



    ////////////////////////////////////////////////////////
    var errorInputEmail = true;
    var errorInputOTP = true;
    var errorPasswordForgot = true;
    var emailOTP = '';

    $(document).on("input keyup paste", ".password-force-input", function() {


        var text = $(this).val();

        if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(text)) {
            $('.error-password-force').text('');
            errorPasswordForgot = false;
        } else {
            $('.error-password-force').text('* Mật khẩu phải bao gồm chữ cái in hoa, thường và số');
            errorPasswordForgot = true;

        }
    });




    $(document).on("input keyup paste", ".otp-input", function() {


        var text = $(this).val();

        if (/^[0-9]{6}$/.test(text)) {
            $('.error-otp-force').text('');
            errorInputOTP = false;
        } else {
            $('.error-otp-force').text('* Mã OTP chỉ bao gồm 6 số');
            errorInputOTP = true;

        }
    });



    $(document).on("keyup paste", ".force-input", function() {


        var text = $(this).val();

        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text)) {
            $('.error-email-force').text('');
            errorInputEmail = false;
        } else {
            $('.error-email-force').text('* Email không hợp lệ');
            errorInputEmail = true;

        }
    });

    $(document).on("click", ".auth-otp", function() {
        if (errorPasswordForgot == false && errorInputOTP == false) {
            $.ajax({
                    method: "POST",
                    url: "/api/authentication/handle-otp",
                    data: {
                        password: $('.password-force-input').val(),
                        otp: $('.otp-input').val(),
                        email: emailOTP
                    }
                })
                .done(function(msg) {
                    msg = JSON.parse(msg);
                    console.log(msg);
                    if (msg.status == 'error') {
                        $('.error-otp-force').text(msg.message);
                    } else {
                        window.location.replace("login");
                    }

                });
        }
    });


    $(document).on("click", ".ajax-force", function() {
        var that = this;

        if (errorInputEmail == false) {
            $(this).html(`<i style="font-size : 23px !important" class=" fa fa-spinner fa-spin"></i>`);
            $(this).css('pointer-events', 'none');
            $.ajax({
                    method: "POST",
                    url: "/api/authentication/force-password",
                    data: {
                        email: $('.force-input').val(),

                    }
                })
                .done(function(msg) {
                    $(that).html(`Xác thực`);
                    $(that).css('pointer-events', 'auto');
                    msg = JSON.parse(msg);

                    if (msg.status == 'error') {
                        $('.error-email-force').text(msg.message);
                    } else {

                        $('.ajax-force').addClass('auth-otp');
                        $('.ajax-force').removeClass('ajax-force');


                        emailOTP = $('.force-input').val();
                        $('.show-input-list').empty();
                        var template = `  <div class="app-form-container__right-form-item">
                                 <input  placeholder="Mã OTP*" type="number" class="otp-input" >
                               
 
                                 <span style="font-size : 13px; color : red;" class="error-otp-force">* Bắt buộc nhập</span>
                            </div> <br/>
                            <div class="app-form-container__right-form-item">
                                 <input  placeholder="Mật khẩu*" type="password" class="password-force-input" >
                               
 
                                 <span style="font-size : 13px; color : red;" class="error-password-force">* Bắt buộc nhập</span>
                            </div> `;
                        $('.show-input-list').append(template);
                    }

                });


        }
    });


    $(document).on("click", ".onclick-force", function() {
        $('.show-force').after(`<div class="popup-force">
                  
                  <div class="app-form-container__right-form">
                    
                    <form class="force-background" action="" >
                       <div class="popup-force-tab">
                          <span class="">Quên mật khẩu</span>
                          <span class="close-force">&times;</span>
                       </div>
                     
                        <div class="app-form-container__right-form-content">
                         <div class="show-input-list">
                         <div class="app-form-container__right-form-item">
                                 <input  placeholder="Email khôi phục*" type="email" class="force-input" name="email">
                               
 
                                 <span style="font-size : 13px; color : red;" class="error-email-force">* Bắt buộc nhập</span>
                            </div>
                         </div>
                
                        
                         
                           
                           
 
                       <div class="app-form-container__right-form-item">
                       <button type="button" class="bg-login ajax-force"> Xác thực</button>
                   </div>
 
                        </div>
                    </form>
 
                   
                </div>
                  </div>`);
    });
    $(document).on("click", ".close-force", function() {
        $('.popup-force').remove();
    });
</script>



<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>