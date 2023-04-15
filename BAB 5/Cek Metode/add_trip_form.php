        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?= $title ?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('trip') ?>"><?= $title ?></a></li>
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
                            <form class="form-horizontal" action="<?php echo site_url('trip/add') ?>" method="post">
                                <div class="card-body">
                                    <h5 class="card-title">Add <?= $title ?> Form</h5>
                                    <?php $error = form_error('trip_origin', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Origin <span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" id="trip_origin" name="trip_origin">
                                            <?php if(@$offices) : ?>
                                                <option></option>
                                            <?php foreach ($offices as $key => $office) : ?>

                                                <option value="<?= $office->office_id ?>" <?php if($this->input->post('trip_origin') == $office->office_id){echo 'selected';}?>><?= $office->office_name ?></option>

                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('trip_destination', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Destination<span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9">
                                        <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" id="trip_destination"  name="trip_destination">
                                            <?php if(@$offices2) : ?>
                                                <option></option>
                                            <?php foreach ($offices2 as $key => $office2) : ?>

                                                <option value="<?= $office2->office_id ?>" <?php if($this->input->post('trip_destination') == $office2->office_id){echo 'selected';}?>><?= $office2->office_name ?></option>

                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('fleet_type', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Truckload <span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" id="shipment_fleet_type" name="fleet_type">
                                            <?php if(@$fleet_types) : ?>
                                                <option></option>
                                            <?php foreach ($fleet_types as $fleet_type) : ?>
                                                <option data-weight="<?= $fleet_type->max_weight ?>" value="<?= $fleet_type->fleet_type_id ?>" <?php if($this->input->post('fleet_type') == $fleet_type->fleet_type_id){echo 'selected';}?>><?= $fleet_type->fleet_type_name.' ('.$fleet_type->max_weight.' Ton)' ?></option>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('fleet', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">License Plate <span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" id="shipment_fleet" name="fleet">
                                            <?php 
                                                if(@$fleets) :
                                            ?>
                                                <option></option>
                                            <?php
                                                    foreach ($fleets as $fleet) :
                                            ?>
                                                <option value="<?= $fleet->fleet_id ?>" <?php if($this->input->post('fleet') == $fleet->fleet_id){echo 'selected';}?>><?= $fleet->fleet_license_plate ?></option>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('driver', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Driver 1 <span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" id="driver" name="driver">
                                            <?php 
                                                if(@$drivers) :
                                            ?>
                                                <option></option>
                                            <?php
                                                    foreach ($drivers as $driver) :
                                            ?>
                                                <option value="<?= $driver->user_id ?>" <?php if($this->input->post('driver') == $driver->user_id){echo 'selected';}?>><?= $driver->full_name ?></option>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('second_driver', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Driver 2</span></label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" id="second_driver" name="second_driver">
                                            <?php 
                                                if(@$drivers2) :
                                            ?>
                                                <option></option>
                                            <?php
                                                    foreach ($drivers2 as $driver2) :
                                            ?>
                                                <option value="<?= $driver2->user_id ?>" <?php if($this->input->post('second_driver') == $driver2->user_id){echo 'selected';}?>><?= $driver2->full_name ?></option>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('odometer_start', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Delivery Amount <span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" id="odometer_start" name="odometer_start" value="<?= $this->input->post('odometer_start') ?>" min="2">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('trip_date', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Manifest Date <span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9 input-group">
                                            <?php if(@$this->input->post('trip_date')){ 
                                                $trip_date_post = $this->input->post('trip_date');
                                            }else{
                                                $trip_date_post = date('d-m-Y');
                                            } ?>
                                            <input type="text" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" id="datepicker-autoclose" data-date-format="dd-mm-yyyy" name="trip_date" value="<?= $trip_date_post ?>" onkeydown="return false;">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('trip_time', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Manifest Time <span class="text-danger">*</span></span></label>
                                        <div class="col-sm-9">
                                        <?php
                                            if(@$this->input->post('trip_time')){
                                                $trip_time_post = $this->input->post('trip_time');
                                            }else{
                                                $trip_time_post = date('G:i');
                                            }
                                        ?>
                                            <select class="select2 form-control custom-select <?php if($error){ echo 'is-invalid'; } ?>" name="trip_time">
                                            <?php for ($i= 0; $i <= 23; $i++) { ?>
                                                <option value="<?= $i ?>:00" <?php if($trip_time_post == $i.':00'){echo 'selected';}?>><?= $i ?>:00</option>
                                                <option value="<?= $i ?>:01" <?php if($trip_time_post == $i.':01'){echo 'selected';}?>><?= $i ?>:01</option>
                                                <option value="<?= $i ?>:02" <?php if($trip_time_post == $i.':02'){echo 'selected';}?>><?= $i ?>:02</option>
                                                <option value="<?= $i ?>:03" <?php if($trip_time_post == $i.':03'){echo 'selected';}?>><?= $i ?>:03</option>
                                                <option value="<?= $i ?>:04" <?php if($trip_time_post == $i.':04'){echo 'selected';}?>><?= $i ?>:04</option>
                                                <option value="<?= $i ?>:05" <?php if($trip_time_post == $i.':05'){echo 'selected';}?>><?= $i ?>:05</option>
                                                <option value="<?= $i ?>:06" <?php if($trip_time_post == $i.':06'){echo 'selected';}?>><?= $i ?>:06</option>
                                                <option value="<?= $i ?>:07" <?php if($trip_time_post == $i.':07'){echo 'selected';}?>><?= $i ?>:07</option>
                                                <option value="<?= $i ?>:08" <?php if($trip_time_post == $i.':08'){echo 'selected';}?>><?= $i ?>:08</option>
                                                <option value="<?= $i ?>:09" <?php if($trip_time_post == $i.':09'){echo 'selected';}?>><?= $i ?>:09</option>
                                                <option value="<?= $i ?>:10" <?php if($trip_time_post == $i.':10'){echo 'selected';}?>><?= $i ?>:10</option>
                                                <option value="<?= $i ?>:11" <?php if($trip_time_post == $i.':11'){echo 'selected';}?>><?= $i ?>:11</option>
                                                <option value="<?= $i ?>:12" <?php if($trip_time_post == $i.':12'){echo 'selected';}?>><?= $i ?>:12</option>
                                                <option value="<?= $i ?>:13" <?php if($trip_time_post == $i.':13'){echo 'selected';}?>><?= $i ?>:13</option>
                                                <option value="<?= $i ?>:14" <?php if($trip_time_post == $i.':14'){echo 'selected';}?>><?= $i ?>:14</option>
                                                <option value="<?= $i ?>:15" <?php if($trip_time_post == $i.':15'){echo 'selected';}?>><?= $i ?>:15</option>
                                                <option value="<?= $i ?>:16" <?php if($trip_time_post == $i.':16'){echo 'selected';}?>><?= $i ?>:16</option>
                                                <option value="<?= $i ?>:17" <?php if($trip_time_post == $i.':17'){echo 'selected';}?>><?= $i ?>:17</option>
                                                <option value="<?= $i ?>:18" <?php if($trip_time_post == $i.':18'){echo 'selected';}?>><?= $i ?>:18</option>
                                                <option value="<?= $i ?>:19" <?php if($trip_time_post == $i.':19'){echo 'selected';}?>><?= $i ?>:19</option>
                                                <option value="<?= $i ?>:20" <?php if($trip_time_post == $i.':20'){echo 'selected';}?>><?= $i ?>:20</option>
                                                <option value="<?= $i ?>:21" <?php if($trip_time_post == $i.':21'){echo 'selected';}?>><?= $i ?>:21</option>
                                                <option value="<?= $i ?>:22" <?php if($trip_time_post == $i.':22'){echo 'selected';}?>><?= $i ?>:22</option>
                                                <option value="<?= $i ?>:23" <?php if($trip_time_post == $i.':23'){echo 'selected';}?>><?= $i ?>:23</option>
                                                <option value="<?= $i ?>:24" <?php if($trip_time_post == $i.':24'){echo 'selected';}?>><?= $i ?>:24</option>
                                                <option value="<?= $i ?>:25" <?php if($trip_time_post == $i.':25'){echo 'selected';}?>><?= $i ?>:25</option>
                                                <option value="<?= $i ?>:26" <?php if($trip_time_post == $i.':26'){echo 'selected';}?>><?= $i ?>:26</option>
                                                <option value="<?= $i ?>:27" <?php if($trip_time_post == $i.':27'){echo 'selected';}?>><?= $i ?>:27</option>
                                                <option value="<?= $i ?>:28" <?php if($trip_time_post == $i.':28'){echo 'selected';}?>><?= $i ?>:28</option>
                                                <option value="<?= $i ?>:29" <?php if($trip_time_post == $i.':29'){echo 'selected';}?>><?= $i ?>:29</option>
                                                <option value="<?= $i ?>:30" <?php if($trip_time_post == $i.':30'){echo 'selected';}?>><?= $i ?>:30</option>
                                                <option value="<?= $i ?>:31" <?php if($trip_time_post == $i.':31'){echo 'selected';}?>><?= $i ?>:31</option>
                                                <option value="<?= $i ?>:32" <?php if($trip_time_post == $i.':32'){echo 'selected';}?>><?= $i ?>:32</option>
                                                <option value="<?= $i ?>:33" <?php if($trip_time_post == $i.':33'){echo 'selected';}?>><?= $i ?>:33</option>
                                                <option value="<?= $i ?>:34" <?php if($trip_time_post == $i.':34'){echo 'selected';}?>><?= $i ?>:34</option>
                                                <option value="<?= $i ?>:35" <?php if($trip_time_post == $i.':35'){echo 'selected';}?>><?= $i ?>:35</option>
                                                <option value="<?= $i ?>:36" <?php if($trip_time_post == $i.':36'){echo 'selected';}?>><?= $i ?>:36</option>
                                                <option value="<?= $i ?>:37" <?php if($trip_time_post == $i.':37'){echo 'selected';}?>><?= $i ?>:37</option>
                                                <option value="<?= $i ?>:38" <?php if($trip_time_post == $i.':38'){echo 'selected';}?>><?= $i ?>:38</option>
                                                <option value="<?= $i ?>:39" <?php if($trip_time_post == $i.':39'){echo 'selected';}?>><?= $i ?>:39</option>
                                                <option value="<?= $i ?>:40" <?php if($trip_time_post == $i.':40'){echo 'selected';}?>><?= $i ?>:40</option>
                                                <option value="<?= $i ?>:41" <?php if($trip_time_post == $i.':41'){echo 'selected';}?>><?= $i ?>:41</option>
                                                <option value="<?= $i ?>:42" <?php if($trip_time_post == $i.':42'){echo 'selected';}?>><?= $i ?>:42</option>
                                                <option value="<?= $i ?>:43" <?php if($trip_time_post == $i.':43'){echo 'selected';}?>><?= $i ?>:43</option>
                                                <option value="<?= $i ?>:44" <?php if($trip_time_post == $i.':44'){echo 'selected';}?>><?= $i ?>:44</option>
                                                <option value="<?= $i ?>:45" <?php if($trip_time_post == $i.':45'){echo 'selected';}?>><?= $i ?>:45</option>
                                                <option value="<?= $i ?>:46" <?php if($trip_time_post == $i.':46'){echo 'selected';}?>><?= $i ?>:46</option>
                                                <option value="<?= $i ?>:47" <?php if($trip_time_post == $i.':47'){echo 'selected';}?>><?= $i ?>:47</option>
                                                <option value="<?= $i ?>:48" <?php if($trip_time_post == $i.':48'){echo 'selected';}?>><?= $i ?>:48</option>
                                                <option value="<?= $i ?>:49" <?php if($trip_time_post == $i.':49'){echo 'selected';}?>><?= $i ?>:49</option>
                                                <option value="<?= $i ?>:50" <?php if($trip_time_post == $i.':50'){echo 'selected';}?>><?= $i ?>:50</option>
                                                <option value="<?= $i ?>:51" <?php if($trip_time_post == $i.':51'){echo 'selected';}?>><?= $i ?>:51</option>
                                                <option value="<?= $i ?>:52" <?php if($trip_time_post == $i.':52'){echo 'selected';}?>><?= $i ?>:52</option>
                                                <option value="<?= $i ?>:53" <?php if($trip_time_post == $i.':53'){echo 'selected';}?>><?= $i ?>:53</option>
                                                <option value="<?= $i ?>:54" <?php if($trip_time_post == $i.':54'){echo 'selected';}?>><?= $i ?>:54</option>
                                                <option value="<?= $i ?>:55" <?php if($trip_time_post == $i.':55'){echo 'selected';}?>><?= $i ?>:55</option>
                                                <option value="<?= $i ?>:56" <?php if($trip_time_post == $i.':56'){echo 'selected';}?>><?= $i ?>:56</option>
                                                <option value="<?= $i ?>:57" <?php if($trip_time_post == $i.':57'){echo 'selected';}?>><?= $i ?>:57</option>
                                                <option value="<?= $i ?>:58" <?php if($trip_time_post == $i.':58'){echo 'selected';}?>><?= $i ?>:58</option>
                                                <option value="<?= $i ?>:59" <?php if($trip_time_post == $i.':59'){echo 'selected';}?>><?= $i ?>:59</option>
                                            <?php } ?>
                                            </select>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('trip_remark', '<div class="invalid-feedback">', '</div>'); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 text-right control-label col-form-label"><span class="<?php if($error){ echo 'text-danger'; } ?>">Remark</span></label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control <?php if($error){ echo 'is-invalid'; } ?>" name="trip_remark"><?= $this->input->post('trip_remark') ?></textarea>
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                    <?php $error = form_error('purchase_order[]', '<div class="text-center" style="color: red;">', '</div>'); ?>
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-nopaging">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="55px"></th>
                                                <th><strong>Barcode</strong></th>
                                                <th><strong>Box Number</strong></th>
                                                <th><strong>Functional Team</strong></th>
                                                <th><strong>Storage</strong></th>
                                                <th><strong>Location</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody id="do_list" class="customtable">
                                        <?php 
                                            if(@$purchase_order) :
                                                foreach ($purchase_order as $row) :
                                        ?>
                                            <tr class="text-nowrap">
                                                <td><input type="checkbox" name="purchase_order[]" value="<?= $row->po_id ?>" <?php if(@in_array($row->po_id, $this->input->post('purchase_order'))){ echo 'checked'; } ?> /></td>
                                                <td><?= $row->po_barcode ?></td>
                                                <td><?= $row->box_number ?></td>
                                                <td><?= $row->functional_team ?></td>
                                                <td><?= $row->po_storage ?></td>
                                                <td><?= $row->office_abbreviation ?></td>
                                            </tr>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <?php echo $error; ?>
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>&nbsp;
                                        <a class="btn btn-secondary" href="<?php echo site_url('trip') ?>">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
<script>
    let select = '#shipment_fleet_type';
    let checkbox = '#do_list';
    let max_check = 2;
    
    $(document).ready(function() {

        $(select).on('change', function(){
            // Update max_check
            max_check = $('option:selected', this).attr('data-weight');
        });

        // Checkbox check
        $(checkbox).on('click', function(){

            if($('input[type="checkbox"]:checked').length == max_check){
                $('input[type="checkbox"]:not(:checked)').each((index, val) => {
                    $('input[type="checkbox"]:not(:checked)').eq(index).addClass('d-none');
                });
            }else{
                $('input[type="checkbox"]:not(:checked)').each((index, val) => {
                    $('input[type="checkbox"]:not(:checked)').eq(index).removeClass('d-none');
                });
            }
        });
    });
</script>