
$('select').formSelect();
$('#bestaetigen').click(function () {
    
    var name = $('#name').val();
    var kraftstoff = document.querySelector('input[name="kraftstoff"]:checked').value;
    var farbe = $('#farbe').val();
    var bauart = $('#bauart').val();
    var id = "0";

    switch (kraftstoff) {
        case 'b':
            kraftstoff ="Benzin"
        break;
        case 'd':
            kraftstoff = "Diesel"
        break;
        case 'e':
            kraftstoff = "Elektro"
        break;
        case 'w':
            kraftstoff = "Wasserstoff"
        break;
        };
    var json = {
                    "auto": [
                                { 
                                    "ID":id, 
                                    "Name": name, 
                                    "Kraftstoff": kraftstoff,
                                    "Farbe": farbe, 
                                    "Bauart": bauart, 
                                    "Tank": "0" 
                                }
                            ]
                };debugger
    newAuto(json);
});