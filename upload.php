<pre>

<?php $userInfo["profile"]?>

</pre>

<?php
$uploads_dir = './uploads';


        $tmp_name = $_FILES["pictures"]["tmp_name"];

        $name = basename($_FILES["pictures"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    

?>