  window.addEventListener('scroll',function(){
  let ani = document.getElementById('animates_b');
  let ani_b = document.getElementById('animates_c');
  let ani_c = document.getElementById('animates_d');
  let position = ani.getBoundingClientRect().top;
  let positiona = ani_b.getBoundingClientRect().top;
  let positionb = ani_c.getBoundingClientRect().top;
      console.log(position);
  let position_b = window.innerHeight;
     
  if(position < position_b) {
ani.style.animation = 'animationimg_b 3s ease';
  }
    if(positiona < position_b) {
ani_b.style.animation = 'animationimg_c 3s ease';
  }
      if(positionb < position_b) {
ani_c.style.animation = 'animationimg_d 3s ease';
  }
  })