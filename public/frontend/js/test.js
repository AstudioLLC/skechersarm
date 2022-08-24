// ////////////////////////////////////////////////////////////// Testing Content////////////////////////////////////////////////////////////
// let images = ['prod(1).png'];
// for (var i = 1;  i < 13; i++) {
//     images.push(`prod(${i}).jpg`)
// }
//
// function genereteRandomProductImage(images){
//     return images[Math.floor(Math.random()*images.length)]
// }
//
// function productCardGenerator(image,cols){
//     let randImg = genereteRandomProductImage(images);
//     let randImg2 = genereteRandomProductImage(images);
//     let randImg3 = genereteRandomProductImage(images);
//     let randImg4= genereteRandomProductImage(images);
//     return `<div class="${cols} p-1">
//                     <div class="product-card">
//                       <div class="product-card-img position-relative">
//                         <a href="#">
//                       <div class="image-wrapper">
//                         <ul>
//                           <li>
//                             <img src="images/products/${randImg}" class="img-fluid" alt="" />
//                           </li>
//                           <li>
//                             <img src="images/products/${randImg2}" class="img-fluid" alt="" />
//                           </li>
//                           <li>
//                             <img src="images/products/${randImg3}" class="img-fluid" alt="" />
//                           </li>
//                           <li>
//                             <img src="images/products/${randImg4}" class="img-fluid" alt="" />
//                           </li>
//                         </ul>
//                       </div>
//
//                     </a>
//                         <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex justify-content-between">
//                           <span class="badge text-white bg-danger fs-7 rounded-0"> -53% </span>
//                           <div class="product-card-buttons-icons me-2">
//                             <a>
//                               <div class="product-card-buttons-icon">
//                                 <img src="images/icons/product-favorite.svg" alt="" class="favorite-btn">
//                               </div>
//                             </a>
//                             <a>
//                               <div class="product-card-buttons-icon">
//                                 <img src="images/icons/bage.svg" alt="" class="bag-btn">
//                               </div>
//                             </a>
//                           </div>
//                         </div>
//                       </div>
//                       <div class="product-body p-3">
//                         <div class="product-title fs-6 my-2">
//                           <span class="text-primary">կանանց</span>
//                         </div>
//                         <div class="product-info fs-6 my-2">
//                           <p class="m-0">skechers go walk massage fit - ripple</p>
//                         </div>
//                         <div class="product-price fs-6 my-2">
//                           <span class="text-decoration-line-through fs-7 text-muted">59.000</span>
//                           <span class="fs-6 fw-bold">29.500</span>
//                         </div>
//                       </div>
//                     </div>
//                   </div>`;
// }
//
// const blogCart = `<div class="col-6 mb-3 col-md-4 col-lg-3">
//                       <a href="#" class="text-decoration-none text-reset">
//                         <div class="card border-0">
//                         <img src="images/blog/skechers-kids-banner.jpg" class="card-img-top" alt="">
//                         <div class="card-body ps-0">
//                           <h2 class="card-title fw-bold text-limit-2 fs-6">Ինչպես հարուստ տեսք ունենալ</h2>
//                           <span class="fs-7">16.04.2022</span>
//                           <p class="card-text mt-2 text-limit-2 text-muted fs-7">Սկսում ենք զարդարել հագուստը մետաքսե գլխաշորերով, ինչու՞, որովհետև ավելի տաք հագուստի մուգ երանգները նոր գույներով խաղացնելու ժամանակն է: արդարության համար պետք է ասել, որ այդ նույն գլխաշորը կամ թաշկինակը կարող…</p>
//                         </div>
//                       </div>
//                       </a>
//                     </div>`;
// const productContainer = document.querySelectorAll('.desctop-products .row');
// let arr = [];
// for (var i = 0; i < 11; i++) {
//     arr.push(productCardGenerator(genereteRandomProductImage(images),'col-3 col-xl-2'));
// }
//
// const productContainer2 = document.querySelectorAll('.desctop-products2 .row');
// let arr3 = [];
// for (var i = 0; i < 11; i++) {
//     arr3.push(productCardGenerator(genereteRandomProductImage(images),'col-6 col-sm-4 col-xl-3'));
// }
//
// productContainer.forEach((item)=>{
//     arr.forEach((item2)=>{
//         item.innerHTML += item2;
//     })
// });
//
// productContainer2.forEach((item)=>{
//     arr3.forEach((item2)=>{
//         item.innerHTML += item2;
//     })
// });
// const blogContainer = document.querySelectorAll('.blog');
// let arr2 = new Array(11).fill(blogCart);
// blogContainer.forEach((item)=>{
//     arr2.forEach((item2)=>{
//         item.innerHTML += item2;
//     })
// });
