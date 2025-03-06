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
                            <select name="zone_type" class="form-control basic-single" id="zone_type">
                                <option value=""><?php echo display("select_option") ?></option>
                                <?php foreach($zone_list as $list){ ?>
                                <option value="<?php echo html_escape($list->zone_id) ?>"
                                    <?php if($intinfo->zone_id==$list->zone_id){echo 'selected';} ?>>
                                    <?php echo html_escape($list->zone_type) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("vehicle_type") ?>
                            <span class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <select name="vehicle_type" class="form-control basic-single" id="vehicle_type">
                                <option value=""><?php echo display("select_option") ?></option>
                                <?php foreach($vehicle_list as $list){ ?>
                                <option value="<?php echo html_escape($list->vehicle_id) ?>"
                                    <?php if($list->vehicle_id==$intinfo->vehicle_id){echo 'selected';} ?>>
                                    <?php echo html_escape($list->vehicle_type) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("hour") ?>
                        <span class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="number" name="time" class="form-control lwidth_65" id="time"
                                        value="<?php echo (!empty($intinfo->time)?html_escape($intinfo->time):null)?>"
                                        placeholder="Hours">
                                </div>
                                <div class="col-md-5">
                                    <span class="form-control lwidth_65"><?php echo (!empty($intinfo->time)?"Hours":null)?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("price") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-4">
                            <input type="text" name="price" class="form-control" placeholder="100.00"
                                value="<?php echo (!empty($intinfo->price)?html_escape($intinfo->price):null) ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("tax") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-4">
                            <input type="text" name="vat" class="form-control" placeholder="10%"
                                value="<?php echo (!empty($intinfo->vat)?html_escape($intinfo->vat):null) ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 d-flex align-items-center mb-4 mb-lg-0">
                        <div class="col-md-10 pt-2">
                            <div class="d-flex align-items-center">
                                <div class="w-50 p-0">
                                    <button type="submit" class="btn btn-success btn-lg w-100"><?php echo display("update") ?></button>
                                </div>
                                <div class="w-50 p-1">
                                    <button type="reset" class="btn btn-primary btn-lg w-100"><?php echo display("reset") ?></button>
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
<script src="<?php echo MOD_URL.$module;?>/assets/js/edit_setting.js"></script>