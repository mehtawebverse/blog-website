$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});


// script.js

// Array to store dynamically added tags
// var userAddedTags = [];

// // Function to populate options dynamically
// function populateTags() {
//     var selectElement = document.getElementById("tagsSelect");

//     // Clear existing options
//     selectElement.innerHTML = "";

//     // Add options from userAddedTags
//     userAddedTags.forEach(function (tag) {
//         var option = document.createElement("option");
//         option.value = tag;
//         option.text = tag;
//         selectElement.appendChild(option);
//     });

//     // Initialize Select2 after options are added
//     $(".js-example-basic-multiple").select2();
// }

// // Function to add a new tag
// function addNewTag() {
//     var newTagInput = document.getElementById("newTagInput");
//     var newTag = newTagInput.value.trim();

//     // Check if the tag is not empty and not already added
//     if (newTag !== "" && userAddedTags.indexOf(newTag) === -1) {
//         // Add the new tag to the array
//         userAddedTags.push(newTag);

//         // Clear the input field
//         newTagInput.value = "";

//         // Repopulate the dropdown with updated options
//         populateTags();
//     }
// }

// // Call the function to populate options when the page is ready
// document.addEventListener("DOMContentLoaded", function () {
//     populateTags();
// });
