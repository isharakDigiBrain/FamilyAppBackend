<?php

// include('./model/role_autherization_model.php');
// $urole =  new RoleAuth($_SESSION['username'], $_SESSION['user_id']);
// $UserAccess = $urole->role_autherization();
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Toastr ishara 13-03-2023-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- toaster css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">




    <title>Loans</title>


    <style>
        .error {
            color: #ff0000 !important;
            font-weight: 400;
            display: block;
            padding: 6px 0;
            font-size: 16px;
        }

        .form-control.error {
            border-color: #ff0000 !important;
            padding: .375rem .75rem;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: collapse !important;
            border-spacing: 0;
        }
    </style>


</head>
<!-- ishara please keep 1 body id -->

<body id="body-content">
    <nav class="sidebar">
        <div class="menu">
            <div class="sections" onclick="goto('home')">
                <img src="./assets/img/Logo.png" alt="">
                <h6>Dashboard</h6>
            </div>
            <div class="sections" onclick="goto('loans')">
                <img class="transparent-right" src="./assets/img/section-loan.png" alt="">
                <h6>Loan</h6>
            </div>
            <div class="sections" onclick="goto('company')">
                <img class="transparent-right" src="./assets/img/section-company.png" alt="">
                <h6>Company</h6>
            </div>
            <div class="sections">
                <img class="transparent-right" src="./assets/img/section-property.png" alt="">
                <h6>Property</h6>
            </div>
        </div>

        <div class="profile">
            <h6 class="fw-l"><?php echo $_SESSION['name'] ?> <i id="logout-btn" class="power-off fa fa-power-off"></i></h6>
        </div>
    </nav>

    <section id="loanHistory">
        <!-- h1 -->
        <div class="dashboard">
            <div class="dashboard-card x1">
                <h6 class="fw-l">Loan Issued</h6>
                <h4 id="issued_loans" class="fw-b"></h4>
                <div id="LoadSpiner_issued_loans" style="display: none; color: #B8874F !important; ">
                    <div class="text-center"><i class="fa-solid fa fa-spinner fa-spin fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="dashboard-card x1">
                <h6 class="fw-l">Loan Recieved</h6>
                <h4 id="received_loans" class="fw-b"></h4>
                <div id="LoadSpiner_received_loans" style="display: none; color: #B8874F !important; ">
                    <div class="text-center"><i class="fa-solid fa fa-spinner fa-spin fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="dashboard-card x2">
                <h6 class="fw-l">Pending Loans</h6>
                <h4 id="pending_loans" class="fw-b"></h4>
                <div id="LoadSpiner_pending_loans" style="display: none; color: #B8874F !important; ">
                    <div class="text-center"><i class="fa-solid fa fa-spinner fa-spin fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="graphs">
            <img src="./assets/img/dummy-graph.svg" style="height:100%; width:100%; ">
            <h5 class="regular">Total loans issued/recieved</h5>
        </div>
        <div class="loans" style="grid-column: 1/span 2;">
            <div class="history">
                <h3>Loan History</h3>
                <div class="filters">
                    <div class="filter-btns">
                        <button class="filter selected">Pending</button>
                        <button class="filter">Approved</button>
                    </div>
                    <form action=""><input type="text" class="search" name="search" id="search" placeholder="Search">
                    </form>
                </div>
                <!-- loan tile mobile responsive  -->
                <div class="tiles">
                    <div class="tile">
                        <div>
                            <h5>LOANREQ2022#1</h5>
                            <h6>18.04.2023</h6>
                            <h6>Remarks : “FINANCE CANCELLED”</h6>
                        </div>
                        <div>
                            <h5>AED 500000</h5>
                            <h6>5 Years</h6>
                        </div>
                    </div>
                    <div class="tile">
                        <div>
                            <h5>LOANREQ2022#1</h5>
                            <h6>18.04.2023</h6>
                            <h6>Remarks : “FINANCE CANCELLED”</h6>
                        </div>
                        <div>
                            <h5>AED 500000</h5>
                            <h6>5 Years</h6>
                        </div>
                    </div>
                    <div class="tile">
                        <div>
                            <h5>LOANREQ2022#1</h5>
                            <h6>18.04.2023</h6>
                            <h6>Remarks : “FINANCE CANCELLED”</h6>
                        </div>
                        <div>
                            <h5>AED 500000</h5>
                            <h6>5 Years</h6>
                        </div>
                    </div>
                    <div class="tile">
                        <div>
                            <h5>LOANREQ2022#1</h5>
                            <h6>18.04.2023</h6>
                            <h6>Remarks : “FINANCE CANCELLED”</h6>
                        </div>
                        <div>
                            <h5>AED 500000</h5>
                            <h6>5 Years</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- data table in web view  -->

            <!-- ishara 15/03/2023 -->
            <div id="LoadSpiner" style="display: none; color: #B8874F !important; z-index:9999;position: fixed; margin-left: 40%;">
                <div class="text-center"><i class="fa-solid fa fa-spinner fa-spin fa-5x"></i>
                    <p>Please Wait!</p>
                </div>
            </div>

            <table id="TBL_LOANS_REQ" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Requester</th>
                        <th>Tenure (yr)</th>
                        <th>Requested Amount. (AED)</th>
                        <th>Issued Loan (AED)</th>
                        <th>Paid Loan (AED)</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>


        </div>
    </section>

    <!-- modal init -->
    <button aria-readonly="true" id="addLoan" class="floating-btn add-btn modal-toggle">
        <i class="fa fa-plus"></i>
    </button>
    <div class="modal">
        <div class="close-modal-btn modal-toggle">
            <i class="fa fa-close"></i>
        </div>
        <!-- ishara made changes -->
        <form method="post" id="FormNewLoanRequest" name="FormNewLoanRequest">
            <h3 class="form-title fw-b">
                Request Loan
            </h3>
            <input type="text" name="input_amount" id="input_amount" placeholder="Amount" class="form-control" autocomplete="off" />
            <input type="text" name="input_tenure" id="input_tenure" placeholder="Tenure" class="form-control" autocomplete="off" />
            <input type="hidden" name="input_requester_id" id="input_requester_id" value="<?php echo $_SESSION['user_id'] ?>" placeholder="Tenure" class="form-control" />
            <textarea type="text" name="InputRemarks" id="InputRemarks" placeholder="Comments" class="form-control" autocomplete="off"></textarea>
            <input value="submit" type="submit" id="submit_loan_request" name="submit_loan_request">
        </form>
    </div>

    <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>


    <!-- validation ishara 13-03-2023-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.11/jquery.validate.unobtrusive.min.js"></script>

    <!-- ishara -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <script src="https://kit.fontawesome.com/84cd854e91.js" defer crossorigin="anonymous" defer></script>
    <!-- <script src="./assets/js/main.js" defer></script> -->
    <!-- ishara -->
    <!-- Toastr ishara 13-03-2023-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.3.0/luxon.min.js" integrity="sha512-KKbQg5o92MwtJKR9sfm/HkREzfyzNMiKPIQ7i7SZOxwEdiNCm4Svayn2DBq7MKEdrqPJUOSIpy1v6PpFlCQ0YA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://kit.fontawesome.com/84cd854e91.js" defer crossorigin="anonymous" defer></script>

    <!-- ishara added 15/3/2023 -->
    <?php
    include('./RequesterLoans/RequesterLoansJS.php');
    ?>

    <script>
        $(".modal-toggle").click(
            function() {
                if ($(".modal").toggleClass("showModal"));
            }
        )
        
    </script>
</body>

</html>