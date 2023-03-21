<section class="main">
    <h3 class="page-title"> <?php  echo $Role; ?> Dashboard</h3>
    <?php 
    // echo '<pre>';
    // print_r($ResponseObject);
    ?>
    <div class="dashboard-poster">
        <img class="transparent-right" src="./assets/img/section-loan.png" alt="" srcset="">
        <h3 class="fw-b" id="ITAdmin"> Loans </h3>
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