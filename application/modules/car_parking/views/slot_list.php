<div class="card">

    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('add_new');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel">

                                <div class="panel-body">

                                    <?php echo form_open('car_parking/car_parking/slotCreate'); ?>
                                    <?php echo form_hidden('slot_id', (!empty($intinfo->slot_id)?$intinfo->slot_id:null)) ?>

                                    <div class="form-group row">
                                        <label for="slot_type" class="col-sm-4 col-form-label"><?php echo "slot Type" ?>
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="slot_type" autocomplete="off" class="form-control" type="text"
                                                placeholder="<?php echo "slot Type" ?>" id="slot_type" value=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slot_type"
                                            class="col-sm-4 col-form-label"><?php echo display("zone_type") ?>
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select name="zone_type" class="form-control basic-single" id="zone_type">
                                                <option value=""><?php echo display("select_option") ?></option>
                                                <?php foreach($zone_list as $list){ ?>
                                                <option value="<?php echo html_escape($list->zone_id) ?>">
                                                    <?php echo html_escape($list->zone_type) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="reset"
                                            class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit"
                                            class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
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
        <div class="modal-dialog modal-md">
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
                <h4><?php echo display('slot_list') ?><small
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
                            <th><?php echo display("slot_no") ?></th>
                            <th><?php echo display("zone_list") ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($slot_details)) {
                        ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($slot_details as $dtype) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($dtype->slot_type); ?></td>
                            <?php 
                            $zone = $this->db->select("zone_type")->from("tbl_zone")->where("zone_id", $dtype->zone_id)->get()->row();
                            ?>
                            <td><?php echo html_escape($zone->zone_type); ?></td>
                            </td>
                            <td class="center">
                                <?php if($this->permission->method('car_parking','update')->access()): ?>
                                <input name="url" type="hidden" id="url_<?php echo html_escape($dtype->slot_id); ?>"
                                    value="<?php echo base_url("car_parking/car_parking/slotList") ?>" />
                                <a onclick="editcarParking('<?php echo html_escape($dtype->slot_id); ?>')"
                                    class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                    title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                <?php endif; 
                                    if($this->permission->method('car_parking','delete')->access()): ?>
                                <a href="<?php echo base_url("car_parking/car_parking/slotDelete/".html_escape($dtype->slot_id)) ?>"
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