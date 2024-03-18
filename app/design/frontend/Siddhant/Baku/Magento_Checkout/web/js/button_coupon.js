window.addEventListener('load', () => {

    const btn = document.getElementsByClassName('btn-cou');
    const btnTimeout = setTimeout(() => {
        btn[0]?.addEventListener('click', () => {
            alert('Invalid Coupon code'); 
        });
    }, 10000);
});