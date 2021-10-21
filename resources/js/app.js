require('./bootstrap');

import SettingsController from './src/controller/site/SettingsController';
import StoreController from './src/controller/site/StoreController';
import CategoryProduct from './src/controller/sotre/CategoryProduct';
// site
if (document.querySelector("#my-store") != null) {

    const store = new StoreController
}

if (document.querySelector("#settings") != null) {

    const store = new SettingsController
}


if(document.querySelector("#show-category-store") != null){

    const  showStore = new CategoryProduct
}