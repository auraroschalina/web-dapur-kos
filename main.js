function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
    var hamburger = document.querySelector(".hamburger");
    hamburger.classList.toggle("active");
  }
  
  // Tambahkan event listener untuk menanggapi klik pada dokumen
  document.addEventListener('click', function(event) {
    var menu = document.getElementById("menu");
    var hamburger = document.querySelector(".hamburger");
  
    // Periksa apakah yang diklik bukan bagian dari menu atau ikon hamburger
    if (!menu.contains(event.target) && !hamburger.contains(event.target)) {
      menu.style.display = "none";
      hamburger.classList.remove("active");

    }

  //step 1: get DOM
  let nextDom = document.getElementById('next');
  let prevDom = document.getElementById('prev');
  
  let carouselDom = document.querySelector('.carousel');
  let SliderDom = carouselDom.querySelector('.carousel .list');
  
  nextDom.onclick = function(){
      showSlider('next');    
  }
  
  prevDom.onclick = function(){
      showSlider('prev');    
  }
  
  let runNextAuto = setTimeout(() => {
      next.click();
  }, 15000)
  function showSlider(type){
      let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
      
      if(type === 'next'){
          SliderDom.appendChild(SliderItemsDom[0]);
          carouselDom.classList.add('next');
          // window.location.href = thumbnailItemsDom[1].querySelector('a').getAttribute('href');
      }else{
          SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
          carouselDom.classList.add('prev');
          // window.location.href = thumbnailItemsDom[thumbnailItemsDom.length - 2].querySelector('a').getAttribute('href');
      }
  
          setTimeout(() => {
          carouselDom.classList.remove('next');
          carouselDom.classList.remove('prev');
      }, 1000);
  
      clearTimeout(runNextAuto);
      runNextAuto = setTimeout(() => {
          next.click();
      }, 15000)
  }
  });