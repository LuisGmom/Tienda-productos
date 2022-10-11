var carrito = [''];

function articulo(){

    const producto = document.querySelector('.card-product');
    //console.log(producto);
    carrito.push(producto);

    
}
console.log(carrito);
//console.log('carrito');

function guardar (){
    localStorage.setItem('carrito', carrito);
}

function visualizar () {
    var peticion = localStorage.getItem('carrito');
    document.querySelector('.informacion').innerHTML = peticion;

}



