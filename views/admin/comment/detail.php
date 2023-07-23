<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>
<style>
    .list-vote-flex {
        height : 100%;
        
        
        align-items: center;
        color: orange !important;
        font-size: 16px;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách bình luận sản phẩm "<?= $data['name'] ?>"</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách bình luận</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách đánh giá sản phẩm "<?= $data['name'] ?>"</h3>
                    </div>


                    <div class="container-fluid">
            <h5 class="mt-4 mb-2"> Tổng cộng <span>(<?=count($dataItem)?> xếp hạng kèm theo đánh giá) cho sản phẩm
            <?= $data['name'] ?></span></h5>
            <div class="col-md-4">
                <p class="text-center">
                    <strong>Thuộc danh hiệu : <?=round($total / $totalRank , 1)?>/5 sao</strong>
                </p>

                <div class="progress-group">
                    Thống kê trung bình xếp hạng sản phẩm
                    <span class="float-right"><b><?=round((100 / 5) * ($total / $totalRank), 2)?></b>/100</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: <?=(100 / 5) * ($total / $totalRank)?>%">
                        </div>
                    </div>
                </div>
            </div><br>

        </div>
        <div class="row">

            <div class="col-md-2 col-sm-6 col-12">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="far fa-frown"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Rất tệ</span>
                        <span class="info-box-number"><?=$worstVote?>
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width:  <?=(100/$totalRank) * $worstVote?>%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số <?=round((100/$totalRank) * $worstVote , 3)?>%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-12">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="far fa-angry"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tệ</span>
                        <span class="info-box-number"><?=$badVote?>
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?=(100/$totalRank) * $badVote?>%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số <?=round((100/$totalRank) * $badVote , 3)?>%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-12">
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="far fa-meh"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bình thường</span>
                        <span class="info-box-number"><?=$normalVote?>
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?=(100/$totalRank) * $normalVote?>%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số <?=round((100/$totalRank) * $normalVote , 3)?>%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-12">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="far fa-grin-hearts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tốt</span>
                        <span class="info-box-number"><?=$goodVote?>
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?=(100/$totalRank) * $goodVote?>%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số <?=round((100/$totalRank) * $goodVote , 3)?>%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-2 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="far fa-dizzy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Rất tốt</span>
                        <span class="info-box-number"><?=$bestVote?>
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?=(100/$totalRank) * $bestVote?>%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số <?=round((100/$totalRank) * $bestVote , 3)?>%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Xếp hạng</th>
                                <th>Nội dung</th>
                                <th>Ngày post</th>

                             
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                            foreach($dataItem as $key => $value){
                         ?>
                        <tr id="<?=$value['id']?>">
                                <td><?=$key+ 1?></td>
                                <td>
                                    <?=$value['name']?>
                                </td>
                                <td class="list-vote-flex" >
                                <?=$value['vote'] == 0 ? '<span class="badge badge-danger">Không xếp hạng</span>' : str_repeat('<i class="fa fa-star" aria-hidden="true"></i>', $value['vote'])?>
                                </td>
                                <td> <?=$value['content']?></td>
                                <td> <?=$value['createdAt']?></td>
                               
                                
                                
                                <td>
                                    <a data-delete="<?=$value['id']?>"  class="btn btn-danger btn-sm btn-delete-cmt" href="javascript:;">
                                        <i class="fas fa-trash">
                                        </i>
                                        Xóa
                                    </a>
                                </td>

                            </tr>
                         <?php
                            }
                         ?>
                           

                        </tbody>
                    </table>
                   
                </div>


            </div>
        </div>
    </div>
</section>

<script>
    $(document).on("click", ".btn-delete-cmt", function(e) {
        if (confirm("Bạn có chắc muốn xóa không") == true) {
            var id = $(this).attr("data-delete");
           
            $.ajax({
                 method: "POST",
                 url: "/admin/comment/delete",
                 data: {
                     id: id, 
                 }
             })
             .done(function(msg) {
                 msg = JSON.parse(msg);
                 if (msg.status == 'success') {
                    $('#' + id).remove();
                 }
                 
             });
        } 
    });
</script>

<?php $this->loadView('admin/Layout/footer') ?>