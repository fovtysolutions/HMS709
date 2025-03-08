<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/custom.css">

<body class="bg-light">

<div class="container py-4">
    <div class="row">
        <div class="col-md-12 channel">
            <h5>Manage Channels
            </h5>
            <a class="btn btn-primary" href="#"  onClick="history.back();">
                Back
            </a>
    </div>
    <hr>
    
<div class=" row border-1" id="">
        <form action="<?= base_url('manage-channels/agoda-ota-manage/saveDetails') ?>" method="POST">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="row ">
                <!-- <div class="col-md-12"> -->
                    <h5>Create Property</h5>
                    <h3>Hotel Details</h3>
                <!-- </div> -->
                <div class="col-md-6 py-3">
                 <input type="text" name="hotel_name" class="form-control form-control-lg" placeholder="Hotel name">
                </div>
                <div class="col-md-6 py-3">
                  <input type="text" name="hotel_id" class="form-control form-control-lg" placeholder=" Hotel Id">
                </div>
                <div class="col-md-6 py-3">
                    <select name="hotel_catagory" placeholder="Hotel Catagory" class="form-select form-control-lg" aria-label="Default select example">
                        <option selected> Select Hotel Catagory</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6 py-3">
                  <input type="text" name="decription" class="form-control form-control-lg" placeholder="Decription">
                </div>
                <div class="col-md-6 py-3">
                    <select name="currency" class="form-select form-control-lg" aria-label="Default select example">
                        <option selected>Currency</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6 py-3">
                    <input name="full_name" type="text" class="form-control form-control-lg" placeholder="Full name">
                </div>
                <div class="col-md-6 py-3">
                  <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
                </div>
                 
                <div class="col-md-6 py-3">
                  <input type="text" name="phomeNum" class="form-control form-control-lg" placeholder=" Phone Number">
                </div>
                <?php
                    // Language options array (You can load from a database too)
                    $languages = [
                        'en' => 'English',
                        'fr' => 'French',
                        'es' => 'Spanish',
                        'de' => 'German',
                        'zh' => 'Chinese',
                        'hi' => 'Hindi',
                        'ar' => 'Arabic'
                    ];
                    ?>
                 <div class="col-md-6 py-3">
                    <select name="language" class="form-select form-control-lg" aria-label="Language select">
                        <option selected disabled>Select Language</option>
                        <?php foreach ($languages as $code => $language): ?>
                            <option value="<?php echo $code; ?>"><?php echo $language; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 py-3">
                 <input name="channels" type="text" class="form-control form-control-lg" placeholder="Channels">
                </div>
               
                <h5>Image Details</h5>
                <div class="mb-3 row">
                  
                  <label for="images" class="col-md-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                    image show by user 
                    </div>
                   
                </div>
                <div class="mb-3 row">
                  
                    <label for="imageCaption" class="col-md-2 col-form-label">Image Caption</label>
                    <div class="col-sm-6">
                      <select class="form-select  form-control-lg" name="imageCaption" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <p>Note*: The first image will be the main Image, upload accordingly.</p>
                      </div>
                     
                </div>

     
                
                <h5>Address Details</h5>
                <div class="col-md-6 py-3">
                  <input type="text" name="addr_line" class="form-control form-control-lg" placeholder="Address line">
                </div>
                <div class="col-md-6 py-3">
                   <input type="text" name="city_name" class="form-control form-control-lg" placeholder="City name">
                </div>
                <div class="col-md-6 py-3">
                  <input name="country" type="text" class="form-control form-control-lg" placeholder="Country">
                </div>
                <div class="col-md-6 py-3">
                   <input  name="postel_code" type="text" class="form-control form-control-lg" placeholder="Postel Code">
                </div>
                <div class="col-md-6 py-3">
                  <input name="longitude" type="text" class="form-control form-control-lg" placeholder="Longitude">
                </div>
                <div class="col-md-6 py-3">
                   <input type="text" name="latitude" class="form-control form-control-lg" placeholder="Latitude">
                </div>
                <div class="col-md-6 py-3">
                  <input type="text" class="form-control form-control-lg" placeholder="First name">
                </div>
                <div class="col-md-6 py-3">
                   <input type="text" class="form-control form-control-lg" placeholder="First name">
                </div>
                
                <h5>Other Details</h5>
                <div class="col-md-3 py-3">
                  <input type="text" name="chk_in_time" class="form-control form-control-lg" placeholder="Check In Time">
                </div>
                <div class="col-md-3 py-3">
                   <input type="text" name="chk_in_out" class="form-control form-control-lg" placeholder="Check In Out">
                </div>
                <div class="col-md-6 py-3">
                  <input name="services" type="text" class="form-control form-control-lg" placeholder="Services">
                </div>
                <div class="col-md-6 py-3">
                   <input  name="cncl_penalty_policy" type="text" class="form-control form-control-lg" placeholder="Cancel Penalty Policy">
                </div>
                <div class="col-md-6 py-3">
                  <input name="max_infant_age" type="text" class="form-control form-control-lg" placeholder="Max Infant Age">
                </div>
                <div class="col-md-6 py-3">
                   <input type="text" name="max_child_age" class="form-control form-control-lg" placeholder="Max Child Age">
                </div>
                <div class="col-md-6 py-3">
                  <input type="text" name="night_num" class="form-control form-control-lg" placeholder="Night Number">
                </div>
                <div class="col-md-6">
                <fieldset class="form-group">
                    <div class="row">
                     <legend class="col-form-label col-sm-2 pt-0">Child Stay free?<span>*</span></legend>
                    <div class="col-sm-10 d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                                No
                            </label>
                        </div>
                       
                    </div>
                    </div>
               
                </div>
                <div class="row">
                    
                    <p>Reference OTA</p>
                    <div class="col-md-6 py-3">
                       <input type="text" name="ota_name" class="form-control form-control-lg" placeholder="OTA Name">
                    </div>
                    <div class="col-md-6 py-3">
                       <input type="text" name="otacode" class="form-control form-control-lg" placeholder="OTA Code">
                    </div>
                </div>
                
               
         </div>
         <button class="btn btn-primary " type="submit">Save</button>
        </form>
</div>

   
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
