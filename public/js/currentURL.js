const currentUrl = window.location.href;

// Funkcja do ustawienia aktywnego linku
function setActiveLink() {
    const links = document.querySelectorAll('.nav-table a');

    links.forEach(function(link) {
        var href = link.href;

        // Sprawdzenie czy aktualny URL zawiera href linku
        if (currentUrl.includes(href)) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

setActiveLink();