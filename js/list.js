const divs = [...document.querySelectorAll('.list_item')]
divs.forEach(div => div.addEventListener('click', e => {
    // divs.forEach(div => {
    //     div.querySelector('.info-container').classList.remove('active')
    // })
    const infoDiv = div.querySelector('.list_item_info')
    infoDiv.classList.toggle('active')
    infoDiv.style.animation = "0.5s slideDown";
}))