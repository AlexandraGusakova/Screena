function down()
{
  var a = document.getElementById('dropdown');
  if ( a.style.display == 'none' )
    a.style.display = 'block'
  else
    if ( a.style.display == 'block' )
    a.style.display = 'none';
};

function dow()
{
  var a = document.getElementById('dropdown1');
  if ( a.style.display == 'none' )
    a.style.display = 'block'
  else
    if ( a.style.display == 'block' )
    a.style.display = 'none';
};

function hide_cities()
{
      var darkLayer = document.createElement('div'); // ���� ����������
      darkLayer.id = 'shadow'; // id ����� ���������� �����
     document.body.appendChild(darkLayer); // �������� ����������

      var cities_body = document.getElementById('cities_body'); // ������� ���� "����"
     cities_body.style.display = 'block'; // "��������" ���

     darkLayer.onclick = function () {  // ��� ����� �� ���� ���������� ��� ��������
        darkLayer.parentNode.removeChild(darkLayer); // ������� ����������
        cities_body.style.display = 'none'; // ������ ���� ���������
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