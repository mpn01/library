const searchBar = document.querySelector(".search-bar");
const typeList = document.querySelector(".type-list");
const body = document.querySelector("body");
const prostokat = document.querySelector("#prostokat");
const label1 = document.querySelector(".label-1");
const label2 = document.querySelector(".label-2");
const label3 = document.querySelector(".label-3");
const searchButton = document.querySelector("#wyszukiwarka");
const typeButton = document.querySelector("#gatunek");
const allButton = document.querySelector("#wszystkie");

const showSearchBar = () => {
    searchBar.style.display = "block";
    typeList.style.display = "none";
    prostokat.style.display = "none";
    label1.style.background = "var(--cloud)";
    label1.style.color = "black";
    label1.style.border = "1px solid var(--lightgray)";
    label2.style.background = "var(--cloud)";
    label2.style.color = "black";
    label2.style.border = "1px solid var(--lightgray)";
    label3.style.background = "var(--blue)";
    label3.style.color = "white";
    label3.style.border = "1px solid var(--blue)";
}
const showTypeList = () => {
    searchBar.style.display = "none";
    typeList.style.display = "block";
    prostokat.style.display = "none";
    label1.style.background = "var(--cloud)";
    label1.style.color = "black";
    label1.style.border = "1px solid var(--lightgray)";
    label2.style.background = "var(--blue)";
    label2.style.color = "white";
    label2.style.border = "1px solid var(--blue)";
    label3.style.background = "var(--cloud)";
    label3.style.color = "black";
    label3.style.border = "1px solid var(--lightgray)";
}
const hideAll = () => {
    searchBar.style.display = "none";
    typeList.style.display = "none";
    prostokat.style.display = "block";
    label1.style.background = "var(--blue)";
    label1.style.color = "white";
    label1.style.border = "1px solid var(--blue)";
    label2.style.background = "var(--cloud)";
    label2.style.color = "black";
    label2.style.border = "1px solid var(--lightgray)";
    label3.style.background = "var(--cloud)";
    label3.style.color = "black";
    label3.style.border = "1px solid var(--lightgray)";
}

allButton.addEventListener("click", hideAll);
searchButton.addEventListener("click", showSearchBar);
typeButton.addEventListener("click", showTypeList);