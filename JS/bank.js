//For Navlink Active Status
let list = document.querySelectorAll('.nav-link');
list.forEach(a=>{
	a.addEventListener('click',function(){
		list.forEach(a=>a.classList.remove('active'));
		this.classList.add('active');
	});
});