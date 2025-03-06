<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<style>
    .channel{
        display: flex;
        justify-content: space-between;
    }
    .channel-add{
        /* border: 1px solid black; */
        /* border-radius: 10px;
        margin: 2rem;
        padding: 1rem; */ */
        padding: 1rem;
    /* margin: 2rem; */
    border-radius: 10px;
    border: 1px solid black;
    }
</style>
<body class="bg-light">

<div class="container py-4">
    <div class="row">
        <div class="col-md-12 channel">
            <h5>Manage Channels
            </h5>
            <!-- Add Button to Open Sidebar -->
            <button class="btn btn-white border-1" data-bs-toggle="offcanvas" data-bs-target="#sidebar"><i class="fa-solid fa-plus"></i> Back</button>
        </div>
    </div>
    <hr>
    <p>
 
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Basic Details
  </button>
</p>
<div class="collapse row" id="collapseExample">
<div class="col-md-6">
        <div class="card w-100">
            <div class="card-body">
                <p class="card-title">Already have a Hotel OTA Code?</p>
                <div class="input-group">
                    <input type="text" id="otaCode" class="form-control" placeholder="Enter code">
                </div>
                <a href="#" id="saveBtn" class="btn my-2 bg-light " disabled>Save</a>
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
</div>

   
</div>

<script>
    document.getElementById("otaCode").addEventListener("input", function() {
        let codeInput = this.value.trim();
        let agodaBtn = document.getElementById("agodaBtn");
        let saveBtn = document.getElementById("saveBtn");

        if (codeInput.length > 0) {
            agodaBtn.innerText = "Manage Hotel With Agoda"; // Change button text
            agodaBtn.removeAttribute("disabled"); // Enable button
            saveBtn.removeAttribute("disabled"); // Enable Save button
            saveBtn.("disabled"); // Enable Save button
        } else {
            agodaBtn.innerText = "Onboard With Agoda"; // Reset text
            agodaBtn.setAttribute("disabled", "true"); // Disable button
            saveBtn.setAttribute("disabled", "true"); // Disable Save button
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
