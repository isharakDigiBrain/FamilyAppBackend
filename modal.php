<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

</head>

<body>
    <div id="modal-container">
        <div class="modal-background">
            <div class="modal">
                <h2>I'm a Modal</h2>
                <p>Hear me roar.</p>
                <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                    preserveAspectRatio="none">
                    <rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
                </svg>
            </div>
        </div>
    </div>
    <div class="content">
        <h1>Modal Animations</h1>
        <div class="buttons">
            <div id="one" class="button">Unfolding</div>
            <div id="two" class="button">Revealing</div>
            <div id="three" class="button">Uncovering</div>
            <div id="four" class="button">Blow Up</div><br>
            <div id="five" class="button">Meep Meep</div>
            <div id="six" class="button">Sketch</div>
            <div id="seven" class="button">Bond</div>
        </div>
    </div>


    <script>
        $('.button').click(function () {
            var buttonId = $(this).attr('id');
            $('#modal-container').removeAttr('class').addClass(buttonId);
            $('body').addClass('modal-active');
        })

        $('#modal-container').click(function () {
            $(this).addClass('out');
            $('body').removeClass('modal-active');
        });
    </script>
</body>

</html>