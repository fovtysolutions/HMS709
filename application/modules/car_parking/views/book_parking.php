<div class="row">
    <div class="col-12">
        <div class="card mb-4 mb-lg-0">
            <div class="card-body">
                <div class="row border pt-4 px-3 mb-4">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="vl"></div>
                            <h3 class="font-weight-bold"><?php echo display("book_parking") ?></h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("booking_number") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <select name="somename" class="basic-single" id="booking_number">
                                <option value="" selected="selected"><?php echo display("booking_number") ?></option>
                                <?php foreach($booking_details as $list){ ?>
                                <option value="<?php echo html_escape($list->bookedid) ?>">
                                    <?php echo html_escape($list->booking_number)."(".html_escape($list->room_no).")" ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("vehicle_type") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <select name="somename" class="basic-single" id="vehicle_type" onchange="getZone()">
                                <option value="" selected="selected"><?php echo display("vehicle_type") ?></option>
                                <?php foreach($vehicle_details as $list){ ?>
                                <option value="<?php echo html_escape($list->vehicle_id) ?>">
                                    <?php echo html_escape($list->vehicle_type) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("zone_type") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <select name="somename" class="basic-single" id="zone" onchange="getTime()">
                                <option value="" selected="selected"><?php echo display("zone_type") ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("select_time") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <select name="somename" onchange="bill()" class="basic-single" id="time">
                                <option value="" selected="selected"><?php echo display("select_time") ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("checkin") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <input class="form-control datetimepickers" id="checkin_date" disabled type="text"
                                name="birthday" value="" placeholder="Checkin Date" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("checkout") ?><span
                                class="text-danger">*</span></label>
                        <div class="col-md-10 mb-3">
                            <input class="form-control datetimepickers" id="checkout_date" disabled type="text"
                                name="birthday" value="" placeholder="Checkout Date" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="col-md-10 col-form-label text-left font-weight-bold"><?php echo display("parking_note") ?></label>
                        <div class="col-md-10 mb-4">
                            <input type="text" class="form-control" id="parking_note" placeholder="<?php echo display("parking_note") ?>">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-xl-8 mb-3 pr-xl-5">
                        <div class="row border p-1">
                            <div class="col-12 col-lg-6 py-4 d-flex justify-content-center justify-content-lg-start">
                                <div class="d-flex align-items-center">
                                    <div class="vl"></div>
                                    <h3 class="font-weight-bold mb-0"><?php echo display("please_select_slot") ?></h3>
                                </div>
                            </div>
                            <div
                                class="col-12 col-lg-6 py-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex mr-3 align-items-center">
                                        <i class="hvr-buzz-out fas fa-square-full mr-1 text-danger"></i>
                                        <h6 class="font-weight-700 mb-0"><?php echo display("selected") ?></h6>
                                    </div>
                                    <div class="d-flex mr-3 align-items-center">
                                        <i class="hvr-buzz-out fas fa-square-full mr-1 text-dark"></i>
                                        <h6 class="font-weight-700 mb-0"><?php echo display("available") ?></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row" id="slot">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-12 col-xl-4 pl-xl-3">
                        <div class="row border">
                            <div class="col d-flex justify-content-center align-items-center pt-2 bg-ash">
                                <h4><?php echo display("bill_summary") ?></h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo display("details") ?></th>
                                            <th scope="col"><?php echo display("slot") ?></th>
                                            <th scope="col"><?php echo display("try_duration") ?></th>
                                            <th scope="col"><?php echo display("price") ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-bottom">
                                        <tr>
                                            <td id="b_zone"></td>
                                            <td id="b_slot"></td>
                                            <td id="b_time"></td>
                                            <td id="b_price"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody class="border-bottom">
                                        <tr>
                                            <td><?php echo display("subtotal") ?></td>
                                            <td class="d-flex justify-content-center pl-0" id="b_subtotal"></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo display("tax") ?> (<span id="b_percent"></span>%)</td>
                                            <td class="d-flex justify-content-center pl-0" id="b_vat"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold"><?php echo display("grand_total") ?></td>
                                            <td class="d-flex justify-content-center  font-weight-bold"
                                                id="b_grandTotal"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-success w-100" disabled id="b_submit"><?php echo display("submit") ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="parkingId" value="">
<script src="<?php echo MOD_URL.$module;?>/assets/js/book_parking.js"></script>