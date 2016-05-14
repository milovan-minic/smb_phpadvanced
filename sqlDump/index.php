<!DOCTYPE html>
<html>
<head>
    <title>Eksport</title>
</head>

<body>
<form name="eksport" action="exportToScript.php" method="post">
    Tabela: <select name="tabela">
        <option value="1">K</option>
        <option value="2">I</option>
        <option value="3">P</option>
    </select><br />
    <input type="submit" name="submit" value="Export">
</form>
</body>
</html>