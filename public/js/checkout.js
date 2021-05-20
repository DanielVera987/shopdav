document.addEventListener('DOMContentLoaded', () => {
  const $qty = document.querySelectorAll('.qty');

  const subtotal = () => {
    let subtotal = 0;
    const $totals = document.querySelectorAll('.items_totals');
    const $subtotal = document.querySelector('#subtotal');

    $totals.forEach((e) => {
      subtotal += parseFloat(e.textContent);
    });

    $subtotal.textContent = (subtotal).toFixed(2);

    return (subtotal).toFixed(2);
  }

  const tax = (e) => {
    const $tax = document.getElementById('tax').value;
    return parseFloat($tax).toFixed(2);
  }

  const add_or_subtract_product = async(e) => {
    const priceUnit = e.target.dataset.priceUnit;
    const id = e.target.dataset.id;
    const $txt_total = document.querySelector(`.txt_total_${id}`);

    $txt_total.textContent = (e.target.value * priceUnit).toFixed(2);

    let value_sub = subtotal();
    let porcent_tax = tax();
    document.getElementById('total').textContent = (parseFloat(value_sub * porcent_tax / 100) + parseFloat(value_sub)).toFixed(2);
  }

  

  $qty.forEach((e) => {
    e.addEventListener('change', add_or_subtract_product);
  });
});  