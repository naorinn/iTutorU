<?php
class helpers{

	public static function imageUpload($fileInputName, $target_dir = 'images/', $max_upload_bytes = 5000000){

		$uploadOk = 1;
		if(isset($_FILES[$fileInputName])) {
			$theFile = $_FILES[$fileInputName];

			//Check if image file is a actual image or fake image
			//this is not a guarantee that malicious code may be passed in disguise
			$check = getimagesize($theFile["tmp_name"]);
			if($check == false) {
				return null;
			}
			$extension = strtolower(pathinfo(basename($theFile["name"]),PATHINFO_EXTENSION));
			//give a name to the file such that it should never collide with an existing file name.
			$target_file_name = uniqid().'.'.$extension;	
			$target_path = $target_dir . $target_file_name;
			//NOTE: that this file path probably should be saved to the database for later retrieval

			//You may limit the size of the incoming file... Check file size
			if ($theFile["size"] > $max_upload_bytes) {
				// "Sorry, your file is too large.";
				return null;
			}

			// Check if $uploadOk is set to 0 by an error
			if (!move_uploaded_file($theFile["tmp_name"], $target_path)) {
			//	echo "Sorry, there was an error uploading your file.";
				return null;
			}
			return $target_file_name;
		}
		return null;
	}

}


?>