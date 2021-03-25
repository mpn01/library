const searchBar = document.querySelector(".search-bar");
const typeList = document.querySelector(".type-list");
const body = document.querySelector("body");
const prostokat = document.querySelector("#prostokat");
const buttonBooksSearch = document.querySelector("#button_books_search");
const buttonBooksGenre = document.querySelector("#button_books_genre");
const buttonBooksAll = document.querySelector("#button_books_all");
const radioButtons = [... document.querySelectorAll(".radio")];


const showSearchBar = () => {
    searchBar.style.display = "block";
    typeList.style.display = "none";
    prostokat.style.display = "none";
    radioButtons[0].style.background = "var(--cloud)";
    radioButtons[0].style.color = "black";
    radioButtons[0].style.border = "1px solid var(--lightgray)";
    radioButtons[1].style.background = "var(--cloud)";
    radioButtons[1].style.color = "black";
    radioButtons[1].style.border = "1px solid var(--lightgray)";
    radioButtons[2].style.background = "var(--blue)";
    radioButtons[2].style.color = "white";
    radioButtons[2].style.border = "1px solid var(--blue)";
}
const showTypeList = () => {
    searchBar.style.display = "none";
    typeList.style.display = "block";
    prostokat.style.display = "none";
    radioButtons[0].style.background = "var(--cloud)";
    radioButtons[0].style.color = "black";
    radioButtons[0].style.border = "1px solid var(--lightgray)";
    radioButtons[1].style.background = "var(--blue)";
    radioButtons[1].style.color = "white";
    radioButtons[1].style.border = "1px solid var(--blue)";
    radioButtons[2].style.background = "var(--cloud)";
    radioButtons[2].style.color = "black";
    radioButtons[2].style.border = "1px solid var(--lightgray)";
}
const hideAll = () => {
    searchBar.style.display = "none";
    typeList.style.display = "none";
    prostokat.style.display = "block";
    radioButtons[0].style.background = "var(--blue)";
    radioButtons[0].style.color = "white";
    radioButtons[0].style.border = "1px solid var(--blue)";
    radioButtons[1].style.background = "var(--cloud)";
    radioButtons[1].style.color = "black";
    radioButtons[1].style.border = "1px solid var(--lightgray)";
    radioButtons[2].style.background = "var(--cloud)";
    radioButtons[2].style.color = "black";
    radioButtons[2].style.border = "1px solid var(--lightgray)";
}

buttonBooksAll.addEventListener("click", hideAll);
buttonBooksSearch.addEventListener("click", showSearchBar);
buttonBooksGenre.addEventListener("click", showTypeList);