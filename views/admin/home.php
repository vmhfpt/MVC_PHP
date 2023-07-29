<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>


<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DashBoard</h3>
                    </div>

                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Thông tin</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Thông tin</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?= $totalSuccess ?></h3>

                                            <p>Đơn hàng thành công</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="<?= $ADMIN_URL ?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?= $totalPending ?><sup style="font-size: 20px"></sup></h3>

                                            <p>Số đơn hàng đang xử lý</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="<?= $ADMIN_URL ?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?= currency_format($totalRevenue) ?></h3>

                                            <p>Doanh thu hệ thống</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="<?= $ADMIN_URL ?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3><?= $totalCancel ?></h3>

                                            <p>Số đơn hàng đã hủy</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="<?= $ADMIN_URL ?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                Biểu đồ đơn hàng
                                            </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;">

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6 col-6">
                                <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        Area Chart
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div id="chartContainer" style="height: 338px; padding: 0px; position: relative;" class="full-width-chart"></div>
                                </div>
                            </div>
                                </div>
                            </div>

                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <!-- /.card -->

                                            <div class="card">
                                                <div class="card-header border-transparent">
                                                    <h3 class="card-title">Đơn hàng đầu tiên</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Họ và tên</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Ngày</th>
                                                                    <th>Chi tiết</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                foreach ($orderSuggest as $key => $value) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $key + 1 ?></td>
                                                                        <td><?= $value['name'] ?></td>
                                                                        <td> <?php
                                                                                if ($value['active'] == 6) {
                                                                                    echo '<span class="badge badge-danger">Chưa tiếp nhận</span>';
                                                                                }
                                                                                if ($value['active'] == 5) {
                                                                                    echo '<span class="badge badge-warning">Đã tiếp nhận</span>';
                                                                                }
                                                                                if ($value['active'] == 4) {
                                                                                    echo '<span class="badge badge-warning">Đã rời kho</span>';
                                                                                }
                                                                                if ($value['active'] == 3) {
                                                                                    echo '<span class="badge badge-danger">Đang vận chuyển</span>';
                                                                                }
                                                                                if ($value['active'] == 2) {
                                                                                    echo '<span class="badge badge-warning">Đã đến nơi</span>';
                                                                                }
                                                                                if ($value['active'] == 1) {
                                                                                    echo '<span class="badge badge-success">Hoàn thành</span>';
                                                                                }
                                                                                if ($value['active'] == 0) {
                                                                                    echo '<span class="badge badge-dark">Đã hủy</span>';
                                                                                }
                                                                                ?></td>
                                                                        <td>
                                                                            <div class="sparkbar"><?= $value['createdAt'] ?></div>
                                                                        </td>
                                                                        <td><a href="/admin/order/detail/<?= $value['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer clearfix">
                                                    <a href="/admin/order/list" class="btn btn-sm btn-secondary float-right">Xem tất cả đơn hàng</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>

                                            <div class="col-md-12">

<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="chart-responsive">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart" height="104" style="display: block; width: 208px; height: 104px;" width="208" class="chartjs-render-monitor"></canvas>
            </div>

        </div>

        <div class="col-md-4">
            <ul class="chart-legend clearfix">
            
                <?php
                    foreach($dataItem as $key => $value){
                ?>
                    <li><i class="far fa-circle" style="color : <?=$arrBgr[$key]?> !important"></i> <?=$value["name"]?></li>
                <?php
                    }
                ?>
            </ul>
        </div>

    </div>

</div>
</div>
                                            <!-- /.card -->
                                        </div>

                                        
                                        <!-- /.col-md-6 -->
                                        <div class="col-lg-6">

                                            <!-- /.card -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Người dùng mới</h3>

                                                    <div class="card-tools">
                                                        <span class="badge badge-danger">Tổng <?=count($userSuggest)?> thành viên mới</span>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <ul class="users-list clearfix">

                                                        <?php
                                                        foreach ($userSuggest as $key => $value) {
                                                        ?>
                                                            <li>
                                                                <img width="95" height="95" style="border-radius: 100%;
   width : 95px !important;
   height : 95px !important;
   object-fit: cover;" src="<?= $value['image'] != '' ? IMAGE_DIR_USER . $value['image'] : 'https://cdn-icons-png.flaticon.com/512/149/149071.png'?>" alt="User Image">
                                                                <a class="users-list-name" href="#"><?= $value['name'] ?></a>
                                                                <span class="users-list-date"><?= $value['email'] ?></span>
                                                                <span class="users-list-date"><?= $value['role'] == 0 ? "Khách hàng" : "Nhân viên" ?></span>
                                                            </li>
                                                        <?php
                                                        }
                                                        ?>



                                                    </ul>
                                                    <!-- /.users-list -->
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer text-center">
                                                    <a href="/admin/user/list">Xem tất cả người dùng</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>
                                            <div class="row">
                                                    
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Sản phẩm thêm gần đây</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="card-body p-0">
                                                            <ul class="products-list product-list-in-card pl-2 pr-2">


                                                                <?php foreach ($productSuggest as $key => $value) { ?>

                                                                    <li class="item">
                                                                        <div class="product-img">
                                                                            <img src="<?= IMAGE_DIR_PRODUCT . $value['thumb'] ?>" alt="Product Image" class="img-size-50">
                                                                        </div>
                                                                        <div class="product-info">
                                                                            <a href="/product/<?=$value['platform_slug']?>/<?=$value['slug']?>" class="product-title"><?= $value['product_name'] ?>
                                                                                <span class="badge badge-warning float-right"><?= currency_format($value['price']) ?></span></a>
                                                                            <span class="product-description">
                                                                                <?= $value['name'] ?>
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>

                                                            </ul>
                                                        </div>

                                                        <div class="card-footer text-center">
                                                            <a href="/admin/product/list/" class="uppercase">Xem tất cả sản phẩm</a>
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                          
                                        <!-- /.col-md-6 -->
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Bình luận mới</h3>

                                                    <div class="card-tools">
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Họ và tên</th>
                                                                <th>Ngày</th>
                                                                <th>Sản phẩm</th>
                                                                <th>Nội dung</th>
                                                                <th>Trạng thái</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php foreach ($commentSuggest as $key => $value) { ?>
                                                                <tr>
                                                                    <td><?= $key + 1 ?></td>
                                                                    <td><?= $value['name'] ?></td>
                                                                    <td><?=$value['createdAt']?></td>
                                                                    <td><span class="tag tag-danger"><?= $value['name'] ?></span></td>
                                                                    <td><?= $value['content'] ?></td>
                                                                    <td><span class="badge bg-warning">Kiểm duyệt</span> </td>
                                                                </tr>
                                                            <?php } ?>


                                                        </tbody>

                                                    </table>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>

                            <!-- /.row -->
                            <!-- Main row -->



                        </div>
                    </section>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
</section>





</div>


<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>
<script>
    

      const ctx = document.getElementById("pieChart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: [<?php foreach($dataItem as $key => $value){ ?>
             "<?=$value["name"]?>",
          <?php }?>
        ],
          datasets: [{
            label: 'food Items',
            data: [<?php foreach($dataItem as $key => $value){ ?>
             <?=(int) $value["so_luong"]?>,
          <?php }?>],
            backgroundColor: ["#0074D9", "#FF4136", "#2ECC40",
            "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00",
            "#001f3f", "#39CCCC", "#01FF70", "#85144b",
            "#F012BE", "#3D9970", "#111111", "#AAAAAA"]
          }]
        },
      });
</script>



<script>
    $(function() {
        var bar_data = {
            data: [
                [0, <?= $totalCancel ?>],
                [1, <?= $totalSuccess ?>],
                [2, <?= $arrival ?>],
                [3, <?= $deliver ?>],
                [4, <?= $leaveWareHouse ?>],
                [5, <?= $receive ?>],
                [6, <?= $notReceive ?>]
            ],
            bars: {
                show: true
            }
        }
        $.plot('#bar-chart', [bar_data], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'center',
                },
            },
            colors: ['red'],
            xaxis: {
                ticks: [
                    [5, 'Tiếp nhận'],
                    [6, 'Chưa tiếp nhận'],
                    [4, 'Rời kho'],
                    [3, 'Đang giao'],
                    [2, 'Đến nơi'],
                    [1, 'Hoàn thành'],
                    [0, 'Đã hủy']
                ]
            }
        })




    })
</script>


<script type="text/javascript">
    $("#chartContainer").CanvasJSChart({
        title: {
            text: "Biểu đồ đơn hàng theo ngày",
            fontSize: 24
        },
        axisY: {
            title: "Tất cả các đơn hàng đã tồn tại"
        },
        data: [{
            type: "area",
            toolTipContent: "{label}: {y} đơn/ngày",
            dataPoints: [
                <?php foreach ($chartArea as $key => $value) { ?> {
                        label: "<?= date_format(date_create($value['createdAt']), 'Y-m-d') ?>",
                        y: <?= (int) $value['total'] ?>
                    },
                <?php } ?>
            ]
        }]
    });
</script>





<?php $this->loadView('admin/Layout/footer') ?>