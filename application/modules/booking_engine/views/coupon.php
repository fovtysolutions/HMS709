

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end"> <!-- Align content to the right -->
                        <button type="button" class="btn btn-primary me-4 border border-dark">
                            <i class="bi bi-plus-lg"></i> New Coupon
                        </button>

                        <button type="button" class="btn btn-light border border-dark">
                            <i class="bi bi-arrow-left"></i> Back
                        </button>


                        <hr>

                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary">
                                Click To Create Your First Private Coupon
                            </button>
                        </div>


                    </div>


                </div>




                <div class="offcanvas-body mt-2">
                    <form id="serviceForm" enctype="multipart/form-data">
                        <input type="text" class="form-control border border-dark" name="coupon_name" placeholder="Coupon Name">
                        <input type="text" class="form-control mt-2 border border-dark" name="coupon_code" placeholder="Coupon Code">
                        <input type="text" class="form-control mt-2 border border-dark" name="discount" placeholder="(Discount in %)">
                        <input type="text" class="form-control mt-2 border border-dark" name="usage_limit" placeholder="Usage limit">
                        <p class="text-danger">enter 0 for unlimited use</p>
                        <div class="form-control col-md-6 border border-dark w-100 p-3 d-flex flex-column gap-3">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <p class="text-dark fw-bold m-0">Select Room Type</p>
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Select all</label>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2">Select coupon validity</p>
                        <div class="d-flex gap-3">
                            <div class="mb-3 flex-grow-1">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDate">
                            </div>
                            <div class="mb-3 flex-grow-1">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDate">
                            </div>
                        </div>
                       

                        <div class="mb-4">
                            <div class="date-picker-label">Applicable On</div>
                            <div class="select__input__label">
                               <button class="btn btn-secondary" > <div class="me-4 select__input__div" onclick="selectOption('all')">All</div></button>
                               <button class="btn btn-secondary" >    <div class="me-4 select__input__div" onclick="selectOption('weekdays')"><i class="bi bi-check-lg icon--check"></i> Weekdays</div></button>
                               <button class="btn btn-secondary" > <div class="me-4 select__input__div" onclick="selectOption('weekend')">Weekend</div></button>
                               <button class="btn btn-secondary" >   <div class="me-4 select__input__div" onclick="selectOption('custom')">Custom</div></button>
                            </div>

                            <div class="select__input__label my-4 ">
                                <div class="me-4 days__label"><input class="form-check-input me-2 day-checkbox" type="checkbox" id="weekdayCheck0" value="sun">Sun</div>
                                <div class="me-4 days__label"><input class="form-check-input me-2 day-checkbox" type="checkbox" id="weekdayCheck1" value="mon">Mon</div>
                                <div class="me-4 days__label"><input class="form-check-input me-2 day-checkbox" type="checkbox" id="weekdayCheck2" value="tue">Tue</div>
                                <div class="me-4 days__label"><input class="form-check-input me-2 day-checkbox" type="checkbox" id="weekdayCheck3" value="wed">Wed</div>
                                <div class="me-4 days__label"><input class="form-check-input me-2 day-checkbox" type="checkbox" id="weekdayCheck4" value="thu">Thu</div>
                                <div class="me-4 days__label"><input class="form-check-input me-2 day-checkbox" type="checkbox" id="weekdayCheck5" value="fri">Fri</div>
                                <div class="me-4 days__label"><input class="form-check-input me-2 day-checkbox" type="checkbox" id="weekdayCheck6" value="sat">Sat</div>
                            </div>
                        </div>

                        <p class="text-dark mt-2 fw-bold">Do you want to blackout the offer for specific stay date?</p>

                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="blackout" id="blackoutYes">
                            <label class="form-check-label" for="blackoutYes">Yes</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="blackout" id="blackoutNo" checked>
                            <label class="form-check-label" for="blackoutNo">No</label>
                        </div>
                        <div class="mb-3 flex-grow-1" id="blackoutDateDiv" style="display: none;">
                            <label for="blackoutDate" class="form-label">Choose Blackout Date</label>
                            <input type="date" class="form-control" id="blackoutDate">

                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="dateButton" style="display: none;">
                         <span id="selectedDateText">None</span>
                        </button>



                        <button type="submit" class="btn btn-success mt-3">Save</button>
                        <button type="#" class="btn btn-success mt-3">cancel</button>
                    </form>




                </div>


            </div>
        </div>
    </div>

    </div>



    </div>

    <script>
        document.getElementById("startDate").addEventListener("change", function() {
            let startDate = this.value;
            document.getElementById("endDate").min = startDate; // Set min attribute dynamically
        });



        document.getElementById('blackoutYes').addEventListener('change', function() {
            document.getElementById('blackoutDateDiv').style.display = 'block';
        });

        document.getElementById('blackoutNo').addEventListener('change', function() {
            document.getElementById('blackoutDateDiv').style.display = 'none';
        });



        document.getElementById("blackoutDate").addEventListener("change", function() {
            const selectedDate = this.value;
            const dateButton = document.getElementById("dateButton");
            const selectedDateText = document.getElementById("selectedDateText");

            if (selectedDate) {
                selectedDateText.innerText = selectedDate;
                dateButton.style.display = "block";
            } else {
                dateButton.style.display = "none";
            }
        });



        function selectOption(option) {
            let allDays = document.querySelectorAll('.day-checkbox');

            document.querySelectorAll(".select__input__div").forEach(div => {
                div.classList.remove("select__input__div__active");
            });
            event.target.classList.add("select__input__div__active");

            if (option === "all") {
                allDays.forEach(day => {
                    day.checked = true;
                    day.disabled = true;
                });
            } else if (option === "weekdays") {
                allDays.forEach(day => {
                    day.checked = ["mon", "tue", "wed", "thu", "fri"].includes(day.value);
                    day.disabled = true;
                });
            } else if (option === "weekend") {
                allDays.forEach(day => {
                    day.checked = ["sat", "sun"].includes(day.value);
                    day.disabled = true;
                });
            } else if (option === "custom") {
                allDays.forEach(day => {
                    day.disabled = false;
                });
            }
        }
    </script>


   