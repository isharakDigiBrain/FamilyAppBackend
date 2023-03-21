<?php include_once "request_loan_model.php";

$REQLOANS = new LoansRequests();

if (isset($_POST['action'])) {
    if ($_POST["action"] == "POST_REQUESTED_LOAN") {
        $req_amount = $_POST['amount'];
        $req_tenure = $_POST['tenure'];
        $req_remarks = $_POST['remarks'];
        $requester_id = $_POST['requester_id'];

        $data = $REQLOANS->submit_requested_loans($req_amount, $req_tenure, $requester_id, $req_remarks);
        echo json_encode($data);
    }

    if ($_POST["action"] == "load_requester_loan_details") {
        $UserRole = $_POST['UserRole'];
        $data = $REQLOANS->get_loan_request_data($UserRole);
        echo json_encode($data);
    }

    if ($_POST["action"] == "display_loan_dashbord_financeTeam") {
        $UserRole = $_POST['UserRole'];
        $data = $REQLOANS->display_dashboard_loan_details_finance_team($UserRole);
        echo json_encode($data);
    }

    
    if ($_POST["action"] == "GET_LOANS_ISSUES_LOGS_AND_RECEIVED_LOGS") {
        $UserRole = $_POST['UserRole'];
        $LoanDetailId = $_POST['LoanDetailId'];
        $data = $REQLOANS->get_loan_issued_log_by_loan_id($UserRole,$LoanDetailId);
        echo json_encode($data);
    }

}