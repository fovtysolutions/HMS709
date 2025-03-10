
                            document.addEventListener("DOMContentLoaded", function() {
                                const percentageBtn = document.getElementById("percentageBtn");
                                const fixedBtn = document.getElementById("fixedBtn");
                                const discountInput = document.getElementById("discount_in");
                                const discountType = document.getElementById("discount_type");

                                function setActive(button) {
                                    percentageBtn.classList.remove("active");
                                    fixedBtn.classList.remove("active");
                                    button.classList.add("active");
                                }

                                percentageBtn.addEventListener("click", function() {
                                    setActive(percentageBtn);
                                    discountInput.placeholder = "Discount in %";
                                    discountType.value = "percentage";
                                });

                                fixedBtn.addEventListener("click", function() {
                                    setActive(fixedBtn);
                                    discountInput.placeholder = "Discount in Fixed Amount";
                                    discountType.value = "fixed";
                                });
                            });
                     