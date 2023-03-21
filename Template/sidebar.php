<nav class="sidebar">
    <div class="menu">
        <!-- <div class="sections Load-DashboardPage">
            <img src="./assets/img/Logo.png" alt="">
            <h6>Dashboard</h6>
        </div> -->
        <?php

        ?>
        <div class="sections Load-LoanPage">
            <img class="transparent-right" src="./assets/img/section-loan.png" alt="">
            <h6>My Loan</h6>
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

    <!-- <div class="profile">
        <h6 class="fw-l"><?php echo $_SESSION['name'] ?> <i id="logout-btn" class="power-off fa fa-power-off Load-LogoutPage"></i></h6>
    </div> -->

    <!-- need -->
    <!-- <div class="fw-l Role-ParentFamilyView"> Parent Family </div>
    <div class="fw-l Role-FinalApproverView"> Final Approver </div> -->
    <!-- <label for="switch-role-select">Switch Role</label>
    <select class="form-select" id="switch-role-select" name="switch-role-select" aria-label="Default select example">
       <option selected disabled>switch role</option> 
    </select> -->


    <!-- Example split danger button -->
    <!-- <div class="btn-group dropright  ">
        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Switch Role</button>
        <div id="switch-role-select" class="dropdown-menu">
        </div>
    </div> -->

    <!-- Example single danger button -->
    <!-- Example split danger button -->



    <!-- <div class="btn-group dropdown">
        <button type="button" class="btn btn-danger btn-sm"><?= $RoleDescription  ?></button>
        <button type="button" class="btn btn-danger btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu switch-role-select">
        </ul>
    </div> -->



    <div class="role-change">
        <p class="title">Switch Role</p>
        <button onclick="userRoleToggle()" class="role-change-btn">
            <?= $RoleDescription  ?>
        </button>
        <div class="role-menu">
            <ul class="switch-role-select">

            </ul>
        </div>
    </div>

</nav>




<script>
$(document).ready(function() {
    var RoleSwicthList = <?= json_encode($ResponseObject->RoleAccess) ?>;
    $('.switch-role-select').html('');
    $.each(RoleSwicthList, function(key, value) {
        $('.switch-role-select').append('<li><a class="Role-' + value.name + 'View">' + value
            .description + '</a></li>');
    });

});

function userRoleToggle() {
    const toggleMenu = $(".role-menu");
    toggleMenu.toggleClass('active');
}
</script>