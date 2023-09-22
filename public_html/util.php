<?php
    // Init session
    session_start();

    function isLogged(){
        // Check session
        return (isset($_SESSION) && isset($_SESSION['dir_path']) && !empty($_SESSION['dir_path']) && file_exists($_SESSION['dir_path']));
    }

    function upload($files){
        // Init var
        $success = 0;
        $message = "Please upload a file";

	if(isset($files['fileUpload']['tmp_name']) && !empty($files['fileUpload']['tmp_name'])) {

	        // Get file info
        	$file_ext_allowed = array('sh','jpg','txt','');
        	$file_ext = pathinfo($files['fileUpload']['name'])['extension'];
        	$file_name = $files['fileUpload']['name'];
        	$file_tmp = $files['fileUpload']['tmp_name'];
		$file_size = $files['fileUpload']['size'];

        	// Check File
		if($file_size<=256000) {
        		if(in_array($file_ext,$file_ext_allowed)){
            			$final_path= $_SESSION['dir_path'].$file_name;
            			$upload = move_uploaded_file($file_tmp, $final_path);
            			if($upload) {
            				chmod($final_path, 0777);
                			$success = 1;
                			$message = "File uploaded";
            			} else {
					$message = "Internal error while uploading. This is not normal. Please contact a Webctf admin. :(";
				}
        		} else {
            			$message = "File extension is invalid. Extensions allowed: sh,jpg,txt,''.";
        		}
		} else {
			$message = "File is too big: max size is 256KB";
		}

	}

        return array(
            'success' => $success,
            'message' => $message
        );
    }

    function createWorkspace(){
        // Create folder
        $random_name = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10);
        $dir_path = "upload/users/$random_name/";
	umask(0);
        mkdir($dir_path,0777);

        // Put dir path in the session
        $_SESSION['dir_path'] = $dir_path;
    }
?>
