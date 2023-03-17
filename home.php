<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<style>
    .power-off:hover {
        color: #ff0000;
    }
</style>

    <section>
        <div class="dashboard-poster" onclick="goto('loans')">
            <img class="transparent-right" src="./assets/img/section-loan.png" alt="" srcset="">
            <h3 class="fw-b" id="ITAdmin">ITAdmin My Loans </h3>
            <!-- <p><?php echo $_SESSION['user_role'] ?></p> -->

            <div style="display:flex; justify-content: space-between; box-sizing: border-box; height: 100%;">
                <div class="dashboard x1">
                    <div class="dashboard-card x1">
                        <?php echo $_SESSION['name'] ?>
                    </div>
                    <div class="dashboard-card x1">
                        <h6 class="fw-l">Loan Recieved</h6>
                        <h4 class="fw-b">AED 20000</h4>
                    </div>
                    <div class="dashboard-card x2">
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
        
        <div class="dashboard-poster" onclick="goto('loans')">
            <img class="transparent-right" src="./assets/img/section-company.png" alt="" srcset="">
            <h3 class="fw-b">Properties</h3>
            <div style="display:flex; justify-content: space-between; box-sizing: border-box; height: 100%;">
                <div class="dashboard x1">
                    <div class="dashboard-card x1">
                        <h6 class="fw-l">Loan Issued</h6>
                        <h4 class="fw-b">AED 200000</h4>
                    </div>
                    <div class="dashboard-card x1">
                        <h6 class="fw-l">Loan Recieved</h6>
                        <h4 class="fw-b">AED 20000</h4>
                    </div>
                    <div class="dashboard-card x2">
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
            <div style="display:flex; justify-content: space-between; box-sizing: border-box; height: 100%;">
                <div class="dashboard x1">
                    <div class="dashboard-card x1">
                        <h6 class="fw-l">Loan Issued</h6>
                        <h4 class="fw-b">AED 200000</h4>
                    </div>
                    <div class="dashboard-card x1">
                        <h6 class="fw-l">Loan Recieved</h6>
                        <h4 class="fw-b">AED 20000</h4>
                    </div>
                    <div class="dashboard-card x2">
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
        document.getElementById('logout-btn').addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'logout.php', true);
            xhr.onload = function() {
                toastr["success"]('log-out success');
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, "1000");
            };
            xhr.send();
        });
    </script>