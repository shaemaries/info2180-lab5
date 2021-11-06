"use strict"

window.onload = function(){
    var btn= document.getElementById("lookup");
    btn.addEventListener('click',getSearch);
	
}
    
function getSearch(event){
        event.preventDefault()
        var s_input= document.getElementById("country").value
        var params = { country: `${s_input}` }
        var urlParams = new URLSearchParams(Object.entries(params));
        
        fetch('./world.php?'+ urlParams)
        .then(response =>response.text())
        .then(data => document.getElementById('result').innerHTML = data)
        .catch(error => console.log(error))
 }
    
