$(document).ready(function(){
$('#loginForma form').hide();
  $('#loginForma a').toggle(function() {
    $(this)
      .addClass('active')
      .next('form')
      .animate({'height':'show'}, {
        duration:'slow',
        easing: 'easeOutBounce'
      });
  }, function() {
    $(this)
      .removeClass('active')
      .next('form')
      .slideUp();
  });
  $('#loginForma form :submit').click(function() {
    $(this)
      .parent()
      .prev('a')
      .click();
  });
});
