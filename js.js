jQuery(document).ready(function () {
  var date = new Date(); // Создаём переменную типа Date()
  var weekdays = ["7", "1", "2", "3", "4", "5", "6"]; // Создаём массив дней
  var weekday = weekdays[date.getDay()]; //Получаем номер текущего день
  jQuery('.grafik-test div[data-day="' + weekday + '"]').addClass('today'); //Добавляем класс 
});


$(window).on("scroll", function () {
  $("div.navbar").toggleClass("dark", $(this).scrollTop() > $(window).height() - 100);
});