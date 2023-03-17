<?php

include('./model/roleAutherization.php');
$urole =  new RoleAuth($_SESSION['username'], $_SESSION['user_id']);
$UserAccess = $urole->role_autherization();


?>
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

   <?php include('./RequesterLoans/RequesterLoansJS.php'); ?>
    <script>
        $(".modal-toggle").click(
            function() {
                if ($(".modal").toggleClass("showModal"));
            }
        )
    </script>
</body>

</html>