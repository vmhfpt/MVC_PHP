<?php $this->loadView('Layout/header') ?>
<?php $this->loadView('Layout/nav') ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                <button type="button" class="btn btn-danger confirm-delete">Delete</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="error-empty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">You have not selected an item !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List todo - date current used by third library Carbon (<?=$date_now?>)</h3>
            <div class="card-tools">
                <form method="GET" action="/todo-list/list"  class="input-group input-group-sm" style="width: 150px;">
                    
                    <input value="<?= isset($_GET['key']) ? $_GET['key'] : '' ?>" type="text" name="key" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            <ul class="todo-list ui-sortable" data-widget="todo-list">

                <?php foreach ($data as $key => $value) { ?>
                    <li id="<?= $value['id'] ?>">
                        <span class="handle ui-sortable-handle">
                            <i class="fas fa-ellipsis-v"></i>
                            <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div class="icheck-primary d-inline ml-2">
                            <input class="get-check" type="checkbox" value="<?= $value["id"] ?>" name="check[]" id="todoCheck<?= $key ?>">
                            <label for="todoCheck<?= $key ?>"></label>
                        </div>
                        <span class="text"><?= $value['name'] ?></span>
                        <small class="badge <?= $key == 0 ? 'badge-danger' : 'badge-success' ?>"><i class="far fa-clock"></i> <?= $value['createdAt'] ?></small>
                        <div class="tools">
                            <a href="edit?id=<?= $value['id'] ?>" class=""><i class="fas fa-edit"></i></a>
                            <i class="fas fa-trash-o"></i>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <?= $page > 1 ? ' <li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">«</a></li>' : '' ?>
                <?php for ($i = 1; $i <= ceil($totalItem / $limitShow); $i++) { ?>

                    <li class="page-item  <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>

                <?= $page >= ceil($totalItem / $limitShow) ? '' :  '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">»</a></li>' ?>
            </ul>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-warning m-2 check-all">Select all</button>
            <button type="submit" class="btn btn-primary m-2 cancel-all">Cancel all</button>
            <button type="submit" class="btn btn-danger m-2 delete-all">Delete all by selected</button>
            <a href="add" class=""> <button type="button" class="btn btn-success m-2">Add</button></a>
        </div>
    </div>
</div>

<script>
    $('.check-all').click(function() {
        $('.get-check').each(function() {
            $(this).prop('checked', true);
        })
    });
    $('.cancel-all').click(function() {
        $('.get-check').each(function() {
            $(this).prop('checked', false);
        })
    });
    $('.delete-all').click(function() {

        if ($(".get-check:checked").length == 0) {
            $('#error-empty').modal('toggle');
        } else {
            $('.confirm-delete').attr('type-delete', 'multiple');
            $('#exampleModalLabel').text(`Are you sure You want to delete ${$(".get-check:checked").length} items selected`);
            $('#exampleModal').modal('toggle');
        }
    });
    $('.confirm-delete').click(function() {
        $('#exampleModal').modal('toggle');
        if ($(this).attr("type-delete") == 'multiple') {
            var arrDelete = [];
            $(".get-check:checked").each(function(i) {
                arrDelete[i] = $(this).val();
            });
            deleteAjax(arrDelete);
        }
    });

    function deleteAjax(dataPayload) {
        $.ajax({
                method: "POST",
                url: "/todo-list/delete",
                data: {
                    arr: dataPayload,
                }
            })
            .done(function(msg) {
                msg = JSON.parse(msg);
                if (msg.status == "success") {
                    dataPayload.forEach(function(item, index) {
                        $('#' + item).remove();
                    });
                }
            });
    }
</script>
<?php $this->loadView('Layout/footer') ?>