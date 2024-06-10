<?php
include('./simple_html_dom.php');
$search = $_POST['productId'];
$curl = curl_init();

$url = "https://www.banimode.com/".$search."/ ";
//$url = "https://www.digikala.com/product/".$search."/ ";

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$result = file_get_contents($url, false, stream_context_create($arrContextOptions));

$res = str_get_html($result);
$head = $res->find('<head>')[0];
$pdpSection = $res->find('div[id=pdp-section]')[0];
$scriptsProduct = $res->find('script');
        foreach($scriptsProduct as $s) {
            if(strpos($s->innertext, 'productData') !== false) {
                $scriptProduct = $s;
            }
        }

?>
<!DOCTYPE html>
<html lang="fa">
<?php
echo $head;
?>
<body id="product" class="product"> <!-- Google Tag Manager (noscript) -->
<div style="display: none"><input type="text" name="login_username_field"> <input type="password"
                                                                                  name="login_password_field"></div>
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PN2Q4QJ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript> <!-- End Google Tag Manager (noscript) -->
<style>         #location-client {
        background: #aef2d2;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        z-index: 10;
        width: 100%;
        transform: translateY(52px);
        direction: rtl;
        font-weight: bold;
    }

    .slide-up-vpn {
        animation: up-vpn 1s forwards
    }

    .slide-down-vpn {
        animation: down-vpn 1s forwards
    }

    @keyframes up-vpn {
        0% {
            transform: translateY(52px);
        }
        70% {
            transform: translateY(-11px);
        }
        100% {
            transform: translateY(0px);
        }
    }

    @keyframes down-vpn {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(52px);
        }
    }

    .header-sticky-banner a {
        background-image: url('');
        background-repeat: no-repeat;
        background-size: auto 60px;
        background-position: center;
        height: 60px;
        width: 100%;
        display: block;
    }

    @media screen and (min-width: 1900px) {
        .header-sticky-banner a {
            background-size: cover
        }
    }

    .navigation-general .for-user .cart-btn-mini {
        color: #000;
        padding: 0;
        position: relative;
        transition: .2s all;
    }

    .navigation-general .for-user .cart-btn-mini .cart-btn-count {
        position: absolute;
        min-width: 18px;
        padding: 0 2px;
        height: 18px;
        line-height: 18px;
        border-radius: 50%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background-color: #00bf6f;
        color: #fff;
        font-size: 13px;
        font-weight: 500;
        top: 16px;
        right: -6px;
    }

    .navigation-general .for-user .cart-btn-mini:hover {
        color: #1ac977;
    }

    .main-navigation.search-active {
        position: absolute !important;
        top: 0;
        width: 100%;
    }

    .header-icon-margin {
        margin-left: 12px;
    }

    .main-navigation .navigation-general div .profile-container .profile img, .main-navigation .navigation-general div .profile-container .profile .header-submenu .font-icon {
        margin: 0 0 0 4px;
    }

    .main-navigation .navigation-general div .profile-container .profile .header-submenu span:last-child {
        text-align: right;
        width: auto;
    }

    #profileMenu a, #profileMenu button {
        text-align: right;
        line-height: 20px;
        padding: 16px;
        width: 100%;
        display: flex;
        justify-content: flex-start
    }

    #profileMenu img, #profileMenu .font-icon {
        padding: 0;
        margin: 0 0 0 8px;
        width: 24px;
        text-align: center
    }     </style>
<div class='header-sticky-banner'><a class="" href="#"></a></div>
<div class="app">
    <div id="location-client" class="">برای تجربه بهتر VPN را خاموش کنید</div>
    <header class="main-navigation">
        <div class="navigation-general container">
            <div class="for-user"><a class="cart-btn-mini header-icon-margin" href="https://www.banimode.com/order"
                                     rel="nofollow">
                    <button class="cart-btn-mini"><img src="https://www.banimode.com//themes/new/assets/images/cart-new.svg"
                                                       alt="سبد خرید"/></button>
                </a>
                <div class="header-submenu  header-icon-margin" id="cartMenu">
                    <div class="header-submenu-container">
                        <div class="total-price-box"><span>مبلغ قابل پرداخت:</span> <span class="price-value-box">                                 <span
                                    id="price-value-amount"></span>                                 <span> تومان</span></span>
                        </div>
                        <div class="cart-products"></div>
                        <div class="btn-box"><a class="green" href="https://www.banimode.com/order" rel="nofollow">مشاهده
                                سبد خرید</a></div>
                    </div>
                    <div class="empty-cart">
                        <div class="img-box"><img
                                src="https://www.banimode.com//themes/new/assets/images/empty-basket.svg"
                                alt="سبد خالی"></div>
                        <p class="empty-title">سبد خرید شما خالی است.</p>
                        <p class="empty-description">می توانید استایل خاص خود را با بهترین کالاهای برندهای جهان
                            بسازید.</p></div>
                </div>
                <button class="wishlist-btn header-icon-margin notauthorized"><img
                        src="https://www.banimode.com//themes/new/assets/images/favourite.svg" alt="علاقه‌مندی"/>
                </button>
                <div id="header-wallet" class="notauthorized header-icon-margin">
                    <button class="wallet-btn"><img src="https://www.banimode.com//themes/new/assets/images/wallet.svg"
                                                    alt="کیف پول"/></button>
                    <div class="header-submenu" id="walletMenu"><a href="/wallet-transactions" rel="nofollow"> <span>اعتبار کیف پول :</span>
                            <span class="header-wallet-amount"></span> </a></div>
                </div>
                <div class="profile-container notauthorized">
                    <div class="profile">
                        <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.6665 26.6667C6.6665 23.3334 9.33317 20.8 12.5332 20.8H19.3332C22.6665 20.8 25.1998 23.4667 25.1998 26.6667"
                                  stroke="#101010" stroke-width="1.4824" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M20 6.93337C22.2667 9.20004 22.2667 12.8 20 14.9334C17.7333 17.0667 14.1333 17.2 12 14.9334C9.86665 12.6667 9.73332 9.06671 12 6.93337C14.2667 4.80004 17.7333 4.80004 20 6.93337Z"
                                  stroke="#101010" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span id="profile-customer-name">بانی‌مدی عزیز</span>
                        <div class="down-arrow">
                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.3335 6.66671L8.00016 9.33337L10.6668 6.66671" stroke="#101010"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="header-submenu" id="profileMenu"><a href="/my-account" rel="nofollow"> <span
                                    class="font-icon icon-profile-detail color-green"></span> <span>حساب کاربری</span> </a>
                            <a href="/orders" rel="nofollow"> <span
                                    class="font-icon icon-order-detail color-green"></span> <span>سفارش ها</span> </a>
                            <a href="/baniclub" class="banicoin-header" rel="nofollow"> <img
                                    src="https://www.banimode.com//themes/new/assets/images/icon/product-coin.svg"
                                    alt="بانی کلاب"> <span>بانی کلاب</span> </a> <a href="/banibons"
                                                                                    class="banibon-header"
                                                                                    rel="nofollow"> <img
                                    src="https://www.banimode.com//themes/new/assets/images/banibons.png" alt="بانی بن">
                                <span>بانی بن ها</span> </a>
                            <button id="profile-customer-logout"><span
                                    class="font-icon icon-logout-profile color-orang"></span> <span>خروج از حساب</span>
                            </button>
                        </div>
                    </div>
                    <button class="login-register" type="button">ورود / ثبت نام</button>
                </div>
            </div>
            <div class="search-box">
                <form id="form-search-header" method="get" action="https://www.banimode.com/search">
                    <inpuy type="submit" id="search-btn"><span class="font-icon icon-search-header"></span></inpuy>
                    <input type="text" name="q" id="search-input" placeholder="جستجو میان هزاران کالا..."
                           autocomplete="off"/></form>
            </div>
            <div class="banimode"><a href="https://www.banimode.com/"> <img
                        src="https://www.banimode.com//themes/new/assets/images/banilogo.svg?t=20240502" alt="بانی مد"> </a>
            </div>
            <span class="close-search">                 <span class="font-icon icon-cancel"></span>             </span>
        </div>
        <div class="search-open">
            <div class="container">
                <div class="box-best-seller"><!-- <span class="best-seller-title">پرفروش ترین‌ها:</span> -->
                    <div id="searchListControler">
                        <div id="searchBestSellerNav"></div>
                        <div id="searchBestSellerDot"></div>
                    </div>
                    <div class="owl-carousel owl-theme best-seller-wrapper">
                        <!--show best seller after searching ,there is this script -->                         </div>
                </div>
                <div class="trend-box-suggestion-list">
                    <div class="trends-wrapper"><span class="search-trend-icon"><img
                                src="https://www.banimode.com/themes/new/assets/images/search/icon-star.svg"
                                alt="جستجوهای پرطرفدار"/></span> <span class="search-trend-title">جستجوهای پرطرفدار:</span>
                    </div>
                </div>
                <div class="trends-label-wrapper"><!--show trends after searching ,there is this script -->
                    <!--<a class="trends-tag">شلوارک</a> -->                 </div>
                <div class="search-history"><!--show after searching ,there is this script -->                 </div>
                <div class="search-result"></div>
            </div>
        </div>
        <nav class="navigation-catrgories">
            <div class="container">
                <ul class="main-list">
                    <li class="top-list  products-categories" title=""><a class="top-list-content longer"
                                                                          target="_blank"> <img
                                src="https://www.banimode.com/img/menu/icon/1681628415_844318.svg" alt="دسته بندی کالاها"> دسته بندی کالاها <span
                                class="underline"></span> </a>
                        <div class="category-details">
                            <div class="category-details-container">
                                <ul>
                                    <li class="category-details-li first-hover" title=""><a class="first-child"
                                                                                            href="https://www.banimode.com/3151/fashion-clothing"
                                                                                            target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316137_538434.svg" alt="مد و پوشاک"> مد و پوشاک </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/3151/fashion-clothing"> همه
                                                        محصولات مد و پوشاک
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/4/%D9%84%D8%A8%D8%A7%D8%B3-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لباس زنانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/672/%D8%AA%DB%8C%D8%B4%D8%B1%D8%AA-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">تیشرت
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/674/%D8%AA%D8%A7%D9%BE-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">تاپ زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/24/%D8%B4%D9%84%D9%88%D8%A7%D8%B1-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شلوار
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/26/%D8%B4%D9%84%D9%88%D8%A7%D8%B1%DA%A9-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شلوارک
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/44/%D9%84%D8%A8%D8%A7%D8%B3-%D8%B2%DB%8C%D8%B1-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لباس زیر
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/694/%D9%84%D8%A8%D8%A7%D8%B3-%D8%B1%D8%A7%D8%AD%D8%AA%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لباس راحتی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/669/%D8%A8%D9%84%D9%88%D8%B2-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">بلوز زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/670/%D8%B4%D9%88%D9%85%DB%8C%D8%B2-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شومیز
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2265/dress-w"
                                                                                           target="_self">پیراهن
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/743/%D8%AA%D9%88%D9%86%DB%8C%DA%A9-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">تونیک
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/783/%D8%B3%D8%A7%D8%B1%D8%A7%D9%81%D9%88%D9%86-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">سارافون
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/742/%D9%84%D8%A8%D8%A7%D8%B3-%D9%85%D8%AC%D9%84%D8%B3%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لباس مجلسی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/41/%D8%B3%D8%B1%D9%87%D9%85%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">سرهمی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/668/manto"
                                                                                           target="_self">مانتو
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/702/%DA%A9%D8%AA-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کت زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1171/%D8%AC%D9%84%DB%8C%D9%82%D9%87-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">جلیقه
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/699/women-warm-jackets"
                                                                                           target="_self">کاپشن
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/700/%D9%BE%D8%A7%D9%84%D8%AA%D9%88-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">پالتو
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1205/%D8%A8%D8%A7%D8%B1%D8%A7%D9%86%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">بارانی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2530/%D9%BE%D8%A7%D9%81%D8%B1-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">پافر زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/708/%D8%AC%D9%88%D8%B1%D8%A7%D8%A8-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">جوراب
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/709/women-Pantyhose"
                                                                                           target="_self">جوراب شلواری
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3046/islamicwear"
                                                                                           target="_self">پوشش اسلامی
                                                            بانوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/35/%D8%B4%D8%A7%D9%84-%D9%88-%D8%B1%D9%88%D8%B3%D8%B1%DB%8C"
                                                                                           target="_self">شال و
                                                            روسری</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3/%D9%84%D8%A8%D8%A7%D8%B3-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لباس مردانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/832/t-shirt"
                                                                                           target="_self">تیشرت
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/835/category-men-polo-shirt"
                                                                                           target="_self">پولوشرت
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/8/%D8%B4%D9%84%D9%88%D8%A7%D8%B1-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شلوار
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/12/%D8%B4%D9%84%D9%88%D8%A7%D8%B1%DA%A9-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شلوارک
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/871/%D9%84%D8%A8%D8%A7%D8%B3-%D8%B1%D8%A7%D8%AD%D8%AA%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لباس راحتی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/71/%D9%84%D8%A8%D8%A7%D8%B3-%D8%B2%DB%8C%D8%B1-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لباس زیر
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1105/%DA%A9%D8%AA-%D9%88-%D8%B4%D9%84%D9%88%D8%A7%D8%B1-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کت و شلوار
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1319/%DA%A9%D8%AA-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کت تک
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1780/%DA%A9%D8%AA-%DA%86%D8%B1%D9%85-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کت چرم
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/883/%DA%A9%D8%A7%D9%BE%D8%B4%D9%86-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کاپشن
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/886/%D9%BE%D8%A7%D9%84%D8%AA%D9%88-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">پالتو
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2528/%D9%BE%D8%A7%D9%81%D8%B1-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">پافر
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1838/%D8%A8%D8%A7%D8%B1%D8%A7%D9%86%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">بارانی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/9/%DA%98%D8%A7%DA%A9%D8%AA-%D9%88-%D9%BE%D9%84%DB%8C%D9%88%D8%B1-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">ژاکت و پلیور
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1545/man-hoodie"
                                                                                           target="_self">هودی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1544/men-sweatshirt"
                                                                                           target="_self">سویشرت
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1764/%D8%AA%D8%A7%D9%BE-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">تاپ مردانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/64/%D8%AC%D9%88%D8%B1%D8%A7%D8%A8-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">جوراب
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/11/%D9%BE%DB%8C%D8%B1%D8%A7%D9%87%D9%86-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">پیراهن
                                                            مردانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/39/%DA%A9%D9%81%D8%B4-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کفش زنانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/539/%D8%AF%D9%85%D9%BE%D8%A7%DB%8C%DB%8C-%D9%88-%D8%B5%D9%86%D8%AF%D9%84-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">دمپایی و صندل
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/784/%DA%A9%D9%81%D8%B4-%D8%B1%D9%88%D8%B2%D9%85%D8%B1%D9%87-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کفش روزمره
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2518/%DA%A9%D8%A7%D9%84%D8%AC-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کالج زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2764/%DA%A9%D9%81%D8%B4-%D8%A7%D8%AF%D8%A7%D8%B1%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کفش اداری
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/545/%DA%A9%D9%81%D8%B4-%D9%BE%D8%A7%D8%B4%D9%86%D9%87-%D8%A8%D9%84%D9%86%D8%AF-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کفش پاشنه
                                                            بلند</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/541/%D8%A8%D9%88%D8%AA-%D9%88-%D9%86%DB%8C%D9%85-%D8%A8%D9%88%D8%AA-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">بوت و نیم بوت
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/537/category-women-sport-shoes"
                                                                                           target="_self">کفش ورزشی
                                                            زنانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/69/%DA%A9%D9%81%D8%B4-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کفش مردانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/862/%D8%B5%D9%86%D8%AF%D9%84-%D9%88-%D8%AF%D9%85%D9%BE%D8%A7%DB%8C%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">دمپایی و صندل
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/815/%DA%A9%D9%81%D8%B4-%D8%B1%D9%88%D8%B2%D9%85%D8%B1%D9%87-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کفش روزمره
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/817/%DA%A9%D9%81%D8%B4-%D8%B1%D8%B3%D9%85%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کفش رسمی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2516/%DA%A9%D8%A7%D9%84%D8%AC-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کالج
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/533/%D8%A8%D9%88%D8%AA-%D9%88-%D9%86%DB%8C%D9%85-%D8%A8%D9%88%D8%AA-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">بوت و نیم بوت
                                                            مردانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/72/%DA%A9%DB%8C%D9%81-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کیف زنانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/435/%DA%A9%DB%8C%D9%81-%D8%AF%D9%88%D8%B4%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف دوشی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/738/%DA%A9%DB%8C%D9%81-%D8%A7%D8%AF%D8%A7%D8%B1%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف اداری
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/734/%DA%A9%DB%8C%D9%81-%D8%AF%D8%B3%D8%AA%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف دستی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/437/%DA%A9%D9%88%D9%84%D9%87-%D9%BE%D8%B4%D8%AA%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کوله پشتی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/443/%DA%A9%DB%8C%D9%81-%D9%BE%D9%88%D9%84-%D9%88-%D8%AC%D8%A7%DA%A9%D8%A7%D8%B1%D8%AA%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">جاکارتی و کیف
                                                            پول زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/441/%DA%86%D9%85%D8%AF%D8%A7%D9%86-%D9%88-%D8%B3%D8%A7%DA%A9-%D9%85%D8%B3%D8%A7%D9%81%D8%B1%D8%AA%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">چمدان و ساک
                                                            مسافرتی زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/736/%DA%A9%DB%8C%D9%81-%DA%A9%D9%85%D8%B1%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف کمری
                                                            زنانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/70/%DA%A9%DB%8C%D9%81-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کیف مردانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/423/%DA%A9%DB%8C%D9%81-%D8%A7%D8%AF%D8%A7%D8%B1%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف اداری
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1321/%DA%A9%DB%8C%D9%81-%D8%AF%D9%88%D8%B4%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف دوشی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/826/%DA%A9%DB%8C%D9%81-%DA%A9%D9%85%D8%B1%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف کمری
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/853/%DA%A9%DB%8C%D9%81-%D9%BE%D8%A7%D8%B3%D9%BE%D9%88%D8%B1%D8%AA%DB%8C-%D9%88-%D8%AF%D8%B3%D8%AA%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف پاسپورتی و
                                                            دستی مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/429/%DA%A9%DB%8C%D9%81-%D9%BE%D9%88%D9%84-%D9%88-%D8%AC%D8%A7%DA%A9%D8%A7%D8%B1%D8%AA%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">جاکارتی و کیف
                                                            پول مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/425/%DA%A9%D9%88%D9%84%D9%87-%D9%BE%D8%B4%D8%AA%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کوله پشتی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/433/%DA%86%D9%85%D8%AF%D8%A7%D9%86-%D9%88-%D8%B3%D8%A7%DA%A9-%D9%85%D8%B3%D8%A7%D9%81%D8%B1%D8%AA%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">چمدان و ساک
                                                            مسافرتی مردانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/83/%D8%A7%DA%A9%D8%B3%D8%B3%D9%88%D8%B1%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     اکسسوری زنانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/265/%D8%B9%DB%8C%D9%86%DA%A9-%D8%A2%D9%81%D8%AA%D8%A7%D8%A8%DB%8C-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">عینک آفتابی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1312/%D8%A8%D9%86%D8%AF-%D8%B9%DB%8C%D9%86%DA%A9-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">بند عینک
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1613/eyeglass-pouch-w"
                                                                                           target="_self">کیف عینک
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1436/%DA%A9%D8%B4-%D9%88-%D8%AA%D9%84-%D9%85%D9%88"
                                                                                           target="_self">کش مو و تل
                                                            مو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/776/women-hair-clips"
                                                                                           target="_self">گیره سر و
                                                            کلیپس مو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/34/%D8%AF%D8%B3%D8%AA%DA%A9%D8%B4-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">دستکش
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/33/%DA%A9%D9%84%D8%A7%D9%87-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کلاه زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/780/%D8%B4%D8%A7%D9%84-%DA%AF%D8%B1%D8%AF%D9%86-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شال گردن
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/780/%D8%B4%D8%A7%D9%84-%DA%AF%D8%B1%D8%AF%D9%86-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شال گردن
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/781/women-scarf-and-hat-sets"
                                                                                           target="_self">ست شال گردن و
                                                            کلاه زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/93/%DA%A9%D9%85%D8%B1%D8%A8%D9%86%D8%AF-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کمربند
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1438/key-chain"
                                                                                           target="_self">جاکلیدی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/216/women-umbrella"
                                                                                           target="_self">چتر زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/571/%D8%B3%D8%AA-%D9%87%D8%AF%DB%8C%D9%87-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">ست هدیه
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1912/decorative-napkins"
                                                                                           target="_self">دستمال تزئینی
                                                            زنانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/82/%D8%A7%DA%A9%D8%B3%D8%B3%D9%88%D8%B1%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     اکسسوری مردانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/264/%D8%B9%DB%8C%D9%86%DA%A9-%D8%A2%D9%81%D8%AA%D8%A7%D8%A8%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">عینک آفتابی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1615/%D8%A8%D9%86%D8%AF-%D8%B9%DB%8C%D9%86%DA%A9-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">بند عینک
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1614/%DA%A9%DB%8C%D9%81-%D8%B9%DB%8C%D9%86%DA%A9-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف عینک
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/38/%DA%A9%D9%85%D8%B1%D8%A8%D9%86%D8%AF-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کمربند
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1745/Tie-M"
                                                                                           target="_self">کراوات
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1747/tie-sets-m"
                                                                                           target="_self">ست کراوات
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1744/%D9%BE%D8%A7%D9%BE%DB%8C%D9%88%D9%86-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">پاپیون
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/215/men-umbrella"
                                                                                           target="_self">چتر مردانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/66/%D8%AF%D8%B3%D8%AA%DA%A9%D8%B4-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">دستکش
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/65/%DA%A9%D9%84%D8%A7%D9%87-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کلاه
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/67/%D8%B4%D8%A7%D9%84-%DA%AF%D8%B1%D8%AF%D9%86-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">شال گردن
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1518/%D8%AF%DA%A9%D9%85%D9%87-%D8%B3%D8%B1%D8%AF%D8%B3%D8%AA"
                                                                                           target="_self">دکمه سردست</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1437/%D8%AC%D8%A7%DA%A9%D9%84%DB%8C%D8%AF%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">جاکلیدی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/928/%D8%B3%D8%AA-%D9%87%D8%AF%DB%8C%D9%87-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">ست هدیه
                                                            مردانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/635/%D9%86%D9%88%D8%B2%D8%A7%D8%AF"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     محصولات نوزاد                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/42/%D9%84%D8%A8%D8%A7%D8%B3-%D9%86%D9%88%D8%B2%D8%A7%D8%AF%DB%8C"
                                                                                           target="_self">لباس
                                                            نوزادی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1593/shoes"
                                                                                           target="_self">کفش نوزاد</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/993/%DA%A9%D9%84%D8%A7%D9%87-%D9%88-%D8%AF%D8%B3%D8%AA%DA%A9%D8%B4-%D9%86%D9%88%D8%B2%D8%A7%D8%AF"
                                                                                           target="_self">کلاه و دستکش
                                                            نوزاد</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/78/baby-apron"
                                                                                           target="_self">پیش‌بند
                                                            نوزادی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/766/%DA%A9%DB%8C%D9%81-%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D9%86%D9%88%D8%B2%D8%A7%D8%AF"
                                                                                           target="_self">کیف لوازم
                                                            نوزاد</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/5/%D8%A8%DA%86%DA%AF%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     محصولات بچگانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/85/%D9%84%D8%A8%D8%A7%D8%B3-%D8%AF%D8%AE%D8%AA%D8%B1%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لباس بچگانه
                                                            دخترانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/86/%D9%84%D8%A8%D8%A7%D8%B3-%D9%BE%D8%B3%D8%B1%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لباس بچگانه
                                                            پسرانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/90/%DA%A9%D9%81%D8%B4-%D8%AF%D8%AE%D8%AA%D8%B1%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کفش بچگانه
                                                            دخترانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/459/children-shoes"
                                                                                           target="_self">کفش بچگانه
                                                            پسرانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/457/%DA%A9%DB%8C%D9%81-%D8%AF%D8%AE%D8%AA%D8%B1%D8%A7%D9%86%D9%87"
                                                                                           target="_self">کیف بچگانه
                                                            دخترانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1661/%DA%A9%DB%8C%D9%81-%D9%BE%D8%B3%D8%B1%D8%A7%D9%86%D9%87"
                                                                                           target="_self"> کیف بچگانه
                                                            پسرانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/770/%D8%A7%DA%A9%D8%B3%D8%B3%D9%88%D8%B1%DB%8C-%D8%AF%D8%AE%D8%AA%D8%B1%D8%A7%D9%86%D9%87"
                                                                                           target="_self">اکسسوری بچگانه
                                                            دخترانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/503/%D8%A7%DA%A9%D8%B3%D8%B3%D9%88%D8%B1%DB%8C-%D8%A8%DA%86%DA%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">اکسسوری بچگانه
                                                            پسرانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/1382/teenage-products-for-girls-and-boys"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     محصولات نوجوان                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1637/%D9%84%D8%A8%D8%A7%D8%B3-%D8%AF%D8%AE%D8%AA%D8%B1%D8%A7%D9%86%D9%87-%D9%86%D9%88%D8%AC%D9%88%D8%A7%D9%86"
                                                                                           target="_self"> لباس دخترانه
                                                            نوجوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1659/teenage-boys-clothes"
                                                                                           target="_self">لباس پسرانه
                                                            نوجوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1416/teenage-girls-shoes"
                                                                                           target="_self">کفش دخترانه
                                                            نوجوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1414/%DA%A9%D9%81%D8%B4-%D9%BE%D8%B3%D8%B1%D8%A7%D9%86%D9%87-%D9%86%D9%88%D8%AC%D9%88%D8%A7%D9%86"
                                                                                           target="_self">کفش پسرانه
                                                            نوجوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1417/teenage-girls-bag"
                                                                                           target="_self">کیف دخترانه
                                                            نوجوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1415/teens-bag-b"
                                                                                           target="_self">کیف پسرانه
                                                            نوجوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1434/%D8%A7%DA%A9%D8%B3%D8%B3%D9%88%D8%B1%DB%8C-%D8%AF%D8%AE%D8%AA%D8%B1%D8%A7%D9%86%D9%87-%D9%86%D9%88%D8%AC%D9%88%D8%A7%D9%86"
                                                                                           target="_self">اکسسوری
                                                            دخترانه نوجوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1444/%D8%A7%DA%A9%D8%B3%D8%B3%D9%88%D8%B1%DB%8C-%D9%BE%D8%B3%D8%B1%D8%A7%D9%86%D9%87"
                                                                                           target="_self">اکسسوری پسرانه
                                                            نوجوان</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/category/men-style"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     سبک خودتو بساز                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1364/%D8%A7%D8%B3%D8%AA%D8%A7%DB%8C%D9%84-%DA%A9%DA%98%D9%88%D8%A7%D9%84"
                                                                                           target="_self">استایل
                                                            کژوال</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1365/%D8%A7%D8%B3%D8%AA%D8%A7%DB%8C%D9%84-%D9%BE%D8%B1%D9%BE%DB%8C"
                                                                                           target="_self">استایل
                                                            پرپی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1368/%D8%A7%D8%B3%D8%AA%D8%A7%DB%8C%D9%84-%D8%AA%D8%B9%D8%B7%DB%8C%D9%84%D8%A7%D8%AA"
                                                                                           target="_self">استایل
                                                            تعطیلات</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1372/%D8%A7%D8%B3%D8%AA%D8%A7%DB%8C%D9%84-%D8%B1%D8%B3%D9%85%DB%8C"
                                                                                           target="_self">استایل
                                                            رسمی</a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"><a
                                                        href="https://www.banimode.com/3/%D9%84%D8%A8%D8%A7%D8%B3-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1706773549_478783.jpg" alt="picTshirts"
                                                            title=""/> </a> <a
                                                        href="https://www.banimode.com/623/%DA%A9%DB%8C%D9%81-%D9%88-%DA%A9%D9%81%D8%B4-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1706773600_211293.jpg" alt="picShort1"
                                                            title=""/> </a></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list">
                                                        <p>
                                                            <svg width="16" height="14" viewbox="0 0 16 14" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.4 3.79999C11.2 3.79999 11 3.80002 10.8 3.90002C10.6 4.00002 10.4 4.09999 10.3 4.29999C10.2 4.39999 10.1 4.60001 10.1 4.70001C10.1 4.80001 10 4.89998 10 5.09998C10 5.19998 10 5.30002 10 5.40002C10.1 6.00002 10.6 6.40002 11.3 6.40002C11.9 6.40002 12.4 5.99998 12.5 5.59998C12.6 5.49998 12.6 5.29998 12.6 5.09998C12.6 4.89998 12.6 4.7 12.5 4.5C12.4 4.1 11.9 3.79999 11.4 3.79999ZM11.4 5.90002C11 5.90002 10.6 5.49998 10.6 5.09998V5C10.6 4.8 10.7 4.69998 10.8 4.59998C10.9 4.49998 11.1 4.40002 11.4 4.40002C11.8 4.40002 12.2 4.70001 12.2 5.20001C12.1 5.60001 11.7 5.90002 11.4 5.90002Z"
                                                                      fill="black"/>
                                                                <path d="M15 6.29999C15 5.79999 15 5.29999 15 4.79999C15 4.19999 15 3.60002 14.9 2.90002C14.9 2.20002 14.3999 1.69998 13.7999 1.59998C13.6999 1.59998 13.6 1.59998 13.5 1.59998C13.3 1.59998 13.1 1.59998 13 1.59998C12.8 1.19998 12.5 0.800012 12 0.700012C11.9 0.700012 11.8 0.700012 11.7 0.700012C11.2 0.700012 10.7999 0.700012 10.2999 0.700012C9.69995 0.700012 8.99996 0.699976 8.39995 0.599976H8.29995H7.69997H7.59997C7.29997 0.699976 7.09995 0.8 6.89995 1L0.699973 7.20001C0.599973 7.20001 0.599967 7.30002 0.599967 7.40002C0.299967 7.80002 0.199948 8.19998 0.299948 8.59998C0.399948 8.89998 0.499973 9.09999 0.699973 9.29999C1.99997 10.6 3.29997 11.9 4.59997 13.2L4.69997 13.3C5.09997 13.6 5.49995 13.7 5.89995 13.6H5.99996C6.09996 13.6 6.29995 13.5 6.39995 13.4L5.99996 13C5.89996 13 5.89995 13.1 5.79995 13.1C5.59995 13.1 5.49995 13.1 5.29995 13.1C5.19995 13.1 5.09996 13 4.99996 13C4.89996 13 4.89995 12.9 4.89995 12.9C3.59995 11.6 2.29996 10.3 0.999961 9C0.899961 8.9 0.799973 8.7 0.699973 8.5C0.599973 8.2 0.699954 7.99999 0.899954 7.79999L0.999961 7.70001C2.69996 5.90001 5.49997 3.2 7.19997 1.5C7.29997 1.4 7.49997 1.30001 7.69997 1.20001C7.79997 1.20001 7.89996 1.20001 7.99996 1.20001C8.09996 1.20001 8.19997 1.20001 8.19997 1.20001C8.69997 1.20001 9.19997 1.20001 9.69997 1.20001C9.79997 1.20001 9.79995 1.20001 9.89995 1.20001H9.99996C10.5 1.20001 11 1.20001 11.5 1.20001C11.6 1.20001 11.7 1.20001 11.9 1.20001C12.1 1.20001 12.4 1.3 12.5 1.5C12.4 1.5 12.2999 1.5 12.2999 1.5C11.6999 1.5 11 1.50002 10.4 1.40002H10.2999H9.69997H9.59997C9.29997 1.50002 9.09995 1.59999 8.89995 1.79999L3.59997 7.09998C3.49997 7.09998 3.49996 7.19999 3.49996 7.29999C3.19996 7.69999 3.09997 8.1 3.19997 8.5C3.29997 8.8 3.39997 9.00001 3.59997 9.20001L6.49996 12.1C6.69996 12.3 6.89997 12.5 7.09997 12.7C7.29997 12.9 7.39997 13 7.59997 13.2L7.69997 13.3C8.09997 13.6 8.59997 13.7 9.09997 13.6C9.29997 13.5 9.49997 13.4 9.69997 13.2C11.2 11.7 12.7 10.2 14.2 8.70001C14.5 8.40001 14.7 8.20002 15 7.90002C15.2 7.70002 15.3 7.50001 15.4 7.20001V7.09998V6.5C15 6.4 15 6.29999 15 6.29999ZM14.2 7.5L14.1 7.59998C12.4 9.29998 10.6 11.1 8.89995 12.8C8.79995 12.9 8.59995 13 8.39995 13.1C8.09995 13.2 7.89997 13.1 7.69997 12.9C7.59997 12.9 7.59997 12.8 7.59997 12.8L7.29995 12.5L6.89995 12.1C5.89995 11.1 4.79995 10 3.79995 9C3.69995 8.9 3.59996 8.7 3.49996 8.5C3.39996 8.2 3.49997 7.99999 3.69997 7.79999L3.79995 7.70001C5.49995 5.90001 7.29997 4.20002 9.09997 2.40002C9.19997 2.30002 9.39997 2.19998 9.59997 2.09998C9.69997 2.09998 9.79995 2.09998 9.89995 2.09998C9.99996 2.09998 10.1 2.09998 10.1 2.09998C10.6 2.09998 11.1 2.09998 11.6 2.09998C11.7 2.09998 11.6999 2.09998 11.7999 2.09998H11.9C12.2 2.09998 12.4 2.09998 12.7 2.09998C12.9 2.09998 13.0999 2.09998 13.2999 2.09998H13.5C13.6 2.09998 13.7 2.09998 13.9 2.09998C14.3 2.09998 14.6 2.49999 14.7 2.79999C14.7 2.89999 14.7 3.00001 14.7 3.20001C14.7 3.70001 14.7 4.20001 14.7 4.70001C14.7 5.40001 14.6999 6.10001 14.7999 6.70001C14.3999 7.10001 14.4 7.3 14.2 7.5Z"
                                                                      fill="black"/>
                                                            </svg>
                                                            برندهای برگزیده
                                                        </p>
                                                        <a href="https://www.banimode.com/Brand/1/%D8%AC%DB%8C%D9%86-%D9%88%D8%B3%D8%AA"
                                                           class="" target="_self"> <img
                                                                src="https://www.banimode.com/img/menu/image/1681552171_372271.jpg"
                                                                alt="picBrandJW" title=""/> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/category/digital"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316274_745701.svg" alt="کالای دیجیتال"> کالای
                                            دیجیتال </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/category/digital"> همه محصولات
                                                        کالای دیجیتال
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2938/mobile"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     موبایل                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2986/digital-mobile-samsung"
                                                                                           target="_self">گوشی
                                                            سامسونگ</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2989/digital-mobile-xiaomi"
                                                                                           target="_self">گوشی
                                                            شیائومی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2992/digital-mobile-apple"
                                                                                           target="_self">گوشی آیفون</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3016/digital-mobile-oppo"
                                                                                           target="_self">گوشی اوپو</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2995/digital-mobile-honor"
                                                                                           target="_self">گوشی آنر</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2998/digital-mobile-nokia"
                                                                                           target="_self">گوشی نوکیا</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3010/digital-mobile-motorola"
                                                                                           target="_self">گوشی
                                                            موتورولا</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3214/digital-mobile-realme"
                                                                                           target="_self">گوشی ریلمی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3013/digital-mobile-huawei"
                                                                                           target="_self">گوشی هوآوی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3007/digital-mobile-nothing-phone"
                                                                                           target="_self">گوشی ناتینگ
                                                            فون</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2941/laptop"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لپ تاپ                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3019/laptop-asus"
                                                                                           target="_self">لپ تاپ
                                                            ایسوس</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3022/laptop-lenovo"
                                                                                           target="_self">لپ تاپ
                                                            لنوو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3025/laptop-hp"
                                                                                           target="_self">لپ تاپ اچ
                                                            پی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3028/laptop-apple"
                                                                                           target="_self">لپ تاپ اپل (مک
                                                            بوک)</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3034/laptop-dell"
                                                                                           target="_self">لپ تاپ دل</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3031/laptop-acer"
                                                                                           target="_self">لپ تاپ
                                                            ایسر</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2944/smartwatch"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     ساعت هوشمند                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3253/digital-apple-smartwatch"
                                                                                           target="_self">ساعت هوشمند
                                                            اپل</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3244/digital-samsung-smartwatch"
                                                                                           target="_self">ساعت هوشمند
                                                            سامسونگ</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3256/digital-xiaomi-smartwatch"
                                                                                           target="_self">مچ بند هوشمند
                                                            شیائومی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3247/digital-haylou-smartwatch"
                                                                                           target="_self">ساعت هوشمند
                                                            هایلو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3250/digital-mibro-smartwatch"
                                                                                           target="_self">ساعت هوشمند
                                                            میبرو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3175/smart-watch-accessories"
                                                                                           target="_self">لوازم جانبی
                                                            ساعت هوشمند</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2947/headphone"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     هدفون و هنذفری                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3271/apple-handsfree"
                                                                                           target="_self">هدفون و
                                                            هندزفری اپل</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3274/samsung-handsfree"
                                                                                           target="_self">هدفون و
                                                            هندزفری سامسونگ</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3262/xiaomi-handsfree"
                                                                                           target="_self">هدفون و
                                                            هندزفری شیائومی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3259/qcy-handsfree"
                                                                                           target="_self">هدفون و
                                                            هندزفری کیو سی وای</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3265/hoco-handsfree"
                                                                                           target="_self">هدفون و
                                                            هندزفری هوکو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3268/anker-handsfree"
                                                                                           target="_self">هدفون و
                                                            هندزفری انکر</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2950/speaker"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     اسپیکر                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3316/digital-speaker-harman-kardon"
                                                                                           target="_self">اسپیکر هارمن
                                                            کاردن</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3322/digital-speaker-jbl"
                                                                                           target="_self">اسپیکر جی بی
                                                            ال</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3328/digital-speaker-sony"
                                                                                           target="_self">اسپیکر
                                                            سونی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3325/digital-speaker-anker"
                                                                                           target="_self">اسپیکر
                                                            انکر</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2962/cell-phone-accessories"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم جانبی موبایل                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3277/mobile-pouch-cover"
                                                                                           target="_self">قاب و کاور
                                                            موبایل</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3280/mobile-screen-guard"
                                                                                           target="_self">گلس گوشی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3283/mobile-data-cable"
                                                                                           target="_self">کابل شارژ و
                                                            مبدل موبایل</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3286/mobile-holder"
                                                                                           target="_self">هولدر
                                                            موبایل</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3289/power-bank"
                                                                                           target="_self">پاوربانک</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3295/audio-cable"
                                                                                           target="_self">کابل صدا
                                                            AUX</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3298/car-charger"
                                                                                           target="_self">شارژر
                                                            فندکی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3304/cell-phone-battery"
                                                                                           target="_self">باتری
                                                            موبایل</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2965/data-storage"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     هارد و تجهیزات ذخیره سازی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2968/digital-flash-memory"
                                                                                           target="_self">فلش مموری</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2977/digital-external-hard-disk"
                                                                                           target="_self">هارد
                                                            اکسترنال</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2980/ssd-memory"
                                                                                           target="_self">هارد SSD</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2983/digital-storage-accessories"
                                                                                           target="_self">لوازم جانبی
                                                            تجهیزات ذخیره سازی</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2971/digital-game-console"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کنسول بازی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3055/digital-office-machines"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     ماشین های اداری                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3058/digital-office-machines-printer"
                                                                                           target="_self">پرینتر</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3070/digital-network"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     تجهیزات شبکه و ارتباطات                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3073/digital-wifi-dongle"
                                                                                           target="_self">دانگل
                                                            وایرلس</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3064/digital-computer-parts"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کامپیوتر و تجهیزات جانبی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3067/digital-computer-all-in-one"
                                                                                           target="_self">کامپیوتر All
                                                            in One</a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/3142/watches-gold-jewelry"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316527_576787.svg" alt="ساعت و طلا"> ساعت و طلا </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/3142/watches-gold-jewelry"> همه
                                                        محصولات ساعت و طلا
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2480/category-watches"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     ساعت مچی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/254/category-women-watches"
                                                                                           target="_self">ساعت زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/253/category-men-watches"
                                                                                           target="_self">ساعت
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2410/category-teenage-girls-watches"
                                                                                           target="_self">ساعت دخترانه
                                                            نوجوان</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/747/%D8%B2%DB%8C%D9%88%D8%B1%D8%A2%D9%84%D8%A7%D8%AA-%D8%B7%D9%84%D8%A7-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     زیورآلات طلا زنانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/748/women-gold-rings"
                                                                                           target="_self">انگشتر طلا
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/749/women-gold-earrings"
                                                                                           target="_self">گوشواره طلا
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/750/women-gold-Necklaces"
                                                                                           target="_self">گردنبند طلا
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/751/women-gold-watch-chains"
                                                                                           target="_self">آویز ساعت طلا
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/752/women-gold-anklets"
                                                                                           target="_self">پابند طلا
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/753/%D8%AF%D8%B3%D8%AA%D8%A8%D9%86%D8%AF-%D8%B7%D9%84%D8%A7-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">دستبند طلا
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/754/%D8%B3%D8%AA-%D8%B7%D9%84%D8%A7-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">ست طلا
                                                            زنانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2929/gold-jewelry-m"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     زیورآلات طلا مردانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3076/girls-gold-jewelry"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     زیورآلات طلا دخترانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3040/bullion-gold"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     شمش طلا                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/763/%D8%A8%D8%AF%D9%84%DB%8C%D8%AC%D8%A7%D8%AA-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     بدلیجات زنانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/222/%DA%AF%D9%88%D8%B4%D9%88%D8%A7%D8%B1%D9%87-%D8%A8%D8%AF%D9%84"
                                                                                           target="_self">گوشواره بدل
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/221/%D8%AF%D8%B3%D8%AA%D8%A8%D9%86%D8%AF-%D8%A8%D8%AF%D9%84-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">دستبند بدل
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/223/%DA%AF%D8%B1%D8%AF%D9%86%D8%A8%D9%86%D8%AF-%D8%A8%D8%AF%D9%84-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">گردنبند بدل
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/224/%D8%A7%D9%86%DA%AF%D8%B4%D8%AA%D8%B1-%D8%A8%D8%AF%D9%84-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">انگشتر بدل
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/255/%D8%A2%D9%88%DB%8C%D8%B2-%D8%B3%D8%A7%D8%B9%D8%AA-%D8%A8%D8%AF%D9%84-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">آویز ساعت بدل
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/257/%D9%BE%D8%A7%D8%A8%D9%86%D8%AF-%D8%A8%D8%AF%D9%84-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">پابند بدل
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/764/%D8%B3%D8%AA-%D8%A8%D8%AF%D9%84%DB%8C%D8%AC%D8%A7%D8%AA-%D8%B2%D9%86%D8%A7%D9%86%D9%87"
                                                                                           target="_self">ست بدلیجات
                                                            زنانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/910/%D8%A8%D8%AF%D9%84%DB%8C%D8%AC%D8%A7%D8%AA-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     بدلیجات مردانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/225/%D8%AF%D8%B3%D8%AA%D8%A8%D9%86%D8%AF-%D8%A8%D8%AF%D9%84-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">دستبند بدل
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/226/%D8%A7%D9%86%DA%AF%D8%B4%D8%AA%D8%B1-%D8%A8%D8%AF%D9%84-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">انگشتر بدل
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/227/%DA%AF%D8%B1%D8%AF%D9%86%D8%A8%D9%86%D8%AF-%D8%A8%D8%AF%D9%84-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"
                                                                                           target="_self">گردنبند بدل
                                                            مردانه</a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/183/category-health-beauty"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316349_568611.svg" alt="زیبایی و سلامت"> زیبایی و
                                            سلامت </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/183/category-health-beauty"> همه
                                                        محصولات زیبایی و سلامت
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/259/category-perfume-all"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     عطر و ادکلن                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/184/category-women-perfume"
                                                                                           target="_self">عطر و ادکلن
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/187/category-men-perfume"
                                                                                           target="_self">عطر و ادکلن
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/189/category-child-and-baby-perfume"
                                                                                           target="_self">عطر و ادکلن
                                                            بچه گانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2046/category-body-splash"
                                                                                           target="_self">بادی اسپلش</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3358/category-body-spray"
                                                                                           target="_self">اسپری بدن</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/256/category-health-beauty-cosmetic"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم آرایشی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/241/category-health-beauty-face-cosmetics"
                                                                                           target="_self">آرایش صورت</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/242/category-health-beauty-eye-and-eyebrow-cosmetics"
                                                                                           target="_self">آرایش چشم و
                                                            ابرو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/243/category-health-beauty-lip-cosmetics"
                                                                                           target="_self">آرایش لب</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3469/category-health-beauty-hair-cosmetics"
                                                                                           target="_self">آرایش مو</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/393/category-health-beauty-nail-care-cosmetics"
                                                                                           target="_self">آرایش ناخن</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3361/category-health-beauty-personal-care"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم بهداشتی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/307/category-health-beauty-dental-hygienist"
                                                                                           target="_self">بهداشت دهان و
                                                            دندان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/344/category-health-beauty-sexual-health"
                                                                                           target="_self">بهداشت
                                                            جنسی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/385/category-health-beauty-hair-shaving-kit"
                                                                                           target="_self">لوازم اصلاح
                                                            مو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/328/category-health-beauty-anti-sweat"
                                                                                           target="_self">ضد تعریق</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1202/category-health-beauty-mask-safety-equipment"
                                                                                           target="_self">ماسک تنفسی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3502/category-health-beauty-female-hygiene"
                                                                                           target="_self">بهداشت
                                                            زنان</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/549/category-health-beauty-electrical-personal-care"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم شخصی برقی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/551/category-health-beauty-hair-drier"
                                                                                           target="_self">سشوار</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/553/category-health-beauty-hair-iron"
                                                                                           target="_self">اتو مو و حالت
                                                            دهنده</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/381/category-health-beauty-nose-clipping"
                                                                                           target="_self">اصلاح موی گوش
                                                            و بینی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/418/category-health-beauty-shaver"
                                                                                           target="_self">اصلاح موی سر و
                                                            صورت</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/557/category-health-beauty-epilator"
                                                                                           target="_self">اصلاح موی بدن
                                                            بانوان</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/565/category-health-beauty-skin-care-accessories"
                                                                                           target="_self">ابزار مراقبت
                                                            از پوست</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/382/category-health-beauty--hair-shaping"
                                                                                           target="_self">بیگودی و فر
                                                            کننده مو</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/244/category-health-beauty-skin-and-hair-care"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     مراقبت پوست و مو                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/315/category-health-beauty-moisturizing-cream"
                                                                                           target="_self">کرم مرطوب
                                                            کننده</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/308/category-health-beauty-sunscreen-cream"
                                                                                           target="_self">کرم ضد
                                                            آفتاب</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/378/category-health-beauty-eye-cream"
                                                                                           target="_self">کرم دور
                                                            چشم</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/376/category-health-beauty-peeling-skin"
                                                                                           target="_self">اسکراب و لایه
                                                            بردار</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/375/category-health-beauty-anti-ageing-cream"
                                                                                           target="_self">کرم و سرم ضد
                                                            چروک</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/415/category-health-beauty-anti-acne-cream"
                                                                                           target="_self">کرم و ژل ضد
                                                            جوش</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/585/category-health-beauty-lightening-cream"
                                                                                           target="_self">کرم روشن
                                                            کننده</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/294/category-health-beauty-self-tanning"
                                                                                           target="_self">کرم برنز
                                                            کننده</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/579/category-health-beauty-face-masque"
                                                                                           target="_self">ماسک صورت و
                                                            بدن</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/325/category-health-beauty-face-wash-gel"
                                                                                           target="_self">ژل شستشوی
                                                            صورت</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/414/category-health-beauty-lash-and-eyebrow-gel"
                                                                                           target="_self">تقویت کننده
                                                            مو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/310/category-health-beauty-hair-shampoo"
                                                                                           target="_self">شامپو مو</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/311/category-health-beauty-hair-conditioner"
                                                                                           target="_self">نرم کننده
                                                            مو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/380/category-health-beauty-hair-mask"
                                                                                           target="_self">ماسک مو</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/304/category-health-beauty-accessory"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     اکسسوری آرایشی بهداشتی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/305/category-health-beauty-accessory-pocket-mirror"
                                                                                           target="_self">آینه جیبی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/296/category-health-beauty-accessory-tweezers"
                                                                                           target="_self">موچین</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/302/category-health-beauty-accessory-cosmetic-pad"
                                                                                           target="_self">پد آرایشی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/303/category-health-beauty-accessory-cosmetic-brush"
                                                                                           target="_self">براش
                                                            آرایشی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/298/category-health-beauty-accessory-eyelash-curler"
                                                                                           target="_self">فرمژه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/306/category-health-beauty-accessory-cosmetic-pencil-sharpener"
                                                                                           target="_self">تراش
                                                            آرایشی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/354/category-health-beauty-accessory-cosmetic-bags"
                                                                                           target="_self">کیف لوازم
                                                            آرایشی</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/307/category-health-beauty-dental-hygienist"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     بهداشت دهان و دندان                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/309/category-health-beauty-tooth-brush"
                                                                                           target="_self">مسواک</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/391/category-health-beauty-toothpaste"
                                                                                           target="_self">خمیر دندان</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/312/category-health-beauty-mouthwash"
                                                                                           target="_self">دهان شویه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1140/category-health-beauty-dent-floss"
                                                                                           target="_self">نخ دندان</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/561/category-health-beauty-electric-toothbrush"
                                                                                           target="_self">مسواک برقی</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"><a
                                                        href="https://www.banimode.com/243/%D8%B1%DA%98-%D9%84%D8%A8"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1686733275_350165.png" alt="lipstick1"
                                                            title=""/> </a> <a
                                                        href="https://www.banimode.com/325/%DA%98%D9%84-%D8%B4%D8%B3%D8%AA%D8%B4%D9%88-%D8%B5%D9%88%D8%B1%D8%AA"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1686733317_321856.png" alt="facewash2"
                                                            title=""/> </a></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/1208/category-sports-and-travel"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316363_435034.svg" alt="ورزش و سفر"> ورزش و سفر </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/1208/category-sports-and-travel">
                                                        همه محصولات ورزش و سفر
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3559/category-sportswear"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لباس ورزشی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/932/category-men-sportswear"
                                                                                           target="_self">لباس ورزشی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/720/category-women-sportwear"
                                                                                           target="_self">لباس ورزشی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1223/category-boys-sportswear"
                                                                                           target="_self">لباس ورزشی
                                                            پسرانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1225/category-girls-sportswear"
                                                                                           target="_self">لباس ورزشی
                                                            دخترانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3562/category-sport-shoes"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کفش ورزشی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/529/category-men-sport-shoes"
                                                                                           target="_self">کفش ورزشی
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/537/category-women-sport-shoes"
                                                                                           target="_self">کفش ورزشی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/919/category-boys-sport-shoes"
                                                                                           target="_self">کفش ورزشی
                                                            پسرانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3565/category-sports-bag"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کیف و ساک ورزشی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/439/category-women-sports-bag"
                                                                                           target="_self">کیف و ساک
                                                            ورزشی زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/427/category-men-sports-bag"
                                                                                           target="_self">کیف و ساک
                                                            ورزشی مردانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/771/category-sporting-goods"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم ورزشی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1513/category-skate-and-scooter"
                                                                                           target="_self">اسکیت و
                                                            اسکوتر</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1581/category-ball-sports-equipment"
                                                                                           target="_self">توپ و تجهیزات
                                                            ورزش های توپی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1617/category-sport-thermos-shaker-flask"
                                                                                           target="_self">قمقمه، فلاسک و
                                                            شیکر ورزشی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1611/category-sport-ropes"
                                                                                           target="_self">طناب ورزشی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1546/category-sport-women-accessories"
                                                                                           target="_self">اکسسوری ورزشی
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1547/category-sport-men-accessories"
                                                                                           target="_self">اکسسوری ورزشی
                                                            مردانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3568/category-traveling-equipment"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم کمپینگ و سفر                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"><a
                                                        href="https://www.banimode.com/725/women-sport-Leggings"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1686732258_491272.png" alt="Wleg1"
                                                            title=""/> </a> <a
                                                        href="https://www.banimode.com/721/women-sport-tops" class=""
                                                        target="_self"> <img src="https://www.banimode.com/img/menu/image/1688304559_130937.jpg"
                                                                             alt="women-sport-tops" title=""/> </a>
                                                </div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/567/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%AE%D8%A7%D9%86%D9%87"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316377_777509.svg" alt="لوازم خانه"> لوازم خانه </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/567/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%AE%D8%A7%D9%86%D9%87">
                                                        همه محصولات لوازم خانه
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/567/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%AE%D8%A7%D9%86%D9%87"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     خانه و آشپزخانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/786/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%A2%D8%B4%D9%BE%D8%B1%D8%AE%D8%A7%D9%86%D9%87"
                                                                                           target="_self">لوازم
                                                            آشپزخانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1624/dishes"
                                                                                           target="_self">ظروف</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/803/%DA%A9%D8%A7%D9%84%D8%A7%DB%8C-%D8%AE%D9%88%D8%A7%D8%A8-%D9%88-%D8%A7%D8%B3%D8%AA%D8%B1%D8%A7%D8%AD%D8%AA"
                                                                                           target="_self">کالای خواب و
                                                            استراحت</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/791/%D8%AD%D9%85%D8%A7%D9%85"
                                                                                           target="_self">وسایل حمام</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/573/%D8%AD%D9%88%D9%84%D9%87"
                                                                                           target="_self">حوله</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/798/home-serve"
                                                                                           target="_self">سرو و
                                                            پذیرایی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1254/%D9%85%D8%A8%D9%84%D9%85%D8%A7%D9%86-%D9%88-%D9%88%D8%B3%D8%A7%DB%8C%D9%84-%D8%AF%D8%A7%D8%AE%D9%84%DB%8C"
                                                                                           target="_self">لوازم مبلمان و
                                                            وسایل داخلی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1252/%D8%B3%D8%B1%D9%88%DB%8C%D8%B3-%D8%A8%D9%87%D8%AF%D8%A7%D8%B4%D8%AA%DB%8C"
                                                                                           target="_self">لوازم سرویس
                                                            بهداشتی</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/1315/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%A8%D8%B1%D9%82%DB%8C-%D8%AE%D8%A7%D9%86%DA%AF%DB%8C"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم برقی خانگی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2959/television"
                                                                                           target="_self">تلویزیون</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1316/%D8%AC%D8%A7%D8%B1%D9%88%D8%A8%D8%B1%D9%82%DB%8C"
                                                                                           target="_self">جاروبرقی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3373/category-home-appliance-washing-machines"
                                                                                           target="_self">ماشین
                                                            لباسشویی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3376/category-home-appliance-dishwasher"
                                                                                           target="_self">ماشین
                                                            ظرفشویی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3379/category-home-appliance-iron"
                                                                                           target="_self">اتو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3364/category-home-appliance-refrigerator-freezer"
                                                                                           target="_self">یخچال و
                                                            فریزر</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3367/category-home-appliance-side-by-side-refrigerator"
                                                                                           target="_self">یخچال فریزر
                                                            ساید بای ساید</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3391/category-home-appliance-coffee-makers"
                                                                                           target="_self">قهوه ساز</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3394/category-home-appliance-tea-makers"
                                                                                           target="_self">چای ساز</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3397/category-home-appliance-juicer"
                                                                                           target="_self">آبمیوه
                                                            گیری</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3439/category-home-appliance-boiler"
                                                                                           target="_self">کتری برقی</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3400/category-home-cooking"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم پخت و پز                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3403/category-home-cooking-electric-rice-cooker"
                                                                                           target="_self">پلوپز</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3406/category-home-cooking-fry"
                                                                                           target="_self">سرخ کن</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3412/category-home-cooking-steamer"
                                                                                           target="_self">بخارپز،
                                                            هواپز</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3415/category-home-cooking-food-processor"
                                                                                           target="_self">غذاساز</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3418/category-home-cooking-chopper"
                                                                                           target="_self">خرد کن</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3421/category-home-cooking-hand-blender"
                                                                                           target="_self">گوشت کوب
                                                            برقی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3424/category-home-cooking-mixer"
                                                                                           target="_self">همزن برقی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3427/category-home-cooking--blenders"
                                                                                           target="_self">مخلوط کن</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3430/category-home-cooking-meat-mincers"
                                                                                           target="_self">چرخ گوشت</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3433/category-home-cooking-toaster"
                                                                                           target="_self">توستر</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3436/category-home-cooking-sandwich-makers"
                                                                                           target="_self">ساندویچ
                                                            ساز</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3442/category-home-cooking-grinder"
                                                                                           target="_self">آسیاب برقی</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/632/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%AF%DA%A9%D9%88%D8%B1%D8%A7%D8%B3%DB%8C%D9%88%D9%86-%D9%85%D9%86%D8%B2%D9%84"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     تزیینی و دکوری خانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1728/sculpture"
                                                                                           target="_self">مجسمه و
                                                            تندیس</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/634/%D8%B4%D9%85%D8%B9"
                                                                                           target="_self">شمع تزئینی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1204/%DA%AF%D9%84-%D9%88-%DA%AF%D9%84%D8%AF%D8%A7%D9%86"
                                                                                           target="_self">گلدان و گل
                                                            مصنوعی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1310/%D8%AA%D8%A7%D8%A8%D9%84%D9%88"
                                                                                           target="_self">تابلو</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/2208/%D9%BE%D8%B1%D8%AF%D9%87"
                                                                                           target="_self">پرده</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1254/%D9%85%D8%A8%D9%84%D9%85%D8%A7%D9%86-%D9%88-%D9%88%D8%B3%D8%A7%DB%8C%D9%84-%D8%AF%D8%A7%D8%AE%D9%84%DB%8C"
                                                                                           target="_self">کوسن، رومیزی و
                                                            شال مبل </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3088/carpet"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     فرش                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3097/machine-made-carpet"
                                                                                           target="_self">فرش ماشینی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3100/hand-made-carpet"
                                                                                           target="_self">فرش دستباف</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3103/rug-gabbeh"
                                                                                           target="_self">گلیم و گبه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3115/carpet-kilim"
                                                                                           target="_self">گلیم فرش</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3091/light-brightness"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     نور و روشنایی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3094/hanging-lamps"
                                                                                           target="_self">لوستر</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/3139/%DA%86%D8%B1%D8%A7%D8%BA-%D9%88-%DA%86%D8%B1%D8%A7%D8%BA-%D9%82%D9%88%D9%87"
                                                                                           target="_self">چراغ و چراغ
                                                            قوه</a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"><a
                                                        href="https://www.banimode.com/791/%D8%AD%D9%85%D8%A7%D9%85"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1688304739_825009.jpg" alt="Towel1"
                                                            title=""/> </a> <a
                                                        href="https://www.banimode.com/803/bedclothes-and-rest" class=""
                                                        target="_self"> <img src="https://www.banimode.com/img/menu/image/1688304760_902373.jpg"
                                                                             alt="bedspread" title=""/> </a></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/3157/children-babies-toys"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316390_168518.svg" alt="کودک و سرگرمی"> کودک و
                                            سرگرمی </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/3157/children-babies-toys"> همه
                                                        محصولات کودک و سرگرمی
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/951/%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8-%D8%A8%D8%A7%D8%B2%DB%8C"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     اسباب بازی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1162/%D9%84%DA%AF%D9%88-%D9%BE%D8%A7%D8%B2%D9%84-%D9%88-%D8%A7%D9%86%D9%88%D8%A7%D8%B9-%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8-%D8%A8%D8%A7%D8%B2%DB%8C-%D9%81%DA%A9%D8%B1%DB%8C-%D9%88-%D8%A2%D9%85%D9%88%D8%B2%D8%B4%DB%8C"
                                                                                           target="_self">لگو، پازل و
                                                            انواع اسباب بازی فکری و آموزشی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1160/%D9%85%D8%A7%D8%B4%DB%8C%D9%86-%D8%A8%D8%A7%D8%B2%DB%8C-%D9%88-%D9%88%D8%B3%D8%A7%DB%8C%D9%84-%D9%86%D9%82%D9%84%DB%8C%D9%87-%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8-%D8%A8%D8%A7%D8%B2%DB%8C"
                                                                                           target="_self">ماشین بازی و
                                                            وسایل نقلیه اسباب بازی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1551/%D8%A8%D8%A7%D8%B2%DB%8C-%D9%81%D8%B6%D8%A7%DB%8C-%D8%A8%D8%A7%D8%B2"
                                                                                           target="_self">بازی فضای
                                                            باز</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1157/%D8%B9%D8%B1%D9%88%D8%B3%DA%A9-%D9%88-%D8%B3%D8%AA-%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8-%D8%A8%D8%A7%D8%B2%DB%8C"
                                                                                           target="_self">عروسک و ست
                                                            اسباب بازی</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1158/%D8%AA%D9%81%D9%86%DA%AF-%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8-%D8%A8%D8%A7%D8%B2%DB%8C-%D9%88-%D9%85%D8%A8%D8%A7%D8%B1%D8%B2%D9%87"
                                                                                           target="_self">تفنگ اسباب
                                                            بازی و مبارزه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2247/baby-bath-tubs"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     بهداشت و حمام کودک و نوزاد                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/636/baby-nutrition-growth"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     تغذیه و رشد نوزاد                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/659/%D8%A7%DB%8C%D9%85%D9%86%DB%8C-%D9%88-%D9%85%D8%B1%D8%A7%D9%82%D8%A8%D8%AA"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم ایمنی و مراقبت کودک و نوزاد                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/874/%DA%A9%D8%A7%D9%84%D8%A7%DB%8C-%D8%AE%D9%88%D8%A7%D8%A8-%DA%A9%D9%88%D8%AF%DA%A9-%D9%88-%D9%86%D9%88%D8%B2%D8%A7%D8%AF"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     کالای خواب کودک و نوزاد                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/1697/baby-traveling-equipments"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم گردش و سفر نوزاد                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/637/baby-accessories"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم نوزاد، پستانک، شیردوش                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"><a
                                                        href="https://www.banimode.com/1160/%D9%85%D8%A7%D8%B4%DB%8C%D9%86-%D8%A8%D8%A7%D8%B2%DB%8C-%D9%88-%D9%88%D8%B3%D8%A7%DB%8C%D9%84-%D9%86%D9%82%D9%84%DB%8C%D9%87-%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8-%D8%A8%D8%A7%D8%B2%DB%8C"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1686732940_448030.png" alt="cartoy1"
                                                            title=""/> </a> <a
                                                        href="https://www.banimode.com/1157/%D8%B9%D8%B1%D9%88%D8%B3%DA%A9-%D9%88-%D8%B3%D8%AA-%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8-%D8%A8%D8%A7%D8%B2%DB%8C"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1688304343_756367.jpg" alt="doll1"
                                                            title=""/> </a></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/1671/%D9%81%D8%B1%D9%87%D9%86%DA%AF-%D9%88-%D9%87%D9%86%D8%B1"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717316403_379986.svg" alt="لوازم تحریر"> لوازم تحریر
                                        </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/1671/%D9%81%D8%B1%D9%87%D9%86%DA%AF-%D9%88-%D9%87%D9%86%D8%B1">
                                                        همه محصولات لوازم تحریر
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/1152/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%AA%D8%AD%D8%B1%DB%8C%D8%B1"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم تحریر                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/1589/pencil-case"
                                                                                           target="_self">جامدادی</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="https://www.banimode.com/396/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%A7%D8%AF%D8%A7%D8%B1%DB%8C"
                                                                                           target="_self">لوازم
                                                            اداری</a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"><a
                                                        href="https://www.banimode.com/1522/notebook" class=""
                                                        target="_self"> <img src="https://www.banimode.com/img/menu/image/1688304435_676849.jpg"
                                                                             alt="notebook" title=""/> </a> <a
                                                        href="https://www.banimode.com/1575/%DA%AF%D9%88%D8%A7%D8%B4-%D9%88-%D8%A2%D8%A8%D8%B1%D9%86%DA%AF"
                                                        class="" target="_self"> <img
                                                            src="https://www.banimode.com/img/menu/image/1688304489_690543.jpg"
                                                            alt="Gouache-watercolor" title=""/> </a></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/2772/%D8%AE%D8%A7%D9%86%D9%87-%D9%85%D8%AF"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717320829_402080.svg" alt="خانه مد"> خانه مد </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/2772/%D8%AE%D8%A7%D9%86%D9%87-%D9%85%D8%AF">
                                                        همه محصولات خانه مد
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="/2772/خانه-مد?category|0|4=زنانه"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     زنانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|4=لباس%20زنانه"
                                                                                           target="_self">لباس زنانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|295=کیف%20و%20کفش%20زنانه"
                                                                                           target="_self">کیف و کفش
                                                            زنانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|83=اکسسوری%20زنانه"
                                                                                           target="_self">اکسسوری
                                                            زنانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="/2772/خانه-مد?category|0|3=مردانه"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     مردانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|3=لباس%20مردانه"
                                                                                           target="_self">لباس
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|623=کیف%20و%20کفش%20مردانه"
                                                                                           target="_self">کیف و کفش
                                                            مردانه</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|82=اکسسوری%20مردانه"
                                                                                           target="_self">اکسسوری
                                                            مردانه</a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="/2772/خانه-مد?category|0|5=بچگانه"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     بچگانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|68=دخترانه"
                                                                                           target="_self">دخترانه</a>
                                                    </li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|505=پسرانه"
                                                                                           target="_self">پسرانه</a>
                                                    </li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="/2772/خانه-مد?category|0|567=لوازم%20خانه"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     لوازم خانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|632=لوازم%20دکوراسیون%20منزل"
                                                                                           target="_self">لوازم
                                                            دکوراسیون منزل</a></li>
                                                    <li class="third-child-li" title=""><a class="third-child"
                                                                                           href="/2772/خانه-مد?category|0|786=لوازم%20آشپرخانه"
                                                                                           target="_self">لوازم
                                                            آشپرخانه</a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="category-details-li" title=""><a class="first-child"
                                                                                href="https://www.banimode.com/new-products?sort|time=desc"
                                                                                target="_self"> <img
                                                src="https://www.banimode.com/img/menu/icon/1717320818_829615.svg" alt="جدیدترین ها"> جدیدترین ها
                                        </a>
                                        <div class="submenu">
                                            <div class="submenu-content">
                                                <p class="submenu-title"><a
                                                        href="https://www.banimode.com/new-products?sort|time=desc"> همه
                                                        محصولات جدیدترین ها
                                                        <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </a></p>
                                                <ul>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3151/fashion-clothing?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های مد و پوشاک                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/2935/%D8%AF%DB%8C%D8%AC%DB%8C%D8%AA%D8%A7%D9%84?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های کالای دیجیتال                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3142/watches-gold-jewelry?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های ساعت، طلا و زیورآلات                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/1208/category-sports-and-travel?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های ورزش و سفر                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/183/category-health-beauty?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های سلامت و زیبایی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/567/%D9%84%D9%88%D8%A7%D8%B2%D9%85-%D8%AE%D8%A7%D9%86%D9%87?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های لوازم خانه                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/3157/children-babies-toys?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های کودک، نوزاد و اسباب بازی                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                    <li class="second-child-li" title=""><a class="second-child"
                                                                                            href="https://www.banimode.com/1671/%D9%81%D8%B1%D9%87%D9%86%DA%AF-%D9%88-%D9%87%D9%86%D8%B1?sort|date=desc"
                                                                                            target="_self"> <span
                                                                class="wall"></span> <span>                                                                                     جدیدترین های کتاب، لوازم تحریر و هنر                                                                                 </span>
                                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1L1 5L5 9" stroke="black"
                                                                      stroke-miterlimit="10"/>
                                                            </svg>
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <div class="submenu-extra">
                                                <div class="submenu-banners"></div>
                                                <div class="submenu-brands">
                                                    <div class="brand-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="top-list  direct-link" title=""><a class="top-list-content"
                                                                  href="https://www.banimode.com/landing/flashsales/"
                                                                  target="_self"> شگفت انگیز <span
                                class="underline"></span> </a></li>
                    <li class="top-list  direct-link" title=""><a class="top-list-content"
                                                                  href="https://www.banimode.com/2776/%D8%A7%D9%88%D8%AA%D9%84%D8%AA"
                                                                  target="_self"> اوتلت <span class="underline"></span>
                        </a></li>
                    <li class="top-list  open-brands" title=""><a class="top-list-content"
                                                                  href="https://www.banimode.com/manufacturers"
                                                                  target="_self"> <span class="wall"></span> برند ها
                            <span class="underline"></span> </a>
                        <div class="cat-details">
                            <div class="cat-item">
                                <ul class="dynamic-cat-list">
                                    <ul class="dynamic-cat-list">
                                        <li class="brands-li first-child" title=""><a href="#" target="_self" class="">
                                                <span class="wall"></span> برندها </a>
                                            <ul>
                                                <li class="brands-li" title=""><a href="/Brand/2/جوتی-جینز"
                                                                                  target="_self">جوتی جینز</a></li>
                                                <li class="brands-li" title=""><a href="/Brand/1/جین-وست"
                                                                                  target="_self">جین وست</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/965/%D9%BE%DB%8C%D8%B1%DA%A9%D8%A7%D8%B1%D8%AF%DB%8C%D9%86"
                                                        target="_self">پیر کاردین</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/683/%DA%A9%D9%88%D8%AA%D9%88%D9%86"
                                                        target="_self">کوتون</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/614/%D8%A7%D9%84-%D8%B3%DB%8C-%D9%88%D8%A7%DB%8C%DA%A9%DB%8C%DA%A9%DB%8C"
                                                        target="_self">ال سی وایکیکی</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/706/%D8%AF%D9%84%D8%B3%DB%8C"
                                                        target="_self">دلسی</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/631/%DA%A9%D8%B1%D9%88%D9%85"
                                                        target="_self">کروم</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/562/%D8%AF%D9%86%DB%8C%D9%84%DB%8C"
                                                        target="_self">دنیلی</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/868/%D8%B5%D8%A7%D8%AF"
                                                        target="_self">صاد</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/231/%DA%A9%D8%A7%D8%B3%DB%8C%D9%88"
                                                        target="_self">کاسیو</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/752/%D8%B4%DB%8C%D8%A7%D8%A6%D9%88%D9%85%DB%8C"
                                                        target="_self">شیائومی</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/1504/%DA%A9%DB%8C%D8%A7-%DA%AF%D8%A7%D9%84%D8%B1%DB%8C"
                                                        target="_self">کیا گالری</a></li>
                                                <li class="brands-li" title=""><a
                                                        href="https://www.banimode.com/Brand/995/%D9%85%D9%86%D8%B7"
                                                        target="_self">منط</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="cat-items-all-cats"><a href="https://www.banimode.com/manufacturers">
                                            همه برندها
                                            <svg width="6" height="10" viewbox="0 0 6 10" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 1L1 5L5 9" stroke="black" stroke-miterlimit="10"/>
                                            </svg>
                                        </a></div>
                            </div>
                            <div class="cats-banners">
                                <p class="top-cats-item">
                                    <svg width="16" height="14" viewbox="0 0 16 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4 3.79999C11.2 3.79999 11 3.80002 10.8 3.90002C10.6 4.00002 10.4 4.09999 10.3 4.29999C10.2 4.39999 10.1 4.60001 10.1 4.70001C10.1 4.80001 10 4.89998 10 5.09998C10 5.19998 10 5.30002 10 5.40002C10.1 6.00002 10.6 6.40002 11.3 6.40002C11.9 6.40002 12.4 5.99998 12.5 5.59998C12.6 5.49998 12.6 5.29998 12.6 5.09998C12.6 4.89998 12.6 4.7 12.5 4.5C12.4 4.1 11.9 3.79999 11.4 3.79999ZM11.4 5.90002C11 5.90002 10.6 5.49998 10.6 5.09998V5C10.6 4.8 10.7 4.69998 10.8 4.59998C10.9 4.49998 11.1 4.40002 11.4 4.40002C11.8 4.40002 12.2 4.70001 12.2 5.20001C12.1 5.60001 11.7 5.90002 11.4 5.90002Z"
                                              fill="black"/>
                                        <path d="M15 6.29999C15 5.79999 15 5.29999 15 4.79999C15 4.19999 15 3.60002 14.9 2.90002C14.9 2.20002 14.3999 1.69998 13.7999 1.59998C13.6999 1.59998 13.6 1.59998 13.5 1.59998C13.3 1.59998 13.1 1.59998 13 1.59998C12.8 1.19998 12.5 0.800012 12 0.700012C11.9 0.700012 11.8 0.700012 11.7 0.700012C11.2 0.700012 10.7999 0.700012 10.2999 0.700012C9.69995 0.700012 8.99996 0.699976 8.39995 0.599976H8.29995H7.69997H7.59997C7.29997 0.699976 7.09995 0.8 6.89995 1L0.699973 7.20001C0.599973 7.20001 0.599967 7.30002 0.599967 7.40002C0.299967 7.80002 0.199948 8.19998 0.299948 8.59998C0.399948 8.89998 0.499973 9.09999 0.699973 9.29999C1.99997 10.6 3.29997 11.9 4.59997 13.2L4.69997 13.3C5.09997 13.6 5.49995 13.7 5.89995 13.6H5.99996C6.09996 13.6 6.29995 13.5 6.39995 13.4L5.99996 13C5.89996 13 5.89995 13.1 5.79995 13.1C5.59995 13.1 5.49995 13.1 5.29995 13.1C5.19995 13.1 5.09996 13 4.99996 13C4.89996 13 4.89995 12.9 4.89995 12.9C3.59995 11.6 2.29996 10.3 0.999961 9C0.899961 8.9 0.799973 8.7 0.699973 8.5C0.599973 8.2 0.699954 7.99999 0.899954 7.79999L0.999961 7.70001C2.69996 5.90001 5.49997 3.2 7.19997 1.5C7.29997 1.4 7.49997 1.30001 7.69997 1.20001C7.79997 1.20001 7.89996 1.20001 7.99996 1.20001C8.09996 1.20001 8.19997 1.20001 8.19997 1.20001C8.69997 1.20001 9.19997 1.20001 9.69997 1.20001C9.79997 1.20001 9.79995 1.20001 9.89995 1.20001H9.99996C10.5 1.20001 11 1.20001 11.5 1.20001C11.6 1.20001 11.7 1.20001 11.9 1.20001C12.1 1.20001 12.4 1.3 12.5 1.5C12.4 1.5 12.2999 1.5 12.2999 1.5C11.6999 1.5 11 1.50002 10.4 1.40002H10.2999H9.69997H9.59997C9.29997 1.50002 9.09995 1.59999 8.89995 1.79999L3.59997 7.09998C3.49997 7.09998 3.49996 7.19999 3.49996 7.29999C3.19996 7.69999 3.09997 8.1 3.19997 8.5C3.29997 8.8 3.39997 9.00001 3.59997 9.20001L6.49996 12.1C6.69996 12.3 6.89997 12.5 7.09997 12.7C7.29997 12.9 7.39997 13 7.59997 13.2L7.69997 13.3C8.09997 13.6 8.59997 13.7 9.09997 13.6C9.29997 13.5 9.49997 13.4 9.69997 13.2C11.2 11.7 12.7 10.2 14.2 8.70001C14.5 8.40001 14.7 8.20002 15 7.90002C15.2 7.70002 15.3 7.50001 15.4 7.20001V7.09998V6.5C15 6.4 15 6.29999 15 6.29999ZM14.2 7.5L14.1 7.59998C12.4 9.29998 10.6 11.1 8.89995 12.8C8.79995 12.9 8.59995 13 8.39995 13.1C8.09995 13.2 7.89997 13.1 7.69997 12.9C7.59997 12.9 7.59997 12.8 7.59997 12.8L7.29995 12.5L6.89995 12.1C5.89995 11.1 4.79995 10 3.79995 9C3.69995 8.9 3.59996 8.7 3.49996 8.5C3.39996 8.2 3.49997 7.99999 3.69997 7.79999L3.79995 7.70001C5.49995 5.90001 7.29997 4.20002 9.09997 2.40002C9.19997 2.30002 9.39997 2.19998 9.59997 2.09998C9.69997 2.09998 9.79995 2.09998 9.89995 2.09998C9.99996 2.09998 10.1 2.09998 10.1 2.09998C10.6 2.09998 11.1 2.09998 11.6 2.09998C11.7 2.09998 11.6999 2.09998 11.7999 2.09998H11.9C12.2 2.09998 12.4 2.09998 12.7 2.09998C12.9 2.09998 13.0999 2.09998 13.2999 2.09998H13.5C13.6 2.09998 13.7 2.09998 13.9 2.09998C14.3 2.09998 14.6 2.49999 14.7 2.79999C14.7 2.89999 14.7 3.00001 14.7 3.20001C14.7 3.70001 14.7 4.20001 14.7 4.70001C14.7 5.40001 14.6999 6.10001 14.7999 6.70001C14.3999 7.10001 14.4 7.3 14.2 7.5Z"
                                              fill="black"/>
                                    </svg>
                                    برندهای برگزیده
                                </p>
                                <div class="top-cats-item-wrapper"><a
                                        href="https://www.banimode.com/Brand/1/%D8%AC%DB%8C%D9%86-%D9%88%D8%B3%D8%AA"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1681735866_905745.jpg"
                                                                      alt="جین وست" title=""> </a> <a
                                        href="https://www.banimode.com/Brand/2/%D8%AC%D9%88%D8%AA%DB%8C-%D8%AC%DB%8C%D9%86%D8%B2"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1681735851_343350.jpg"
                                                                      alt="جوتی جینز" title=""> </a> <a
                                        href="https://www.banimode.com/Brand/965/%D9%BE%DB%8C%D8%B1%DA%A9%D8%A7%D8%B1%D8%AF%DB%8C%D9%86"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1681736316_351593.jpg"
                                                                      alt="پیر کاردین" title=""> </a> <a
                                        href="https://www.banimode.com/Brand/683/%DA%A9%D9%88%D8%AA%D9%88%D9%86"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1681736253_263543.jpg"
                                                                      alt="کوتون" title=""> </a> <a
                                        href="https://www.banimode.com/Brand/706/%D8%AF%D9%84%D8%B3%DB%8C"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1717244999_745840.png"
                                                                      alt="دلسی" title=""> </a> <a
                                        href="https://www.banimode.com/Brand/562/%D8%AF%D9%86%DB%8C%D9%84%DB%8C"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1716448696_585036.jpg"
                                                                      alt="دنیلی" title=""> </a> <a
                                        href="https://www.banimode.com/Brand/614/%D8%A7%D9%84-%D8%B3%DB%8C-%D9%88%D8%A7%DB%8C%DA%A9%DB%8C%DA%A9%DB%8C"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1681735881_920215.jpg"
                                                                      alt="ال سی وایکیکی" title=""> </a> <a
                                        href="https://www.banimode.com/Brand/231/%DA%A9%D8%A7%D8%B3%DB%8C%D9%88"
                                        target="_self" class=""> <img src="https://www.banimode.com/img/menu/image/1716631289_740110.jpg"
                                                                      alt="کاسیو" title=""> </a></div>
                            </div>
                        </div>
                    </li>
                    <li class="top-list  direct-link" title=""><a class="top-list-content"
                                                                  href="https://www.banimode.com/gift-order"
                                                                  target="_self"> کارت هدیه <span
                                class="underline"></span> </a></li>
                    <li class="top-list  direct-link" title=""><a class="top-list-content"
                                                                  href="https://www.banimode.com/blog/" target="_self">
                            بانی مگ <span class="underline"></span> </a></li>
                </ul>
            </div>
        </nav>
        <script>
            $(".category-details-li").hover(function () {
                $(".category-details-li:first-child").removeClass('first-hover')
            })
            $(".products-categories").hover(function () {
                $(".category-details-li:first-child").addClass('first-hover')
            })
        </script>
    </header>
    <div id="banipopups"></div>
    <link rel="alternate" type="application/rss+xml"
          title="کفش کالج چرم طبیعی مردانه شیفر Shifer مدل 7306C|رنگ مشکی-بانی مد"
          href="https://www.banimode.com/modules/feeder/rss.php?id_category=815&amp;orderby=position&amp;orderway=asc"/>
    <style>     .add-comment-box {
            position: relative;
        }

        .add-comment-box .comment-title_error {
            position: absolute;
            top: 44%;
            font-size: 11px;
            color: red;
            right: 16px;
        }

        .add-comment-box .comment-content_error {
            position: absolute;
            top: 79%;
            font-size: 11px;
            color: red;
            right: 16px;
        }

        .banijet-label {
            display: flex;
            justify-content: right;
            align-items: center;
            gap: 4px;
            margin-bottom: 8px;
        }

        .banijet-label span {
            font-size: 13px;
            color: #6f6f6f;
        }

        .banijet-label img {
            width: 33px;
        } </style>
    <link rel="stylesheet" href="https://www.banimode.com/themes/new/assets/css/comment-range.css?v=202307061021"/>
    <link rel="stylesheet" href="https://www.banimode.com/themes/new/assets/css/comment.css?v=20231206"/>
    <?php
    echo $pdpSection;
    ?>  <!-- start size chart modal -->
    <div class="modal fade" id="sizeChart">
        <div class="modal-dialog modal-dialog-centered select-size">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button"><span class="font-icon icon-cancel"></span>
                </button>
                <div class="modal-body">
                    <div id="sizeChartBox">
                        <ul>
                            <li>اعداد بر حسب سانتی‌متر می باشد.</li>
                        </ul>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">سایز</th>
                                <th scope="col">طول کف کفش</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>40</th>
                                <th>27</th>
                            </tr>
                            <tr>
                                <th>41</th>
                                <th>28</th>
                            </tr>
                            <tr>
                                <th>42</th>
                                <th>29</th>
                            </tr>
                            <tr>
                                <th>43</th>
                                <th>30</th>
                            </tr>
                            <tr>
                                <th>44</th>
                                <th>31</th>
                            </tr>
                            <tr>
                                <th>45</th>
                                <th>32</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   <!-- start smart size modal -->
    <div class="modal fade" id="smart-size-modal">
        <div class="modal-dialog modal-dialog-centered base-type-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button"><span class="font-icon icon-cancel"></span>
                    </button>
                    <div id="smart-size-step"></div>
                </div>
                <div class="modal-body">
                    <div id="smart-size-modal-content">                      <!-- start body param -->
                        <div id="smart-size-body-param"><h6 class="smart-size-title">لطفا قد و وزن خود را وارد کنید</h6>
                            <div class="smart-size-content">
                                <div class="form-box required"><label for="input" class="active">قد<span
                                            class="text-danger">*</span></label> <input type="tel" id="smart-height"> <span
                                        class="error-text">لطفا فیلد را تکمیل کنید</span> <span class="placeholder">قد به cm</span>
                                </div>
                                <div class="form-box required"><label for="input" class="active">وزن<span
                                            class="text-danger">*</span></label> <input type="tel" id="smart-weight"> <span
                                        class="error-text">لطفا فیلد را تکمیل کنید</span> <span class="placeholder">وزن به kg</span>
                                </div>
                                <button class="smart-body-param-btn"> انتخاب فرم بدن <img
                                        src="https://www.banimode.com//themes/new/assets/images/icon/smart-next.svg"
                                        altt="مرحله بعد"/></button>
                            </div>
                        </div>                       <!-- start suggestion -->
                        <div id="smart-size-suggest"><h6 class="smart-size-title">سایز پیشنهادی مناسب برای شما</h6>
                            <div class="smart-size-content">
                                <div class="smart-size-suggest success">
                                    <div class="smart-size-suggest-btn"> پیشنهاداول: سایز <span class="size">M</span>
                                        <img src="https://www.banimode.com//themes/new/assets/images/smart-suggest-success.svg"
                                             alt="امتحان دوباره"/></div>
                                    <span class="text-gray"> پیشنهاد دوم: سایز <span class="size">L</span></span></div>
                                <div class="smart-size-suggest unsuccess">
                                    <div class="smart-size-suggest-btn"> سایز مناسب شما پیدا نشد! <img
                                            src="https://www.banimode.com//themes/new/assets/images/smart-suggest-unsuccess.svg"
                                            alt="امتحان دوباره"/></div>
                                    <span class="text-gray">لطفا در وارد کردن اطلاعات قد و وزن بیشتر دقت کنید</span>
                                </div>
                                <div class="smart-suggest-btn">
                                    <button class="smart-suggets-btn-continue" data-dismiss="modal">ادامه دادن خرید
                                    </button>
                                    <button class="smart-suggets-btn-again"> امتحان دوباره <img
                                            src="https://www.banimode.com//themes/new/assets/images/icon/reload.svg"
                                            alt="امتحان دوباره"/>
                                        <button class="smart-body-param-btn"> انتخاب فرم بدن <img
                                                src="https://www.banimode.com//themes/new/assets/images/icon/smart-next.svg"
                                                alt="مرحله بعد"/></button>
                                </div>
                            </div>
                        </div>                        <!-- start body from -->
                        <div id="smart-size-body-form"><h6 class="smart-size-title">فرم بدن خود را در عکس های زیر انتخاب
                                کنید</h6>
                            <div class="smart-size-content"><h6 class="smart-size-body-form-title"></h6>
                                <div id="smart-size-body-form-content" data-step='2'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- start  add to basket modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="product-add-to-basket" data-toggle="modal">
        <div class="modal-dialog">
            <div class="modal-content success">
                <div class="modal-body"><img src="https://www.banimode.com//themes/new/assets/images/thank-success.svg"
                                             alt="افزودن به سبد خرید">
                    <p class="mt-4 color-green">کالای مورد نظر با موفقیت به سبد خرید افزوده شد. </p></div>
                <div class="modal-footer">
                    <button class="modal-cancel" type="button" data-dismiss="modal">ادامه دادن خرید</button>
                    <a href="https://www.banimode.com/order" class="modal-done btn-green">مشاهده سبد خرید</a></div>
            </div>
            <div class="modal-content unsuccess">
                <div class="modal-body"><img
                        src="https://www.banimode.com//themes/new/assets/images/not-added-to-cart.svg"
                        alt="افزودن به سبد خرید">
                    <p class="mt-4 color-red"></p></div>
                <div class="modal-footer">
                    <button class="modal-cancel" type="button" data-dismiss="modal">ادامه دادن خرید</button>
                    <a href="https://www.banimode.com/order" class="modal-done btn-green">مشاهده سبد خرید</a></div>
            </div>
        </div>
    </div>  <!-- start reminder modal -->
    <div class="modal fade" id="productReminder">
        <div class="modal-dialog modal-dialog-centered base-type-modal">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><img
                        src="https://www.banimode.com//themes/new/assets/images/icon/close.svg" alt="close"></button>
                <div id="productReminderResult"></div>
            </div>
        </div>
    </div>  <!-- start gallery modal -->
    <div class="modal fade" id="product-gallery-modal">
        <div class="modal-dialog modal-dialog-centered base-type-modal">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><img
                        src="https://www.banimode.com//themes/new/assets/images/icon/close.svg" alt="close"></button>
                <div id="product-gallery-modal-box" mode="">
                    <div class="owl-carousel modal-pdp-gallery"></div>
                    <div class="modal-gallery-nav"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="comments-gallery-modal d-none">
        <div class="comments-gallery_innner ani-open-gallery">
            <div class="comments-galley_body">
                <div class="comments-gallery-images">
                    <div class="comments-gallery-images_title"><span>تصاویر خریداران محصول</span></div>
                    <div class="comments-gallery-images_items"></div>
                </div>
                <div class="comments-gallery-detail">
                    <div class="comments-gallery-detail_hero">
                        <div class="gallery-detail_hero"></div>
                    </div>
                    <div class="comments-gallery-detail_box">
                        <div class="comments-gallery-detail_items"></div>
                    </div>
                    <div class="comments-gallery-detail_info">
                        <div class="gallery-detail--title"><span class="title"> </span> <span class="name"></span></div>
                        <div class="gallery-detail--date"><span class="date"></span></div>
                    </div>
                    <div class="comments-gallery-detail_suggest">
                        <div class="gallery-detail-suggest_inner"><img src="" alt="suggest"/> <span></span></div>
                    </div>
                    <div class="comments-gallery-detail_content"><p></p></div>
                </div>
            </div>
            <div class="comments-galley_btn">
                <button><img src="https://www.banimode.com//themes/new/assets/images/pdp/cancel.svg" alt="cancel"/>
                </button>
            </div>
        </div>
    </div>
    <script src="https://www.banimode.com/themes/new/assets/js/comment-range.js?v=2023071028"></script>
    <script src="https://www.banimode.com/themes/new/assets/js/libs/compressor.js"></script>
    <script type="application/javascript">

        var RetargetingProductInfo = {
            title: "کفش کالج چرم طبیعی مردانه شیفر Shifer مدل 7306C",
            price:
                2795000
            ,
            brand: "شیفر",
            discount:
                0
            ,
        }
        var breadcrumbs = '[{"id":2,"name":"\u0647\u0645\u0647 \u0645\u062d\u0635\u0648\u0644\u0627\u062a"},{"id":3151,"name":"\u0645\u062f \u0648 \u067e\u0648\u0634\u0627\u06a9"},{"id":69,"name":"\u06a9\u0641\u0634 \u0645\u0631\u062f\u0627\u0646\u0647"},{"id":815,"name":"\u06a9\u0641\u0634 \u0631\u0648\u0632\u0645\u0631\u0647 \u0645\u0631\u062f\u0627\u0646\u0647"}]';


    </script>
    <div class="modal fade wish-list" role="dialog" tabindex="-1" id="quick-view-container" data-toggle="modal">
        <div id="quick-view-box" class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><img
                        src="https://www.banimode.com//themes/new/assets/images/icon/close.svg" alt="close"></button>
                <div class="modal-body">
                    <div class="product-summary-container d-flex scroll">
                        <div id="quick-view-size-guide">
                            <div id="quick-view-size-guide-header"><span>سایز مناسب خود را بیابید</span> <span
                                    class="font-icon icon-arrow-left-pdp2"></span></div>
                            <ul>
                                <li>در نظر داشته باشید محدوده ی خطای اندازه گیری بین 1 تا 2 سانتیمتر نرمال است.</li>
                                <li>اعداد بر حسب سانتی‌متر می باشد.</li>
                            </ul>
                            <div id="quick-view-size-guide-table">
                                <table class="table table-striped table-bordered table-hover"
                                       id="quick-view-size-guide-data"></table>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="product-summary-section product-summary-section-fast">
                                <div class="product-name-price-share">
                                    <div class="product-name-price">
                                        <div class="product-name"><a class="product-name-value" href="#"><p
                                                    class="product-brand"></p><span>نماینده رسمی</span> </a>
                                            <p class="product-title"></p></div>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <div class="product-available-price-pdp product-is-available">
                                        <div class="product-price">
                                            <div class="discount"><span class="old-price"> </span>
                                                <div class="discount-value">تخفیف شما:<span> </span></div>
                                            </div>
                                            <div class="price">
                                                <div class="price-value"><span> </span></div>
                                                <div class="gift"><span>+</span><img
                                                        src="https://www.banimode.com//themes/new/assets/images/icon/gift.svg"
                                                        alt="gift icon"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="not-available-pdp"><span>ناموجود</span> <span
                                            class="not-available-pdp-explain">برای اطلاع از موجود شدن کالا می توانید روی                                         دکمه موجود شد خبرم کن کلیک کنید.</span>
                                    </p>
                                    <div class="product-countdown-timer">
                                        <div class="countdown-box"><p>زمان باقی مانده تخفیف</p><span id="timer"
                                                                                                     data-seconds="1596056325000"></span>
                                        </div>
                                        <div class="progress" id="timeProgress">
                                            <div class="progress-value"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-color-size-add-warranty">
                                    <div class="product-color">
                                        <div id="pdpColorControlerName"><p><span>رنگ:</span><span
                                                    id="PColorName"></span></p>
                                            <div id="pdpColorListControler">
                                                <div id="pdpColorListNavs"></div>
                                                <div id="pdpColorListDots"></div>
                                            </div>
                                        </div>
                                        <div class="owl-carousel color-list" id="pdpProductColorListFast"></div>
                                    </div>
                                    <div class="product-size">
                                        <div class="bani-select-box not-this-box"><select id="selectSize-fast"
                                                                                          name="size">
                                                <option class="defult" value="unset">انتخاب سایز</option>
                                            </select></div>
                                        <button id="size-guid-btn"><img
                                                src="https://www.banimode.com//themes/new/assets/images/icon/ruler.svg"
                                                alt="size giude"><span>سایز من چنده؟</span></button>
                                    </div>
                                    <div class="smart-size-container"></div>
                                    <div class="product-add-view">
                                        <button class="product-add-to-cart-pdp product-is-available"><img
                                                src="https://www.banimode.com//themes/new/assets/images/icon/white-cart.svg"
                                                alt="add to cart"><span>افزودن به سبد خرید</span>
                                            <div class="tooltip-box"><span class="my-tooltip">لطفا سایز خود را انتخاب نمایید                                             </span>
                                            </div>
                                        </button>
                                        <div class="not-available-pdp"
                                             v-on:click.prevent.stop="notify(item.id_product,item.id_color)">
                                            <button class="white-green"><span
                                                    class="font-icon icon-reminder"></span><span>موجود شد خبرم                                                 کن</span>
                                            </button>
                                        </div>
                                        <a href="" class="show-pdp">مشاهده جزئیات محصول</a></div>
                                    <div class="add-cart-msg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 d-flex gallery-container">
                            <div class="owl-carousel pdp-gallery pdp-gallery-fast"></div>
                            <div class="discount-gallery discount-gallery-fast"></div>
                            <div class="tag-gallery tag-gallery-fast"></div>
                            <div class="gallery-dots gallery-dots-fast scroll"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.banimode.com//themes/new/assets/js/wish-list.js" defer></script><!-- start footer-->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <ul id="footer-cat">
                        <li class="footer-title"><span>خرید از بانی‌مد</span></li>
                        <li><a class="link-hover" href="https://www.banimode.com/"><span>بانی مد</span> </a></li>
                        <li><a class="link-hover"
                               href="https://www.banimode.com/3/%D9%84%D8%A8%D8%A7%D8%B3-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87"><span>لباس                                 مردانه</span>
                            </a></li>
                        <li><a class="link-hover"
                               href="https://www.banimode.com/4/%D9%84%D8%A8%D8%A7%D8%B3-%D8%B2%D9%86%D8%A7%D9%86%D9%87"><span>لباس                                 زنانه</span>
                            </a></li>
                        <li><a class="link-hover"
                               href="https://www.banimode.com/5/%D8%A8%DA%86%DA%AF%D8%A7%D9%86%D9%87"><span> لباس بچگانه                             </span>
                            </a></li>
                        <li><a class="link-hover" href="https://www.banimode.com/256/"><span> لوازم آرایشی </span> </a>
                        </li>
                    </ul>
                </div>
                <div class="col-2">
                    <ul id="footer-service">
                        <li class="footer-title"><span>خدمات مشتریان</span></li>
                        <li><a class="link-hover" rel="nofollow" href="https://www.banimode.com/faq/"
                               target="_blank"><span> پرسش های متداول </span> </a></li>
                        <li><a class="link-hover" rel="nofollow"
                               href="https://www.banimode.com/content/3/terms-and-conditions-of-use"
                               target="_blank"><span> شرایط بازگشت </span> </a></li>
                        <li><a class="link-hover" rel="nofollow" href="/content/12/Shopping-Guide"
                               target="_blank"><span> راهنمای خرید </span> </a></li>
                        <li><a class="link-hover" rel="nofollow" href="https://gift.avakatan.com/"
                               target="_blank"><span> فروش B2B </span> </a></li>
                    </ul>
                </div>
                <div class="col-2">
                    <ul id="footer-info">
                        <li class="footer-title"><span>اطلاعات بانی مد</span></li>
                        <li><a class="link-hover" href="/content/4/about-us" target="_blank"><span> درباره ما </span>
                            </a></li>
                        <li><a class="link-hover" href="/content/2/legal-notice"
                               target="_blank"><span> قوانین و مقررات </span> </a></li>
                        <li><a class="link-hover" href="https://www.banimode.com/content/5/Contact-us"
                               target="_blank"><span> تماس با ما </span> </a></li>
                        <li><a class="link-hover" href="https://banimode.adilar.com/" target="_blank"><span> فرصت های شغلی </span>
                            </a></li>
                        <li><a class="link-hover" href="https://www.banimode.com/content/127/Commercial-cooperation"
                               target="_blank"><span> همکاری تجاری </span> </a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <div id="footer-contact"><p><span> منتظر شنیدن صدای گرمتیم</span></p>
                        <p class="time-work">7 روز هفته - 24 ساعته </p>
                        <div class="footer-contact-info"><span>تلفن:</span><a rel="nofollow" href="tel:+982149215"
                                                                              class="ltr">021-49215</a></div>
                        <div class="footer-contact-info"><span>پیامک:</span><a rel="nofollow" href="sms:+9810001654">10001654</a>
                        </div>
                        <div class="footer-contact-info float-none"><span>ایمیل:</span><a rel="nofollow"
                                                                                          href="mailto:customer@banimode.com">customer@banimode.com</a>
                        </div>
                        <a href="https://www.banimode.com/blog/" class="text-center"> <img
                                src="https://www.banimode.com/themes/new/assets/images/footer/banimag-logo.svg" alt="بانی مگ" width="150px">
                        </a></div>
                </div>
                <div class="col-3">
                    <div id="footer-social"><a href="https://www.banimode.com/"> <img
                                src="https://www.banimode.com//themes/new/assets/images/footer/footer-logo.svg"
                                alt="بانی‌مد"> </a> <a target="_blank" href="https://cafebazaar.ir/app/com.banimode.app/"
                                                       class="gradient-btn"> <span>دریافت اپلیکیشن از</span> <img
                                src="https://www.banimode.com//themes/new/assets/images/icon/bazaar-logo.svg"
                                alt="دانلود اپلیکیشن"> </a> <a href="https://www.banimode.com/apps/" class="app-download">
                            <img src="https://www.banimode.com//themes/new/assets/images/app-download.svg"
                                 alt="دانلود اپلیکیشن"> <span> دانلود اپلیکیشن</span> </a>
                        <ul class="footer-social-icon">
                            <li><a href="https://www.instagram.com/banimodecom"> <img
                                        src="https://www.banimode.com//themes/new/assets/images/footer-insta.svg"
                                        alt="اینستاگرام"> </a></li>
                            <li><a href="https://www.t.me/banimodecom"> <img
                                        src="https://www.banimode.com//themes/new/assets/images/footer-telegram.svg"
                                        alt="تلگرام"> </a></li>
                            <li><a href="https://www.aparat.com/banimode"> <img
                                        src="https://www.banimode.com//themes/new/assets/images/footer-aparat.svg"
                                        alt="آپارات"> </a></li>
                            <li><a href="https://www.twitter.com/Banimodeir"> <img
                                        src="https://www.banimode.com//themes/new/assets/images/footer-twitter.svg"
                                        alt="تويیتر"> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-copyright">
            <div class="col-6"><p class="text-right">© کلیه حقوق این وب سایت متعلق به بانی مد است.</p></div>
        </div>
        <div class="modal fade" id="anjoman">
            <div class="modal-dialog modal-dialog-centered select-size">
                <div class="modal-content">
                    <button class="close" data-dismiss="modal" type="button"><span class="font-icon icon-cancel"></span>
                    </button>
                    <div class="modal-body"><img id="anjoman-img"
                                                 data-src="https://www.banimode.com/landing/eanjoman/esenfi-min.jpg?1402"
                                                 alt="انجمن کسب و کار اینترنتی"/></div>
                </div>
            </div>
        </div>
    </footer>
</div> <!-- start footer-->
<style>     .container-seng-again-code .send-again {
        line-height: unset !important;
        min-width: unset !important;
        min-height: 49px !important;
        width: 190px !important;
        display: inline-block !important;
    }

    .container-seng-again-code .button-box-again {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .container-seng-again-code p {
        direction: ltr;
        text-align: right !important;
    }

    .container-seng-again-code .send-again-sms {
        background: #fff !important;
        color: #00bf6f !important;
    } </style>
<div class="modal fade" id="login">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="close" data-dismiss="modal" type="button"><span class="font-icon icon-cancel"></span>
            </button>
            <button class="login-back"><span class="font-icon icon-arrow-left-1"></span></button>
            <div class="modal-body">
                <div class="login-box">
                    <div class="login-container mobile-number-entry selected-step"><p class="title">ورود یا ثبت نام</p>
                        <div class="config-data"></div>
                        <button class="submit green" id="request-phone-user">ادامه</button>
                    </div>
                    <div class="login-container enter-the-password"><p class="title">ورود به بانی‌مد</p>
                        <p class="description token">لطفا کلمه عبور را وارد کنید.</p>
                        <div class="input-box"><span class="input-icon icon-pass-register font-icon"></span> <span
                                class="input-icon font-icon icon-active-display-pass icon-eye show-pwd"></span> <span
                                class="input-icon font-icon icon-deactive-display-pass icon-eye show-pwd"></span> <input
                                class="pwd-input" type="password" id="login-password-input" placeholder="کلمه عبور">
                            <span class="error-txt"></span></div>
                        <button class="such-link" id="force-otp"> ورود با رمز یکبار مصرف</button>
                        <button class="submit green" id="run-verify">ادامه</button>
                        <div class="mobile-seting pwd"><span class="pwd">کلمه عبور را فراموش کردید؟</span>
                            <button id="recovery-pwd" class="pwd"><span class="pwd">بازیابی رمز عبور</span></button>
                        </div>
                    </div>
                    <div class="login-container enter-the-token"><p class="title">ورود به بانی‌مد</p>
                        <p class="description token">کد تایید ۵ رقمی ارسال شده به شماره همراه زیر را وارد نمایید.</p>
                        <div class="mobile-seting"><span class="mobile-number"></span>
                            <button id="edit-phone-number"><span class="font-icon icon-edit"></span>
                                <span>ویرایش شماره</span></button>
                        </div>
                        <div class="input-box token"><input type="number" class="token-input first-digit" maxlength="1">
                            <input type="number" class="token-input second-digit" maxlength="1"> <input type="number"
                                                                                                        class="token-input third-digit"
                                                                                                        maxlength="1">
                            <input type="number" class="token-input fourth-digit" maxlength="1"> <input type="number"
                                                                                                        class="token-input last-digit"
                                                                                                        maxlength="1">
                            <span class="error-txt"></span></div>
                        <div class="btn-box token">
                            <div class="submit gray countdown-box"><span class="spinner"></span> <span
                                    class="countdown"></span> <span>دقیقه</span></div>
                            <div class="container-seng-again-code d-none"><p>:دریافت مجدد کد از طریق</p>
                                <div class="button-box-again">
                                    <button class="submit green send-again send-again-sms" type="sms"><span>پیامک</span>
                                    </button>
                                    <button class="submit green send-again send-again-call" type="call">
                                        <span>تماس تلفنی</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="login-container authenticated"><img
                            src="https://www.banimode.com//themes/new/assets/images/icon/success-login.svg"
                            class="icon-section" alt="authenticated">
                        <p class="title green">با موفقیت وارد شدید!</p>
                        <p class="description success">برای داشتن تجربه خرید بهتر برای حساب شخصی خود کلمه عبور تعیین
                            کنید.</p>
                        <div class="btn-box authenticated signup-cart"><a class="submit green" href="/">صفحه اصلی</a>
                            <button class="submit white" id="set-password">تعیین کلمه عبور</button>
                            <button class="submit white d-none" id="return-page">بازگشت به صفحه</button>
                        </div>
                    </div>
                    <div class="login-container password-opration"><p class="title">ثبت نام در بانی مد</p>
                        <p class="description set-pwd">جهت افزایش امنیت حساب کاربری خود، یک کلمه عبور وارد نمایید.
                            <span>(کلمه عبور حداقل باید ۶ کارکتر باشد)</span></p>
                        <div class="input-box"><span class="input-icon icon-pass-register font-icon"></span> <span
                                class="input-icon font-icon icon-active-display-pass icon-eye show-pwd"></span> <span
                                class="input-icon font-icon icon-deactive-display-pass icon-eye show-pwd"></span> <input
                                class="pwd-input" type="password" id="password-opration-input" placeholder="کلمه عبور">
                            <span class="error-txt"></span></div>
                        <div class="input-box have-margin"><span class="input-icon icon-pass-register font-icon"></span>
                            <span class="input-icon font-icon icon-active-display-pass icon-eye show-pwd"></span> <span
                                class="input-icon font-icon icon-deactive-display-pass icon-eye show-pwd"></span>
                            <input class="pwd-input" type="password" id="password-opration-input-repeat"
                                   placeholder="تکرار کلمه عبور"> <span class="error-txt"></span></div>
                        <button class="submit green" id="pwd-opration">ادامه</button>
                    </div>
                    <div class="login-container password-setted"><img
                            src="https://www.banimode.com//themes/new/assets/images/icon/success-set-pwd.svg"
                            class="icon-section" alt="authenticated">
                        <p class="title green pwd-setted">کلمه عبور جدید با موفقیت ثبت شد.</p><a class="submit green"
                                                                                                 href="/">صفحه اصلی</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h6>خروج از حساب</h6>
                <p>آیا مطمئنید میخواهید از حساب خود خارج شوید؟</p></div>
            <div class="modal-footer"><a href="javascript:void(0);" class="modal-done modal-button-logout">خروج</a>
                <button class="modal-cancel" type="button" data-dismiss="modal">انصراف</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade remove-cart-item" id="miniCartRemoveProduct" data-product-id="">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="close" data-dismiss="modal" type="button"><span class="font-icon icon-cancel"></span>
            </button>
            <div class="modal-body"><p>حذف کالا</p>
                <p>آیا از حذف این کالا مطمئنی؟</p>
                <div class="btn-box">
                    <button class="white remove" type="button" data-dismiss="modal">حذف</button>
                    <button class="white cancel-modal">انصراف</button>
                </div>
                <button class="cart-add-wishlist green">افرودن به لیست علاقه‌مندی ها</button>
            </div>
        </div>
    </div>
</div>
<div class="dark-background"></div>
<!-- محصول -->
<?php
echo $scriptProduct;
?>
<script>
    $(document).ready(function () {
        window.addEventListener('goftino_openWidget', () => {
            window.webengage.track("Bot Support Clicked");
        });
    })
</script>
<script>
    const link_href = [
        'https://www.banimode.com/themes/new/assets/css/bootstrap.v4.css?9c791030307173943',
        'https://www.banimode.com/themes/new/assets/css/owl.carousel.min.css?9c791030307173943',
        'https://www.banimode.com/themes/new/assets/css/owl.theme.default.min.css?9c791030307173943',
        'https://www.banimode.com/themes/new/assets/css/stylesV2.min.css?9c791030307173943',
        'https://www.banimode.com/assets/libs/owl.carousel/owl.carousel.css?9c791030307173943',
        'https://www.banimode.com/modules/banipopup/views/css/front.css?9c791030307173943'
    ]
    for(let i=0; i < link_href.length; i++){
        let link_css = null;
        link_css=document.createElement("link");
        link_css.rel="stylesheet";
        link_css.href=link_href[i];
        document.getElementsByTagName("head")[0].appendChild(link_css);
    }
    // javascript
    const link_href_js = [
        "https://www.banimode.com/js/jquery/jquery-1.11.0.min.js?9c791030307173943",
        "https://www.banimode.com/js/jquery/jquery-migrate-1.2.1.min.js?9c791030307173943",
        "https://www.banimode.com/js/jquery/plugins/jquery.easing.js?9c791030307173943",
        "https://www.banimode.com/js/tools.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/jquery.min.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/helper.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/libs/loadingoverlay.min.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/libs/axios.min.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/popper.min.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/bootstrap.min.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/login.js?9911301331?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/mini-cart.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/owl.carousel.min.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/main.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/history.js?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/product-details-pageV2.js?v=2024130506250625?9c791030307173943",
        "https://www.banimode.com/themes/new/assets/js/pdp.elevateZoom.min.js?9c791030307173943",
        "https://www.banimode.com/assets/libs/jquery.fancybox/jquery.fancybox.min.js?9c791030307173943",
        "https://www.banimode.com/modules/banipopup/views/js/front.js?9c791030307173943",
        "https://www.banimode.com/modules/advancetopmenu/js/top_menu.js?9c791030307173943",
        "https://www.banimode.com/modules/productcomments/js/jquery.rating.pack.js?9c791030307173943",
        "https://www.banimode.com/modules/productcomments/js/jquery.textareaCounter.plugin.js?9c791030307173943",
        "https://www.banimode.com/modules/productcomments/js/productcomments.js?9c791030307173943",
    ]
    for(let i=0; i < link_href_js.length; i++){
        let link_js = null;
        link_js=document.createElement("script");
        link_js.src=link_href_js[i];
        document.getElementsByTagName("head")[0].appendChild(link_js);
    }
    let cdnFont = document.createElement("link");
    cdnFont.rel="stylesheet";
    cdnFont.type="text/css";
    cdnFont.href = "https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css"
    document.getElementsByTagName("head")[0].appendChild(cdnFont);

    document.head.innerHTML += "<style>body {font-family: Vazirmatn, sans-serif;}</style>";

</script>

    
</body>
</html>
