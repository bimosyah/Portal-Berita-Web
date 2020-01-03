<?php  

    $title = $_POST['title'];
    $image = $_POST['image'];
    $upload_path = "upload/$title.jpg";

    if (file_put_contents($upload_path,base64_decode($image))) {
        $data['response'] = "Image upload successfully....";
        echo json_encode($data);    
    }else {
        $data['response'] = "Image upload successfully....";
        echo json_encode(array('response' => "Image upload failed...."));    
    }
?>