import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css"; // Import styles

document.addEventListener('DOMContentLoaded', startApp);

function startApp() {
    dropDown();

    startDropzone();

    cleanAlerts();
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

function startDropzone() {
    if (document.querySelector('#dropzone-form')) {

        Dropzone.autoDiscover = false;

        let myDropzone = new Dropzone("#dropzone-form", {
            dictDefaultMessage: "Upload your image here or click to upload",
            dictRemoveFile: "Remove",
            paramName: "post_image",
            addRemoveLinks: true,
            maxFilesize: 2,
            maxFiles: 1,
            uploadMultiple: false,
            acceptedFiles: ".png, .jpg, .jpeg",
            init: function () {
                // recover previous image
                const imageInput = document.querySelector("#image");
                if (!imageInput.value) return;
                const previousImage = {
                    size: 2000,
                    name: imageInput.value.trim() || ''
                }
                this.options.addedfile.call(this, previousImage);
                this.options.thumbnail.call(this, previousImage, `/storage/uploads/${previousImage.name}`);
                previousImage.previewElement.classList.add('dz-success', 'dz-complete');
            }
        }) || null;

        myDropzone.on('success', function (file, response) {
            // disable once an image has been uploaded
            if (myDropzone.files.length > 0) myDropzone.disable();
            // add image name to the hidden input
            if (response.status === 200) {
                const imageName = response.name;
                const imageInput = document.querySelector("#image");
                imageInput.value = imageName;
            }

        })
        myDropzone.on('removedfile', function () {
            if (myDropzone.files.length < 1) myDropzone.enable();
            // re-start the input value
            const imageInput = document.querySelector("#image");
            imageInput.value = "";
        })
    }
}

function cleanAlerts() {
    const successAlert = document.querySelector('.alert') || null;
    if (successAlert) {
        setTimeout(() => successAlert.remove(), 6000)
    }
}
