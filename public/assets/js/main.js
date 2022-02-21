// $(window).load(function(){

//
// });

// $(document).ready(function () {
//   setTimeout(function () {
//     $(".loader").remove();
//   }, 2000);
// });
$(document).ready(function() {
  $('.carousel').carousel({
    pause: true,
    interval: false,
  });  
});

$(document).ready(function () {
  var video1 = document.getElementById("ban_video");
  video1.currentTime = 0;
  $(".mute-bt").click(function () {
    if ($(this).hasClass("stop")) {
      var ban_video = document.getElementById("ban_video");
      $("#ban_video").prop("muted", false);
      $(this).removeClass("stop");
    } else {
      var ban_video = document.getElementById("ban_video");
      $("#ban_video").prop("muted", true);
      $(this).addClass("stop");
    }
  });

  $(".play-bt").click(function () {
    $(".play-bt").hide();
    $(".pause-bt").show();
    var ban_video = document.getElementById("ban_video");
    if ($(".stop-bt").hasClass("active")) {
      ban_video.currentTime = 0;
    }
    ban_video.play();
  });
  $(".pause-bt").click(function () {
    $(".play-bt").show();
    $(".pause-bt").hide();
    $(".pause-bt").addClass("active");
    $(".stop-bt").removeClass("active");
    var ban_video = document.getElementById("ban_video");
    ban_video.pause();
  });
  $(".stop-bt").click(function () {
    $(".play-bt").show();
    $(".pause-bt").hide();
    $(".pause-bt").removeClass("active");
    $(".stop-bt").addClass("active");
    var ban_video = document.getElementById("ban_video");
    stop;
    ban_video.pause();
  });
});
