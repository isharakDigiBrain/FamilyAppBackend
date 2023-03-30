<!-- summery of row click -->
<!-- common modal -->
<div id="loan-details-modal" class="modal-container modal-loan-details">
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
                            <h6>Tenure (year)</h6>
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
                            <h6>Final Approver Name</h6>
                            <h5 id="FinalApproverName">NA</h5>
                        </div>
                        <div class="detail-tile">
                            <h6>Final Approver Comment</h6>
                            <h5 id="FinalApproverComment">NA</h5>
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
                if (!empty($Role)) {
                    if ($Role == 'Finance' || $Role == 'FinalApprover') { ?>

                        <form  method="post" id="FormApproveOrReject" class="FormApproveOrReject">
                            <div class="modal-footer">

                                <input type="text" class="border-dark small width100 input_approver_comment" name="input_approver_comment" id="input_approver_comment" placeholder="Comment">
                                <input type="hidden" name="input_approver_id" id="input_approver_id" value="<?php echo $_SESSION['user_id'] ?>" placeholder="Tenure" class="form-control" />

                                <!-- <div class="btn-group">
                                    <button class="loan-edit btn btn-success SubmitApprovedBtn" onclick="openModal(this)">Approve</button>
                                    <button class="btn btn-danger SubmitRejectBtn">Reject</button>
                                </div> -->

                                <div class="btn-group" style="margin:auto;">
                <button class="issue loan-edit btn btn-darkPrimary" onclick="openModal(this)">Issue</button>
                <button class="recieve btn primary-bg" onclick="openModal(this)">Recieve</button>
            </div>

                            </div>
                        </form>
                <?php }
                }  ?>


            </div>
        </div>
    </div>

</div>