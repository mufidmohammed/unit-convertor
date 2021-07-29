function selectInput()
{
    var selectedBox = document.getElementById("source");
    var selectedValue = selectedBox.options[selectedBox.selectedIndex].value;
    
    var inputSelect = document.getElementById("inputSelect");

    if (selectedValue) {
    inputSelect.style.display = "inline-block";
    } else {
    inputSelect.style.display = "none";
    }
}

var input = document.getElementById('inputValues');
var calculate = document.getElementById("calculate");

if (parseInt(input.value) === null) { 
  calculate.disabled = true;
} else {
  calculate.disabled = false;
}
