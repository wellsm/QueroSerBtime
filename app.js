function onlyLetters(input){
    var length = input.value.length;
    var lastChar = input.value.charAt(length - 1);

    if(lastChar.search(/[^a-zA-Z ]+/) !== -1){
        input.value = input.value.substring(0, length - 1);
    }
}