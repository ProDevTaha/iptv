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
                    <h3 class="display-3 text-white mb-3 animated slideInDown">Terme And Condition</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">{{__('trial.home')}}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Terme and condition</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
         

        <div class="container-xxl pt-2 pb-3">
            <div class="container">
              <p>Collecting and managing user data is a policy implemented by BootCoders.com. By utilizing our website, you implicitly agree to our terms and conditions, as outlined in this privacy policy.</p>
              <h5 class="mt-3">Cookies:</h5><br>
              <p>At BootCoders.com, we use Cookies to enhance the quality of our website. These are small text files stored on your computer by your browser. When you visit our site, these files are transmitted from the browser to our server. If you wish to block cookies, you can adjust your browser settings, as most browsers are configured to allow cookies by default.</p>
              
              <h5 class="mt-3">Collected Information:</h5><br>
              <p>Wondering what information we collect? We gather data on which pages attract your interest, how long you stay engaged, and how often you find a page compelling enough to revisit. This information aids us in optimizing and continually improving our website, providing an excellent experience for our users.</p>
              
              <h5 class="mt-3">How we use this information:</h5><br>
              <p>The collected data helps us understand which products, information, or pages are favorites among our users. By knowing the popularity, views, and visits to different sections of our site, we can enhance our content and optimize our services to better suit our users' preferences.</p>
              
              <h5 class="mt-3">Tracking abuse:</h5><br>
              <p>Rest assured, our cookies are protected and will not be disclosed unless required by law. If we receive a court order to reveal information, we will comply with law enforcement requests.</p>
              
              <h5 class="mt-3">Property Claim:</h5><br>
              <p>Logos and trademarks displayed on our website belong to our merchants and their respective owners. BootCoders.com is not associated or affiliated with any of these logos and trademarks.</p>
               
              <h5 class="mt-3">Safety Assurance:</h5><br>
              <p>We guarantee the confidentiality of your personal information. Your data will not be leaked to third parties without your consent. You can trust BootCoders.com to provide original apps and APK files, free from modifications, viruses, or cheats, each time you use our site.</p>
              
              <h5 class="mt-3">Change of Policy:</h5><br>
              <p>Our privacy policy may undergo updates. The policy in effect when you use our services is applicable. Users are obligated to adhere to the privacy policy at the time their information was used, even if changes have occurred since.</p>
               
              <p><B>Feel free to contact us anytime; we are here to address your concerns and questions.</B></p>
            
            </div>
        </div>
</div>

         @include('footer')
        <!-- Back to Top -->
    </div>

@endsection