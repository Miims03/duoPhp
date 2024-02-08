const vid = document.querySelector('.vid1')
vid.style.display = 'flex'
// vid.style.display = 'none'
const btn1 = document.querySelector('.btn1')
const btn = document.createElement('button')
btn.innerHTML = 'Boutton'
btn1.appendChild(btn)

btn.addEventListener('click',()=>{
    if (vid.style.display == 'flex') {
        vid.style.display = 'none'
    }else{
        vid.style.display = 'flex'
    }
})

