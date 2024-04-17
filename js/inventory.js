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

// Fetch products from JSON
function fetchProducts() {
    fetch('../json/product.json')
        .then(response => response.json())
        .then(data => {
            listProducts = data;
            categorizeProducts();
            console.log("Liquid Products:", LiquidProducts);
            console.log("Powder Products:", PowderProducts);
            console.log("Softeners Products:", SoftenersProducts);
            console.log("Other Products:", OthersProducts);
            addDataToHTML();
        })
        .catch(error => console.error('Error fetching products:', error));
}

// Categorize products based on type
function categorizeProducts() {
    listProducts.forEach(item => {
        switch (item.category) {
            case 'Liquid':
                LiquidProducts.push(item);
                break;
            case 'Powder':
                PowderProducts.push(item);
                break;
            case 'Softeners':
                SoftenersProducts.push(item);
                break;
            case 'Others':
                OthersProducts.push(item);
                break;
            default:
                break;
        }
    });
}

// Add products to HTML
function addDataToHTML() {
    addProductsToHTML(LiquidProducts, listLiquidProductsHTML);
    addProductsToHTML(PowderProducts, listPowderProductsHTML);
    addProductsToHTML(SoftenersProducts, listSoftenersProductsHTML);
    addProductsToHTML(OthersProducts, listOthersProductsHTML);
}

function addProductsToHTML(products, container) {
    if (!container) {
        console.error(`${container.id} element not found.`);
        return;
    }

    container.innerHTML = '';
    if (products.length > 0) {
        products.forEach(product => {
            let newProduct = createProductElement(product);
            container.appendChild(newProduct);
        });
    }
}

function createProductElement(product) {
    let newProduct = document.createElement('div');
    newProduct.dataset.id = product.id;
    newProduct.classList.add('card');
    newProduct.innerHTML = `
        <img src="${product.image}" alt="Example Image">
        <div class="card-content">
            <h3>${product.name}</h3>
            <div class="btn-section">
                <button type="button" class="remove">-</button>
                <button type="button" class="add">+</button>
            </div>
        </div>`;
    return newProduct;
}

// Event listeners for product buttons
function addProductEventListeners() {
    [listLiquidProductsHTML, listPowderProductsHTML, listSoftenersProductsHTML, listOthersProductsHTML].forEach(container => {
        container.addEventListener('click', (event) => {
            let target = event.target;
            if (target.classList.contains('add')) {
                addToInventory(target.parentElement.parentElement.dataset.id);
            } else if (target.classList.contains('remove')) {
                removeFromInventory(target.parentElement.parentElement.dataset.id);
            }
        });
    });
}

// Add product to inventory
function addToInventory(productId) {
    let product = listProducts.find(item => item.id === productId);
    if (product) {
        let inventoryItem = inventory.find(item => item.product_id === productId);
        if (inventoryItem) {
            inventoryItem.quantity++;
        } else {
            inventory.push({
                product_id: productId,
                product_Quantity: product.Quantity,
                quantity: 1
            });
        }
        addInventoryToHTML();
    }
}

// Remove product from inventory
function removeFromInventory(productId) {
    let index = inventory.findIndex(item => item.product_id === productId);
    if (index !== -1) {
        if (inventory[index].quantity > 1) {
            inventory[index].quantity--;
        } else {
            inventory.splice(index, 1);
        }
        addInventoryToHTML();
    }
}

// Add inventory to HTML
function addInventoryToHTML() {
    listInventoryHTML.innerHTML = '';
    inventory.forEach(item => {
        let product = listProducts.find(product => product.id === item.product_id);
        let productQuantity = idAmountDict[item.product_id] || product.Quantity;
        let newitem = document.createElement('div');
        newitem.classList.add('item');
        newitem.dataset.id = item.product_id;
        newitem.innerHTML = `
            <div class="product">
                <img src="${product.image}" alt="">
            </div>
            <div class="Stock">
                ${productQuantity}
            </div>
            <div class="item-quantity">
                <span class="minus">-</span>
                <span>${item.quantity}</span>
                <span class="plus">+</span>
            </div>
            <div class="total">
                ${item.quantity + productQuantity}
            </div>`;
        listInventoryHTML.appendChild(newitem);
    });
}

// Event listener for inventory quantity changes
listInventoryHTML.addEventListener('click', (event) => {
    let target = event.target;
    if (target.classList.contains('minus') || target.classList.contains('plus')) {
        let productId = target.parentElement.parentElement.dataset.id;
        let type = target.classList.contains('plus') ? 'plus' : 'minus';
        changeQuantity(productId, type);
    }
});

// Change inventory quantity
function changeQuantity(productId, type) {
    let inventoryItem = inventory.find(item => item.product_id === productId);
    if (inventoryItem) {
        let negativeThreshold = -1 * (idAmountDict[productId] || 0);
        if (type === 'plus') {
            inventoryItem.quantity++;
        } else {
            if (inventoryItem.quantity > negativeThreshold) {
                inventoryItem.quantity--;
            }
        }
        addInventoryToHTML();
    }
}

// Submit inventory
submitButton.addEventListener('click', () => {
    submitInventory();
});

function submitInventory() {
    if (inventory.length > 0) {
        inventory.forEach(item => {
            let amount = item.quantity + item.product_Quantity;
            idAmountDict[item.product_id] = amount;
        });
        console.log(idAmountDict);
        clearInventory();
    }
}

// Clear inventory
cancelButton.addEventListener('click', () => {
    clearInventory();
});

function clearInventory() {
    inventory.length = 0;
    listInventoryHTML.innerHTML = '';
}

// Initialize app
document.addEventListener('DOMContentLoaded', () => {
    fetchProducts().then(() => {
        addProductEventListeners();
        submitButton.addEventListener('click', () => {
            submitInventory();
        });

        cancelButton.addEventListener('click', () => {
            clearInventory();
        });
    });
});
