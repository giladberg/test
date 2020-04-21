
function init() {
    setParamsToInput()
}

function setParamsToInput(){
    const params=getUrlVars() 
    renderParamsAsHiddenInput(params)
}
function renderParamsAsHiddenInput(params){
    const elHiddenInputs = document.querySelector('.hiddenInputs')
    const strInputs=[]
    for (let param in params) {
        const input=`<input type="hidden" class="hiddenInput" value="${param}:${params[param]}"/>`
        strInputs.push(input)
    }
    elHiddenInputs.innerHTML = strInputs.join('');

}

function onInputType(event) {
    const textInput = document.getElementById("text");
    textInput.innerHTML = event.target.value;
}

function onSubmit(event) {
    event.preventDefault()
    const input = document.getElementById("input");
    const textAfterSubmit = document.getElementById("textAfterSubmit");
    const hiddenInputs = document.querySelectorAll(".hiddenInput");
    hiddenInputs.forEach(hiddenInput=> textAfterSubmit.innerHTML +=hiddenInput.value+' ')
    textAfterSubmit.innerHTML += input.value
    input.value=''
}

function getUrlVars() {
    const params = {};
    window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        params[key] = value;
    });
    return params;
}