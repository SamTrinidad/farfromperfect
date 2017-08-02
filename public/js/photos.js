[].forEach.call( $('img[data-src]'), function(img) {
  img.setAttribute('src', img.getAttribute('data-src'));
  img.onload = function() {
    img.removeAttribute('data-src');
  };
});

// $("img").one("load", function() {
//   // do stuff
// }).each(function() {
//     console.log(this);
//   if(this.complete) $(this).load();
// });
