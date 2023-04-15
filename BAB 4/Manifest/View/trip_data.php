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
                                                <th class="text-nowrap" width="20"><strong>No.</strong></th>
                                                <th class="text-nowrap"><strong>Date</strong></th>
                                                <th class="text-nowrap"><strong>Manifest No.</strong></th>
                                                <th class="text-nowrap"><strong>Origin</strong></th>
                                                <th class="text-nowrap"><strong>Destination</strong></th>
                                                <th class="text-nowrap"><strong>Truckload</strong></th>
                                                <th class="text-nowrap"><strong>License Plate</strong></th>
                                                <th class="text-nowrap"><strong>Driver</strong></th>
                                                <th class="text-nowrap"><strong>Status</strong></th>
                                                <th>
                                                <?php if($privileges->create == 1 AND !$this->input->get('status')){ ?>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('trip/add/') ?>"><i class="mdi mdi-plus"></i> Add</a>
                                                <?php }elseif(($this->session->userdata('level') == 'L001' OR $this->session->userdata('level') == 'L002' OR $this->session->userdata('level') == 'L007') AND $this->input->get('status') == 'complete') { ?>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('trip/update_invoice/') ?>"><i class="mdi mdi-receipt"></i> Create Invoice</a>
                                                <?php }elseif(($this->session->userdata('level') == 'L001' OR $this->session->userdata('level') == 'L002' OR $this->session->userdata('level') == 'L007') AND $this->input->get('status') == 'payment') { ?>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('trip/update_paid/') ?>"><i class="mdi mdi-cash-100"></i> Update Payment</a>
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
                                <div class="modal fade" id="modal-remark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title update-trip" id="exampleModalLabel">Are you sure?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you really want to continue this process?
                                                This process cannot be undone.</p>
                                                <textarea class="form-control" id="remark" name="remark" placeholder="Remark"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <a class="btn btn-primary btn-confirm text-white" onclick="return confirm('Are you sure?');">Yes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
