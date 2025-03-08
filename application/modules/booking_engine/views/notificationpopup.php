


    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end"> 
                        <button type="button" id="toggleBtn" class="btn btn-success me-3" data-bs-toggle="modal">
                            <i class="bi bi-toggle-on"></i> Enable
                        </button>
                        <button type="button" class="btn btn-light">
                            <i class="bi bi-arrow-left"></i> Back
                        </button>
                        <hr>
                        <textarea id="editor"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Enable Popup Modal -->
    <div class="modal fade" id="enableModal" tabindex="-1" aria-labelledby="enableModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enable Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to enable this feature?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="confirmEnable">Enable</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Disable Popup Modal -->
    <div class="modal fade" id="disableModal" tabindex="-1" aria-labelledby="disableModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Disable Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to disable this feature?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDisable">Disable</button>
                </div>
            </div>
        </div>
    </div>

        
       
         


   
  

    <script>
             CKEDITOR.replace('editor');
    
        let toggleBtn = document.getElementById("toggleBtn");
        let isEnabled = false;
        toggleBtn.addEventListener("click", function () {
            if (isEnabled) {
                new bootstrap.Modal(document.getElementById('disableModal')).show();
            } else {

                new bootstrap.Modal(document.getElementById('enableModal')).show();
            }
        });


        document.getElementById("confirmEnable").addEventListener("click", function () {
            isEnabled = true;  // Update state
            toggleBtn.innerHTML = '<i class="bi bi-toggle-off"></i> Disable';
            toggleBtn.classList.remove("btn-success");
            toggleBtn.classList.add("btn-danger");
            bootstrap.Modal.getInstance(document.getElementById('enableModal')).hide(); 
        });

        document.getElementById("confirmDisable").addEventListener("click", function () {
            isEnabled = false; // Update state
            toggleBtn.innerHTML = '<i class="bi bi-toggle-on"></i> Enable'; 
            toggleBtn.classList.remove("btn-danger");
            toggleBtn.classList.add("btn-success");
            bootstrap.Modal.getInstance(document.getElementById('disableModal')).hide(); 
        });
    </script>

 


                     


    