  // ************************************************
  // Shopping Cart API
  // ************************************************
  var cartArray = [];
  // -1
  function removeItemFromCartArray(name) {
      console.log("remove item from cart array ");
      for (var item in cartArray) {
          if (cartArray[item].name === name) {
              cartArray[item].count = cartArray[item].count - 1;
          }
      }
  }
  // +1
  function addToCartArray(name) {
      console.log("add to cart");
      for (var item in cartArray) {
          if (cartArray[item].name === name) {
              cartArray[item].count = cartArray[item].count + 1;
          }
      }
  }

  var shoppingCart = (function () {
      // =============================
      // Private methods and propeties
      // =============================
      cart = [];

      // Constructor
      function Item( name, price, count, id, image) {
          this.name = name;
          this.price = price;
          this.count = count;
          this.id = id;
          this.image = image;
          console.log('Name : ' + name,' Price : ' + price,' Count : ' + count, 'ID : ' + id + ' Image : ' + image);
      }

      // Save cart
      function saveCart() {
          sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
      }
      // Load cart  
      function loadCart() {
          cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
      }
      if (sessionStorage.getItem("shoppingCart") != null) {
          loadCart();
      }

      // =============================
      // Public methods and propeties
      // =============================
      var obj = {};

      // Add to cart
      obj.addItemToCart = function (name, price, count, id, image ) {
          for (var item in cart) {
              if (cart[item].name === name) {
                  cart[item].count++;
                  saveCart();
                  return;
              }
          }
          var item = new Item(name, price, id, count, image);
          cart.push(item);
          saveCart();
      }
      obj.setCountForItem = function (name, count) {
          for (var i in cart) {
              if (cart[i].name === name) {
                  cart[i].count = count;
                  break;
              }
          }
      };
      // Remove item from cart
      obj.removeItemFromCart = function (name) {
          for (var item in cart) {
              if (cart[item].name === name) {
                  cart[item].count--;
                  if (cart[item].count === 0) {
                      cart.splice(item, 1);
                  }
                  break;
              }
          }
          saveCart();
      }

      // Remove all items from cart
      obj.removeItemFromCartAll = function (name) {
          for (var item in cart) {
              if (cart[item].name === name) {
                  cart.splice(item, 1);
                  break;
              }
          }
          saveCart();
      }

      // Clear cart
      obj.clearCart = function () {
          cart = [];
          saveCart();
      }

      // Count cart 
      obj.totalCount = function () {
          var totalCount = 0;
          for (var item in cart) {
              totalCount += cart[item].count;
          }
          return totalCount;
      }

      // Total cart
      obj.totalCart = function () {
          var totalCart = 0;
          for (var item in cart) {
              totalCart += cart[item].price * cart[item].count;
          }
          var set = Number(totalCart.toFixed(2));
          return isNaN(set) ? "" : set.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      // List cart
      obj.listCart = function () {
          var cartCopy = [];
          for (i in cart) {
              item = cart[i];
              itemCopy = {};
              for (p in item) {
                  itemCopy[p] = item[p];
              }
              itemCopy.total = Number(item.price * item.count).toFixed(2);
              cartCopy.push(itemCopy)
          }
          return cartCopy;
      }

      // cart : Array
      // Item : Object/Class
      // addItemToCart : Function ((method) obj.addItemToCart(name: any, price: any, count: any, id: any, image: any): void )
      // removeItemFromCart : Function
      // removeItemFromCartAll : Function
      // clearCart : Function
      // countCart : Function
      // totalCart : Function
      // listCart : Function
      // saveCart : Function
      // loadCart : Function
      return obj;
  })();


  // *****************************************
  // Triggers / Events
  // ***************************************** 
  // Add item
  $('.add-to-cart').click(function (event) {
      event.preventDefault();
      var name = $(this).data('name');
      var price = Number($(this).data('price'));
      var id = Number($(this).data('id'));
      var image = $(this).data('image');
      shoppingCart.addItemToCart(name, price, id, 1, image);
      displayCart();
  });

  // Clear items
  $('.clear-cart').click(function () {
      shoppingCart.clearCart();
      displayCart();
  });

  function displayCart() {
      cartArray = shoppingCart.listCart();
      // cartArray.price = isNaN(cartArray.price)?"":cartArray.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      var output = "";
      for (var i in cartArray) {
          // format price
          cartArray[i].price = isNaN(cartArray[i].price) ? "" : cartArray[i].price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

          output +=
              "<div class='product-widget'>" +
              "<div class='product-img'>" +
              "<img src='" + cartArray[i].image + "' alt=''>" +
              "</div>" +
              "<div class='product-body'>" +
              "<h3 class='product-name' name='name'><a href='{{URL::to('product-'." + cartArray[i].id + ")}}'>" + cartArray[i].name + "</a></h3>" +
              "<h4 class='product-price'><span class='qty'>" + cartArray[i].count + " x " + "</span>$" + cartArray[i].price + "</h4>" +
              "<div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name='" + cartArray[i].name + "'>-</button>" +
              "<button class='plus-item btn btn-primary input-group-addon' data-name='" + cartArray[i].name + "'>+</button></div></<div>" +
              "</div>" +
              "<button class='delete' data-name='" + cartArray[i].name + "'><i class='fa fa-close' ></i></button>" +
              "</div> " +
              "<div class='cart-summary'>" +
              "</div>" +
              "<div class='cart-btn'>" +
              "</div>";
      }

      $('.show-cart').html(output);
      $('.total-cart').html(shoppingCart.totalCart());
      $('.total-count').html(shoppingCart.totalCount());
  }


  // Delete item button

  $('.show-cart').on("click", ".delete", function (event) {
      var name = $(this).data('name')
      shoppingCart.removeItemFromCartAll(name);
      displayCart();
  })


  // -1
  $('.show-cart').on("click", ".minus-item", function (event) {
      var name = $(this).data('name')
      removeItemFromCartArray(name);
      shoppingCart.removeItemFromCart(name);
      displayCart();
  })
  // +1
  $('.show-cart').on("click", ".plus-item", function (event) {
      var name = $(this).data('name')
      addToCartArray(name);
      shoppingCart.addItemToCart(name);

      displayCart();
  })

  // Item count input   // Item count input
  $('.show-cart').on("change", ".item-count", function (event) {
      var name = $(this).data('name');
      var count = Number($(this).val());
      shoppingCart.setCountForItem(name, count);
      displayCart();
  });

  function submitFormCheckout() {
      console.log(cartArray);

      var contentString = "";
      for(var item in cartArray) {
          contentString += 'id'+item+'="';
          contentString += cartArray[item].id.toString();
          contentString += '"';
          contentString += "|"; 
          contentString += 'count'+item+'="';
          contentString += cartArray[item].count.toString();
          contentString += '"';
          contentString += "|"; 
          contentString += 'price'+item+'="';
          contentString += cartArray[item].price.toString();
          contentString += '"';
          contentString += '-';
        }
        
      $('#cart-content').val(contentString);
      $("#form-content-cart").submit();
  }
  displayCart();
