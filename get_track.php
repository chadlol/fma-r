<?php

$id = rand(0, 19);
$url = "http://freemusicarchive.org/api/get/tracks.json?api_key=7Y2HJLL7FFMODARC";
$content = file_get_contents($url);
$json = json_decode($content, true);

$totalPages = $json['total_pages'];

$url = "http://freemusicarchive.org/api/get/tracks.json?api_key=7Y2HJLL7FFMODARC&page=" . rand(0, $totalPages);
$content = file_get_contents($url);
$json = json_decode($content, true);

$track_id = $json['dataset'][$id]['track_id'];
$track_mp3 = 'http://freemusicarchive.org/file/' . $json['dataset'][$id]['track_file'];

$song = array(
    'track_id' => $json['dataset'][$id]['track_id'],
    'track_title' => $json['dataset'][$id]['track_title'],
    'track_url' => $json['dataset'][$id]['track_url'],
    'track_image_file' => $json['dataset'][$id]['track_image_file'],
    'artist_id' => $json['dataset'][$id]['artist_id'],
    'artist_name' => $json['dataset'][$id]['artist_name'],
    'artist_url' => $json['dataset'][$id]['artist_url'],
    'artist_website' => $json['dataset'][$id]['artist_website'],
    'album_id' => $json['dataset'][$id]['album_id'],
    'album_title' => $json['dataset'][$id]['album_title'],
    'album_url' => $json['dataset'][$id]['album_url'],
    'license_title' => $json['dataset'][$id]['license_title'],
    'track_duration' => $json['dataset'][$id]['track_duration'],
    'track_number' => $json['dataset'][$id]['track_number'],
    'track_instrumental' => $json['dataset'][$id]['track_instrumental'],
    'track_file' => $json['dataset'][$id]['track_file'],
    'player' => "<object width='300' height='50'><param name='movie' value='http://freemusicarchive.org/swf/trackplayer.swf'/>
                                <param name='flashvars' value='track=http://freemusicarchive.org/services/playlists/embed/track/$track_id.xml'/>
                                <param name='allowscriptaccess' value='sameDomain'/>
                                <embed type='application/x-shockwave-flash' src='http://freemusicarchive.org/swf/trackplayer.swf' width='300' height='50' flashvars='track=http://freemusicarchive.org/services/playlists/embed/track/$track_id.xml' allowscriptaccess='sameDomain' />
                            </object>",
    'playerHTML' => "<audio controls autoplay><source src='$track_mp3' type='audio/mpeg'></audio>"
);


//$player = <<<EOD
//    <div id='track_art'>
//        <img src='$track_art' alt='$artist_name'/>
//    </div>
//    <object width='300' height='50'><param name='movie' value='http://freemusicarchive.org/swf/trackplayer.swf'/>
//        <param name='flashvars' value='track=http://freemusicarchive.org/services/playlists/embed/track/$track_id.xml'/>
//        <param name='allowscriptaccess' value='sameDomain'/>
//        <embed type='application/x-shockwave-flash' src='http://freemusicarchive.org/swf/trackplayer.swf' width='300' height='50' flashvars='track=http://freemusicarchive.org/services/playlists/embed/track/$track_id.xml' allowscriptaccess='sameDomain' />
//    </object>
//EOD;

echo json_encode($song);
?>