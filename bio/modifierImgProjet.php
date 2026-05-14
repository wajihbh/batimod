<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifier Image Projet</title>
</head>

<body>
    <center>
        <form enctype="multipart/form-data" action="saveModifImgProj.php?id=<?php echo $_GET['id']; ?>"  method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000">
            <input type="file" name="image" size="45"/><br />
            <input type="submit" value="Enregistrer" />
            <input type="reset" value="Fermer" />
        </form>
    </center>
</body>
</html>
