const thumbnailContainers = document.querySelectorAll(".thumbnail-container");

thumbnailContainers.forEach(thumbnailContainer => {
    thumbnailContainer.addEventListener("mousemove", event => {
        const largeImageContainer = thumbnailContainer.querySelector(".large-image-container");
        largeImageContainer.style.top = (event.clientY + -180) + "px";
        largeImageContainer.style.left = (event.clientX + 10) + "px";
    });
});
