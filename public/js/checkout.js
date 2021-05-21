document.addEventListener('DOMContentLoaded', () => {
  const $qty = document.querySelectorAll('.qty');
  const $btn_coupon = document.getElementById('btn-coupon');
  const $coupon = document.getElementById('coupon');
  const $porcent_coupon = document.getElementById('porcent_coupon');

  const totals = () => {
    let subtotal = 0;
    let newSubtotal = 0;
    const $item_totals = document.querySelectorAll('.items_totals');
    const $subtotal = document.querySelector('#subtotal');

    $qty.forEach((e) => {
      subtotal += parseFloat(e.dataset.priceUnit * e.value);
      const $txt_total = document.querySelector(`.txt_total_${e.dataset.id}`);

      $txt_total.textContent = (e.value * e.dataset.priceUnit).toFixed(2);
    });

    //Check if have apply coupon 
    if($porcent_coupon.value.trim() !== '') {
      newSubtotal = ( subtotal - ( (subtotal * $porcent_coupon.value) / 100));
      document.querySelector('.total_coupon').textContent = ( (subtotal * $porcent_coupon.value) / 100).toFixed(2);
      document.querySelector('.total_new_subtotal').textContent = newSubtotal.toFixed(2);
    }

    $subtotal.textContent = (subtotal).toFixed(2);
    // Create new subtotal and apply in iva, total
    if(newSubtotal > 0) {
      subtotal = newSubtotal;
    }

    let porcent_tax = tax();
    document.getElementById('iva').textContent = parseFloat(subtotal * porcent_tax / 100).toFixed(2);
    document.getElementById('total').textContent = (parseFloat(subtotal * porcent_tax / 100) + parseFloat(subtotal)).toFixed(2);

  }

  const tax = (e) => {
    const $tax = document.getElementById('tax').value;
    return parseFloat($tax).toFixed(2);
  }

  const add_or_subtract_product = (e) => {
    const priceUnit = e.target.dataset.priceUnit;
    const id = e.target.dataset.id;
    const $txt_total = document.querySelector(`.txt_total_${id}`);

    $txt_total.textContent = (e.target.value * priceUnit).toFixed(2);

    //Edit Item on cart
    axios.post(`/cart-edit/${id}`, {
      qty: e.target.value
    })
      .then(res => {
        return res.data;
      })
      .catch(err => console.log(err))

    totals();
  }

  const apply_coupon = (coupon) => {
    axios.get(`/apply/coupon/${coupon}`)
      .then(res => {
        return res.data;
      })
      .then(data => {
        if (data.porcent) {
          $porcent_coupon.value = parseInt(data.porcent);

          document.querySelector('.name_coupon').textContent = $coupon.value;
          $coupon.value = null;
          document.querySelector('.lbl_coupon').classList.remove('hidden');
          document.querySelector('.lbl_new_subtotal').classList.remove('hidden');

          //Llamar subtotal para calcular todo lo nuevo
          totals();
        }
      })
      .catch(err => {console.log(err)});
  }

  const clear_coupon = () => {
    $porcent_coupon.value = null;
    document.querySelector('.lbl_coupon').classList.add('hidden');
    document.querySelector('.lbl_new_subtotal').classList.add('hidden');

    totals();
  }

  $btn_coupon.addEventListener('click', (e) => {
    if($coupon.value.trim() === '') return false;

    apply_coupon($coupon.value);
  });

  document.getElementById('delete_coupon').addEventListener('click', clear_coupon);

  $qty.forEach((e) => {
    e.addEventListener('change', add_or_subtract_product);
  });

  totals();
});  