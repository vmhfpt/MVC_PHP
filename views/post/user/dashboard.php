<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<section class="app-user container-fluid ">
         <div class="container">
             <div class="app-user-content">
                 <div class="app-user-content__item ">
                     <div class="app-user-content__item-content">
                          <div class="app-user-content__item-content-tab">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="">Xin chào,</span>
                            <b class=""> Hung Vu</b>
                          </div>

                          <div class="app-user-content__item-content-list">
                            <div class="app-user-content__item-content-list-item">
                                <div class="">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="">
                                    <span class="">Thông tin tài khoản</span>
                                </div>
                            </div>
                            <div class="app-user-content__item-content-list-item">
                                <div class="">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                </div>
                                <div class="">
                                    <span class="">Quản lý đơn hàng</span>
                                </div>
                            </div>
                            <div class="app-user-content__item-content-list-item">
                                <div class="">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <div class="">
                                    <span class="">Mật khẩu</span>
                                </div>
                            </div>
                            <div class="app-user-content__item-content-list-item app-user-content__item-content-list-item-active">
                                <div class="">
                                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                                </div>
                                <div class="">
                                    <span class="">Sổ địa chỉ</span>
                                </div>
                            </div>
                            <div class="app-user-content__item-content-list-item">
                                <div class="">
                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                                </div>
                                <div class="">
                                    <span class="">Đăng nhập</span>
                                </div>
                            </div>
                          </div>
                     </div>
                 </div>
                 <div class="app-user-content__item ">
                      <div class="app-user-content__item-detail">
                          <div class="app-user-content__item-detail-title">
                             <h3 class="">Quản lý đơn hàng</h3>
                          </div>

                          <div class="app-user-content__item-detail-content">
                             <span class="">Bạn chưa thực hiện bất kỳ đơn đặt hàng nào trước đó!</span>
                          </div>
                      </div>
                 </div>
             </div>
         </div>
     </section>


<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>