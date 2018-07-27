function down_cinema()
{
  var a = document.getElementById('ul_cinema');
  if ( a.style.display == 'none' )
    a.style.display = 'block'
  else
    if ( a.style.display == 'block' )
    a.style.display = 'none';
};

function down_genre()
{
  var a = document.getElementById('ul_genre');
  if ( a.style.display == 'none' )
    a.style.display = 'block'
  else
    if ( a.style.display == 'block' )
    a.style.display = 'none';
};

function down_genre_mob()
{
  var a = document.getElementById('ul_genre_mob');
  if ( a.style.display == 'none' )
    a.style.display = 'block'
  else
    if ( a.style.display == 'block' )
    a.style.display = 'none';
};

function down_cinema_mob()
{
  var a = document.getElementById('ul_cinema_mob');
  if ( a.style.display == 'none' )
    a.style.display = 'block'
  else
    if ( a.style.display == 'block' )
    a.style.display = 'none';
};

function hide_cities()
{
      var darkLayer = document.createElement('div'); // слой затемнения
      darkLayer.id = 'shadow'; // id чтобы подхватить стиль
     document.body.appendChild(darkLayer); // включаем затемнение

      var cities_body = document.getElementById('cities_body'); // находим наше "окно"
     cities_body.style.display = 'block'; // "включаем" его

     darkLayer.onclick = function () {  // при клике на слой затемнения все исчезнет
        darkLayer.parentNode.removeChild(darkLayer); // удаляем затемнение
        cities_body.style.display = 'none'; // делаем окно невидимым
        return false;
    };
};

function hide_login()
{
    var darkLayer = document.createElement('div');
    darkLayer.id = 'shadow';
    document.body.appendChild(darkLayer);

    var container_login = document.getElementById('container_login');
    container_login.style.display = 'block';

    darkLayer.onclick = function () {
        darkLayer.parentNode.removeChild(darkLayer);
        container_login.style.display = 'none';
        return false;
    };

};

function hide_checkin()
{
    var darkLayer = document.createElement('div');
    darkLayer.id = 'shadow';
    document.body.appendChild(darkLayer);

    var container_checkin = document.getElementById('container_checkin');
    container_checkin.style.display = 'block';

    darkLayer.onclick = function () {
        darkLayer.parentNode.removeChild(darkLayer);
        container_checkin.style.display = 'none';
        return false;
    };
};
