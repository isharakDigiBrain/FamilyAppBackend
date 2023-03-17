<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- header,topbar start -->
<?php include('./Template/header.php');
include('./Template/topbar.php'); ?>
<!-- header, topbar end -->


<body id="body-content">
    <!-- sidebar start -->
    <?php include('./Template/sidebar.php'); ?>
    <!-- sidebar end -->


    <!-- foooter start -->
    <?php include('./Template/footer.php'); ?>
    <!-- foooter end -->
    <!-- required -->


    <!-- content goes here -->
    <?php include_once('./home.php') ?>
    <!-- content goes here -->


    <script>
        $(document).ready(function() {
            var user_id = <?= $_SESSION['user_id'] ?>;
            var username = '<?= $_SESSION['username'] ?>';
            $.ajax({
                url: "model/role_auth.php",
                type: "POST",
                data: {
                    action: "GET_USER_ROLES",
                    user_id: user_id,
                    username: username,
                },
                dataType: "json",
                success: function(result) {
                    $.each(result, function(key, values) {
                        console.log(values);
                        if (values.role_id) {
                            switch (values.name) {
                                case 'ITAdmin':
                                    console.log('im ITAdmin');
                                    break;
                                case 'Family':
                                    alert('im Family');
                                    break;
                                case 'Finance':
                                    alert('im Finance');
                                    break;
                                case 'FinalApprover':
                                    alert('im FinalApprover');
                                    break;
                                case 'ParentFamily':
                                    break;
                            }
                        }

                    });

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>

</body>

</html>