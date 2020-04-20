
function init() {
    setParamsToInput()
}

function setParamsToInput(){
    const params=getUrlVars() 
    const hiddenInput = document.getElementById("hiddenInput");
    hiddenInput.value=params.join(' ')
}

function onInputType(event) {
    const textInput = document.getElementById("text");
    textInput.innerHTML = event.target.value;
}

function onSubmit(event) {
    event.preventDefault()
    const input = document.getElementById("input");
    const hiddenInput=document.getElementById("hiddenInput")
    const textAfterSubmit = document.getElementById("textAfterSubmit");
    textAfterSubmit.innerHTML = input.value+' '+ hiddenInput.value
    input.value=''
}

function getUrlVars() {
    const params = {};
    const paramsToReturn = []
    window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        params[key] = value;
    });
    for (let param in params) {
        paramsToReturn.push(params[param]+'')
    }
    return paramsToReturn;
}