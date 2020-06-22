$(function(){
    $('.modal').modal();  


    $('.edit').click(function (e) { 
        e.preventDefault();
        $('#modat_titel').html('Auto editieren von');
        $('#modat_inhalt').load('/auto/sites/formular.html');
        var mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });

    $('.tanken').click(function (e) { 
        e.preventDefault();
        $('#modat_titel').html('Auto tanken von');
        $('#modat_inhalt').load('/auto/sites/formular.html');
        var mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });

    $('.delete').click(function (e) { 
        e.preventDefault();
        $('#modat_titel').html('Auto löschen von');
        $('#modat_inhalt').load('/auto/sites/formular.html');
        var mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });

    $('.new').click(function (e) { 
        e.preventDefault();
        $('#modat_titel').html('Auto hinzufügen');
        $('#modat_inhalt').load('/auto/sites/formular.html');
        var mymodal = M.Modal.getInstance($('.modal'));
        mymodal.open();
    });

});