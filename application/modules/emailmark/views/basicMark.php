<div class="card">
    <?php if($this->permission->method('room_facilities','create')->access()): ?>
    <div class="card-header">
        <h4><?php echo display('basic_mark') ?><small class="float-right"><button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  >
            <i class="ti-plus" aria-hidden="true"></i>
        <?php echo display('new_marketing')?></button></small></h4>
    </div>
    <?php endif; ?>
    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('new_basic_marketing');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <form action="<?= base_url('email-marketing/basic-marketing-listadd') ?>" method="POST">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="panel">
                                        
                                        <div class="panel-body">
                                            <?php echo form_open_multipart('room_facilities/room_facilitidetails/create');
                                            ?>
                                            <?php echo form_hidden('facilityid', (!empty($intinfo->facilityid)?$intinfo->facilityid:null)) ?>
                                        
                                            <div class="form-group row">
                                                <label for="facilityname" class="col-sm-4 col-form-label"><?php echo display('marketing_name') ?> <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input name="facilityname" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('marketing_name') ?>" id="facilityname" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="facilititypeyname" class="col-sm-4 col-form-label"><?php echo display('select_channels') ?> <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <?php echo form_dropdown('facilititypeyname',$facilitytype,'', 'class="selectpicker form-control" data-live-search="true" id="facilititypeyname"') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="facilityname" class="col-sm-4 col-form-label"><?php echo display('discount_in') ?> <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input name="facilityname" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('discount_in') ?>" id="facilityname" value="" required>
                                                </div>
                                            </div>

                                            
                                            <div class="modal-header">
                                                    <strong><?php echo display('stay_date'); ?></strong>
                                                    <div class="form-group gap-2 row text-end">
                                                        <input type="checkbox" id="no_end_date"> 
                                                        <strong><?php echo display('no_end_date'); ?></strong>
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                            <label for="date" class="col-sm-4 col-form-label">
                                                <?php echo display('from_date'); ?> <i class="text-danger">*</i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="start_date" id="start_date"
                                                    value="<?php echo date('Y-m-d') ?>" placeholder="<?php echo display('from_date'); ?>"
                                                    class="fin_datepicker form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row" id="end_date_group">
                                            <label for="date" class="col-sm-4 col-form-label">
                                                <?php echo display('to_date'); ?> <i class="text-danger">*</i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="end_date" id="end_date"
                                                    value="<?php echo date('Y-m-d') ?>" placeholder="<?php echo display('to_date'); ?>"
                                                    class="fin_datepicker form-control">
                                            </div>
                                        </div>

                                        <div class="modal-header">
                                            <div class="form-group row">
                                                <strong class="col-sm-12"><?php echo display('blackout'); ?></strong>

                                                <div class="col-sm-8">
                                                    <label class="radio-inline my-2">
                                                        <input type="radio" name="blackout_status" value="yes" id="blackout_yes">
                                                        Yes
                                                    </label>
                                                    <label class="radio-inline my-2">
                                                        <input type="radio" name="blackout_status" value="no" id="blackout_no" checked>
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Blackout Dates (Hidden by Default) -->
                                        <div class="form-group row" id="blackout_date_group" style="display: none;">
                                            <label for="blackout_date" class="col-sm-4 p-0 col-form-label">
                                                <?php echo display('blackout_dates'); ?><i class="text-danger">*</i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="blackout_date" id="blackout_date"
                                                    placeholder="<?php echo display('blackout_dates'); ?>"
                                                    class="fin_datepicker form-control">
                                            </div>
                                        </div>

                                        <div class="modal-header flex-column">
                                            <div class="form-group row w-100">
                                                <strong class="col-sm-10"><?php echo display('only_mobile_users'); ?></strong>

                                                <div class="col-ms-2">
                                                    <label class="radio-inline my-2">
                                                        <input type="checkbox" name="only_mobile_users" value="yes" id="only_mobile_users">
                                                        Yes
                                                    </label>
                                            
                                                </div>
                                            </div>
                                            <div class="form-group row w-100 ">
                                                <strong class="col-sm-10"><?php echo display('only_member'); ?></strong>

                                                <div class="col-ms-2">
                                                    <label class="radio-inline my-2">
                                                        <input type="checkbox" name="only_member" value="yes" id="only_member">
                                                        Yes
                                                    </label>
                                            
                                                </div>
                                            </div>
                                            <div class="form-group row row w-100">
                                                <strong class="col-sm-10"><?php echo display('all_the_room_rate_plan'); ?></strong>

                                                <div class="col-ms-2">
                                                    <label class="radio-inline my-2">
                                                        <input type="checkbox" name="all_the_room_rate_plan" value="yes" id="all_the_room_rate_plan">
                                                        Yes
                                                    </label>
                                            
                                                </div>
                                            </div>
                                        </div>


                                                
                                        <div class="form-group text-right">
                                                <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('submit') ?></button>
                                                <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('cancel') ?></button>
                                            </div>
                                            <?php echo form_close() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    
                    
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
            <div class="card-body">
                <div class="table-responsive">
                
                </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="<?php echo MOD_URL.$module;?>/assets/js/custom.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    var blackoutYes = document.getElementById("blackout_yes");
    var blackoutNo = document.getElementById("blackout_no");
    var blackoutDateGroup = document.getElementById("blackout_date_group");
    var blackoutDate = document.getElementById("blackout_date");
    var startDate = document.getElementById("start_date");
    var endDate = document.getElementById("end_date");

    // Function to show/hide blackout date input
    function toggleBlackoutDate() {
        if (blackoutYes.checked) {
            blackoutDateGroup.style.display = "";
        } else {
            blackoutDateGroup.style.display = "none";
            blackoutDate.value = ""; // Clear the input when hidden
        }
    }

    // Function to validate blackout date range
    function validateBlackoutDate() {
        var start = new Date(startDate.value);
        var end = new Date(endDate.value);
        var blackout = new Date(blackoutDate.value);

        if (blackout < start || blackout > end) {
            alert("Blackout date must be between Start Date and End Date!");
            blackoutDate.value = ""; // Clear invalid input
        }
    }

    // Attach event listeners
    blackoutYes.addEventListener("change", toggleBlackoutDate);
    blackoutNo.addEventListener("change", toggleBlackoutDate);
    blackoutDate.addEventListener("change", validateBlackoutDate);
});

    </script>