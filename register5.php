 <?php
    require_once "db.php";
    require_once "validate_session.php";

    if(isset($_POST['submit'])){
      if(isset($_FILES['file1'])){
        $file_type=strtolower(pathinfo($_FILES['file1']['name'],PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['file1']['tmp_name'],('./docs/'.$user_id.'_aadhar_card.'.$file_type));
      }
    
      if(isset($_FILES['file2'])){
        $file_type=strtolower(pathinfo($_FILES['file2']['name'],PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['file2']['tmp_name'],('./docs/'.$user_id.'_10th.'.$file_type));
      }

      if(isset($_FILES['file3'])){
        $file_type=strtolower(pathinfo($_FILES['file3']['name'],PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['file3']['tmp_name'],('./docs/'.$user_id.'_12th.'.$file_type));
      }

      if(isset($_FILES['file4'])){
        $file_type=strtolower(pathinfo($_FILES['file4']['name'],PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['file4']['tmp_name'],('./docs/'.$user_id.'_ug.'.$file_type));
      }

      if(isset($_FILES['file5'])){
        $file_type=strtolower(pathinfo($_FILES['file5']['name'],PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['file5']['tmp_name'],('./docs/'.$user_id.'_pg.'.$file_type));
      }

      if(isset($_FILES['file6'])){
        $file_type=strtolower(pathinfo($_FILES['file6']['name'],PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['file6']['tmp_name'],('./docs/'.$user_id.'_UAN.'.$file_type));
      }

      if(isset($_FILES['file7'])){
        $file_type=strtolower(pathinfo($_FILES['file7']['name'],PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['file7']['tmp_name'],('./docs/'.$user_id.'_PAN.'.$file_type));
      }
      
      // session_unset();
      // session_destroy();
    }
?>