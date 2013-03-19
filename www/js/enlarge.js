$(document).ready(function() {
  var src = window.location.hash.substr(1),
  ext = src.substr(-3),
  valid = ['gif', 'jpg', 'png'];
  if ($.inArray(ext, valid) !== false) {
    var $img = $('<img/>').attr('src', 'img/'+src);
    $('#image').html($img);    
  }
  $('#close').click(function(e){
    e.preventDefault();
    window.history.back();
  });
});