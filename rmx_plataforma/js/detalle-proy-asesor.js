// #region variables para la longitud de las tabs
var hidWidth;
var scrollBarWidths = 40;
// #endregion
var widthOfList = function () {
  var itemsWidth = 0;
  $('.list a').each(function () {
    var itemWidth = $(this).outerWidth();
    itemsWidth += itemWidth;
  });
  return itemsWidth;
};
// funcion del contenedor de las tabs
var widthOfHidden = function () {
  return (($('.wrapper-tabs').outerWidth()) - widthOfList() - getLeftPosi()) - scrollBarWidths;
};
// posicionar las tabs a la izquierda
var getLeftPosi = function () {
  return $('.list').position().left;
};
// reajustar las tabs a la izquierda al moverse por estas
var reAdjust = function () {
  if (($('.wrapper-tabs').outerWidth()) < widthOfList()) {
    $('.scroller-right').show().css('display', 'flex');
  } else {
    $('.scroller-right').hide();
  }
  if (getLeftPosi() < 0) {
    $('.scroller-left').show().css('display', 'flex');
  } else {
    $('.item').animate({
      left: "-=" + getLeftPosi() + "px"
    }, 'slow');
    $('.scroller-left').hide();
  }
}
reAdjust();
// falmar la funcion de ajuste 
$(window).on('resize', function (e) {
  reAdjust();
});
// icono para mover las tabs a la derecha
$('.scroller-right').click(function () {
  $('.scroller-left').fadeIn('slow');
  $('.scroller-right').fadeOut('slow');
  $('.list').animate({
    left: "+=" + widthOfHidden() + "px"
  }, 'slow', function () {
  });
});
// icono para mover las tabs a la isquierda
$('.scroller-left').click(function () {
  $('.scroller-right').fadeIn('slow');
  $('.scroller-left').fadeOut('slow');
  $('.list').animate({
    left: "-=" + getLeftPosi() + "px"
  }, 'slow', function () {
  });
});