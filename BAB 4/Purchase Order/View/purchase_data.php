        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?= $title ?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $title ?> Data</h5>
                                <div class="table-responsive">
                                    <?php
                                        $succes_message = $this->session->flashdata('success');
                                        if($succes_message){
                                            echo '<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert">×</button>'. $succes_message.'</div>';
                                        }
                                    ?>
                                    <table id="data-table-server-side" class="table table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th width="20"><strong>No.</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Customer</strong></th>
                                                <th><strong>Origin</strong></th>
                                                <th><strong>Barcode</strong></th>
                                                <th><strong>Box Number</strong></th>
                                                <th><strong>Functional Team</strong></th>
                                                <th><strong>Storage</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th>
                                                <?php if($privileges->create == 1){ ?>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('purchase/add/') ?>"><i class="mdi mdi-plus"></i> Add</a>
                                                <?php } ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                                <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you really want to delete these records?
                                                This process cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a class="btn btn-danger btn-delete">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
