const listItems = [...document.querySelectorAll('.list_item')];
listItems.forEach(listItem => listItem.addEventListener('click', () => {
    const listItemInfo = listItem.querySelector('.list_item_info');
    listItemInfo.classList.toggle('active');
    listItem.classList.toggle('expanded');
}))


const goBack = () => {
    window.history.back();
}