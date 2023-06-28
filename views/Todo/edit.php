<?php $this->loadView('Layout/header') ?>
<?php $this->loadView('Layout/nav') ?>


<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Todo List "<?=$data['name']?>"</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <?=isset($success) ? '<div class="alert alert-success"> <span class=""> '.$success.'</span></div>': ''?>
       
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Require all field in form</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>


                <form action="/todo-list/edit/<?=$data['id']?>" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="<?=$data['name']?>" name="name" type="text" class="form-control" id="name" placeholder="Enter name ...">
                                    <span class="text-danger"><?=isset($data['error_name']) ? $data['error_name'] : ''?></span>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input  <?=$data['active'] == 1 ? 'checked' : ''?> type="checkbox" class="custom-control-input" id="active" name="active">
                                        <label class="custom-control-label" for="active">Active ?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-2">Update</button>
                        <a href="/todo-list/edit/<?=$data['id']?>" class=""><button type="button" class="btn btn-danger m-2">Refresh</button> </a>
                        <a href="/todo-list/list" class=""><button type="button" class="btn btn-success m-2">Lish</button></a>
                    </div>
                </form>



            </div>
        </div>
    </section>
</div>


<?php $this->loadView('Layout/footer') ?>