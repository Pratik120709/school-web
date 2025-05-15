!function () {
    "use strict";

    if (window.sessionStorage) {
        var t = sessionStorage.getItem("is_visited");
        if (t) {
            switch (t) {
                case "light-mode-switch":
                    document.documentElement.removeAttribute("dir");
                    updateStyle("/assets/css/bootstrap.min.css", "bootstrap-style", "/assets/css/bootstrap.min.css");
                    updateStyle("/assets/css/app.min.css", "app-style", "/assets/css/app.min.css");
                    document.documentElement.setAttribute("data-bs-theme", "light");
                    break;
                case "dark-mode-switch":
                    document.documentElement.removeAttribute("dir");
                    updateStyle("/assets/css/bootstrap.min.css", "bootstrap-style", "/assets/css/bootstrap.min.css");
                    updateStyle("/assets/css/app.min.css", "app-style", "/assets/css/app.min.css");
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                    break;
                case "rtl-mode-switch":
                    updateStyle("/assets/css/bootstrap-rtl.min.css", "bootstrap-style", "/assets/css/bootstrap-rtl.min.css");
                    updateStyle("/assets/css/app-rtl.min.css", "app-style", "/assets/css/app-rtl.min.css");
                    document.documentElement.setAttribute("dir", "rtl");
                    document.documentElement.setAttribute("data-bs-theme", "light");
                    break;
                case "dark-rtl-mode-switch":
                    updateStyle("/assets/css/bootstrap-rtl.min.css", "bootstrap-style", "/assets/css/bootstrap-rtl.min.css");
                    updateStyle("/assets/css/app-rtl.min.css", "app-style", "/assets/css/app-rtl.min.css");
                    document.documentElement.setAttribute("dir", "rtl");
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                    break;
                default:
                    console.log("Something wrong with the layout mode.");
            }
        }
    }

    function updateStyle(expectedHref, elementId, newHref) {
        var element = document.getElementById(elementId);
        if (element && expectedHref !== element.getAttribute("href")) {
            element.setAttribute("href", newHref);
        }
    }
}(window.jQuery);