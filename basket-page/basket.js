let counter = document.querySelector('.counter');
const minus = document.querySelector('.minus');
const plus = document.querySelector('.plus');
const likeIcon = document.querySelector('.like-icon');
const heartIcon = document.querySelector('#heart-icon');
const up = document.querySelector('#up');
const down = document.querySelector('#down');
const choseInfoText = document.querySelectorAll('.chose-info-text');
const productLists = document.querySelectorAll('.product-lists');
let listsImg = document.querySelectorAll('.lists-img');
let imgBox = document.querySelector('.img-box');


let num = parseInt(counter.value),index=0;
plus.addEventListener('click',()=>{
    num++;
    counter.value = num;
})

minus.addEventListener('click',()=>{
    num--;
    if(num < 1){
        num = 1;
    }
    counter.value = num;
})

likeIcon.addEventListener('click',()=>{
    if(heartIcon.classList.contains('fa-regular')){
        heartIcon.setAttribute('class', 'fa-solid fa-heart');
    }else{
        heartIcon.setAttribute('class', 'fa-regular fa-heart');
    }
})

let img;

function activeClass(arr){
    img = arr[index].getAttribute("src");
    imgBox.innerHTML=`
        <img src="${img}" alt="img">
    `;
    arr.forEach(item => item.classList.remove('active'))
    arr[index].classList.add('active');
    console.log(index);
}


for (let i = 0; i < listsImg.length; i++) {
    listsImg[i].addEventListener('click',()=>{
        index = i;
        listsImg.forEach(item=>item.classList.remove('active'))
        listsImg[i].classList.add('active')
        img = listsImg[i].getAttribute("src");
        imgBox.innerHTML=`
            <img src="${img}" alt="img">
        `;
        console.log(i);
    })
}

down.addEventListener('click',()=>{ 
    if(index<3){index++}
    else{index=0}
    activeClass(listsImg);
})

up.addEventListener('click',()=>{ 
    if(index>0){index--}
    else{index=3}
    activeClass(listsImg)
})
for (let i = 0; i < choseInfoText.length; i++) {
    choseInfoText[i].addEventListener('click',()=>{
        choseInfoText.forEach(item=>item.classList.remove('active'))
        choseInfoText[i].classList.add('active')

        productLists.forEach(item => {item.classList.remove('active')});
        productLists[i].classList.add('active');
    })
}