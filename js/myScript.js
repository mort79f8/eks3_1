$(document).ready(function(){
	$(".login").hide();
	$(".loginBtn").on("click", function(e){
		
		$(".login").slideToggle();
	});
});

// filters
// lavet i samarbejde med tvillingerne.
let articles = document.querySelectorAll('article');
let categories = document.querySelectorAll('.category');

console.log(categories);

categories.forEach(category => {
	category.addEventListener('click', (e) => {
		e.preventDefault();
		articles.forEach(article => {
			article.classList.remove('hidden');
		});
		articles.forEach(article => {
			if (article.dataset.category != category.dataset.category) {
				article.classList.add('hidden');
			}
		});		
	});
});
