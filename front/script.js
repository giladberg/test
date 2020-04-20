
function init() {
    setParamToInput()
}

function setParamToInput(){
    const url = new URL(window.location.href);
    const param = url.searchParams.get("param");
    document.getElementById('input').value =param;
}

function onInputType(event){
   const input= document.getElementById("input");
   const intextput= document.getElementById("text");
   input.style.color = "black";
    intextput.innerHTML=event.target.value;
}

function onSubmit(){
    const input= document.getElementById("input");
    const submitetText= document.getElementById("submitetText");
    submitetText.innerHTML=input.value
}