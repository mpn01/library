const listItems = [...document.querySelectorAll('.list_item')];
listItems.forEach(listItem => listItem.addEventListener('click', () => {
    const listItemInfo = document.querySelector('.list_item_info');
    listItemInfo.classList.toggle('active');
}))

const goBack = () => {
    window.history.back();
}