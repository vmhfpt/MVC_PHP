<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

<section class="app-bread-crumb container-fluid">
            <div class="container">
              <ul >
                <li ><a href="" >Trang chủ</a> /</li>
                <li ><a href="" >Cửa hàng</a></li>
              </ul>
            </div>
          </section>

      <section class="app-shop container-fluid">
          <div class="container">
            <div class="app-shop-title">
                <span class=""><?=$item['name']?></span>
            </div>
             <?=$item['content']?>
          </div>
      </section>
<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>