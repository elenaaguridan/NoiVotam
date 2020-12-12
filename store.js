let carts = document.querySelectorAll('.btn btn-primary');

let products= [
	{
		name: 'Democrația',
		price: 60,
		inCart: 0
	},
	{
		name: 'Calamități',
		price: 60,
		inCart: 0
	},
	{
		name: 'Plângere',
		price: 60,
		inCart: 0
	}
];

for(let i=0; i<carts.length; i++) {
	carts[i].addEventListener('click',() => {
		cartNumbers();
	})
}

function cartNumbers() {
	let productNumbers=localStorage.getItem('cartNumbers');
							  
productNumbers=parseInt(productNumbers);
	
	if(productNumbers) {
		localStorage.setItem('cartNumbers',productNumbers+1);
		document.querySelector('.cart span').textContent=productNumbers+1;
	}
	else {
		localStorage.setItem('cartNumbers',1);
	document.querySelector('.cart span').textContent=1;
	}
}