<?php
$filename = "data.txt";
$continue = true;
$content = "";
$hash = "";
$errors = array();
$cwd = getcwd();
$cwdParts = explode("/",$cwd);
$username = $cwdParts[2];

if (!file_exists($filename)) {
    $continue = false;
    $errors[] = "Het bestand ".$filename." bestaat niet";
}
if ($continue) {
    $content = file_get_contents($filename);
    $content = rtrim($content);
    if ($content == "") {
        $continue = false;
        $errors[] = "Het bestand ".$filename." bestaat maar het is leeg. Vul je gebruikersnaam in";
    } else {
        $hash = md5(strtolower($content));
    }
    if ($content != $username) {
        $errors[] = "Het bestand ".$filename." bestaat maar je hebt niet de juiste gebruikersnaam ingevuld";
    }
}

?>
<html>
<head>
    <style>
        .error { color: red; font-weight: bold;}
        .cwd { display:none;}
    </style>
</head>
<body>
    <?php if (count($errors) > 0) :?>
        <h1>Er liep iets fout</h1>
        <?php foreach ($errors as $error) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endforeach; ?>
        <p>klik <a href="index.html">hier</a> om opnieuw te proberen.</p>
    <?php else: ?>
        <h1>Proficiat <?php echo $content; ?></h1>
        <p>Dit is je hash code: <?php echo $hash; ?></p>
        <p>klik <a href="http://bart.go-ao.be/5info_taak/index.php">hier</a> om je hash code in te voeren en de opdracht af te ronden.</p>
    <?php endif; ?>
    <p class="cwd">cwd: <?php echo $username?></p>
</body>
</html>