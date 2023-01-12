$(document).ready(function () {
    var text = document.getElementById("text");
    //language change
    $("#enTranslator").click(function () {
        localStorage.setItem("lang", "en");
        translate("en", "lang-tag");
    });
    $("#arTranslator").click(function () {
        localStorage.setItem("lang", "ar");
        translate("ar", "lang-tag");
    });
    if (localStorage.getItem("lang") == "ar") {
        text.setAttribute("onload", " translate('ar', 'lang-tag')");
    } else {
        text.setAttribute("onload", " translate('en', 'lang-tag')");
    }
    //theme change
    if (localStorage.getItem("theme") === "theme-dark") {
        setTheme("theme-dark");
    } else {
        setTheme("theme-light");
    }
    //size change
    switch (localStorage.getItem("size")) {
        case 'xs':
            setSize("xs");
            break;
        case 's':
            setSize("s");
            break;
        case 'm':
            setSize("m");
            break;
        case 'l':
            setSize("l");
            break;
        case 'xl':
            setSize("xl");
            break;
        default:
            setSize("s");
    };
});
//change language
function translate(lng, tagAttr) {
    var translate = new Translate();
    translate.init(tagAttr, lng);
    translate.process();
    if (lng == "en") {
        $("#enTranslator").css({color: "var(--font-color)", "border-color": "var(--font-color)"});
        $("#arTranslator").css({ color: "var( --color-accent)", "border-color": "transparent" });
    }
    if (lng == "ar") {
        $("#arTranslator").css({color: "var(--font-color)", "border-color": "var(--font-color)"});
        $("#enTranslator").css({ color: "var( --color-accent)", "border-color": "transparent" });
    }
};


//change the direction of text depending on the language
function ar() {
    if (window.innerWidth > 576) {
        var list, i, switching, b, shouldSwitch;
        list = document.getElementById("navigation");
        switching = true;
        while (switching) {
            switching = false;
            b = list.getElementsByTagName("LI");
            for (i = 0; i < b.length - 1; i++) {
                shouldSwitch = false;
                if (b[i].value < b[i + 1].value) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                b[i].parentNode.insertBefore(b[i + 1], b[i]);
                switching = true;
            }
        }
        $("#navigation").appendTo(".collapse");
}     
};
function en() {
    var list, i, switching, b, shouldSwitch;
    list = document.getElementById("navigation");
    switching = true;
    while (switching) {
        switching = false;
        b = list.getElementsByTagName("LI");
        for (i = 0; i < b.length - 1; i++) {
            shouldSwitch = false;
            if (b[i].value > b[i + 1].value) {
                shouldSwitch = true;
                break;
            }
        };
        if (shouldSwitch) {
            b[i].parentNode.insertBefore(b[i + 1], b[i]);
            switching = true;
        };
    };
    $("#user").appendTo(".collapse");
};
//change size 
function sizeChange() {
    const range = document.querySelector("#font-size");
    let content = range.value;
    switch (content) {
        case '1':
            setSize("xs");
            break;
        case '2':
            setSize("s");
            break;
        case '3':
            setSize("m");
            break;
        case '4':
            setSize("l");
            break;
        case '5':
            setSize("xl");
            break;
        default:
            setSize("s");
    };
};
function setSize(size) {
    localStorage.setItem("size", size);
    text.className = size;
};
//change theme
function setTheme(themeName) {
    localStorage.setItem("theme", themeName);
    document.documentElement.className = themeName;
};
function toggleTheme() {
    if (localStorage.getItem("theme") === "theme-dark") {
        setTheme("theme-light");
        window.location.reload('dashboared.php');
    } else {
        setTheme("theme-dark");
        window.location.reload('dashboared.php');
    }
};