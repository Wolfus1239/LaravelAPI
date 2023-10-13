<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<div>
    {{ $albums->links() }}
</div>
{{ 'Всего альбомов: '.$count_albums }}
<br>
{{ 'Всего альбомов на странице: '.count($albums) }}
    <?php
    foreach ($albums as $albumsALL){
        if(!isset($albumsALL->total_duration->seconds))
        {
            $seconds = 0;
        }else{
            $seconds = $albumsALL->total_duration->seconds;
        }
        if(!isset($albumsALL->total_duration->minutes))
        {
            $minutes = 0;
        }else{
            $minutes = $albumsALL->total_duration->minutes;
        }
        ?>
    <div class="flex">
    <div class="album">
        <p><a href="/albums/track_in_album/<?= $albumsALL->api_id; ?>"><img src="<?= $albumsALL->cover; ?>"></a></p>
        <p>id: <?= $albumsALL->id; ?><p>
        <p>Количество треков в альбоме: <?= $albumsALL->total_count; ?><p>
        <p>Вес альбома: <?= $albumsALL->total_size; ?><p>
        <p>Описание: <?= $albumsALL->description; ?><p>
        <p>Последняя дата обновления: <?= $albumsALL->date_updated; ?><p>
        <p>Длительность альбома: <?= $minutes; ?>:<?= $seconds; ?><p>
        <br>
    </div>
    </div>
    <?php
        }
        ?>
    <div class="pagination">
        {{ $albums->links('pagination::bootstrap-4') }}
    </div>

</body>
</html>

