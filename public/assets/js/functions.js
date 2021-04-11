function keyPress(){

    var inputIso2 = document.getElementById('iso2Example');
    inputIso2.value = inputIso2.value.toUpperCase(1);

    if (event.keyCode < 65 || event.keyCode > 122){
        event.returnValue = false;
    }

}
