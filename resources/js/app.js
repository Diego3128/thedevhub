import './bootstrap';

document.addEventListener('DOMContentLoaded', startApp);

function startApp() {
    dropDown();
}


function dropDown() {
    const dropdownButton = document.getElementById('dropdownButton') || null;
    if (!dropdownButton) return;

    dropdownButton.addEventListener('click', showOptions);

    dropdownButton.addEventListener('mouseenter', showOptions);

    function showOptions() {
        let dropDownMenu = document.getElementById('dropdownMenu');
        dropDownMenu.classList.toggle('hidden');
    }

    document.addEventListener('click', function (event) {
        let dropDownMenu = document.getElementById('dropdownMenu');
        let dropdownButton = document.getElementById('dropdownButton');

        if (!dropDownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
            dropDownMenu.classList.add('hidden');
        }
    });
}
