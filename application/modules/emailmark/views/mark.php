
<div>
  <div><h3>Email Marketing</h3></div>
</div>
<div class="row">
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" onclick="window.location.href='<?= base_url('email-marketing/basic-marketing'); ?>'" style="cursor: pointer;">
         <div class="card card-stats statistic-box mb-4">
             <div
                 class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('today')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('basic') ?></p>
                 <!-- <h3 class="card-title fs-18 font-weight-bold"><?php echo html_escape($todaybooking);?> -->
                 </h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" onclick="window.location.href='<?= base_url('email-marketing/multi-nights'); ?>'" style="cursor: pointer;">
         <div class="card card-stats statistic-box mb-4">
             <div
                 class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('attach_money_icon')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('multi_nights') ?></p>
                 <h3 class="card-title fs-21 font-weight-bold"><?php echo html_escape((!empty($totalamount)?$totalamount:0));?></h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" onclick="window.location.href='<?= base_url('email-marketing/eaily-bird'); ?>'" style="cursor: pointer;">
         <div class="card card-stats statistic-box mb-4">
             <div
                 class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('account_circle_icon')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('eaily_bird') ?></p>
                 <h3 class="card-title fs-21 font-weight-bold"><?php echo html_escape($totalcustomer);?></h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" onclick="window.location.href='<?= base_url('email-marketing/same-day'); ?>'" style="cursor: pointer;">
         <div class="card card-stats statistic-box mb-4">
             <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('date_range_icon')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('same_day') ?></p>
                 <h3 class="card-title fs-21 font-weight-bold"><?php echo html_escape($totalorder);?></h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" onclick="window.location.href='<?= base_url('email-marketing/day-of-week'); ?>'" style="cursor: pointer;">
         <div class="card card-stats statistic-box mb-4">
             <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('date_range_icon')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('same_day') ?></p>
                 <h3 class="card-title fs-21 font-weight-bold"><?php echo html_escape($totalorder);?></h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script src="<?php echo MOD_URL.$module;?>/assets/js/mark.js" type="text/javascript"></script>
 <!-- <script src="<?php echo MOD_URL.$module;?>/assets/js/barchart.js"></script>
 <script src="<?php echo MOD_URL.$module;?>/assets/js/apexcharts.min.js"></script>
 <script src="<?php echo MOD_URL.$module;?>/assets/js/apexcharts.active.js"></script> -->