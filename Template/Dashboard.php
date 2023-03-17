<?php

//page controller
if(isset($_POST['nav_page'])){
    $nav_page = $_POST['nav_page'];
    $LoadPage = $nav_page;

}else {
    $LoadPage = 'dashboard_index';
}  


//role controller
$Role = $ResponseObject->defaultPage;
if(isset($_POST['Role'])){
    $Role =$_POST['Role'];
}
?>



<?php
include_once SITE_ROOT_TEMPLATE . 'sidebar.php';

?>
<div class="container-fluid" style="position:relative; left:100px;">
    <?php
    
    include_once SITE_ROOT_TEMPLATE . $LoadPage . '.php';
    
    include_once SITE_ROOT_TEMPLATE . 'Dashboard.js';

    ?>
</div>




<script>
    $(document).ready(function() {

        $(".Load-LoanPage").click(function() {
            // $("#BodyContent").fadeOut();
            // $("#loader").fadeIn();
            post_to_url('<?= WEB_ROOT ?>', {
                // if any  
                nav_page: 'LoanPage',
                Role: '<?= $Role ?>',
            }, 'post');
        });

        $(".Load-LogoutPage").click(function() {
            // $("#BodyContent").fadeOut();
            // $("#loader").fadeIn();
            toastr["success"]('log-out success');
            setTimeout(() => {
                post_to_url('<?= WEB_ROOT ?>', {
                    // if any  
                    nav_page: 'LogoutPage',
                }, 'post');
            }, "1000");

        });

        $(".Role-ParentFamilyView").click(function() {
            // $("#BodyContent").fadeOut();
            // $("#loader").fadeIn();
          //  toastr["success"]('log-out success');
            setTimeout(() => {
                post_to_url('<?= WEB_ROOT ?>', {
                   Role: 'ParentFamily'
                }, 'post');
            }, "1000");

        });

        $(".Role-FinalApproverView").click(function() {
            // $("#BodyContent").fadeOut();
            // $("#loader").fadeIn();
          //  toastr["success"]('log-out success');
            setTimeout(() => {
                post_to_url('<?= WEB_ROOT ?>', {
                   Role: 'FinalApprover'
                }, 'post');
            }, "1000");

        });
        
    });
    console.log('<?= json_encode($_POST)  ?>');
</script>