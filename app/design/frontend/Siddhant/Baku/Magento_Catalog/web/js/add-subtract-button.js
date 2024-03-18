window.addEventListener('load', () => {

    const addButton = document.getElementsByClassName('add-qty');
    const subtractButton = document.getElementsByClassName('subtract-qty');
    const input = document.getElementById('qty');
    let inputValue = input.value;

    addButton[0].addEventListener('click', () => {
        input.setAttribute('value', ++inputValue);
    });

    subtractButton[0].addEventListener('click', () => {
        (inputValue === "1" || inputValue === 1) ? input.setAttribute('value', 1) : input.setAttribute('value', --inputValue);
    });
});
