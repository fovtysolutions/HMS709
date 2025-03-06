<?php
$status = array(
    '0'=>"Completed",
    '1'=>"Booked",
    '2'=>"Cancel"
);
?>
<div class="card">
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display("book_parking")." ".display('update');?></strong>
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
                <h4><?php echo display('parking_list') ?><small
                        class="float-right"><?php if($this->permission->method('car_parking','create')->access()): ?><button
                            type="button" id="car_booking" class="btn btn-primary btn-md"><i
                                class="fa fa-plus-circle" aria-hidden="true"></i>
                            <?php echo display('add_new')?></button><?php endif; ?></small></h4>
            </div>
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display("booking_number") ?></th>
                            <th><?php echo display("zone") ?></th>
                            <th><?php echo display("slot") ?></th>
                            <th><?php echo display("checkin") ?></th>
                            <th><?php echo display("checkout") ?></th>
                            <th><?php echo display("total_price") ?></th>
                            <th><?php echo display("status") ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($parking_details)) {
                        ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($parking_details as $dtype) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <?php
                                $book = $this->db->select("booking_number")->from("booked_info")->where("bookedid",$dtype->bookedid)->get()->row();
                                $zone = $this->db->select("zone_type")->from("tbl_zone")->where("zone_id",$dtype->zone_id)->get()->row();
                                $allSlot = explode(",", $dtype->slot_id);
                                $sSlot = "";
                                for($i=0; $i<count($allSlot); $i++){
                                    $slot = $this->db->select("slot_type")->from("tbl_slot")->where("slot_id",$allSlot[$i])->get()->row();
                                    $sSlot .= $slot->slot_type.",";
                                }
                            ?>
                            <td><?php echo html_escape($book->booking_number); ?></td>
                            <td><?php echo html_escape($zone->zone_type); ?></td>
                            <td><?php echo html_escape(trim($sSlot,",")); ?></td>
                            <td><?php echo html_escape($dtype->checkin); ?></td>
                            <td><?php echo html_escape($dtype->checkout); ?></td>
                            <td><?php echo html_escape($dtype->total_price); ?></td>
                            <td><?php echo html_escape($status[$dtype->status]); ?></td>
                            </td>
                            <td class="center">

                                <?php if($dtype->status==1){ if($this->permission->method('car_parking','update')->access()): ?>
                                <input name="url" type="hidden"
                                    id="url_<?php echo html_escape($dtype->bookParking_id); ?>"
                                    value="<?php echo base_url("car_parking/car_parking/parkingList") ?>" />
                                <a onclick="editcarParking('<?php echo html_escape($dtype->bookParking_id); ?>')"
                                    class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                    title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                <?php endif;
                                    if($this->permission->method('car_parking','delete')->access()): ?>
                                <a href="<?php echo base_url("car_parking/car_parking/parkingCancel/".html_escape($dtype->bookParking_id)) ?>"
                                    onclick="return confirm('<?php echo display("are_you_sure") ?>')"
                                    class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right"
                                    title="Cancel "><i class="ti-close"></i></a>
                                <?php endif; } ?>
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
<script src="<?php echo MOD_URL.$module;?>/assets/js/parking_list.js"></script>