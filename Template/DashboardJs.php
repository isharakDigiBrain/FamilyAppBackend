<script>
$(document).ready(function() {

    $(".Load-DashboardPage").click(function() {
        post_to_url('<?= WEB_ROOT ?>', {
            nav_page: 'dashboard',
            Role: '<?= $Role ?>',
        }, 'post');

    });

    $(".Load-LoanPage").click(function() {
        post_to_url('<?= WEB_ROOT ?>', {
            nav_page: 'loans',
            Role: '<?= $Role ?>',
        }, 'post');
    });


    //logout page 
    $(".Load-LogoutPage").click(function() {
        $.ajax({
            type: 'POST',
            url: 'model/loginauth.php',
            data: {
                action: "LogOutUser",
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.status == '200') {
                    console.log('response success');
                    console.log(response);
                    toastr["success"](response.message);
                    //make one spin fade in for every pages
                    setTimeout(() => {
                        post_to_url('<?= WEB_ROOT ?>');
                    }, "1000");
                }
                if (response.status == '500') {
                    console.log('error');
                    console.log(error);
                }
            },
            error: function(error) {
                toastr["error"]('internal server error');
            }
        });
    });

    //navigation to switch roles// 
    <?php foreach ($ResponseObject->RoleAccess as $val) { ?>
    $(".Role-<?= $val->name ?>View").click(function() {
        post_to_url('<?= WEB_ROOT ?>', {
            Role: '<?= $val->name ?>'
        }, 'post');

    });
    <?php
        }

        ?>


});

console.log('<?= json_encode($_POST)  ?>');


</script>