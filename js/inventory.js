let body = document.querySelector('body');
let listProductHTML = document.querySelector('.item-row');
let listLiquidProductsHTML = document.getElementById('Liquid');
let listPowderProductsHTML = document.getElementById('Powder');
let listSoftenersProductsHTML = document.getElementById('Softeners');
let listOthersProductsHTML = document.getElementById('Others');
let listInventoryHTML = document.querySelector('.itemlist');
let submitButton = document.querySelector('.submit');
let cancelButton = document.querySelector('.cancel');

let listProducts = [];
let PowderProducts = [];
let LiquidProducts = [];
let SoftenersProducts = [];
let OthersProducts = [];

let inventory = [];

let idAmountDict = {};

/*-----------FETCH--------------*/
function fetchProducts() {
    fetch('../json/product.json')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                switch (item.category) {
                    case 'Liquid':
                        LiquidProducts.push(item);
                        listProducts.push(item);
                        break;
                    case 'Powder':
                        PowderProducts.push(item);
                        listProducts.push(item);
                        break;
                    case 'Softeners':
                        SoftenersProducts.push(item);
                        listProducts.push(item);
                        break;
                    case 'Others':
                        OthersProducts.push(item);
                        listProducts.push(item);
                        break;
                    default:
                        break;
                }
            });
            console.log("Liquid Products:", LiquidProducts);
            console.log("Powder Products:", PowderProducts);
            console.log("Softeners Products:", SoftenersProducts);
            console.log("Other Products:", OthersProducts);
            console.log("Product", listProducts);
            addDataToHTML();

        })
        .catch(error => console.error('Error fetching products:', error));
}

document.addEventListener("DOMContentLoaded", function() {
    fetchProducts();
    addDataToHTML();

    listLiquidProductsHTML.addEventListener('click', (event) => {
        let positionclick = event.target;
        let product_id = positionclick.parentElement.parentElement.parentElement.dataset.id;
        let product_Quantity = idAmountDict[product_id];
        if (product_Quantity === undefined) {
            product_Quantity = positionclick.parentElement.parentElement.parentElement.dataset.Quantity;
        }
        if (positionclick.classList.contains('add')) {
            addtoInventory(product_id, product_Quantity);
        }
        if (positionclick.classList.contains('remove')) {
            removeFromInventory(product_id);
        }
    });

    listPowderProductsHTML.addEventListener('click', (event) => {
        let positionclick = event.target;
        let product_id = positionclick.parentElement.parentElement.parentElement.dataset.id;
        let product_Quantity = idAmountDict[product_id];
        if (product_Quantity === undefined) {
            product_Quantity = positionclick.parentElement.parentElement.parentElement.dataset.Quantity;
        }
        if (positionclick.classList.contains('add')) {
            addtoInventory(product_id, product_Quantity);
        }
        if (positionclick.classList.contains('remove')) {
            removeFromInventory(product_id);
        }
    });

    listSoftenersProductsHTML.addEventListener('click', (event) => {
        let positionclick = event.target;
        let product_id = positionclick.parentElement.parentElement.parentElement.dataset.id;
        let product_Quantity = idAmountDict[product_id];
        if (product_Quantity === undefined) {
            product_Quantity = positionclick.parentElement.parentElement.parentElement.dataset.Quantity;
        }
        if (positionclick.classList.contains('add')) {
            addtoInventory(product_id, product_Quantity);
        }
        if (positionclick.classList.contains('remove')) {
            removeFromInventory(product_id);
        }
    });

    listOthersProductsHTML.addEventListener('click', (event) => {
        let positionclick = event.target;
        let product_id = positionclick.parentElement.parentElement.parentElement.dataset.id;
        let product_Quantity = idAmountDict[product_id];
        if (product_Quantity === undefined) {
            product_Quantity = positionclick.parentElement.parentElement.parentElement.dataset.Quantity;
        }
        if (positionclick.classList.contains('add')) {
            addtoInventory(product_id, product_Quantity);
        }
        if (positionclick.classList.contains('remove')) {
            removeFromInventory(product_id);
        }
    });

    submitButton.addEventListener("click", SubmitInventory);
    cancelButton.addEventListener("click", CancelInventory);
});

/*----------------LIQUID PRODUCTS-----------------*/
function addLiquidProductsToHTML() {
    listLiquidProductsHTML.innerHTML = '';
    if (LiquidProducts.length > 0) {
        LiquidProducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.dataset.Quantity = product.Quantity;
            newProduct.classList.add('card');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="Example Image">
                <div class="card-content">
                    <h3>${product.name}</h3>
                    <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                    </div>
                </div>`;
            listLiquidProductsHTML.appendChild(newProduct);
        });
    }
}

/*----------------POWDER PRODUCTS-----------------*/
function addPowderProductsToHTML() {
    listPowderProductsHTML.innerHTML = '';
    if (PowderProducts.length > 0) {
        PowderProducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.classList.add('card');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="Example Image">
                <div class="card-content">
                    <h3>${product.name}</h3>
                    <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                    </div>
                </div>`;
            listPowderProductsHTML.appendChild(newProduct);
        });
    }
}

/*----------------SOFTENERS PRODUCTS-----------------*/
function addSoftenersProductsToHTML() {
    listSoftenersProductsHTML.innerHTML = '';
    if (SoftenersProducts.length > 0) {
        SoftenersProducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.classList.add('card');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="Example Image">
                <div class="card-content">
                    <h3>${product.name}</h3>
                    <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                    </div>
                </div>`;
            listSoftenersProductsHTML.appendChild(newProduct);
        });
    }
}

function addOthersProductsToHTML() {
    listOthersProductsHTML.innerHTML = '';
    if (OthersProducts.length > 0) {
        OthersProducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.classList.add('card');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="Example Image">
                <div class="card-content">
                    <h3>${product.name}</h3>
                    <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                    </div>
                </div>`;
            listOthersProductsHTML.appendChild(newProduct);
        });
    }
}

function addDataToHTML() {
    addLiquidProductsToHTML();
    addPowderProductsToHTML();
    addSoftenersProductsToHTML();
    addOthersProductsToHTML();
}

const addtoInventory = (product_id, product_Quantity) => {
    const quantityInteger = parseInt(product_Quantity);
    let positionofproduct = inventory.findIndex((value) => value.product_id == product_id);
    if (inventory.length <= 0) {
        inventory = [{
            product_id: product_id,
            product_Quantity: quantityInteger,
            quantity: 0
        }]
    } else if (positionofproduct < 0) {
        inventory.push({
            product_id: product_id,
            product_Quantity: quantityInteger,
            quantity: 0
        });
    } else {
        inventory[positionofproduct].quantity = inventory[positionofproduct].quantity + 1;
    }
    addInventoryToHTML();
}

const addInventoryToHTML = () => {
    listInventoryHTML.innerHTML = '';
    if (inventory.length > 0) {
        inventory.forEach(item => {
            let newitem = document.createElement('div');
            newitem.classList.add('item');
            newitem.dataset.id = item.product_id;
            let position = listProducts.findIndex((value) => value.id == item.product_id);
            let info = listProducts[position];
            let productQuantity = idAmountDict[item.product_id] !== undefined ? idAmountDict[item.product_id] : info.Quantity;
            newitem.innerHTML = `
            <div class="product">
                    <img src="${info.image}" alt="">
                </div>
                <div class="Stock">
                    ${productQuantity}
                </div>
                <div class="item-quantity">
                    <span class="minus"><</span>
                    <span>${item.quantity}</span>
                    <span class="plus">></span>
                </div>
                <div class="total">
                    ${item.quantity + productQuantity}
                </div>`;
            listInventoryHTML.appendChild(newitem);
        })
    }
}

const removeInventoryFromHTML = () => {
    inventory.length = 0;
    listInventoryHTML.innerHTML = '';
};

listInventoryHTML.addEventListener('click', (event) => {
    let positionclick = event.target;
    if (positionclick.classList.contains('minus') || positionclick.classList.contains('plus')) {
        let product_id = positionclick.parentElement.parentElement.dataset.id;
        let type = 'minus';
        if (positionclick.classList.contains('plus')) {
            type = 'plus';
        }
        changeQuantity(product_id, type);
    }
});

const changeQuantity = (product_id, type) => {
    let positionItem = inventory.findIndex((value) => value.product_id == product_id);
    if (positionItem >= 0) {
        let negativeThreshold = -1 * (idAmountDict[product_id] || 0);
        switch (type) {
            case 'plus':
                inventory[positionItem].quantity += 1;
                break;
            default:
                let valueChange = inventory[positionItem].quantity - 1;
                if (valueChange >= negativeThreshold) {
                    inventory[positionItem].quantity = valueChange;
                }
                break;
        }
    }
    addInventoryToHTML();
};

const removeFromInventory = (product_id) => {
    let positionOfProduct = inventory.findIndex((value) => value.product_id == product_id);
    if (positionOfProduct >= 0) {
        if (inventory[positionOfProduct].quantity > 1) {
            inventory[positionOfProduct].quantity -= 1;
        } else {
            inventory.splice(positionOfProduct, 1);
        }
        addInventoryToHTML();
    } else {
        console.log("Product not found in inventory.");
    }
};

function SubmitInventory() {
    if (inventory.length > 0) {
        inventory.forEach(item => {
            let id = item.product_id;
            let amount = item.quantity + item.product_Quantity;
            idAmountDict[id] = amount;
        })
        console.log(idAmountDict);
    }
    removeInventoryFromHTML();
}

function CancelInventory() {
    removeInventoryFromHTML();
}
