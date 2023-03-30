<!-- Finance loans -->
<section class="main">
    <h3 class="page-title"><?php echo $Role ?> Loans commons</h3>
    <!-- h1 -->

    <?php
    // echo '<pre>';
    // print_r($ResponseObject);

    // echo   '$RoleDescription';
    // echo   $RoleDescription;
    ?>


    <div class="detailsTab">
        <div class="gc-span-1 gc-span-m-2">
            <h5 class="title">Dashboard</h5>
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
                <!-- <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Recieved</h6>
                    <h4 class="fw-b">AED 20000</h4>
                </div>
                <div class="dashboard-card gc-span-2">
                    <h6 class="fw-l">Pending Loans</h6>
                    <h4 class="fw-b"></h4>
                </div> -->
            </div>
        </div>

        <div class="gc-span-1 gc-span-m-2">
            <h5 class="title">Graph - Issued/Recieved</h5>
            <div class="graphs">
                <img src="./assets/img/dummy-graph.svg">
                <h5 class="regular">Total loans issued/recieved</h5>
            </div>
        </div>



        <div class="gc-span-2">
            <h5 class="title">Loan Requests</h5>
            <div class="list-data">
                <div class="history">
                    <div class="filters">
                        <div class="filter-btns">
                            <button class="filter selected">Pending</button>
                            <button class="filter">Approved</button>
                        </div>
                        <form action=""><input type="text" class="input-search" name="search" id="search" placeholder="Search">
                        </form>
                    </div>
                    <!-- loan tile -->
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


                <!-- ishara 15/03/2023 -->
                <div id="LoadSpiner" style="display: none; color: #B8874F !important; z-index:9999;position: fixed; margin-left: 40%;">
                    <div class="text-center"><i class="fa-solid fa fa-spinner fa-spin fa-5x"></i>
                        <p>Please Wait!</p>
                    </div>
                </div>

                <div class="table">
                    <table id="TBL_LOANS_REQUEST" class="display TBL_LOANS_REQUEST" style="width:100%">
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
            </div>
        </div>
    </div>
</section>

<?php
if (!empty($Role)) {
    if ($Role == 'Family') { ?>
        <button aria-readonly="true" onClick="openModal(this)" class="loan-request floating-btn add-btn button modal-toggle">
            <i class="fa fa-plus"></i>
        </button>
<?php }
} ?>



<?php
if ($Role == 'Family') {
    include SITE_ROOT_ROLE . 'Common' . WS . 'RequesterLoanModal.php';
}
include SITE_ROOT_ROLE . 'Common' . WS . 'LoanModal.php';
include SITE_ROOT_ROLE . 'ControllerJs' . WS . 'loansJs.php';
?>