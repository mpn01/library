const resetButton = document.querySelector("#index_form_reset_button");
const searchBar = document.querySelector("#index_form_searchbar");
const genres = document.querySelectorAll("option");

const checkSearchBarValue = () => {
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
}

//set 'for' loop to apply event listener for all option elements
for (var i = 0; i < genres.length; i++){
    genres[i].addEventListener("click", () => {
        //check if genre list is empty
        if (genres[i] == ""){
            //if it is, apply display: none and timeout for animation
            resetButton.style.animation = ".5s fadeDown";
            setTimeout(() => resetButton.style.display = "none", 500);
        } else {
            //if it isn't, apply display: flex and animation
            resetButton.style.display = "flex";
            resetButton.style.animation = ".5s fadeUp";
        }
    });
}
searchBar.addEventListener("keyup", checkSearchBarValue);
resetButton.addEventListener("click",() => {
    resetButton.style.animation = ".5s fadeDown";
    //set timeout for applying display: none
    setTimeout(() => resetButton.style.display = "none", 500);
})

