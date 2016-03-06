<html>
<head>
	<title>The Wall</title>
</head>
<body>

<?php echo form_open_multipart('processes/do_upload'); ?>
<input type="file" name="userfile">
<input type="hidden" name="profile_id" value="<?php echo $profile_id ?>">

<br><br>
<input type="submit" value="upload">
</form>

</body>
</html>