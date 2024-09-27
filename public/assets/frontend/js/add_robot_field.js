var messageInput = document.createElement("input");
messageInput.setAttribute("type", "text");
messageInput.setAttribute("name", "robot_field");
messageInput.setAttribute("class", "d-none")
messageInput.setAttribute("placeholder", "Enter your message");

var guestbookForm = document.querySelector('.guestbook_form_wrapper form');
if (guestbookForm)
    guestbookForm.insertBefore(messageInput, guestbookForm.lastElementChild.previousElementSibling);

//books
var guestTypeInput = document.createElement("input");
guestTypeInput.setAttribute("type", "text");
guestTypeInput.setAttribute("name", "guest_type");
guestTypeInput.setAttribute("class", "d-none")
guestTypeInput.setAttribute("value", guest_type);

var guestbookForm = document.querySelector('.guestbook_form_wrapper form');
if (guestbookForm)
    guestbookForm.insertBefore(guestTypeInput, guestbookForm.lastElementChild.previousElementSibling);

//rsvp
var guestTypeRsvpInput = document.createElement("input");
guestTypeRsvpInput.setAttribute("type", "text");
guestTypeRsvpInput.setAttribute("name", "guest_type");
guestTypeRsvpInput.setAttribute("class", "d-none")
guestTypeRsvpInput.setAttribute("value", guest_type);

var rsvpForm = document.querySelector('#cardRSVP form');
if (rsvpForm)
    rsvpForm.insertBefore(guestTypeRsvpInput, rsvpForm.lastElementChild?.previousElementSibling);

//gift angpo
var guestTypeAngpaoInput = document.createElement("input");
guestTypeAngpaoInput.setAttribute("type", "text");
guestTypeAngpaoInput.setAttribute("name", "guest_type");
guestTypeAngpaoInput.setAttribute("class", "d-none")
guestTypeAngpaoInput.setAttribute("value", guest_type);

var angpaoForm = document.querySelector('.angpao form');
if (angpaoForm)
    angpaoForm.insertBefore(guestTypeAngpaoInput, angpaoForm.lastElementChild.previousElementSibling);

// function addMaxLengthInput() {
var countCharInput = document.createElement("input");
countCharInput.setAttribute("type", "number");
countCharInput.setAttribute("id", "comment_length");
countCharInput.setAttribute("name", "comment_length");
countCharInput.setAttribute("class", "d-none")
countCharInput.setAttribute("value", 0);
countCharInput.setAttribute("data-stepper_id", "{{$stepper->stepper_domain->id}}");
var guestbookForm = document.querySelector('.guestbook_form_wrapper form');
if (guestbookForm)
    guestbookForm.insertBefore(countCharInput, guestbookForm.lastElementChild.previousElementSibling);
// }

// addMaxLengthInput();

function setMaxCharacters(textareaName, maxCharacters) {
    var charCountContainer = document.createElement("div");
    charCountContainer.id = "charCountContainer";
    // charCountContainer.style.marginTop = 0;
    charCountContainer.style.marginBottom = "3px";

    var textarea = document.getElementsByName(textareaName)[0];
    textarea.maxLength = maxCharacters;
    var inputGroupDiv = textarea.closest('.mb-3');
    if (inputGroupDiv) {
        inputGroupDiv.classList.add('textarea-wrapper');
        inputGroupDiv.classList.remove('mb-3')
        inputGroupDiv.insertAdjacentElement('afterend', charCountContainer);
    } else {
        textarea.parentNode.insertBefore(charCountContainer, textarea.nextSibling);
    }
    var bodyColor = getComputedStyle(document.body).color;

    var charCount = document.createElement("div");
    charCount.id = "charCount";
    charCount.textContent = `${(invitation_lang == 'en' ? 'Characters left' : 'Huruf yang Tersisa')}: ${maxCharacters}`;
    charCount.style.textAlign = "left";
    // charCount.style.color = bodyColor;
    // charCount.style.marginTop = 0;
    charCountContainer.appendChild(charCount);

    var currentCharacters = 0;
    textarea.addEventListener("input", function () {
        currentCharacters = this.value.length;
        countCharInput.setAttribute("value", parseInt(currentCharacters));
        charCount.textContent = `${(invitation_lang == 'en' ? 'Characters left' : 'Huruf yang Tersisa')}: ${(maxCharacters - currentCharacters)}`;
    });

    textarea.addEventListener("keyup", function () {
        countCharInput.setAttribute("value", parseInt(textarea.value.length));
    })

    var btnForm = document.getElementById("guestbook_form");
    btnForm.addEventListener("click", function (event) {
        if (countCharInput.value != currentCharacters) {
            alert("Kamu telah melakukan pengeditan Form! ");
            event.preventDefault();
        }
    })
}
//console.log(stepper_id);
if (stepper_id !== 9787) {
    if (guestbookForm)
        setMaxCharacters("comment", 300);
}
const guestName = document.querySelector('h6.greeting-name-text');
const leftContent = document.querySelector('h6.left');
const svg = document.querySelector('h6 span.ml-2');
if (svg) {
    if (guestName) {
        guestName.style.display = 'flex';
        guestName.style.flexWrap = 'wrap';
        guestName.style.alignItems = 'center';
        // guestName.style.lineHeight = '45px';
        svg.style.marginLeft = '0.5rem';
        if (!leftContent)
            guestName.style.justifyContent = 'center';
    }
}


// change theme
// function changeTheme() {
//     fetch('/test-theme')
//         .then(response => response.json())
//         .then(data => {
//             console.log('API response:', data);
//             location.reload()
//         })
//         .catch(error => {
//             console.error('Error calling the API:', error);
//             location.reload()
//         });

// }
// setInterval(changeTheme, 10000)
