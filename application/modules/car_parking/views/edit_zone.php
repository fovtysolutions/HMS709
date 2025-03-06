<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">

            <div class="card-body">

                <?php echo form_open('car_parking/car_parking/zoneCreate'); ?>
                <?php echo form_hidden('zone_id', (!empty($intinfo->zone_id)?$intinfo->zone_id:null)) ?>

                <div class="form-group row">
                    <label for="zone_type" class="col-sm-4 col-form-label"><?php echo display("zone_type") ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="zone_type" autocomplete="off" class="form-control" type="text"
                            placeholder="<?php echo display("zone_type") ?>" id="zone_type"
                            value="<?php echo (!empty($intinfo->zone_type)?html_escape($intinfo->zone_type):null) ?>"
                            required>
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