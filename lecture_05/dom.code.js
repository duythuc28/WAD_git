
// HTML Dom code
function changeText() {
	var text = document.getElementById("text_field"); // get the element
	text.style.color = "red"; // set color
	text.innerHTML = "new text"; // set the new value to inner html
}

// Adding new element to existing page
function newNode() {
	// create a new p element to hold the paragraph text
	var newEl = document.createElement('p');
	// create a text node 
	var newTx = document.createTextNode('This is a new paragraph');
	// append new text node to the new p element
	newEl.appendChild(newTx);
	// get the current div which want to append
	var addDiv = document.getElementById('myDiv');
	// add p element to div
	addDiv.appendChild(newEl);
}

