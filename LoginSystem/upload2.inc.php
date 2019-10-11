<?php

    if(isset($_POST['submit_image'])) {

    $new_image = $_FILES['new_image']['name'];
    $new_image_temp = $_FILES['new_image']['tmp_name'];

    move_uploaded_file($new_image_temp, "uploads/");    

    }

?>
