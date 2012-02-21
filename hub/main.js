var imagesDir = "images/";
var imageNames = [
  "tortillasoup.jpg",
  "potpiestew.jpg",
  "blackbeanchili.jpg",
  "orange.jpg",
  "chickpeapiccata.jpg",
  "friedrice.jpg",
  "lentilsoup.jpg",
  "nicoisesalad.jpg"
];

var paused = false;
var currentImage = 0;

var loadImage = function() {
  console.log("Loading " + currentImage);
  $("#imageArea").fadeOut('slow', function() {
    $("#imageArea").html("<img src=\"" + imagesDir + imageNames[currentImage] + "\">");
    $("#imageArea").fadeIn('slow', function() {
      currentImage = (currentImage+1)%imageNames.length;
      if (!paused) {
        loadImage(currentImage);
      }
    });
  });
}

var togglePause = function() {
  paused = !paused;
  if (!paused) {
    $(this).html("Pause");
    loadImage(0);
  } else {
    $(this).html("Resume");
  }
}

$(document).ready(function() {
  $("#pauseButton").click(togglePause);
  loadImage(0);
});