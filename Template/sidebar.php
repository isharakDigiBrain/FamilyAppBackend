<nav class="sidebar">
    <div class="menu">
        <div class="sections">
            <img src="./assets/img/Logo.png" alt="">
            <h6>Dashboard</h6>
        </div>
        <div class="sections Load-LoanPage">

            <h6>Loan</h6>
        </div>
        <div class="sections">
            <img class="transparent-right" src="./assets/img/section-company.png" alt="">
            <h6>Company</h6>
        </div>
        <div class="sections">
            <img class="transparent-right" src="./assets/img/section-property.png" alt="">
            <h6>Property</h6>
        </div>
    </div>

    <div class="profile">
        <h6 class="fw-l"><?php echo $_SESSION['name'] ?> <i id="logout-btn" class="power-off fa fa-power-off Load-LogoutPage"></i></h6>

       
    </div>
    <div class="fw-l Role-ParentFamilyView"> Parent Family </div>
    <div class="fw-l Role-FinalApproverView"> Final Approver </div>
</nav>