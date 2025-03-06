<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">

            <div class="card-body">

                <?php echo form_open('car_parking/car_parking/slotCreate'); ?>
                <?php echo form_hidden('slot_id', (!empty($intinfo->slot_id)?$intinfo->slot_id:null)) ?>

                <div class="form-group row">
                    <label for="slot_type" class="col-sm-4 col-form-label"><?php echo display("slot_type") ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="slot_type" autocomplete="off" class="form-control" type="text"
                            placeholder="<?php echo display("slot_type") ?>" id="slot_type" value="<?php echo (!empty($intinfo->slot_type)?html_escape($intinfo->slot_type):null) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slot_type" class="col-sm-4 col-form-label"><?php echo display("zone_type") ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select name="zone_type" class="form-control basic-single" id="zone_type">
                            <option value=""><?php echo display("select_option") ?></option>
                            <?php foreach($zone_list as $list){ ?>
                            <option value="<?php echo html_escape($list->zone_id) ?>" <?php if($list->zone_id==$intinfo->zone_id){echo 'selected';} ?>>
                                <?php echo html_escape($list->zone_type) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/edit_setting.js"></script>