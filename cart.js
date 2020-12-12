//show cart

(function () {
const menu-bar=document.getElementById("menu-bar");
const cart=document.getElementById("cart");
	
menu-bar.addEventListener("click", function(){
cart.classList.toggle("show-cart");	
});
 })();

//add items to the cart
(function(){

	const cartBtn=document.querySelectorAll(".btn btn-primay");
	
	cartBtn.forEach(function(btn) {
		btn.addEventListener("click",function(event) {
			
	if(event.target.parentElement.classList.contains("btn btn-primary")) {
		let fullPath = event.target.parentElement.previousSibling.src;
				
			}
			
		});
		
	});
	
	
	
	
})();