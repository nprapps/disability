$(document).ready(function() {
  var imageHeight, wrapperHeight, overlap, container = $('#article-header');  

  function centerImage() {
    if (container.width() >= 480) {       
      imageHeight = container.find('img').height();
      wrapperHeight = container.height();
      overlap = (wrapperHeight - imageHeight) / 2;
      container.find('img').css('margin-top', overlap);
    }
    else {
      container.find('img').css('margin-top', 0);
    }
  }

  $(window).on("load resize", centerImage);

  var el = document.getElementById('article-header');
  if (el.addEventListener) {  
    el.addEventListener("webkitTransitionEnd", centerImage, false); // Webkit event
    el.addEventListener("transitionend", centerImage, false); // FF event
    el.addEventListener("oTransitionEnd", centerImage, false); // Opera event
  }
  
  $(".video-wrapper").fitVids();
  

});
