
const selectElement = document.querySelector(".type__switcher");

const custom__input__container = document.querySelector(".custom__form__group");

selectElement.addEventListener('change', (event) => {

    const value = selectElement.options[selectElement.selectedIndex].text;

    custom__input__container.replaceChildren();

    if (value === 'Book'){
        const weight__input = document.createElement("input");
        weight__input.setAttribute('type', 'number');
        weight__input.setAttribute('name', 'weight');
        weight__input.setAttribute('id', 'weight');
        weight__input.setAttribute('class', 'input__name');
        weight__input.setAttribute("required","");

        custom__input__container.innerHTML += "<div  class=\"form__group form__group__container__weight\"></div>";
        const custom__input__container__weight = document.querySelector(".form__group__container__weight");

        const weight__label = document.createElement("label");
        weight__label.setAttribute("for",'weight');
        weight__label.setAttribute("class",'input__name');
        weight__label.innerHTML = "Weight";
        custom__input__container__weight.appendChild(weight__label);
        custom__input__container__weight.appendChild(weight__input);

    } else if(value === 'Dvd') {
        const size__input = document.createElement("input");
        size__input.setAttribute('type', 'number');
        size__input.setAttribute('name', 'size');
        size__input.setAttribute('id', 'size');
        size__input.setAttribute('class', 'input__name');
        size__input.setAttribute('required', '');

        custom__input__container.innerHTML += "<div  class=\"form__group form__group__container__size\"></div>";
        const custom__input__container__size = document.querySelector(".form__group__container__size");

        const size__label = document.createElement("label");
        size__label.setAttribute("for",'size');
        size__label.setAttribute("class",'input__name');
        size__label.innerHTML = "Size";
        custom__input__container__size.appendChild(size__label);
        custom__input__container__size.appendChild(size__input);

    } else if(value === 'Furniture'){
        const height__input = document.createElement("input");
        height__input.setAttribute('type', 'number');
        height__input.setAttribute('name', 'height');
        height__input.setAttribute('id', 'height');
        height__input.setAttribute('class', 'input__name');
        height__input.setAttribute('required', '');

        const width__input = document.createElement("input");
        width__input.setAttribute('type', 'number');
        width__input.setAttribute('name', 'width');
        width__input.setAttribute('id', 'width');
        width__input.setAttribute('class', 'input__name');
        width__input.setAttribute('required', '');

        const length__input = document.createElement("input");
        height__input.setAttribute('type', 'number');
        length__input.setAttribute('name', 'length');
        length__input.setAttribute('id', 'length');
        length__input.setAttribute('class', 'input__name');
        length__input.setAttribute('required', '');


        custom__input__container.innerHTML += "<div  class=\"form__group form__group__container__height\"></div>";
        const custom__input__container__height = document.querySelector(".form__group__container__height");

        const height__label = document.createElement("label");
        height__label.setAttribute("for",'height');
        height__label.setAttribute("class",'input__name');
        height__label.innerHTML = "Height";
        custom__input__container__height.appendChild(height__label);
        custom__input__container__height.appendChild(height__input);


        custom__input__container.innerHTML += "<div  class=\"form__group form__group__container__width\"></div>";
        const custom__input__container__width = document.querySelector(".form__group__container__width");

        const width__label = document.createElement("label");
        width__label.setAttribute("for",'width');
        width__label.setAttribute("class",'input__name');
        width__label.innerHTML = "Width";
        custom__input__container__width.appendChild(width__label);
        custom__input__container__width.appendChild(width__input);


        custom__input__container.innerHTML += "<div  class=\"form__group form__group__container__length\"></div>";
        const custom__input__container__length = document.querySelector(".form__group__container__length");

        const length__label = document.createElement("label");
        length__label.setAttribute("for",'length');
        length__label.setAttribute("class",'input__name');
        length__label.innerHTML = "Length";
        custom__input__container__length.appendChild(length__label);
        custom__input__container__length.appendChild(length__input);

    }
});


$("#save__btn").click(function(){
    $("#product__form").submit();
});



$(document).ready(function() {
    $("#product__form").validate({
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            sku : {
                required: true,
                minlength: 3,

            },
            name: {
                required: true,
                minlength: 3,
            },
            price: {
                required: true,
                number: true,
                min: 1
            },
        },
        messages : {
            sku: {
                required: "The SKU field is required",
                minlength: "The SKU entered must be at least 3 digits long",
            },
            name: {
                required: "The name field is required",
                minlength: "Enter only a-z/A-z / The entered name must contain at least 3 characters"
            },
            price: {
                required: "The name field is required",
                number: "The price entered must contain only numbers",
                min: "The price entered must be greater than 1"
            },

        }
    });
});