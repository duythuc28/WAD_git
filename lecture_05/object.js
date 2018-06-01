/*
	Using constructor function
	- Objects are formed by use the keyword "new"
	- allow construction of several similar objects
*/
var Car = function() {
	this.wheel = 4;
	this.start = function() {
		alert("Bropom");
	};
}

var mycar = new Car();
mycar.start();


/*
	Object constructor function
		- instantiate and then assign properties later
		- does not define data
*/

var newMember = new Member();
newMember.name = "Trump";
newMember.email = "trump.@gmail.com";
nemMember.present = function() {
	alert("here");
};

/*
	Object Literal the same as JSON
*/

var newObject = {
	name: "trump",
	email: "trump@bgmail.com",
	present: function() {alert("test");} 
};

/*
	Object prototype similar to type or class definition by other languages
*/

function Member(name, email) {
	this.name = name;
	this.email = email;
}

member.prototype.present = function () {
	alert("test");
}; // this method is shared for all member objects

var person = new Member("name", "email");
person.present();
