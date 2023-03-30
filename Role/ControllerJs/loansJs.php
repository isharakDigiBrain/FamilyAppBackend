<script>
    var UserRole = '<?= $ResponseObject->defaultPage ?>';

    var switched_user = <?= json_encode($CurrentRoleName)  ?>;

    // const { DateTime } = require("luxon");
    const DateTime = luxon.DateTime;
    const Duration = luxon.Duration;
    const Info = luxon.Info;




    $(document).ready(function() {
        // var UserAccess = '<= $UserAccess ?>';
        // console.log('UserAccess')
        // console.log(UserAccess);
        console.log('default user role');
        console.log(UserRole);

        console.log('cureent user role');
        console.log(switched_user);


        $('#FormNewLoanRequest').validate({
            rules: {
                input_amount: {
                    required: true,
                    number: true,
                },
                input_tenure: {
                    required: true,
                    number: true,
                },
                InputRemarks: {
                    required: true,
                    // pattern: /^[a-zA-Z0-9 -\(\)&.:,-;\']*$/i
                },
            },
            messages: {
                InputRemarks: {
                    required: 'Comment Required',
                    pattern: 'Invalid Input! Special chars allowed are Dot, Comma and Space'
                },
            },

            submitHandler: function(event) {
                var amount = $('input[name=input_amount]').val();
                var tenure = $('input[name=input_tenure]').val();
                var remarks = $('#InputRemarks').val();
                var requester_id = $('input[name=input_requester_id]').val();

                $.ajax({
                    type: 'POST',
                    url: 'model/request_loans.php',
                    data: {
                        amount: amount,
                        tenure: tenure,
                        remarks: remarks,
                        requester_id: requester_id,
                        action: "POST_REQUESTED_LOAN",
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status == '200') {
                            toastr["success"](response.message);
                            $(".modal").toggleClass("showModal");
                            $('#loan-request-modal').addClass('out');
                            $('#body-content').css({
                                opacity: 0.5,
                            });
                            $('#LoadSpiner').fadeIn();
                            $('#LoadSpiner_received_loans').fadeIn();
                            $('#LoadSpiner_issued_loans').fadeIn();
                            $('#LoadSpiner_pending_loans').fadeIn();
                            setTimeout(() => {
                                $('.TBL_LOANS_REQUEST').DataTable().destroy();
                                load_requester_data();
                                dashboard_reports_for_loans();
                                $('#body-content').css({
                                    opacity: 1,
                                });
                                $('#LoadSpiner').hide();
                                $('#LoadSpiner_received_loans').hide();
                                $('#LoadSpiner_issued_loans').hide();
                                $('#LoadSpiner_pending_loans').hide();
                            }, "1500");
                            $('#FormNewLoanRequest').trigger("reset");
                        }

                        if (response.status == '500') {
                            console.log('error');
                            toastr["error"](response.message);
                            $('.TBL_LOANS_REQUEST').DataTable().destroy();
                            load_requester_data();
                            $('#FormNewLoanRequest').trigger("reset");
                        }



                    },
                    error: function(error) {
                        toastr["error"]('request submit faild');
                        $('.TBL_LOANS_REQUEST').DataTable().destroy();
                        load_requester_data();
                    }
                });


            }

        });




        load_requester_data();
        dashboard_reports_for_loans();



    }); // end document.ready


    function load_requester_data() {
        $.ajax({
            url: 'model/request_loans.php',
            type: "POST",
            data: {
                action: "load_requester_loan_details",
                UserRole: switched_user,
            },
            dataType: "json",
            success: function(data) {
                console.log('test 1111');
                console.log(data);

                // Datatables
                TblRequest = $('.TBL_LOANS_REQUEST').DataTable({
                    "order": [
                        // [0, "desc"]
                    ],
                    "data": data,
                    "columns": [{
                            "data": "createdOn",
                            "render": function(data, type, row, meta) {
                                if (row.createdOn) {
                                    const inputString = row.createdOn;
                                    const inputFormat = 'yyyy-MM-dd HH:mm:ss';
                                    const outputFormat = 'dd-MMM-yyyy';
                                    const dateTime = DateTime.fromFormat(inputString,
                                        inputFormat);
                                    const outputString = dateTime.toFormat(outputFormat);
                                    //console.log(outputString); // Outputs: "14
                                    return `${outputString}`;
                                }

                            }
                        },
                        {
                            "data": "requesterId",
                            "render": function(data, type, row, meta) {
                                return `${row.user_name}`;
                            }
                        },
                        {
                            "data": "tenureMonths",
                            "render": function(data, type, row, meta) {
                                if (row.tenureMonths) {
                                    const tenureMonth = row.tenureMonths;
                                    const yrs = tenureMonth / 12;
                                    return `${yrs}`;
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
                            "data": "issued_amount",
                            "render": function(data, type, row, meta) {
                                if (row.issued_amount == null) {
                                    return '0.00';
                                } else {
                                    return `${row.issued_amount}`;
                                }


                            }
                        },
                        {
                            "data": "received_amount",
                            "render": function(data, type, row, meta) {
                                if (row.issued_amount == null) {
                                    return '0.00';
                                } else {
                                    return `${row.issued_amount}`;
                                }
                            }
                        },

                        {
                            "data": "statusName",

                        },
                    ]
                });

                $('.TBL_LOANS_REQUEST tbody').on('click', 'tr', function() {
                    var data = TblRequest.row(this).data();
                    console.log(data);
                    switch (switched_user) {
                        case 'Finance':
                            switch (data.status) {
                                case '5':
                                case '6':
                                case '12':
                                case '13':
                                    //document.getElementById("input_approver_comment").disabled = true; 
                                    $('.input_approver_comment').fadeOut();
                                    $('.SubmitApprovedBtn').fadeOut();
                                    $('.SubmitRejectBtn').fadeOut();
                                    break;
                                case '2': //REQ
                                case '3': //FINANCE APPRO
                                case '4': //FINANCE REJEC
                                case '8': //FINANCE CANCE
                                case '9': //FINANCE SETTLE
                                case '10':  //FINANCE CLOSE
                                    //document.getElementById("input_approver_comment").disabled = true; 
                                    $('.input_approver_comment').fadeIn();
                                    $('.SubmitApprovedBtn').fadeIn();
                                    $('.SubmitRejectBtn').fadeIn();
                                    break;
                            }
                            break;
                        case 'FinalApprover':
                            break;

                    }
                    $('.modal-loan-details').addClass("modal-animation-two").removeClass("out");
                    $('body').addClass('modal-active');

                    document.getElementById('LoanDetailID').innerHTML = ' Loan Details - #' + data.id;
                    document.getElementById('RequesterName').innerHTML = data.user_name;
                    document.getElementById('RequeterRemarks').innerHTML = data.requesterComment;
                    document.getElementById('Tenure').innerHTML = data.tenureMonths / 12;
                    document.getElementById('IssuedAmount').innerHTML = data.issued_amount;
                    document.getElementById('ReceivedAmount').innerHTML = data.receive_amount;
                    document.getElementById('FinanceApproverName').innerHTML = data.financeId;
                    document.getElementById('FinanceApproverComment').innerHTML = data.financeComment;
                    document.getElementById('FinalApproverName').innerHTML = data.approverId;
                    document.getElementById('FinalApproverComment').innerHTML = data.approverComment;
                    document.getElementById('LoanStatus').innerHTML = data.statusName;



                    $('#LOANS_ISSUED_LOGS').DataTable().destroy();
                    $('#LOANS_RECEIVED_LOGS').DataTable().destroy();


                    LoanDetailId = data.id;
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
                            console.log(data.ISSUED_LOANS);
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

                    ///submit Approved finance and final approver 
                    $('.SubmitApprovedBtn').on('click', function() {
                        $('#FormApproveOrReject').validate({
                            rules: {
                                input_approver_comment: {
                                    required: true,
                                },
                            },
                            messages: {
                                input_approver_comment: {
                                    required: 'Comment Required',
                                },
                            },

                            submitHandler: function(event) {
                                var approver_comment = $('input[name=input_approver_comment]').val();
                                var approver_id = $('input[name=input_approver_id]').val();
                                $.ajax({
                                    type: 'POST',
                                    url: 'model/request_loans.php',
                                    data: {
                                        approver_comment: approver_comment,
                                        approver_id: approver_id,
                                        UserRole: switched_user,
                                        loan_id: data.id,
                                        action: "POST_APPROVED_LOANS",
                                    },
                                    dataType: 'json',
                                    success: function(response) {
                                        console.log(response);
                                        if (response.status == '200') {
                                            toastr["success"](response.message);

                                            $('.modal-loan-details').addClass("out").removeClass("modal-animation-two");
                                            $('#body-content').css({
                                                opacity: 0.5,
                                            });
                                            $('#LoadSpiner').fadeIn();
                                            $('#LoadSpiner_received_loans').fadeIn();
                                            $('#LoadSpiner_issued_loans').fadeIn();
                                            $('#LoadSpiner_pending_loans').fadeIn();
                                            setTimeout(() => {
                                                $('.TBL_LOANS_REQUEST').DataTable().destroy();
                                                load_requester_data();
                                                dashboard_reports_for_loans();
                                                $('#body-content').css({
                                                    opacity: 1,
                                                });
                                                $('#LoadSpiner').hide();
                                                $('#LoadSpiner_received_loans').hide();
                                                $('#LoadSpiner_issued_loans').hide();
                                                $('#LoadSpiner_pending_loans').hide();
                                            }, "1500");
                                            $('#FormApproveOrReject').trigger("reset");
                                        }

                                        if (response.status == '500') {
                                            console.log('error');
                                            toastr["error"](response.message);
                                            $('.TBL_LOANS_REQUEST').DataTable().destroy();
                                            load_requester_data();
                                            $('#FormApproveOrReject').trigger("reset");
                                        }



                                    },
                                    error: function(error) {
                                        toastr["error"]('request submit faild');
                                        $('.TBL_LOANS_REQUEST').DataTable().destroy();
                                        load_requester_data();
                                    }
                                });


                            }

                        });
                    });

                    ///submit Reject  finance  and final approver
                    $('.SubmitRejectBtn').on('click', function() {
                        $('#FormApproveOrReject').validate({
                            rules: {
                                input_approver_comment: {
                                    required: true,
                                },
                            },
                            messages: {
                                input_approver_comment: {
                                    required: 'Comment Required',
                                },
                            },

                            submitHandler: function(event) {
                                var approver_comment = $('input[name=input_approver_comment]').val();
                                var approver_id = $('input[name=input_approver_id]').val();
                                $.ajax({
                                    type: 'POST',
                                    url: 'model/request_loans.php',
                                    data: {
                                        approver_comment: approver_comment,
                                        approver_id: approver_id,
                                        UserRole: switched_user,
                                        loan_id: data.id,
                                        action: "POST_REJECT_LOANS",
                                    },
                                    dataType: 'json',
                                    success: function(response) {
                                        console.log(response);
                                        if (response.status == '200') {
                                            toastr["success"](response.message);

                                            $('.modal-loan-details').addClass("out").removeClass("modal-animation-two");
                                            $('#body-content').css({
                                                opacity: 0.5,
                                            });
                                            $('#LoadSpiner').fadeIn();
                                            $('#LoadSpiner_received_loans').fadeIn();
                                            $('#LoadSpiner_issued_loans').fadeIn();
                                            $('#LoadSpiner_pending_loans').fadeIn();
                                            setTimeout(() => {
                                                $('.TBL_LOANS_REQUEST').DataTable().destroy();
                                                load_requester_data();
                                                dashboard_reports_for_loans();
                                                $('#body-content').css({
                                                    opacity: 1,
                                                });
                                                $('#LoadSpiner').hide();
                                                $('#LoadSpiner_received_loans').hide();
                                                $('#LoadSpiner_issued_loans').hide();
                                                $('#LoadSpiner_pending_loans').hide();
                                            }, "1500");
                                            $('#FormApproveOrReject').trigger("reset");
                                        }

                                        if (response.status == '500') {
                                            console.log('error');
                                            toastr["error"](response.message);
                                            $('.TBL_LOANS_REQUEST').DataTable().destroy();
                                            load_requester_data();
                                            $('#FormApproveOrReject').trigger("reset");
                                        }



                                    },
                                    error: function(error) {
                                        toastr["error"]('request submit faild');
                                        $('.TBL_LOANS_REQUEST').DataTable().destroy();
                                        load_requester_data();
                                    }
                                });


                            }

                        });
                    });

                });
            }
        });
    }


    function dashboard_reports_for_loans() {
        $.ajax({
            url: "model/request_loans.php",
            type: "POST",
            data: {
                action: "DISPLAY_LOAN_DASHBOARD",
                UserRole: switched_user,
            },
            dataType: "json",
            success: function(result) {
                console.log('result');
                console.log(result);

                document.getElementById('issued_loans').innerHTML = result.total_issued_amount;
                document.getElementById('received_loans').innerHTML = result.total_received_amount;
                document.getElementById('pending_loans').innerHTML = result.pending_loans;

            },
            error: function(error) {
                console.log(error);

            }
        });
    }
</script>