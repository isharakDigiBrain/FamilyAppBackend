<?php include_once "request_loan_model.php";

$REQLOANS = new RequestLoans();

if (isset($_POST['action'])) {
    if ($_POST["action"] == "POST_REQUESTED_LOAN") {
        $req_amount = $_POST['amount'];
        $req_tenure = $_POST['tenure'];
        $req_remarks = $_POST['remarks'];
        $requester_id = $_POST['requester_id'];
      
        $data = $REQLOANS->submit_requested_loans($req_amount, $req_tenure, $requester_id, $req_remarks);
        echo json_encode($data);
    }

    if($_POST["action"] == "load_requester_loan_details"){
        $data = $REQLOANS->get_loan_request_data();
        echo json_encode($data);
    }

    if($_POST["action"] == "display_loan_dashbord_financeTeam"){
        $data = $REQLOANS->display_dashboard_loan_details_finance_team();
        echo json_encode($data);
    }
   
}