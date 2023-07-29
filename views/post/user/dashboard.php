<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<style>
   .custom-infor-file {
      display: none;
   }

   .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
   }

   .app-detail-bottom__item-comment-content-form-image-custom img {
      object-fit: cover;
      margin: 12px 0px;
      width: 130px;
      height: 150px;
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


            <div class="app-user-content__item ">
   <div class="app-user-content__item-detail">
      <div class="app-user-content__item-detail-title">
         <h3 class="">Thông tin tài khoản</h3>
      </div>
      <?= isset($message) ? '<div class="popup-success-user">
                                                    <strong>Thành công </strong> ' . $message. '
                                                </div>' : '' ?>
    
     

      <div class="app-user-content__item-detail-content">
         <div class="app-detail-bottom__item-comment-content-form">
            <div class=""> <span class="">Cập nhật thông tin của bạn</span></div>


            <form id="submit-form" action="" method="POST" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input name="phone_number" id="phone" value="<?= $user['phone_number'] ?>" placeholder="Số điện thoại" type="number" class="pay-input-phone" >
                        <input name="id" value="<?= $user['id'] ?>" type="hidden">
                        <input name="old_image" value="<?= $user['image'] ?>" type="hidden">
                        <span style="margin-top : 4px;color : red; font-size : 12px" class="error-phone"><?= isset($errors['phone_number']) ? $errors['phone_number'] : '* Bắt buộc nhập'?></span>
                     </div>
                  </div>


                  <div class="col-sm-6">
                     <div class="form-group">

                        <input id="name" name="name" value="<?= $user["name"] ?>" placeholder="Họ và tên" type="text" class="pay-input-name">
                        <span style="margin-top : 4px;color : red; font-size : 12px" class="error-ten-khach-hang"><?= isset($errors['name']) ? $errors['name'] : '* Bắt buộc nhập'?></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input id="email" name="email" value="<?= $user["email"] ?>" placeholder="email" type="email" class="pay-input-email">
                        <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email"><?= isset($errors['email']) ? $errors['email'] : '* Bắt buộc nhập'?></span>
                     </div>
                  </div>


                  <div class="col-sm-6">
                     <div class="form-group">

                        <input id="password" name="password" placeholder="Mật khẩu" type="password" class="pay-input-password">
                        <span style="margin-top : 4px;color : red; font-size : 12px" class="error-password"><?= isset($errors['password']) ? $errors['password'] : '* Bắt buộc nhập'?></span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">

                        <label for="file-upload" class="custom-file-upload">
                           <i class="fa fa-cloud-upload"></i> Chọn ảnh đại diện
                        </label>
                        <input accept="image/*" class="custom-infor-file" id="file-upload" type="file" name="image" />


                        <div class="app-detail-bottom__item-comment-content-form-image-custom">
                           <img src="<?=$user['image'] ? IMAGE_DIR_USER.$user['image'] : "https://png.pngtree.com/png-clipart/20190921/original/pngtree-user-avatar-boy-png-image_4693645.jpg" ?>" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>



                  <div class="col-sm-2">
                     <div class="form-group-btns submit-cmt">
                        <button type="submit" class="">Cập nhật</button>
                     </div>
                  </div>

               </div>
            </form>

         </div>


      </div>
   </div>
</div>



             </div>
         </div>
     </section>

     <script>
   function readURL(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $(".img-fluid").attr("src", e.target.result);
         };
         reader.readAsDataURL(input.files[0]);
      }
   }
   $("#file-upload").change(function() {
      var fileName = $(this).val().split("\\").pop();
      $('.custom-file-upload').html(`<i class="fa fa-cloud-upload"></i> ${fileName}`);
      readURL(this);
   });



   //////////////////////////////////////////////////////////////

   var errorPassword = $('#password').val() == '' ? true : false;
   var errorEmail = $('#email').val() == '' ? true : false;
   var errorName = $('#name').val() == '' ? true : false;
   var errorPhone = $('#phone').val() == '' ? true : false;


   $(document).on("keyup paste", "#phone", function() {
      var text = $(this).val();
      if (text == '') {
         $('.error-phone').text("* Không được để trống");
         $('#phone').addClass("border-danger");
         errorPhone = true;
      } else if (/(84|0[3|5|7|8|9])+([0-9]{8})\b/g.test(text) && text[0] != ' ') {
         $('.error-phone').text("");
         $('#phone').removeClass("border-danger");
         errorPhone = false;
      } else {
         $('.error-phone').text("* Số điện thoại không hợp lệ");
         $('#phone').addClass("border-danger");
         errorPhone = true;
      }
   });

   $(document).on("keyup paste", "#name", function() {
      var text = $(this).val();
      if (text == '') {
         $('.error-ten-khach-hang').text("* Không được để trống");
         $('#name').addClass("border-danger");
         errorName = true;
      } else if (/^[a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,27}$/.test(text) && text[0] != ' ') {
         $('.error-ten-khach-hang').text("");
         $('#name').removeClass("border-danger");
         errorName = false;
      } else {
         $('.error-ten-khach-hang').text("* Tên khách hàng phải từ 2 đến 27 ký tự trở lên và không chứa ký tự đặc biệt");
         $('#name').addClass("border-danger");
         errorName = true;
      }
   });
   $(document).on("keyup paste", "#password", function() {
      var text = $(this).val();
      if (text == '') {
         $('.error-password').text("* Không được để trống");
         $('#password').addClass("border-danger");
         errorPassword = true;
      } else if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(text) && text[0] != ' ') {
         $('.error-password').text("");
         $('#password').removeClass("border-danger");
         errorPassword = false;
      } else {
         $('.error-password').text("* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số");
         $('#password').addClass("border-danger");
         errorPassword = true;
      }
   });
   $(document).on("keyup paste", "#email", function() {
      var text = $(this).val();
      if (text == '') {
         $('.error-email').text("* Không được để trống");
         $('#email').addClass("border-danger");
         errorEmail = true;
      } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text) && text[0] != ' ') {
         $('.error-email').text("");
         $('#email').removeClass("border-danger");
         errorEmail = false;
      } else {
         $('.error-email').text("* Email không hợp lệ");
         $('#email').addClass("border-danger");
         errorEmail = true;
      }
   });



   $('#submit-form').submit(function(e) {
      return true;
      if ($('#password').val() == '') {
         $('.error-password').text("* Không được để trống");
         $('#password').addClass("border-danger");
         errorPassword = true;
      }
      if ($('#name').val() == '') {
         $('.error-name').text("* Không được để trống");
         $('#name').addClass("border-danger");
         errorName = true;
      }
      if ($('#email').val() == '') {
         $('.error-email').text("* Không được để trống");
         $('#email').addClass("border-danger");
         errorEmail = true;
      }
      if (errorPhone || errorName || errorEmail || errorPassword) return false;
      return true;
   });
</script>

<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>