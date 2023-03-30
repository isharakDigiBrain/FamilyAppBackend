
<div id="loan-request-modal" class="modal-container">
    <div class="modal-background">
        <div class="modal">
            <div class="close-modal-btn modal-toggle">
                <i class="fa fa-close"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header"> Request Loan</div>
                <div class="modal-body">
                    <form class="modal-body-form" method="post" id="FormNewLoanRequest" name="FormNewLoanRequest">
                        <input type="text" name="input_amount" id="input_amount" placeholder="Amount" class="form-control" autocomplete="off" />
                        <input type="text" name="input_tenure" id="input_tenure" placeholder="Tenure" class="form-control" autocomplete="off" />
                        <input type="hidden" name="input_requester_id" id="input_requester_id" value="<?php echo $_SESSION['user_id'] ?>" placeholder="Tenure" class="form-control" />
                        <textarea type="text" name="InputRemarks" id="InputRemarks" placeholder="Comments" class="form-control" autocomplete="off"></textarea>
                        <input value="submit" type="submit" id="submit_loan_request" name="submit_loan_request">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- summery of row click -->