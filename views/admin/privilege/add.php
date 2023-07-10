<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Phân quyền admin "<?=$item['name']?>" </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Phân quyền admin</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
    <?php if(isset($status)) {?>
        <div class="alert alert-success">
        <strong>Thành công</strong><?=$status?>
    </div>

    <?php }?>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Điền đầy đủ các thông tin phía dưới</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>


            <form id="submit-form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="d-flex flex-column" style="gap : 25px;">
                       

                        <?php foreach($listPrivilegeGroup as $key => $group){
                            ?>
                            <div class="">
                            <span class="text-primary font-weight-bold "><?=$group['name']?></span>
                            <div class="d-flex flex-row" style="gap : 25px">
                            <?php foreach($listPrivilege as $key1 => $value){
                                  if($value['privilege_group_id'] == $group['id']){
                                ?>
                                    <div class=" custom-control custom-checkbox">
                                    <input value="<?=$value['id']?>" name="privilege[]" class="custom-control-input custom-control-input-danger" type="checkbox" id="customCheckbox<?=$value['id']?>" <?=$this->checkContain($value['id']) ? 'checked=""' : ''?> >
                                    <label for="customCheckbox<?=$value['id']?>" class="custom-control-label"><?=$value['name']?></label>
                                </div>
                            <?php 
                            }}
                            ?>
                            </div>
                        </div>

                        <?php }?>
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Lưu lại</button>
                    <a href="" class=""><button type="button" class="btn btn-danger m-2">Nhập lại</button> </a>
                    <a href="/admin/user/list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>



        </div>
    </div>
</section>


<?php $this->loadView('admin/Layout/footer') ?>