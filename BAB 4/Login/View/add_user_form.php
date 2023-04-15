        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?= $title ?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>"><?= $title ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('user/add') ?>" method="post">
                                <div class="card-body">
                                    <h5 class="card-title">Add <?= $title ?> Form</h5>
                                    <?php $error = form_error('fullname', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Full Name</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" name="fullname" value="<?= $this->input->post('fullname') ?>">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('username', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Username</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" name="username" value="<?= $this->input->post('username') ?>">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('office', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Office</span></label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" name="office">
                                            <?php 
                                                if(@$offices) :
                                                    foreach ($offices as $key => $office) :
                                            ?>

                                                <option value="<?= $office->office_id ?>" <?php if($this->input->post('office') == $office->office_id){echo 'selected';}?>><?= $office->office_name ?></option>
                                                
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('level', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Level</span></label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" name="level">
                                            <?php 
                                                if(@$levels) :
                                                    foreach ($levels as $level) :
                                                        if($level->level_id >= $this->session->userdata('level')) :
                                            ?>
                                                <option value="<?= $level->level_id ?>" <?php if($this->input->post('level') == $level->level_id){echo 'selected';}?>><?= $level->level_title ?></option>
                                            <?php
                                                        endif;
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('phone', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Phone Number</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" name="phone" value="<?= $this->input->post('phone') ?>">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('email', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Email Address</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" name="email" value="<?= $this->input->post('email') ?>" placeholder="If any">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('password', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Password</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" name="password">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('repassword', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Confirm Password</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" name="repassword">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>&nbsp;
                                        <a class="btn btn-secondary" href="<?php echo site_url('user') ?>">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            