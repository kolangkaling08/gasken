    <?php
    function feedback404()
    {
        global $BRANDS;
        header("HTTP/1.0 404 Not Found");
        echo "<h1><strong>Apa Yang Kau Carik Disini!!</strong></h1>";
        echo "<!-- This is " . (isset($BRANDS) ? $BRANDS : 'undefined') . ". -->";
    }
    // Cek parameter daftar
    if (isset($_GET['daftar'])) {
        $filename = "kw.txt";
            $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $totalKeywords = count($lines);
        // Normalisasi input: ganti spasi dengan tanda hubung dan lowercase
        $input = strtolower($_GET['daftar']);
        $input = str_replace(' ', '-', $input);
        // Cari index keyword yang sedang diakses
        $currentIndex = -1;
        foreach ($lines as $index => $item) {
            // Normalisasi keyword dari file
            $normalizedItem = strtolower(str_replace(' ', '-', $item));
            if ($normalizedItem === $input) {
                $currentIndex = $index;
                $BRAND = $item; // Simpan nilai asli dari file
                break;
            }
        }
        if ($currentIndex >= 0) {
            // Mengganti tanda hubung (-) dengan spasi ( ) untuk tampilan
            $BRANDS = str_replace('-', ' ', $BRAND);
            $BRANDS = ucwords(strtolower($BRANDS)); // Kapitalisasi setiap kata
            // Buat versi URL-nya
            $BRANDS1 = strtolower(str_replace(' ', '-', $BRANDS));
            // Generate number konsisten
            $Number = (crc32($BRAND) % 16) + 1;
            // Ambil 5 keyword berikutnya (wrap around)
            $nextKeywords = array();
            for ($i = 1; $i <= 5; $i++) {
                $nextIndex = ($currentIndex + $i) % $totalKeywords;
                $nextKeywords[] = $lines[$nextIndex];
            }
            // Assign ke variabel individual
            $randomKeyword = $nextKeywords[0];
            $randomKeyword2 = $nextKeywords[1];
            $randomKeyword3 = $nextKeywords[2];
            $randomKeyword4 = $nextKeywords[3];
            $randomKeyword5 = $nextKeywords[4];
            // Buat URL versi tanda hubung
            $randomUrl = strtolower(str_replace(' ', '-', $randomKeyword));
            $randomUrl2 = strtolower(str_replace(' ', '-', $randomKeyword2));
            $randomUrl3 = strtolower(str_replace(' ', '-', $randomKeyword3));
            $randomUrl4 = strtolower(str_replace(' ', '-', $randomKeyword4));
            $randomUrl5 = strtolower(str_replace(' ', '-', $randomKeyword5));
            // Ambil URL lengkap
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            $fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $parsedUrl = parse_url($fullUrl);
            $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
            $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
            $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
            $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
            $baseUrl = $scheme . "://" . $host . $path . '?' . $query;
            $urlPath = $baseUrl;
            // Di sini bisa lanjut render atau proses lainnya...
        } else {
            feedback404();
            exit();
        }
    } else {
        feedback404();
        exit();
    }
    ?>
<!doctype html>
<html class="no-js" lang="id" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website</title> 
  <link rel="canonical" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">
  <link rel="icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png" type="image/png">
  <link rel="apple-touch-icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png"> 
  <meta name="description" content="<?php echo $BRANDS ?> dan creasitetn menawarkan layanan pembuatan web kontemporer yang memiliki desain profesional dan fitur digital lengkap.">  
  <meta property="og:site_name" content="<?php echo $BRANDS ?>">
  <meta property="og:url" content="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">
  <meta property="og:title" content="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
  <meta property="og:type" content="product">
  <meta property="og:description" content="<?php echo $BRANDS ?> dan creasitetn menawarkan layanan pembuatan web kontemporer yang memiliki desain profesional dan fitur digital lengkap.">
  <meta property="og:image" content="https://jpterus66.calcufast.xyz/image/image14.png">
  <meta property="og:image:secure_url" content="https://jpterus66.calcufast.xyz/image/image14.png">
  <meta property="og:image:width" content="650">
  <meta property="og:image:height" content="650">
  <meta property="og:price:amount" content="10,000">
  <meta property="og:price:currency" content="IDR">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
  <meta name="twitter:description" content="<?php echo $BRANDS ?> dan creasitetn menawarkan layanan pembuatan web kontemporer yang memiliki desain profesional dan fitur digital lengkap.">
  <link rel="amphtml" href="https://creasitetn-studio.pages.dev/amp/?daftar=<?php echo $BRANDS1 ?>" />
  <link href="https://9to9.co.id/cdn/shop/t/16/assets/main.css?v=45917311312869331771750042221" rel="stylesheet" type="text/css" media="all" />
<style data-shopify>
@font-face {
  font-family: "Nunito Sans";
  font-weight: 400;
  font-style: normal;
  font-display: swap;
  src: url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n4.0276fe080df0ca4e6a22d9cb55aed3ed5ba6b1da.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=dbc4b9388ac74e8d8093b1cbc67a914ef2bafc57202f47716f88242d0be71323") format("woff2"),
       url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n4.b4964bee2f5e7fd9c3826447e73afe2baad607b7.woff?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=b39a3be560bd8061fee697045ccdc8f0fb90e558e9302aaad2d53d1528215298") format("woff");
}
@font-face {
  font-family: "Nunito Sans";
  font-weight: 700;
  font-style: normal;
  font-display: swap;
  src: url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n7.25d963ed46da26098ebeab731e90d8802d989fa5.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=6c7484a1afaf1fa51cdba7dce2370cf5e174b831861ae0f2cdff18ee859c7621") format("woff2"),
       url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n7.d32e3219b3d2ec82285d3027bd673efc61a996c8.woff?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=762df44052f8519d021dc50d601fd784b25b607979e6b9ebbd7b79ca95ebba82") format("woff");
}
@font-face {
  font-family: "Nunito Sans";
  font-weight: 400;
  font-style: italic;
  font-display: swap;
  src: url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_i4.6e408730afac1484cf297c30b0e67c86d17fc586.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=b6eaeefb99d1a9b8fa9703b46cdd9518867d8202ba006ed333cf4fdec17c9521") format("woff2"),
       url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_i4.c9b6dcbfa43622b39a5990002775a8381942ae38.woff?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=0e100a9aa034545a461c1b435fd6d07faedf8afeabd34d7c7aad0d0930bebce7") format("woff");
}
@font-face {
  font-family: "Nunito Sans";
  font-weight: 700;
  font-style: italic;
  font-display: swap;
  src: url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_i7.8c1124729eec046a321e2424b2acf328c2c12139.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=b666715b369318bc70067d54761befa1c6111232081bd97b2f099f9b3fd06724") format("woff2"),
       url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_i7.af4cda04357273e0996d21184432bcb14651a64d.woff?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=3c776fcb69e6f914eb019af07f2e38b40ac31965fc4c54fab4d5e0811c1311ce") format("woff");
}
@font-face {
  font-family: "Nunito Sans";
  font-weight: 700;
  font-style: normal;
  font-display: swap;
  src: url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n7.25d963ed46da26098ebeab731e90d8802d989fa5.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=6c7484a1afaf1fa51cdba7dce2370cf5e174b831861ae0f2cdff18ee859c7621") format("woff2"),
       url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n7.d32e3219b3d2ec82285d3027bd673efc61a996c8.woff?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=762df44052f8519d021dc50d601fd784b25b607979e6b9ebbd7b79ca95ebba82") format("woff");
}
@font-face {
  font-family: "Nunito Sans";
  font-weight: 800;
  font-style: normal;
  font-display: swap;
  src: url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n8.46743f6550d9e28e372733abb98c89d01ae54cb3.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=da0d927f4ff145cd59036209ad16d528ed168c7c8cb313f45964f266dc4ce428") format("woff2"),
       url("https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n8.1967fa782017f62397f3e87f628afca3a56cb2e4.woff?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=da612bf7515fbde02a5781411aa827d76ccf8e34e164e4bd83542c0c857471ee") format("woff");
}
:root {
      --bg-color: 231 231 238 / 1.0;
      --bg-color-og: 231 231 238 / 1.0;
      --heading-color: 0 0 0;
      --text-color: 0 0 0;
      --text-color-og: 0 0 0;
      --scrollbar-color: 0 0 0;
      --link-color: 0 0 0;
      --link-color-og: 0 0 0;
      --star-color: 255 215 55;--swatch-border-color-default: 185 185 190;
        --swatch-border-color-active: 116 116 119;
        --swatch-card-size: 32px;
        --swatch-variant-picker-size: 32px;--color-scheme-1-bg: 255 255 255 / 1.0;
      --color-scheme-1-grad: linear-gradient(46deg, rgba(245, 245, 245, 1) 13%, rgba(249, 249, 249, 1) 86%);
      --color-scheme-1-heading: 0 0 0;
      --color-scheme-1-text: 0 0 0;
      --color-scheme-1-btn-bg: 255 106 0;
      --color-scheme-1-btn-text: 255 255 255;
      --color-scheme-1-btn-bg-hover: 255 137 53;--color-scheme-2-bg: 46 46 46 / 1.0;
      --color-scheme-2-grad: linear-gradient(180deg, rgba(46, 46, 46, 1), rgba(46, 46, 46, 1) 100%);
      --color-scheme-2-heading: 255 255 255;
      --color-scheme-2-text: 255 255 255;
      --color-scheme-2-btn-bg: 98 25 121;
      --color-scheme-2-btn-text: 255 255 255;
      --color-scheme-2-btn-bg-hover: 131 65 152;--color-scheme-3-bg: 98 25 121 / 1.0;
      --color-scheme-3-grad: linear-gradient(180deg, rgba(98, 25, 121, 1), rgba(98, 25, 121, 1) 100%);
      --color-scheme-3-heading: 255 255 255;
      --color-scheme-3-text: 255 255 255;
      --color-scheme-3-btn-bg: 255 255 255;
      --color-scheme-3-btn-text: 98 25 121;
      --color-scheme-3-btn-bg-hover: 238 231 241;

      --drawer-bg-color: 255 255 255 / 1.0;
      --drawer-text-color: 0 0 0;

      --panel-bg-color: 245 245 245 / 1.0;
      --panel-heading-color: 0 0 0;
      --panel-text-color: 0 0 0;

      --in-stock-text-color: 13 164 74;
      --low-stock-text-color: 54 55 55;
      --very-low-stock-text-color: 227 43 43;
      --no-stock-text-color: 7 7 7;
      --no-stock-backordered-text-color: 119 119 119;

      --error-bg-color: 252 237 238;
      --error-text-color: 180 12 28;
      --success-bg-color: 232 246 234;
      --success-text-color: 44 126 63;
      --info-bg-color: 228 237 250;
      --info-text-color: 26 102 210;

      --heading-font-family: "Nunito Sans", sans-serif;
      --heading-font-style: normal;
      --heading-font-weight: 700;
      --heading-scale-start: 4;

      --navigation-font-family: "Nunito Sans", sans-serif;
      --navigation-font-style: normal;
      --navigation-font-weight: 800;
      --heading-text-transform: uppercase;
--subheading-text-transform: none;
      --body-font-family: "Nunito Sans", sans-serif;
      --body-font-style: normal;
      --body-font-weight: 400;
      --body-font-size: 16;

      --section-gap: 32;
      --heading-gap: calc(8 * var(--space-unit));--heading-gap: calc(6 * var(--space-unit));--grid-column-gap: 20px;--btn-bg-color: 255 106 0;
      --btn-bg-hover-color: 255 137 53;
      --btn-text-color: 255 255 255;
      --btn-bg-color-og: 255 106 0;
      --btn-text-color-og: 255 255 255;
      --btn-alt-bg-color: 255 255 255;
      --btn-alt-bg-alpha: 1.0;
      --btn-alt-text-color: 0 0 0;
      --btn-border-width: 1px;
      --btn-padding-y: 12px;

      
      --btn-border-radius: 9px;
      

      --btn-lg-border-radius: 50%;
      --btn-icon-border-radius: 50%;
      --input-with-btn-inner-radius: var(--btn-border-radius);
      --btn-text-transform: capitalize;

      --input-bg-color: 255 255 255;
      --input-text-color: 0 0 0;
      --input-border-width: 1px;
      --input-border-radius: 8px;
      --textarea-border-radius: 8px;
      --input-border-radius: 9px;
      --input-bg-color-diff-3: #dedee8;
      --input-bg-color-diff-6: #d5d5e1;

      --modal-border-radius: 8px;
      --modal-overlay-color: 0 0 0;
      --modal-overlay-opacity: 0.4;
      --drawer-border-radius: 8px;
      --overlay-border-radius: 0px;--custom-label-bg-color: 129 244 225;
      --custom-label-text-color: 7 7 7;--sale-label-bg-color: 255 106 0;
      --sale-label-text-color: 255 255 255;--sold-out-label-bg-color: 46 46 46;
      --sold-out-label-text-color: 255 255 255;--new-label-bg-color: 26 102 210;
      --new-label-text-color: 255 255 255;--preorder-label-bg-color: 86 203 249;
      --preorder-label-text-color: 0 0 0;

      --page-width: 1440px;
      --gutter-sm: 20px;
      --gutter-md: 32px;
      --gutter-lg: 64px;

      --payment-terms-bg-color: #e7e7ee;

      --coll-card-bg-color: #f5f5f5;
      --coll-card-border-color: #ffffff;--blend-bg-color: #f5f5f5;
        
          --aos-animate-duration: 1s;
        

        
          --aos-min-width: 600;
        
      

      --reading-width: 48em;
    }

    @media (max-width: 769px) {
      :root {
        --reading-width: 36em;
      }
    }

    .btn--primary {
        background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(168, 0, 129) 50%, #000000 100%) !important;
    }
  </style>
<link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/main.css?v=45917311312869331771750042221">
<script src="https://9to9.co.id/cdn/shop/t/16/assets/main.js?v=176911816839012909851750042217" defer="defer"></script>
<script src="https://9to9.co.id/cdn/shop/t/16/assets/rma-message.js?v=167663864301136709341750042221" defer="defer"></script>

<link rel="preload" 
      href="https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n4.0276fe080df0ca4e6a22d9cb55aed3ed5ba6b1da.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=dbc4b9388ac74e8d8093b1cbc67a914ef2bafc57202f47716f88242d0be71323" 
      as="font" 
      type="font/woff2" 
      crossorigin 
      fetchpriority="high">

<link rel="preload" 
      href="https://9to9.co.id/cdn/fonts/nunito_sans/nunitosans_n7.25d963ed46da26098ebeab731e90d8802d989fa5.woff2?h1=OXRvOW1hcmtldHBsYWNlLmFjY291bnQubXlzaG9waWZ5LmNvbQ&h2=OXRvOS5jby5pZA&hmac=6c7484a1afaf1fa51cdba7dce2370cf5e174b831861ae0f2cdff18ee859c7621" 
      as="font" 
      type="font/woff2" 
      crossorigin 
      fetchpriority="high">

<link rel="stylesheet" 
      href="https://9to9.co.id/cdn/shop/t/16/assets/swatches.css?v=53018133058540813211750042234" 
      media="print" 
      onload="this.media='all'">

<noscript>
  <link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/swatches.css?v=53018133058540813211750042234">
</noscript>

<link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/popup-oos.css?v=118273186697982700721750042219">

<script>
  window.performance && 
  window.performance.mark && 
  window.performance.mark('shopify.content_for_header.start');
</script>

<meta id="shopify-digital-wallet" 
      name="shopify-digital-wallet" 
      content="/71468351707/digital_wallets/dialog">

<link rel="alternate" hreflang="x-default" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">
<link rel="alternate" hreflang="en" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">
<link rel="alternate" type="application/json+oembed" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">

<script async="async" src="/checkouts/internal/preloads.js?locale=id-ID"></script>

<script id="shopify-features" type="application/json">
{
  "accessToken": "7ccd8d5ba39270dc03132287f3834f0d",
  "betas": ["rich-media-storefront-analytics"],
  "domain": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>",
  "predictiveSearch": true,
  "shopId": 71468351707,
  "locale": "id"
}
</script>

<script>
  var Shopify = Shopify || {};
  Shopify.shop = "9to9marketplace.myshopify.com";
  Shopify.locale = "id";
  Shopify.currency = { "active": "IDR", "rate": "1.0" };
  Shopify.country = "ID";
  Shopify.theme = {
    "name": "<?php echo $BRANDS ?>",
    "id": 152432574683,
    "schema_name": "Swiftnest",
    "schema_version": "1.0.0",
    "theme_store_id": null,
    "role": "main"
  };
  Shopify.theme.handle = null;  // diperbaiki
  Shopify.theme.style = { "id": null, "handle": null };
  Shopify.cdnHost = "9to9.co.id/cdn";
  Shopify.routes = Shopify.routes || {};
  Shopify.routes.root = "/";
</script>



<script type="module">
  !function (o) {
    (o.Shopify = o.Shopify || {}).modules = !0
  }(window);
</script>

<script>
  !function (o) {
    function n() {
      var o = [];
      function n() { o.push(Array.prototype.slice.apply(arguments)) }
      return n.q = o, n
    }
    var t = o.Shopify = o.Shopify || {};
    t.loadFeatures = n(), t.autoloadFeatures = n()
  }(window);
</script>

<script id="shop-js-analytics" type="application/json">
  { "pageType": "product" }
</script>

<script defer="defer" async="async" 
        src="https://9to9.co.id/cdn/shopifycloud/shop-js/client.js" 
        onload="window.Shopify.SignInWithShop?.initShopCartSync?.({&quot;fedCMEnabled&quot;:true,&quot;windoidEnabled&quot;:true});">
</script>

<script id="__st">
  var __st = {
    "a": 71468351707,
    "offset": 25200,
    "reqid": "454afe66-2225-46e7-af41-c4def2fe7bbd-1758988397",
    "pageurl": "9to9.co.id/collections/recommended-for-you/products/ba25157blk000",
    "u": "99270e75cd5c",
    "p": "product",
    "rtyp": "product",
    "rid": 8978029871323
  };
</script>

<script>
  window.ShopifyPaypalV4VisibilityTracking = true;
</script>

<script id="captcha-bootstrap">
  !function () {
    'use strict';
    const t = 'contact', e = 'account', n = 'new_comment';
    const o = [[t, t], ['blogs', n], ['comments', n], [t, 'customer']];
    const c = [[e, 'customer_login'], [e, 'guest_login'], [e, 'recover_customer_password'], [e, 'create_customer']];

    const r = t => t.map((([t, e]) =>
      `form[action*='/${t}']:not([data-nocaptcha='true']) input[name='form_type'][value='${e}']`
    )).join(',');

    const a = t => () => t ? [...document.querySelectorAll(t)].map((t => t.form)) : [];

    function s() {
      const t = [...o];
      const e = r(t);
      return a(e)
    }

    const i = 'password', u = 'form_key';
    const d = ['recaptcha-v3-token', 'g-recaptcha-response', 'h-captcha-response', i];
    const f = () => { try { return window.sessionStorage } catch { return } };
    const m = '__shopify_v';
    const _ = t => t.elements[u];

    function p(t, e, n = !1) {
      try {
        const o = window.sessionStorage,
          c = JSON.parse(o.getItem(e)),
          { data: r } = function (t) {
            const { data: e, action: n } = t;
            return t[m] || n ? { data: e, action: n } : { data: t, action: n }
          }(c);

        for (const [e, n] of Object.entries(r))
          t.elements[e] && (t.elements[e].value = n);

        n && o.removeItem(e)
      } catch (o) {
        console.error('form repopulation failed', { error: o })
      }
    }

    const l = 'form_type', E = 'cptcha';

    function T(t) { t.dataset[E] = !0 }

    const w = window, h = w.document, L = 'Shopify', v = 'ce_forms', y = 'captcha';
    let A = !1;

    ((t, e) => {
      const n = (g = 'f06e6c50-85a8-45c8-87d0-21a2b65856fe',
        I = 'https://cdn.shopify.com/shopifycloud/storefront-forms-hcaptcha/ce_storefront_forms_captcha_hcaptcha.v1.5.2.iife.js',
        D = { infoText: 'Dilindungi dengan hCaptcha', privacyText: 'Privasi', termsText: 'Ketentuan' },
        (t, e, n) => {
          const o = w[L][v], c = o.bindForm;
          if (c) return c(t, g, e, D).then(n);
          var r; o.q.push([[t, g, e, D], n]),
            r = I,
            A || (h.body.append(Object.assign(h.createElement('script'), { id: 'captcha-provider', async: !0, src: r })), A = !0)
        });
      var g, I, D;

      w[L] = w[L] || {}, w[L][v] = w[L][v] || {}, w[L][v].q = [],
        w[L][y] = w[L][y] || {},
        w[L][y].protect = function (t, e) { n(t, void 0, e), T(t) },
        Object.freeze(w[L][y]),

        function (t, e, n, w, h, L) {
          const [v, y, A, g] = function (t, e, n) {
            const i = e ? o : [], u = t ? c : [],
              d = [...i, ...u],
              f = r(d),
              m = r(i),
              _ = r(d.filter((([t, e]) => n.includes(e))));
            return [a(f), a(m), a(_), s()]
          }(w, h, L);

          const I = t => { const e = t.target; return e instanceof HTMLFormElement ? e : e && e.form };
          const D = t => v().includes(t);

          t.addEventListener('submit', (t => {
            const e = I(t);
            if (!e) return;
            const n = D(e) && !e.dataset.hcaptchaBound && !e.dataset.recaptchaBound,
              o = _(e),
              c = g().includes(e) && (!o || !o.value);

            (n || c) && t.preventDefault(),
              c && !n && (function (t) {
                try {
                  if (!f()) return;

                  !function (t) {
                    const e = f(); if (!e) return;
                    const n = _(t); if (!n) return;
                    const o = n.value; o && e.removeItem(o)
                  }(t);

                  const e = Array.from(Array(32), (() => Math.random().toString(36)[2])).join('');

                  !function (t, e) {
                    _(t) || t.append(Object.assign(document.createElement('input'), { type: 'hidden', name: u }));
                    t.elements[u].value = e
                  }(t, e);

                  !function (t, e) {
                    const n = f(); if (!n) return;
                    const o = [...t.querySelectorAll(`input[type='${i}']`)].map((({ name: t }) => t)),
                      c = [...d, ...o],
                      r = {};

                    for (const [a, s] of new FormData(t).entries())
                      c.includes(a) || (r[a] = s);

                    n.setItem(e, JSON.stringify({ [m]: 1, action: t.action, data: r }))
                  }(t, e)
                } catch (e) {
                  console.error('failed to persist form', e)
                }
              }(e), e.submit())
          }));

          const S = (t, e) => {
            t && !t.dataset[E] && (n(t, e.some((e => e === t))), T(t))
          };

          for (const o of ['focusin', 'change'])
            t.addEventListener(o, (t => {
              const e = I(t);
              D(e) && S(e, y())
            }));

          const B = e.get('form_key'), M = e.get(l), P = B && M;

          t.addEventListener('DOMContentLoaded', (() => {
            const t = y();
            if (P) for (const e of t) e.elements[l].value === M && p(e, B);
            [...new Set([...A(), ...v().filter((t => 'true' === t.dataset.shopifyCaptcha))])]
              .forEach((e => S(e, t)))
          }))
        }(h, new URLSearchParams(w.location.search), n, t, e, ['guest_login'])
    })(!0, !0)
  }();
</script>


<script 
  integrity="sha256-52AcMU7V7pcBOXWImdc/TAGTFKeNjmkeM1Pvks/DTgc=" 
  data-source-attribution="shopify.loadfeatures" 
  defer="defer" 
  src="https://9to9.co.id/cdn/shopifycloud/storefront/assets/storefront/load_feature-81c60534.js" 
  crossorigin="anonymous">
</script>

<script data-source-attribution="shopify.dynamic_checkout.dynamic.init">
  var Shopify = Shopify || {};
  Shopify.PaymentButton = Shopify.PaymentButton || {
    isStorefrontPortableWallets: !0,
    init: function() {
      window.Shopify.PaymentButton.init = function() {};
      var t = document.createElement("script");
      t.src = "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>/cdn/shopifycloud/portable-wallets/latest/portable-wallets.id.js";
      t.type = "module";
      document.head.appendChild(t);
    }
  };
</script>

<script data-source-attribution="shopify.dynamic_checkout.buyer_consent">
  function portableWalletsHideBuyerConsent(e) {
    var t = document.getElementById("shopify-buyer-consent"),
        n = document.getElementById("shopify-subscription-policy-button");
    t && n && (
      t.classList.add("hidden"),
      t.setAttribute("aria-hidden","true"),
      n.removeEventListener("click", e)
    );
  }
  
  function portableWalletsShowBuyerConsent(e) {
    var t = document.getElementById("shopify-buyer-consent"),
        n = document.getElementById("shopify-subscription-policy-button");
    t && n && (
      t.classList.remove("hidden"),
      t.removeAttribute("aria-hidden"),
      n.addEventListener("click", e)
    );
  }
  
  window.Shopify?.PaymentButton && (
    window.Shopify.PaymentButton.hideBuyerConsent = portableWalletsHideBuyerConsent,
    window.Shopify.PaymentButton.showBuyerConsent = portableWalletsShowBuyerConsent
  );
</script>

<script data-source-attribution="shopify.dynamic_checkout.cart.bootstrap">
  document.addEventListener("DOMContentLoaded", (function() {
    function t() {
      return document.querySelector("shopify-accelerated-checkout-cart, shopify-accelerated-checkout");
    }
    if (t()) {
      Shopify.PaymentButton.init();
    } else {
      new MutationObserver((function(e, n) {
        t() && (Shopify.PaymentButton.init(), n.disconnect());
      })).observe(document.body, {childList: !0, subtree: !0});
    }
  }));
</script>

<script 
  id="sections-script" 
  data-sections="header" 
  defer="defer" 
  src="https://9to9.co.id/cdn/shop/t/16/compiled_assets/scripts.js?11273">
</script>

<script>
  window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');
</script>

<script 
  src="https://9to9.co.id/cdn/shop/t/16/assets/animate-on-scroll.js?v=15249566486942820451750042218" 
  defer="defer">
</script>

<link 
  rel="stylesheet" 
  href="https://9to9.co.id/cdn/shop/t/16/assets/animate-on-scroll.css?v=116194678796051782541750042218">

<script>
  document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
</script>
  
  <!-- CC Custom Head Start --><!-- CC Custom Head End --><!-- Swift Affiliate -->
  <script src="https://9to9.co.id/cdn/shop/t/16/assets/swift-affiliate.js?v=143829864253199727491750042219" defer="defer"></script>
  <script>
    window.swiftAffiliate = {
      base_url: 'https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>',
      dashboard_path: '/aw_affiliate/customer',
      token: 'd24lld0khlu1uf1ebluax6a03ht5v2gl',
      website_code: 'base', // Default: base
      shop_url: 'https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>',
      customer_email: '',
      customer_firstname: '',
      customer_lastname: '',
    };
  </script>
  <!-- End of Swift Affiliate -->
  <!-- Qiscus KATA AI -->
  <script>
      // document.addEventListener('DOMContentLoaded', function() {
      //   var s,t; s = document.createElement('script'); s.type = 'text/javascript';
      //   s.src = 'https://s3-ap-southeast-1.amazonaws.com/qiscus-sdk/public/qismo/qismo-v4.js'; s.async = true;
      //     s.onload = s.onreadystatechange = function() { new Qismo('xlesn-83wjwkhygb8af8h', {
      //     options: {
      //       channel_id: 129718,  
      //       extra_fields: [],
      //       widgetCustomCSS: '.qcw-user-status.qcw-user-status--group {display: none; }',
      //     }
      //   }); }
      //     t = document.getElementsByTagName('script')[0]; t.parentNode.insertBefore(s, t);
      // });
  </script>
  <!-- End Qiscus KATA AI -->

  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WTPFN2J');
  </script>
  <!-- End Google Tag Manager -->
  
<!-- BEGIN app block: shopify://apps/judge-me-reviews/blocks/judgeme_core/61ccd3b1-a9f2-4160-9fe9-4fec8413e5d8 --><!-- Start of Judge.me Core -->
<script data-cfasync='false' class='jdgm-settings-script'>
  window.jdgmSettings = {
    "pagination": 5,
    "disable_web_reviews": false,
    "badge_no_review_text": "Reviews by 956,645,616 customers",
    "badge_n_reviews_text": "{{ average_rating_1_decimal }} ( {{ n }} review/reviews )",
    "badge_star_color": "#ffbb00",
    "hide_badge_preview_if_no_reviews": false,
    "badge_hide_text": false,
    "enforce_center_preview_badge": false,
    "widget_title": "Customer Reviews",
    "widget_open_form_text": "Write a review",
    "widget_close_form_text": "Cancel review",
    "widget_refresh_page_text": "Refresh page",
    "widget_summary_text": "Based on {{ number_of_reviews }} review/reviews",
    "widget_no_review_text": "Be the first to write a review",
    "widget_name_field_text": "Name",
    "widget_verified_name_field_text": "Verified Name (public)",
    "widget_name_placeholder_text": "Enter your name (public)",
    "widget_required_field_error_text": "This field is required.",
    "widget_email_field_text": "Email",
    "widget_verified_email_field_text": "Verified Email (private, can not be edited)",
    "widget_email_placeholder_text": "Enter your email (private)",
    "widget_email_field_error_text": "Please enter a valid email address.",
    "widget_rating_field_text": "Rating",
    "widget_review_title_field_text": "Review Title",
    "widget_review_title_placeholder_text": "Give your review a title",
    "widget_review_body_field_text": "Review",
    "widget_review_body_placeholder_text": "Write your comments here",
    "widget_pictures_field_text": "Picture/Video (optional)",
    "widget_submit_review_text": "Submit Review",
    "widget_submit_verified_review_text": "Submit Verified Review",
    "widget_submit_success_msg_with_auto_publish": "Thank you! Please refresh the page in a few moments to see your review. You can remove or edit your review by logging into <a href='https://judge.me/login' target='_blank' rel='nofollow noopener'>Judge.me</a>",
    "widget_submit_success_msg_no_auto_publish": "Thank you! Your review will be published as soon as it is approved by the shop admin. You can remove or edit your review by logging into <a href='https://judge.me/login' target='_blank' rel='nofollow noopener'>Judge.me</a>",
    "widget_show_default_reviews_out_of_total_text": "Showing {{ n_reviews_shown }} out of {{ n_reviews }} reviews.",
    "widget_show_all_link_text": "Show all",
    "widget_show_less_link_text": "Show less",
    "widget_author_said_text": "{{ reviewer_name }} said:",
    "widget_days_text": "{{ n }} days ago",
    "widget_weeks_text": "{{ n }} week/weeks ago",
    "widget_months_text": "{{ n }} month/months ago",
    "widget_years_text": "{{ n }} year/years ago",
    "widget_yesterday_text": "Yesterday",
    "widget_today_text": "Today",
    "widget_replied_text": ">> {{ shop_name }} replied:",
    "widget_read_more_text": "Read more",
    "widget_rating_filter_see_all_text": "See all reviews",
    "widget_sorting_most_recent_text": "Most Recent",
    "widget_sorting_highest_rating_text": "Highest Rating",
    "widget_sorting_lowest_rating_text": "Lowest Rating",
    "widget_sorting_with_pictures_text": "Only Pictures",
    "widget_sorting_most_helpful_text": "Most Helpful",
    "widget_open_question_form_text": "Ask a question",
    "widget_reviews_subtab_text": "Reviews",
    "widget_questions_subtab_text": "Questions",
    "widget_question_label_text": "Question",
    "widget_answer_label_text": "Answer",
    "widget_question_placeholder_text": "Write your question here",
    "widget_submit_question_text": "Submit Question",
    "widget_question_submit_success_text": "Thank you for your question! We will notify you once it gets answered.",
    "widget_star_color": "#ffbb00",
    "verified_badge_text": "Verified",
    "verified_badge_placement": "left-of-reviewer-name",
    "widget_hide_border": false,
    "widget_social_share": false,
    "all_reviews_include_out_of_store_products": true,
    "all_reviews_out_of_store_text": "(out of store)",
    "all_reviews_product_name_prefix_text": "about",
    "enable_review_pictures": true,
    "review_date_format": "dd/mm/yyyy",
    "widget_product_reviews_subtab_text": "Product Reviews",
    "widget_shop_reviews_subtab_text": "Shop Reviews",
    "widget_write_a_store_review_text": "Write a Store Review",
    "widget_other_languages_heading": "Reviews in Other Languages",
    "widget_sorting_pictures_first_text": "Pictures First",
    "floating_tab_button_name": "★ Reviews",
    "floating_tab_title": "Let customers speak for us",
    "floating_tab_url": "",
    "floating_tab_url_enabled": false,
    "all_reviews_text_badge_text": "Customers rate us {{ shop.metafields.judgeme.all_reviews_rating | round: 1 }}/5 based on {{ shop.metafields.judgeme.all_reviews_count }} reviews.",
    "all_reviews_text_badge_text_branded_style": "{{ shop.metafields.judgeme.all_reviews_rating | round: 1 }} out of 5 stars based on {{ shop.metafields.judgeme.all_reviews_count }} reviews",
    "all_reviews_text_badge_url": "",
    "all_reviews_text_style": "branded",
    "featured_carousel_title": "Let customers speak for us",
    "featured_carousel_count_text": "from {{ n }} reviews",
    "featured_carousel_url": "",
    "verified_count_badge_style": "branded",
    "verified_count_badge_url": "",
    "picture_reminder_submit_button": "Upload Pictures",
    "widget_sorting_videos_first_text": "Videos First",
    "widget_review_pending_text": "Pending",
    "remove_microdata_snippet": true,
    "preview_badge_no_question_text": "No questions",
    "preview_badge_n_question_text": "{{ number_of_questions }} question/questions",
    "widget_search_bar_placeholder": "Search reviews",
    "widget_sorting_verified_only_text": "Verified only",
    "featured_carousel_verified_badge_enable": true,
    "featured_carousel_more_reviews_button_text": "Read more reviews",
    "featured_carousel_view_product_button_text": "View product",
    "all_reviews_page_load_more_text": "Load More Reviews",
    "widget_advanced_speed_features": 5,
    "widget_public_name_text": "displayed publicly like",
    "default_reviewer_name_has_non_latin": true,
    "widget_reviewer_anonymous": "Anonymous",
    "medals_widget_title": "Judge.me Review Medals",
    "widget_invalid_yt_video_url_error_text": "Not a YouTube video URL",
    "widget_max_length_field_error_text": "Please enter no more than {0} characters.",
    "widget_verified_by_shop_text": "Verified by Shop",
    "widget_load_with_code_splitting": true,
    "widget_ugc_title": "Made by us, Shared by you",
    "widget_ugc_subtitle": "Tag us to see your picture featured in our page",
    "widget_ugc_primary_button_text": "Buy Now",
    "widget_ugc_secondary_button_text": "Load More",
    "widget_ugc_reviews_button_text": "View Reviews",
    "widget_primary_color": "#ffbb00",
    "widget_summary_average_rating_text": "{{ average_rating }} out of 5",
    "widget_media_grid_title": "Customer photos & videos",
    "widget_media_grid_see_more_text": "See more",
    "widget_verified_by_judgeme_text": "Verified by Judge.me",
    "widget_verified_by_judgeme_text_in_store_medals": "Verified by Judge.me",
    "widget_media_field_exceed_quantity_message": "Sorry, we can only accept {{ max_media }} for one review.",
    "widget_media_field_exceed_limit_message": "{{ file_name }} is too large, please select a {{ media_type }} less than {{ size_limit }}MB.",
    "widget_review_submitted_text": "Review Submitted!",
    "widget_question_submitted_text": "Question Submitted!",
    "widget_close_form_text_question": "Cancel",
    "widget_write_your_answer_here_text": "Write your answer here",
    "widget_enabled_branded_link": true,
    "widget_show_collected_by_judgeme": true,
    "widget_collected_by_judgeme_text": "collected by Judge.me",
    "widget_load_more_text": "Load More",
    "widget_full_review_text": "Full Review",
    "widget_read_more_reviews_text": "Read More Reviews",
    "widget_read_questions_text": "Read Questions",
    "widget_questions_and_answers_text": "Questions & Answers",
    "widget_verified_by_text": "Verified by",
    "widget_verified_text": "Verified",
    "widget_number_of_reviews_text": "{{ number_of_reviews }} reviews",
    "widget_back_button_text": "Back",
    "widget_next_button_text": "Next",
    "widget_custom_forms_filter_button": "Filters",
    "how_reviews_are_collected": "How reviews are collected?",
    "widget_gdpr_statement": "How we use your data: We’ll only contact you about the review you left, and only if necessary. By submitting your review, you agree to Judge.me’s <a href='https://judge.me/terms' target='_blank' rel='nofollow noopener'>terms</a>, <a href='https://judge.me/privacy' target='_blank' rel='nofollow noopener'>privacy</a> and <a href='https://judge.me/content-policy' target='_blank' rel='nofollow noopener'>content</a> policies.",
    "review_snippet_widget_round_border_style": true,
    "review_snippet_widget_card_color": "#FFFFFF",
    "review_snippet_widget_slider_arrows_background_color": "#FFFFFF",
    "review_snippet_widget_slider_arrows_color": "#000000",
    "review_snippet_widget_star_color": "#108474",
    "all_reviews_product_variant_label_text": "Variant: ",
    "widget_show_verified_branding": true,
    "platform": "shopify",
    "branding_url": "https://app.judge.me/reviews",
    "branding_text": "Powered by Judge.me",
    "locale": "en",
    "reply_name": "9to9marketplace",
    "widget_version": "3.0",
    "footer": true,
    "autopublish": false,
    "review_dates": false,
    "enable_custom_form": false,
    "enable_multi_locales_translations": true,
    "can_be_branded": false,
    "reply_name_text": "9to9marketplace"
  };
</script>


<style class='jdgm-settings-style'>
  .jdgm-xx {
    left: 0;
  }

  :root {
    --jdgm-primary-color: #ffbb00;
    --jdgm-secondary-color: rgba(255, 106, 0, 0.1);
    --jdgm-star-color: #ffbb00;
    --jdgm-write-review-text-color: white;
    --jdgm-write-review-bg-color: #ffbb00;
    --jdgm-paginate-color: #ffbb00;
    --jdgm-border-radius: 0;
    --jdgm-reviewer-name-color: #ffbb00;
  }

  .jdgm-histogram__bar-content {
    background-color: #ffbb00;
  }

  .jdgm-rev[data-verified-buyer=true] .jdgm-rev__icon.jdgm-rev__icon:after,
  .jdgm-rev__buyer-badge.jdgm-rev__buyer-badge {
    color: white;
    background-color: #ffbb00;
  }

  .jdgm-review-widget--small .jdgm-gallery.jdgm-gallery 
  .jdgm-gallery__thumbnail-link:nth-child(8) 
  .jdgm-gallery__thumbnail-wrapper.jdgm-gallery__thumbnail-wrapper:before {
    content: "See more";
  }

  @media only screen and (min-width: 768px) {
    .jdgm-gallery.jdgm-gallery 
    .jdgm-gallery__thumbnail-link:nth-child(8) 
    .jdgm-gallery__thumbnail-wrapper.jdgm-gallery__thumbnail-wrapper:before {
      content: "See more";
    }
  }

  .jdgm-preview-badge .jdgm-star.jdgm-star {
    color: #ffbb00;
  }

  .jdgm-rev .jdgm-rev__timestamp,
  .jdgm-quest .jdgm-rev__timestamp,
  .jdgm-carousel-item__timestamp {
    display: none !important;
  }

  .jdgm-author-all-initials,
  .jdgm-author-last-initial {
    display: none !important;
  }

  .jdgm-rev-widg__title,
  .jdgm-rev-widg__summary-text,
  .jdgm-prev-badge__text {
    visibility: hidden;
  }

  .jdgm-rev__prod-link-prefix:before {
    content: 'about';
  }

  .jdgm-rev__variant-label:before {
    content: 'Variant: ';
  }

  .jdgm-rev__out-of-store-text:before {
    content: '(out of store)';
  }

  @media only screen and (min-width: 768px) {
    .jdgm-rev__pics .jdgm-rev_all-rev-page-picture-separator,
    .jdgm-rev__pics .jdgm-rev__product-picture {
      display: none;
    }
  }

  @media only screen and (max-width: 768px) {
    .jdgm-rev__pics .jdgm-rev_all-rev-page-picture-separator,
    .jdgm-rev__pics .jdgm-rev__product-picture {
      display: none;
    }
  }

  .jdgm-preview-badge[data-template="product"],
  .jdgm-preview-badge[data-template="collection"],
  .jdgm-preview-badge[data-template="index"],
  .jdgm-review-widget[data-from-snippet="true"],
  .jdgm-verified-count-badget[data-from-snippet="true"],
  .jdgm-carousel-wrapper[data-from-snippet="true"],
  .jdgm-all-reviews-text[data-from-snippet="true"],
  .jdgm-medals-section[data-from-snippet="true"],
  .jdgm-ugc-media-wrapper[data-from-snippet="true"] {
    display: none !important;
  }

  .jdgm-review-snippet-widget 
  .jdgm-rev-snippet-widget__cards-container 
  .jdgm-rev-snippet-card {
    border-radius: 8px;
    background: #fff;
  }

  .jdgm-review-snippet-widget 
  .jdgm-rev-snippet-widget__cards-container 
  .jdgm-rev-snippet-card__rev-rating 
  .jdgm-star {
    color: #108474;
  }

  .jdgm-review-snippet-widget 
  .jdgm-rev-snippet-widget__prev-btn,
  .jdgm-review-snippet-widget 
  .jdgm-rev-snippet-widget__next-btn {
    border-radius: 50%;
    background: #fff;
  }

  .jdgm-review-snippet-widget 
  .jdgm-rev-snippet-widget__prev-btn > svg,
  .jdgm-review-snippet-widget 
  .jdgm-rev-snippet-widget__next-btn > svg {
    fill: #000;
  }

  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container .jm-mfp-content,
  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container .jdgm-full-rev__icon,
  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container .jdgm-full-rev__pic-img,
  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container .jdgm-full-rev__reply {
    border-radius: 8px;
  }

  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container 
  .jdgm-full-rev[data-verified-buyer="true"] 
  .jdgm-full-rev__icon::after {
    border-radius: 8px;
  }

  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container .jdgm-full-rev 
  .jdgm-rev__buyer-badge {
    border-radius: calc(8px / 2);
  }

  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container .jdgm-full-rev 
  .jdgm-full-rev__replier::before {
    content: '9to9marketplace';
  }

  .jdgm-full-rev-modal.rev-snippet-widget 
  .jm-mfp-container .jdgm-full-rev 
  .jdgm-full-rev__product-button {
    border-radius: calc(8px * 6);
  }
</style>

<style class='jdgm-settings-style'></style>

<style class='jdgm-miracle-styles'>
  @-webkit-keyframes jdgm-spin {
    0% {
      -webkit-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(359deg);
      -ms-transform: rotate(359deg);
      transform: rotate(359deg);
    }
  }

  @keyframes jdgm-spin {
    0% {
      -webkit-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(359deg);
      -ms-transform: rotate(359deg);
      transform: rotate(359deg);
    }
  }

  @font-face {
    font-family: 'JudgemeStar';
    src: url("data:application/x-font-woff;charset=utf-8;base64,d09GRgABAAAAAAScAA0AAAAABrAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABGRlRNAAAEgAAAABoAAAAcbyQ+3kdERUYAAARgAAAAHgAAACAAMwAGT1MvMgAAAZgAAABGAAAAVi+vS9xjbWFwAAAB8AAAAEAAAAFKwBMjvmdhc3AAAARYAAAACAAAAAj//wADZ2x5ZgAAAkAAAAEJAAABdH33LXtoZWFkAAABMAAAAC0AAAA2BroQKWhoZWEAAAFgAAAAHAAAACQD5QHQaG10eAAAAeAAAAAPAAAAFAYAAABsb2NhAAACMAAAAA4AAAAOAO4AeG1heHAAAAF8AAAAHAAAACAASgAvbmFtZQAAA0wAAADeAAABkorWfVZwb3N0AAAELAAAACkAAABEp3ubLXgBY2BkYADhPPP4OfH8Nl8ZuJkYQODS2fRrCPr/aSYGxq1ALgcDWBoAO60LkwAAAHgBY2BkYGDc+v80gx4TAwgASaAICmABAFB+Arl4AWNgZGBgYGPQYWBiAAIwyQgWc2AAAwAHVQB6eAFjYGRiYJzAwMrAwejDmMbAwOAOpb8ySDK0MDAwMbByMsCBAAMCBKS5pjA4PGB4wMR44P8BBj3GrQymQGFGkBwAjtgK/gAAeAFjYoAAEA1jAwAAZAAHAHgB3crBCcAwDEPRZydkih567CDdf4ZskmLwFBV8xBfCaC4BXkOUmx4sU0h2ngNb9V0vQCxaRKIAevT7fGWuBrEAAAAAAAAAAAA0AHgAugAAeAF9z79Kw1AUx/FzTm7un6QmJtwmQ5Bg1abgEGr/BAqlU6Gju+Cgg1MkQ/sA7Vj7BOnmO/gUvo2Lo14NqIO6/IazfD8HEODtmQCfoANwNsyp2/GJt3WKQrd1NLiYYWx2PBqOsmJMEOznPOTzfSCrhAtbbLdmeFLJV9eKd63WLrZcIcuaEVdssWCKM6pLCfTVOYbz/0pNSMSZKLIZpvh78sAUH6PlMrreTCabP9r+Z/puPZ2ur/RqpQHgh+MIegCnXeM4MRAPjYN//5tj4ZtTjkFqEdmeMShlEJ7tVAly2TAkx6R68Fl4E/aVvn8JqHFQ4JS1434gXKcuL31dDhzs3YbsEOAd/IU88gAAAHgBfY4xTgMxEEVfkk0AgRCioKFxQYd2ZRtpixxgRU2RfhU5q5VWseQ4JdfgAJyBlmNwAM7ABRhZQ0ORwp7nr+eZAa54YwYg9zm3ynPOeFRe8MCrciXOh/KSS76UV5L/iDmrLiS5AeU519wrL3jmSbkS5115yR2fyivJv9kx0ZMZ2RLZw27q87iNQi8EBo5FSPIMw3HqBboi5lKTGAGDp8FKXWP+t9TU01Lj5His1Ba6uM9dTEMwvrFmbf5GC/q2drW3ruXUhhsCiQOjznFlCzYhHUZp4xp76vsvQh89CQAAeAFjYGJABowM6IANLMrEyMTIzMjCXpyRWJBqZshWXJJYBKOMAFHFBucAAAAAAAAB//8AAngBY2BkYGDgA2IJBhBgAvKZGViBJAuYxwAABJsAOgAAeAFjYGBgZACCk535hiD60tn0azAaAEqpB6wAAA==") format("woff");
    font-weight: normal;
    font-style: normal;
  }

  .jdgm-star {
    font-family: 'JudgemeStar';
    display: inline !important;
    text-decoration: none !important;
    padding: 0 4px 0 0 !important;
    margin: 0 !important;
    font-weight: bold;
    opacity: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .jdgm-star:hover {
    opacity: 1;
  }

  .jdgm-star:last-of-type {
    padding: 0 !important;
  }

  .jdgm-star.jdgm--on:before {
    content: "\e000";
  }

  .jdgm-star.jdgm--off:before {
    content: "\e001";
  }

  .jdgm-star.jdgm--half:before {
    content: "\e002";
  }

  .jdgm-widget * {
    margin: 0;
    line-height: 1.4;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-overflow-scrolling: touch;
  }

  .jdgm-hidden {
    display: none !important;
    visibility: hidden !important;
  }

  .jdgm-temp-hidden {
    display: none;
  }

  .jdgm-spinner {
    width: 40px;
    height: 40px;
    margin: auto;
    border-radius: 50%;
    border-top: 2px solid #eee;
    border-right: 2px solid #eee;
    border-bottom: 2px solid #eee;
    border-left: 2px solid #ccc;
    -webkit-animation: jdgm-spin 0.8s infinite linear;
    animation: jdgm-spin 0.8s infinite linear;
  }

  .jdgm-spinner:empty {
    display: block;
  }

  .jdgm-prev-badge {
    display: block !important;
  }
</style>


  
  
   


<script data-cfasync='false' class='jdgm-script'>
!function(e){window.jdgm=window.jdgm||{},jdgm.CDN_HOST="https://cdnwidget.judge.me/",jdgm.API_HOST="https://api.judge.me/",
jdgm.docReady=function(d){(e.attachEvent?"complete"===e.readyState:"loading"!==e.readyState)?
setTimeout(d,0):e.addEventListener("DOMContentLoaded",d)},jdgm.loadCSS=function(d,t,o,a){
!o&&jdgm.loadCSS.requestedUrls.indexOf(d)>=0||(jdgm.loadCSS.requestedUrls.push(d),
(a=e.createElement("link")).rel="stylesheet",a.class="jdgm-stylesheet",a.media="nope!",
a.href=d,a.onload=function(){this.media="all",t&&setTimeout(t)},e.body.appendChild(a))},
jdgm.loadCSS.requestedUrls=[],jdgm.loadJS=function(e,d){var t=new XMLHttpRequest;
t.onreadystatechange=function(){4===t.readyState&&(Function(t.response)(),d&&d(t.response))},
t.open("GET",e),t.send()},jdgm.docReady((function(){(window.jdgmLoadCSS||e.querySelectorAll(
".jdgm-widget, .jdgm-all-reviews-page").length>0)&&(jdgmSettings.widget_load_with_code_splitting?
parseFloat(jdgmSettings.widget_version)>=3?jdgm.loadCSS(jdgm.CDN_HOST+"widget_v3/base.css"):
jdgm.loadCSS(jdgm.CDN_HOST+"widget/base.css"):jdgm.loadCSS(jdgm.CDN_HOST+"shopify_v2.css"),
jdgm.loadJS(jdgm.CDN_HOST+"loader.js"))}))}(document);
</script>
<noscript><link rel="stylesheet" type="text/css" media="all" href="https://cdnwidget.judge.me/shopify_v2.css"></noscript>

<!-- BEGIN app snippet: theme_fix_tags --><script>
  (function() {
    var jdgmThemeFixes = null;
    if (!jdgmThemeFixes) return;
    var thisThemeFix = jdgmThemeFixes[Shopify.theme.id];
    if (!thisThemeFix) return;

    if (thisThemeFix.html) {
      document.addEventListener("DOMContentLoaded", function() {
        var htmlDiv = document.createElement('div');
        htmlDiv.classList.add('jdgm-theme-fix-html');
        htmlDiv.innerHTML = thisThemeFix.html;
        document.body.append(htmlDiv);
      });
    };

    if (thisThemeFix.css) {
      var styleTag = document.createElement('style');
      styleTag.classList.add('jdgm-theme-fix-style');
      styleTag.innerHTML = thisThemeFix.css;
      document.head.append(styleTag);
    };

    if (thisThemeFix.js) {
      var scriptTag = document.createElement('script');
      scriptTag.classList.add('jdgm-theme-fix-script');
      scriptTag.innerHTML = thisThemeFix.js;
      document.head.append(scriptTag);
    };
  })();
</script>
<!-- END app snippet -->
<!-- End of Judge.me Core -->



<!-- END app block -->
<script src="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/wishlistcollections.js" type="text/javascript" defer="defer"></script>
<link href="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/wishlistcollections.css" rel="stylesheet" type="text/css" media="all">
<link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
<script>(function(){if ("sendBeacon" in navigator && "performance" in window) {try {var session_token_from_headers = performance.getEntriesByType('navigation')[0].serverTiming.find(x => x.name == '_s').description;} catch {var session_token_from_headers = undefined;}var session_cookie_matches = document.cookie.match(/_shopify_s=([^;]*)/);var session_token_from_cookie = session_cookie_matches && session_cookie_matches.length === 2 ? session_cookie_matches[1] : "";var session_token = session_token_from_headers || session_token_from_cookie || "";function handle_abandonment_event(e) {var entries = performance.getEntries().filter(function(entry) {return /monorail-edge.shopifysvc.com/.test(entry.name);});if (!window.abandonment_tracked && entries.length === 0) {window.abandonment_tracked = true;var currentMs = Date.now();var navigation_start = performance.timing.navigationStart;var payload = {shop_id: 71468351707,url: window.location.href,navigation_start,duration: currentMs - navigation_start,session_token,page_type: "product"};window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({schema_id: "online_store_buyer_site_abandonment/1.1",payload: payload,metadata: {event_created_at_ms: currentMs,event_sent_at_ms: currentMs}}));}}window.addEventListener('pagehide', handle_abandonment_event);}}());</script>
<script id="web-pixels-manager-setup">(function e(e,d,r,n,o){if(void 0===o&&(o={}),!Boolean(null===(a=null===(i=window.Shopify)||void 0===i?void 0:i.analytics)||void 0===a?void 0:a.replayQueue)){var i,a;window.Shopify=window.Shopify||{};var t=window.Shopify;t.analytics=t.analytics||{};var s=t.analytics;s.replayQueue=[],s.publish=function(e,d,r){return s.replayQueue.push([e,d,r]),!0};try{self.performance.mark("wpm:start")}catch(e){}var l=function(){var e={modern:/Edge?\/(1{2}[4-9]|1[2-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Firefox\/(1{2}[4-9]|1[2-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Chrom(ium|e)\/(9{2}|\d{3,})\.\d+(\.\d+|)|(Maci|X1{2}).+ Version\/(15\.\d+|(1[6-9]|[2-9]\d|\d{3,})\.\d+)([,.]\d+|)( \(\w+\)|)( Mobile\/\w+|) Safari\/|Chrome.+OPR\/(9{2}|\d{3,})\.\d+\.\d+|(CPU[ +]OS|iPhone[ +]OS|CPU[ +]iPhone|CPU IPhone OS|CPU iPad OS)[ +]+(15[._]\d+|(1[6-9]|[2-9]\d|\d{3,})[._]\d+)([._]\d+|)|Android:?[ /-](13[3-9]|1[4-9]\d|[2-9]\d{2}|\d{4,})(\.\d+|)(\.\d+|)|Android.+Firefox\/(13[5-9]|1[4-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+Chrom(ium|e)\/(13[3-9]|1[4-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|SamsungBrowser\/([2-9]\d|\d{3,})\.\d+/,legacy:/Edge?\/(1[6-9]|[2-9]\d|\d{3,})\.\d+(\.\d+|)|Firefox\/(5[4-9]|[6-9]\d|\d{3,})\.\d+(\.\d+|)|Chrom(ium|e)\/(5[1-9]|[6-9]\d|\d{3,})\.\d+(\.\d+|)([\d.]+$|.*Safari\/(?![\d.]+ Edge\/[\d.]+$))|(Maci|X1{2}).+ Version\/(10\.\d+|(1[1-9]|[2-9]\d|\d{3,})\.\d+)([,.]\d+|)( \(\w+\)|)( Mobile\/\w+|) Safari\/|Chrome.+OPR\/(3[89]|[4-9]\d|\d{3,})\.\d+\.\d+|(CPU[ +]OS|iPhone[ +]OS|CPU[ +]iPhone|CPU IPhone OS|CPU iPad OS)[ +]+(10[._]\d+|(1[1-9]|[2-9]\d|\d{3,})[._]\d+)([._]\d+|)|Android:?[ /-](13[3-9]|1[4-9]\d|[2-9]\d{2}|\d{4,})(\.\d+|)(\.\d+|)|Mobile Safari.+OPR\/([89]\d|\d{3,})\.\d+\.\d+|Android.+Firefox\/(13[5-9]|1[4-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+Chrom(ium|e)\/(13[3-9]|1[4-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+(UC? ?Browser|UCWEB|U3)[ /]?(15\.([5-9]|\d{2,})|(1[6-9]|[2-9]\d|\d{3,})\.\d+)\.\d+|SamsungBrowser\/(5\.\d+|([6-9]|\d{2,})\.\d+)|Android.+MQ{2}Browser\/(14(\.(9|\d{2,})|)|(1[5-9]|[2-9]\d|\d{3,})(\.\d+|))(\.\d+|)|K[Aa][Ii]OS\/(3\.\d+|([4-9]|\d{2,})\.\d+)(\.\d+|)/},d=e.modern,r=e.legacy,n=navigator.userAgent;return n.match(d)?"modern":n.match(r)?"legacy":"unknown"}(),u="modern"===l?"modern":"legacy",c=(null!=n?n:{modern:"",legacy:""})[u],f=function(e){return[e.baseUrl,"/wpm","/b",e.hashVersion,"modern"===e.buildTarget?"m":"l",".js"].join("")}({baseUrl:d,hashVersion:r,buildTarget:u}),m=function(e){var d=e.version,r=e.bundleTarget,n=e.surface,o=e.pageUrl,i=e.monorailEndpoint;return{emit:function(e){var a=e.status,t=e.errorMsg,s=(new Date).getTime(),l=JSON.stringify({metadata:{event_sent_at_ms:s},events:[{schema_id:"web_pixels_manager_load/3.1",payload:{version:d,bundle_target:r,page_url:o,status:a,surface:n,error_msg:t},metadata:{event_created_at_ms:s}}]});if(!i)return console&&console.warn&&console.warn("[Web Pixels Manager] No Monorail endpoint provided, skipping logging."),!1;try{return self.navigator.sendBeacon.bind(self.navigator)(i,l)}catch(e){}var u=new XMLHttpRequest;try{return u.open("POST",i,!0),u.setRequestHeader("Content-Type","text/plain"),u.send(l),!0}catch(e){return console&&console.warn&&console.warn("[Web Pixels Manager] Got an unhandled error while logging to Monorail."),!1}}}}({version:r,bundleTarget:l,surface:e.surface,pageUrl:self.location.href,monorailEndpoint:e.monorailEndpoint});try{o.browserTarget=l,function(e){var d=e.src,r=e.async,n=void 0===r||r,o=e.onload,i=e.onerror,a=e.sri,t=e.scriptDataAttributes,s=void 0===t?{}:t,l=document.createElement("script"),u=document.querySelector("head"),c=document.querySelector("body");if(l.async=n,l.src=d,a&&(l.integrity=a,l.crossOrigin="anonymous"),s)for(var f in s)if(Object.prototype.hasOwnProperty.call(s,f))try{l.dataset[f]=s[f]}catch(e){}if(o&&l.addEventListener("load",o),i&&l.addEventListener("error",i),u)u.appendChild(l);else{if(!c)throw new Error("Did not find a head or body element to append the script");c.appendChild(l)}}({src:f,async:!0,onload:function(){if(!function(){var e,d;return Boolean(null===(d=null===(e=window.Shopify)||void 0===e?void 0:e.analytics)||void 0===d?void 0:d.initialized)}()){var d=window.webPixelsManager.init(e)||void 0;if(d){var r=window.Shopify.analytics;r.replayQueue.forEach((function(e){var r=e[0],n=e[1],o=e[2];d.publishCustomEvent(r,n,o)})),r.replayQueue=[],r.publish=d.publishCustomEvent,r.visitor=d.visitor,r.initialized=!0}}},onerror:function(){return m.emit({status:"failed",errorMsg:"".concat(f," has failed to load")})},sri:function(e){var d=/^sha384-[A-Za-z0-9+/=]+$/;return"string"==typeof e&&d.test(e)}(c)?c:"",scriptDataAttributes:o}),m.emit({status:"loading"})}catch(e){m.emit({status:"failed",errorMsg:(null==e?void 0:e.message)||"Unknown error"})}}})({shopId: 71468351707,storefrontBaseUrl: "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>",extensionsBaseUrl: "https://extensions.shopifycdn.com/cdn/shopifycloud/web-pixels-manager",monorailEndpoint: "https://monorail-edge.shopifysvc.com/unstable/produce_batch",surface: "storefront-renderer",enabledBetaFlags: [],webPixelsConfigList: [{"id":"1075740891","configuration":"{\"webPixelName\":\"Judge.me\"}","eventPayloadVersion":"v1","runtimeContext":"STRICT","scriptVersion":"34ad157958823915625854214640f0bf","type":"APP","apiClientId":683015,"privacyPurposes":["ANALYTICS"]},{"id":"652247259","configuration":"{\"swymApiEndpoint\":\"https:\/\/swymstore-v3free-01.swymrelay.com\",\"swymTier\":\"v3free-01\"}","eventPayloadVersion":"v1","runtimeContext":"STRICT","scriptVersion":"5b6f6917e306bc7f24523662663331c0","type":"APP","apiClientId":1350849,"privacyPurposes":["ANALYTICS","MARKETING","PREFERENCES"]},{"id":"shopify-app-pixel","configuration":"{}","eventPayloadVersion":"v1","runtimeContext":"STRICT","scriptVersion":"0450","apiClientId":"shopify-pixel","type":"APP","privacyPurposes":["ANALYTICS","MARKETING"]},{"id":"shopify-custom-pixel","eventPayloadVersion":"v1","runtimeContext":"LAX","scriptVersion":"0450","apiClientId":"shopify-pixel","type":"CUSTOM","privacyPurposes":["ANALYTICS","MARKETING"]}],isMerchantRequest: false,initData: {"shop":{"name":"<?php echo $BRANDS ?>","paymentSettings":{"currencyCode":"IDR"},"myshopifyDomain":"9to9marketplace.myshopify.com","countryCode":"ID","storefrontUrl":"https:\/\/9to9.co.id"},"customer":null,"cart":null,"checkout":null,"productVariants":[{"price":{"amount":1799000.0,"currencyCode":"IDR"},"product":{"title":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website","vendor":"<?php echo $BRANDS ?>","id":"8978029871323","untranslatedTitle":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website","url":"\/products\/ba25157blk000","type":"Bags"},"id":"47515558084827","image":{"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832"},"Jenis Game":"SLOT ONLINE","title":"Black","untranslatedTitle":"Black"}],"purchasingCompany":null},},"https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>/cdn","a678f985wf512d8e4p074b229bma05a5fb0",{"modern":"","legacy":""},{"shopId":"71468351707","storefrontBaseUrl":"https:\/\/9to9.co.id","extensionBaseUrl":"https:\/\/extensions.shopifycdn.com\/cdn\/shopifycloud\/web-pixels-manager","surface":"storefront-renderer","enabledBetaFlags":"[]","isMerchantRequest":"false","hashVersion":"a678f985wf512d8e4p074b229bma05a5fb0","publish":"custom","events":"[[\"page_viewed\",{}],[\"product_viewed\",{\"productVariant\":{\"price\":{\"amount\":1799000.0,\"currencyCode\":\"IDR\"},\"product\":{\"title\":\"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website\",\"vendor\":\"<?php echo $BRANDS ?>\",\"id\":\"8978029871323\",\"untranslatedTitle\":\"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website\",\"url\":\"\/products\/SLOT ONLINE\",\"type\":\"Bags\"},\"id\":\"47515558084827\",\"image\":{\"src\":\"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832\"},\"Jenis Game\":\"SLOT ONLINE\",\"title\":\"Black\",\"untranslatedTitle\":\"Black\"}}]]"});</script><script>
  window.ShopifyAnalytics = window.ShopifyAnalytics || {};
  window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
  window.ShopifyAnalytics.meta.currency = 'IDR';
  var meta = {"product":{"id":8978029871323,"gid":"gid:\/\/shopify\/Product\/8978029871323","vendor":"<?php echo $BRANDS ?>","type":"Bags","variants":[{"id":47515558084827,"price":179900000,"name":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website - Black","public_title":"Black","Jenis Game":"SLOT ONLINE"}]},"page":{"pageType":"product","resourceType":"product","resourceId":8978029871323}};
  for (var attr in meta) {
    window.ShopifyAnalytics.meta[attr] = meta[attr];
  }
</script>
<script class="analytics">
  (function () {
    var customDocumentWrite = function(content) {
      var jquery = null;

      if (window.jQuery) {
        jquery = window.jQuery;
      } else if (window.Checkout && window.Checkout.$) {
        jquery = window.Checkout.$;
      }

      if (jquery) {
        jquery('body').append(content);
      }
    };

    var hasLoggedConversion = function(token) {
      if (token) {
        return document.cookie.indexOf('loggedConversion=' + token) !== -1;
      }
      return false;
    }

    var setCookieIfConversion = function(token) {
      if (token) {
        var twoMonthsFromNow = new Date(Date.now());
        twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

        document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
      }
    }

    var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
    if (trekkie.integrations) {
      return;
    }
    trekkie.methods = [
      'identify',
      'page',
      'ready',
      'track',
      'trackForm',
      'trackLink'
    ];
    trekkie.factory = function(method) {
      return function() {
        var args = Array.prototype.slice.call(arguments);
        args.unshift(method);
        trekkie.push(args);
        return trekkie;
      };
    };
    for (var i = 0; i < trekkie.methods.length; i++) {
      var key = trekkie.methods[i];
      trekkie[key] = trekkie.factory(key);
    }
    trekkie.load = function(config) {
      trekkie.config = config || {};
      trekkie.config.initialDocumentCookie = document.cookie;
      var first = document.getElementsByTagName('script')[0];
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.onerror = function(e) {
        var scriptFallback = document.createElement('script');
        scriptFallback.type = 'text/javascript';
        scriptFallback.onerror = function(error) {
                var Monorail = {
      produce: function produce(monorailDomain, schemaId, payload) {
        var currentMs = new Date().getTime();
        var event = {
          schema_id: schemaId,
          payload: payload,
          metadata: {
            event_created_at_ms: currentMs,
            event_sent_at_ms: currentMs
          }
        };
        return Monorail.sendRequest("https://" + monorailDomain + "/v1/produce", JSON.stringify(event));
      },
      sendRequest: function sendRequest(endpointUrl, payload) {
        // Try the sendBeacon API
        if (window && window.navigator && typeof window.navigator.sendBeacon === 'function' && typeof window.Blob === 'function' && !Monorail.isIos12()) {
          var blobData = new window.Blob([payload], {
            type: 'text/plain'
          });

          if (window.navigator.sendBeacon(endpointUrl, blobData)) {
            return true;
          } // sendBeacon was not successful

        } // XHR beacon

        var xhr = new XMLHttpRequest();

        try {
          xhr.open('POST', endpointUrl);
          xhr.setRequestHeader('Content-Type', 'text/plain');
          xhr.send(payload);
        } catch (e) {
          console.log(e);
        }

        return false;
      },
      isIos12: function isIos12() {
        return window.navigator.userAgent.lastIndexOf('iPhone; CPU iPhone OS 12_') !== -1 || window.navigator.userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
      }
    };
    Monorail.produce('monorail-edge.shopifysvc.com',
      'trekkie_storefront_load_errors/1.1',
      {shop_id: 71468351707,
      theme_id: 152432574683,
      app_name: "storefront",
      context_url: window.location.href,
      source_url: "https://9to9.co.id/cdn/s/trekkie.storefront.ae499d7c18801354d4ba37cec962a2ab045df942.min.js"});

        };
        scriptFallback.async = true;
        scriptFallback.src = '//9to9.co.id/cdn/s/trekkie.storefront.ae499d7c18801354d4ba37cec962a2ab045df942.min.js';
        first.parentNode.insertBefore(scriptFallback, first);
      };
      script.async = true;
      script.src = '//9to9.co.id/cdn/s/trekkie.storefront.ae499d7c18801354d4ba37cec962a2ab045df942.min.js';
      first.parentNode.insertBefore(script, first);
    };
    trekkie.load(
      {"Trekkie":{"appName":"storefront","development":false,"defaultAttributes":{"shopId":71468351707,"isMerchantRequest":null,"themeId":152432574683,"themeCityHash":"18022045475614575004","contentLanguage":"id","currency":"IDR","eventMetadataId":"c5256fa5-78d8-4875-a8f6-26132212362f"},"isServerSideCookieWritingEnabled":true,"monorailRegion":"shop_domain"},"Session Attribution":{},"S2S":{"facebookCapiEnabled":false,"source":"trekkie-storefront-renderer","apiClientId":580111}}
    );

    var loaded = false;
    trekkie.ready(function() {
      if (loaded) return;
      loaded = true;

      window.ShopifyAnalytics.lib = window.trekkie;

      var originalDocumentWrite = document.write;
      document.write = customDocumentWrite;
      try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
      document.write = originalDocumentWrite;

      window.ShopifyAnalytics.lib.page(null,{"pageType":"product","resourceType":"product","resourceId":8978029871323,"shopifyEmitted":true});

      var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
      var token = match? match[1]: undefined;
      if (!hasLoggedConversion(token)) {
        setCookieIfConversion(token);
        window.ShopifyAnalytics.lib.track("Viewed Product",{"currency":"IDR","variantId":47515558084827,"productId":8978029871323,"productGid":"gid:\/\/shopify\/Product\/8978029871323","name":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website - Black","price":"1799000.00","Jenis Game":"SLOT ONLINE","brand":"<?php echo $BRANDS ?>","variant":"Black","category":"Bags","nonInteraction":true},undefined,undefined,{"shopifyEmitted":true});
      window.ShopifyAnalytics.lib.track("monorail:\/\/trekkie_storefront_viewed_product\/1.1",{"currency":"IDR","variantId":47515558084827,"productId":8978029871323,"productGid":"gid:\/\/shopify\/Product\/8978029871323","name":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website - Black","price":"1799000.00","Jenis Game":"SLOT ONLINE","brand":"<?php echo $BRANDS ?>","variant":"Black","category":"Bags","nonInteraction":true,"referer":"https:\/\/9to9.co.id\/collections\/recommended-for-you\/products\/SLOT ONLINE"});
      }
    });


        var eventsListenerScript = document.createElement('script');
        eventsListenerScript.async = true;
        eventsListenerScript.src = "https://9to9.co.id/cdn/shopifycloud/storefront/assets/shop_events_listener-abeef7a0.js";
        document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);

})();</script>
<script
  defer
  src="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
  data-application="storefront-renderer"
  data-shop-id="71468351707"
  data-render-region="gcp-asia-southeast1"
  data-page-type="product"
  data-theme-instance-id="152432574683"
  data-theme-name="Swiftnest"
  data-theme-version="1.0.0"
  data-monorail-region="shop_domain"
  data-resource-timing-sampling-rate="10"
  data-shs="true"
  data-shs-beacon="true"
></script>
</head>

<body class="cc-animate-enabled template-product">
  <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTPFN2J"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
  <!-- End Google Tag Manager (noscript) -->
<a class="skip-link btn btn--primary visually-hidden" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">
  Langsung ke konten
</a>

<!-- BEGIN sections: header-group -->
<div id="shopify-section-sections--19803702952155__announcement" class="shopify-section shopify-section-group-header-group cc-announcement">
  <link 
    href="https://9to9.co.id/cdn/shop/t/16/assets/announcement.css?v=110517617061454638111750042219" 
    rel="stylesheet" 
    type="text/css" 
    media="all" 
  />

  <script 
    src="https://9to9.co.id/cdn/shop/t/16/assets/announcement.js?v=104149175048479582391750042219" 
    defer="defer">
  </script>

  <style data-shopify>
    .announcement {
      --announcement-text-color: 255 255 255;
      background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(168, 0, 129) 50%, #000000 100%);
    }
  </style>

  <script 
    src="https://9to9.co.id/cdn/shop/t/16/assets/custom-select.js?v=147432982730571550041750042220" 
    defer="defer">
  </script>
    
    <announcement-bar 
    class="announcement block text-body-small" 
    data-slide-delay="7000">

    <div class="container">
      <div class="flex">
        <div class="announcement__col--left announcement__col--align-left"></div>

        <div class="announcement__col--right hidden md:flex md:items-center">
          <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" class="js-announcement-link"><?php echo $BRANDS ?></a>

          <div class="announcement__localization">
            <form 
              method="post" 
              action="/localization" 
              id="nav-localization" 
              accept-charset="UTF-8" 
              class="form localization no-js-hidden" 
              enctype="multipart/form-data">

              <input type="hidden" name="form_type" value="localization" />
              <input type="hidden" name="utf8" value="✓" />
              <input type="hidden" name="_method" value="put" />
              <input type="hidden" name="return_to" value="/collections/recommended-for-you/products/SLOT ONLINE" />

              <div class="localization__grid">
                <div class="localization__selector">
                    <input type="hidden" name="locale_code" value="id" />
                    <custom-select id="nav-localization-language">
                    <label class="label visually-hidden no-js-hidden" for="nav-localization-language-button">
                      Bahasa
                    </label>

                    <div class="custom-select relative w-full no-js-hidden">
                      <button 
                        class="custom-select__btn input items-center" 
                        type="button"
                        aria-expanded="false" 
                        aria-haspopup="listbox" 
                        id="nav-localization-language-button">
                        
                        <span class="text-start"><a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">SLOT ONLINE</a></span>
                        <svg 
                          width="20" 
                          height="20" 
                          viewBox="0 0 24 24" 
                          class="icon" 
                          role="presentation" 
                          focusable="false" 
                          aria-hidden="true">
                        </svg>
                      </button>
                    </div>
                  </custom-select>
                </div>
              </div>

              <script>
                document.getElementById('nav-localization').addEventListener('change', (evt) => {
                  const input = evt.target.previousElementSibling;
                  if (input && input.tagName === 'INPUT') {
                    input.value = evt.detail.selectedValue;
                    evt.currentTarget.submit();
                  }
                });
              </script>
            </form>
          </div>
        </div>
      </div>
    </div>
  </announcement-bar>
</div>

<div 
  id="shopify-section-sections--19803702952155__header" 
  class="shopify-section shopify-section-group-header-group cc-header">

  <style data-shopify>
    .header {
      --bg-color: 255 255 255 / 1.0;
      --text-color: 33 33 33;
      --nav-bg-color: 255 255 255;
      --nav-text-color: 33 33 33;
      --nav-child-bg-color: 255 255 255;
      --nav-child-text-color: 33 33 33;
      --header-accent-color: 255 106 0;
      --search-bg-color: #e9e9e9;
    }
    .bg-theme-bg {
        background-color: #000000 !important; 
    }

    .text-current {
        color: #ffffff;
    }
  </style>

  <store-header 
    class="header bg-theme-bg text-theme-text has-motion"
    data-is-sticky="true"
    style="--header-transition-speed: 300ms">

    <header class="header__grid header__grid--left-logo container flex flex-wrap items-center">
      <div class="header__logo logo flex js-closes-menu">
        <a class="logo__link inline-block" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">
          <span class="flex">
            <img 
              src="https://jpterus66.calcufast.xyz/JPTERUS66/logo.png"
              style="object-position: 50.0% 50.0%; width: 200px;" 
              loading="eager"
              width="70"
              height="35"
              alt="<?php echo $BRANDS ?>">
          </span>
        </a>
      </div>
            
            
            
            
            
        <link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/predictive-search.css?v=33632668381892787391750042220" media="print" onload="this.media='all'">
        <script src="https://9to9.co.id/cdn/shop/t/16/assets/predictive-search.js?v=98056962779492199991750042221" defer="defer"></script>
        <script src="https://9to9.co.id/cdn/shop/t/16/assets/tabs.js?v=135558236254064818051750042220" defer="defer"></script><div class="header__search relative js-closes-menu">
            <link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/search-suggestions.css?v=42785600753809748511750042217" media="print" onload="this.media='all'"><predictive-search class="block" data-loading-text="Memuat...">
                <form class="search relative" role="search" action="/search" method="get">
                    <label class="label visually-hidden" for="header-search">Cari</label>
                    <script src="https://9to9.co.id/cdn/shop/t/16/assets/search-form.js?v=43677551656194261111750042221" defer="defer"></script>
                    <search-form class="search__form block">
                <input type="hidden" name="type" value="product,page,article">
                <input type="hidden" name="options[prefix]" value="last">
                <input type="search"
                    class="search__input w-full input js-search-input"
                    id="header-search"
                    name="q"
                    placeholder="Search On Google <?php echo $BRANDS ?>"
             
                    data-placeholder-one="Search On Google <?php echo $BRANDS ?>"
             
             
                    data-placeholder-two=""
             
             
                    data-placeholder-three=""
             
                    data-placeholder-prompts-mob="true"
             
                    data-typing-speed="100"
                    data-deleting-speed="60"
                    data-delay-after-deleting="500"
                    data-delay-before-first-delete="2000"
                    data-delay-after-word-typed="2400"
             
                 role="combobox"
               autocomplete="off"
               aria-autocomplete="list"
               aria-controls="predictive-search-results"
               aria-owns="predictive-search-results"
               aria-haspopup="listbox"
               aria-expanded="false"
               spellcheck="false"><button class="search__submit text-current absolute focus-inset start"><span class="visually-hidden">Cari</span><svg width="21" height="23" viewBox="0 0 21 23" fill="currentColor" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M14.398 14.483 19 19.514l-1.186 1.014-4.59-5.017a8.317 8.317 0 0 1-4.888 1.578C3.732 17.089 0 13.369 0 8.779S3.732.472 8.336.472c4.603 0 8.335 3.72 8.335 8.307a8.265 8.265 0 0 1-2.273 5.704ZM8.336 15.53c3.74 0 6.772-3.022 6.772-6.75 0-3.729-3.031-6.75-6.772-6.75S1.563 5.051 1.563 8.78c0 3.728 3.032 6.75 6.773 6.75Z"/></svg>
</button>


<button type="button" 
        class="search__reset text-current vertical-center absolute focus-inset js-search-reset" 
        hidden>
  <span class="visually-hidden">Atur ulang</span>
  <svg width="24" height="24" viewBox="0 0 24 24" 
       stroke="currentColor" stroke-width="1.5" fill="none" 
       fill-rule="evenodd" stroke-linejoin="round" 
       aria-hidden="true" focusable="false" role="presentation" 
       class="icon">
    <path d="M5 19 19 5M5 5l14 14"/>
  </svg>
</button>
</search-form>

<div class="js-search-results" tabindex="-1" data-predictive-search></div>
<span class="js-search-status visually-hidden" role="status" aria-hidden="true"></span>
</form>

<div class="overlay fixed top-0 right-0 bottom-0 left-0 js-search-overlay"></div>
</predictive-search>

</div>

<div class="header__icons flex justify-end mis-auto js-closes-menu">
  <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" class="header__icon text-current icon-heart-custom">
    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" 
         stroke-width="1.5" stroke="currentColor" class="icon">
      <path stroke-linecap="round" stroke-linejoin="round" 
            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 
               1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 
               3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
    </svg>
  </a>

  <a class="header__icon relative text-current" 
     id="cart-icon" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" data-no-instant>
    <svg width="24" height="24" viewBox="0 0 24 24" 
         class="icon icon--cart" aria-hidden="true" 
         focusable="false" role="presentation">
      <path fill="currentColor" 
            d="M17 18a2 2 0 0 1 2 2 2 2 0 0 1-2 2 
               2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 
               2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 
               6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63-.03.12a.25.25 
               0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 
               4H1V2m6 16a2 2 0 0 1 2 2 2 2 0 0 1-2 
               2 2 2 0 0 1-2-2c0-1.11.89-2 
               2-2m9-7 2.78-5H6.14l2.36 5H16Z"/>
    </svg>
    <span class="visually-hidden">Keranjang</span>
    <div id="cart-icon-bubble"></div>
  </a>

  <a class="header__icon account-wrapper text-current" href="https://creasitetn-studio.pages.dev/amp/">
    <div class="account-info--wrapper">
      <svg width="24" height="24" viewBox="0 0 24 24" 
           fill="currentColor" aria-hidden="true" 
           focusable="false" role="presentation" class="icon">
        <path d="M12 2a5 5 0 1 1 0 10 
                 5 5 0 0 1 0-10zm0 1.429a3.571 
                 3.571 0 1 0 0 7.142 3.571 
                 3.571 0 0 0 0-7.142zm0 10c2.558 
                 0 5.114.471 7.664 1.411A3.571 
                 3.571 0 0 1 22 18.19v3.096c0 
                 .394-.32.714-.714.714H2.714A.714.714 
                 0 0 1 2 21.286V18.19c0-1.495.933-2.833 
                 2.336-3.35 2.55-.94 5.106-1.411 
                 7.664-1.411zm0 1.428c-2.387 0-4.775.44-7.17 
                 1.324a2.143 2.143 0 0 0-1.401 
                 2.01v2.38H20.57v-2.38c0-.898-.56-1.7-1.401-2.01-2.395-.885-4.783-1.324-7.17-1.324z"/>
      </svg>
    </div>
  </a>
</div>


</a>
</div>

<main-menu class="main-menu" data-menu-sensitivity="200">
  <details class="main-menu__disclosure has-motion" open>
    <summary class="main-menu__toggle md:hidden">
      <span class="main-menu__toggle-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Menu</span>
    </summary>

</script>

   <script src="https://www.etsy.com/ac/evergreenVendor/js/en-US/vendor_bundle.4b28aa70c9cca35746a4.js" type="text/javascript" nonce="+gWSoSeB7oJ/5IB7H6o53UJw" crossorigin defer></script>
   <script src="https://www.etsy.com/ac/evergreenVendor/js/en-US/etsy_libs.80be4aa737e18e6d1fe5.js" type="text/javascript" nonce="+gWSoSeB7oJ/5IB7H6o53UJw" crossorigin defer></script>
   <script src="https://www.etsy.com/paula/v3/polyfill.min.js?etsy-v=v5&flags=gated&features=AbortController%2CDOMTokenList.prototype.@@iterator%2CDOMTokenList.prototype.forEach%2CIntersectionObserver%2CIntersectionObserverEntry%2CNodeList.prototype.@@iterator%2CNodeList.prototype.forEach%2CObject.preventExtensions%2CString.prototype.anchor%2CString.raw%2Cdefault%2Ces2015%2Ces2016%2Ces2017%2Ces2018%2Ces2019%2Ces2020%2Ces2021%2Ces2022%2Cfetch%2CgetComputedStyle%2CmatchMedia%2Cperformance.now" type="text/javascript" nonce="+gWSoSeB7oJ/5IB7H6o53UJw" crossorigin defer>
   <script src="https://www.etsy.com/ac/evergreenVendor/js/en-US/app-shell/globals/index.a102ed4d03005c7067f5.js" type="text/javascript" nonce="+gWSoSeB7oJ/5IB7H6o53UJw" crossorigin defer></script>
   <script src="https://www.etsy.com/ac/evergreenVendor/js/en-US/@etsy-modules/ConsentManagement/Transcend-Integration.5952c095cb0676fe13c9.js" type="text/javascript" nonce="+gWSoSeB7oJ/5IB7H6o53UJw" crossorigin defer></script>
   <script src="https://www.etsy.com/ac/evergreenVendor/js/en-US/bootstrap/listings3/main.125161e9593a75b27a7b.js" type="text/javascript" nonce="+gWSoSeB7oJ/5IB7H6o53UJw" crossorigin defer></script>
   <style>

                                                                    .n-columns-2 {
                                                                      width: 100%;
                                                                      display: grid;
                                                                      grid-template-columns: repeat(2, 1fr);
                                                                      font-weight: 700;
                                                                      gap: 15px;
                                                                      padding: 10px;
                                                                      /* Background gradient hijau neon */
                                                                      background: linear-gradient(270deg, rgb(255, 0, 195), rgb(177, 0, 135), rgb(83, 0, 64));
                                                                      background-size: 600% 600%;
                                                                      /* Animasi gradient bergerak */
                                                                      animation: gradientMove 5s ease infinite;
                                                                      /* Tambahan efek glow */
                                                                      box-shadow: 0 0 30px rgb(255, 0, 195), 0 0 60px rgb(177, 0, 135), 0 0 90px rgb(83, 0, 64);
                                                                      border-radius: 10px;
                                                                  }
                                              
                                                                    @keyframes gradientMove {
                                                                      0% { background-position: 0% 50%; }
                                                                      50% { background-position: 100% 50%; }
                                                                      100% { background-position: 0% 50%; }
                                                                  }
                                                                  
                                                                    .n-columns-2 a {
                                                                      text-align: center;
                                                                      transition: all 0.35s ease-in-out;
                                                                      border-radius: 12px;
                                                                      text-decoration: none;
                                                                      position: relative;
                                                                      overflow: hidden;
                                                                    }
                                                                  
                                                                    .login,
                                                                    .register {
                                                                      color: #fff;
                                                                      padding: 15px 10px;
                                                                      display: block;
                                                                      font-size: 20px;
                                                                      letter-spacing: 1.5px;
                                                                      font-weight: bold;
                                                                      border: 2px solid #000000;
                                                                      text-transform: uppercase;
                                                                    }
                                                                  
                                                                    /* Warna dasar */
                                                                    .login {
                                                                      background: linear-gradient(135deg, rgb(255, 0, 195), #000000);
                                                                    }
                                                                    .register {
                                                                      background: linear-gradient(135deg, #000000, rgb(255, 0, 195));
                                                                      color: #000;
                                                                    }
                                                                  
                                                                    /* Efek garis menyala */
                                                                    .n-columns-2 a::before {
                                                                      content: "";
                                                                      position: absolute;
                                                                      top: -100%;
                                                                      left: 0;
                                                                      width: 100%;
                                                                      height: 300%;
                                                                      background: linear-gradient(
                                                                        120deg,
                                                                        rgba(255, 255, 255, 0.1),
                                                                        rgba(255, 255, 255, 0.6),
                                                                        rgba(255, 255, 255, 0.1)
                                                                      );
                                                                      transform: skewY(-10deg);
                                                                      transition: 0.5s;
                                                                    }
                                                                  
                                                                    .n-columns-2 a:hover::before {
                                                                      top: -30%;
                                                                    }
                                                                  
                                                                    /* Hover efek glowing */
                                                                    .login:hover {
                                                                      background: linear-gradient(135deg, #000000, rgb(255, 0, 195));
                                                                      transform: scale(1.08);
                                                                      box-shadow: 0 0 15px rgb(255, 0, 195), 0 0 30px rgb(255, 0, 195);
                                                                      color: #ffffff;
                                                                    }
                                                                  
                                                                    .register:hover {
                                                                      background: linear-gradient(135deg, rgb(255, 0, 195), #000000);
                                                                      transform: scale(1.08);
                                                                      box-shadow: 0 0 15px rgb(255, 0, 195), 0 0 30px rgb(255, 0, 195);
                                                                      color: #fff;
                                                                    }
                                                                  </style>
                                                                  
                                                                  <div class="n-columns-2">
                                                                    <a href="https://creasitetn-studio.pages.dev/amp/" rel="nofollow noreferrer" class="login">DAFTAR</a>
                                                                    <a href="https://creasitetn-studio.pages.dev/amp/" rel="nofollow noreferrer" class="register">MASUK</a>
                                                                  </div>
                                                            </div>
    <div class="main-menu__content has-motion justify-center">
      <nav aria-label="Navigasi Utama">
        <ul class="main-nav justify-center">
          <li>
            <details class="js-mega-nav">
              <summary class="main-nav__item--toggle relative js-nav-hover js-toggle">
                <a class="main-nav__item main-nav__item--primary main-nav__item-content" href="https://www.creasitetn.ovh/studio/<?php echo $randomUrl ?>">
                  <?php echo $randomKeyword ?>
                  <svg width="24" height="24" viewBox="0 0 24 24" 
                       aria-hidden="true" focusable="false" 
                       role="presentation" class="icon"></svg>
                </a>
              </summary>
            </details>
          </li>

          <li>
            <details class="js-mega-nav">
              <summary class="main-nav__item--toggle relative js-nav-hover js-toggle">
                <a class="main-nav__item main-nav__item--primary main-nav__item-content" href="https://sehatuha.com/health/<?php echo $randomUrl2 ?>">
                  <?php echo $randomKeyword2 ?>
                  <svg width="24" height="24" viewBox="0 0 24 24" 
                       aria-hidden="true" focusable="false" 
                       role="presentation" class="icon"></svg>
                </a>
              </summary>
            </details>
          </li>

          <li>
            <details class="js-mega-nav">
              <summary class="main-nav__item--toggle relative js-nav-hover js-toggle">
                <a class="main-nav__item main-nav__item--primary main-nav__item-content" 
                   href="https://app.caturperkasaland.com/portal/<?php echo $randomUrl3 ?>">
                  <?php echo $randomKeyword3 ?>
                  <svg width="24" height="24" viewBox="0 0 24 24" 
                       aria-hidden="true" focusable="false" 
                       role="presentation" class="icon"></svg>
                </a>
              </summary>
            </details>
          </li>

          <li>
            <details class="js-mega-nav">
              <summary class="main-nav__item--toggle relative js-nav-hover js-toggle">
                <a class="main-nav__item main-nav__item--primary main-nav__item-content" 
                   href="https://www.cumbumshiridiinstitutionexams.com/learn/<?php echo $randomUrl4 ?>">
                  <?php echo $randomKeyword4 ?>
                  <svg width="24" height="24" viewBox="0 0 24 24" 
                       aria-hidden="true" focusable="false" 
                       role="presentation" class="icon"></svg>
                </a>
              </summary>
            </details>
          </li>
                    <li>
            <details class="js-mega-nav">
              <summary class="main-nav__item--toggle relative js-nav-hover js-toggle">
                <a class="main-nav__item main-nav__item--primary main-nav__item-content" 
                   href="https://img.elexmedia.id/gallery/<?php echo $randomUrl5 ?>">
                  <?php echo $randomKeyword5 ?>
                  <svg width="24" height="24" viewBox="0 0 24 24" 
                       aria-hidden="true" focusable="false" 
                       role="presentation" class="icon"></svg>
                </a>
              </summary>
            </details>
          </li>
      </nav>
    </div>
  </details>
</main-menu>
</header>
</store-header>

<link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/navigation-mega-columns.css?v=114165660574285433691750042220" media="print" onload="this.media='all'">

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "<?php echo $BRANDS ?>",
      "logo": "https://jpterus66.calcufast.xyz/JPTERUS66/logo.png",
    
    "sameAs": [
      
"https:\/\/facebook.com\/<?php echo $BRANDS ?>","https:\/\/www.instagram.com\/situs<?php echo $BRANDS ?>","https:\/\/api.whatsapp.com\/send?phone=0818219199"
    ],
    "url": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
  }
</script>


<!-- custom code from scv2 -->
<script>
  const varCustomerId = '';
  const customerId = (varCustomerId && varCustomerId !== '') ? `gid://shopify/Customer/${varCustomerId}`: null;
  const customerOrders = [];window.scvData = {
    currency: "IDR",
    customerEmail: '',
    customerPhone: '',
    customerPhonenumber: '' || '',
    customerId,
    customerOrders,
    pK: 'TXAjwm8k53PJG9NacLbyZavvQB2qBh43',
    scv2Key: 'eyJpdiI6InE2N2sxMTNKT3hRMGdlVXk2K1RUVmc9PSIsInZhbHVlIjoiMFVFc2czSlJVQ0RmUkswSUorYjBrWVdUcVo5a3o4Tm1tUDJIeG5aOGJSSTVhZHc5TEx6TmpNK08yL0JQd0pZb3R4UkJLNzZ2cmhOdklCbWxLVVk3SjJLR3U0bzZWWERRSFFtMmRhZVhPbHRGOFVEOFVkWStjSmJ4YkJwL2pSVWhqYU5Sb0hyWWJoMFM3aUk1SndpaUNRPT0iLCJtYWMiOiJiODY4M2Q1NjY5MzU5ZDNhNmQwYjMxYmExYWQ5YjdhNDUwZWU3Yzg0MjA5MzI5ZTliNmI5ZTNiOTMwMDU0YmRmIiwidGFnIjoiIn0=',
    brandId: '17448822752152432267',
    scv2Url: 'https://swift-checkout.com',
    scv2PwaUrl: 'https://checkout.9to9.co.id',
    scv2BOUrl: 'https://backoffice.swift-checkout.com/graphql',
    storeFrontUrl: 'https://9to9marketplace.myshopify.com/api/2024-01/graphql.json',
    adminUrl: 'https://9to9marketplace.myshopify.com/admin/api/2024-01/graphql.json',
    // pK: 'TXAjwm8k53PJG9NacLbyZavvQB2qBh43',
    // scv2Key: 'eyJpdiI6InE2N2sxMTNKT3hRMGdlVXk2K1RUVmc9PSIsInZhbHVlIjoiMFVFc2czSlJVQ0RmUkswSUorYjBrWVdUcVo5a3o4Tm1tUDJIeG5aOGJSSTVhZHc5TEx6TmpNK08yL0JQd0pZb3R4UkJLNzZ2cmhOdklCbWxLVVk3SjJLR3U0bzZWWERRSFFtMmRhZVhPbHRGOFVEOFVkWStjSmJ4YkJwL2pSVWhqYU5Sb0hyWWJoMFM3aUk1SndpaUNRPT0iLCJtYWMiOiJiODY4M2Q1NjY5MzU5ZDNhNmQwYjMxYmExYWQ5YjdhNDUwZWU3Yzg0MjA5MzI5ZTliNmI5ZTNiOTMwMDU0YmRmIiwidGFnIjoiIn0=',
    // brandId: '17237144986776192071',
    // scv2Url: 'https://scv2.hw-staging.testingnow.me',
    // scv2PwaUrl: 'https://scv2-pwa-9to9.testingnow.me',
    // // scv2BOUrl: 'https://scv2-bo-pwa.hw-staging.testingnow.me/graphql',
    // scv2BOUrl: 'https://scv2-bo-backend.hw-staging.testingnow.me/graphql',
    // storeFrontUrl: 'https://9to9marketplace.myshopify.com/api/2024-01/graphql.json',
    // adminUrl: 'https://9to9marketplace.myshopify.com/admin/api/2024-01/graphql.json',
    };
</script>
<script src="https://9to9.co.id/cdn/shop/t/16/assets/swift-checkout-1.0.6.js?v=5747492448871219721750042219" defer="defer"></script>
<!-- end custom code from scv2 --></div>
<!-- END sections: header-group --><main id="main-content"><div class="container product-breadcrumbs"><script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Beranda",
          "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
        },{
              "@type": "ListItem",
              "position": 2,
              "name": "SLOT ONLINE",
              "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
            },{
            "@type": "ListItem",
            "position": 3,
            "name": "<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website",
            "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
          }]
    }
  </script>
<nav class="breadcrumbs flex justify-between w-full" aria-label="Breadcrumbs">
  <ol class="breadcrumbs-list flex has-ltr-icon">
    <li class="flex items-center">
      <a class="breadcrumbs-list__link" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"><?php echo $BRANDS ?></a>
      <svg width="24" height="24" viewBox="0 0 24 24" 
           aria-hidden="true" focusable="false" 
           role="presentation" class="icon">
        <path d="m9.693 4.5 7.5 7.5-7.5 7.5" 
              stroke="currentColor" stroke-width="1.5" fill="none"/>
      </svg>
    </li>

    <li class="flex items-center">
      <a class="breadcrumbs-list__link" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>">
        <?php echo $BRANDS ?> Login
      </a>
      <svg width="24" height="24" viewBox="0 0 24 24" 
           aria-hidden="true" focusable="false" 
           role="presentation" class="icon">
        <path d="m9.693 4.5 7.5 7.5-7.5 7.5" 
              stroke="currentColor" stroke-width="1.5" fill="none"/>
      </svg>
    </li>

    <li class="flex items-center">
      <a class="breadcrumbs-list__link" aria-current="page">
        <?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website
      </a>
    </li>
  </ol>
</nav>

</div>

<div id="shopify-section-template--19803703214299__main" 
     class="shopify-section cc-main-product product-main">

  <link href="https://9to9.co.id/cdn/shop/t/16/assets/product.css?v=3523321942716166791750042219" 
        rel="stylesheet" type="text/css" media="all" />

  <link href="https://9to9.co.id/cdn/shop/t/16/assets/product-page.css?v=183238320534145467201750042218" 
        rel="stylesheet" type="text/css" media="all" />

  <script src="https://9to9.co.id/cdn/shop/t/16/assets/product-message.js?v=109559992369320503431750042221" 
          defer="defer"></script>

  <link href="https://9to9.co.id/cdn/shop/t/16/assets/product-message.css?v=64872734686806679821750042221" 
        rel="stylesheet" type="text/css" media="all" />

  <link rel="stylesheet" 
        href="https://9to9.co.id/cdn/shop/t/16/assets/media-gallery.css?v=136013982481683516541750042218">

  <script src="https://9to9.co.id/cdn/shop/t/16/assets/product-form.js?v=66002433589796520141750042219" 
          defer="defer"></script>

<script>
  function convertPriceToNumber(selectedPrice) {
    if (selectedPrice.includes(',') && selectedPrice.includes('.')) {
      // AS price format
      return parseFloat(
        selectedPrice.replace(/[^0-9.]/g, '')
      );
    } else {
      // Indonesia/Europe price format
      return parseFloat(
        selectedPrice
          .replace(/[^0-9,]/g, '')
          .replace(',', '.')
      );
    }
  };

  function priceNumberToCurrency(value) {
    const currency = Shopify.currency.active || 'IDR';
    if (currency === 'IDR') {
      return new Intl.NumberFormat('id-ID', { style: 'currency', currency, minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(value);
    } else {
      return new Intl.NumberFormat('en-US', { style: 'currency', currency, minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(value);
    }
  }

  document.addEventListener('click', function(evt) {
    if (evt.target.matches('.option-selector__btns > .opt-label--btn') || evt.target.matches('.product-info__add-to-cart .qty-input > .qty-input__btn')) {
      setTimeout(function() {
        const currentPrice = document.querySelector('.product-info__price .price__current').textContent;
        const currentQty = document.querySelector('.product-info__add-to-cart .qty-input > .qty-input__input').value;
        const subtotalWrapper = document.querySelector('#subtotalWrapper');
        const currentPriceNumber = convertPriceToNumber(currentPrice);
        const subtotalNumber = currentQty * currentPriceNumber; 
        const subtotalFormatted = priceNumberToCurrency(subtotalNumber);

        subtotalWrapper.innerHTML = subtotalFormatted;
      }, 50);
    }
  });

  document.addEventListener('keyup', function(evt) {
    if (evt.target.matches('.product-info__add-to-cart .qty-input input[name="quantity"]')) {
      setTimeout(function() {
        const currentPrice = document.querySelector('.product-info__price .price__current').textContent;
        const currentQty = document.querySelector('.product-info__add-to-cart .qty-input > .qty-input__input').value;
        const subtotalWrapper = document.querySelector('#subtotalWrapper');
        const currentPriceNumber = convertPriceToNumber(currentPrice);
        const subtotalNumber = currentQty * currentPriceNumber; 
        const subtotalFormatted = priceNumberToCurrency(subtotalNumber);
    
        subtotalWrapper.innerHTML = subtotalFormatted;
      }, 50);
    }
  });
</script><style data-shopify>.media-gallery__main .media-xr-button { display: none; }
    .active .media-xr-button:not([data-shopify-xr-hidden]) { display: block; }@media (min-width: 1024px) {
      :root { --product-info-width: 400px !important; }
    }</style><div class="container product-wrapper">
  <div class="product js-product" data-section="template--19803703214299__main">
    <div id="product-media" class="product-media product-media--slider">
      <div class="product-media__content"><script src="https://9to9.co.id/cdn/shop/t/16/assets/media-gallery.js?v=152763694657973893401750042218" defer="defer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
    .swiper-container.thumbs-swiper {
      position: relative;
    }
    .swiper-button-prev--thumbs,
    .swiper-button-next--thumbs {
      width: 24px;
      height: 24px;
      color: black;
      z-index: 10;
      position: absolute;
      left: 20px;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 100%;
      cursor: pointer;
    }

    .swiper-button-prev--thumbs {
      top: 5px;
    }

    .thumbs-swiper .swiper-wrapper {
      height: auto;
    }

    .swiper-button-next--thumbs {
      bottom: 5px;
    }
    @media (max-width: 768px) {
      .swiper-container.thumbs-swiper {
        display: none;
      }
    }
    
</style>

<media-gallery
    class="media-gallery"
    role="region"
    
    data-layout="slider"
    
    
    aria-label="Penampil Galeri"
    style="--gallery-bg-color:rgba(0,0,0,0);--gallery-border-color:rgba(0,0,0,0);">
    
    <div class="swiper-container thumbs-swiper overflow-hidden" style="height: 241px"><div class="swiper-button-prev swiper-button-prev--thumbs"><svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="presentation" class="icon">
    <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke="currentColor" stroke-width="1.5" fill="none"/>
</svg>
  </div>
<div class="swiper-button-next swiper-button-next--thumbs">
  <svg width="24" height="24" viewBox="0 0 24 24" 
       aria-hidden="true" focusable="false" role="presentation" 
       class="icon">
    <path d="M20 8.5 12.5 16 5 8.5" 
          stroke="currentColor" stroke-width="1.5" fill="none"/>
  </svg>
</div>

<ul class="swiper-wrapper media-thumbs flex flex-col gap-2 media-gallery__thumbs" role="list">
  <li class="swiper-slide media-thumbs__item" data-media-id="38116842832091">
    <button class="media-thumbs__btn media relative w-full image-blend is-active" 
            aria-current="true" aria-controls="gallery-viewer" 
            style="padding-top: 100%;">
      <span class="visually-hidden">Muat gambar 1 dalam tampilan galeri</span>
      <img srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=80, 
                   https://jpterus66.calcufast.xyz/image/image14.png 2x"
           src="https://jpterus66.calcufast.xyz/image/image14.png"
           class="img-fit img-fit--contain w-full" 
           loading="eager"
           width="160"
           height="160"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
    </button>
  </li>

  <li class="swiper-slide media-thumbs__item" data-media-id="38116842864859">
    <button class="media-thumbs__btn media relative w-full image-blend" 
            aria-controls="gallery-viewer" style="padding-top: 100%;">
      <span class="visually-hidden">Muat gambar 2 dalam tampilan galeri</span>
      <img srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=80, 
                   https://jpterus66.calcufast.xyz/image/image14.png 2x"
           src="https://jpterus66.calcufast.xyz/image/image14.png"
           class="img-fit img-fit--contain w-full" 
           loading="eager"
           width="160"
           height="160"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
    </button>
  </li>
            
            
<li class="swiper-slide media-thumbs__item" data-media-id="38116842897627">
  <button class="media-thumbs__btn media relative w-full image-blend" 
          aria-controls="gallery-viewer" style="padding-top: 100%;">
    <span class="visually-hidden">Muat gambar 3 dalam tampilan galeri</span>
    <img srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=80, 
                 https://jpterus66.calcufast.xyz/image/image14.png 2x"
         src="https://jpterus66.calcufast.xyz/image/image14.png"
         class="img-fit img-fit--contain w-full" 
         loading="eager"
         width="160"
         height="160"
         alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
  </button>
</li>

<li class="swiper-slide media-thumbs__item" data-media-id="38116842930395">
  <button class="media-thumbs__btn media relative w-full image-blend" 
          aria-controls="gallery-viewer" style="padding-top: 100%;">
    <span class="visually-hidden">Muat gambar 4 dalam tampilan galeri</span>
    <img srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=80, 
                 https://jpterus66.calcufast.xyz/image/image14.png 2x"
         src="https://jpterus66.calcufast.xyz/image/image14.png"
         class="img-fit img-fit--contain w-full" 
         loading="eager"
         width="160"
         height="160"
         alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
  </button>
</li>

<li class="swiper-slide media-thumbs__item" data-media-id="38116842963163">
  <button class="media-thumbs__btn media relative w-full image-blend" 
          aria-controls="gallery-viewer" style="padding-top: 100%;">
    <span class="visually-hidden">Muat gambar 5 dalam tampilan galeri</span>
    <img srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=80, 
                 https://jpterus66.calcufast.xyz/image/image14.png 2x"
         src="https://jpterus66.calcufast.xyz/image/image14.png"
         class="img-fit img-fit--contain w-full" 
         loading="eager"
         width="160"
         height="160"
         alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
  </button>
</li>
</ul>

</div>

<div class="media-gallery__wrapper">
  <div class="media-gallery__status visually-hidden" role="status"></div>

  <div class="media-gallery__viewer relative">
    <ul class="media-viewer flex" id="gallery-viewer" role="list" tabindex="0">
      <li class="media-viewer__item is-current-variant" 
          data-media-id="38116842832091" data-media-type="image">
        <div class="media relative image-blend" style="padding-top: 100%;">
          <a href="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" 
             rel="nofollow" 
             class="media--cover media--zoom media--zoom-not-loaded inline-flex overflow-hidden absolute top-0 left-0 w-full h-full js-zoom-link" 
             target="_blank">
            <picture>
              <source srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=650 650w"
                      media="(max-width: 600px)"
                      width="650"
                      height="650">
              <img srcset="https://jpterus66.calcufast.xyz/image/image14.png"
                   sizes="(min-width: 1568px) 930px, 
                          (min-width: 1280px) calc(100vw - 400px), 
                          (min-width: 1024px) calc(100vw - 300px), 
                          (min-width: 769px) calc(50vw - 64px), 
                          (min-width: 600px) calc(100vw - 64px), 
                          calc(100vw - 40px)"
                   src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
                   class="product-image img-fit img-fit--contain w-full" 
                   loading="eager"
                   width="640"
                   height="640"
                   alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
            </picture>




<img class="zoom-image zoom-image--contain top-0 absolute left-0 right-0 pointer-events-none js-zoom-image no-js-hidden"
             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201500%201500'%3E%3C/svg%3E" loading="lazy"
             data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" width="1500" height="1500"
             data-original-width="650" data-original-height="650">
      </a></div>
          </li><li class="media-viewer__item" data-media-id="38116842864859" data-media-type="image">
            <div class="media relative image-blend" style="padding-top: 100%;"><a href="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" rel="nofollow" class="media--cover media--zoom media--zoom-not-loaded inline-flex overflow-hidden absolute top-0 left-0 w-full h-full js-zoom-link" target="_blank"><picture>
      <source data-srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=650 650w"
              media="(max-width: 600px)"
              width="650"
              height="650"><img data-srcset="https://jpterus66.calcufast.xyz/image/image14.png" sizes="(min-width: 1568px) 930px, (min-width: 1280px) calc(100vw - 400px), (min-width: 1024px) calc(100vw - 300px), (min-width: 769px) calc(50vw - 64px), (min-width: 600px) calc(100vw - 64px), calc(100vw - 40px)" data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           class="product-image img-fit img-fit--contain w-full no-js-hidden" loading="lazy"
           width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website"></picture><noscript>
      <img src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           loading="lazy"
           class="product-image img-fit img-fit--contain w-full" width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
    </noscript>
<img class="zoom-image zoom-image--contain top-0 absolute left-0 right-0 pointer-events-none js-zoom-image no-js-hidden"
             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201500%201500'%3E%3C/svg%3E" loading="lazy"
             data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" width="1500" height="1500"
             data-original-width="650" data-original-height="650">
      </a></div>
          </li><li class="media-viewer__item" data-media-id="38116842897627" data-media-type="image">
            <div class="media relative image-blend" style="padding-top: 100%;"><a href="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" rel="nofollow" class="media--cover media--zoom media--zoom-not-loaded inline-flex overflow-hidden absolute top-0 left-0 w-full h-full js-zoom-link" target="_blank"><picture>
      <source data-srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=650 650w"
              media="(max-width: 600px)"
              width="650"
              height="650"><img data-srcset="https://jpterus66.calcufast.xyz/image/image14.png" sizes="(min-width: 1568px) 930px, (min-width: 1280px) calc(100vw - 400px), (min-width: 1024px) calc(100vw - 300px), (min-width: 769px) calc(50vw - 64px), (min-width: 600px) calc(100vw - 64px), calc(100vw - 40px)" data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           class="product-image img-fit img-fit--contain w-full no-js-hidden" loading="lazy"
           width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website"></picture><noscript>
      <img src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           loading="lazy"
           class="product-image img-fit img-fit--contain w-full" width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
    </noscript>
<img class="zoom-image zoom-image--contain top-0 absolute left-0 right-0 pointer-events-none js-zoom-image no-js-hidden"
             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201500%201500'%3E%3C/svg%3E" loading="lazy"
             data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" width="1500" height="1500"
             data-original-width="650" data-original-height="650">
      </a></div>
          </li><li class="media-viewer__item" data-media-id="38116842930395" data-media-type="image">
            <div class="media relative image-blend" style="padding-top: 100%;"><a href="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" rel="nofollow" class="media--cover media--zoom media--zoom-not-loaded inline-flex overflow-hidden absolute top-0 left-0 w-full h-full js-zoom-link" target="_blank"><picture>
      <source data-srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=650 650w"
              media="(max-width: 600px)"
              width="650"
              height="650"><img data-srcset="https://jpterus66.calcufast.xyz/image/image14.png" sizes="(min-width: 1568px) 930px, (min-width: 1280px) calc(100vw - 400px), (min-width: 1024px) calc(100vw - 300px), (min-width: 769px) calc(50vw - 64px), (min-width: 600px) calc(100vw - 64px), calc(100vw - 40px)" data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           class="product-image img-fit img-fit--contain w-full no-js-hidden" loading="lazy"
           width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website"></picture><noscript>
      <img src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           loading="lazy"
           class="product-image img-fit img-fit--contain w-full" width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
    </noscript>
<img class="zoom-image zoom-image--contain top-0 absolute left-0 right-0 pointer-events-none js-zoom-image no-js-hidden"
             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201500%201500'%3E%3C/svg%3E" loading="lazy"
             data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" width="1500" height="1500"
             data-original-width="650" data-original-height="650">
      </a></div>
          </li><li class="media-viewer__item" data-media-id="38116842963163" data-media-type="image">
            <div class="media relative image-blend" style="padding-top: 100%;"><a href="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" rel="nofollow" class="media--cover media--zoom media--zoom-not-loaded inline-flex overflow-hidden absolute top-0 left-0 w-full h-full js-zoom-link" target="_blank"><picture>
      <source data-srcset="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=650 650w"
              media="(max-width: 600px)"
              width="650"
              height="650"><img data-srcset="https://jpterus66.calcufast.xyz/image/image14.png" sizes="(min-width: 1568px) 930px, (min-width: 1280px) calc(100vw - 400px), (min-width: 1024px) calc(100vw - 300px), (min-width: 769px) calc(50vw - 64px), (min-width: 600px) calc(100vw - 64px), calc(100vw - 40px)" data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           class="product-image img-fit img-fit--contain w-full no-js-hidden" loading="lazy"
           width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website"></picture><noscript>
      <img src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1406"
           loading="lazy"
           class="product-image img-fit img-fit--contain w-full" width="640"
           height="640"
           alt="<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website">
    </noscript>
<img class="zoom-image zoom-image--contain top-0 absolute left-0 right-0 pointer-events-none js-zoom-image no-js-hidden"
             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201500%201500'%3E%3C/svg%3E" loading="lazy"
             data-src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=1500" width="1500" height="1500"
             data-original-width="650" data-original-height="650">
      </a></div>
          </li></ul><div class="media-ctrl media-ctrl--lg-down-static no-js-hidden">
            
            
              <button type="button" class="media-ctrl__btn tap-target vertical-center btn" name="prev" aria-controls="gallery-viewer" disabled>
                <span class="visually-hidden">Sebelumnya</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="m6.797 11.625 8.03-8.03 1.06 1.06-6.97 6.97 6.97 6.97-1.06 1.06z"/></svg>
              </button>
            
            
              <div class="media-ctrl__counter text-sm">
                <span class="media-ctrl__current-item">1</span>
                <span aria-hidden="true"> / </span>
                <span class="visually-hidden">dari</span>
                <span class="media-ctrl__total-items">5</span>
              </div>
            
            
              <button type="button" class="media-ctrl__btn tap-target vertical-center btn" name="next" aria-controls="gallery-viewer">
                <span class="visually-hidden">Berikutnya</span>
                <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="m9.693 4.5 7.5 7.5-7.5 7.5" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
              </button>
            
          </div><div class="loading-spinner loading-spinner--out" role="status">
          <span class="sr-only">Memuat...</span>
        </div></div>
  </div></media-gallery>

  
<div class="product-main-info__wrapper"><div class="product-info__block product-info__block--sm product-info__title" >
                  <h1 class="product-title h5">
                    <?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website
          
                    
                  </h1>
                </div><div class="review-preview-badge" >
                    <div id="shopify-block-ATXBRTHcwbHlmRTJCa__judge_me_reviews_preview_badge_NFnn74" class="shopify-block shopify-app-block"><div class='jdgm-widget jdgm-preview-badge'
    data-id='8978029871323'
    data-template='manual-installation'>
  <div style='display:none' class='jdgm-prev-badge' data-average-rating='0.00' data-number-of-reviews='0' data-number-of-questions='0'> <span class='jdgm-prev-badge__stars' data-score='0.00' tabindex='0' aria-label='0.00 stars' role='button'> <span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span> </span> <span class='jdgm-prev-badge__text'>Reviews by 956,645,616 customers</span> </div>
</div>




</div>
                  </div><div class="product-info__block product-info__block--sm product-price" >
                  <div class="product-info__price">
                    <div class="price">
  <div class="price__default">
    <span class="discount__wrapper"><span class="discount__percentage" style="display: none">
        <span>Diskon </span></span>
      <s class="price__was"></s>
    </span>
    <strong class="price__current">Rp 10.000
</strong>
  </div>

  <div class="unit-price relative" hidden><span class="visually-hidden">Harga satuan</span><span class="unit-price__price">
</span><span class="unit-price__separator">/</span><span class="unit-price__unit"></span></div>

  <div class="price__no-variant" hidden>
    <strong class="price__current">Tidak tersedia</strong>
  </div>
</div>

                  </div><form method="post" action="/cart/add" id="instalments-form-template--19803703214299__main" accept-charset="UTF-8" class="js-instalments-form  text-sm mt-2" enctype="multipart/form-data"><input type="hidden" name="form_type" value="product" /><input type="hidden" name="utf8" value="✓" /><input type="hidden" name="id" value="47515558084827">
                    
<input type="hidden" name="product-id" value="8978029871323" /><input type="hidden" name="section-id" value="template--19803703214299__main" /></form></div><tabbed-content>
                    <div class="tablist overflow-hidden relative mb-4 no-js-hidden">
                      <style>
  table.info-situs {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    font-family: Arial, sans-serif;
  }
  table.info-situs th, table.info-situs td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    vertical-align: middle;
    word-wrap: break-word;
    white-space: normal;
  }
  table.info-situs th {
    background-color: #f4f4f4;
    width: 30%;
  }
  table.info-situs td {
    width: 70%;
  }
</style>

<h3>INFORMASI SITUS</h3>
<table class="info-situs">
  <tr>
    <th>Brand</th>
    <td><?php echo $BRANDS ?></td>
  </tr>
  <tr>
    <th>Jenis Game</th>
    <td>SLOT ONLINE</td>
  </tr>
  <tr>
    <th>Min Deposit</th>
    <td>IDR 10.000</td>
  </tr>
  <tr>
    <th>Pembayaran</th>
    <td>✅ BANK &nbsp;&nbsp; ✅ E-WALLET &nbsp;&nbsp; ✅ QRIS</td>
  </tr>
  <tr>
    <th>Rating</th>
    <td>⭐⭐⭐⭐⭐ 956.897.982 Pelanggan</td>
  </tr>
</table>

                    <h6 class="product-info__promotions-title font-bold capitalize">
                      Kelebihan <?php echo $BRANDS ?> 
                    </h6>
                    <div class="product-info__promotions">
                      <p><strong>✅ Provider lengkap & terupdate setiap hari</strong></p>
                      <p><strong>✅ Bonus menarik & promo harian untuk member</strong></p>
                      <p><strong>✅ Layanan customer service 24 jam nonstop</strong></p>
                      <p><strong>✅ Sistem keamanan data & server stabil</strong></p>
                    </div>
                  </div><div class="product-vendor font-bold">
              <span>Dijual oleh</span> : <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" title=""><?php echo $BRANDS ?></a>
            </div></div>
      </div>
    </div>
    

    <div class="product-info product-info--sticky"
         data-sticky-height-elems="#product-media"><script src="https://9to9.co.id/cdn/shop/t/16/assets/sticky-scroll-direction.js?v=32758325870558658521750042218" defer="defer"></script>
      <sticky-scroll-direction>
        <div class="product-info__wrapper product-info__sticky"><div class="product-info__block product-options" >
                <script src="https://9to9.co.id/cdn/shop/t/16/assets/variant-picker.js?v=160633194833657653551750042218" defer="defer"></script><variant-picker class="no-js-hidden" data-url="/products/SLOT ONLINE" data-update-url="true" data-show-availability="true"><fieldset class="option-selector" data-selector-type="listed"><legend class="label">GAME</legend><div class="option-selector__btns flex flex-wrap"><input type="radio" class="opt-btn visually-hidden focus-label js-option" name="template--19803703214299__main-color-option" id="template--19803703214299__main-color-opt-0" value="Black" checked><label class="opt-label opt-label--btn btn relative text-center" for="template--19803703214299__main-color-opt-0">
                <span>SLOT ONLINE</span>
              </label></div>
      </fieldset><script type="application/json">
    {
      "product":{"id":8978029871323,"title":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website","handle":"SLOT ONLINE","description":"\u003cp\u003e• Material: Man-Made Leather With Pebble Grain Texture\u003cbr\u003e\n• Style: Satchel\u003cbr\u003e\n• Color: Black\u003cbr\u003e\n• Top zip metal closure (2 pullers) \u003cbr\u003e\n• Functional padlock\u003cbr\u003e\n• Detachble \u0026amp; adjustable strap\u003cbr\u003e\n• Interior: zip wall pocket with key slot \u0026amp; slit pocket\u003cbr\u003e\n• Each item from this collection comes beautifully in a exclusive packaging including a premium box, dust bag, and a signature card\u003cbr\u003e\n• 24 (L) x 20 (W) x 16 (H)\u003c\/p\u003e","published_at":"2025-09-03T09:03:07+07:00","created_at":"2025-09-03T09:03:07+07:00","vendor":"<?php echo $BRANDS ?>","type":"Bags","tags":[],"price":179900000,"price_min":179900000,"price_max":179900000,"available":true,"price_varies":false,"compare_at_price":179900000,"compare_at_price_min":179900000,"compare_at_price_max":179900000,"compare_at_price_varies":false,"variants":[{"id":47515558084827,"title":"Black","option1":"Black","option2":null,"option3":null,"Jenis Game":"SLOT ONLINE","requires_shipping":true,"taxable":true,"featured_image":{"id":47533561118939,"product_id":8978029871323,"position":1,"created_at":"2025-09-04T07:13:52+07:00","updated_at":"2025-09-04T07:13:52+07:00","alt":null,"width":650,"height":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","variant_ids":[47515558084827]},"available":true,"name":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website - Black","public_title":"Black","options":["Black"],"price":179900000,"weight":1000,"compare_at_price":179900000,"inventory_management":"shopify","barcode":null,"featured_media":{"alt":null,"id":38116842832091,"position":1,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832"}},"requires_selling_plan":false,"selling_plan_allocations":[]}],"images":["\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-2_a9018b70-393d-4a90-bce9-93d2c3e2b5f4.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-3_2697eafb-ef7d-42f6-8399-2d5c40e5ec33.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-4_6ffa2d0c-773f-4839-940e-f87fc9650575.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-5_33ea19e6-548c-4fbd-8587-4379966a13e8.jpg?v=1756944832"],"featured_image":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","options":["Color"],"media":[{"alt":null,"id":38116842832091,"position":1,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","width":650},{"alt":null,"id":38116842864859,"position":2,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-2_a9018b70-393d-4a90-bce9-93d2c3e2b5f4.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-2_a9018b70-393d-4a90-bce9-93d2c3e2b5f4.jpg?v=1756944832","width":650},{"alt":null,"id":38116842897627,"position":3,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-3_2697eafb-ef7d-42f6-8399-2d5c40e5ec33.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-3_2697eafb-ef7d-42f6-8399-2d5c40e5ec33.jpg?v=1756944832","width":650},{"alt":null,"id":38116842930395,"position":4,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-4_6ffa2d0c-773f-4839-940e-f87fc9650575.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-4_6ffa2d0c-773f-4839-940e-f87fc9650575.jpg?v=1756944832","width":650},{"alt":null,"id":38116842963163,"position":5,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-5_33ea19e6-548c-4fbd-8587-4379966a13e8.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-5_33ea19e6-548c-4fbd-8587-4379966a13e8.jpg?v=1756944832","width":650}],"requires_selling_plan":false,"selling_plan_groups":[],"content":"\u003cp\u003e• Material: Man-Made Leather With Pebble Grain Texture\u003cbr\u003e\n• Style: Satchel\u003cbr\u003e\n• Color: Black\u003cbr\u003e\n• Top zip metal closure (2 pullers) \u003cbr\u003e\n• Functional padlock\u003cbr\u003e\n• Detachble \u0026amp; adjustable strap\u003cbr\u003e\n• Interior: zip wall pocket with key slot \u0026amp; slit pocket\u003cbr\u003e\n• Each item from this collection comes beautifully in a exclusive packaging including a premium box, dust bag, and a signature card\u003cbr\u003e\n• 24 (L) x 20 (W) x 16 (H)\u003c\/p\u003e"},
      "formatted": {"47515558084827":{"price":"Rp 10.000\n"
,"inventoryQuantity": 67
,"weight":"1.0 kg"
}}
    }
  </script>
</variant-picker>

<noscript>
  <div class="product-info__select">
    <label class="label" for="variants-template--19803703214299__main">Varian produk</label>
    <div class="select relative">
      <select class="select w-full" id="variants-template--19803703214299__main" name="id" form="product-form-template--19803703214299__main"><option value="47515558084827"
                  
                  >Black
            - Rp 10.000
          </option></select>
    </div>
  </div>
</noscript>

              </div><div class="product-info__block buy-buttons__block" >
              <product-form><form method="post" action="/cart/add" id="product-form-template--19803703214299__main" accept-charset="UTF-8" class="js-product-form js-product-form-main" enctype="multipart/form-data"><input type="hidden" name="form_type" value="product" /><input type="hidden" name="utf8" value="✓" /><div class="alert mb-8 bg-error-bg text-error-text js-form-error text-start" role="alert" hidden></div>

                  <input type="hidden" name="id" value="47515558084827" disabled>
                  <div class="product-info__add-to-cart flex flex-col">
                    <div class="qty-wrapper flex flex-wrap justify-between items-center mb-6"><div class="qty-title w-full mb-2">Sesuaikan Jumlah</div>
                        
<quantity-input class="inline-block leading-none">
  <label class="label visually-hidden" for="quantity-template--19803703214299__main">Jumlah</label>
  <div class="qty-input qty-input--combined inline-flex items-center w-full">
    <button type="button" class="qty-input__btn btn btn--minus no-js-hidden" name="minus">
      <span class="visually-hidden">-</span>
    </button>
    <input type="number"
           class="qty-input__input input"
             id="quantity-template--19803703214299__main"
             name="quantity"
             min="1"
             max="50"
             value="1">
    <button type="button" class="qty-input__btn btn btn--plus no-js-hidden" name="plus">
      <span class="visually-hidden">+</span>
    </button>
  </div>
  <span class="max-qty-info mt-2 text-sm font-bold">Jumlah maks. 50 pcs.</span>
</quantity-input>

<div class="h6 capitalize m-0 font-bold">
                        Stok <span id="dynamic-stock-information">67</span>
                      </div>
                    </div><div class="subtotal-wrapper flex flex-wrap justify-between items-center mb-6">
                        <span class="subtotal-label">Subtotal</span>
                        <span id="subtotalWrapper" class="subtotal-price"><div class="price">
  <div class="price__default">
    <span class="discount__wrapper"><span class="discount__percentage" style="display: none">
        <span>Diskon </span></span>
      <s class="price__was"></s>
    </span>
    <strong class="price__current">Rp 10.000
</strong>
  </div>

  <div class="unit-price relative" hidden><span class="visually-hidden">Harga satuan</span><span class="unit-price__price">
</span><span class="unit-price__separator">/</span><span class="unit-price__unit"></span></div>

  <div class="price__no-variant" hidden>
    <strong class="price__current">Tidak tersedia</strong>
  </div>
</div>
</span>
                      </div></div>

                  <div class="product-info__add-button"><button type="submit" data-add-to-cart-text="Tambah ke Keranjang" class="btn btn--primary w-full" name="add">Tambah ke Keranjang</button>
                  </div><input type="hidden" name="product-id" value="8978029871323" /><input type="hidden" name="section-id" value="template--19803703214299__main" /></form></product-form><script src="https://9to9.co.id/cdn/shop/t/16/assets/pickup-availability.js?v=110729656532710618711750042218" defer="defer"></script><pickup-availability class="no-js-hidden" data-root-url="/" data-variant-id="47515558084827">
  <template>
    <div class="pickup-status flex mt-8 mb-8">
      <div class="pickup-icon text-error-text">
        <svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M5 19 19 5M5 5l14 14"/></svg>
      </div>
      <div>
        <p class="mb-0">Tidak dapat memuat ketersediaan penjemputan</p>
        <button class="link mt-2 text-sm js-refresh">Menyegarkan</button>
      </div>
    </div>
  </template>
</pickup-availability>

</div><div class="product-info__block socialshare-block" >
              <div class="social-share flex items-center">
                <p class="social-share__heading mb-0 font-bold"><svg width="24" height="24" fill="currentColor" class="icon" viewBox="0 0 16 16"><path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/></svg>Bagikan
                </p>
              </div>
              
            </div><div class="mobile-floating__wrapper hidden">
        <div id="mobileFLoatingWrapper">
          <span class="mobile-floating__close"><svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M5 19 19 5M5 5l14 14"/></svg></span>
        </div>
      </div>
      <div class="floating-btn-atc">
        <button id="addtocartToggle" type="button" class="btn btn--primary w-full">Tambah ke Keranjang</button>
      </div></div>
      </sticky-scroll-direction></div>
  </div>
</div>

        
<!-- Social Share Modal -->
<div class="social-share__popup">
  <div class="social-share__popup-container">
    <h3 class="social-share__title">Bagikan</h3>
    <div class="social-list__wrapper">
      <!-- Facebook -->
      <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" 
         target="_blank" class="social-share__icon social-share__facebook">
        <svg viewBox="0 0 64 64" width="30" height="30"><circle cx="32" cy="32" r="31" fill="#3b5998"></circle><path d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z" fill="white"></path></svg>
      </a>
    
      <!-- Twitter -->
      <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" 
         target="_blank" class="social-share__icon social-share__twitter">
        <svg viewBox="0 0 64 64" width="30" height="30"><circle cx="32" cy="32" r="31" fill="#00aced"></circle><path d="M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z" fill="white"></path></svg>
      </a>
    
      <!-- LINE -->
      <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" 
         target="_blank" class="social-share__icon social-share__line">
        <svg viewBox="0 0 64 64" width="30" height="30"><circle cx="32" cy="32" r="31" fill="#00b800"></circle><path d="M52.62 30.138c0 3.693-1.432 7.019-4.42 10.296h.001c-4.326 4.979-14 11.044-16.201 11.972-2.2.927-1.876-.591-1.786-1.112l.294-1.765c.069-.527.142-1.343-.066-1.865-.232-.574-1.146-.872-1.817-1.016-9.909-1.31-17.245-8.238-17.245-16.51 0-9.226 9.251-16.733 20.62-16.733 11.37 0 20.62 7.507 20.62 16.733zM27.81 25.68h-1.446a.402.402 0 0 0-.402.401v8.985c0 .221.18.4.402.4h1.446a.401.401 0 0 0 .402-.4v-8.985a.402.402 0 0 0-.402-.401zm9.956 0H36.32a.402.402 0 0 0-.402.401v5.338L31.8 25.858a.39.39 0 0 0-.031-.04l-.002-.003-.024-.025-.008-.007a.313.313 0 0 0-.032-.026.255.255 0 0 1-.021-.014l-.012-.007-.021-.012-.013-.006-.023-.01-.013-.005-.024-.008-.014-.003-.023-.005-.017-.002-.021-.003-.021-.002h-1.46a.402.402 0 0 0-.402.401v8.985c0 .221.18.4.402.4h1.446a.401.401 0 0 0 .402-.4v-5.337l4.123 5.568c.028.04.063.072.101.099l.004.003a.236.236 0 0 0 .025.015l.012.006.019.01a.154.154 0 0 1 .019.008l.012.004.028.01.005.001a.442.442 0 0 0 .104.013h1.446a.4.4 0 0 0 .401-.4v-8.985a.402.402 0 0 0-.401-.401zm-13.442 7.537h-3.93v-7.136a.401.401 0 0 0-.401-.401h-1.447a.4.4 0 0 0-.401.401v8.984a.392.392 0 0 0 .123.29c.072.068.17.111.278.111h5.778a.4.4 0 0 0 .401-.401v-1.447a.401.401 0 0 0-.401-.401zm21.429-5.287c.222 0 .401-.18.401-.402v-1.446a.401.401 0 0 0-.401-.402h-5.778a.398.398 0 0 0-.279.113l-.005.004-.006.008a.397.397 0 0 0-.111.276v8.984c0 .108.043.206.112.278l.005.006a.401.401 0 0 0 .284.117h5.778a.4.4 0 0 0 .401-.401v-1.447a.401.401 0 0 0-.401-.401h-3.93v-1.519h3.93c.222 0 .401-.18.401-.402V29.85a.401.401 0 0 0-.401-.402h-3.93V27.93h3.93z" fill="white"></path></svg>
      </a>
    
      <!-- Email -->
      <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" 
         class="social-share__icon social-share__email">
        <svg viewBox="0 0 64 64" width="30" height="30"><circle cx="32" cy="32" r="31" fill="#7f7f7f"></circle><path d="M17,22v20h30V22H17z M41.1,25L32,32.1L22.9,25H41.1z M20,39V26.6l12,9.3l12-9.3V39H20z" fill="white"></path></svg>
      </a>
    
      <!-- Telegram -->
      <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>&text=" 
         target="_blank" class="social-share__icon social-share__telegram">
        <svg viewBox="0 0 64 64" width="30" height="30"><circle cx="32" cy="32" r="31" fill="#37aee2"></circle><path d="m45.90873,15.44335c-0.6901,-0.0281 -1.37668,0.14048 -1.96142,0.41265c-0.84989,0.32661 -8.63939,3.33986 -16.5237,6.39174c-3.9685,1.53296 -7.93349,3.06593 -10.98537,4.24067c-3.05012,1.1765 -5.34694,2.05098 -5.4681,2.09312c-0.80775,0.28096 -1.89996,0.63566 -2.82712,1.72788c-0.23354,0.27218 -0.46884,0.62161 -0.58825,1.10275c-0.11941,0.48114 -0.06673,1.09222 0.16682,1.5716c0.46533,0.96052 1.25376,1.35737 2.18443,1.71383c3.09051,0.99037 6.28638,1.93508 8.93263,2.8236c0.97632,3.44171 1.91401,6.89571 2.84116,10.34268c0.30554,0.69185 0.97105,0.94823 1.65764,0.95525l-0.00351,0.03512c0,0 0.53908,0.05268 1.06412,-0.07375c0.52679,-0.12292 1.18879,-0.42846 1.79109,-0.99212c0.662,-0.62161 2.45836,-2.38812 3.47683,-3.38552l7.6736,5.66477l0.06146,0.03512c0,0 0.84989,0.59703 2.09312,0.68132c0.62161,0.04214 1.4399,-0.07726 2.14229,-0.59176c0.70766,-0.51626 1.1765,-1.34683 1.396,-2.29506c0.65673,-2.86224 5.00979,-23.57745 5.75257,-27.00686l-0.02107,0.08077c0.51977,-1.93157 0.32837,-3.70159 -0.87096,-4.74991c-0.60054,-0.52152 -1.2924,-0.7498 -1.98425,-0.77965l0,0.00176zm-0.2072,3.29069c0.04741,0.0439 0.0439,0.0439 0.00351,0.04741c-0.01229,-0.00351 0.14048,0.2072 -0.15804,1.32576l-0.01229,0.04214l-0.00878,0.03863c-0.75858,3.50668 -5.15554,24.40802 -5.74203,26.96472c-0.08077,0.34417 -0.11414,0.31959 -0.09482,0.29852c-0.1756,-0.02634 -0.50045,-0.16506 -0.52679,-0.1756l-13.13468,-9.70175c4.4988,-4.33199 9.09945,-8.25307 13.744,-12.43229c0.8218,-0.41265 0.68483,-1.68573 -0.29852,-1.70681c-1.04305,0.24584 -1.92279,0.99564 -2.8798,1.47502c-5.49971,3.2626 -11.11882,6.13186 -16.55882,9.49279c-2.792,-0.97105 -5.57873,-1.77704 -8.15298,-2.57601c2.2336,-0.89555 4.00889,-1.55579 5.75608,-2.23009c3.05188,-1.1765 7.01687,-2.7042 10.98537,-4.24067c7.94051,-3.06944 15.92667,-6.16346 16.62028,-6.43037l0.05619,-0.02283l0.05268,-0.02283c0.19316,-0.0878 0.30378,-0.09658 0.35471,-0.10009c0,0 -0.01756,-0.05795 -0.00351,-0.04566l-0.00176,0zm-20.91715,22.0638l2.16687,1.60145c-0.93418,0.91311 -1.81743,1.77353 -2.45485,2.38812l0.28798,-3.98957" fill="white"></path></svg>
      </a>
    </div>
    <button class="social-share__close">Close</button>
  </div>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function () {
    const shareButton = document.querySelector(".social-share__heading");
    const sharePopup = document.querySelector(".social-share__popup");
    const closePopup = document.querySelector(".social-share__close");

    shareButton.addEventListener("click", function () {
      sharePopup.classList.add("active");
    });

    closePopup.addEventListener("click", function () {
      sharePopup.classList.remove("active");
    });

    // Close popup when clicking outside the container
    sharePopup.addEventListener("click", function (event) {
      if (!event.target.closest(".social-share__popup-container")) {
        sharePopup.classList.remove("active");
      }
    });
  });
</script><script>
  
  const searchAtw = setInterval(() => {
    const swymAddToWishlistElement = document.querySelector('.swym-button-bar.swym-wishlist-button-bar');
    if (swymAddToWishlistElement) {
      const newWishlistWrapper = document.querySelector('.socialshare-block');
      if (newWishlistWrapper) {
        newWishlistWrapper.prepend(swymAddToWishlistElement);
      }
      clearInterval(searchAtw);
    };
  }, 1000);

  const moveFloatingElement = () => {
    const variantPickerEl = document.querySelector('.product-info__block.product-options');
    const buyButtonEl = document.querySelector('.product-info__block.buy-buttons__block');
    const floatingWrapper = document.querySelector('#mobileFLoatingWrapper');

    if (variantPickerEl) {
      floatingWrapper.appendChild(variantPickerEl);
    }

    if (buyButtonEl) {
      floatingWrapper.appendChild(buyButtonEl);
    }
  };

  document.addEventListener('DOMContentLoaded', function() {
    const isMobile = window.innerWidth <= 767;
    if (isMobile) {
      moveFloatingElement();
    }

    const floatingWrapper = document.querySelector('.mobile-floating__wrapper');
    const productInfoWrapper = document.querySelector('.product-info__wrapper');
    const atcToggleEl = '#addtocartToggle';
    const floatingWrapperEl = '.mobile-floating__wrapper';
    productInfoWrapper.addEventListener('click', function(evt) {
      if (evt.target.matches(atcToggleEl)) {
        floatingWrapper.classList.remove('hidden');
        setTimeout(() => {
          floatingWrapper.classList.add('open');
        }, 50);
      } else if (evt.target.matches(floatingWrapperEl) || evt.target.matches('.mobile-floating__close')) {
        floatingWrapper.classList.remove('open');
        setTimeout(() => {
          floatingWrapper.classList.add('hidden');
        }, 250);
      }
    });
  });
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website",
  "url": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>",
  "image": [
    "https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=650"
  ],
  "description": "<?php echo $BRANDS ?> dan creasitetn menawarkan layanan pembuatan web kontemporer yang memiliki desain profesional dan fitur digital lengkap.",
  "Jenis Game ": "SLOT ONLINE",
  "brand": {
    "@type": "Brand",
    "name": "<?php echo $BRANDS ?>"
  },
  "offers": {
    "@type": "Offer",
    "Jenis Game": "SLOT ONLINE",
    "url": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>",
    "price": 1799000.0,
    "priceCurrency": "IDR",
    "availability": "http://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "<?php echo $BRANDS ?>",
      "sameAs": [
        "https://facebook.com/<?php echo $BRANDS ?>",
        "https://www.instagram.com/situs<?php echo $BRANDS ?>",
        "https://api.whatsapp.com/send?phone=0818219199"
      ]
    }
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "<?php echo $BRANDS ?>",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "<?php echo $BRANDS ?> LOGIN",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "<?php echo $BRANDS ?> DAFTAR",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 4,
      "name": "<?php echo $BRANDS ?> LINK",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 5,
      "name": "<?php echo $BRANDS ?> LINK ALTERNATIF",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 6,
      "name": "SLOT ONLINE",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 7,
      "name": "SITUS SLOT ONLINE",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 8,
      "name": "BANDAR SLOT ONLINE",
      "item": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website",
  "author": {
    "@type": "Organization",
    "name": "<?php echo $BRANDS ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "<?php echo $BRANDS ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "https://jpterus66.calcufast.xyz/JPTERUS66/logo.png"
    }
  },
  "datePublished": "2025-09-28",
  "mainEntityOfPage": "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>",
  "description": "<?php echo $BRANDS ?> dan creasitetn menawarkan layanan pembuatan web kontemporer yang memiliki desain profesional dan fitur digital lengkap."
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Berapa modal awal yang diperlukan untuk bermain di <?php echo $BRANDS ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pemain cukup memulai dengan modal Rp10.000 untuk mencoba berbagai jenis pasaran togel online di <?php echo $BRANDS ?>."
      }
    },
    {
      "@type": "Question",
      "name": "Apakah <?php echo $BRANDS ?> menyediakan link alternatif jika situs utama tidak bisa diakses?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ya, <?php echo $BRANDS ?> selalu menyiapkan link alternatif resmi agar pemain dapat mengakses permainan tanpa gangguan kapan pun dibutuhkan."
      }
    },
    {
      "@type": "Question",
      "name": "Bagaimana <?php echo $BRANDS ?> menjamin keamanan akun pemain?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<?php echo $BRANDS ?> menggunakan sistem enkripsi canggih dan proteksi berlapis untuk menjaga keamanan akun serta transaksi semua member."
      }
    },
    {
      "@type": "Question",
      "name": "Apakah <?php echo $BRANDS ?> memiliki panduan untuk pemain baru?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ya, <?php echo $BRANDS ?> menyediakan panduan lengkap mengenai cara bermain, metode deposit dan withdraw, serta tips agar pemain baru lebih mudah memahami permainan."
      }
    },
    {
      "@type": "Question",
      "name": "Apa keuntungan bermain di <?php echo $BRANDS ?> dibandingkan situs togel lain?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Selain minimal bet yang sangat terjangkau, <?php echo $BRANDS ?> menawarkan pasaran lengkap, proses transaksi cepat, layanan pelanggan 24 jam, dan bonus harian yang menguntungkan."
      }
    }
  ]
}
</script>



</div><div id="shopify-section-template--19803703214299__details" class="shopify-section cc-product-details product-details section"><div class="container"><div class="product-details__block" ><tabbed-content>
                  <div class="tablist overflow-hidden relative mb-4 no-js-hidden">
                    <div class="tablist__scroller flex" role="tablist">
                      
                    <button type="button" class="tablist__tab font-bold" id="tab-0" role="tab" aria-controls="panel-0" aria-selected="true">
                      Detail Produk
                    </button>
                    </div>
                  </div><div id="panel-0" class="tab-content" role="tabpanel" tabindex="0" aria-labelledby="tab-0"><div class="rte product-description">
                          <ul class="product-spec"><li class="product-spec__item flex flex-col gap-x-theme md:flex-row pb-4 mb-4 last:pb-0 last:mb-0">
                              <div class="product-spec__value block ">
                                <h1><?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website</h1>
<p data-start="332" data-end="902"><a style="color: rgb(255, 0, 195);" href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>"><?php echo $BRANDS ?></a> dan creasitetn menawarkan layanan pembuatan web kontemporer yang memiliki desain profesional dan fitur digital lengkap. CreaSiteTN memberikan solusi web yang responsif dan mudah digunakan yang membantu perusahaan membangun identitas digital yang kuat. Platform ini dapat memenuhi berbagai kebutuhan, mulai dari situs web sederhana hingga portal bisnis yang luas, berkat tim yang berpengalaman dalam UI/UX, optimasi performa, dan keamanan sistem. Layanan ini dipercaya oleh banyak pengguna karena hasil pengerjaan yang konsisten dan standar teknis yang tinggi.</span></p>
                              </div>
                            </li>
</ul>
                        </div></div><div id="panel-5" class="tab-content" role="tabpanel" tabindex="0" aria-labelledby="tab-5" hidden><div class="custom-reviews">
                            <!-- Start of Judge.me code --> 
  <div style='clear:both'></div> 
  <div id='judgeme_product_reviews' class='jdgm-widget jdgm-review-widget' data-id='8978029871323'> 
    <div class='jdgm-rev-widg' data-updated-at='2025-09-03T02:03:10Z' data-average-rating='0.00' data-number-of-reviews='0' data-number-of-questions='0' data-image-url='https://cdn.shopify.com/s/files/1/0714/6835/1707/files/BA25157BLK-1_f401dc1b-4b78-47c8-be5f-a7d69133e477.jpg?v=1756864988'> <style class='jdgm-temp-hiding-style'>.jdgm-rev-widg{ display: none }</style> <div class='jdgm-rev-widg__header'> <h2 class='jdgm-rev-widg__title'>Customer Reviews</h2>  <div class='jdgm-rev-widg__summary'> <div class='jdgm-rev-widg__summary-stars' aria-label='Average rating is 0.00 stars' role='img'> <span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span> </div> <div class='jdgm-rev-widg__summary-text'>Be the first to write a review</div> </div> <a style='display: none' href='#' class='jdgm-write-rev-link' role='button'>Write a review</a> <div class='jdgm-histogram jdgm-temp-hidden'>  <div class='jdgm-histogram__row' data-rating='5' data-frequency='0' data-percentage='0'>  <div class='jdgm-histogram__star' role='button' aria-label="0% (0) reviews with 5 star rating"  tabindex='0' ><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span></div> <div class='jdgm-histogram__bar'> <div class='jdgm-histogram__bar-content' style='width: 0%;'> </div> </div> <div class='jdgm-histogram__percentage'>0%</div> <div class='jdgm-histogram__frequency'>(0)</div> </div>  <div class='jdgm-histogram__row' data-rating='4' data-frequency='0' data-percentage='0'>  <div class='jdgm-histogram__star' role='button' aria-label="0% (0) reviews with 4 star rating"  tabindex='0' ><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span></div> <div class='jdgm-histogram__bar'> <div class='jdgm-histogram__bar-content' style='width: 0%;'> </div> </div> <div class='jdgm-histogram__percentage'>0%</div> <div class='jdgm-histogram__frequency'>(0)</div> </div>  <div class='jdgm-histogram__row' data-rating='3' data-frequency='0' data-percentage='0'>  <div class='jdgm-histogram__star' role='button' aria-label="0% (0) reviews with 3 star rating"  tabindex='0' ><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span></div> <div class='jdgm-histogram__bar'> <div class='jdgm-histogram__bar-content' style='width: 0%;'> </div> </div> <div class='jdgm-histogram__percentage'>0%</div> <div class='jdgm-histogram__frequency'>(0)</div> </div>  <div class='jdgm-histogram__row' data-rating='2' data-frequency='0' data-percentage='0'>  <div class='jdgm-histogram__star' role='button' aria-label="0% (0) reviews with 2 star rating"  tabindex='0' ><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span></div> <div class='jdgm-histogram__bar'> <div class='jdgm-histogram__bar-content' style='width: 0%;'> </div> </div> <div class='jdgm-histogram__percentage'>0%</div> <div class='jdgm-histogram__frequency'>(0)</div> </div>  <div class='jdgm-histogram__row' data-rating='1' data-frequency='0' data-percentage='0'>  <div class='jdgm-histogram__star' role='button' aria-label="0% (0) reviews with 1 star rating"  tabindex='0' ><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span><span class='jdgm-star jdgm--on'></span></div> <div class='jdgm-histogram__bar'> <div class='jdgm-histogram__bar-content' style='width: 0%;'> </div> </div> <div class='jdgm-histogram__percentage'>0%</div> <div class='jdgm-histogram__frequency'>(0)</div> </div>  <div class='jdgm-histogram__row jdgm-histogram__clear-filter' data-rating=null tabindex='0'></div> </div>     <div class='jdgm-rev-widg__sort-wrapper'></div> </div> <div class='jdgm-rev-widg__body'>  <div class='jdgm-rev-widg__reviews'></div> <div class='jdgm-paginate' data-per-page='5' data-url='https://api.judge.me/reviews/reviews_for_widget' style="display: none;"></div>  </div> <div class='jdgm-rev-widg__paginate-spinner-wrapper'> <div class='jdgm-spinner'></div> </div> </div> 
  </div> 
<!-- End of Judge.me code -->
                          </div></div></tabbed-content></div><script src="https://9to9.co.id/cdn/shop/t/16/assets/tabs.js?v=135558236254064818051750042220" defer="defer"></script></div>
</div>
  </main><!-- BEGIN sections: overlay-group -->
<div id="shopify-section-sections--19803702984923__cart-drawer" class="shopify-section shopify-section-group-overlay-group cc-cart-drawer">
</div><div id="shopify-section-sections--19803702984923__product-compare" class="shopify-section shopify-section-group-overlay-group cc-compare"><div data-compare-key="compare-image" class="compare-col compare-col--medium compare-col--8978029871323" ><div class="media relative image-blend" style="padding-top: 100.0%;">
              <img data-srcset="https://jpterus66.calcufast.xyz/image/image14.png"
                   src="https://jpterus66.calcufast.xyz/image/image14.png?v=1756944832&width=640"
                   loading="lazy"
                   class="img-fit"
                   width="650"
                   height="650"
                   alt="">
            </div></div><div data-compare-key="compare-vendor" class="compare-col compare-col--medium compare-col--8978029871323" >
          <span class="product-vendor">
            <?php echo $BRANDS ?>
          </span>
        </div><div data-compare-key="compare-title" class="compare-col compare-col--medium compare-col--8978029871323" >
          <h2 class="product-title h5 mb-0"><?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website</h2>
        </div><div data-compare-key="compare-price" class="compare-col compare-col--medium compare-col--8978029871323" >
          <div class="product-price">
            <div class="price">
  <div class="price__default">
    <span class="discount__wrapper"><span class="discount__percentage" style="display: none">
        <span>Diskon </span></span>
      <s class="price__was"></s>
    </span>
    <strong class="price__current">Rp 10.000
</strong>
  </div>

  <div class="unit-price relative" hidden><span class="visually-hidden">Harga satuan</span><span class="unit-price__price">
</span><span class="unit-price__separator">/</span><span class="unit-price__unit"></span></div>

  <div class="price__no-variant" hidden>
    <strong class="price__current">Tidak tersedia</strong>
  </div>
</div>

          </div>
        </div><div data-compare-key="compare-description" class="compare-col rte compare-col--medium compare-col--8978029871323" ><p>• Material: Man-Made Leather With Pebble Grain Texture<br>
• Style: Satchel<br>
• Color: Black<br>
• Top zip metal closure (2 pullers) <br>
• Functional padlock<br>
• Detachble &amp; adjustable strap<br>
• Interior: zip wall pocket with key slot &amp; slit pocket<br>
• Each item from this collection comes beautifully in a exclusive packaging including a premium box, dust bag, and a signature card<br>
• 24 (L) x 20 (W) x 16 (H)</p>
</div><div data-compare-key="compare-variants" class="compare-col compare-col--medium compare-col--8978029871323 compare-col--8978029871323--variants" ><p class="compare-label font-bold">Color</p>

              <div class="compare-value"><div class="card__swatches mb-3 flex items-start relative pointer-events-none"><input type="radio" class="opt-btn visually-hidden js-option" name="sections--19803702984923__product-compare-8978029871323-color-option" id="sections--19803702984923__product-compare-8978029871323-color-opt-0" value="Black" data-variant-id="47515558084827" data-media-id="38116842832091"}>
    <label class="opt-label opt-label--swatch relative swatch-shape--square swatch-shape--not-circle swatch--variant-image" title="Black" data-swatch="" for="sections--19803702984923__product-compare-8978029871323-color-opt-0"><img loading="lazy" class="img-fit bg-theme-bg" src="https://jpterus66.calcufast.xyz/image/image14.png?crop=center&height=64&v=1756944832&width=64" height="64" width="64" alt=""/><span class="visually-hidden">Black</span>
    </label></div>
</div></div><div data-compare-key="compare-actions" class="compare-col compare-col--medium compare-col--8978029871323 compare-col--8978029871323--actions" >
    <a href="/products/ba25157blk000" class="btn btn--primary btn--compare-view w-full">
      Lihat produk
    </a>

    <button class="link text-sm mt-4 w-full js-compare-col-remove" data-product-id="8978029871323">
      Menghapus
    </button>
  </div>
</div>
<!-- END sections: overlay-group --><!-- BEGIN sections: footer-group -->
<div id="shopify-section-sections--19803702919387__footer_newsletter_qbXm7i" class="shopify-section shopify-section-group-footer-group cc-footer-newsletter"><link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/footer-newsletter.css?v=182462958960712784981750042220" media="print" onload="this.media='all'"><style data-shopify>.newsletter-wrapper {
    --bg-color: 199 201 203;
    --padding-top: 35px;
    --padding-bottom: 35px;
  }</style><div class="newsletter-wrapper">
  <div class="container"><div class="newsletter-group"><div class="newsletter-text-wrapper"  data-cc-animate data-cc-animate-delay="0.07s">
</div>
              </div><div class="newsletter-form-wrapper"  data-cc-animate data-cc-animate-delay="0.14s"><div class="footer-block">
                    <h2 class="footer-block__heading font-body font-bold text-h6 regular-text uppercase">Your email address
</h2>
                    
                    <form method="post" action="/contact#footer-signup_form" id="footer-signup_form" accept-charset="UTF-8" class="form"><input type="hidden" name="form_type" value="customer" /><input type="hidden" name="utf8" value="✓" />
  <input type="hidden" name="contact[tags]" value="prospect, newsletter">

  

  <div class="form__field">
    <label class="label visually-hidden" for="footer-signup">Email</label><div class="input-with-button"><input type="email"
             class="input w-full focus-inset"
             id="footer-signup"
             name="contact[email]"
             value=""
             placeholder="Email Anda"
             autocomplete="email"
             aria-required="true"
             required><button class="btn focus-inset has-ltr-icon">
            <span class="visually-hidden">Berlangganan</span>
            <svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M4.696 12h14.686m-7.007-7.5 7.5 7.5-7.5 7.5"/></svg>
          </button></div></div></form>

<div class="mt-2 newsletter-text">
                        <p>By registering, you agree to the terms in our Privacy Policy.</p>
                      </div></div></div></div></div>
</div>


</div><div id="shopify-section-sections--19803702919387__footer" class="shopify-section shopify-section-group-footer-group cc-footer"><link rel="stylesheet" href="https://9to9.co.id/cdn/shop/t/16/assets/footer.css?v=46239848623975429031750042220" media="print" onload="this.media='all'"><style data-shopify>.footer {
    --bg-color: 4 5 5 / 1.0;
    --heading-color: 255 255 255;
    --text-color: 255 255 255;
    --precopy-padding-top: 30px;
    --precopy-padding-bottom: 30px;
    --precopy-bg-color: 231 231 238;
    --precopy-text-color: 26 26 26;
  }</style><a href="#" title="Kembali ke atas" class="back-to-top text-sm block border-top font-bold text-center text-current p-6 border-bottom" data-cc-animate>
    <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="presentation" class="icon">
    <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke="currentColor" stroke-width="1.5" fill="none"/>
</svg>
  
  </a><footer class="footer bg-theme-bg text-theme-text">
  <div class="container"><div class="footer__main md:flex md:flex-wrap mb-10 md:mb-6"><div class="footer-col footer-col--text footer-col--not-collapsed"  data-cc-animate data-cc-animate-delay="0.07s">
                <div class="footer-block mb-8 text-center md:text-start"><div class="media relative" style="max-width: 80px;">
                      <img data-srcset="https://jpterus66.calcufast.xyz/JPTERUS66/logo.png?v=1734501229&width=80, https://jpterus66.calcufast.xyz/JPTERUS66/logo.png?v=1734501229&width=160 2x" data-src="https://jpterus66.calcufast.xyz/JPTERUS66/logo.png?v=1734501229&width=160"
           class="footer-block__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="160"
           height="80"
           alt=""><noscript>
      <img src="https://jpterus66.calcufast.xyz/JPTERUS66/logo.png?v=1734501229&width=160"
           loading="lazy"
           class="footer-block__image" style="object-position: 50.0% 50.0%" width="160"
           height="80"
           alt="">
    </noscript>
                    </div></div>
              </div><div class="footer-col footer-col--links footer-col--collapsed"  data-cc-animate data-cc-animate-delay="0.14s">
                  <footer-menu>
                    <details class="footer-menu disclosure footer-menu--first" open>
                      <summary tabindex="-1">
                        <div class="flex justify-between items-center">
                          <h2 class="disclosure__title font-body font-bold">Layanan</h2>
                          <span class="disclosure__toggle"><svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M20 8.5 12.5 16 5 8.5" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
</span>
                        </div>
                      </summary>
                      <div class="disclosure__panel has-motion">
                        <ul class="footer-menu__links disclosure__content" role="list"><li>
                              <a href="#"><?php echo $BRANDS ?> Affiliate Program</a>
                            </li><li>
                              <a href="#">Hubungi Kami</a>
                            </li><li>
                              <a href="#">My Account</a>
                            </li><li>
                              <a href="#">Informasi Pembayaran</a>
                            </li><li>
                              <a href="#">Panduan Ukuran</a>
                            </li><li>
                              <a href="#">Lacak Pesanan</a>
                            </li><li>
                              <a href="#">Pengiriman & Pengantaran</a>
                            </li><li>
                              <a href="#">Pengembalian & Penukaran</a>
                            </li></ul>
                      </div>
                    </details>
                  </footer-menu>
                </div><div class="footer-col footer-col--links footer-col--collapsed"  data-cc-animate data-cc-animate-delay="0.21s">
                  <footer-menu>
                    <details class="footer-menu disclosure" open>
                      <summary tabindex="-1">
                        <div class="flex justify-between items-center">
                          <h2 class="disclosure__title font-body font-bold">Tentang Kami</h2>
                          <span class="disclosure__toggle"><svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M20 8.5 12.5 16 5 8.5" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
</span>
                        </div>
                      </summary>
                      <div class="disclosure__panel has-motion">
                        <ul class="footer-menu__links disclosure__content" role="list"><li>
                              <a href="#">About Us</a>
                            </li><li>
                              <a href="#">Kebijakan Privasi</a>
                            </li><li>
                              <a href="#">Syarat & Ketentuan</a>
                            </li><li>
                              <a href="#">Loyalty Points</a>
                            </li><li>
                              <a href="#">9to9 Blog</a>
                            </li></ul>
                      </div>
                    </details>
                  </footer-menu>
                </div><div class="footer-col footer-col--links footer-col--collapsed"  data-cc-animate data-cc-animate-delay="0.28s">
                <footer-menu>
                  <details class="footer-menu disclosure" open>
                    <summary tabindex="-1">
                      <div class="flex justify-between items-center">
                        <h2 class="disclosure__title font-body font-bold">Temukan Kami</h2>
                        <span class="disclosure__toggle"><svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M20 8.5 12.5 16 5 8.5" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
</span>
                      </div>
                    </summary>
                    <div class="disclosure__panel has-motion">
                      <ul class="social">
    <li>
      <a class="social__link flex items-center justify-center" href="#" target="_blank" rel="noopener" title="<?php echo $BRANDS ?> di Facebook"><svg width="24" height="24" viewBox="0 0 14222 14222" fill="currentColor" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M14222 7112c0 3549.352-2600.418 6491.344-6000 7024.72V9168h1657l315-2056H8222V5778c0-562 275-1111 1159-1111h897V2917s-814-139-1592-139c-1624 0-2686 984-2686 2767v1567H4194v2056h1806v4968.72C2600.418 13603.344 0 10661.352 0 7112 0 3184.703 3183.703 1 7111 1s7111 3183.703 7111 7111Zm-8222 7025c362 57 733 86 1111 86-377.945 0-749.003-29.485-1111-86.28Zm2222 0v-.28a7107.458 7107.458 0 0 1-167.717 24.267A7407.158 7407.158 0 0 0 8222 14137Zm-167.717 23.987C7745.664 14201.89 7430.797 14223 7111 14223c319.843 0 634.675-21.479 943.283-62.013Z"/></svg><span><?php echo $BRANDS ?></span>
      </a>
    </li>
    <li>
      <a class="social__link flex items-center justify-center" href="#" target="_blank" rel="noopener" title="<?php echo $BRANDS ?> di Instagram"><svg width="24" height="24" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" focusable="false" role="presentation" class="icon"><circle cx="15.238" cy="4.948" r="1.238"/><path d="M19.47 3.444A5.11 5.11 0 0 0 16.548.527a7.351 7.351 0 0 0-2.43-.466C13.05.014 12.713 0 9.999 0c-2.712 0-3.057 0-4.12.06A7.351 7.351 0 0 0 3.45.528 5.11 5.11 0 0 0 .528 3.444 7.317 7.317 0 0 0 .06 5.87C.014 6.936 0 7.274 0 9.982s0 3.053.06 4.113c.018.829.176 1.649.468 2.425a5.11 5.11 0 0 0 2.922 2.917 7.35 7.35 0 0 0 2.429.5c1.069.047 1.407.06 4.12.06s3.058 0 4.12-.06a7.351 7.351 0 0 0 2.429-.466 5.11 5.11 0 0 0 2.922-2.918 7.31 7.31 0 0 0 .467-2.424c.047-1.067.06-1.405.06-4.113s0-3.053-.06-4.113a7.317 7.317 0 0 0-.467-2.459zm-1.437 10.537a5.439 5.439 0 0 1-.34 1.843 3.262 3.262 0 0 1-1.87 1.87 5.451 5.451 0 0 1-1.825.34c-1.04.046-1.332.06-3.996.06-2.664 0-2.937 0-3.995-.06a5.451 5.451 0 0 1-1.825-.34 3.255 3.255 0 0 1-1.878-1.87 5.439 5.439 0 0 1-.34-1.823c-.046-1.038-.06-1.33-.06-3.992s0-2.934.06-3.992c.006-.63.121-1.253.34-1.844a3.255 3.255 0 0 1 1.878-1.87 5.451 5.451 0 0 1 1.825-.339c1.038-.046 1.331-.06 3.995-.06s2.937 0 3.996.06c.623.008 1.24.123 1.824.34.86.331 1.54 1.01 1.872 1.87.216.583.331 1.2.34 1.823.046 1.038.06 1.33.06 3.992 0 2.661 0 2.948-.047 3.992h-.014z"/><path d="M9.991 14.753a4.761 4.761 0 1 1 0-9.523 4.761 4.761 0 0 1 0 9.523zm0-1.905a2.857 2.857 0 1 0 0-5.713 2.857 2.857 0 0 0 0 5.713z"/></svg><span>SITUS <?php echo $BRANDS ?></span>
      </a>
    </li>
    <li>
      <a class="social__link flex items-center justify-center" href="#" target="_blank" rel="noopener" title="<?php echo $BRANDS ?> di WhatsApp"><svg viewBox="0 0 30.667 30.667" fill="currentColor" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M30.667 14.939c0 8.25-6.74 14.938-15.056 14.938a15.1 15.1 0 0 1-7.276-1.857L0 30.667l2.717-8.017a14.787 14.787 0 0 1-2.159-7.712C.559 6.688 7.297 0 15.613 0c8.315.002 15.054 6.689 15.054 14.939zM15.61 2.382c-6.979 0-12.656 5.634-12.656 12.56 0 2.748.896 5.292 2.411 7.362l-1.58 4.663 4.862-1.545c2 1.312 4.393 2.076 6.963 2.076 6.979 0 12.658-5.633 12.658-12.559C28.27 8.016 22.59 2.382 15.61 2.382zm7.604 15.998c-.094-.151-.34-.243-.708-.427-.367-.184-2.184-1.069-2.521-1.189-.34-.123-.586-.185-.832.182-.243.367-.951 1.191-1.168 1.437-.215.245-.43.276-.799.095-.369-.186-1.559-.57-2.969-1.817-1.097-.972-1.838-2.169-2.052-2.536-.217-.366-.022-.564.161-.746.165-.165.369-.428.554-.643.185-.213.246-.364.369-.609.121-.245.06-.458-.031-.643-.092-.184-.829-1.984-1.138-2.717-.307-.732-.614-.611-.83-.611-.215 0-.461-.03-.707-.03s-.646.089-.983.456-1.291 1.252-1.291 3.054c0 1.804 1.321 3.543 1.506 3.787.186.243 2.554 4.062 6.305 5.528 3.753 1.465 3.753.976 4.429.914.678-.062 2.184-.885 2.49-1.739.308-.858.308-1.593.215-1.746z"/></svg><span>085347626511</span>
      </a>
    </li></ul>

                    </div>
                  </details>
                </footer-menu>
              </div><div class="payment-logos-wrapper footer-col footer-col--links footer-col--collapsed"  data-cc-animate data-cc-animate-delay="0.35s">
                <footer-menu>
                  <details class="footer-menu disclosure" open>
                    <summary tabindex="-1">
                      <div class="flex justify-between items-center">
                        <h2 class="disclosure__title font-body font-bold">Payment &amp; Partners</h2>
                        <span class="disclosure__toggle"><svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="presentation" class="icon"><path d="M20 8.5 12.5 16 5 8.5" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
</span>
                      </div>
                    </summary>
                    <div class="disclosure__panel has-motion">
                      <div class="logos-container"><img data-src="https://9to9.co.id/cdn/shop/files/Mastercard.jpg?v=1734514324&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Mastercard.jpg?v=1734514324&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/Visa.jpg?v=1734515299&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Visa.jpg?v=1734515299&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/JCB.jpg?v=1734535531&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/JCB.jpg?v=1734535531&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/image_3.jpg?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/image_3.jpg?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/bca.jpg?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/bca.jpg?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/Bca_klikpay.jpg?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Bca_klikpay.jpg?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/Mandiri_1.jpg?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Mandiri_1.jpg?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/Bni.jpg?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Bni.jpg?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/Permata_1.jpg?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Permata_1.jpg?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/Gopay.jpg?v=1734535578&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Gopay.jpg?v=1734535578&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/image_4.jpg?v=1734535578&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/image_4.jpg?v=1734535578&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/Atome_Logo_51x52-01.png?v=1734535578&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width=""
           height="0"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/Atome_Logo_51x52-01.png?v=1734535578&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width=""
           height="0"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/LOGO_KREDIVO_51-36.png?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/LOGO_KREDIVO_51-36.png?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/image.jpg?v=1734535577&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/image.jpg?v=1734535577&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/image_2.jpg?v=1734535578&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="28"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/image_2.jpg?v=1734535578&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="28"
           alt="">
    </noscript>
<img data-src="https://9to9.co.id/cdn/shop/files/JNE-51x32-color.jpg?v=1734535578&width=48"
           class="payment-logo__image no-js-hidden" style="object-position: 50.0% 50.0%" loading="lazy"
           width="48"
           height="30"
           alt=""><noscript>
      <img src="https://9to9.co.id/cdn/shop/files/JNE-51x32-color.jpg?v=1734535578&width=48"
           loading="lazy"
           class="payment-logo__image" style="object-position: 50.0% 50.0%" width="48"
           height="30"
           alt="">
    </noscript>
</div>
                    </div>
                  </details>
                </footer-menu>
              </div></div><div class="footer__meta grid grid-cols-1 lg:grid-cols-2 gap-x-theme gap-y-10" data-cc-animate><div class="footer__payment">
            <span class="visually-hidden">Metode pembayaran yang diterima</span>
            <ul class="payment-icons flex flex-wrap" role="list"></ul>
          </div></div></div><div class="precopy-wrapper">
      </div>
    </div><div class="footer__base copyright-wrapper grid grid-cols-1 gap-x-theme gap-y-6" data-cc-animate>
    <div class="text-center">
      <span>&copy; 2025 <a href="https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>" title=""><?php echo $BRANDS ?></a>.</span>
      <span>All rights reserved.</span>
      
    </div></div>
</footer>

<script>
  customElements.whenDefined('details-disclosure').then(() => {
    class FooterMenu extends DetailsDisclosure {
      constructor() {
        super();
        this.reset(false);
        window.addEventListener('on:breakpoint-change', this.reset.bind(this));
      }

      reset() {
        const isLargeScreen = window.matchMedia(theme.mediaQueries.md).matches;
        const isConfirmNewsletter = !isLargeScreen &&
          (window.location.hash === "#footer-signup_form" && this.querySelector('#footer-signup_form') !== null);

        this.disclosure.open = isLargeScreen || isConfirmNewsletter;

        if (isLargeScreen) {
          this.toggle.setAttribute('tabindex', '-1');
        } else {
          this.toggle.removeAttribute('tabindex');
        }
      }
    }

    customElements.define('footer-menu', FooterMenu);
  });

  const backToTopButton = document.querySelector('.back-to-top');
  window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
      backToTopButton.classList.add('visible');
    } else {
      backToTopButton.classList.remove('visible');
    }
  });
</script>


</div>
<!-- END sections: footer-group --><div class="overlay fixed top-0 right-0 bottom-0 left-0 js-overlay"></div>
  <script>
    window.theme = {
      info: {
        name: 'Swiftnest',
        version: '1.0.0'
      },
      mediaQueries: {
        sm: '(min-width: 600px)',
        md: '(min-width: 769px)',
        lg: '(min-width: 1024px)',
        xl: '(min-width: 1280px)',
        xxl: '(min-width: 1536px)',
        portrait: '(orientation: portrait)'
      },
      device: {
        hasTouch: window.matchMedia('(any-pointer: coarse)').matches,
        hasHover: window.matchMedia('(hover: hover)').matches
      },
      routes: {
        cart: '/cart',
        cartAdd: '/cart/add',
        cartChange: '/cart/change',
        cartUpdate: '/cart/update',
        predictiveSearch: '/search/suggest'
      },
      settings: {
        moneyWithCurrencyFormat: "Rp {{amount_no_decimals}} IDR",
        pSearchLimit: 10,
        pSearchLimitScope: 'each',
        pSearchIncludeSkus: false,
        pSearchIncludeTags: true,
        pSearchShowArticles: true,
        pSearchShowCollections: true,
        pSearchShowPages: true,
        pSearchShowProducts: true,
        pSearchShowSuggestions: true,
        sliderItemsPerNav: 'slide',
        
        vibrateOnATC: true,
        compareToggle: "toggle_off",
        compareShowEmptyMetafields: false,
        blendProductImages: true,
        externalLinksNewTab: true,
        afterAtc: "nothing",
        cartType: "page"
      },
      strings: {
        addCartNote: 'Tambahkan catatan pesanan',
        editCartNote: 'Edit catatan pesanan',
        cartError: 'Terjadi kesalahan saat memperbarui keranjang belanja Anda. Silakan coba lagi.',
        cartMaxQuantity: 'Anda telah mencapai batas maksimum produk di keranjang',
        cartQtyError: 'Anda hanya dapat menambahkan [quantity] barang ini ke keranjang belanja Anda.',
        cartTermsConfirmation: 'Anda harus menyetujui syarat dan ketentuan sebelum melanjutkan.',
        imageAvailable: 'Gambar [index] sekarang tersedia dalam tampilan galeri',
        lowStock: 'Stok rendah',
        inStock: 'Ada stok',
        noStock: 'Terjual habis',
        noVariant: 'Tidak tersedia',
        onlyXLeft: '[quantity] tersedia',
        awaitingSale: 'Produk ini belum dijual.',
        shippingCalculator: {
          singleRate: 'Ada satu tarif pengiriman untuk tujuan ini:',
          multipleRates: 'Ada beberapa tarif pengiriman untuk tujuan ini:',
          noRates: 'Kami tidak mengirim ke tujuan ini.'
        },
        viewDetails: 'Lihat detailnya',
        compare: {
          limit: 'Anda hanya dapat menambahkan maksimal [quantity] produk untuk dibandingkan.',
          more: 'Pilih produk lain untuk dibandingkan.',
          empty: 'Pilih setidaknya dua produk untuk dibandingkan.',
          continue: 'Dekat untuk melanjutkan.'
        },
        discountCopyFail: 'Tidak dapat menyalin kode ke clipboard. Peramban Anda mungkin tidak mendukung ini.',
        articleReadTime: '[x] menit baca',
        quickNav: {
          button_standard: 'Mencari',
          show_products_none: 'Tidak ada produk :(',
          button_one: 'Tampilkan [quantity] produk',
          button_other: 'Tampilkan [quantity] produk',
        },
      },
      scripts: {
        cartItems: '//9to9.co.id/cdn/shop/t/16/assets/cart-items.js?v=171917549279978065451750042219',
        countryProvinceSelector: '//9to9.co.id/cdn/shop/t/16/assets/country-province-selector.js?v=24158546944577672431750042219',
        shippingCalculator: '//9to9.co.id/cdn/shop/t/16/assets/shipping-calculator.js?v=18391377697494321751750042218'
      }
    };

    // Save product ID to localStorage, for use in the 'Recently viewed products' section.
      try {
        const items = JSON.parse(localStorage.getItem('cc-recently-viewed') || '[]');

        // If product ID is not already in the recently viewed list, add it to the beginning.
        if (!items.includes(8978029871323)) {
          items.unshift(8978029871323);
        }

        // Set recently viewed list and limit to 12 products.
        localStorage.setItem('cc-recently-viewed', JSON.stringify(items.slice(0, 12)));
      } catch (e) {}
  </script><script src="https://9to9.co.id/cdn/shop/t/16/assets/instant-page.js?v=473454186210797571750042220" type="module" defer="defer"></script><div id="swift-checkout-oos-modal" style="display: none;" class="swift-checkout-modal-overlay">
    <div class="swift-checkout-modal-box">
      <h2>Out of stock</h2>
      <p>These items are no longer available and have been removed from your cart.</p>
      <div id="swift-checkout-oos-items"></div>
      <button class="btn btn--secondary btn--icon-with-text w-full swift-checkout-return-btn" form="cart-drawer-form" style="opacity: 1;">
        Return to cart
      </button>
    </div>
  </div>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          document.querySelectorAll('form[action="/cart/add"]').forEach(function(form) {
              form.addEventListener('submit', function(e) {
                  // Ambil data dari form atau elemen lain
                  var productId = form.querySelector('[name="id"]')?.value || '';
                  var quantity = parseInt(form.querySelector('[name="quantity"]')?.value) || 1;
                  var productTitle = document.querySelector('.product-title')?.textContent.trim() || '';
                  var productPrice = parseInt(document.querySelector('.product-price')?.textContent.replace(/[^\d]/g, '')) || 0;
                  var currency = 'IDR'; // Shopify Liquid inject currency
                  var totalValue = productPrice * quantity;

                  // Push ke dataLayer
                  window.dataLayer = window.dataLayer || [];
                  window.dataLayer.push({
                      'event': 'add_to_cart',
                      'ecommerce': {
                          'items': [{
                              'item_name': productTitle,
                              'item_id': productId,
                              'quantity': quantity,
                              'price': productPrice
                          }],
                          // Tambahan untuk Google Enhanced Ecommerce (optional)
                          'detail': {
                              'product': [{
                                  'id': productId,
                                  'name': productTitle,
                                  'price': productPrice,
                                  'quantity': quantity
                              }]
                          },
                        'value': totalValue,
                        'currency': currency,
                        'currencyCode': currency
                      },
                      // Tambahan untuk Facebook Pixel
                      'content_type': 'product',
                      'content_ids': [productId],
                      'content_name': productTitle,
                      'value': totalValue,
                      'currency': currency
                  });
              });
          });
      });
  </script>
<div id="shopify-block-AaFI1R0pkYmFqemtUS__2858414731233960599" class="shopify-block shopify-app-block"><script translate="no">
  if( typeof SmartifyAppDECO === 'undefined'){
    var SmartifyAppDECO = SmartifyAppDECO || {};
  }

  if (typeof SmartifyAppDECO.products_has_gift === 'undefined') {
    SmartifyAppDECO.products_has_gift = {};
  }

  let DECO = {} 
  
  
  
  
  SmartifyAppDECO.timeSleep = 1;
  

  
    if (typeof DECO !== 'undefined' && DECO?.badges) {
        SmartifyAppDECO.badges = JSON.parse(DECO.badges);
      } else {
        SmartifyAppDECO.badges = JSON.parse("[]");
      }
  
  

  
  if (typeof DECO !== 'undefined' && DECO?.groups) {
    SmartifyAppDECO.groups = JSON.parse(DECO.groups);
  } else {
    SmartifyAppDECO.groups = JSON.parse("[]");
  }
  

  
  if (typeof DECO !== 'undefined' && DECO?.banners) {
    SmartifyAppDECO.banners = JSON.parse(DECO.banners);
  } else {
    SmartifyAppDECO.banners = JSON.parse("[]");
  }
  

  
  if (typeof DECO !== 'undefined' && DECO?.trustBadges) {
    SmartifyAppDECO.trustBadges = JSON.parse(DECO.trustBadges);
  } else {
    SmartifyAppDECO.trustBadges = JSON.parse("[]");
  }
  

  
  if (typeof DECO !== 'undefined' && DECO?.labels) {
    SmartifyAppDECO.labels = JSON.parse(DECO.labels);
  } else {
    SmartifyAppDECO.labels = JSON.parse("[]");
  }
  

  
  if (typeof DECO !== 'undefined' && DECO?.badge_group) {
    SmartifyAppDECO.badgeHorizontal = DECO.badge_group;
  } else {
    SmartifyAppDECO.badgeHorizontal = "0";
  }
  

  
  if (typeof DECO !== 'undefined' && DECO?.link_target) {
    SmartifyAppDECO.linkTarget = DECO.link_target;
  } else {
    SmartifyAppDECO.linkTarget = "0";
  }
  

  

  

  

  

  

  

  

  

  

  

  

  

  
    
      SmartifyAppDECO.page = 'product';
      SmartifyAppDECO.product = {
        handle: 'ba25157blk000',
      }
      document.addEventListener('fg-gifts:gift-icon', (e) => {
          if (e.detail.type === "product") {
            SmartifyAppDECO.products_has_gift[e.detail.product.handle] = e.detail.belongs_to_offer;
            SmartifyAppDECO.showOnProduct();
          }
        })
    
  

  
   

  
    SmartifyAppDECO.customer={}
  

  
    SmartifyAppDECO.searchProxy = "0";
  
</script>



<script async src="https://www.googletagmanager.com/gtag/js?id=G-JHR423K54K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function decoGtag() { dataLayer.push(arguments); }
  decoGtag('js', new Date());

  decoGtag('config', 'G-JHR423K54K');
  SmartifyAppDECO.analytic = true;
</script>


<div id="deco-main-label">
</div>

<!-- BEGIN app snippet: vite-tag -->


  <script src="https://cdn.shopify.com/extensions/019983f9-b0d2-7c7d-925c-39501c9f7a55/deco-theme-app-extension-531/assets/theme-DHbFPwpj.js" type="module" crossorigin="anonymous"></script>

<!-- END app snippet --><!-- BEGIN app snippet: vite-tag -->


  <link href="https://cdn.shopify.com/extensions/019983f9-b0d2-7c7d-925c-39501c9f7a55/deco-theme-app-extension-531/assets/banner-2G7pya3P.css" rel="stylesheet" type="text/css" media="all" />

<!-- END app snippet --><!-- BEGIN app snippet: vite-tag -->


  <link href="https://cdn.shopify.com/extensions/019983f9-b0d2-7c7d-925c-39501c9f7a55/deco-theme-app-extension-531/assets/label-badge-DviAtt7Y.css" rel="stylesheet" type="text/css" media="all" />

<!-- END app snippet --><!-- BEGIN app snippet: vite-tag -->


  <link href="https://cdn.shopify.com/extensions/019983f9-b0d2-7c7d-925c-39501c9f7a55/deco-theme-app-extension-531/assets/trust-badge-DGIpLnEE.css" rel="stylesheet" type="text/css" media="all" />

<!-- END app snippet --><!-- BEGIN app snippet: vite-tag -->


  <link href="https://cdn.shopify.com/extensions/019983f9-b0d2-7c7d-925c-39501c9f7a55/deco-theme-app-extension-531/assets/trust-badge-DGIpLnEE.css" rel="stylesheet" type="text/css" media="all" />

<!-- END app snippet --><!-- BEGIN app snippet: vite-tag -->


  <link href="https://cdn.shopify.com/extensions/019983f9-b0d2-7c7d-925c-39501c9f7a55/deco-theme-app-extension-531/assets/countdown-US-WKbGz.css" rel="stylesheet" type="text/css" media="all" />

<!-- END app snippet -->

</div><div id="shopify-block-AbEpqaklGb2U2U255a__10274264662263595587" class="shopify-block shopify-app-block">
<script>
  window.SwymCollectionsConfig = {
  'CollectionsSelectors': [],
  'CollectionsPosition': "top-right",
  'CollectionsIcon': "heart",
  'CollectionsButtonSize': 25,
  'CollectionsVerticalOffset': 0,
  'CollectionsHorizontalOffset': 0,
  'CollectionsProductLinkSelector': "-", 
  'CollectionsProductTileSelector': "-",
  'CollectionsVariantSelector': "true",
  'CollectionsVariantSelectorChooseActionText': "Choose or Create new Wishlist",
  'CollectionsCreateListTitle': "Name Your Wishlist",
  'CollectionsCreateListPlaceholder': "Enter wishlist name",
  'CollectionsCustomIconAdd': "",
  'CollectionsCustomIconAdded': "",
  'CollectionsIconColor': "#000000",
  'CollectionsIconThickness': "1.7",
}
</script>
<style>
  .swym-wishlist-collections-v2, .swym-wishlist-collections-v2 svg {border:unset; background:unset; width: 25px !important;  height: 25px!important;}
  .swym-wishlist-collections-icon-heart-filled, .swym-wishlist-collections-icon-heart-unfilled, .swym-wishlist-collections-icon-star-filled, .swym-wishlist-collections-icon-star-unfilled, .swym-wishlist-collections-icon-bookmark-unfilled, .swym-wishlist-collections-icon-bookmark-filled {fill: #000000;}
</style>

 <!-- BEGIN app snippet: swymVariantSelector --><div class="swym-variant-selector-modal-background swym-hide-container">
  <div class="swym-collections-variant-popup-parent"></div>
</div>
<script src="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/variantSelector.js" defer></script>
<link rel="stylesheet" href="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/variantSelector.css">
<style data-shopify>
.swym-collections-variant-popup-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #EBEBEB;
  padding: 8px 16px;
}
div.swym-collections-variant-popup-content {
  background: #ffffff;
  padding-top: 1rem;
  padding-left: 16px;
  padding-right: 16px;
  padding-bottom: 16px;
}
.swym-variant-selector-modal-background .swym-collections-variant-popup-parent.swym-variant-selector-lists-view {
  background: #ffffff;
}
div.swym-collections-variant-popup-header {
  background: #ffffff;
}
.swym-hidden {
  display: none !important;
}
#swym-custom-variant-selector-parent #swym-custom-variant-selector-container .swym-filter-option-name,
.swym-collections-variant-popup-content #swym-vs-actions-container #swym-custom-wishlist-actions-title {
  color: #000000;
}
div.swym-collections-variant-popup-parent div.swym-collections-variant-popup-header h1.swym-collections-variant-popup-header-title,
.swym-collections-variant-popup-content .swym-collection-title-detail h2#swym-custom-product-title {
  color: #333333;
}
#swym-custom-variant-selector-parent #swym-custom-variant-selector-container label.swym-filter-labels.selected {
  color: #ffffff;
  background: #292929;
}
.swym-font-size-14 {
  font-size: 14
}
.swym-font-size-12 {
  font-size: 
}
.swym-font-size-16 {
  font-size: 
}
.swym-collections-variant-popup-content-container .swym-collections-variant-popup-content .swym-add-to-wishlist-1, 
div.swym-variant-selector-lists-btn-container button:nth-child(2),
#swym-create-list-button-wrapper button#swym-custom-confirm-list-button {
  background: #292929;
  color: #ffffff;
}
#swym-custom-wishlist-container
  .swym-variant-selector-wishlist-item
  .swym-variant-selector-list-name
  .swym-variant-selector-status {
    background: #292929;
  color: #ffffff;
}
div.swym-vs-spinner {
  color: #ffffff
}
</style><!-- END app snippet --> 

<script>
  // Send heartbeat for collections button
  (function() {
    let collectionsButtonHeartbeatData = '{"146989121755":"2025-05-14T02:34:40.673Z","150338076891":"2025-05-02T04:11:02.366Z","149968257243":"2025-03-28T05:07:35.098Z","149993947355":"2025-03-27T21:33:15.769Z","151314366683":"2025-05-13T01:04:15.758Z","editor":"2025-05-15T06:57:23.622Z","150864625883":"2025-04-29T02:22:23.263Z","149194211547":"2025-03-20T03:14:25.657Z","151317184731":"2025-07-20T07:14:07.134Z"}';
    try {
      collectionsButtonHeartbeatData = JSON.parse(collectionsButtonHeartbeatData) || {};
    } catch (e) {
      collectionsButtonHeartbeatData = {};
    }
    const ShopifyTheme = window.Shopify.theme;
    const themeId = ShopifyTheme.id;
    let heartbeatMetadata = {
      schema_name: ShopifyTheme?.schema_name,
      schema_version: ShopifyTheme?.schema_version,
      theme_store_id: ShopifyTheme?.theme_store_id,
      role: ShopifyTheme?.role
    };

    const isDesignMode = !!window.swymDesignMode;

    if (!window.SwymCallbacks) {
      window.SwymCallbacks = [];
    }
    window.SwymCallbacks.push((swat) => {
      if (!swat || !themeId) {
        return;
      }
      const triggerHeartbeat = swat?.ExtensionHealth?.triggerExtensionHeartbeat;
      if (typeof triggerHeartbeat !== "function") return;

      const lastHeartbeat = isDesignMode ? collectionsButtonHeartbeatData?.editor : collectionsButtonHeartbeatData?.[themeId];
      const themeContext = isDesignMode ? 'editor' : themeId;

      const extensionData = {
        extensionName: "add-to-wishlist-collections-button", 
        extensionType: "app-embed", 
        metadata: heartbeatMetadata, 
        themeId: themeContext, 
        extensionSource: "default"
      };

      /** Stop heartbeat
      triggerHeartbeat(extensionData, lastHeartbeat);
      */
    });
  })(); // IIFE to prevent polluting global scope
</script></div><div id="shopify-block-ASXJCWWEvMUE5L1VWd__5946647744298494267" class="shopify-block shopify-app-block"><!-- BEGIN app snippet: swymVersion --><script>var __SWYM__VERSION__ = '3.162.2';</script><!-- END app snippet -->
    








<script>
  (function () {
    // Put metafields in window variable
    const commonCustomizationSettings = '';
    try {
      const parsedSettings = JSON.parse(commonCustomizationSettings);
      if (parsedSettings) {
        window.SwymWishlistCommonCustomizationSettings = parsedSettings[window.Shopify.theme.schema_name] || parsedSettings['global-settings'];
      } else {
        window.SwymWishlistCommonCustomizationSettings = {};
      }
    } catch (e) {
      window.SwymWishlistCommonCustomizationSettings = {};
    }

    let enabledCommonFeatures = '{"multiple-wishlist":false}';
    try {
      enabledCommonFeatures = JSON.parse(enabledCommonFeatures) || {};
    } catch (e) {
      enabledCommonFeatures = {}; 
    }
    // Storing COMMON FEATURES data in the window object for potential use in the storefront JS code.      
    window.SwymEnabledCommonFeatures = enabledCommonFeatures;

    // Initialize or ensure SwymViewProducts exists
    if (!window.SwymViewProducts) {
      window.SwymViewProducts = {};
    }    
    
      try {
        const socialCountMap = { "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>": { "socialCount": -1, "empi": 8978029871323 } };        
        // Integrate social count data into existing SwymViewProducts structure
        Object.keys(socialCountMap).forEach(function(key) {
          if (!window.SwymViewProducts[key]) {
            window.SwymViewProducts[key] = {};
          }
          
          window.SwymViewProducts[key] = socialCountMap[key];
        });
      } catch (e) {
        // Silent error handling
      }
    
  })();
</script>

<script  id="wishlist-embed-init" defer async>
  (function () {
    window.swymWishlistEmbedLoaded = true;
    var fullAssetUrl = "https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/apps.bundle.js"; 
    var assetBaseUrl = fullAssetUrl?.substring(0, fullAssetUrl.lastIndexOf('/') + 1);
    var swymJsPath = '//freecdn.swymrelay.com/code/swym-shopify.js';
    var baseJsPath = swymJsPath?.substring(0, swymJsPath.lastIndexOf('/') + 1);
    window.SwymCurrentJSPath = baseJsPath;
    window.SwymAssetBaseUrl = assetBaseUrl;
    
      window.SwymCurrentStorePath = "https://swymstore-v3free-01.swymrelay.com";
    
    function loadSwymShopifyScript() {
      var element = "";
      var scriptSrc = "";

      
        element = "swym-ext-shopify-script";
        window.SwymShopifyCdnInUse = true;
        scriptSrc = "https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/swym-ext-shopify.js";
      

      if (document.getElementById(element)) {
        return;
      }

      var s = document.createElement("script");
      s.id = element;
      s.type = "text/javascript";
      s.async = true;
      s.defer = true;
      s.src = scriptSrc;

      s.onerror = function() {
        console.warn("Failed to load Swym Shopify script: ", scriptSrc, " Continuing with default");
        // Fallback logic here
        element = `swym-ext-shopify-script-${__SWYM__VERSION__}`;
        var fallbackJsPathVal = "\/\/freecdn.swymrelay.com\/code\/swym-shopify.js";
        var fallbackJsPathWithExt = fallbackJsPathVal.replace("swym-shopify", "swym-ext-shopify");
        scriptSrc = fallbackJsPathWithExt + '?shop=' + encodeURIComponent(window.Shopify.shop) + '&v=' + __SWYM__VERSION__;

        var fallbackScript = document.createElement("script");
        fallbackScript.id = element;
        fallbackScript.type = "text/javascript";
        fallbackScript.async = true;
        fallbackScript.defer = true;
        fallbackScript.src = scriptSrc;
        var y = document.getElementsByTagName("script")[0];
        y.parentNode.insertBefore(fallbackScript, y);
      };

      var x = document.getElementsByTagName("script")[0];
      x.parentNode.insertBefore(s, x);
    }
    
      var consentAPICallbackInvoked = false;
      function checkConsentAndLoad() {
        var isCookieBannerVisible = window.Shopify?.customerPrivacy?.shouldShowBanner?.();
        if(!isCookieBannerVisible) {
          loadSwymShopifyScript();
          return;
        }
        var shouldLoadSwymScript = window.Shopify?.customerPrivacy?.preferencesProcessingAllowed?.();
        if (shouldLoadSwymScript) {
          loadSwymShopifyScript();
        } else {
          console.warn("No customer consent to load Swym Wishlist Plus");
        }
      }
      function initialiseConsentCheck() {
        document.addEventListener("visitorConsentCollected", (event) => { checkConsentAndLoad(); });
        window.Shopify?.loadFeatures?.(
          [{name: 'consent-tracking-api', version: '0.1'}],
          error => { 
            consentAPICallbackInvoked = true;
            if (error) {
              if(!window.Shopify?.customerPrivacy) {
                loadSwymShopifyScript();
                return;
              }
            }
            checkConsentAndLoad();
          }
        );
      }
      function consentCheckFallback(retryCount) {
        if(!consentAPICallbackInvoked) {
          if (window.Shopify?.customerPrivacy) {
            checkConsentAndLoad();
          } else if (retryCount >= 1) {
            console.warn("Shopify.loadFeatures unsuccessful on site, refer - https://shopify.dev/docs/api/customer-privacy#loading-the-customer-privacy-api. Proceeding with normal Swym Wishlist Plus load");
            loadSwymShopifyScript();
          } else {
            setTimeout(() => consentCheckFallback(retryCount + 1), 1000);
          }
        }
      }
      if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initialiseConsentCheck);
        window.addEventListener("load", () => consentCheckFallback(0));
      } else {
        initialiseConsentCheck();
      }
    
  })();
</script>

<!-- BEGIN app snippet: swymSnippet --><script defer>
  (function () {
    const currentSwymJSPath = '//freecdn.swymrelay.com/code/swym-shopify.js';
    const currentSwymStorePath = 'https://swymstore-v3free-01.swymrelay.com';
    const dnsPrefetchLink = `<link rel="dns-prefetch" href="https://${currentSwymStorePath}" crossorigin>`;
    const dnsPrefetchLink2 = `<link rel="dns-prefetch" href="${currentSwymJSPath}">`;
    const preConnectLink = `<link rel="preconnect" href="${currentSwymJSPath}">`;
    const swymSnippet = document.getElementById('wishlist-embed-init');        
    if(dnsPrefetchLink) {swymSnippet.insertAdjacentHTML('afterend', dnsPrefetchLink);}
    if(dnsPrefetchLink2) {swymSnippet.insertAdjacentHTML('afterend', dnsPrefetchLink2);}
    if(preConnectLink) {swymSnippet.insertAdjacentHTML('afterend', preConnectLink);}
  })()
</script>
<script id="swym-snippet" type="text">
  window.swymLandingURL = document.URL;
  window.swymCart = {"note":null,"attributes":{},"original_total_price":0,"total_price":0,"total_discount":0,"total_weight":0.0,"item_count":0,"items":[],"requires_shipping":false,"currency":"IDR","items_subtotal_price":0,"cart_level_discount_applications":[],"checkout_charge_amount":0};
  window.swymPageLoad = function() {
    window.SwymProductVariants = window.SwymProductVariants || {};
    window.SwymHasCartItems = 0 > 0;
    window.SwymPageData = {}, window.SwymProductInfo = {};var variants = [];
      window.SwymProductInfo.product = {"id":8978029871323,"title":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website","handle":"ba25157blk000","description":"\u003cp\u003e• Material: Man-Made Leather With Pebble Grain Texture\u003cbr\u003e\n• Style: Satchel\u003cbr\u003e\n• Color: Black\u003cbr\u003e\n• Top zip metal closure (2 pullers) \u003cbr\u003e\n• Functional padlock\u003cbr\u003e\n• Detachble \u0026amp; adjustable strap\u003cbr\u003e\n• Interior: zip wall pocket with key slot \u0026amp; slit pocket\u003cbr\u003e\n• Each item from this collection comes beautifully in a exclusive packaging including a premium box, dust bag, and a signature card\u003cbr\u003e\n• 24 (L) x 20 (W) x 16 (H)\u003c\/p\u003e","published_at":"2025-09-03T09:03:07+07:00","created_at":"2025-09-03T09:03:07+07:00","vendor":"<?php echo $BRANDS ?>","type":"Bags","tags":[],"price":179900000,"price_min":179900000,"price_max":179900000,"available":true,"price_varies":false,"compare_at_price":179900000,"compare_at_price_min":179900000,"compare_at_price_max":179900000,"compare_at_price_varies":false,"variants":[{"id":47515558084827,"title":"Black","option1":"Black","option2":null,"option3":null,"Jenis Game":"BA25157BLK000","requires_shipping":true,"taxable":true,"featured_image":{"id":47533561118939,"product_id":8978029871323,"position":1,"created_at":"2025-09-04T07:13:52+07:00","updated_at":"2025-09-04T07:13:52+07:00","alt":null,"width":650,"height":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","variant_ids":[47515558084827]},"available":true,"name":"<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website - Black","public_title":"Black","options":["Black"],"price":179900000,"weight":1000,"compare_at_price":179900000,"inventory_management":"shopify","barcode":null,"featured_media":{"alt":null,"id":38116842832091,"position":1,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832"}},"requires_selling_plan":false,"selling_plan_allocations":[]}],"images":["\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-2_a9018b70-393d-4a90-bce9-93d2c3e2b5f4.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-3_2697eafb-ef7d-42f6-8399-2d5c40e5ec33.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-4_6ffa2d0c-773f-4839-940e-f87fc9650575.jpg?v=1756944832","\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-5_33ea19e6-548c-4fbd-8587-4379966a13e8.jpg?v=1756944832"],"featured_image":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","options":["Color"],"media":[{"alt":null,"id":38116842832091,"position":1,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?v=1756944832","width":650},{"alt":null,"id":38116842864859,"position":2,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-2_a9018b70-393d-4a90-bce9-93d2c3e2b5f4.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-2_a9018b70-393d-4a90-bce9-93d2c3e2b5f4.jpg?v=1756944832","width":650},{"alt":null,"id":38116842897627,"position":3,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-3_2697eafb-ef7d-42f6-8399-2d5c40e5ec33.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-3_2697eafb-ef7d-42f6-8399-2d5c40e5ec33.jpg?v=1756944832","width":650},{"alt":null,"id":38116842930395,"position":4,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-4_6ffa2d0c-773f-4839-940e-f87fc9650575.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-4_6ffa2d0c-773f-4839-940e-f87fc9650575.jpg?v=1756944832","width":650},{"alt":null,"id":38116842963163,"position":5,"preview_image":{"aspect_ratio":1.0,"height":650,"width":650,"src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-5_33ea19e6-548c-4fbd-8587-4379966a13e8.jpg?v=1756944832"},"aspect_ratio":1.0,"height":650,"media_type":"image","src":"\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-5_33ea19e6-548c-4fbd-8587-4379966a13e8.jpg?v=1756944832","width":650}],"requires_selling_plan":false,"selling_plan_groups":[],"content":"\u003cp\u003e• Material: Man-Made Leather With Pebble Grain Texture\u003cbr\u003e\n• Style: Satchel\u003cbr\u003e\n• Color: Black\u003cbr\u003e\n• Top zip metal closure (2 pullers) \u003cbr\u003e\n• Functional padlock\u003cbr\u003e\n• Detachble \u0026amp; adjustable strap\u003cbr\u003e\n• Interior: zip wall pocket with key slot \u0026amp; slit pocket\u003cbr\u003e\n• Each item from this collection comes beautifully in a exclusive packaging including a premium box, dust bag, and a signature card\u003cbr\u003e\n• 24 (L) x 20 (W) x 16 (H)\u003c\/p\u003e"};
      window.SwymProductInfo.variants = window.SwymProductInfo.product.variants;
      var piu = "\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?crop=center\u0026height=620\u0026v=1756944832\u0026width=620";
      

        SwymProductVariants[47515558084827] = {
          empi: window.SwymProductInfo.product.id,epi:47515558084827,
          dt: "<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website",
          du: "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>",
          iu:  "\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?crop=center\u0026height=620\u0026v=1756944832\u0026width=620" ,
          stk:  1 ,
          pr: 179900000/100,
          ct: window.SwymProductInfo.product.type,
          
            op: 179900000/100,
          
          variants: [{ "Black" : 47515558084827}]
        };window.SwymProductInfo.currentVariant = 47515558084827;
      var product_data = {
        et: 1, empi: window.SwymProductInfo.product.id, epi: window.SwymProductInfo.currentVariant,
        dt: "<?php echo $BRANDS ?> >> CreaSiteTN Layanan Pengembangan Website", du: "https://www.creasitetn.ovh/studio/<?php echo $BRANDS1 ?>",
        ct: window.SwymProductInfo.product.type, pr: 179900000/100,
        iu:  "\/\/9to9.co.id\/cdn\/shop\/files\/BA25157BLK-1_846cc577-bf71-4a47-b459-40f1bfb382b8.jpg?crop=center\u0026height=620\u0026v=1756944832\u0026width=620" , 
        variants: [{ "Black" : 47515558084827 }],
        stk:  1 
        
          ,op:179900000/100
        
      };
      window.SwymPageData = product_data;
    
    window.SwymPageData.uri = window.swymLandingURL;
  };
  if(window.selectCallback){
    (function(){
      var originalSelectCallback = window.selectCallback;
      window.selectCallback = function(variant){
        originalSelectCallback.apply(this, arguments);
        try{
          if(window.triggerSwymVariantEvent){
            window.triggerSwymVariantEvent(variant.id);
          }
        }catch(err){
          console.warn("Swym selectCallback", err);
        }
      };})();}
  window.swymCustomerId =null;
  window.swymCustomerExtraCheck =
    null;
  var swappName = ("Wishlist" || "Wishlist");
  var swymJSObject = {
    pid: "DneYzriGve3XAurW2kcKYH3+7XR0umgo7ucyAQluuNA=",
    interface: "/apps/swym" + swappName + "/interfaces/interfaceStore.php?appname=" + swappName
  };
  window.swymJSShopifyLoad = function(){
    if(window.swymPageLoad) swymPageLoad();
    if(!window._swat) {
      (function (s, w, r, e, l, a, y) {
        r['SwymRetailerConfig'] = s;
        r[s] = r[s] || function (k, v) {
          r[s][k] = v;
        };
      })('_swrc', '', window);
      _swrc('RetailerId', swymJSObject.pid);
      _swrc('Callback', function(){initSwymShopify();});
    }else if(window._swat.postLoader){
      _swrc = window._swat.postLoader;
      _swrc('RetailerId', swymJSObject.pid);
      _swrc('Callback', function(){initSwymShopify();});
    }else{
      initSwymShopify();}
  }
  if(!window._SwymPreventAutoLoad) {
    swymJSShopifyLoad();
  }
</script>

<style id="safari-flasher-pre"></style>
<script>
  if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
    document.getElementById("safari-flasher-pre").innerHTML = '' + '#swym-plugin,#swym-hosted-plugin{display: none;}' + '.swym-button.swym-add-to-wishlist{display: none;}' + '.swym-button.swym-add-to-watchlist{display: none;}' + '#swym-plugin  #swym-notepad, #swym-hosted-plugin  #swym-notepad{opacity: 0; visibility: hidden;}' + '#swym-plugin  #swym-notepad, #swym-plugin  #swym-overlay, #swym-plugin  #swym-notification,' + '#swym-hosted-plugin  #swym-notepad, #swym-hosted-plugin  #swym-overlay, #swym-hosted-plugin  #swym-notification' + '{-webkit-transition: none; transition: none;}' + '';
    window.SwymCallbacks = window.SwymCallbacks || [];
    window.SwymCallbacks.push(function(tracker) {
      tracker.evtLayer.addEventListener(tracker.JSEvents.configLoaded, function() {
        var x = function() {
          SwymUtils.onDOMReady(function() {
            var d = document.createElement("div");
            d.innerHTML = "<style id='safari-flasher-post'>" + "#swym-plugin:not(.swym-ready),#swym-hosted-plugin:not(.swym-ready){display: none;}" + ".swym-button.swym-add-to-wishlist:not(.swym-loaded){display: none;}" + ".swym-button.swym-add-to-watchlist:not(.swym-loaded){display: none;}" + "#swym-plugin.swym-ready  #swym-notepad, #swym-plugin.swym-ready  #swym-overlay, #swym-plugin.swym-ready  #swym-notification," + "#swym-hosted-plugin.swym-ready  #swym-notepad, #swym-hosted-plugin.swym-ready  #swym-overlay, #swym-hosted-plugin.swym-ready  #swym-notification" + "{-webkit-transition: opacity 0.3s, visibility 0.3ms, -webkit-transform 0.3ms !important;-moz-transition: opacity 0.3s, visibility 0.3ms, -moz-transform 0.3ms !important;-ms-transition: opacity 0.3s, visibility 0.3ms, -ms-transform 0.3ms !important;-o-transition: opacity 0.3s, visibility 0.3ms, -o-transform 0.3ms !important;transition: opacity 0.3s, visibility 0.3ms, transform 0.3ms !important;}" + "</style>";
            document.head.appendChild(d);
          });};
        setTimeout(x, 10);
      });});}
  window.SwymOverrideMoneyFormat = "Rp {{amount_no_decimals}}";
</script>
<style id="swym-product-view-defaults"> .swym-button.swym-add-to-wishlist-view-product:not(.swym-loaded) { display: none; } </style><!-- END app snippet -->

<script  id="swymSnippetCheckAndActivate">
  (function() {
    function postDomLoad() {
      var element = document.querySelector('script#swym-snippet:not([type="text"])');                            
      if (!element) {
        var script = document.querySelector('script#swym-snippet[type="text"]');
        if (script) {
          script.type = 'text/javascript';
          new Function(script.textContent)();
        }
      }
    }
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", postDomLoad);
    } else {
      postDomLoad();
    }
  })();
</script>



<script>
  (function() {
    // HEARTBEAT
    let wishlistAppHeartbeatData = '{"154735771867":"2025-09-11T08:50:26.442Z","146989121755":"2025-06-16T02:34:03.431Z","150338076891":"2025-05-02T04:11:02.369Z","152432574683":"2025-09-27T00:10:50.816Z","149968257243":"2025-03-28T05:07:35.069Z","149993947355":"2025-03-27T21:34:27.319Z","151314366683":"2025-05-09T09:15:10.325Z","152432476379":"2025-06-16T02:49:08.836Z","editor":"2025-09-25T04:05:50.688Z","150864625883":"2025-05-02T02:10:07.589Z","149194211547":"2025-03-19T23:14:30.835Z","151317184731":"2025-09-21T13:37:25.284Z"}';
    try {
      wishlistAppHeartbeatData = JSON.parse(wishlistAppHeartbeatData) || {};
    } catch (e) {
      wishlistAppHeartbeatData = {}; 
    }
    const ShopifyTheme = window.Shopify.theme;
    const themeId = ShopifyTheme.id;
    const heartbeatMetadata = {
      schema_name: ShopifyTheme?.schema_name,
      schema_version: ShopifyTheme?.schema_version,
      theme_store_id: ShopifyTheme?.theme_store_id,
      role: ShopifyTheme?.role
    };
    const themeSchemaName = window.Shopify.theme.schema_name;
    const isDesignMode = !!window.swymDesignMode;

    if (!window.SwymCallbacks) {
      window.SwymCallbacks = [];
    }
    window.SwymCallbacks.push((swat) => {
      if (!swat || !themeId) {
        return;
      }

      const triggerHeartbeat = swat?.ExtensionHealth?.triggerExtensionHeartbeat;
      if (typeof triggerHeartbeat !== "function") return;

      const lastHeartbeat = isDesignMode ? wishlistAppHeartbeatData?.editor : wishlistAppHeartbeatData?.[themeId];
      const themeContext = isDesignMode ? 'editor' : themeId;
      
      const extensionData = {
        extensionName: "wishlist-app", 
        extensionType: "app-embed", 
        metadata: heartbeatMetadata, 
        themeId: themeContext, 
        extensionSource: "default"
      };

      triggerHeartbeat(extensionData, lastHeartbeat);

      // ENABLE COMMON FEATURES
      let swymEnabledCommonFeatures = window.SwymEnabledCommonFeatures;
      Object.keys(swymEnabledCommonFeatures).forEach((key) => {
        if (!swymEnabledCommonFeatures[key]) 
          return;

        switch (key) {
          case "add-to-wishlist-collections-button": 
            swat?.collectionsApi?.setDefaultCustomizationOptions();
            swat?.collectionsApi?.initializeCollections(swat, false, themeSchemaName);

            // Send basic collections heartbeat
            let basicCollectionsHeartbeat = '';
            try {
              basicCollectionsHeartbeat = JSON.parse(basicCollectionsHeartbeat) || {};
            } catch (e) {
              basicCollectionsHeartbeat = {}; 
            }

            const lastBasicCollectionsHeartbeat = isDesignMode ? basicCollectionsHeartbeat?.editor : basicCollectionsHeartbeat?.[themeId];

            /** Stop heartbeat
            triggerHeartbeat({
              extensionName: "basic-add-to-wishlist-collections-button", 
              extensionType: "app-embed", 
              metadata: {}, 
              themeId: themeContext, 
              extensionSource: "default"    
            }, lastBasicCollectionsHeartbeat);
            */

            break;
          case "add-to-wishlist-pdp-button":
            if (!(window.SwymPageData && window.SwymPageData.et === 1)) {
              // Not initiating pdp button as it is not a product page
              return 
            }

            // Inject addtowishlist.css into the document's <head>
            var head = document.head;
            var pdpButtonStylesheet = "https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/addtowishlistbutton.css";
            var pdpButtonStylesheetTag = document.createElement("link");
            pdpButtonStylesheetTag.id = `swym-pdp-button-stylesheet`;
            pdpButtonStylesheetTag.rel = "stylesheet";
            pdpButtonStylesheetTag.href = pdpButtonStylesheet;
            
            if (!document.getElementById("swym-pdp-button-stylesheet")) {
              head.appendChild(pdpButtonStylesheetTag);
            }

            var x = document.getElementsByTagName("script")[0];
            function createAndInsertScript(id, src, onLoadCallback) {
              var scriptTag = document.createElement("script");
              scriptTag.id = id;
              scriptTag.type = "text/javascript";
              scriptTag.src = src;
              scriptTag.onload = onLoadCallback;
              x.parentNode.insertBefore(scriptTag, x);
            }

            var pdpButtonScript = "https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/addtowishlistbutton.js";
            createAndInsertScript(
              `swym-pdp-button-script`,
              pdpButtonScript,
              function () {
                const pdpBtnApi = window.WishlistPlusPDPButtonAPI;
                if (pdpBtnApi) {
                  pdpBtnApi.setDefaultCustomizationOptions(swat);
                  pdpBtnApi.initializePDPButton(swat, true);
                }
              }
            );
            break;
          default:
            return;
        }
      })
    });
  })(); // IIFE to prevent polluting global scope
</script>



  
<script> 
  (function () {
    // Get the settings from Shopify's Liquid variables and create the styles
    const isControlCentreEnabledFromMetafield = window?.SwymEnabledCommonFeatures?.["control-centre"];
    const isCommonCustomizationEnabledFromMetafield = window?.SwymWishlistCommonCustomizationSettings && 
      Object.keys(window.SwymWishlistCommonCustomizationSettings).length > 0;
    const isControlCentreEnabledFromBlockSettings = false;
    
    if (!(isControlCentreEnabledFromMetafield && isCommonCustomizationEnabledFromMetafield) && !isControlCentreEnabledFromBlockSettings) {
      // Don't enable control centre if this is disabled and block settings are not enabled
      return;
    }
    
    let borderRadius = 6;
    let drawerWidth = window?.SwymWishlistCommonCustomizationSettings?.storefrontLayoutDrawerWidth || 400;
    
    // Check if block settings exist, use them, otherwise fall back to common settings
    let primaryBgColor = isControlCentreEnabledFromBlockSettings ? 
      "#000000" : 
      window.SwymWishlistCommonCustomizationSettings.primaryColor;
    
    let primaryTextColor = isControlCentreEnabledFromBlockSettings ? 
      "#ffffff" : 
      window.SwymWishlistCommonCustomizationSettings.secondaryColor;
    
    let secondaryBgColor = isControlCentreEnabledFromBlockSettings ? 
      "#F4F8FE" : null;
    let secondaryTextColor = isControlCentreEnabledFromBlockSettings ? 
      "#333333" : null;

    // Only use color adjustment functions if we're using common settings
    if (!secondaryBgColor || !secondaryTextColor) {
      function adjustOpacity(color, opacity) {
        if (color[0] === '#') {
          color = color.slice(1);
        }

        if (color.length === 3) {
          color = color.split('').map(char => char + char).join('');
        }

        const r = parseInt(color.slice(0, 2), 16);
        const g = parseInt(color.slice(2, 4), 16);
        const b = parseInt(color.slice(4, 6), 16);

        return `rgba(${r}, ${g}, ${b}, ${opacity})`;
      }

      function hexToRgb(color) {
        if (color[0] === '#') {
          color = color.slice(1);
        }
        if (color.length === 3) {
          color = color.split('').map(c => c + c).join('');
        }

        return {
          r: parseInt(color.slice(0, 2), 16),
          g: parseInt(color.slice(2, 4), 16),
          b: parseInt(color.slice(4, 6), 16)
        };
      }

      function getLuminance({ r, g, b }) {
        return 0.299 * r + 0.587 * g + 0.114 * b;
      }

      function generateSecondaryColors(primaryBgColor, primaryTextColor) {
        const secondaryBgOpacity = 0.2;
        const secondaryTextOpacity = 0.8;

        const secondaryBgColor = adjustOpacity(primaryBgColor, secondaryBgOpacity);

        const bgRgb = hexToRgb(primaryBgColor);
        const bgLuminance = getLuminance(bgRgb);

        // Determine whether to use dark or light text for contrast
        const lightText = adjustOpacity(primaryTextColor, secondaryTextOpacity);
        const darkText = adjustOpacity(primaryBgColor, secondaryTextOpacity);

        const secondaryTextColor = bgLuminance > 186 ? darkText : lightText;

        return {
          secondaryBgColor,
          secondaryTextColor
        };
      }

      const generatedColors = generateSecondaryColors(primaryBgColor, primaryTextColor);
      secondaryBgColor = secondaryBgColor || generatedColors.secondaryBgColor;
      secondaryTextColor = secondaryTextColor || generatedColors.secondaryTextColor;
    }

    // Create the CSS rule
    let styles = `
      .swym-storefront-layout-root-component {
        --swym-storefront-layout-ui-border-radius: ${borderRadius}px;
        --swym-storefront-layout-button-border-radius: ${borderRadius}px;
        --swym-storefront-layout-side-drawer-width: ${drawerWidth}px;
        --swym-storefront-layout-button-color-bg-primary: ${primaryBgColor};
        --swym-storefront-layout-button-color-text-primary: ${primaryTextColor};
        --swym-storefront-layout-button-color-bg-secondary: ${secondaryBgColor};
        --swym-storefront-layout-button-color-text-secondary: ${secondaryTextColor};
      }
    `;

    // Create a <style> element and append the styles
    let styleSheet = document.createElement("style");
    styleSheet.type = "text/css";
    styleSheet.innerText = styles;
    document.head.appendChild(styleSheet);

    if (typeof window.SwymStorefrontLayoutContext === 'undefined') {
        window.SwymStorefrontLayoutContext = {};
    }
    if (typeof window.SwymStorefrontLayoutExtensions === 'undefined'){
        window.SwymStorefrontLayoutExtensions = {};
    }
    
    if (isControlCentreEnabledFromBlockSettings) {
      // If block settings are enabled, use them
      SwymStorefrontLayoutContext.Settings = {
        EnableStorefrontLayoutOnLauncher: true,
        EnableStorefrontLayoutNotification: window?.SwymWishlistCommonCustomizationSettings?.enableStorefrontLayoutNotification || true,
        StorefrontLayoutType: window?.SwymWishlistCommonCustomizationSettings?.storefrontLayoutType || "as-drawer",
        StorefrontLayoutDrawerPosition: "left",
        StorefrontLayoutAsSectionContainerId: "swym-wishlist-render-container",
        StorefrontLayoutAsSectionPageURL: "/pages/swym-wishlist",
        EnableStorefrontLayoutVariantSelector: true,
        StorefrontLayoutNotificationPosition: "left",
        StorefrontLayoutActionPopupPosition: "left",
        StorefrontLayoutNotificationDuration: 5000
      };
    } else {
      // If only metafield is enabled but no block settings, use common settings
      SwymStorefrontLayoutContext.Settings = {
        EnableStorefrontLayoutOnLauncher: true,
        EnableStorefrontLayoutNotification: true,
        StorefrontLayoutType: window?.SwymWishlistCommonCustomizationSettings?.storefrontLayoutType || "as-drawer",
        StorefrontLayoutDrawerPosition: "left",
        StorefrontLayoutAsSectionContainerId: "swym-wishlist-render-container",
        StorefrontLayoutAsSectionPageURL: "/pages/swym-wishlist",
        EnableStorefrontLayoutVariantSelector: true,
        StorefrontLayoutNotificationPosition: "left",
        StorefrontLayoutActionPopupPosition: "left",
        StorefrontLayoutNotificationDuration: 5000
      };
    }
    const storefrontLayoutCallback = (swat) =>{
      SwymStorefrontLayoutContext.swat = swat;
      let isStoreOnPaidPlan = swat.getApp('Wishlist')?.['is-paid'];
      let isWishlistEnabled = swat.getApp('Wishlist')?.['enabled'];
      SwymStorefrontLayoutContext.Settings = {
        ...SwymStorefrontLayoutContext?.Settings,
        EnableStorefrontLayoutCollection: window?.SwymEnabledCommonFeatures?.["multiple-wishlist"] || false,
        EnableStorefrontLayout: isWishlistEnabled && (isControlCentreEnabledFromBlockSettings || isControlCentreEnabledFromMetafield),
      }

      if(SwymStorefrontLayoutContext?.Settings?.EnableStorefrontLayout){
        if(SwymStorefrontLayoutContext?.CustomEvents?.LayoutInitialized){
          var event = new CustomEvent(SwymStorefrontLayoutContext.CustomEvents.LayoutInitialized, { 
            detail: { settings: SwymStorefrontLayoutContext?.Settings }
          });
          document.dispatchEvent(event);
        }else{
          swat.utils.warn(`LayoutInitialized event is not defined.`);
        }
      }else{
        swat.utils.warn(`Storefront Layout is disabled.`);
        document.getElementById("swym-storefront-layout-container")?.remove();
        document.getElementById("swym-storefront-extention-render-container")?.remove();
      }
    }
  
    if (!window.SwymCallbacks) {
      window.SwymCallbacks = [];
    }
    window.SwymCallbacks.push(storefrontLayoutCallback);
  
    SwymStorefrontLayoutContext.SwymCustomerData = {
      
        name: null,
        email: null
      
    };
    SwymStorefrontLayoutContext.isShopperLoggedIn = !!SwymStorefrontLayoutContext?.SwymCustomerData?.email;
  })();
</script>
<div id="swym-storefront-extention-render-container">
  <!-- BEGIN app snippet: swymStorefrontLayout --><script>
    (function () {
        const isControlCentreEnabledFromMetafield = window?.SwymEnabledCommonFeatures?.["control-centre"];
        const isControlCentreEnabledFromBlockSettings = false;
        const isCommonCustomizationEnabledFromMetafield = window?.SwymWishlistCommonCustomizationSettings && 
            Object.keys(window.SwymWishlistCommonCustomizationSettings).length > 0;
        
        if (!(isControlCentreEnabledFromMetafield && isCommonCustomizationEnabledFromMetafield) && !isControlCentreEnabledFromBlockSettings) {
            return;
        }
        if (typeof window.SwymStorefrontLayoutContext === 'undefined') {
            window.SwymStorefrontLayoutContext = {};
        }
        
        SwymStorefrontLayoutContext.Strings = {
            title: "My Wishlist",
            addToCart: "Add To Cart + ",
            addedToCart: "Added To Cart",
            soldOut:"Sold Out",
            addingToCart: "Adding...",
            viewCartCta: "View Cart",
            moveToCartCta: "Move to Cart + ",
            movingToCartCta: "Moving...",
            removeSflItemCta: "Remove from Saved for Later",

            loginHeading: "Don&#39;t lose your Lists!",
            loginText: "Login to save your favorites and access them whenever, wherever!",
            loginButtonText: "Login to Save",
            loggedUserWelcomeMessage: "Welcome!",
            VariantSelectorBtnText: "Translation missing: id.storefrontLayout.VariantSelectorBtnText",
            wishlistTitle:"Other items in my Wishlist",
            wishlistInfo:"Add to lists &amp; organise",
            emptyWishlistTitle: "Your wishlist is empty",
            emptyWishlistDescription: "Add more items to this wishlist and see them here",
            
            collectionTitle: "My Lists",
            emptyCarouselCollectionText: "Your lists are empty!",
            emptyCollectionText: "This List is empty",
            emptyCollectionDescription: "Add more items to this list and see them here",
            
            addToCollectionTitle: "Add this item to list",
            removeItemCta: "Remove from List",
            addToCollectionCta: "Add to List",
            createCollectionCta:"Create new List",
            saveNewCollectionCta: "Save",
            renameCollectionCta: "Rename",
            deleteCollectionCta: "Delete List",
            shareCollectionCta: "Share Wishlist",
            saveCollectionCta: "Save List",
            editCollectionCta: "Edit",
            shareCollectionTitle: "Check This Out!",
            shareCollectionMessage: "View my List",
            sharedCollectionMessage: "This list was shared by {{email}} You can save it to edit",
            updateCollectionTitle: "Update List",

            errorMessageListNameRequired: "Name Required",
            errorMessageListNameRequire3Char: "Name must be at least 3 characters long",
            errorMessageListNameAlreadyExist: "Name already exist",

            notificationMessageItemSaved: "Item Saved",
            notificationMessageItemRemoved: "Item Removed",
            notificationMessageAddedToCart: "Added To Cart",
            notificationMessageAddedToCollection: "Item added to your list",
            notificationMessageCollectionSaved: "List Saved",
            notificationMessageCollectionDeleted: "List Deleted",
            notificationMessageCollectionUpdated: "Your lists have been updated",
            notificationMessageCollectionUnavailable: "List unavailable or removed",
            notificationMessageSFLItemSaved: "Saved for later",
            notificationMessageSFLItemRemoved: "Removed from Saved for later",
            notificationMessageMovedToCart: "Moved to Cart",

            notificationActionAddToCollection: "Add To List +",
            notificationActionView: "View",
            notificationActionViewCollection: "View List",
            notificationActionGoToCart: "Go To Cart",

            item: "item",
            items: "items",

            tabWishlist: "Wishlist",
            tabSavedForLater: "Saved for later",
            
            savedForLaterTitle: "Saved for Later",
            emptySavedForLaterTitle: "No items saved for later",
            emptySavedForLaterDescription: "Save items from your cart here until you&#39;re ready"
        }

        /** 
        * Function to override Swym's default UI behavior.
        **/
        const overrideSwymDefaultUI = (swat) => {
            try{
                swat.ui.open = function(){
                    window.location.hash = SwymStorefrontLayoutContext?.StorefrontLayoutUrls?.List;
                }

                swat.ui.uiRef.settings.UI.NotificationDisabled = true;    
            }catch(e){
                swat.utils?.warn('Error overriding Swym default UI:', e);
            }
        }

        /**
        * Callback function to override Swym's default UI behavior based on Storefront Layout settings.
        * 
        * - Overrides `swat.ui.open` to redirect to a custom Storefront Layout URL if enabled.
        * - Overrides Swym's default notifications to log notifications instead of displaying them.
        * - Ensures the callback is pushed to `window.SwymCallbacks` for execution when Swym is initialized.
        * 
        * @param {Object} swat - Swym's UI object used for overriding UI behaviors.
        */
        const swymStorefrontLayoutCallback = (swat) =>{
            SwymStorefrontLayoutContext.swat = swat;
            
            overrideSwymDefaultUI(swat);


            let triggerHeartbeat = swat?.ExtensionHealth?.triggerExtensionHeartbeat;
            if (typeof triggerHeartbeat !== "function") return;

            let wishlistNewUiHeartbeatData = '';
            try {
                wishlistNewUiHeartbeatData = JSON.parse(wishlistNewUiHeartbeatData) || {};
            } catch (e) {
                wishlistNewUiHeartbeatData = {};
            }

            let themeId = window.Shopify.theme.id;
            let isDesignMode = !!window.swymDesignMode;
            let lastHeartbeat = isDesignMode ? wishlistNewUiHeartbeatData?.editor : wishlistNewUiHeartbeatData?.[themeId];
            let themeContext = isDesignMode ? 'editor' : themeId;
            let extensionData = {
                extensionName: "wishlist-new-ui", 
                extensionType: "app-embed", 
                metadata: {}, 
                themeId: themeContext, 
                extensionSource: "default"
            };
            /** Stop heartbeat
            triggerHeartbeat(extensionData, lastHeartbeat);
            */
        }
        
        if (!window.SwymCallbacks) {
            window.SwymCallbacks = [];
        }
        window.SwymCallbacks.push(swymStorefrontLayoutCallback);
    })();
</script>
<link rel="stylesheet" href="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/storefront-layout.css">
<script src="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/async-wishlist-apis.js" defer="defer"></script>
<script src="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/storefront-layout.js" defer="defer"></script>
<script src="https://cdn.shopify.com/extensions/019984b7-e24a-71f1-a3dd-271184d937b1/wishlist-shopify-app-540/assets/storefront-layout-components.js" defer="defer"></script>
<swym-storefront-layout class="swym-storefront-layout-root-component"></swym-storefront-layout><!-- END app snippet -->
</div>
</div></body>
</html>
