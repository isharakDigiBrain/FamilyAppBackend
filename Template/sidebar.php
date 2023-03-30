<nav class="sidebar">
    <div class="menu">
        <div class="sections Load-LoanPage">
            <img class="transparent-right" src="./assets/img/section-loan.png" alt="">
            <?php
            if (!empty($Role)) {
                if ($Role == 'Family') { ?>
                    <h6>My Loan</h6>
                <?php } else { ?>
                    <h6>Loan</h6>
            <?php }
            } ?>
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