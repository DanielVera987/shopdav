document.addEventListener("DOMContentLoaded", function(event) {
  const d = document;

  setTimeout( () => {
    document.querySelector('.cs-loader').classList.add('hidden');
  } , 3000);

  (function add_cart(d){
    d.querySelectorAll('.btn-shop-add-cart')
      .forEach((e) => {

        e.addEventListener('click', (e) => {

          e.preventDefault();
          console.log(e.target.getAttribute('data-id'), e.target.getAttribute('data-price'));

        });

      });
    
  })(d);
});