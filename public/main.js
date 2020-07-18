window.addEventListener('load', () => {
	createForm();
	ajaxRequest('post', 'http://localhost/factoryww/scheduling/display');
});
function createForm(){
	var td = document.querySelectorAll('.td');
	var frm = document.querySelectorAll('.form');
	let exit = document.querySelectorAll('.exit');
	let num = document.querySelectorAll('.num');

	for (let i = 0; i < td.length; i++) {
		td[i].addEventListener('click', (e) => {
			var trg = e.target;
			var number = parseInt(num[i].innerText);

			sessionStorage.setItem("day", number);
			
			var c = td[i].childNodes[1];
			console.log();

			if (trg.matches('.td')) {
				c.classList.add('show');
				exit[i].classList.add('btns');
			} else{
				if (trg.matches('.exit')) {
					c.classList.remove('show');
					exit[i].classList.remove('btns');
				}
			}
			
		});
	}
}
function ajaxRequest(method, url){
	var xhr = new XMLHttpRequest();
	console.log(xhr);
	xhr.open(method, url);
	xhr.onreadystatechange = () =>{
		if (xhr.readyState === 4 && xhr.status === 200) {
			if (!(xhr.responseText) == '') {
				var response = JSON.parse(xhr.responseText);
				showResult(response);
				// console.log(response);
			}
		}
	}
	xhr.send();
};
function showResult(data){
	// console.log(data.content, data.day);
	var td = document.querySelectorAll('.td');
	console.log(td);
	for (let i = 0; i < td.length; i++) {
		// console.log(td[i].firstChild.innerText);
		let n = td[i].firstChild.innerText;

		if (parseInt(n) == data.day) {
			// td[i].innerText = data.content;
			var iner = `
				<div class="options">
					<p class="content">"${data.content}"</p>
					<div class="additional">
						<a href="#edit" id="edit">Edit</a>
						<a href="http://localhost/factoryww/scheduling/delete/${data.day}">Delete</a>
					</div>
				</div>
			`;
			td[i].insertAdjacentHTML('afterbegin', iner);
		}
	}
}
function toggleClass(){
	var tc = document.querySelector('#edit');
	console.log(tc);
	tc.addEventListener('click', (e) => {
		e.preventDefault();
		console.log(resp);

	});
}