<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifier</title>
</head>

<body>
    <center>
        <form  action="saveModifImgGal.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="23209715200">
            <input type="file" name="repImg" size="45"/><br />
            <input type="submit" value="Enregistrer" />
            <input type="reset" value="Fermer" />
        </form>
    </center>
</body>
</html>
