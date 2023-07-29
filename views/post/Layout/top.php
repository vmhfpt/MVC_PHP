</main>

<section class="app-name-product__suggest container-fluid">
  <div class="container">
    <div class="row">


    
      <?php
      foreach ($this->product->getTop16Product() as $key => $value) {
      ?>
        <div class="col-md-2 col-sm-6 col-6">
          <div class="app-name-product__suggest-item">
            <ul>
                <li class=""><a href="/product/<?=$value['platform_slug']?>/<?=$value['slug']?>" class=""> <?=$value['name']?></a></li>
             
            </ul>
          </div>
        </div>
      <?php
      }
      ?>




    </div>
  </div>
</section>