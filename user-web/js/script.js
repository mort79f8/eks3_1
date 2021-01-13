const main = document.querySelector('.product-display');

// fetch the data from the api
fetch('http://localhost:3000/api/products')
.then(data => data.json())
.then(products => productDisplay(products));


function productDisplay(products) {
    products.forEach(product => {
        // create the elements for each article
        let article = document.createElement('article');
        let h2 = document.createElement('h2');
        let stars = document.createElement('p');
        let descheader = document.createElement('p');
        let desc = document.createElement('p');
        let category = document.createElement('p');
        let gender = document.createElement('p'); 

        // fill out the date to the elements
        h2.innerHTML = product.Name;
        stars.innerHTML = "Vurdering: "+product.Stars;
        descheader.innerHTML = "Beskrivelse:";
        desc.innerHTML = product.Desc;
        category.innerHTML = "Kategori: "+product.Category;
        gender.innerHTML = "Gender: "+product.Gender;

        // add some style classes to the elements
        desc.classList.add('description');

        // append the elements to article
        article.appendChild(h2);
        article.appendChild(stars);
        article.appendChild(descheader);
        article.appendChild(desc);
        article.appendChild(category);
        article.appendChild(gender);

        // append the article to main
        main.appendChild(article);
    });
}