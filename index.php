<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Video.js Playlist UI - Default Implementation</title>
  <link href="//vjs.zencdn.net/5.11/video-js.min.css" rel="stylesheet">
  <link href="./style/videojs-playlist-ui.vertical.css" rel="stylesheet">
  <link href="./style/style.css" rel="stylesheet">
  <link href="./style/layout.css" rel="stylesheet">
</head>
<body>
    <div class="video-wrapper video">
    <video
      id="video"
      class="video-js vjs-default-skin vjs-has-started vjs-16-9 vjs-big-play-centered"
      height="300"
      width="600"
      data-setup='{"fluid": true}'
      controls>
    </video>
    </div>

    <div class="vjs-playlist playlist">
      <!--
        The contents of this element will be filled based on the
        currently loaded playlist
      -->
    </div>
  <script src="./js/video.js"></script>
  <script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
  <script src="./js/videojs-playlist.js"></script>
  <script src="./js/videojs-playlist-ui.js"></script>
  <script>
    var player = videojs('video');
    player.playlist([
      <?php include("./code.php");
	    getFiles();?>
    ]);
    // Initialize the playlist-ui plugin with no option (i.e. the defaults).
    player.playlistUi();
    player.ready(function() {
      this.hotkeys({
        volumeStep: 0.1,
        seekStep: 5,
        enableModifiersForNumbers: false
      });
    });
  </script>
  <script src="./js/script.js"></script>
</body>
</html>
