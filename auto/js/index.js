$(function(){
    $(document).ready(function(){
        $('.sidenav').sidenav();
      });
    $.getJSON("/auto/data/auto.php", function (data) {
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
        const id = $(this).parent().attr('data-id');
        const name = $(this).parent().attr('data-Name');
        const farbe = $(this).parent().attr('data-Farbe');
        const bauart = $(this).parent().attr('data-Bauart');
        let kraftstoff = $(this).parent().attr('data-Kraftstoff');
        if(kraftstoff=='Benzin') kraftstoff ='b';
        if(kraftstoff=='Diesel') kraftstoff ='d';
        if(kraftstoff=='Elektro') kraftstoff ='e';
        if(kraftstoff=='Wasserstoff') kraftstoff ='w';
        $("form").attr('action', "/auto/sites/index.php?action=edit&id="+id);
        $('.modal').modal();
        $('#modat_titel').html('Auto editieren von ' + id);
        $('#modat_inhalt').load('/auto/sites/formular.html', () => {
            $('#name').val(name);
            $('#farbe').val(farbe);
            $('#bauart').val(bauart);
            $("input:radio").each(function () {
                if ($(this).val() == kraftstoff) {
                    $(this).attr('checked', 'checked');
                }
            });
            M.updateTextFields();
        });
        const mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });

    $('.tanken').click(function (e) { 
        e.preventDefault();
        var id = $(this).parent().attr('data-id');
        $("form").attr('action', "/auto/sites/index.php?action=tanken&id="+id);
        const tank = $($(this).parents()[1]).children(".tank");
        tank.html(1+parseInt(tank.html()));
    });

    $('.delete').click(function (e) { 
        e.preventDefault();
        var id = $(this).parent().attr('data-id');
        $("form").attr('action', "/auto/sites/index.php?action=delet&id="+id);
    });

    $('.new').click(function (e) { 
        e.preventDefault();
        $('#modat_titel').html('Auto hinzufügen');
        $('#modat_inhalt').load('/auto/sites/formular.html');
        var mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });
};