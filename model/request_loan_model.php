<?php
include_once 'dbconnect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

class RequestLoans extends dbconn
{
    public function __construct()
    {
        $this->initDBO();
    }

    public function submit_requested_loans($req_amount, $req_tenure, $requester_id, $req_remarks)
    {
        if (isset($_SESSION['user_id'])) {
            $db = $this->dblocal;
            $status = 2; //submitted
            $req_tenure  = $req_tenure * 12; //months in year
            $response = [];
            try {

                $stmt = $db->prepare("INSERT INTO `bi_loansapplication`(amount,status,tenureMonths,requesterId,requesterComment) VALUES (:amount,:status,:tenureMonths,:requesterId,:requesterComment)");
                $stmt->bindparam(':amount', $req_amount);
                $stmt->bindparam(':status', $status); //pending
                $stmt->bindparam(':tenureMonths', $req_tenure);
                $stmt->bindparam(':requesterId', $requester_id);
                $stmt->bindparam(':requesterComment', $req_remarks);
                $result = $stmt->execute();
                if ($result) {
                    $response['message'] = 'request submited.!';
                    $response['status'] = 200;
                } else {
                    $response['message'] = 'request submit faild';
                    $response['status'] = 500;
                }
                return $response;
            } catch (PDOException $ex) {
                $stat1 = $ex->getMessage();
                return $stat1;
            }
        }
    }


    public function get_loan_request_data()
    {
        if (isset($_SESSION['user_id'])) {
            $db = $this->dblocal;
            try {
                $select = $db->prepare("SELECT 
            bi_loansapplication.id,
            bi_loansapplication.amount,
            bi_loansapplication.status,
            bi_loansapplication.tenureMonths,
            bi_loansapplication.tenureExp,
            bi_loansapplication.requesterId,
            bi_loansapplication.requesterComment,
            bi_loansapplication.financeId,
            bi_loansapplication.financeComment,
            bi_loansapplication.approverId,
            bi_loansapplication.approverComment,
            bi_loansapplication.createdOn,
            bi_issuedlog.loanId,
            bi_issuedlog.issuedById,
            bi_issuedlog.issuedRemarks,
            bi_issuedlog.amount as issued_amount,
            bi_issuedlog.attachment,
            bi_issuedlog.createdDateTime,
            bi_recievedlog.loanId,
            bi_recievedlog.recievedById,
            bi_recievedlog.recievedRemark,
            bi_recievedlog.attachment,
            bi_recievedlog.createdDateTime,
            bi_recievedlog.amount as receive_amount,
            bi_users.id as user_id,
            bi_users.username,
            bi_users.name as user_name,
            bi_users.email as user_email
            FROM `bi_loansapplication`
            LEFT JOIN bi_issuedlog ON  bi_loansapplication.id=bi_issuedlog.loanId 
            LEFT JOIN bi_recievedlog ON bi_loansapplication.id = bi_recievedlog.loanId 
            LEFT JOIN bi_users ON bi_loansapplication.requesterId=bi_users.id  
            ORDER BY bi_loansapplication.id DESC");
                $select->execute();
                $stat1 = $select->fetchall();
                return $stat1;
            } catch (PDOException $ex) {
                $stat1 = $ex->getMessage();
                return $stat1;
            }
        }
    }


    public function display_dashboard_loan_details_finance_team()
    {
        if (isset($_SESSION['user_id'])) {
            $db = $this->dblocal;
            try {
                $response = [];
                //total issued loans finance
                $stmt1 = $db->prepare("SELECT SUM(bi_issuedlog.amount) AS total_issued_amount FROM bi_issuedlog");
                $stmt1->execute();
                $total_issued_sum = $stmt1->fetch(PDO::FETCH_ASSOC)['total_issued_amount'];

                // Get pending loans finance
                $stmt2 = $db->prepare("SELECT COUNT(*) AS pending_laons FROM bi_loansapplication WHERE bi_loansapplication.status = 2");
                $stmt2->execute();
                $pending_loans = $stmt2->fetch(PDO::FETCH_ASSOC)['pending_laons'];

                // Get  received loans finance
                $stmt3 = $db->prepare("SELECT SUM(bi_recievedlog.amount) AS total_received_amount FROM bi_recievedlog");
                $stmt3->execute();
                $total_received_amount = $stmt3->fetch(PDO::FETCH_ASSOC)['total_received_amount'];

                // Return the results
                $response = [
            
                        'total_issued_amount' => $total_issued_sum,
                        'total_received_amount' => $total_received_amount,
                        'pending_laons' => $pending_loans,
                    
                ];
                return $response;
            } catch (PDOException $ex) {
                $stat1 = $ex->getMessage();
                return $stat1;
            }
        }
    }
}
