const listItems = [...document.querySelectorAll('#item')];
listItems.forEach(listItem => listItem.addEventListener('click', () => {
    const listItemInfo = listItem.querySelector('#item__details');
    listItemInfo.classList.toggle('active');
    listItem.classList.toggle('expanded');
}))


const goBack = () => {
    window.history.back();
}