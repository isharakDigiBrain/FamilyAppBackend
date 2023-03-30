<!-- Finance loans -->
<section class="main">
    <h3 class="page-title"><?php echo $Role ?> Loans</h3>
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
                <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Recieved</h6>
                    <h4 class="fw-b">AED 20000</h4>
                </div>
                <div class="dashboard-card gc-span-2">
                    <h6 class="fw-l">Pending Loans</h6>
                    <h4 class="fw-b"></h4>
                </div>
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
                        <form action=""><input type="text" class="input-search" name="search" id="search"
                                placeholder="Search">
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
                <div id="LoadSpiner"
                    style="display: none; color: #B8874F !important; z-index:9999;position: fixed; margin-left: 40%;">
                    <div class="text-center"><i class="fa-solid fa fa-spinner fa-spin fa-5x"></i>
                        <p>Please Wait!</p>
                    </div>
                </div>

                <div class="table">
                    <table id="TBL_LOANS_REQUEST" class="display" style="width:100%">
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



<!-- summery of row click -->

<div id="loan-details-modal" class="modal-container">
    <div class="modal-background">
        <div class="modal">
            <div class="close-modal-btn modal-toggle">
                <i class="fa fa-close"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header" id="LoanDetailID"></div>
                <div class="modal-body">
                    <div class="loan-details-content">
                        <div class="detail-tile">
                            <h6>Requester Name</h6>
                            <h5 id="RequesterName"></h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Status</h6>
                            <h5 id="LoanStatus"></h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Requster Comment</h6>
                            <h5 id="RequeterRemarks">Require loan for personal user</h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Tenure</h6>
                            <h5 id="Tenure"></h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Issued Amount</h6>
                            <h5 id="IssuedAmount">AED 20000</h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Recieved Amount</h6>
                            <h5 id="ReceivedAmount">AED 10000</h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Finance Name</h6>
                            <h5 id="FinanceApproverName">NA</h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Finance Comment</h6>
                            <h5 id="FinanceApproverComment">NA</h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Approver Name</h6>
                            <h5 id="FinalApproverName">NA</h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Approver Comment</h6>
                            <h5 id="FinalApproverComment">NA</h5>
                        </div>
                        <div class="accordion accordion-flush" style="grid-column: 1/span 2;"
                            id="accordionFlushExample">
                            <div class="accordion-item ">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Loan Issue Logs
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-0">
                                        <table style="width: 100%;" id="LOANS_ISSUED_LOGS">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Issued Amount</th>
                                                    <th>Issued By</th>
                                                    <th>Issuer Remarks</th>
                                                </tr>
                                            </thead>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Loan Recieved log
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-0">
                                        <table style="width: 100%;" id="LOANS_RECEIVED_LOGS">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Issued Amount</th>
                                                    <th>Issued By</th>
                                                    <th>Issuer Remarks</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                        <input type="text" class="border-dark small width100" name="" placeholder="Comment" id="">
                        <div class="btn-group">
                            <button class="loan-edit btn btn-success" onclick="openModal(this)">Approve</button>
                            <button class="btn btn-danger">Reject</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>


<?php
include SITE_ROOT_ROLE . 'ControllerJs' . WS . 'loansJs.php';
?>