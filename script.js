const btnpp = document.querySelector('.btnpp')
const formpp = document.querySelector('.formpp')

btnpp.addEventListener('click', () => {
    if (formpp.style.display == 'flex') {
        formpp.style.display = 'none'
    } else {
        formpp.style.display = 'flex'
        
    }
})

const imgslc = document.querySelectorAll('.imgslc')
const ppChangeInput = document.querySelector('.ppChangeInput')
imgslc.forEach(elem => {
    elem.addEventListener('click', () => {
        ppChangeInput.value = elem.src
        console.log(ppChangeInput.value)
    })

})
const shad = document.querySelector('.shad')
const images = document.querySelectorAll('.imgslc')
const ppChoice = document.querySelector('.ppChoice')
const profilBase = document.querySelector('.profilBase')

shad.addEventListener('click', () => {
    if (ppChoice.style.display == 'flex') {
        ppChoice.style.display = 'none'
        profilBase.style.display = 'flex'
    } else {
        ppChoice.style.display = 'flex'
        ppChoice.style.animationName = 'slidein'
        ppChoice.style.animationDuration = '1s'
        ppChoice.style.overflow = 'hidden'
        profilBase.style.display = 'none'
    }
})

images.forEach(img => {
    img.addEventListener('click', () => {
        images.forEach(img2 => {
            if(img2 !== img){
                img2.classList.remove('select')
            }
        })
        img.classList.add('select')
    })
})

const btnSubModif = document.querySelector('.btnSubModif')

const btnPseudo = document.querySelector('.btnPseudo')
const h3Pseudo = document.querySelector('.h3Pseudo')
const inputPseudo = document.querySelector('.inputPseudo')

btnPseudo.style.cursor = 'pointer'
btnPseudo.addEventListener('click',()=>{
    if (h3Pseudo.style.display != 'none' && inputPseudo.type != 'text') {
        h3Pseudo.style.display = 'none'
        inputPseudo.type = 'text'
        btnSubModif.style.display = 'flex'
    }else{
        h3Pseudo.style.display = 'flex'
        inputPseudo.type = 'hidden'
    }
})

const btnFname = document.querySelector('.btnFname')
const h3Fname = document.querySelector('.h3Fname')
const inputFname = document.querySelector('.inputFname')

btnFname.style.cursor = 'pointer'
btnFname.addEventListener('click',()=>{
    if (h3Fname.style.display != 'none' && inputFname.type != 'text') {
        h3Fname.style.display = 'none'
        inputFname.type = 'text'
        btnSubModif.style.display = 'flex'
    }else{
        h3Fname.style.display = 'flex'
        inputFname.type = 'hidden'
    }
})

const btnLname = document.querySelector('.btnLname')
const h3Lname = document.querySelector('.h3Lname')
const inputLname = document.querySelector('.inputLname')

btnLname.style.cursor = 'pointer'
btnLname.addEventListener('click',()=>{
    if (h3Lname.style.display != 'none' && inputLname.type != 'text') {
        h3Lname.style.display = 'none'
        inputLname.type = 'text'
        btnSubModif.style.display = 'flex'
    }else{
        h3Lname.style.display = 'flex'
        inputLname.type = 'hidden'
    }
})


const btnAge = document.querySelector('.btnAge')
const h3Age = document.querySelector('.h3Age')
const inputAge = document.querySelector('.inputAge')

btnAge.style.cursor = 'pointer'
btnAge.addEventListener('click',()=>{
    if (h3Age.style.display != 'none' && inputAge.type != 'date') {
        h3Age.style.display = 'none'
        inputAge.type = 'date'
        btnSubModif.style.display = 'flex'
    }else{
        h3Age.style.display = 'flex'
        inputAge.type = 'hidden'
    }
})