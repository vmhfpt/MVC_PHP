<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<section class="app-bread-crumb container-fluid">
    <div class="container">
        <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li><a href="" class="">So sánh sản phẩm</a></li>
        </ul>
    </div>
</section>
<style>
.app-detail-compare table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

.app-detail-compare  th,td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 12px;
  width : 50%;
  
}


.app-detail-compare tr:nth-child(odd) {
  background-color: #dddddd;
}
.app-detail-compare-internal {
   display : flex;
   gap : 3px;
   flex-direction: column; 
}
.app-detail-compare-internal img {
    width : 180px;
    height : 190px;
    object-fit: cover;
}
.app-detail-compare-internal__name{
    font-size: 15px;
}
.app-detail-compare-internal__price {
    font-size: 14px;
    display : flex;
    gap : 10px;
}
.app-detail-compare-internal__price b {
    color :#FF6600;
}
.app-detail-compare-internal__price  span {
    color : #333;
    text-decoration: line-through;
}
.app-detail-compare__second-list li {
    font-size: 14px;
    line-height: 18px;
    position: relative;
    left : 12px;
}
</style>

<section class="app-detail-title container-fluid">
    <div class="container">
        <div class="app-detail-compare">
            <table>
                <tr>
                    <th>Sản phẩm 1</th>
                    <th>Sản phẩm 2</th>
                    
                </tr>
                <tr>
                    <td>
                        <a href="/product/<?=$item1['platform_slug']?>/<?=$item1['slug']?>" class="">
                            <div class="app-detail-compare-internal">
                                <div class=""><img src="<?=IMAGE_DIR_PRODUCT.$item1['thumb']?>" alt="" class=""></div>
                                <div class="app-detail-compare-internal__name"><b class=""><?=$item1['name']?></b></div>
                                <div class="app-detail-compare-internal__price"> <b class=""><?=currency_format($item1['price'] - ($item1['price'] * $item1['price_sale']))?></b> <span class=""><?=currency_format($item1['price'])?></span></div>
                            </div> 
                       </a>
                    </td>
                    <td>
                    <a href="/product/<?=$item2['platform_slug']?>/<?=$item2['slug']?>" class="">
                            <div class="app-detail-compare-internal">
                                <div class=""><img src="<?=IMAGE_DIR_PRODUCT.$item2['thumb']?>" alt="" class=""></div>
                                <div class="app-detail-compare-internal__name"><b class=""><?=$item2['name']?></b></div>
                                <div class="app-detail-compare-internal__price"> <b class=""><?=currency_format($item2['price'] - ($item2['price'] * $item2['price_sale']))?></b> <span class=""><?=currency_format($item2['price'])?></span></div>
                            </div> 
                       </a>
                    </td>
                
                </tr>
                <tr>
                    <th>Tổng quan</th>
                    <th></th>
                    
                </tr>
                <td> 
                    <div class="app-detail-compare__second-list">
                       <ul class="">
                       
                          <?php foreach($result1 as $key => $value){?>
                            <li class=""><?=$value['description']?> : <?=$value['value']?></li>
                          <?php }?>
                       </ul>
                   </div>
                </td>
                <td>
                <div class="app-detail-compare__second-list">
                       <ul class="">
                       <?php foreach($result2 as $key => $value){?>
                            <li class=""><?=$value['description']?> : <?=$value['value']?></li>
                          <?php }?>
                         
                       </ul>
                   </div>

                </td>
                <tr>
                    <th>Thương hiệu</th>
                    <th></th>
                    
                </tr>
                <td><?=$item1['brand_name']?></td>
                <td><?=$item2['brand_name']?></td>
                <?php foreach($iframeAttribute as $key => $value){?>
                    <tr>
                    <th><?=$value['description']?></th>
                    <th></th>
                    
                </tr>
                <td><?=$this->getCompare($result1,$value['id'])?></td>
                <td><?=$this->getCompare($result2,$value['id'])?></td>
                <?php }?>
                
                
               
            </table>
        </div>
    </div>
</section>
<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>