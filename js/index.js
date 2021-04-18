const clearButton = document.querySelector("#index_form_clear_button");
const searchBar = document.querySelector("#index_form_searchbar");
const genres = document.querySelectorAll("option");

const checkSearchBarValue = () => {
    //checking if status bar is empty
    if (searchBar.value == ""){
        //if it is, applying display: none
        // clearButton.style.display = "none";
        clearButton.style.animation = ".5s fadeDown";
        setTimeout(() => clearButton.style.display = "none", 500);
    } else {
        //if it isn't, applying display: flex;
        clearButton.style.display = "flex";
        clearButton.style.animation = ".5s fadeUp";
    }
}

searchBar.addEventListener("keyup", checkSearchBarValue);

for (var i = 0; i < genres.length; i++){
    genres[i].addEventListener("click", () => {
        if (genres[i] == ""){
            clearButton.style.display = "none";
        } else {
            clearButton.style.display = "flex";
            clearButton.style.animation = ".5s fadeUp";
        }
    })
}

clearButton.addEventListener("click",() => {
    clearButton.style.animation = ".5s fadeDown";
    setTimeout(() => clearButton.style.display = "none", 500);
})
