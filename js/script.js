
function validateFirstName(field){
    if(field == "") return "Не введено имя. \n"
    return "";
}
function validateSecondName(field){
    if(field == "") return "Не введена фамилия. \n"
    return "";
}
function validateEmail(field){
    if(field == "") return "Не введён адрес электронной почты.\n";
        else if(!((field.indexOf(".")>0) && 
                (field.indexOf("@")>0)) ||
                /[^a-zA-Z0-9.@_-]/.test(field))
        return "Электронный адрес имеет неверный формат. \n";
    return "";
}