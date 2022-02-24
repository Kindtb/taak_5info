<?php
$filename = "data.txt";
$continue = true;
$hash = "";
$errors = array();

if (!file_exists($filename)) {
    $continue = false;
    $errors[] = "Het bestand ".$filename." bestaat niet";
}
if ($continue) {
    $content = file_get_contents($filename);
    if ($content == "") {
        $continue = false;
        $errors[] = "Het bestand ".$filename." bestaat maar het is leeg. Vul je voornaam in";
    } else {
        $hash = md5(strtolower($content));
    }
}

?>
<html>
<head>

</head>
<body>
    <?php if (count($errors) > 0) :?>
        <h1>Er liep iets fout</h1>
        <?php foreach ($errors as $error) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <h1>Proficiat</h1>
        <p>Dit is je hash code: <?php echo $hash; ?></p>
    <?php endif; ?>
    <p>klik <a href="index.html">hier</a> om terug te keren.
</body>
</html>