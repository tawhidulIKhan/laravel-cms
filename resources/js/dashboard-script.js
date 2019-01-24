// Thumbnail Functionality

let thumbUrl = document.querySelector("#thumbnail_url");
let thumb = document.querySelector("#thumbnail");
let form = document.querySelector("form");

if (thumbUrl) {
    if (thumbUrl.value) {
        thumb.setAttribute("disabled", true);
    }

    thumbUrl.addEventListener("focus", function() {
        thumb.setAttribute("disabled", true);
    });
}

if (thumbUrl) {
    thumbUrl.addEventListener(
        "blur",
        function() {
            if (this.value == "") {
                thumb.disabled = false;
            }
        },
        true
    );
}
// Thumbnail Functionality

let thumbUrl = document.querySelector("#thumbnail_url");
let thumb = document.querySelector("#thumbnail");
let form = document.querySelector("form");

if (thumbUrl) {
    if (thumbUrl.value) {
        thumb.setAttribute("disabled", true);
    }

    thumbUrl.addEventListener("focus", function() {
        thumb.setAttribute("disabled", true);
    });
}

if (thumbUrl) {
    thumbUrl.addEventListener(
        "blur",
        function() {
            if (this.value == "") {
                thumb.disabled = false;
            }
        },
        true
    );
}
