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
    })

})
const shad = document.querySelector('.shad')
const shad1 = document.querySelectorAll('.shad1')
const ashad1 = document.querySelectorAll('.ashad1')
const ppChoice = document.querySelector('.ppChoice')
const profilBase = document.querySelector('.profilBase')

shad.addEventListener('click', () => {
    if (ppChoice.style.display == 'flex') {
        ppChoice.style.display = 'none'
        profilBase.style.display = 'flex'
    } else {
        ppChoice.style.display = 'flex'
        profilBase.style.display = 'none'
    }
    // ppChoice.style.display = 'flex'
    // profilBase.style.display = 'none'
})





shad1.forEach(elem => {
    elem.addEventListener('click', () => {
        if (elem.style.backgroundColor != '#000000b1') {
            elem.style.backgroundColor = '#000000b1'
            elem.childNodes[1].style.color = '#f6f6f6'
        }  
    });
});
// shad1.forEach(elem => {
//     elem.addEventListener('click', (e) => {
//         if (e.target.style.backgroundColor != '#000000b1') {
//             e.target.backgroundColor = '#000000b1'
//             elem.childNodes[1].style.color = '#f6f6f600'
//         }  
//     });
// });
