<script>
    var UserRole = '<?= $ResponseObject->defaultPage ?>';
    var switched_user = <?= json_encode($CurrentRoleName)  ?>;

    // const { DateTime } = require("luxon");
    const DateTime = luxon.DateTime;
    const Duration = luxon.Duration;
    const Info = luxon.Info;

    $(document).ready(function() {

        $(".Load-LoanDetails").click(function() {
            post_to_url('<?= WEB_ROOT ?>', {
                nav_page: 'loans-details',
                Role: '<?= $Role ?>',
                LoanID: LoanDetailId,
            }, 'post');
        });

        load_data();

    }); // end document.ready


    function load_data() {

        var LoanDetailID = <?php echo json_encode($_POST['LoanID'] ?? null) ?>;
        console.log(LoanDetailID);

        $('#LOANS_ISSUED_LOGS').DataTable().destroy();
        $('#LOANS_RECEIVED_LOGS').DataTable().destroy();


        LoanDetailId = LoanDetailID;
        $.ajax({
            url: "model/request_loans.php",
            type: "POST",
            data: {
                action: "GET_LOANS_ISSUES_LOGS_AND_RECEIVED_LOGS",
                UserRole: switched_user,
                LoanDetailId: LoanDetailId,
            },
            dataType: "json",
            success: function(data) {
                console.log('data');
                console.log(data);

                // DETAILS SUMMERY 

                document.getElementById('LoanDetails_RequesterName').innerHTML = data.LoanDetailSummery[0].user_name;
                document.getElementById('LoanDetails_RequeterRemarks').innerHTML = data.LoanDetailSummery[0].requesterComment;
                document.getElementById('LoanDetails_Tenure').innerHTML = data.LoanDetailSummery[0].tenureMonths / 12 + 'yr';

                document.getElementById('LoanDetails_IssuedAmount').innerHTML = data.LoanDetailSummery[0].issued_amount;
                document.getElementById('LoanDetails_ReceivedAmount').innerHTML = data.LoanDetailSummery[0].receive_amount;
                document.getElementById('LoanDetails_FinanceApproverName').innerHTML = data.LoanDetailSummery[0].financeId;
                document.getElementById('LoanDetails_FinanceApproverComment').innerHTML = data.LoanDetailSummery[0].financeComment;
                document.getElementById('LoanDetails_FinalApproverName').innerHTML = data.LoanDetailSummery[0].approverId;
                document.getElementById('LoanDetails_FinalApproverComment').innerHTML = data.LoanDetailSummery[0].approverComment;
                document.getElementById('LoansDetails_Status').innerHTML = data.LoanDetailSummery[0].statusName;

              
                //ISSUED loans
                $('#LOANS_ISSUED_LOGS').DataTable({
                    "order": [
                        [0, "desc"]
                    ],
                    "data": data.ISSUED_LOANS,
                    "columns": [{
                            "data": "createdDateTime",
                            "render": function(data, type, row, meta) {
                                if (row.createdDateTime) {
                                    const inputString = row.createdDateTime;
                                    const inputFormat = 'yyyy-MM-dd HH:mm:ss';
                                    const outputFormat = 'dd-MMM-yyyy';
                                    const dateTime = DateTime.fromFormat(inputString,
                                        inputFormat);
                                    const outputString = dateTime.toFormat(outputFormat);
                                    return `${outputString}`;
                                } else {
                                    return '';
                                }


                            }
                        },
                        {
                            "data": "amount",
                            "render": function(data, type, row, meta) {
                                return `${row.amount}`;
                            }
                        },
                        {
                            "data": "issuedById",
                            "render": function(data, type, row, meta) {
                                return `${row.issuedById}`;
                            }
                        },
                        {
                            "data": "issuedRemarks",
                            "render": function(data, type, row, meta) {
                                return `${row.issuedRemarks}`;
                            }
                        },

                    ]
                });

                //RECEIVED loans
                $('#LOANS_RECEIVED_LOGS').DataTable({
                    "order": [
                        [0, "desc"]
                    ],
                    "data": data.RECEIVED_LOANS,
                    "columns": [{
                            "data": "createdDateTime",
                            "render": function(data, type, row, meta) {
                                if (row.createdDateTime) {
                                    const inputString = row.createdDateTime;
                                    const inputFormat = 'yyyy-MM-dd HH:mm:ss';
                                    const outputFormat = 'dd-MMM-yyyy';
                                    const dateTime = DateTime.fromFormat(inputString,
                                        inputFormat);
                                    const outputString = dateTime.toFormat(outputFormat);
                                    return `${outputString}`;
                                } else {
                                    return '';
                                }


                            }
                        },
                        {
                            "data": "amount",
                            "render": function(data, type, row, meta) {
                                return `${row.amount}`;
                            }
                        },
                        {
                            "data": "issuedById",
                            "render": function(data, type, row, meta) {
                                return `${row.issuedById}`;
                            }
                        },
                        {
                            "data": "issuedRemarks",
                            "render": function(data, type, row, meta) {
                                return `${row.issuedRemarks}`;
                            }
                        },

                    ]
                });

            },
            error: function(error) {
                console.log(error);

            }
        });










    }
</script>