document.addEventListener("DOMContentLoaded", function(event) {
  const d = document;
  const querystring = window.location.search;
  const params = new URLSearchParams(querystring);

  setTimeout( () => {
    document.querySelector('.cs-loader').classList.add('hidden');
  } , 3000);

  /**
   * Function Anonima Add_Cart
   */
  (function add_cart(d){
    d.querySelectorAll('.btn-shop-add-cart')
      .forEach((e) => {

        e.addEventListener('click', (e) => {

          e.preventDefault();
          console.log(e.target.getAttribute('data-id'), e.target.getAttribute('data-price'));

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