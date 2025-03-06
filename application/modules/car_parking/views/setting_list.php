<div class="card">

    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('add_new');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">

                                <div class="card-body">

                                    <?php echo form_open('car_parking/car_parking/settingCreate'); ?>
                                    <?php echo form_hidden('parkingSetting_id', (!empty($intinfo->parkingSetting_id)?$intinfo->parkingSetting_id:null)) ?>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4">
                                            <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("zone_type") ?>
                                                <span class="text-danger">*</span></label>
                                            <div class="col-md-10 mb-3">
                                                <select name="zone_type" class="form-control basic-single"
                                                    id="zone_type">
                                                    <option value=""><?php echo display("select_option") ?></option>
                                                    <?php foreach($zone_list as $list){ ?>
                                                    <option value="<?php echo html_escape($list->zone_id) ?>">
                                                        <?php echo html_escape($list->zone_type) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("vehicle_type") ?>
                                                <span class="text-danger">*</span></label>
                                            <div class="col-md-10 mb-3">
                                                <select name="vehicle_type" class="form-control basic-single"
                                                    id="vehicle_type">
                                                    <option value=""><?php echo display("select_option") ?></option>
                                                    <?php foreach($vehicle_list as $list){ ?>
                                                    <option value="<?php echo html_escape($list->vehicle_id) ?>">
                                                        <?php echo html_escape($list->vehicle_type) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("hour") ?>
                                            <span class="text-danger">*</span></label>
                                            <div class="col-md-10 mb-3">
                                                <input type="number" name="time" class="form-control" id="time" value="" placeholder="<?php echo display("hour") ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-4">
                                            <label
                                                class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("price") ?><span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-10 mb-4">
                                                <input type="text" name="price" class="form-control"
                                                    placeholder="<?php echo display("price") ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("tax") ?><span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-10 mb-4">
                                                <input type="text" name="vat" class="form-control" placeholder="<?php echo display("tax") ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4 d-flex align-items-center mb-4 mb-lg-0">
                                            <div class="col-md-10 pt-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="w-50 p-0">
                                                        <button type="submit"
                                                            class="btn btn-success btn-lg w-100"><?php echo display("submit") ?></button>
                                                    </div>
                                                    <div class="w-50 p-1">
                                                        <button type="submit"
                                                            class="btn btn-danger btn-lg w-100"><?php echo display("reset") ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>

    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('update');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body editinfo">

                </div>

            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card-header">
                <h4><?php echo display('setting_list') ?><small
                        class="float-right"><?php if($this->permission->method('car_parking','create')->access()): ?><button
                            type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
                                class="fa fa-plus-circle" aria-hidden="true"></i>
                            <?php echo display('add_new')?></button><?php endif; ?></small></h4>
            </div>
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display("zone") ?></th>
                            <th><?php echo display("vehicle_type") ?></th>
                            <th><?php echo display("ttime") ?></th>
                            <th><?php echo display("price") ?></th>
                            <th><?php echo display("tax") ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($setting_details)) {
                        ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($setting_details as $dtype) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <?php 
                            $zone = $this->db->select("zone_type")->from("tbl_zone")->where("zone_id", $dtype->zone_id)->get()->row();
                            $vehicle = $this->db->select("vehicle_type")->from("tbl_vehicle")->where("vehicle_id", $dtype->vehicle_id)->get()->row();
                            ?>
                            <td><?php echo html_escape($zone->zone_type); ?></td>
                            <td><?php echo html_escape($vehicle->vehicle_type); ?></td>
                            <td><?php echo html_escape($dtype->time)." Hours"; ?></td>
                            <td><?php echo html_escape($dtype->price); ?></td>
                            <td><?php echo html_escape($dtype->vat); ?></td>
                            </td>
                            <td class="center">
                                <?php if($this->permission->method('car_parking','update')->access()): ?>
                                <input name="url" type="hidden"
                                    id="url_<?php echo html_escape($dtype->parkingSetting_id); ?>"
                                    value="<?php echo base_url("car_parking/car_parking/settingList") ?>" />
                                <a onclick="editcarParking('<?php echo html_escape($dtype->parkingSetting_id); ?>')"
                                    class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                    title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                <?php endif; 
                                    if($this->permission->method('car_parking','delete')->access()): ?>
                                <a href="<?php echo base_url("car_parking/car_parking/settingDelete/".html_escape($dtype->parkingSetting_id)) ?>"
                                    onclick="return confirm('<?php echo display("are_you_sure") ?>')"
                                    class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right"
                                    title="Delete "><i class="ti-trash"></i></a>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <?php $sl++; ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table> <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>