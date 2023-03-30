<section class="main">
    <h3 class="page-title"> <?php echo $Role; ?> Dashboard common</h3>
    <?php

    ?>
    <div class="dashboard-poster">
        <img class="transparent-right" src="./assets/img/section-loan.png" alt="" srcset="">
        <h3 class="fw-b" id="ITAdmin"> Loans </h3>
        <div class="home-dash-items">
            <div class="dashboard gc-span-1">
                <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Issued</h6>
                    <h4 class="fw-b" id="issued_loans">AED 200000</h4>
                </div>
                <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Recieved</h6>
                    <h4 class="fw-b" id="received_loans">AED 20000</h4>
                </div>
                <div class="dashboard-card gc-span-2">
                    <h6 class="fw-l">Pending Loans</h6>
                    <h4 class="fw-b" id="pending_loans">20</h4>
                </div>
            </div>
            <div class="graphs">
                <img src="./assets/img/dummy-graph.svg" style="height:100%; width:100%; ">
                <h5 class="regular">Total loans issued/recieved</h5>
            </div>
        </div>
    </div>

    <div class="dashboard-poster" onclick="goto('loans')">
        <img class="transparent-right" src="./assets/img/section-company.png" alt="" srcset="">
        <h3 class="fw-b">Properties</h3>
        <div class="home-dash-items">
            <div class="dashboard gc-span-1">
                <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Issued</h6>
                    <h4 class="fw-b">AED 200000</h4>
                </div>
                <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Recieved</h6>
                    <h4 class="fw-b">AED 20000</h4>
                </div>
                <div class="dashboard-card gc-span-2">
                    <h6 class="fw-l">Pending Loans</h6>
                    <h4 class="fw-b">20</h4>
                </div>
            </div>
            <div class="graphs">
                <img src="./assets/img/dummy-graph.svg" style="height:100%; width:100%; ">
                <h5 class="regular">Total loans issued/recieved</h5>
            </div>
        </div>
    </div>

    <div class="dashboard-poster" onclick="goto('company')">
        <img class="transparent-right" src="./assets/img/section-property.png" alt="" srcset="">
        <h3 class="fw-b">Company</h3>
        <div class="home-dash-items">
            <div class="dashboard gc-span-1">
                <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Issued</h6>
                    <h4 class="fw-b">AED 200000</h4>
                </div>
                <div class="dashboard-card gc-span-1">
                    <h6 class="fw-l">Loan Recieved</h6>
                    <h4 class="fw-b">AED 20000</h4>
                </div>
                <div class="dashboard-card gc-span-2">
                    <h6 class="fw-l">Pending Loans</h6>
                    <h4 class="fw-b">20</h4>
                </div>
            </div>
            <div class="graphs">
                <img src="./assets/img/dummy-graph.svg" style="height:100%; width:100%; ">
                <h5 class="regular">Total loans issued/recieved</h5>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        var switch_user_role = '<?= $Role ?>';
        $.ajax({
            url: "model/request_loans.php",
            type: "POST",
            data: {
                action: "DISPLAY_LOAN_DASHBOARD",
                UserRole: switch_user_role,
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

    });
</script>