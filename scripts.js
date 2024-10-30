$(document).ready(function () {
    $('button').hover(function () {
      $(this).animate({ opacity: 0.7 }, 300);
    }, function () {
      $(this).animate({ opacity: 1 }, 300);
    });
  
    $('nav a').hover(function () {
      $(this).animate({ paddingLeft: '20px' }, 200);
    }, function () {
      $(this).animate({ paddingLeft: '10px' }, 200);
    });
  });
  