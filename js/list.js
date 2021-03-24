const divs = [...document.querySelectorAll('.result')]
divs.forEach(div => div.addEventListener('click', e => {
    // divs.forEach(div => {
    //     div.querySelector('.info-container').classList.remove('active')
    // })
   const infoDiv = div.querySelector('.info-container')
    infoDiv.classList.toggle('active')
} ))


