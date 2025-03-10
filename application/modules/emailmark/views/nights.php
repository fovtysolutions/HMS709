<div class="card">
    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('new_basic_marketing');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('email-marketing/multi-nights-list'); ?>
                    <?php echo form_hidden('facilitytypeid', (!empty($intinfo->facilitytypeid)?$intinfo->facilitytypeid:null)) ?>
                    
                    <div class="form-group row">
                        <label for="marketing_name" class="col-sm-4 col-form-label">
                            <?php echo display('marketing_name') ?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input name="marketing_name" autocomplete="off" class="form-control" type="text"
                                placeholder="<?php echo display('marketing_name') ?>" id="marketing_name" value="" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="select_channels" class="col-sm-4 col-form-label">
                            <?php echo display('select_channels') ?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <?php echo form_dropdown('select_channels',$facilitytype,'', 'class="selectpicker form-control" data-live-search="true" id="select_channels"') ?>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="discount_in" class="col-sm-4 col-form-label">
                            <?php echo display('discount_in') ?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input name="discount_in" autocomplete="off" class="form-control" type="text"
                                placeholder="<?php echo display('discount_in') ?>" id="discount_in" value="" required>
                        </div>
                    </div>
            
                     <div class="modal-header">
                                                    <strong><?php echo display('stay_date'); ?></strong>
                                                    <div class="form-group gap-2 row text-end">
                                                        <input type="checkbox" id="no_end_date" name="no_end_date"> 
                                                        <strong><?php echo display('no_end_date'); ?></strong>
                                                    </div>
                                            </div>                               
                                            <div class="form-group row">
                                                <label for="start_date" class="col-sm-4 col-form-label">
                                                    <?php echo display('from_date'); ?> <i class="text-danger">*</i>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="start_date" id="start_date"
                                                        value="<?php echo date('Y-m-d') ?>" placeholder="<?php echo display('from_date'); ?>"
                                                        class="fin_datepicker form-control">
                                                </div>
                                           </div>
                                           <div class="form-group row" id="end_date_group">
                                            <label for="end_date" class="col-sm-4 col-form-label">
                                                <?php echo display('to_date'); ?> <i class="text-danger">*</i>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="end_date" id="end_date"
                                                    value="<?php echo date('Y-m-d') ?>" placeholder="<?php echo display('to_date'); ?>"
                                                    class="fin_datepicker form-control">
                                            </div>
                                        </div>
                                        <div class="modal-header row">
                                        <strong class="col-sm-12"><?php echo display('length_of_stay'); ?></strong>
                                         <div class="form-group col-sm-6 row">
                                           
                                               
                                                <div class="col-sm-12">
                                                    <input name="min" autocomplete="off" class="form-control" type="number" placeholder="<?php echo display('min'); ?>"
                                                        placeholder="<?php echo display('min') ?>" id="min" value="" required>
                                                </div>
                                        </div>
                                            
                                            <div class="form-group col-sm-6 row">
                                           
                                                <!-- <label for="maximum" class="col-sm-4 col-form-label">
                                                    <?php echo display('start_date') ?> <span class="text-danger">*</span>
                                                </label> -->
                                                <div class="col-sm-12">
                                                    <input name="maximum" autocomplete="off" class="form-control" type="number" placeholder="<?php echo display('maximum'); ?>"
                                                        placeholder="<?php echo display('maximum') ?>" id="maximum" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                  <div class="modal-header">
                                                    <strong><?php echo display('is_recurring'); ?></strong>
                                                    <div class="form-group gap-2 row text-end">
                                                        <input type="checkbox" id="is_recurring" name="is_recurring"> 
                                                        
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
                                            <div class="form-group row w-100">
                                                <strong class="col-sm-10"><?php echo display('only_member'); ?></strong>
                                                <div class="col-ms-2">
                                                    <label class="radio-inline my-2">
                                                        <input type="checkbox" name="only_member" value="yes" id="only_member">
                                                        Yes
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group row w-100">
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
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('submit') ?></button>
                    </div>
                    <?php echo form_close() ?>
                </div>
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
                <div class="modal-body editinfo"></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card-header">
                <h4><?php echo display('basic_mark') ?>
                    <small class="float-right">
                        <!-- <?php if($this->permission->method('room_facilities','create')->access()): ?> -->
                            <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <?php echo display('new_marketing') ?>
                            </button>
                        <!-- <?php endif; ?> -->
                    </small>
                </h4>
            </div>
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('marketing_name') ?></th>
                            <th><?php echo display('select_channels') ?></th>
                            <th><?php echo display('discount_in') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
          
                 
                   
                        <?php if (!empty($postData)) { ?>
                         
                            <?php $sl = 1; ?>
                            <?php foreach ($postData as $mdata) { ?>
                                <tr class="<?php echo ($sl & 1)?'odd gradeX':'even gradeC' ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($mdata->marketing_name); ?></td>
                                    <td><?php echo html_escape($mdata->select_channels); ?></td>
                                    <td><?php echo html_escape($mdata->discount_in); ?></td>
                                    <td class="center">
                                        <?php if($this->permission->method('data','update')->access()): ?>
                                            <a onclick="editMarketing('<?php echo html_escape($mdata->id); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update">
                                                <i class="ti-pencil-alt text-white" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($this->permission->method('emailmark','delete_night')->access()): ?>
                                            <a href="<?php echo base_url('emailmark/Mark/delete_night/'.html_escape($mdata->id)) ?>" onclick="return confirm('<?php echo display('are_you_sure') ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete ">
                                                <i class="ti-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/custom.js" type="text/javascript"></script>