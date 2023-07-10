<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

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
                    <div class="app-form-container__right-tab">
                         <span class="">Đăng nhập</span>
                         <span class="app-form-container__right-tab-active">Đăng ký</span>
                    </div>

                    <div class="app-form-container__right-form">
                        <form action="" class="">
                            <div class="app-form-container__right-form-content">
                                <div class="app-form-container__right-form-item">
                                    <input placeholder="Họ và tên*" type="text" class="">
                               </div>
                               <div class="app-form-container__right-form-item">
                                <input placeholder="Số điện thoại*" type="number" class="">
                           </div>
                                <div class="app-form-container__right-form-item">
                                     <input placeholder="Email đăng nhập*" type="email" class="">
                                </div>
                                <div class="app-form-container__right-form-item">
                                    <input placeholder="Mật khẩu*" type="password" class="">
                               </div>
                              

                           <div class="app-form-container__right-form-item">
                           <button class="bg-login"> Tạo tài khoản</button>
                       </div>

                        <div class="wrapper">
                             <span class=""></span>
                             <span class="">Hoặc đăng nhập bằng</span>
                             <span class=""></span>
                        </div>

                        <div class="app-form-container__right-form-item">
                            <button class="bg-google"> Google</button>
                        </div>

                        <div class="app-form-container__right-form-item">
                            <button class="bg-facebook"> Facebook</button>
                        </div>

                            </div>
                        </form>

                       
                    </div>


                 </div>
             </div>
        </div>
    </div>



<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>


