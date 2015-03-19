<?php
$url = 'http://www.worldweatheronline.com/feed/weather.ashx?q=schruns,austria&format=json&num_of_days=5&key=8f2d1ea151085304102710%22';
$content = file_get_contents($url);
$json = json_decode($content, true);
?>


<object width="300" height="50"><param name="movie" value="http://freemusicarchive.org/swf/trackplayer.swf"/>
<param name="flashvars" value="track=http://freemusicarchive.org/services/playlists/embed/track/108267.xml"/>
<param name="allowscriptaccess" value="sameDomain"/>
<embed type="application/x-shockwave-flash" src="http://freemusicarchive.org/swf/trackplayer.swf" width="300" height="50" flashvars="track=http://freemusicarchive.org/services/playlists/embed/track/108267.xml" allowscriptaccess="sameDomain" />
</object>