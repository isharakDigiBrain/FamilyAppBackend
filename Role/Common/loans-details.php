<div class="main">
    <div class="loan-details-content">
        <div class="detail-tile">
            <h6>Requester Name</h6>
            <h5 id="LoanDetails_RequesterName"></h5>
        </div>
        <div class="detail-tile">
            <h6>Status</h6>
            <div id="LoansDetails_Status"></div>
        </div>
        <div class="detail-tile">
            <h6>Requster Comment</h6>
            <h5 id="LoanDetails_RequeterRemarks"></h5>
        </div>
        <div class="detail-tile">
            <h6>Tenure</h6>
            <h5 id="LoanDetails_Tenure"></h5>
        </div>
        <div class="detail-tile">
            <h6>Issued Amount</h6>
            <h5 id="LoanDetails_IssuedAmount"></h5>
        </div>
        <div class="detail-tile">
            <h6>Recieved Amount</h6>
            <h5 id="LoanDetails_ReceivedAmount"></h5>
        </div>
        <div class="detail-tile">
            <h6>Finance Name</h6>
            <h5 id="LoanDetails_FinanceApproverName"></h5>
        </div>
        <div class="detail-tile">
            <h6>Finance Comment</h6>
            <h5 id="LoanDetails_FinanceApproverComment"></h5>
        </div>
        <div class="detail-tile">
            <h6>Approver Name</h6>
            <h5 id="LoanDetails_FinalApproverName"></h5>
        </div>
        <div class="detail-tile">
            <h6>Approver Comment</h6>
            <h5 id="LoanDetails_FinalApproverComment"></h5>
        </div>
        <div class="accordion accordion-flush" style="grid-column: 1/span 2;" id="accordionFlushExample">
            <div class="accordion-item ">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Loan Issue Logs
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
                    <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Loan Recieved log
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
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


<?php
include SITE_ROOT_ROLE . 'ControllerJs' . WS . 'loans-detailsJs.php';
?>