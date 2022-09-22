<!--ADMIN-->
<!--Allows the editing of the feature information presented on-->
<!--the homepage.-->

<!--PUBLIC-->
<!--Basic information about the childcare premise plus 2 feature-->
<!--boxes. A feature box should highlight new activities, events,-->
<!--special offers etc. Each feature should contain a title, detail,-->
<!--an image and an optional link to another page in the website-->
<!--(for more information).-->

<?php
// Turn off all error reporting
require('mysql_connect.php');
error_reporting(0);
$msg="";

if (isset($_POST['update'])) {
    $text = $_POST['text'];
    $id = $_POST['id'];
    $image_name = time().'_'.$_FILES['image']['name'];
    $target = 'images/uploads/'.$image_name;
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $query="UPDATE feature_box SET feature_text= '$text',feature_img='$image_name' WHERE id='$id'";
        $result = @mysqli_query($db_connection, $query);
        if($result){
            $msg="Feature box updated!";
        }
        else{
            $msg="Failed to upload to feature box.";
        }
    }
}
?>
<div class="container">
    <div class="row justify-content-center" >
        <div class='card' style='width: 70rem; margin: 1rem;'>
            <div class='card-body'>
                <form action='admin_dash.php' method='POST' enctype='multipart/form-data'>
                    <div class='form-group'>
                        <label for='image'>Select image to upload:</label>
                        <input type='file' name='image' required>
                    </div>
                    <div class='form-group'>
                        <label for='text'>Enter a text to upload:</label>
                        <input type='text' name='text' required>
                    </div>
                    <div class="form-group">
                        <label class="mr-sm-2" for="id">Select the box</label>
                        <select class="custom-select mr-sm-2" name="id" required>
                            <option value="">Select one option...</option>
                            <option value="1">Left</option>
                            <option value="2">Center</option>
                            <option value="3">Right</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <button type='submit' name='update' class='btn btn-secondary btn-block'>Send</button>
                    </div>
                    <p class="text-center"><?= $msg; ?></p>
                </form>
            </div>
        </div>
    </div>
</div>