<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/custom.css">

<div class="container py-4">
    <div class="row">
        <div class="col-md-12 channel">
            <h5>Manage Channels
            </h5>
            <!-- Add Button to Open Sidebar -->
            <a class="btn btn-primary" href="#"  onClick="history.back();">
                Back
            </a>
        </div>
    </div>
    <hr>
    <p>
 
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Basic Details
  </button>
</p>
<div class="collapse row" id="collapseExample">
<form class="w-100" action="<?php echo base_url('manage-channels/agoda-ota-manage/add'); ?>" method="POST">
<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

     <div class="col-md-6">
        <div class="card w-100">
            <div class="card-body">
                <p class="card-title">Already have a Hotel OTA Code?</p>
                <div class="input-group">
                    <input type="text" id="otaCode" name="otacode" class="form-control" placeholder="Enter code">
                </div>
                <button  id="saveBtn" class="btn my-2 bg-light " >Save</button>
                
            </div>
        </div>

        <div class="text-center my-3">
            <span>OR</span>
        </div>

        <div class="card w-100 ">
            <div class="card-body text-center">
                <p class="card-title">Don't have a Hotel OTA Code?</p>
                <a href="#" id="agodaBtn" class="btn btn-primary" disabled>Onboard With Agoda</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card w-100 h-100">
            <div class="card-body ">
                    <p class="card-title">Important Notes</p>
                    <div class=" w-100 bg-light">
                        hello    
                    
                     </div>
            </div>
        </div>
    </div>
</form>
</div>

   
</div>

<script>
   document.getElementById("otaCode").addEventListener("input", function() {
    let codeInput = this.value.trim();
    let agodaBtn = document.getElementById("agodaBtn");
    let saveBtn = document.getElementById("saveBtn");

    if (codeInput.length > 0) {
        agodaBtn.innerText = "Manage Hotel With Agoda"; 
        agodaBtn.removeAttribute("disabled");
        saveBtn.removeAttribute("disabled"); 
    } else {
        agodaBtn.innerText = "Onboard With Agoda"; 
        agodaBtn.setAttribute("disabled", "true"); 
        saveBtn.setAttribute("disabled", "true"); 
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- 
</body>
</html> -->
