

<div class="card">
    <?php if($this->permission->method('room_facilities','create')->access()): ?>
    <div class="card-header">
        <h4><?php echo display('paid_services_details_list') ?><small class="float-right"><button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="ti-plus" aria-hidden="true"></i>
        <?php echo display('add_paid_services')?></button></small></h4>
    </div>
    <?php endif; ?>
    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('paid_services_details_list');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel">
                                
                                <div class="panel-body">
                                    <?php echo form_open_multipart('room_facilities/room_facilitidetails/create');
                                    ?>
                                    <?php echo form_hidden('facilityid', (!empty($intinfo->facilityid)?$intinfo->facilityid:null)) ?>
                                    
                                    <div class="form-group row">
                                        <label for="service_name" class="col-sm-4 col-form-label"><?php echo display('service_name') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="service_name" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('service_name') ?>" id="service_name" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="service_amount" class="col-sm-4 col-form-label"><?php echo display('service_amount') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="service_amount" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('service_amount') ?>" id="service_amount" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tax" class="col-sm-4 col-form-label"><?php echo display('service_tax') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="tax" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('service_tax') ?>" id="tax" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-4 col-form-label"><?php echo display('description') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="description" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('description') ?>" id="description" value="" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="firstname" class="col-sm-4 col-form-label"><?php echo display('image') ?></label>
                                        <div class="col-sm-8">
                                            <input type="file" accept="image/*" name="picture" class="imageUpload" id="imageUpload" onchange="loadFile(event)"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                            <small id="fileHelp" class="text-muted"><img src="<?php echo html_escape(base_url(!empty($intinfo->image)?$intinfo->image:'assets/img/room-setting/room_images.png')); ?>" id="output" class="img-thumbnail height_150_width_200px jsclrimg"/>
                                            </small>
                                            <input type="hidden" name="old_image" value="<?php echo html_escape((!empty($intinfo->image)?$intinfo->image:null)) ?>">
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
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
                <table id="facilitydetails" class="table table-striped table-bordered width_100">
                <thead>
                        <tr>
                        
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('service_name') ?></th>
                            <th><?php echo display('service_amount') ?></th>
                            <th><?php echo display('service_tax') ?></th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('image') ?></th>

                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>

                    <tbody>
                <?php foreach ($services as $service) { ?>
                    <tr>
                        <td><?= $service->id ?></td>
                        <td><?= $service->service_name ?></td>
                        <td><?= $service->service_amount ?></td>
                        <td><?= $service->tax ?>%</td>
                        <td><?= $service->description ?></td>
                        <td>
                            <?php if (!empty($service->image)) { ?>
                                <img src="<?= base_url($service->image) ?>" alt="Service Image"  width="50">
                            <?php } else { ?>
                                No Image
                            <?php } ?>
                        </td>
                        <td>
                            <button 
                                class="btn btn-warning btn-sm edit-service" 
                            
                                data-img="<?= base_url($service->image) ?>" 
                                data-service-name="<?= $service->service_name ?>" 
                                data-service-amount="<?= $service->service_amount ?>" 
                                data-service-tax="<?= $service->tax ?>" 
                                data-service-description="<?= $service->description ?>" 
                                data-id="<?= $service->id ?>"
                            >Edit</button>
                            <button class="btn btn-danger btn-sm delete-service" data-id="<?= $service->id ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
                    
                    </table>  <!-- /.table-responsive -->
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/paidservice.js"></script>
    

   










    

                        








    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end"> <!-- Align content to the right -->
                        <button type="button" class="btn btn-primary me-4" >
                            <i class="bi bi-plus-lg"></i> Add
                        </button>

                        <button type="button" class="btn btn-light">
                            <i class="bi bi-arrow-left"></i> Back
                        </button>
                        <hr>
                             <div class="d-flex justify-content-center" data-bs-toggle="offcanvas" data-bs-target="#rightSideModal">
                            <button type="button" class="btn btn-primary">
                                Click To Create Your Paid Services
                            </button>
                        </div>


                        <div class="container mt-4">
        <h2>Service List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service) { ?>
                    <tr>
                        <td><?= $service->id ?></td>
                        <td><?= $service->service_name ?></td>
                        <td><?= $service->service_amount ?></td>
                        <td><?= $service->tax ?>%</td>
                        <td><?= $service->description ?></td>
                        <td>
                            <?php if (!empty($service->image)) { ?>
                                <img src="<?= base_url($service->image) ?>" alt="Service Image"  width="50">
                            <?php } else { ?>
                                No Image
                            <?php } ?>
                        </td>
                        <td>
                            <button 
                                class="btn btn-warning btn-sm edit-service" 
                            
                                data-img="<?= base_url($service->image) ?>" 
                                data-service-name="<?= $service->service_name ?>" 
                                data-service-amount="<?= $service->service_amount ?>" 
                                data-service-tax="<?= $service->tax ?>" 
                                data-service-description="<?= $service->description ?>" 
                                data-id="<?= $service->id ?>"
                            >Edit</button>
                            <button class="btn btn-danger btn-sm delete-service" data-id="<?= $service->id ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="container">
  
        <div class="offcanvas-body">
        <form id="serviceForm" enctype="multipart/form-data">
    <div class="row">
    
        <div class="col-md-8">
            <div class="mb-3">
                <label class="form-label">Service Name</label>
                <input type="text" name="service_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Service Amount</label>
                <input type="text" name="service_amount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tax (%)</label>
                <input type="text" name="tax" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea id="editor" rows="5" name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="picture" class="form-control imageUpload"  id="imageUpload">
            </div>
            <div class="text-center">
                        <label class="form-label">Image Preview</label>
                        <div class="border p-2">
                            <img class="imagePreview" src="" alt="Service Image" style="max-width: 100%; height: auto; display: none;">
                        </div>
                    </div>
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </div>

        
    </div>
</form>

        </div>
    </div>
   </div>

   <!-- Edit Service Modal -->
   <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="serviceEdit" method="post" enctype="multipart/form-data">
                    <!-- Hidden Fields -->
                    <input type="hidden" name="service_id">
                    <input type="hidden" name="old_image">

                    <div class="mb-3">
                        <label class="form-label">Service Name</label>
                        <input type="text" name="service_name" id="service_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Amount</label>
                        <input type="text" name="service_amount" id="service_amount" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tax (%)</label>
                        <input type="text" name="tax" id="tax" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="editor" rows="5" name="description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="picture" class="form-control imageUpload" id="imageUpload">
                    </div>

                    <!-- Right side - Image Preview -->
                    <div class="text-center">
                        <label class="form-label">Image Preview</label>
                        <div class="border p-2">
                            <img class="imagePreview" src="" alt="Service Image" style="max-width: 100%; height: auto; display: none;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Service</button>
                </form>
            </div>
        </div>
    </div>
</div>

 
      
<script>CKEDITOR.replace('editor');</script>


   

<script>
           

$("#serviceForm").on("submit", function (e) {
e.preventDefault();

var formData = new FormData(this);

// Add CSRF Token
formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');

$.ajax({
    url: "<?= base_url('booking_engine/Bookingengine/save_service'); ?>",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "json",
    success: function (response) {
        alert(response.message);
        if (response.status === "success") {
            location.reload();
        }
    },
    error: function (xhr, status, error) {
        console.log("AJAX Error:", xhr.responseText);
        alert("Error: " + xhr.status + " - " + xhr.statusText);
    }
});
});



$(document).on("click", ".edit-service", function () {
var id = $(this).data("id");
var img = $(this).data("img");
var name = $(this).data("service-name");
var amount = $(this).data("service-amount");
var tax = $(this).data("service-tax");
var description = $(this).data("service-description");


$("#service_name").val(name);
$("#service_amount").val(amount);
$("#tax").val(tax);
$("#editor").val(description);
$("input[name='service_id']").val(id);
$("input[name='old_image']").val(img);
$(".imagePreview").attr("src", img).show();
$("#serviceModal").modal("show");
});


//update 
$("#serviceEdit").on("submit", function (e) {
e.preventDefault();

var formData = new FormData(this);

// Add CSRF Token
formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');

$.ajax({
    url: "<?= base_url('booking_engine/Bookingengine/update_service'); ?>",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "json",
    success: function (response) {
        alert(response.message);
        if (response.status === "success") {
            location.reload();
        }
    },
    error: function (xhr, status, error) {
        console.log("AJAX Error:", xhr.responseText);
        alert("Error: " + xhr.status + " - " + xhr.statusText);
    }
});
});


// delete
$(".delete-service").on("click", function () {
var id = $(this).data("id");
var csrf_token_name = "<?= $this->security->get_csrf_token_name(); ?>";
var csrf_token_value = "<?= $this->security->get_csrf_hash(); ?>";

if (confirm("Are you sure you want to delete this service?")) {
    $.post("<?= base_url('booking_engine/Bookingengine/delete_service/'); ?>" + id, {
        [csrf_token_name]: csrf_token_value // Include CSRF token
    }, function (response) {
        alert(response.message);
        location.reload();
    }, "json");
}
});


// autoload change image
$(".imageUpload").change(function () {
var reader = new FileReader();
reader.onload = function (e) {
    $(".imagePreview").attr("src", e.target.result).show();
};
reader.readAsDataURL(this.files[0]);
});




</script>





  