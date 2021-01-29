const r = document.querySelector(':root');
const p = document.querySelector("p");
const button = document.querySelector("button");

function get() {
    const e = getComputedStyle(r);
    const ps = getComputedStyle(p);
    let val = e.getPropertyValue('--bg');
    
    p.textContent = val;
}

function set(val) {
    get();
    r.style.setProperty('--bg', "green");
    p.style.setProperty('color', 'red');
}

button.addEventListener('click', set);