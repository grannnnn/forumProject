
/*******************************************************************/
//показывать или прятать форму регистрации
function showRegisterBox(){
  if ($('#registerBox').css('display') != 'block') {
    $('#registerBox').show();
    $('#autorizeBox').hide();
  }
  else {
    $('#registerBox').hide();
    $('#autorizeBox').show();
  }
}
