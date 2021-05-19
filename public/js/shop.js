document.addEventListener("DOMContentLoaded", function(event) {
  const d = document;
  const querystring = window.location.search;
  const params = new URLSearchParams(querystring);
  const $notification_add_cart = document.querySelector('.notification-cart-add');
  const $cart_count = document.querySelector('#cart_count');

  setTimeout( () => {
    document.querySelector('.cs-loader').classList.add('hidden');
  } , 2000);

  /**
   * Check if have cart items
   */
  (() => {
    axios.get('/cart/totals')
      .then((response) => {
        $cart_count.textContent = response.data.total;
      })
  })();

  /**
   * Function Add_Cart
   */
  (function add_cart(d){
    d.querySelectorAll('.btn-shop-add-cart')
      .forEach((e) => {

        e.addEventListener('click', (e) => {

          e.preventDefault();
          const product_id = e.target.getAttribute('data-id'); 

          axios.post('/cart-add', {
              product_id,
            })
            .then(function (response) {
              // handle success
              $notification_add_cart.classList.remove('hidden');
              $cart_count.textContent = response.data.total;

              setTimeout(() => {
                $notification_add_cart.classList.add('hidden');
              }, 4000);
            })
            .catch(function (error) {
              // handle error
              console.log(error);
            })
            .then(function () {
              // always executed
            });

        });

      });
    
  })(d);

  /**
   * Function for Get Params and Selected Filters
   */
  (function getParamsAndSelectedFilters() {
   /**
    * Get Params Sort
    */
    const $inputSort = document.getElementsByName('sort');

    if(params.get('sort') != ''){
      $inputSort.forEach((input) => {
        if(input.value === params.get('sort')) input.checked = true;
      });
    }else{
      $inputSort[0].checked = true;
    }
  })();
  
});