$(function(){
    $(document).ready(function(){
        $('.sidenav').sidenav();
      });
    $.getJSON("/auto/data/auto.php", function (data) {debugger;
        newAuto(data); 
    });
});

function newAuto (data) {
    var mtpl = $('#myTemplate').html();
    var html = Mustache.render(mtpl, data);
    $('tbody').append(html);

    $('.modal').modal(); 

    $('.edit').click(function (e) { 
        e.preventDefault();
        var id = $(this).parent().attr('data-id');
        $('.modal').modal();
        $('#modat_titel').html('Auto editieren von ' + id);
        $('#modat_inhalt').load('/auto/sites/formular.html');
        var mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });

    $('.tanken').click(function (e) { 
        e.preventDefault();
        const tank = $($(this).parents()[1]).children(".tank");
        tank.html(1+parseInt(tank.html()));
    });

    $('.delete').click(function (e) { 
        e.preventDefault();
        var id = $(this).parent().attr('data-id');
    });

    $('.new').click(function (e) { 
        e.preventDefault();
        $('#modat_titel').html('Auto hinzufügen');
        $('#modat_inhalt').load('/auto/sites/formular.html');
        var mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });
};