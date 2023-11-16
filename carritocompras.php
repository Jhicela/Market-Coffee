<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="app.js" async></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="../media/logo_café_-removebg-preview.png">
  <link rel="apple-touch-icon" type="image/png" href="../media/logo_café_-removebg-preview.png">
  <link rel="apple-touch-startup-image" type="image/png" href="../media/logo_café_-removebg-preview.png">

  <!--Styles Bootstrap 5.3.1 Alpha-->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script type="text/javascript" src="../assets/js/bootstrap.bundle.js" defer></script>
  <!--<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>-->

    <title>tienda de cafes</title>

    <script>
      var total=0;

      function actualizarTotal(){
         const items=document.getElementsByClassName("precios")
         console.log(items)
         let sum=0;
         for(let item of items){
            console.log(item,item.innerHTML.replace(".","").replace("$",""),sum)
            sum+=parseInt(item.innerHTML.replace(".","").replace("$",""))
         }
         document.querySelector("#total").innerHTML="$"+sum.toLocaleString();
      }

      function eliminarProductor(id,precio){
         document.querySelector("#content-item-"+id).innerHTML="";
         document.querySelector("#content-item-"+id).id=""
         total-=precio;
         document.querySelector("#total").innerHTML="$"+total.toLocaleString();
         actualizarTotal()
      }

      function sumar(id){
         const val=parseInt(document.querySelector("#sum-val-"+id).value)
         document.querySelector("#sum-val-"+id).value=val+1;
         const precioUn=document.querySelector("#precio-uni-"+id).value;
         
         
         document.querySelector("#carrito-item-precio-"+id).innerHTML=(parseInt(precioUn)*(val+1)).toLocaleString();
         actualizarTotal();
      }

      function restar(id){
         const val=parseInt(document.querySelector("#sum-val-"+id).value)
         const finalVal=(val-1>0)?val-1:0
         document.querySelector("#sum-val-"+id).value=finalVal;
         const precioUn=document.querySelector("#precio-uni-"+id).value;
         
         
         document.querySelector("#carrito-item-precio-"+id).innerHTML=(parseInt(precioUn)*(finalVal)).toLocaleString();
         actualizarTotal();
      }

      function agregarAlCarrito(id,nombre,precio ){
         const contenedor=document.querySelector("#compras")
         let html=contenedor.innerHTML;
         if(!html.includes("content-item-"+id)){
            let newHtml=`<div id="content-item-${id}"> <div class="carrito-item">
                
                <div class="carrito-item-detalles">
                  <span class="carrito-item-titulo">${nombre}</span>
                  <div class="selector-cantidad">
                   <i class="fa-solid fa-minus restar-cantidad" onclick="restar(${id})"></i>
                   <input id="precio-uni-${id}" type="hidden" value="${precio}" class="carrito-item-cantidad">
                   <input id="sum-val-${id}" type="text" value="1" class="carrito-item-cantidad" disabled>
                   <i class="fa-solid fa-plus sumar-cantidad" onclick="sumar(${id})"></i>
                   

                  </div>
                   <span class="precios" id="carrito-item-precio-${id}">$${precio.toLocaleString()}</span>

                </div>

                

               
                 <span class="btn-eliminar" onclick="eliminarProductor(${id},${precio})">
                 <i class="fa-solid fa-trash"></i>
                </span>
            </div></div>`
            contenedor.innerHTML=html+newHtml;
           setTimeout(()=>{ actualizarTotal()},100)
         }
         
      }

      function hacerPedido(){
         alert('¡Pedido realizado exitosamente!')
         location.href= location.href;
      }

      
    </script>
</head>
<body>
   
   <header class="mb-auto"><!--class="mb-auto"-->
   <nav class="navbar navbar-expand-sm bg-light navbar-light text-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="../app/homeuser.php">MCO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="carritocompras.php">Carro de compras</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="recetas-2.html">Recetas </a>
              </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="historias.html">Historias</a>
            </li>
            </ul>
          </div>
        </div>
      </nav>
        </header>
   <section class="contenedor" style="margin-top: -200px;">
         <!-- contenedor de elementos -->   
         <div class="contenedor-items">
         <div class="item">
            <span class="titulo-item">Celimo cafe</span>
            <img src="../media/natural.jpg" alt="" class="img-item">
            <span class="precio-item">$28.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(1,'Celimo cafe',28000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 
         <div class="item">
            <span class="titulo-item">celimo cafe</span>
            <img src="../media/paissana.jpg" alt="" class="img-item">
            <span class="precio-item">$30.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(2,'Celimo cafe',30000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 
         <div class="item">
            <span class="titulo-item">celimo cafe</span>
            <img src="../media/primera_cosecha.jpg" alt="" class="img-item">
            <span class="precio-item">$20.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(3,'Celimo cafe',20000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 
         <div class="item">
            <span class="titulo-item">Andres duque</span>
            <img src="../media/Andres-250.jpg" alt="" class="img-item">
            <span class="precio-item">$20.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(4,'Andres duque',20000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 
         <div class="item">
            <span class="titulo-item">Andres duque</span>
            <img src="../media/Andres-250.jpg" alt="" class="img-item">
            <span class="precio-item">$20.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(5,'Andres duque',20000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 
         <div class="item">
            <span class="titulo-item">Andres duque</span>
            <img src="../media/Andres-250.jpg " alt="" class="img-item">
            <span class="precio-item">$20.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(6,'Andres duque',20000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 
         <div class="item">
            <span class="titulo-item">reserva de la montaña</span>
            <img src="../media/reserva_500.png" alt="" class="img-item">
            <span class="precio-item">$20.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(7,'reserva de la montaña',20000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> <div class="item">
            <span class="titulo-item">reserva de la montaña</span>
            <img src="../media/reserva_250.jpeg" alt="" class="img-item">
            <span class="precio-item">$20.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(8,'reserva de la montaña',20000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> <div class="item">
            <span class="titulo-item">reserva de la montaña</span>
            <img src="../media/reserva_500.png" alt="" class="img-item">
            <span class="precio-item">$20.000</span>
            <button class="boton-item" onclick="agregarAlCarrito(9,'reserva de la montaña',20000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 
         
        </div>

       <!-- carrito de compras-->
       <div class="carrito">
           <div class="header-carrito">
            <h2>tu carrito</h2>
           </div>

            <div class="carrito-items" id="compras">
              
             
               </div>
              <div class="carrito-total">
               <div class="fila">
                  <strong>tu total</strong>
                  <span class="carrito-precio-total" id="total">
                     $0
                  </span>
                 
               </div>
               <button class="btn-pagar" onclick="hacerPedido()">Hacer pedido<i class="fa-solid fa-bag-shopping"></i></button>
              </div>
           </div>

        </div>
   </section>
    
</body>
</html>