$(function(){
    $.getJSON("/auto/data/auto.json", function (data) {
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
                var id = $(this).parent().attr('data-id');
                $('.modal').modal();
                $('#modat_titel').html('Auto tanken von ' + id);
                $('#modat_inhalt').load('/auto/sites/formular.html');
                var mymodal = M.Modal.getInstance($('.modal'));
                mymodal.open();
            });

            $('.delete').click(function (e) { 
                e.preventDefault();
                var id = $(this).parent().attr('data-id');
                $('.modal').modal();
                $('#modat_titel').html('Auto löschen von ' + id);
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
        }
    );

});