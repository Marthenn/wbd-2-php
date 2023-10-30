const addButton = document.querySelector('#save-changes-author');
const nameInput = document.querySelector('#name');
const descInput = document.querySelector('#description');
const addAuthorForm = document.getElementById('add-author-form');

const redirectToAuthorList = () => {
    location.replace('/public/authorlist');
}

const disableAllInputs = () => {
    const allInputs = document.querySelectorAll('input');
    allInputs.forEach((button) => {
        button.disabled = true;
    });
    addButton.disabled = true;
    descInput.disabled = true;
}

addButton && addButton.addEventListener(
    'click', (e) => {
        e.preventDefault();
        if (addAuthorForm.checkValidity()) {
            const formData = new FormData();
            formData.append('name', nameInput.value);
            formData.append('description', descInput.value);
            
            const xhr = new XMLHttpRequest();
            xhr.open("POST", `/public/addauthor/add`);
            xhr.send(formData);

            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE){
                    if (this.status === 200){
                        console.log(this.responseText);
                        disableAllInputs();
                        const right_button_param = {
                            text : 'Go Back',
                            functionality : redirectToAuthorList
                        }
                        const flash = document.getElementById('flash-message');
                        if (flash.firstChild) {
                            for (let i = 0; i < flash.childNodes.length; i++) {
                                flash.removeChild(flash.childNodes[i]);
                            }
                        }
                        flash.appendChild(make_flash("Author has been added!", "success", null, right_button_param));
                    } else {
                        const data = JSON.parse(this.responseText);
                        const flash = document.getElementById('flash-message');
                        if (flash.firstChild) {
                            for (let i = 0; i < flash.childNodes.length; i++) {
                                flash.removeChild(flash.childNodes[i]);
                            }
                        }
                        flash.appendChild(make_flash(data.message, data.type));
                    }
                }
            }
        } else {
            const flash = document.getElementById('flash-message');
            if (flash.firstChild) {
                for (let i = 0; i < flash.childNodes.length; i++) {
                    flash.removeChild(flash.childNodes[i]);
                }
            }
            flash.appendChild(make_flash("Please input the required data", "danger"));
    }
}
)