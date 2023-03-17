<script>
    // const { DateTime } = require("luxon");
    const DateTime = luxon.DateTime;
    const Duration = luxon.Duration;
    const Info = luxon.Info;
    console.log(DateTime);

    $(document).ready(function() {
        var UserAccess = '<?= $UserAccess ?>';
        console.log('UserAccess')
        console.log(UserAccess);

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
                            $(".modal").toggleClass("showModal")
                            $('#body-content').css({
                                opacity: 0.5,
                            });
                            $('#LoadSpiner').fadeIn();
                            $('#LoadSpiner_received_loans').fadeIn();
                            $('#LoadSpiner_issued_loans').fadeIn();
                            $('#LoadSpiner_pending_loans').fadeIn();
                            setTimeout(() => {
                                $('#TBL_LOANS_REQ').DataTable().destroy();
                                load_requester_data();
                                finance_team_loan_dashboard();
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
                            $('#TBL_LOANS_REQ').DataTable().destroy();
                            load_requester_data();
                            $('#FormNewLoanRequest').trigger("reset");
                        }
                    },
                    error: function(error) {
                        toastr["error"]('request submit faild');
                    }
                });


            }

        });

        load_requester_data();
        finance_team_loan_dashboard();
    }); // end document.ready


    function load_requester_data() {
        $.ajax({
            url: 'model/request_loans.php',
            type: "POST",
            data: {
                action: "load_requester_loan_details"
            },
            dataType: "json",
            success: function(data) {
                // Datatables
                dt = $('#TBL_LOANS_REQ').DataTable({
                    "order": [
                        [0, "desc"]
                    ],
                    "data": data,
                    "columns": [{
                            "data": "createdOn",
                            "render": function(data, type, row, meta) {
                                if (row.createdOn) {
                                    const inputString = row.createdOn;
                                    const inputFormat = 'yyyy-MM-dd HH:mm:ss';
                                    const outputFormat = 'dd-MMM-yyyy';
                                    const dateTime = DateTime.fromFormat(inputString, inputFormat);
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
                                return `${row.issued_amount}`;
                            }
                        },
                        {
                            "data": "received_amount",
                            "render": function(data, type, row, meta) {
                                return `${row.receive_amount}`;
                            }
                        },
                        {
                            "data": "status",
                            "render": function(data, type, row, meta) {
                                if (row.status == '2') {
                                    return `<p style="border: 1px solid #B8874F; color:#B8874F; " class="badge">SUBMIT</p>`;
                                }
                            }
                        },
                    ]
                });
            }
        });
    }


    function finance_team_loan_dashboard() {
        $.ajax({
            url: "model/request_loans.php",
            type: "POST",
            data: {
                action: "display_loan_dashbord_financeTeam"
            },
            dataType: "json",
            success: function(result) {
                console.log(result);
                document.getElementById('issued_loans').innerHTML = result.total_issued_amount;
                document.getElementById('received_loans').innerHTML = result.total_received_amount;
                document.getElementById('pending_loans').innerHTML = result.pending_laons;

            },
            error: function(error) {
                console.log(error);

            }
        });
    }
</script>