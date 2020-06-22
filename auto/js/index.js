/* console.log('JS eingebunden');
console.warn('Warnung: test');
console.error('Error: error'); */

 function MeineFunktion(MeineVariable){
    console.log('Funktion: ' + MeineVariable);
    //window.alert('Gelogt');
} 

/*for (var i = 0; i < 10; i++){
    console.log('Schleife: ' + i);
} */

$(function () {
    //jQuery-Code
   // console.log('ready')
    $('.btn').click(function (e) { 
        e.preventDefault();
       // console.log('test')
      //  $('.btn').html('test------ja')
        $('.formular').load('/auto/sites/formular.html', function(){
            $.getScript('/auto/js/formular.js')           
        })
    });
});

/* function test() { 

}; */