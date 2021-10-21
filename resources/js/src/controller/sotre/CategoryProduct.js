import axios from "axios";
import DateValidate from "../../util/DateValidate";
export default class CategoryProduct {
    constructor() {
        this.initElements();
    }



    initElements() {

        const cards = document.querySelectorAll("#sidenavCard");

        const arr = []
        cards.forEach(card => {

            var btnCard = card.querySelector("Button")
            var inpCard = card.querySelector('input')

            btnCard.addEventListener('click', e => {
                e.preventDefault()
                this.addToCart(card, arr);



            });




        });

        $(document).ready(function () {
            $('.num-in span').click(function () {
                var $input = $(this).parents('.num-block').find('input.in-num');
                $input.attr('value', 0)
                if ($(this).hasClass('minus')) {
                    var count = parseFloat($input.val()) - 1;
                    count = count < 1 ? 1 : count;
                    if (count < 2) {
                        $(this).addClass('dis');
                    } else {
                        $(this).removeClass('dis');
                    }
                    $input.val(count);
                } else {
                    var count = parseFloat($input.val()) + 1
                    $input.val(count);

                    $input.attr('value', count)
                    if (count > 1) {
                        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                    }
                }

                $input.change();
                return false;
            });

        });
        /////////////////// product +/-


    }


    addToCart(card, arr, numArr) {

        // pegando os valores dos cards
        var title = card.querySelector("h6");
        var desc = card.querySelector("p");
        var qtd = card.querySelector("input");
        var img = card.querySelector("img");
        var value = card.querySelector("#value-prod");

        var titleProd = title.innerHTML
        var descProd = desc.innerHTML
        var qtsProd = qtd.value
        var imgProd = img.src
        var valueProd = value.innerHTML

        const objCard = { titleProd, descProd, qtsProd, imgProd, valueProd }



        if (qtsProd == "") {
            alert('quantidade não pode ser vazia')
            return
        }
        else {


            arr.push(objCard);

            this.notifyAddToCard(objCard);
            this.addBag(arr);
            this.addTemplateToCart(objCard);
            this.addToShoppingCard(objCard, arr);


        }

    }

    removeToCart(card, arr, numArr) {


        const objCard = { titleProd, descProd, qtsProd }
        arr.pop(objCard);


    }

    notifyAddToCard(objCard) {



        var toastElList = [].slice.call(document.querySelectorAll('#liveToast'))
        var toastList = toastElList.map(function (toastEl) {
            var strong = toastEl.querySelector('strong');
            strong.innerHTML = `${objCard.qtsProd} item de ${objCard.titleProd} foi adcionado `
            return new bootstrap.Toast(toastEl).show()
        })
    }


    addBag(arr) {
        const arrTotal = []
        const cartIcon = document.querySelector("#cart-icon");
        var spanCart = cartIcon.querySelector("span");
        var divQtdItem = document.querySelectorAll("#all-qts-item");

        arr.forEach(el => {
            arrTotal.push(parseInt(el.qtsProd))
        })
        var totalValCar = this.calcTotal(arrTotal);

        spanCart.innerHTML = totalValCar
        divQtdItem.forEach(item => {
            item.innerHTML = `${totalValCar} itens`
        })
    }



    calcTotal(arrTotal) {
        var soma = 0

        for (let index = 0; index < arrTotal.length; index++) {
            soma += arrTotal[index];
        }

        return soma
    }

    calcRemove(arrTotal) {
        var soma = 0

        for (let index = 0; index < arrTotal.length; index++) {
            soma -= arrTotal[index];
        }

        return soma
    }

    addTemplateToCart(objInfo) {
        var li = document.createElement("li");
        var cardAtual = document.querySelector("#cart-atual");
        li.classList.add('mb-2', 'list-unstyled');
        var valurItens = parseInt(objInfo.qtsProd);
        var ens = ''
        if (valurItens > 1) {
            ens = 'ens'
        } else {
            ens = 'em'
        }
        li.innerHTML = `
        <a class="dropdown-item border-radius-md" href="javascript:;">
            <div class="d-flex py-1">
                <div class="my-auto">
                    <img src="${objInfo.imgProd}" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">${objInfo.qtsProd} it${ens} adcionado de: </span> ${objInfo.titleProd}
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        Adcionado agora
                    </p>
                </div>
            </div>
        </a>
    
`


        cardAtual.appendChild(li)
    }


    addToShoppingCard(obj, arr) {

        const cardShopp = document.querySelector("#shopp-card");
        var valueProd = obj.valueProd
        const arrModelMsg = [];
        const arrModelDiv = [];


        arr.forEach((el, i) => {
            const titleProd = el.titleProd;
            const imgProd = el.imgProd;
            const descProd = el.descProd;
            const qtsProd = el.qtsProd;
            const valueProd = el.valueProd;

            var div = document.createElement('div');
            var msgModel = document.createElement('div');

            msgModel = `
            <div class="row main align-items-center p-4">
            <div class="col-6 col-md-2">
            <img class="img-fluid" src="${imgProd}">
            </div>
            <div class="col">
                <div class="row text-muted">${titleProd}</div>
                <div class="row">${descProd}</div>
            </div>
            <div class="col d-flex justify-content-center pe-4">
            <span>QTD: </span>
               <span  class="ms-1"> ${qtsProd}</span>
        </div>
            <div class="col d-flex justify-content-center">
               R$ ${valueProd},00
    
            </div>
            <div  class="col d-flex justify-content-end pe-4">
                <button id="remove-item" class="btn close cursor-pointer">
                    <i class="fas fa-trash-alt fs-4"></i>
                </button>
            </div>
            </div>
            `
            div.innerHTML = msgModel



            arrModelMsg.push(msgModel);
            arrModelDiv.push(div)


            const result = arrModelMsg.join(' ')

            cardShopp.innerHTML = result;

            var btnRemoveItem = document.querySelectorAll("#remove-item");
            btnRemoveItem.forEach(btns => {
                btns.addEventListener('click', e => {
                    arr.splice(i, 1)
                    arrModelMsg.splice(i, 1);
                    const result = arrModelMsg.join(' ')

                    cardShopp.innerHTML = result;

                })

            })

        })

        console.log(arr)





    }

}

