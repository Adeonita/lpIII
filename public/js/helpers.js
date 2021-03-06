const onlyNumber = document.querySelectorAll(".only-number");
const onlyLetter = document.querySelectorAll(".only-letter");

onlyNumber.forEach(input => {
    input.addEventListener(
        "keypress",
        function(e) {
            const isDigit = /\d/u.test(e.key);

            if (!isDigit) {
                e.preventDefault();
            }
        }
    );
});

onlyLetter.forEach(input => {
    input.addEventListener(
        "keypress",
        function(e) {
            const isLetter = /[A-Za-z]/u.test(e.key);

            if (!isLetter) {
                e.preventDefault();
            }
        }
    );
});

function checkFieldsById(field, fieldControl) {
    var fieldValue = document.getElementById(`${field}`);
    var fieldValueControl = document.getElementById(`${fieldControl}`);
    var isValid = fieldValue.value == fieldValueControl.value;
    if (!isValid) {
        fieldValue.classList.add("is-invalid");
        fieldValueControl.classList.add("is-invalid");
    } else {
        fieldValue.classList.remove("is-invalid");
        fieldValueControl.classList.remove("is-invalid");
    }
    return isValid;
}

function getLocalUser() {
    return localStorage.getItem('userName');
}

function getLocalUserId() {
    return localStorage.getItem('userId');
}

function getLocalUserDepartment() {
    return localStorage.getItem('departmentId');

}

function updateUserName(username) {
    localStorage.setItem('userName', username);
}


function getDeliveryAddress() {
    return localStorage.getItem("deliveryAddress");
}

function statusCart(status) {
    if (status === "in_separation")
        return "Separação"
}

function formatMoney(input) {
    return input.toFixed(2).replace('.', ',');
}


function addItemToCart(product, quantity) {


    let cart = JSON.parse(localStorage.getItem('cestaCart'));
    if (!cart) {
        cart = []
    }
    const productExist = cart.find(i => i.product.id === product.id)
    if (productExist) {
        const index = cart.indexOf(productExist)
        productExist.quantity = Number(productExist.quantity) + Number(quantity)
        cart[index] = productExist;
    } else {
        cart.push({
            product,
            quantity
        })
    }
    localStorage.setItem('cestaCart', JSON.stringify(cart));

}