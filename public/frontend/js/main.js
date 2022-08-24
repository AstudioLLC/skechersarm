const x = new drawerrMultilevel({
    drawerr: '#drawerr',
    btnText: '',
    navigationText: 'Կատալոգ',
    noHashLinkClass: false
});
const closeDrawwer = document.getElementById('js-sr-close-menu');
closeDrawwer.remove();

//////////////////////////////////////////////////////// Sliders //////////////////////////////////////////////////////////

const mainSlider = new Swiper('.mainSlider',{
    pagination: {
        el: '.swiper-pagination',
    },
});
const newsSlider = new Swiper('.newsSlider',{
    slidesPerView: 2,
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
    spaceBetween: 10,
    pagination: {
        el: '.swiper-pagination',
    },
});
const productSingleSliderThumbs = new Swiper(".productSingleSliderThumbs", {
    direction: "vertical",
    loop: false,
    spaceBetween: 10,
    slidesPerView: 6,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
        992: {
            direction: "horizontal",
        },
    },
});
const productSingleSlider = new Swiper(".productSingleSlider", {
    loop: true,
    spaceBetween: 10,
    navigation: false,
    thumbs: {
        swiper: productSingleSliderThumbs,
    },
});
const offerSlider = new Swiper('.offerSlider',{
    slidesPerView: 2,
    navigation: {
        nextEl: ".swiper-offer-right",
        prevEl: ".swiper-offer-left",
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
    spaceBetween: 10,
});
const seenSlider = new Swiper('.seenSlider',{
    slidesPerView: 2,
    navigation: {
        nextEl: ".swiper-seenSlider-right",
        prevEl: ".swiper-seenSlider-left",
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
    spaceBetween: 10,
});

//////////////////////////////////////////////////////// End  Sliders //////////////////////////////////////////////////////////

let favoriteBtn = document.querySelectorAll('.favorite-btn');

favoriteBtn.forEach((item)=>{
    item.addEventListener('click',(e)=>{
        setTimeout(()=>{
            e.target.classList.remove('animate__bounceIn');
        },1000)
        e.target.classList.add('animate__bounceIn');
    })
})

let bagBtn = document.querySelectorAll('.bag-btn');

bagBtn.forEach((item)=>{
    item.addEventListener('click',(e)=>{
        setTimeout(()=>{
            e.target.classList.remove('animate__backOutUp');
        },1000)
        e.target.classList.add('animate__backOutUp');
    })
});

function quantityMinus(e,id){
    if(e.parentNode.querySelector('input[type=number]').hasAttribute('data-product-id',id)){
        const input = document.querySelectorAll(`input[data-product-id="${id}"]`);
        if(e.parentNode.querySelector('input[type=number]').value <= 0){
            input.forEach(item=>{
                item.value = 0;
            })
        }
        else{
            input.forEach(item=>{
                item.stepDown();
            })
        }
    }
}
function quantityPlus(e,id){
    if(e.parentNode.querySelector('input[type=number]').hasAttribute('data-product-id',id)){
        const input = document.querySelectorAll(`input[data-product-id="${id}"]`);
        input.forEach(item=>{
            item.stepUp();
        })
    }
}
let subMegaBtn = document.querySelectorAll('.mega-menu > .container > ul > li > a');
subMegaBtn.forEach((item,index)=>{
    index === 0 ? item.classList.add('active') : null
    item.addEventListener('click',(e)=>{
        subMegaBtn.forEach(item2=>{
            item2.classList.remove('active')
            e.target.classList.add('active')
        })
        subMegaBtn.forEach(item2=>{
            item2.nextElementSibling.style.display = 'none'
            e.target.nextElementSibling.style.display = 'block'
        })
    })
})
 document.addEventListener('touchmove', function(event) {
    event = event.originalEvent || event;
    if(event.scale > 1) {
      event.preventDefault();
    }
  }, false);

 const takeAwayContainer = document.querySelector('.take-away');
 const delivery = document.querySelector('.delivery');
 const takeAwayRadio = document.querySelectorAll('.take-away-radio input[name="ship_method"]');
 takeAwayRadio.forEach((item)=>{
    item.addEventListener('change',()=>{
        if(item.id === 'takeAway'){
            takeAwayContainer.style.display = 'block';
            delivery.style.display = 'none';
        }
        else{
            delivery.style.display = 'block';
            takeAwayContainer.style.display = 'none';
        }
    })
 })
const payRadios = document.querySelectorAll('.pay-radio input[name="payment_type"]');
const payOnline = document.querySelector('.pay-online');
payRadios.forEach((item)=>{
    item.addEventListener('change',()=>{
        if(item.id === 'payOnline'){
            payOnline.style.display = 'block';
        }
        else{
            payOnline.style.display = 'none';
        }
    })
})

const cartModal = document.getElementById('cartModal')
cartModal.addEventListener('shown.bs.modal', event => {
    document.querySelector('.modal-backdrop').classList.add('opacity-0')
    document.querySelector('.modal-backdrop').classList.remove('fade')
})