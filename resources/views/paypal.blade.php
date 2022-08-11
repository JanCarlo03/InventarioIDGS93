<html>
    <head>
    <link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Productos</title>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">  
        <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/all.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/mdb.min.css') !!}">
        <script src=" {{ asset('js/jquery-3.3.1.js') }}"></script>
        <script src=" {{ asset('js/jquery-ui.js') }}"></script>
    </head>
    @include('barra')

    

    <div class="container my-5">


  <!--Section: Content-->
  <section class="text-center">
                @if(Session::has('message2'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message2') }}
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                    </div>
                @endif
    <!-- Section heading -->
    <h3 class="font-weight-bold dark-grey-text pb-2 mb-4">Nuestros planes </h3>
    <!-- Section description -->
    <p class="text-muted w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
      eum porro a pariatur veniam.</p>
      <center>
    <!-- Grid row -->
    <div class="row justify-content-center">

      <!-- Grid column -->
      
      <div class="col-lg-4 col-md-12 mb-4">

        <!-- Card -->
        <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(6).jpg');">

          <!-- Pricing card -->
          <div class="text-white text-center pricing-card d-flex align-items-center rgba-stylish-strong py-3 px-3 rounded">

            <!-- Content -->
            <div class="card-body">
              <h5>Basico</h5>

              <!-- Price -->
              <div class="price pt-0">
                <h2 class="number mb-0">10</h2>
              </div>

              <ul class="striped mb-0">
                <li>
                  <p><strong>1</strong> projecto</p>
                </li>
                <li>
                  <p><strong>100</strong> componentes</p>
                </li>
                <li>
                  <p><strong>150</strong> features</p>
                </li>
                <li>
                  <p><strong>200</strong> members</p>
                </li>
                <li>
                  <p><strong>250</strong> messages</p>
                </li>
              </ul>
             
              <a class="btn btn-warning my-4 btn-block" href="{{ route('payment') }}">Pay pal</a>

            </div>
            <!-- Content -->

          </div>
          <!-- Pricing card -->

        </div>
        <!-- Card -->

      </div>

      <!-- Grid column -->

      
    </div>
    </center>
    <!-- Grid row -->

  </section>
  <!--Section: Content-->


</div>



    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '0.01' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>
</html>

