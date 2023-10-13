<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    foreach ($id_track as $track){

        echo 'Исполнитель: '.$track->artist.'<br>';
        echo 'Название: '.$track->name.'<br>';
        echo 'Длительность трека: '.$track->duration.'<br>';
        echo 'Вес трэка: '.$track->size.'<br>';
        echo 'Тэги: '.$track->tags.'<br>';
        echo 'Жанры: '.$track->genres.'<br>';
        echo 'BPM: '.$track->bpm.'<br>';
        echo 'Файл: ';
        ?>
        <p><a href="<?= $track->file; ?>"><img src="<?= $track->cover; ?>"></a></p>
    <?php
        echo '<br><br><br><br><br>';
    }
    ?>
</body>
</html>
