//if the user doesnt have a localstorage of theme it sets it to the light theme
$(document).ready(function(){
    if (localStorage.getItem("theme") === "theme-dark") {
        setTheme("theme-dark");
    } else {
        setTheme("theme-light");
    }
})
//sets the theme 
function setTheme(themeName) {
    localStorage.setItem("theme", themeName);
    document.documentElement.className = themeName;
}