const listItems = [...document.querySelectorAll('.list_item')];
listItems.forEach(listItem => listItem.addEventListener('click', () => {
    const listItemInfo = listItem.querySelector('.list_item_info');
    listItem.classList.toggle('expanded');
    listItemInfo.classList.toggle('active');
}))


const goBack = () => {
    window.history.back();
}