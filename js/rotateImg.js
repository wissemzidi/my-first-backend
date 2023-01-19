if (is_hoverable()) {
  const img = document.getElementById("deco-img");
  document.addEventListener("mousemove", (e) => {
    let x = e.clientX - window.pageXOffset;
    let y = e.clientY - window.pageYOffset;

    let width = window.innerWidth;
    let height = window.innerHeight;

    const off = 6;

    let Dx = (x - width / 2) / off;
    let Dy = (y - height / 2) / off;
    let scale = Math.sqrt(Dx * Dx) / (off * 6);

    if (Dx < -40) Dx = -40;
    if (Dy < -40) Dy = -40;
    if (Dx > 40) Dx = 40;
    if (Dy > 40) Dy = 40;
    if (scale > 1.1) scale = 1.1;
    if (scale < 0.9) scale = 0.9;

    img.style.transform = `
      rotateX(${Dy * -1}deg) 
      rotateY(${Dx * -1}deg) 
      rotateZ(${scale * -1}deg)
    `;
    img.style.scale = `${scale}`;
  });
}

function is_hoverable() {
  return window.matchMedia("(hover: hover)").matches;
}
