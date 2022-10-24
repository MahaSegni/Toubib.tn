// STARRY() : CREATE STAR RATING
//  target : target html element
//  max : number of stars, default 5
//  now : number of stars now, default 0
//  disabled : cannot change number of stars/click, default false
//  click : run this function when user click on star
function starry (instance) {
  // (A) SET DEFAULTS
  if (instance.max === undefined) { instance.max = 5; }
  if (instance.now === undefined) { instance.now = 0; }
  if (instance.now > instance.max) { instance.now = instance.max; }
  if (instance.disabled === undefined) { instance.disabled = false; }

  // (B) GENERATE STARS
  instance.target.classList.add("starwrap");
  for (let i=1; i<=instance.max; i++) {
    // (B1) CREATE HTML STAR
    let s = document.createElement("div");
    s.className = "star";
    instance.target.appendChild(s);

    // (B2) HIGHLIGHT STAR
    if (i <= instance.now) { s.classList.add("on"); }

    if (!instance.disabled) {
      // (B3) ON MOUSE OVER
      s.onmouseover = () => {
        let all = instance.target.getElementsByClassName("star");
        for (let j=0; j<all.length; j++) {
          if (j<i) { all[j].classList.add("on"); }
          else { all[j].classList.remove("on"); }
        }
      };

      // (B4) ON CLICK
      if (instance.click) { s.onclick = () => { instance.click(i); }; }
    }
  }

  // (C) GET NUMBER OF SELECTED STARS
  instance.target.getstars = () => {
    return instance.target.querySelectorAll(".on").length;
  };
}
