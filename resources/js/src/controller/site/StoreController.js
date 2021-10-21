import axios from "axios";

export default class StoreController {
    constructor() {
        this.updateProfileStore();
    }



    updateProfileStore() {
        const btn = document.querySelector('#btn-update-photo')
        const inp = document.querySelector("#input-update-photo");
        const form = document.querySelector("form")

        btn.addEventListener('click', e => {
            inp.click();
        });

    }
}

