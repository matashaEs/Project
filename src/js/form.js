import $ from 'jquery';

const selected = $ (".form-select--selected");
const optionsContainer = $ (".form-options-container");
const optionsList = $ (".option");

var objects = $ (".option");

for (var obj of objects) {
	console.log(obj);
}

selected.click( () => {
	optionsContainer.toggleClass("active");
});


for (var obj of objects) {
	obj.click( () => {
		//selected.innerHTML = obj.querySelector("label").innerHTML
		// optionsList.removeClass("active");
		console.log("lol" );
	});
}
