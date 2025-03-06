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
            <h5>Channel Manager Dashboard</h5>
            <!-- Add Button to Open Sidebar -->
            <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#sidebar"><i class="fa-solid fa-plus"></i> Add Channels</button>
        </div>
    </div>

    <!-- Sidebar (Offcanvas) -->
    <div class="offcanvas p-3 offcanvas-end" tabindex="-1" id="sidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Add New Booking</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="row p-3 gap-3">
        <div class="col-md-12 p-3 channel-add channel">
              <img id="image-preview"
                style="width:30%;" src="<?php echo base_url()?>/assets/img/channel-logos/agoda1.png" alt="">
            <!-- <div>logo</div> -->
            <!-- Add Button to Open Sidebar -->
            <a class="btn btn-primary" href="manage-channels/agoda-ota-manage" ><i class="fa-solid fa-plus"></i> Add </a>
        </div>
        <div class="col-md-12 p-3 channel-add channel">
              <img id="image-preview"
                style="width:30%;" src="<?php echo base_url()?>/assets/img/channel-logos/agoda1.png" alt="">
            <!-- <div>logo</div> -->
            <!-- Add Button to Open Sidebar -->
            <button class="btn btn-primary" ><i class="fa-solid fa-plus"></i> Add </button>
        </div>
        <div class="col-md-12 p-3 channel-add channel">
              <img id="image-preview"
                style="width:30%;" src="<?php echo base_url()?>/assets/img/channel-logos/agoda1.png" alt="">
            <!-- <div>logo</div> -->
            <!-- Add Button to Open Sidebar -->
            <button class="btn btn-primary" ><i class="fa-solid fa-plus"></i> Add </button>
        </div>
        <div class="col-md-12 p-3 channel-add channel">
              <img id="image-preview"
                style="width:30%;" src="<?php echo base_url()?>/assets/img/channel-logos/agoda1.png" alt="">
            <!-- <div>logo</div> -->
            <!-- Add Button to Open Sidebar -->
            <button class="btn btn-primary" ><i class="fa-solid fa-plus"></i> Add </button>
        </div>
    </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
