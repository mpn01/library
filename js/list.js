const listItems = [...document.querySelectorAll('.list_item')]
listItems.forEach(listItem => listItem.addEventListener('click', e => {
    const listItemInfo = listItem.querySelector('.list_item_info')
    listItemInfo.classList.toggle('active')
    // listItemInfo.style.animation = ".3s stretchDown";
}))

const goBack = () => {
    window.history.back();
}