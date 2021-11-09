"use strict"

window.onload = function(){
    var btn1= document.getElementById("lookup-country");
    btn1.addEventListener('click',getCountry);

    var btn2= document.getElementById("lookup-city");
    btn2.addEventListener('click',getCity);
}
    
function getCountry(event){
        event.preventDefault()
        var s_input= document.getElementById("country").value
        var params = { country: `${s_input}` }
        var urlParams = new URLSearchParams(Object.entries(params));
        
        fetch('./world.php?'+ urlParams)
        .then(response =>response.text())
        .then(data => document.getElementById('result').innerHTML = data)
        .catch(error => console.log(error))
 }

 function getCity(event){
    event.preventDefault()
    var s_input= document.getElementById("country").value
    var params = { country: `${s_input}`, context: 'cities'}
    var urlParams = new URLSearchParams(Object.entries(params));
    
    fetch('./world.php?'+ urlParams)
    .then(response =>response.text())
    .then(data => document.getElementById('result').innerHTML = data)
    .catch(error => console.log(error))
}

    
