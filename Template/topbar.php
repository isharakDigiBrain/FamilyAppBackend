

<div class="topbar">
    <div class="start">
        <button class="img-btn Load-DashboardPage" style="background-image:url('./assets/img/Logo.png')">
        </button>
        <div>
            <div class="animatedMenuIcon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>






    <div class="end">       

        <a onclick="userMenuToggle()">
            <span style="color:white;" class="fw-b"></span> <i class="fas fa-user"></i>
        </a>
        <div class="user-menu">
            <h6><?php echo $_SESSION['name'] ?><br /><span><?= $RoleDescription  ?></span></h6>
            <ul>
                <li>
                    <i class="fas fa-user-alt"></i> <a href="#">My profile</a>
                </li>

                <li>
                    <i class="fas fa-cog"></i><a href="#">Setting</a>
                </li>

                <li class="Load-LogoutPage">
                    <i class="fas fa-power-off"></i><a href="#">Logout</a>
                </li>
            </ul>
        </div>
    </div>

</div>


