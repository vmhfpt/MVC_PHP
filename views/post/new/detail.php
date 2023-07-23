<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<section class="app-bread-crumb container-fluid">
        <div class="container">
          <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li class=""><a href="" class=""><?=$item['title']?></a></li>
          </ul>
        </div>
      </section>

      <section class="app-filter-category container-fluid ">
         <div class="container">
             <div class="app-filter-category__content">
               <ul class="">
                  <a href="" class=""> <li class="">Tin công nghệ</li></a>
                  <a href="" class=""> <li class="">Đánh giá chi tiết</li></a>
                  <a href="" class=""> <li class="">Tư vấn chọn mua</li></a>
                  <a href="" class=""> <li class="">Tin khuyến mại</li></a>
                  <a href="" class=""> <li class="">Mẹo hay công nghệ</li></a>
                  <a href="" class=""> <li class="">Hướng dẫn kĩ thuật</li></a>
                  <a href="" class=""> <li class="">Video công nghệ</li></a>
                  <a href="" class=""> <li class="">Cách kiểm tra máy cũ</li></a>
                  <a href="" class=""> <li class="">Tuyển dụng</li></a>
                  <a href="" class=""> <li class="">Chính sách bán hàng</li></a>
                  <a href="" class=""> <li class="">Đời sống</li></a>
               </ul>
             </div>
         </div>
      </section>

     <section class="app-new container-fluid ">
         <div class="container">
             <div class="app-new__content">
              <div class="app-new__content-item ">
                   <div class="app-detail-post">
                        <div class="app-detail-post__content">
                             <div class="app-detail-post__content-title">
                                  <div class="app-detail-post__content-title-h3">
                                    <h3 class=""><?=$item['title']?></h3>
                                  </div>

                                  <div class="app-detail-post__content-title-date">
                                       <div class="app-detail-post__content-title-date-item">
                                          <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?=$item['createdAt']?></span>
                                          <span class="">
                                            <i class="fa fa-eye" aria-hidden="true"></i> 35
                                          </span>
                                       </div>

                                       <div class="app-detail-post__content-title-date-author">
                                          <span class="">Tác Giả: <b class="">HongHanh</b> Hồng Hạnh</span>
                                       </div>
                                  </div>
                             </div>

                             <div class="app-detail-post__content-news">
                                  <?=$item['content']?>
                             </div>

                             <div class="app-detail-post__content-next-suggest">
                                 <span class=""><b class="">Bạn đang xem:</b><?=$item['title']?></span>

                                 <span class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Bài trước</span>
                             </div>
                        </div>
                        <div class="app-detail-post__relevant">
                            <div class="app-detail-promotion__tab">
          
                                <img data="https://didongthongminh.vn/modules/products/assets/images/danhgia.svg" alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/icon_pk.svg">
                                <span>Bài viết liên quan</span>
                            
                            </div>

                            <div class="app-detail-post__relevant-content">
                                <div class="row">
                                    <div class="col-sm-4 ">
                                        <div class="app-detail-post__relevant-content-item">
                                            <div class="app-detail-post__relevant-content-item-img">
                                                <img src="https://didongthongminh.vn/images/news/2023/02/resize/so-sanh-galaxy-a34-va-galaxy-a54_1676454502.jpg" alt="" class="">

                                                <a href="" class=""><span class="">So sánh hai thiết bị sắp ra mắt của Samsung: Galaxy A34 và Galaxy A54</span></a>
                                            </div>

                                            <div class="app-detail-post__relevant-content-item-detail">
                                                <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> 18/02/2023</span>
                                                <span class="">
                                                  <i class="fa fa-eye" aria-hidden="true"></i> 35
                                                </span>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <div class="app-detail-post__relevant-content-item">
                                            <div class="app-detail-post__relevant-content-item-img">
                                                <img src="https://didongthongminh.vn/images/news/2023/02/resize/so-sanh-galaxy-a34-va-galaxy-a54_1676454502.jpg" alt="" class="">

                                                <a href="" class=""><span class="">So sánh hai thiết bị sắp ra mắt của Samsung: Galaxy A34 và Galaxy A54</span></a>
                                            </div>

                                            <div class="app-detail-post__relevant-content-item-detail">
                                                <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> 18/02/2023</span>
                                                <span class="">
                                                  <i class="fa fa-eye" aria-hidden="true"></i> 35
                                                </span>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <div class="app-detail-post__relevant-content-item">
                                            <div class="app-detail-post__relevant-content-item-img">
                                                <img src="https://didongthongminh.vn/images/news/2023/02/resize/so-sanh-galaxy-a34-va-galaxy-a54_1676454502.jpg" alt="" class="">

                                                <a href="" class=""><span class="">So sánh hai thiết bị sắp ra mắt của Samsung: Galaxy A34 và Galaxy A54</span></a>
                                            </div>

                                            <div class="app-detail-post__relevant-content-item-detail">
                                                <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> 18/02/2023</span>
                                                <span class="">
                                                  <i class="fa fa-eye" aria-hidden="true"></i> 35
                                                </span>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="app-detail-post__comment">
                            <div class="app-detail-promotion__tab">
          
                                <img data="https://didongthongminh.vn/modules/products/assets/images/danhgia.svg" alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/icon_pk.svg">
                                <span>Bình luận  (4)</span>
                            
                            </div>
                            <div class="app-detail-post__comment-content app-detail-bottom__item-comment-content ">
                                <div class="">
                                    <div class="app-detail-bottom__item-comment-content-item">
                                      <div class="app-detail-bottom__item-comment-content-item-top">
                                        <div class="app-detail-bottom__item-comment-content-item-top-left">
                                            <span class="">Thế tài</span>
                                            <ul class="">
                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="app-detail-bottom__item-comment-content-item-top-right">
                                          <span class="">23:07:54 04/02/2023</span>
                                        </div>
                                      </div>
                                      <div class="app-detail-bottom__item-comment-content-item-bottom">
                                        <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                                      </div>
                                  </div>
                                  <div class="app-detail-bottom__item-comment-content-item">
                                    <div class="app-detail-bottom__item-comment-content-item-top">
                                      <div class="app-detail-bottom__item-comment-content-item-top-left">
                                          <span class="">Thế tài</span>
                                          <ul class="">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                          </ul>
                                      </div>
                                      <div class="app-detail-bottom__item-comment-content-item-top-right">
                                        <span class="">23:07:54 04/02/2023</span>
                                      </div>
                                    </div>
                                    <div class="app-detail-bottom__item-comment-content-item-bottom">
                                      <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                                    </div>
                  
                                    <div class="app-detail-bottom__item-comment-content-item-child">
                                      
                  
                  
                                      <div class="app-detail-bottom__item-comment-content-item">
                                        <div class="app-detail-bottom__item-comment-content-item-top">
                                          <div class="app-detail-bottom__item-comment-content-item-top-left">
                                              <span class="">Thế tài</span>
                                              <ul class="">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                              </ul>
                                          </div>
                                          <div class="app-detail-bottom__item-comment-content-item-top-right">
                                            <span class="">23:07:54 04/02/2023</span>
                                          </div>
                                        </div>
                                        <div class="app-detail-bottom__item-comment-content-item-bottom">
                                          <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                                        </div>
                                    </div>
                  
                                    
                                    </div>
                                </div>
                                <div class="app-detail-bottom__item-comment-content-item">
                                  <div class="app-detail-bottom__item-comment-content-item-top">
                                    <div class="app-detail-bottom__item-comment-content-item-top-left">
                                        <span class="">Thế tài</span>
                                        <ul class="">
                                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                    <div class="app-detail-bottom__item-comment-content-item-top-right">
                                      <span class="">23:07:54 04/02/2023</span>
                                    </div>
                                  </div>
                                  <div class="app-detail-bottom__item-comment-content-item-bottom">
                                    <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                                  </div>
                              </div>
                              <div class="app-detail-bottom__item-comment-content-item">
                                <div class="app-detail-bottom__item-comment-content-item-top">
                                  <div class="app-detail-bottom__item-comment-content-item-top-left">
                                      <span class="">Thế tài</span>
                                      <ul class="">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      </ul>
                                  </div>
                                  <div class="app-detail-bottom__item-comment-content-item-top-right">
                                    <span class="">23:07:54 04/02/2023</span>
                                  </div>
                                </div>
                                <div class="app-detail-bottom__item-comment-content-item-bottom">
                                  <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                                </div>
                            </div>
                                   </div>

                            </div>

                            <div class="app-detail-post__add-comment">
                                 <div class="app-detail-post__add-comment-title">
                                     <h3 class="">VIẾT BÌNH LUẬN CỦA BẠN
                                    </h3>

                                    <span class="">Địa chỉ email của bạn sẽ được bảo mật. Các trường bắt buộc được đánh dấu *</span>
                                 </div>

                                 <div class="app-detail-post__add-comment-form">
                                     <form action="" class="">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                     <label for="" class="">Nội dung <span class="">*</span></label>
                                                     <textarea placeholder="Mời bạn thảo luận, vui lòng nhập Tiếng Việt có dấu" name="" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="">Họ tên <span class="">*</span></label>
                                                    <input placeholder="Họ tên" type="text" class="">
                                               </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="">Email <span class="">*</span></label>
                                                    <input placeholder="Email" type="email" class="">
                                               </div>
                                             </div>

                                             <div class="col-md-12">
                                                <div class=" form-group-btn">
                                                    <div class="">
                                                        <button class="">Gửi bình luận</button>
                                                    </div>
                                                </div>
                                             </div>
                                             
                                         </div>
                                     </form>
                                 </div>
                            </div>

                        </div>
                   </div>
              </div>
              <div class="app-new__content-item" >
                  <div class="app-new__content-item-right">
                    <div class="app-new__content-item-right-search">
                           <input type="text" name="" id="" placeholder="Từ khóa tìm kiếm">
                           <button class=""><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>


                    <div class="app-new__content-item-right-new-hot">
                         <div class="app-new__content-item-right-tag">
                          <h3 class="">chủ đề hot</h3>
                         </div>
                         <div class="app-new__content-item-right-content">
                          <div class="app-new__content-item-right-content-item">
                              <span class="">iPhone 11 giá rẻ</span>
                          </div>
                          <div class="app-new__content-item-right-content-item">
                            <span class="">iPhone 13 giá rẻ</span>
                        </div>
                        <div class="app-new__content-item-right-content-item">
                          <span class="">iPhone 14 giá rẻ</span>
                      </div>
                    

                         </div>
                    </div>


                    <div class="app-new__content-item-right-many-view">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">Tin xem nhiều</h3>
                       </div>

                       <div class="app-new__content-item-right-many-view-content">
                        <div class="app-new__content-item-right-many-view-item">
                            <div class="app-new__content-item-right-many-view-item-left">1</div>
                            <div class="app-new__content-item-right-many-view-item-right">2023 có nên mua iPhone 11? Đánh giá chi tiết iPhone 11 sau 3 năm sử dụng</div>
                        </div>
                        <div class="app-new__content-item-right-many-view-item">
                          <div class="app-new__content-item-right-many-view-item-left">4</div>
                          <div class="app-new__content-item-right-many-view-item-right">Tưng Bừng Sinh Nhật - Bão Khuyến Mãi Đổ Bộ Di Động Thông Minh Cần Thơ - Di Động Thông Minh</div>
                      </div>
                      <div class="app-new__content-item-right-many-view-item">
                        <div class="app-new__content-item-right-many-view-item-left">2</div>
                        <div class="app-new__content-item-right-many-view-item-right">Tưng Bừng Sinh Nhật - Bão Khuyến Mãi Đổ Bộ Di Động Thông Minh Cần Thơ - Di Động Thông Minh</div>
                    </div>
                    <div class="app-new__content-item-right-many-view-item">
                      <div class="app-new__content-item-right-many-view-item-left">3</div>
                      <div class="app-new__content-item-right-many-view-item-right">Tưng Bừng Sinh Nhật - Bão Khuyến Mãi Đổ Bộ Di Động Thông Minh Cần Thơ - Di Động Thông Minh</div>
                  </div>
                  <div class="app-new__content-item-right-many-view-item">
                    <div class="app-new__content-item-right-many-view-item-left">4</div>
                    <div class="app-new__content-item-right-many-view-item-right">Tưng Bừng Sinh Nhật - Bão Khuyến Mãi Đổ Bộ Di Động Thông Minh Cần Thơ - Di Động Thông Minh</div>
                </div>
                <div class="app-new__content-item-right-many-view-item">
                  <div class="app-new__content-item-right-many-view-item-left">5</div>
                  <div class="app-new__content-item-right-many-view-item-right">Tưng Bừng Sinh Nhật - Bão Khuyến Mãi Đổ Bộ Di Động Thông Minh Cần Thơ - Di Động Thông Minh</div>
              </div>
                       </div>
                    </div>

                    <div class="app-new__content-item-right-promotion">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">Tin khuyến mại</h3>
                       </div>

                       <div class="app-new__content-item-right-promotion-content">
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="app-new__content-item-right-promotion-content-item">
                                    <img src="https://didongthongminh.vn/images/news/2023/02/original/gia-ip-xs-max-cu-4_1676619811.jpg" alt="" class="">

                           <a href="" class="">         <span class="">Đặt hàng Galaxy S23 series: Tặng sạc đôi không dây, đặc quyền nâng cấp 5 triệu đồng</span></a>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="app-new__content-item-right-promotion-content-item">
                                  <img src="https://didongthongminh.vn/images/news/2023/02/original/gia-ip-xs-max-cu-4_1676619811.jpg" alt="" class="">

                         <a href="" class="">         <span class="">Đặt hàng Galaxy S23 series: Tặng sạc đôi không dây, đặc quyền nâng cấp 5 triệu đồng</span></a>
                              </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="app-new__content-item-right-promotion-content-item">
                                  <img src="https://didongthongminh.vn/images/news/2023/02/original/gia-ip-xs-max-cu-4_1676619811.jpg" alt="" class="">

                         <a href="" class="">         <span class="">Đặt hàng Galaxy S23 series: Tặng sạc đôi không dây, đặc quyền nâng cấp 5 triệu đồng</span></a>
                              </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="app-new__content-item-right-promotion-content-item">
                                  <img src="https://didongthongminh.vn/images/news/2023/02/original/gia-ip-xs-max-cu-4_1676619811.jpg" alt="" class="">

                         <a href="" class="">         <span class="">Đặt hàng Galaxy S23 series: Tặng sạc đôi không dây, đặc quyền nâng cấp 5 triệu đồng</span></a>
                              </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="app-new__content-item-right-promotion-content-item">
                                  <img src="https://didongthongminh.vn/images/news/2023/02/original/gia-ip-xs-max-cu-4_1676619811.jpg" alt="" class="">

                         <a href="" class="">         <span class="">Đặt hàng Galaxy S23 series: Tặng sạc đôi không dây, đặc quyền nâng cấp 5 triệu đồng</span></a>
                              </div>
                              </div>
                          </div>
                       </div>
                    </div>


                    <div class="app-new__content-item-right-recruitment">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">Tin tuyển dụng</h3>
                       </div>

                       <div class="app-new__content-item-right-recruitment-content">

                          <div class="app-new__content-item-right-recruitment-content-item">
                               <div class="app-new__content-item-right-recruitment-content-item-title">
                                   <span class="">Tuyến dụng chuyên viên lập trình front-end </span>

                                   <span class="">Hà Nội</span>
                               </div>
                               <div class="app-new__content-item-right-recruitment-content-item-date">
                                 <span class="">Hạn nộp</span>
                                 <span class="">31/03/2023</span>
                               </div>
                          </div>
                          <div class="app-new__content-item-right-recruitment-content-item">
                            <div class="app-new__content-item-right-recruitment-content-item-title">
                                <span class="">Tuyến dụng chuyên viên lập trình front-end </span>

                                <span class="">Hà Nội</span>
                            </div>
                            <div class="app-new__content-item-right-recruitment-content-item-date">
                              <span class="">Hạn nộp</span>
                              <span class="">31/03/2023</span>
                            </div>
                       </div>
                       <div class="app-new__content-item-right-recruitment-content-item">
                        <div class="app-new__content-item-right-recruitment-content-item-title">
                            <span class="">Tuyến dụng chuyên viên lập trình front-end </span>

                            <span class="">Hà Nội</span>
                        </div>
                        <div class="app-new__content-item-right-recruitment-content-item-date">
                          <span class="">Hạn nộp</span>
                          <span class="">31/03/2023</span>
                        </div>
                   </div>
                   <div class="app-new__content-item-right-recruitment-content-item">
                    <div class="app-new__content-item-right-recruitment-content-item-title">
                        <span class="">Tuyến dụng chuyên viên lập trình front-end </span>

                        <span class="">Hà Nội</span>
                    </div>
                    <div class="app-new__content-item-right-recruitment-content-item-date">
                      <span class="">Hạn nộp</span>
                      <span class="">31/03/2023</span>
                    </div>
               </div>
               <div class="app-new__content-item-right-recruitment-content-item">
                <div class="app-new__content-item-right-recruitment-content-item-title">
                    <span class="">Tuyến dụng chuyên viên lập trình front-end </span>

                    <span class="">Hà Nội</span>
                </div>
                <div class="app-new__content-item-right-recruitment-content-item-date">
                  <span class="">Hạn nộp</span>
                  <span class="">31/03/2023</span>
                </div>
           </div>
                       </div>
                    </div>


                    <div class="app-new__content-item-right-product-post">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">bài viết sản phẩm</h3>
                       </div>
                       <div class="app-new__content-item-right-product-post-content">
                        <div class="app-new__content-item-right-product-post-content-item">
                            <div class="app-new__content-item-right-product-post-content-item-img">
                                <img src="https://didongthongminh.vn/images/products/2023/02/11/resized/realme-gt-neo-5-3.jpg" alt="" class="">
                            </div>
                            <div class="app-new__content-item-right-product-post-content-item-detail">
                               <a href="" class=""><span class="">Realme GT Neo 5 16GB/256GB - Sạc nhanh 150W</span></a>
                               <a href="" class=""><span class="">Liên hệ</span></a>
                               <a href="" class=""><span class="app-new__content-item-right-product-post-content-item-detail-emphasize">3 bài viết</span></a>
                            </div>
                           
                        </div>
                        <div class="app-new__content-item-right-product-post-content-item">
                          <div class="app-new__content-item-right-product-post-content-item-img">
                              <img src="https://didongthongminh.vn/images/products/2023/02/11/resized/realme-gt-neo-5-3.jpg" alt="" class="">
                          </div>
                          <div class="app-new__content-item-right-product-post-content-item-detail">
                             <a href="" class=""><span class="">Realme GT Neo 5 16GB/256GB - Sạc nhanh 150W</span></a>
                             <a href="" class=""><span class="">Liên hệ</span></a>
                             <a href="" class=""><span class="app-new__content-item-right-product-post-content-item-detail-emphasize">3 bài viết</span></a>
                          </div>
                         
                      </div>
                      <div class="app-new__content-item-right-product-post-content-item">
                        <div class="app-new__content-item-right-product-post-content-item-img">
                            <img src="https://didongthongminh.vn/images/products/2023/02/11/resized/realme-gt-neo-5-3.jpg" alt="" class="">
                        </div>
                        <div class="app-new__content-item-right-product-post-content-item-detail">
                           <a href="" class=""><span class="">Realme GT Neo 5 16GB/256GB - Sạc nhanh 150W</span></a>
                           <a href="" class=""><span class="">Liên hệ</span></a>
                           <a href="" class=""><span class="app-new__content-item-right-product-post-content-item-detail-emphasize">3 bài viết</span></a>
                        </div>
                       
                    </div>
                    <div class="app-new__content-item-right-product-post-content-item">
                      <div class="app-new__content-item-right-product-post-content-item-img">
                          <img src="https://didongthongminh.vn/images/products/2023/02/11/resized/realme-gt-neo-5-3.jpg" alt="" class="">
                      </div>
                      <div class="app-new__content-item-right-product-post-content-item-detail">
                         <a href="" class=""><span class="">Realme GT Neo 5 16GB/256GB - Sạc nhanh 150W</span></a>
                         <a href="" class=""><span class="">Liên hệ</span></a>
                         <a href="" class=""><span class="app-new__content-item-right-product-post-content-item-detail-emphasize">3 bài viết</span></a>
                      </div>
                     
                  </div>
                       </div>
                    </div>
                  </div>
              </div>
             </div>
         </div>
     </section>

<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>