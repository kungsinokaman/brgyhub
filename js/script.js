let body = document.body;


let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   searchForm.classList.remove('active');
}


let searchForm = document.querySelector('.header .flex .search-form');

document.querySelector('#search-btn').onclick = () =>{
   searchForm.classList.toggle('active');
   profile.classList.remove('active');
}

// TO-DO - Animations

// let sideBar = document.querySelector('.side-bar');

// document.querySelector('#menu-btn').onclick = () =>{
//    sideBar.classList.toggle('active');
//    body.classList.toggle('active');
// }

// document.querySelector('.side-bar .close-side-bar').onclick = () =>{
//    sideBar.classList.remove('active');
//    body.classList.remove('active');
// }

/**
 * @typedef {Object} Keyframe
 * @property {string} [transform]
 * @property {number} [opacity]
 */

/**
 * @typedef {Object} KeyframeAnimationOptions
 * @property {number} [duration]
 * @property {string} [easing]
 * @property {number} [iterations]
 * @property {string} [direction]
 */

let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () => {
  if (sideBar.classList.contains('active')) {
    // Animate hiding the sidebar
    sideBar.animate([
      { transform: 'translateX(0)', opacity: 1 },
      { transform: 'translateX(-100%)', opacity: 0 }
    ], {
      duration: 300,
      easing: 'ease'
    }).onfinish = () => {
      sideBar.classList.remove('active');
      body.classList.remove('active');
    };
  } else {
    // Animate showing the sidebar
    sideBar.classList.add('active');
    body.classList.add('active');
    sideBar.animate([
      { transform: 'translateX(-100%)', opacity: 0 },
      { transform: 'translateX(0)', opacity: 1 }
    ], {
      duration: 300,
      easing: 'ease'
    });
  }
}

document.querySelector('.side-bar .close-side-bar').onclick = () => {
  // Animate hiding the sidebar
  sideBar.animate([
    { transform: 'translateX(0)', opacity: 1 },
    { transform: 'translateX(-100%)', opacity: 0 }
  ], {
    duration: 300,
    easing: 'ease'
  }).onfinish = () => {
    sideBar.classList.remove('active');
    body.classList.remove('active');
  };
}


document.querySelectorAll('input[type="number"]').forEach(InputNumber => {
   InputNumber.oninput = () =>{
      if(InputNumber.value.length > InputNumber.maxLength) InputNumber.value = InputNumber.value.slice(0, InputNumber.maxLength);
   }
});

window.onscroll = () =>{
   profile.classList.remove('active');
   searchForm.classList.remove('active');

   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }

}

