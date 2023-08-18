<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>






<section class="content">
    <div class="container-fluid">
    
    <?= isset($errors) ? ' <div class="alert alert-danger"> <span class="">Lỗi</span></div>' : ''?>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Thêm flash sale sản phẩm</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>


            <form id="submit-form" action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                               
                                <label for="ma_hh">SẢN PHẨM</label>
                                <select name="product_id" class="custom-select">
                                        <?php foreach($listProduct as $key => $value){?>
                                            <option  <?= isset($old_field['product_id']) && $old_field['product_id'] == $value['id'] ? 'selected' : ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                        <?php }?>
                                   
                                        
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">GIẢM GIÁ FLASH SALE (%)</label>
                                <input value="<?= isset($old_field['discount_new']) ? $old_field['discount_new'] : ''?>" name="discount_new" type="text" class="form-control" id="giam_gia" placeholder="Nhập giảm giá">
                                <?= isset($errors['discount_new']) ? '<span id="error-name" class="text-danger">'.$errors['discount_new'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label for="giam_gia">NGÀY BẮT ĐẦU </label>
                                <input id="party" type="datetime-local" name="start_date" value="<?= isset($old_field['start_date']) ? $old_field['start_date'] : ''?>" class="form-control" />
                                <?= isset($errors['start_date']) ? '<span id="error-name" class="text-danger">'.$errors['start_date'].'</span>' : ''?>
                            </div>
                            <div class="form-group">
                                <label for="giam_gia">NGÀY KẾT THÚC </label>
                                <input id="party" type="datetime-local" name="end_date" value="<?= isset($old_field['end_date']) ? $old_field['end_date'] : ''?>" class="form-control" />
                                <?= isset($errors['end_date']) ? '<span id="error-name" class="text-danger">'.$errors['end_date'].'</span>' : ''?>
                            </div>
                           

                    



                        </div>
                      

                       
                       

                    </div>

                  
                   

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
                    <a href="/admin/flashsale/list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>



        </div>
    </div>
</section>

<?php $this->loadView('admin/Layout/footer') ?>