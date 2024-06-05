let btns = document.querySelectorAll('.tab-btn');
let items_group = document.querySelectorAll('.items-group');
btns.forEach((btn, i) => {
    btn.addEventListener('click', () => {
        btns.forEach(button => { button.classList.remove('active') })
        btn.classList.add('active');

        items_group.forEach(item => { item.classList.remove('active') })
        items_group[i].classList.add('active');
    });
});
