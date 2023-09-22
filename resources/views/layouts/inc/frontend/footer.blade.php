<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="footer-heading">{{ $appSetting->website_name ?? 'MYStore' }}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        We at MYStore believe in high quality and exceptional customer service. But most importantly, we
                        believe shopping is a right, not a luxury, so we strive to deliver the best products at the most
                        affordable prices, and ship them to you regardless of where you are located.
                    </p>
                    <div class="icon">

                        <a style="color: #fff" href="https://www.facebook.com/" > <i class="fa fa-facebook"></i> </a>
                        <a style="color: #fff" href="https://www.instagram.com/"> <i class="fa fa-instagram"></i> </a>
                        <a style="color: #fff" href="https://www.whatsapp.com/"> <i class="fa fa-whatsapp"></i> </a>
                        <a style="color: #fff" href="https://www.youtube.com/"> <i class="fa fa-youtube"></i> </a>

                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('new-arrivals') }}" class="text-white">New Arrivals Products</a>
                    </div>
                    <div class="mb-2"><a href="{{ url('featured-products') }}" class="text-white">Featured
                            Products</a></div>
                    <div class="mb-2"><a href="{{ url('cart') }}" class="text-white">Cart</a></div>
                </div>

                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i>
                            {{ $appSetting->address ?? 'Bhaktapur' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="tel:9812345670" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? '9812345670' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="mailto:mystore@gmail.com" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'mystore@gmail.com' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - MYStore. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        {{-- @if ($appSetting->facebook)
                            <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appSetting->twitter)
                            <a href="{{ $appSetting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appSetting->instagram)
                            <a href="{{ $appSetting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appSetting->youtube)
                            <a href="{{ $appSetting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
