// const listItems = [...document.querySelectorAll('.list_item')];
// listItems.forEach(listItem => listItem.addEventListener('click', () => {
//     const listItemSidebar = document.querySelector('.list_item_sidebar');
//     listItemSidebar.classList.toggle('active');
// }))

const listItemShowallButtons = [...document.querySelectorAll('.list_item_showmore_button')];
listItemShowallButtons.forEach(listItemShowallButton => listItemShowallButton.addEventListener('click', () => {
    const listItemSidebar = document.querySelector('.list_item_sidebar');
    listItemSidebar.classList.toggle('active');
}))

const goBack = () => {
    window.history.back();
}