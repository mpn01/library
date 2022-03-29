const resetButton = document.querySelector(".search__button--reset");
const searchBar = document.querySelector("#bar__input");
const genreList = document.querySelector("#search__select");

searchBar.addEventListener("keyup", () => {
    //check if status bar is empty
    if (searchBar.value == "" && genres.value == ""){
        //if it is, apply display: none and timeout for animation
        resetButton.style.animation = ".5s fadeDown";
        setTimeout(() => resetButton.style.display = "none", 500);
    } else {
        //if it isn't, applying display: flex;
        resetButton.style.display = "flex";
        resetButton.style.animation = ".5s fadeUp";
    }
})

genreList.addEventListener("input", () => {
    //check if genre list is empty
    if (genreList == ""){
        //if it is, apply display: none and timeout for animation
        resetButton.style.animation = ".5s fadeDown";
        setTimeout(() => resetButton.style.display = "none", 500);
    } else {
        //if it isn't, apply display: flex and animation
        resetButton.style.display = "flex";
        resetButton.style.animation = ".5s fadeUp";
    };
})

resetButton.addEventListener("click",() => {
    resetButton.style.animation = ".5s fadeDown";
    //set timeout for applying display: none
    setTimeout(() => resetButton.style.display = "none", 500);
    document.querySelector('#search__bar').classList.remove('focus');
})

searchBar.addEventListener('focus', () => {
    document.querySelector('#search__bar').classList.add('focus');
})

genreList.addEventListener('click', () => {
    document.querySelector('#search__bar').classList.remove('focus');
})
