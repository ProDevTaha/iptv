@extends('layout')

@section('content') 
<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
         
      

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0"> 
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Refund  Policy</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Refund  Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
         

        <div class="container-xxl pt-2 pb-3">
            <div class="container">
                <p>
                    At <B>BootCoders.com</B>, we are dedicated to delivering exceptional customer service and tailored support to meet your specific needs. Whether you seek sales guidance or technical assistance, our devoted team is prepared to assist you. Our main objective is to ensure your complete satisfaction with your purchase.
                </p>
                <p class="mt-3">
                    If, for any reason, the chosen package falls short of your expectations, we encourage you to contact us without hesitation. Our committed and efficient staff is focused on resolving any issues and meeting your unique requirements. We highly value your feedback as it serves as a catalyst for the ongoing improvement of our services.
                </p>
                <p class="mt-3">
                    The refund process is applicable for a period of 7 days, exclusively in the case of <B> issues originating from our server</B>. The associated <B> costs are covered on our end</B>. 
                </p>
                <p class="mt-3">
                    However, <B> if you request a refund without a valid reason </B>, this is only possible <B> within 3 days of your order</B> and <B>will incur a $24 fee to cover</B> processing costs.
                </p> 
                <p class="mt-3">
                    Beyond this period, we do not offer refunds.
                </p> 
                <p class="mt-3">
                    To initiate a refund request during this period, please follow these steps:
                </p> 
                <p class="mt-3">
                    Fill out our contact form to request a refund.
                </p> 
                <p class="mt-3">
                    Ensure that the provided email address matches the one used during your subscription and purchase.
                </p> 
                <p class="mt-3">
                    Include the invoice number to expedite the refund process.
                </p> 
                <p class="mt-3">
                    We make every effort to expedite the refund process, adhering to our policy and striving to return your funds as swiftly as possible. However, it's essential to note that external factors, such as payment processors, banks, and financial institutions, can affect the time required for the refund to appear in your bank account, potentially extending the process up to 14 days.
                </p> 
            </div>
        </div>
</div>

         @include('footer')
        <!-- Back to Top -->
    </div>

@endsection