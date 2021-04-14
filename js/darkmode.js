let darkMode = localStorage.getItem("darkMode"); //checking which theme is set
const darkModeToggle = document.querySelector("#global_darkmode_toggle");

const enableDarkMode = () => {
    //setting data-theme attribute to dark
    document.documentElement.setAttribute("data-theme", "dark")
    //setting darkMode variable to enabled in local storage
    darkMode = localStorage.setItem("darkMode", "enabled");
}

const disableDarkMode = () => {
    //setting data-theme attribute to light
    document.documentElement.setAttribute("data-theme", "light");
    //setting darkMode variable to disabled in local storage
    darkMode = localStorage.setItem("darkMode", "disabled");
}

if (darkMode === "enabled") {
    enableDarkMode();
    //setting checkbox to checked
    darkModeToggle.checked = "on";
}

darkModeToggle.addEventListener("click", () => {
    darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled"){
        trans();
        enableDarkMode();
    } else {
        trans();
        disableDarkMode();
    }
})

//making transition effect
let trans = () => {
    document.documentElement.classList.add("transition");
    window.setTimeout(() => {
        document.documentElement.classList.remove("transition");
    }, 100)
}