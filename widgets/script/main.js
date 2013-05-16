// main.js - put your code here

function testResults (form) {
    var name = form.name.value;
    var session = form.session.value;
    var answer = form.answer.value;
    
    touch(name, session, answer);
}

function touch(name, session, answer) {
	 $.ajax({
		  url: 'http://109.74.200.115/Omelette/properties/' + name + '.' + session + '/' + answer + '/',
		  dataType: 'html',
		  data: {},
		  success: function(data, textStatus) {
			   console.log(data);
		  },
		  jsonpCallback: 'foo'
		});
   }
