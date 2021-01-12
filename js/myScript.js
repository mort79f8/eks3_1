$(document).ready(function(){
	$(".login").hide();
	$(".loginBtn").on("click", function(e){
		
		$(".login").slideToggle();
	});
});

// filters
// lavet efter samtale med tvillingerne.
// get all the article, this is a nodelist not a normal array!
let articles = document.querySelectorAll('article');

let categories = document.querySelectorAll('.category');
let resetFilters = document.querySelector('.clearFilters');

console.log(categories);

// add eventlistener to each link 
categories.forEach(category => {
	category.addEventListener('click', (e) => {
		e.preventDefault();
		resetFilters.classList.remove('hidden');
		// remove any hidden class on the articles.
		articles.forEach(article => {
			article.classList.remove('hidden');
		});
		// sort through each article and add hidden if the the dataset are not equal
		articles.forEach(article => {
			if (article.dataset.category != category.dataset.category) {
				article.classList.add('hidden');
			}
		});		
	});
});

// eventlistener to reset all the filters.
resetFilters.addEventListener('click', (e) => {
	e.preventDefault();
	resetFilters.classList.add('hidden');
	articles.forEach(article => {
		article.classList.remove('hidden');
	});
})

let genderMale = document.querySelector('.catMen');
let genderFemale = document.querySelector('.catWomen');

// change the cursor on the elements to a pointer so show it is clickable
genderMale.style.cursor ="pointer";
genderFemale.style.cursor ="pointer";

genderMale.addEventListener('click', () => {
	resetFilters.classList.remove('hidden');
	articles.forEach(article => {
		article.classList.remove('hidden');
	});
	articles.forEach(article => {
		if (article.dataset.gender != genderMale.dataset.gender) {
			article.classList.add('hidden');
		}
	});	
});

genderFemale.addEventListener('click', () => {
	resetFilters.classList.remove('hidden');
	articles.forEach(article => {
		article.classList.remove('hidden');
	});
	articles.forEach(article => {
		if (article.dataset.gender != genderFemale.dataset.gender) {
			article.classList.add('hidden');
		}
	});	
});