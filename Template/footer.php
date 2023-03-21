        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <!-- validation ishara 13-03-2023-->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.11/jquery.validate.unobtrusive.min.js">
        </script>

        <!-- ishara -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>

        <script src="https://kit.fontawesome.com/84cd854e91.js" defer crossorigin="anonymous" defer></script>
        <script src="./assets/js/main.js" defer></script>
        <script src="./assets/js/customize.js" defer></script>



        <!-- ishara -->
        <!-- Toastr ishara 13-03-2023-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script src="https://kit.fontawesome.com/84cd854e91.js" defer crossorigin="anonymous" defer></script>

        <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>


        <!-- <script>
            $(document).ready(function() {
                userRoleToggle();
                $('.role-change-btn').on('click', function() {
                    userRoleToggle();
                });

                function userRoleToggle() {
                    const toggleMenu = document.querySelector(".role-menu");
                    toggleMenu.classList.toggle("active");

                    var RoleSwicthList = <?= json_encode($ResponseObject->RoleAccess) ?>;
                    $('.switch-role-select').html('');
                    $.each(RoleSwicthList, function(key, value) {
                        // console.log(value);
                        $('.switch-role-select').append('<li><a class="Role-' + value.name + 'View" href="#">' + value.description + '</a></li>');

                    });

                }

            });
        </script> -->



        </body>

        </html>