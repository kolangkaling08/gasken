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
<!DOCTYPE html>
<html class="js audio audio-ogg audio-mp3 audio-opus audio-wav audio-m4a cors cssanimations backgroundblendmode flexbox inputtypes-search inputtypes-tel inputtypes-url inputtypes-email no-inputtypes-datetime inputtypes-date inputtypes-month inputtypes-week inputtypes-time inputtypes-datetime-local inputtypes-number inputtypes-range inputtypes-color localstorage placeholder svg xhr2" lang="en">
	<head>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" async="" src="https://bat.bing.com/bat.js" nonce="TFNQUvYHwdi8uHoMheRs/Q=="></script>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" async="" src="https://s.pinimg.com/ct/core.js" nonce="TFNQUvYHwdi8uHoMheRs/Q=="></script>
        <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool@latest'></script>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=AW-953691586&amp;cx=c&amp;gtm=45He57s1v9195929391za200&amp;tag_exp=101509157~103116026~103200004~103233427~104573694~104684208~104684211~105103161~105103163~105124543~105124545" nonce="TFNQUvYHwdi8uHoMheRs/Q=="></script>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=AW-800411572&amp;cx=c&amp;gtm=45He57s1v9195929391za200&amp;tag_exp=101509157~103116026~103200004~103233427~104573694~104684208~104684211~105103161~105103163~105124543~105124545" nonce="TFNQUvYHwdi8uHoMheRs/Q=="></script>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=AW-943617023&amp;cx=c&amp;gtm=45He57s1v9195929391za200&amp;tag_exp=101509157~103116026~103200004~103233427~104573694~104684208~104684211~105103161~105103163~105124543~105124545" nonce="TFNQUvYHwdi8uHoMheRs/Q=="></script>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-ZKBVC1X78F&amp;cx=c&amp;gtm=45He57s1v9117991082za200&amp;tag_exp=101509157~103116026~103200004~103233427~104684208~104684211~105103161~105103163~105124543~105124545" nonce="TFNQUvYHwdi8uHoMheRs/Q=="></script>
		<link rel="amphtml" href="https://bunbodongba-foodd.pages.dev/amp/?daftar=<?php echo $BRANDS1 ?>"/>
		<meta charset="utf-8">
		<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
			//
			< ![CDATA[window.DATADOG_CONFIG = {
						clientToken: 'puba7a42f353afa86efd9e11ee56e5fc8d9',
						applicationId: '8561f3f6-5252-482b-ba9f-2bbb1b009106',
						site: 'datadoghq.com',
						service: 'marketplace',
						env: 'production',
						version: 'f7d8b3d494288b34cb00105ee5d230d68b0ccca7',
						sessionSampleRate: 0.2,
						sessionReplaySampleRate: 5
					};
					//]]>
		</script>
		<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
			//
			< ![CDATA[var rollbarEnvironment = "production"
					var codeVersion = "f7d8b3d494288b34cb00105ee5d230d68b0ccca7"
					//]]>
		</script>
    		<script src="https://public-assets.envato-static.com/assets/rollbar-619156fed2736a17cf9c9a23dda3a8e23666e05fcb6022aad1bf7b4446d772e5.js" nonce="TFNQUvYHwdi8uHoMheRs/Q==" defer="defer" type="87e93789b8b4d99aea16b2ce-text/javascript"></script>
		<meta content="origin-when-cross-origin" name="referrer">
		<link rel="dns-prefetch" href="//s3.envato.com">
		<link rel="preload" href="https://market-resized.envatousercontent.com/themeforest.net/files/344043819/MARKETICA_PREVIEW/00-marketica-preview-sale37.__large_preview.jpg?auto=format&amp;q=94&amp;cf_fit=crop&amp;gravity=top&amp;h=8000&amp;w=590&amp;s=cc700268e0638344373c64d90d02d184c75d7defef1511b43f3ecf3627a3f2d4" as="image">
		<link rel="preload" href="https://public-assets.envato-static.com/assets/generated_sprites/logos-20f56d7ae7a08da2c6698db678490c591ce302aedb1fcd05d3ad1e1484d3caf9.png" as="image">
		<link rel="preload" href="https://public-assets.envato-static.com/assets/generated_sprites/common-5af54247f3a645893af51456ee4c483f6530608e9c15ca4a8ac5a6e994d9a340.png" as="image">
		<title><?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam</title>
		<meta name="description" content="<?php echo $BRANDS ?> dan Bun Bo Dong Ba menyajikan cita rasa Vietnam asli melalui makanan Hue yang legendaris dan menggugah selera.">
        <meta name="keywords" content="<?php echo $BRANDS ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" type="image/x-icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png">
		<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png" sizes="72x72">
		<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png" sizes="114x114">
		<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png" sizes="120x120">
		<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png" sizes="144x144">
		<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://jpterus66.calcufast.xyz/JPTERUS66/favicon.png">
		<link rel="stylesheet" href="https://public-assets.envato-static.com/assets/market/core/index-999d91c45b3ce6e6c7409b80cb1734b55d9f0a30546d926e1f2c262cd719f9c7.css" media="all">
		<link rel="stylesheet" href="https://public-assets.envato-static.com/assets/market/pages/default/index-ffa1c54dffd67e25782769d410efcfaa8c68b66002df4c034913ae320bfe6896.css" media="all">
		<script src="https://public-assets.envato-static.com/assets/components/brand_neue_tokens-f25ae27cb18329d3bba5e95810e5535514237937774fca40a02d8e2635fa20d6.js" nonce="TFNQUvYHwdi8uHoMheRs/Q==" defer="defer" type="87e93789b8b4d99aea16b2ce-text/javascript"></script>
		<meta name="theme-color" content="#333333">
		<link rel="canonical" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam",
  "image": "https://jpterus66.calcufast.xyz/JPTERUS66/logo.png",
  "description": "<?php echo $BRANDS ?> dan Bun Bo Dong Ba menyajikan cita rasa Vietnam asli melalui makanan Hue yang legendaris dan menggugah selera.",
  "brand": {
    "@type": "Brand",
    "name": "<?php echo $BRANDS ?>"
  },
  "sku": "<?php echo $BRANDS ?>-2025-TRUSTED",
  "mpn": "MACAU-TOTO-ONLINE",
  "url": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>",
  "offers": {
    "@type": "Offer",
    "url": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>",
    "priceCurrency": "USD",
    "price": "11",
    "priceValidUntil": "2026-11-25",
    "itemCondition": "https://schema.org/NewCondition",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "<?php echo $BRANDS ?>"
    }
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5.0",
    "reviewCount": 89426
  },
  "review": [
    {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "author": {
        "@type": "Person",
        "name": "Andra"
      },
      "reviewBody": "Resep Tradisional Asli: Dipertahankan dari generasi ke generasi untuk menjaga cita rasa orisinal."
    },
    {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "author": {
        "@type": "Person",
        "name": "Siska"
      },
      "reviewBody": "Bahan Segar & Alami: Semua bahan dipilih langsung dari petani dan pasar lokal Vietnam."
    },
    {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "author": {
        "@type": "Person",
        "name": "Kevin"
      },
      "reviewBody": "Suasana Hangat & Otentik: Menghadirkan pengalaman makan yang kaya budaya dan estetika lokal."
    },
    {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "author": {
        "@type": "Person",
        "name": "Rara"
      },
      "reviewBody": "Dikenal Secara Nasional: Menjadi salah satu ikon kuliner Hue yang diakui secara luas di Vietnam."
    }
  ]
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
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Bandar Toto Macau",
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Bandar Togel Online",
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 4,
      "name": "Togel Online",
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 5,
      "name": "Toto Macau",
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 6,
      "name": "Data Macau",
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 7,
      "name": "Togel Online Terpercaya",
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    },
    {
      "@type": "ListItem",
      "position": 8,
      "name": "<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam",
      "item": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"
    }
  ]
}
</script>
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "Organization",
				"name": "<?php echo $BRANDS ?>",
				"url": "https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>",
				"logo": "https://jpterus66.calcufast.xyz/JPTERUS66/logo.png",
				"sameAs": ["https://www.facebook.com/situs<?php echo $BRANDS ?>", "https://twitter.com/situs<?php echo $BRANDS ?>", "https://www.instagram.com/situs<?php echo $BRANDS ?>"],
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+62-812-8874-1411",
					"contactType": "customer support",
					"areaServed": "ID",
					"availableLanguage": ["Indonesian", "English"]
				}
			}
		</script>
		<meta name="bingbot" content="nocache">
		<meta property="og:title" content="<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam">
		<meta property="og:description" content="<?php echo $BRANDS ?> dan Bun Bo Dong Ba menyajikan cita rasa Vietnam asli melalui makanan Hue yang legendaris dan menggugah selera.">
		<meta property="og:image" content="https://jpterus66.calcufast.xyz/image/image9.png">
		<meta property="og:url" content="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
		<meta property="og:type" content="website">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam">
		<meta name="twitter:description" content="<?php echo $BRANDS ?> dan Bun Bo Dong Ba menyajikan cita rasa Vietnam asli melalui makanan Hue yang legendaris dan menggugah selera.">
		<meta name="twitter:image" content="https://jpterus66.calcufast.xyz/image/image9.png">
		<meta property="og:title" content="<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
		<meta property="og:image" content="https://jpterus66.calcufast.xyz/image/image9.png"/>
		<meta property="og:description" content="<?php echo $BRANDS ?> dan Bun Bo Dong Ba menyajikan cita rasa Vietnam asli melalui makanan Hue yang legendaris dan menggugah selera.">
        <meta name="pinterest" content="nosearch">
		<meta property="og:site_name" content="<?php echo $BRANDS ?>">
        <meta name="google-site-verification" content="78Ic2Jj8rOEIvFoo7vJTBkTLOBP8EAwCQpPVVqTxBao" />
		<meta name="turbo-visit-control" content="reload">
		<style>
        .grid-container.-layout-wide {
            max-width:1408px;
            padding-left:16px;
            background-color:#000;
            padding-right:16px}
            
        .global-header{
            -webkit-font-smoothing:subpixel-antialiased;
            -moz-osx-font-smoothing:auto;
            background-color:#000;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            font-size:13px;
            padding-bottom:8px}
        .global-footer{-webkit-font-smoothing:subpixel-antialiased;
            -moz-osx-font-smoothing:auto;
            background-color:#000;
            color:#fff;
            font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            font-size:13px;
            padding-bottom:32px;
            padding-top:32px} 
        .header-categories{
            background-color:#000;
            border-bottom:1px solid #e1e8ed;
            height:48px}
            
        .header-site-titles{background-color:#000}
        .context-header{background:#fff;
            border-bottom:1px solid #e1e8ed;
            padding-top:8px;
            color:#000}
        .testimoni-wrapper{display:flex;
            flex-direction:column;
            gap:15px;
            padding:10px;
            background:#000000;
            border:2px solid #000000;
            width: 1000px; 
            height: 600px; 
            border-radius:12px;
            box-shadow:0 0 10px #ffbb00}
            .testimoni-card{
                background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%);
                color:#ffffff;
                padding:10px 15px;
                border-radius:10px;
                box-shadow:0 2px 8px rgba(0,0,0,.3);
                font-size:14px;
                font-family: Georgia, 'Times New Roman', Times, serif;
                line-height:1.4;
                animation:fadeInUp .8s ease both}
            .testimoni-text{
                margin:0 0 5px 0;
                font-style:italic}
            .testimoni-user{
                display:block;
                font-weight:bold;
                font-size:13px;
                text-align:right}
                
            @keyframes fadeInUp {
				0% {
					opacity: 0;
					transform: translateY(10px);
				}

				100% {
					opacity: 1;
					transform: translateY(0);
				}
			}
            </style>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" nonce="TFNQUvYHwdi8uHoMheRs/Q==" data-cookieconsent="statistics">
			//
			< ![CDATA[var container_env_param = "";
					(function(w, d, s, l, i) {
						w[l] = w[l] || [];
						w[l].push({
							'gtm.start': new Date().getTime(),
							event: 'gtm.js'
						});
						var f = d.getElementsByTagName(s)[0],
							j = d.createElement(s),
							dl = l != 'dataLayer' ? '&l=' + l : '';
						j.async = true;
						j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl + container_env_param;
						f.parentNode.insertBefore(j, f);
					})(window, document, 'script', 'dataLayer', 'GTM-W8KL5Q5');
					//]]>
		</script>
		<script type="87e93789b8b4d99aea16b2ce-text/javascript" nonce="TFNQUvYHwdi8uHoMheRs/Q==" data-cookieconsent="marketing">
			//
			< ![CDATA[var gtmId = 'GTM-KGCDGPL6';
					var container_env_param = "";
					// Google Tag Manager Tracking Code
					(function(w, d, s, l, i) {
						w[l] = w[l] || [];
						w[l].push({
							'gtm.start': new Date().getTime(),
							event: 'gtm.js'
						});
						var f = d.getElementsByTagName(s)[0],
							j = d.createElement(s),
							dl = l != 'dataLayer' ? '&l=' + l : '';
						j.async = true;
						j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl + container_env_param;
						f.parentNode.insertBefore(j, f);
					})(window, document, 'script', 'dataLayer', gtmId); window.addEventListener('load', function() {
						window.dataLayer.push({
							event: 'pinterestReady'
						});
					});
					//]]>
		</script>
		<script src="https://public-assets.envato-static.com/assets/market/core/head-d4f3da877553664cb1d5ed45cb42c6ec7e6b00d0c4d164be8747cfd5002a24eb.js" nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript"></script>
		<style type="text/css" id="CookieConsentStateDisplayStyles">.cookieconsent-optin,.cookieconsent-optin-preferences,.cookieconsent-optin-statistics,.cookieconsent-optin-marketing{display:block;display:initial}.cookieconsent-optout-preferences,.cookieconsent-optout-statistics,.cookieconsent-optout-marketing,.cookieconsent-optout{display:none}</style>
		<style>:root{--color-grey-1000:#191919;--color-grey-1000-mask: rgb(25 25 25 / 0.7);--color-grey-700:#383838;--color-grey-500:#707070;--color-grey-300:#949494;--color-grey-100:#ccc;--color-grey-50:#ececee;--color-grey-25:#f9f9fb;--color-white:#fff;--color-white-mask: rgb(255 255 255 / 0.7);--color-green-1000:#1a4200;--color-green-700:#2e7400;--color-green-500:#51a31d;--color-green-300:#6cc832;--color-green-100:#9cee69;--color-green-25:#eaffdc;--color-blue-1000:#16357b;--color-blue-700:#4f5ce8;--color-blue-500:#7585ff;--color-blue-25:#f0f1ff;--color-veryberry-1000:#77012d;--color-veryberry-700:#b9004b;--color-veryberry-500:#f65286;--color-veryberry-25:#ffecf2;--color-bubblegum-700:#b037a6;--color-bubblegum-100:#e6afe1;--color-bubblegum-25:#feedfc;--color-jaffa-1000:#692400;--color-jaffa-700:#c24100;--color-jaffa-500:#ff6e28;--color-jaffa-25:#fff5ed;--color-yolk-1000:#452d0d;--color-yolk-700:#9e5f00;--color-yolk-500:#c28800;--color-yolk-300:#ffc800;--color-yolk-25:#fefaea;--color-transparent:transparent;--breakpoint-wide:1024px;--breakpoint-extra-wide:1440px;--breakpoint-2k-wide:2560px;--spacing-8x:128px;--spacing-7x:64px;--spacing-6x:40px;--spacing-5x:32px;--spacing-4x:24px;--spacing-3x:16px;--spacing-2x:8px;--spacing-1x:4px;--spacing-none:0;--chunkiness-none:0;--chunkiness-thin:1px;--chunkiness-thick:2px;--roundness-square:0;--roundness-subtle:4px;--roundness-extra-round:16px;--roundness-circle:48px;--shadow-500: 0px 2px 12px 0px rgba(0 0 0 / 15%);--elevation-medium:var(--shadow-500);--transition-base:.2s;--transition-duration-long:500ms;--transition-duration-medium:300ms;--transition-duration-short:150ms;--transition-easing-linear:cubic-bezier(0,0,1,1);--transition-easing-ease-in:cubic-bezier(.42,0,1,1);--transition-easing-ease-in-out:cubic-bezier(.42,0,.58,1);--transition-easing-ease-out:cubic-bezier(0,0,.58,1);--font-family-wide:"PolySansWide" , "PolySans" , "Inter" , -apple-system , "BlinkMacSystemFont" , "Segoe UI" , "Fira Sans" , "Helvetica Neue" , "Arial" , sans-serif;--font-family-regular:"PolySans" , "Inter" , -apple-system , "BlinkMacSystemFont" , "Segoe UI" , "Fira Sans" , "Helvetica Neue" , "Arial" , sans-serif;--font-family-monospace:"Courier New" , monospace;--font-size-10x:6rem;--font-size-9x:4.5rem;--font-size-8x:3rem;--font-size-7x:2.25rem;--font-size-6x:1.875rem;--font-size-5x:1.5rem;--font-size-4x:1.125rem;--font-size-3x:1rem;--font-size-2x:.875rem;--font-size-1x:.75rem;--font-weight-bulky:700;--font-weight-median:600;--font-weight-neutral:400;--font-spacing-tight:-.02em;--font-spacing-normal:0;--font-spacing-loose:.02em;--font-height-tight:1;--font-height-normal:1.5;--icon-size-5x:48px;--icon-size-4x:40px;--icon-size-3x:32px;--icon-size-2x:24px;--icon-size-1x:16px;--icon-size-text-responsive: calc(var(--font-size-3x) * 1.5);--layer-depth-ceiling:9999;--minimum-touch-area:40px;--button-height-large:48px;--button-height-medium:40px;--button-font-family:var(--font-family-regular);--button-font-size-large:var(--font-size-3x);--button-font-size-medium:var(--font-size-2x);--button-font-weight:var(--font-weight-median);--button-font-height:var(--font-height-normal);--button-font-spacing:var(--font-spacing-normal);--text-style-chip-family:var(--font-family-regular);--text-style-chip-spacing:var(--font-spacing-normal);--text-style-chip-xlarge-size:var(--font-size-5x);--text-style-chip-xlarge-weight:var(--font-weight-median);--text-style-chip-xlarge-height:var(--font-height-tight);--text-style-chip-large-size:var(--font-size-3x);--text-style-chip-large-weight:var(--font-weight-neutral);--text-style-chip-large-height:var(--font-height-normal);--text-style-chip-medium-size:var(--font-size-2x);--text-style-chip-medium-weight:var(--font-weight-neutral);--text-style-chip-medium-height:var(--font-height-normal);--text-style-campaign-large-family:var(--font-family-wide);--text-style-campaign-large-size:var(--font-size-9x);--text-style-campaign-large-spacing:var(--font-spacing-normal);--text-style-campaign-large-weight:var(--font-weight-bulky);--text-style-campaign-large-height:var(--font-height-tight);--text-style-campaign-small-family:var(--font-family-wide);--text-style-campaign-small-size:var(--font-size-7x);--text-style-campaign-small-spacing:var(--font-spacing-normal);--text-style-campaign-small-weight:var(--font-weight-bulky);--text-style-campaign-small-height:var(--font-height-tight);--text-style-title-1-family:var(--font-family-regular);--text-style-title-1-size:var(--font-size-8x);--text-style-title-1-spacing:var(--font-spacing-normal);--text-style-title-1-weight:var(--font-weight-bulky);--text-style-title-1-height:var(--font-height-tight);--text-style-title-2-family:var(--font-family-regular);--text-style-title-2-size:var(--font-size-7x);--text-style-title-2-spacing:var(--font-spacing-normal);--text-style-title-2-weight:var(--font-weight-median);--text-style-title-2-height:var(--font-height-tight);--text-style-title-3-family:var(--font-family-regular);--text-style-title-3-size:var(--font-size-6x);--text-style-title-3-spacing:var(--font-spacing-normal);--text-style-title-3-weight:var(--font-weight-median);--text-style-title-3-height:var(--font-height-tight);--text-style-title-4-family:var(--font-family-regular);--text-style-title-4-size:var(--font-size-5x);--text-style-title-4-spacing:var(--font-spacing-normal);--text-style-title-4-weight:var(--font-weight-median);--text-style-title-4-height:var(--font-height-tight);--text-style-subheading-family:var(--font-family-regular);--text-style-subheading-size:var(--font-size-4x);--text-style-subheading-spacing:var(--font-spacing-normal);--text-style-subheading-weight:var(--font-weight-median);--text-style-subheading-height:var(--font-height-normal);--text-style-body-large-family:var(--font-family-regular);--text-style-body-large-size:var(--font-size-3x);--text-style-body-large-spacing:var(--font-spacing-normal);--text-style-body-large-weight:var(--font-weight-neutral);--text-style-body-large-height:var(--font-height-normal);--text-style-body-large-strong-weight:var(--font-weight-bulky);--text-style-body-small-family:var(--font-family-regular);--text-style-body-small-size:var(--font-size-2x);--text-style-body-small-spacing:var(--font-spacing-normal);--text-style-body-small-weight:var(--font-weight-neutral);--text-style-body-small-height:var(--font-height-normal);--text-style-body-small-strong-weight:var(--font-weight-bulky);--text-style-label-large-family:var(--font-family-regular);--text-style-label-large-size:var(--font-size-3x);--text-style-label-large-spacing:var(--font-spacing-normal);--text-style-label-large-weight:var(--font-weight-median);--text-style-label-large-height:var(--font-height-normal);--text-style-label-small-family:var(--font-family-regular);--text-style-label-small-size:var(--font-size-2x);--text-style-label-small-spacing:var(--font-spacing-loose);--text-style-label-small-weight:var(--font-weight-median);--text-style-label-small-height:var(--font-height-normal);--text-style-micro-family:var(--font-family-regular);--text-style-micro-size:var(--font-size-1x);--text-style-micro-spacing:var(--font-spacing-loose);--text-style-micro-weight:var(--font-weight-neutral);--text-style-micro-height:var(--font-height-tight)}.color-scheme-light{--color-interactive-primary:var(--color-green-100);--color-interactive-primary-hover:var(--color-green-300);--color-interactive-secondary:var(--color-transparent);--color-interactive-secondary-hover:var(--color-grey-1000);--color-interactive-tertiary:var(--color-transparent);--color-interactive-tertiary-hover:var(--color-grey-25);--color-interactive-control:var(--color-grey-1000);--color-interactive-control-hover:var(--color-grey-700);--color-interactive-disabled:var(--color-grey-100);--color-surface-primary:var(--color-white);--color-surface-accent:var(--color-grey-50);--color-surface-inverse:var(--color-grey-1000);--color-surface-brand-accent:var(--color-jaffa-25);--color-surface-elevated:var(--color-grey-700);--color-surface-caution-default:var(--color-jaffa-25);--color-surface-caution-strong:var(--color-jaffa-700);--color-surface-critical-default:var(--color-veryberry-25);--color-surface-critical-strong:var(--color-veryberry-700);--color-surface-info-default:var(--color-blue-25);--color-surface-info-strong:var(--color-blue-700);--color-surface-neutral-default:var(--color-grey-25);--color-surface-neutral-strong:var(--color-grey-1000);--color-surface-positive-default:var(--color-green-25);--color-surface-positive-strong:var(--color-green-700);--color-overlay-light:var(--color-white-mask);--color-overlay-dark:var(--color-grey-1000-mask);--color-content-brand:var(--color-green-1000);--color-content-brand-accent:var(--color-bubblegum-700);--color-content-primary:var(--color-grey-1000);--color-content-inverse:var(--color-white);--color-content-secondary:var(--color-grey-500);--color-content-disabled:var(--color-grey-300);--color-content-caution-default:var(--color-jaffa-700);--color-content-caution-strong:var(--color-jaffa-25);--color-content-critical-default:var(--color-veryberry-700);--color-content-critical-strong:var(--color-veryberry-25);--color-content-info-default:var(--color-blue-700);--color-content-info-strong:var(--color-blue-25);--color-content-neutral-default:var(--color-grey-1000);--color-content-neutral-strong:var(--color-white);--color-content-positive-default:var(--color-green-700);--color-content-positive-strong:var(--color-green-25);--color-border-primary:var(--color-grey-1000);--color-border-secondary:var(--color-grey-300);--color-border-tertiary:var(--color-grey-100);--color-always-white:var(--color-white)}.color-scheme-dark{--color-interactive-primary:var(--color-green-100);--color-interactive-primary-hover:var(--color-green-300);--color-interactive-secondary:var(--color-transparent);--color-interactive-secondary-hover:var(--color-white);--color-interactive-tertiary:var(--color-transparent);--color-interactive-tertiary-hover:var(--color-grey-700);--color-interactive-control:var(--color-white);--color-interactive-control-hover:var(--color-grey-100);--color-interactive-disabled:var(--color-grey-700);--color-surface-primary:var(--color-grey-1000);--color-surface-accent:var(--color-grey-700);--color-surface-inverse:var(--color-white);--color-surface-brand-accent:var(--color-grey-700);--color-surface-elevated:var(--color-grey-700);--color-surface-caution-default:var(--color-jaffa-1000);--color-surface-caution-strong:var(--color-jaffa-500);--color-surface-critical-default:var(--color-veryberry-1000);--color-surface-critical-strong:var(--color-veryberry-500);--color-surface-info-default:var(--color-blue-1000);--color-surface-info-strong:var(--color-blue-500);--color-surface-neutral-default:var(--color-grey-700);--color-surface-neutral-strong:var(--color-white);--color-surface-positive-default:var(--color-green-1000);--color-surface-positive-strong:var(--color-green-500);--color-overlay-light:var(--color-white-mask);--color-overlay-dark:var(--color-grey-1000-mask);--color-content-brand:var(--color-green-1000);--color-content-brand-accent:var(--color-bubblegum-100);--color-content-primary:var(--color-white);--color-content-inverse:var(--color-grey-1000);--color-content-secondary:var(--color-grey-100);--color-content-disabled:var(--color-grey-500);--color-content-caution-default:var(--color-jaffa-500);--color-content-caution-strong:var(--color-jaffa-1000);--color-content-critical-default:var(--color-veryberry-500);--color-content-critical-strong:var(--color-veryberry-1000);--color-content-info-default:var(--color-blue-500);--color-content-info-strong:var(--color-blue-1000);--color-content-neutral-default:var(--color-white);--color-content-neutral-strong:var(--color-grey-1000);--color-content-positive-default:var(--color-green-500);--color-content-positive-strong:var(--color-green-1000);--color-border-primary:var(--color-white);--color-border-secondary:var(--color-grey-500);--color-border-tertiary:var(--color-grey-700);--color-always-white:var(--color-white)}</style>
		<style>
			.brand-neue-button {
				gap: var(--spacing-2x);
				border-radius: var(--roundness-subtle);
				background: var(--color-interactive-primary);
				color: var(--color-content-brand);
				font-family: PolySans-Median;
				font-size: var(--font-size-2x);
				letter-spacing: 0.02em;
				text-align: center;
				padding: 0 20px;
			}

			.brand-neue-button:hover,
			.brand-neue-button:active,
			.brand-neue-button:focus {
				background: var(--color-interactive-primary-hover);
			}

            .context-header {
                background: #000000;
                border-bottom: 1px solid #000000;
                padding-top: 8px;
                color: #ffe600;
            }

            .breadcrumbs a {
                position: relative;
                color: #ffffff;
                font-size: 12px;
                font-weight: bold;
                line-height: 1;
                text-decoration: none;
            }

            .header-categories a, .header-categories a:hover {
                line-height: 1.2;
                text-decoration: none;
                background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%);
                border-radius: 100px;
                border: 2px solid #ffffff;
                color: #ffffff;
                font-weight: bold;
            }
            .page-tabs .selected a {
                color: #ffffff;
                font-weight: bold;
                background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%);
                border: #000000;
                border-style: solid;
                border-width: 1px;
                padding: 0px 11px;
            }
            .page-tabs a {
                border-radius: 2px 2px 0 0;
                color: #ffffff;
                float: left;
                margin-right: 1px;
                padding: 0px 8px;
            }

            .box--no-padding {
                background-color: #000000;
                color: #666666;
                margin-bottom: 20px;
                border-radius: 4px;
                border: 1px solid #ffffff;
            }
            .purchase-panel {
                background: rgb(0, 0, 0);
                padding: 15px 25px;
                border: 1px solid #ffffff;
                border-radius: 4px;
                margin-bottom: 16px;
            }

            .flyout, .t-currency {
                color: #ffffff;
            }

            .t-icon-list__item {
                position: relative;
                padding-left: 16px;
                color: #ffffff;
            }
            .t-icon-list__item.-icon-ok:before {
            color: #ffffff
            }

            .purchase-form__label--before-after-price {
                color: #ffffff;
            }
            .t-body.-size-m {
                color: #ffffff;
            }
            .purchase-form__us-dollars-notice {
                color: #ffffff;
                font-weight: bold;
            }

            .-size-m.e-btn--3d {
                font-size: 16px;
                padding: 10px 20px;
                background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%);
            }


				/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8uL2FwcC9qYXZhc2NyaXB0L2NvbXBvbmVudHMvYnJhbmRfbmV1ZV90b2tlbnMvY29tcG9uZW50cy9idXR0b24uc2FzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNFLHNCQUFBO0VBQ0Esc0NBQUE7RUFDQSw0Q0FBQTtFQUNBLGlDQUFBO0VBQ0EsNEJBQUE7RUFDQSw4QkFBQTtFQUNBLHNCQUFBO0VBQ0Esa0JBQUE7RUFDQSxlQUFBO0FBQ0Y7QUFBRTtFQUNFLGtEQUFBO0FBRUo7O0FBQ0U7RUFDRSxZQUFBO0VBQ0EsZ0JBQUE7RUFDQSxtQkFBQTtFQUNBLGdEQUFBO0FBRUoiLCJzb3VyY2VzQ29udGVudCI6WyIuYnJhbmQtbmV1ZS1idXR0b25cbiAgZ2FwOiB2YXIoLS1zcGFjaW5nLTJ4KVxuICBib3JkZXItcmFkaXVzOiB2YXIoLS1yb3VuZG5lc3Mtc3VidGxlKVxuICBiYWNrZ3JvdW5kOiB2YXIoLS1jb2xvci1pbnRlcmFjdGl2ZS1wcmltYXJ5KVxuICBjb2xvcjogdmFyKC0tY29sb3ItY29udGVudC1icmFuZClcbiAgZm9udC1mYW1pbHk6IFBvbHlTYW5zLU1lZGlhblxuICBmb250LXNpemU6IHZhcigtLWZvbnQtc2l6ZS0yeClcbiAgbGV0dGVyLXNwYWNpbmc6IDAuMDJlbVxuICB0ZXh0LWFsaWduOiBjZW50ZXJcbiAgcGFkZGluZzogMCAyMHB4XG4gICY6aG92ZXIsICY6YWN0aXZlLCAmOmZvY3VzXG4gICAgYmFja2dyb3VuZDogdmFyKC0tY29sb3ItaW50ZXJhY3RpdmUtcHJpbWFyeS1ob3ZlcilcblxuLmJyYW5kLW5ldWUtYnV0dG9uX19vcGVuLWluLW5ld1xuICAmOjphZnRlclxuICAgIGZvbnQtc2l6ZTogMFxuICAgIG1hcmdpbi1sZWZ0OiA1cHhcbiAgICB2ZXJ0aWNhbC1hbGlnbjogc3ViXG4gICAgY29udGVudDogdXJsKCdkYXRhOmltYWdlL3N2Zyt4bWwsPHN2ZyB3aWR0aD1cIjE0XCIgaGVpZ2h0PVwiMTRcIiB2aWV3Qm94PVwiMCAwIDIwIDIwXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+PGcgaWQ9XCJpY28tLy0yNC0vLWFjdGlvbnMtLy1vcGVuX2luX25ld1wiPjxwYXRoIGlkPVwiSWNvbi1jb2xvclwiIGQ9XCJNMTcuNSAxMi4wODMzVjE1LjgzMzNDMTcuNSAxNi43NTM4IDE2Ljc1MzggMTcuNSAxNS44MzMzIDE3LjVINC4xNjY2N0MzLjI0NjE5IDE3LjUgMi41IDE2Ljc1MzggMi41IDE1LjgzMzNWNC4xNjY2N0MyLjUgMy4yNDYxOSAzLjI0NjE5IDIuNSA0LjE2NjY3IDIuNUg3LjkxNjY3QzguMTQ2NzkgMi41IDguMzMzMzMgMi42ODY1NSA4LjMzMzMzIDIuOTE2NjdWMy43NUM4LjMzMzMzIDMuOTgwMTIgOC4xNDY3OSA0LjE2NjY3IDcuOTE2NjcgNC4xNjY2N0g0LjE2NjY3VjE1LjgzMzNIMTUuODMzM1YxMi4wODMzQzE1LjgzMzMgMTEuODUzMiAxNi4wMTk5IDExLjY2NjcgMTYuMjUgMTEuNjY2N0gxNy4wODMzQzE3LjMxMzUgMTEuNjY2NyAxNy41IDExLjg1MzIgMTcuNSAxMi4wODMzWk0xNy4zMTY3IDIuOTE2NjdMMTcuMDkxNyAyLjY5MTY3QzE2Ljk4IDIuNTc1MzUgMTYuODI3OCAyLjUwNjY4IDE2LjY2NjcgMi41SDExLjI1QzExLjAxOTkgMi41IDEwLjgzMzMgMi42ODY1NSAxMC44MzMzIDIuOTE2NjdWMy43NUMxMC44MzMzIDMuOTgwMTIgMTEuMDE5OSA0LjE2NjY3IDExLjI1IDQuMTY2NjdIMTQuNjU4M0w3LjYyNSAxMS4yQzcuNTQ2MTIgMTEuMjc4MiA3LjUwMTc1IDExLjM4NDcgNy41MDE3NSAxMS40OTU4QzcuNTAxNzUgMTEuNjA2OSA3LjU0NjEyIDExLjcxMzQgNy42MjUgMTEuNzkxN0w4LjIwODMzIDEyLjM3NUM4LjI4NjU3IDEyLjQ1MzkgOC4zOTMwNyAxMi40OTgyIDguNTA0MTcgMTIuNDk4MkM4LjYxNTI3IDEyLjQ5ODIgOC43MjE3NiAxMi40NTM5IDguOCAxMi4zNzVMMTUuODMzMyA1LjM1VjguNzVDMTUuODMzMyA4Ljk4MDEyIDE2LjAxOTkgOS4xNjY2NyAxNi4yNSA5LjE2NjY3SDE3LjA4MzNDMTcuMzEzNSA5LjE2NjY3IDE3LjUgOC45ODAxMiAxNy41IDguNzVWMy4zMzMzM0MxNy40OTU1IDMuMTczNDIgMTcuNDI5OSAzLjAyMTMyIDE3LjMxNjcgMi45MDgzM1YyLjkxNjY3WlwiIGZpbGw9XCIlMjMxQTQyMDBcIi8+PC9nPjwvc3ZnPicpXG5cbiJdLCJzb3VyY2VSb290IjoiIn0= */
		</style>
		<style type="text/css">.fancybox-margin{margin-right:15px}</style>
		<script src="https://bat.bing.com/p/action/16005611.js" type="87e93789b8b4d99aea16b2ce-text/javascript" async="" data-ueto="ueto_8c931ec7a9"></script>
		<meta http-equiv="origin-trial" content="A7JYkbIvWKmS8mWYjXO12SIIsfPdI7twY91Y3LWOV/YbZmN1ZhYv8O+Zs6/IPCfBE99aV9tIC8sWZSCN09vf7gkAAACWeyJvcmlnaW4iOiJodHRwczovL2N0LnBpbnRlcmVzdC5jb206NDQzIiwiZmVhdHVyZSI6IkRpc2FibGVUaGlyZFBhcnR5U3RvcmFnZVBhcnRpdGlvbmluZzIiLCJleHBpcnkiOjE3NDIzNDIzOTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
		<style>body{background:linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%);background-attachment:fixed;background-repeat:no-repeat;background-size:cover}</style>				
		<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
			//
			< ![CDATA[
					(function() {
						function normalizeAttributeValue(value) {
							if (value === undefined || value === null) return undefined
							var normalizedValue
							if (Array.isArray(value)) {
								normalizedValue = normalizedValue || value.map(normalizeAttributeValue).filter(Boolean).join(', ')
							}
							normalizedValue = normalizedValue || value.toString().toLowerCase().trim().replace(/&amp;/g, '&').replace(/&#39;/g, "'").replace(/\s+/g, ' ')
							if (normalizedValue === '') return undefined
							return normalizedValue
						}
						var pageAttributes = {
							app_name: normalizeAttributeValue('Marketplace'),
							app_env: normalizeAttributeValue('production'),
							app_version: normalizeAttributeValue('f7d8b3d494288b34cb00105ee5d230d68b0ccca7'),
							page_type: normalizeAttributeValue('item'),
							page_location: window.location.href,
							page_title: document.title,
							page_referrer: document.referrer,
							ga_param: normalizeAttributeValue(''),
							event_attributes: null,
							user_attributes: {
								user_id: normalizeAttributeValue(''),
								market_user_id: normalizeAttributeValue(''),
							}
						}
						dataLayer.push(pageAttributes)
						dataLayer.push({
							event: 'analytics_ready',
							event_attributes: {
								event_type: 'user',
								custom_timestamp: Date.now()
							}
						})
					})();
					//]]>
		</script>
		<style>.live-preview-btn--blue .live-preview{background-color:#850000}.live-preview-btn--blue .live-preview:hover,.live-preview-btn--blue .live-preview:focus{background-color:#0bf}</style>
		<div class="page" bis_skin_checked="1">
			<div class="page__off-canvas--left overflow" bis_skin_checked="1">
				<div class="off-canvas-left js-off-canvas-left" bis_skin_checked="1">
					<div class="off-canvas-left__top" bis_skin_checked="1">
						<a href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Envato Market</a>
					</div>
					<div class="off-canvas-left__current-site -color-themeforest" bis_skin_checked="1">
						<span class="off-canvas-left__site-title"> Web Themes &amp; Templates </span>
						<a class="off-canvas-left__current-site-toggle -white-arrow -color-themeforest" data-view="dropdown" data-dropdown-target=".off-canvas-left__sites" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"></a>
					</div>
					<div class="off-canvas-left__sites is-hidden" id="off-canvas-sites" bis_skin_checked="1">
						<a class="off-canvas-left__site" href="hhttps://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
							<span class="off-canvas-left__site-title"> Code </span>
							<i class="e-icon -icon-right-open"></i>
						</a>
						<a class="off-canvas-left__site" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
							<span class="off-canvas-left__site-title"> Video </span>
							<i class="e-icon -icon-right-open"></i>
						</a>
						<a class="off-canvas-left__site" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
							<span class="off-canvas-left__site-title"> Audio </span>
							<i class="e-icon -icon-right-open"></i>
						</a>
						<a class="off-canvas-left__site" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
							<span class="off-canvas-left__site-title"> Graphics </span>
							<i class="e-icon -icon-right-open"></i>
						</a>
						<a class="off-canvas-left__site" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
							<span class="off-canvas-left__site-title"> Photos </span>
							<i class="e-icon -icon-right-open"></i>
						</a>
						<a class="off-canvas-left__site" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
							<span class="off-canvas-left__site-title"> 3D Files </span>
							<i class="e-icon -icon-right-open"></i>
						</a>
					</div>
					<div class="off-canvas-left__search" bis_skin_checked="1">
						<form id="search" action="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>" accept-charset="UTF-8" method="get">
							<div class="search-field -border-none" bis_skin_checked="1">
								<div class="search-field__input" bis_skin_checked="1">
									<input id="term" name="term" type="search" placeholder="Search" class="search-field__input-field">
								</div>
								<button class="search-field__button" type="submit">
									<i class="e-icon -icon-search">
										<span class="e-icon__alt">Search</span>
									</i>
								</button>
							</div>
						</form>
					</div>
					<ul>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-all-items" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> All Items </a>
							<ul class="is-hidden" id="off-canvas-all-items">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Files</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Featured Files</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Top New Files</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Follow Feed</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Top Authors</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Top New Authors</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Public Collections</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">View All Categories</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-wordpress" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> WordPress </a>
							<ul class="is-hidden" id="off-canvas-wordpress">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Show all WordPress</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Items</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Blog / Magazine</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">BuddyPress</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Corporate</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Creative</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Directory &amp; Listings</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">eCommerce</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Education</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Elementor</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Entertainment</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Mobile</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Nonprofit</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Real Estate</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Retail</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Technology</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Wedding</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Miscellaneous</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">WordPress Plugins</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-elementor" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> Elementor </a>
							<ul class="is-hidden" id="off-canvas-elementor">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Template Kits</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Plugins</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Themes</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link--empty" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> Hosting </a>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-html" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> HTML </a>
							<ul class="is-hidden" id="off-canvas-html">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Show all HTML</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Items</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Admin Templates</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Corporate</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Creative</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Entertainment</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Mobile</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Nonprofit</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Personal</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Retail</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Specialty Pages</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Technology</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Wedding</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Miscellaneous</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-shopify" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> Shopify </a>
							<ul class="is-hidden" id="off-canvas-shopify">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Show all Shopify</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Items</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Fashion</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Shopping</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Health &amp; Beauty</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Technology</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Entertainment</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Miscellaneous</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link--empty" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> Jamstack </a>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-marketing" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> Marketing </a>
							<ul class="is-hidden" id="off-canvas-marketing">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Show all Marketing</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Items</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Email Templates</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Landing Pages</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Unbounce Landing Pages</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-cms" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> CMS </a>
							<ul class="is-hidden" id="off-canvas-cms">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Show all CMS</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Items</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Concrete5</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Drupal</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">HubSpot CMS Hub</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Joomla</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">MODX Themes</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Moodle</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Webflow</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Weebly</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Miscellaneous</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-ecommerce" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> eCommerce </a>
							<ul class="is-hidden" id="off-canvas-ecommerce">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Show all eCommerce</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Items</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">WooCommerce</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">BigCommerce</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Drupal Commerce</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Easy Digital Downloads</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Ecwid</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Magento</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">OpenCart</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">PrestaShop</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Shopify</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Ubercart</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">VirtueMart</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Zen Cart</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Miscellaneous</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-ui-templates" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> UI Templates </a>
							<ul class="is-hidden" id="off-canvas-ui-templates">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Popular Items</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Figma</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Adobe XD</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Photoshop</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Sketch</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="off-canvas-category-link--empty" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> Plugins </a>
						</li>
						<li>
							<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-more" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> More </a>
							<ul class="is-hidden" id="off-canvas-more">
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Blogging</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Courses</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Facebook Templates</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Free Elementor Templates</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Free WordPress Themes</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Forums</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Ghost Themes</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Tumblr</a>
								</li>
								<li>
									<a class="off-canvas-category-link--sub external-link elements-nav__category-link" target="_blank" data-analytics-view-payload="{&quot;eventName&quot;:&quot;view_promotion&quot;,&quot;contextDetail&quot;:&quot;sub nav&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionName&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" data-analytics-click-payload="{&quot;eventName&quot;:&quot;select_promotion&quot;,&quot;contextDetail&quot;:&quot;sub nav&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionName&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Unlimited Creative Assets</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="elements-nav__category-link external-link" target="_blank" data-analytics-view-payload="{&quot;eventName&quot;:&quot;view_promotion&quot;,&quot;contextDetail&quot;:&quot;site switcher&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionName&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" data-analytics-click-payload="{&quot;eventName&quot;:&quot;select_promotion&quot;,&quot;contextDetail&quot;:&quot;site switcher&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionName&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Unlimited Downloads</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="page__off-canvas--right overflow" bis_skin_checked="1">
				<div class="off-canvas-right" bis_skin_checked="1">
					<a class="off-canvas-right__link--cart" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"> Guest Cart <div class="shopping-cart-summary is-empty" data-view="cartCount" bis_skin_checked="1">
							<span class="js-cart-summary-count shopping-cart-summary__count">0</span>
							<i class="e-icon -icon-cart"></i>
						</div>
					</a>
					<a class="off-canvas-right__link" href="https://bunbodongba-foodd.pages.dev/amp/"> Create an Envato Account <i class="e-icon -icon-envato"></i>
					</a>
					<a class="off-canvas-right__link" href="https://bunbodongba-foodd.pages.dev/amp/"> Sign In <i class="e-icon -icon-login"></i>
					</a>
				</div>
			</div>
			<div class="page__canvas" bis_skin_checked="1">
				<div class="canvas" bis_skin_checked="1">
					<div class="canvas__header" bis_skin_checked="1">
						<header class="site-header">
							<div class="site-header__mini is-hidden-desktop" bis_skin_checked="1">
								<div class="header-mini" bis_skin_checked="1">
									<div class="header-mini__button--cart" bis_skin_checked="1">
										<a class="btn btn--square" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
											<svg width="14px" height="14px" viewBox="0 0 14 14" class="header-mini__button-cart-icon" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
												<title>Cart</title>
												<path d="M 0.009 1.349 C 0.009 1.753 0.347 2.086 0.765 2.086 C 0.765 2.086 0.766 2.086 0.767 2.086 L 0.767 2.09 L 2.289 2.09 L 5.029 7.698 L 4.001 9.507 C 3.88 9.714 3.812 9.958 3.812 10.217 C 3.812 11.028 4.496 11.694 5.335 11.694 L 14.469 11.694 L 14.469 11.694 C 14.886 11.693 15.227 11.36 15.227 10.957 C 15.227 10.552 14.886 10.221 14.469 10.219 L 14.469 10.217 L 5.653 10.217 C 5.547 10.217 5.463 10.135 5.463 10.031 L 5.487 9.943 L 6.171 8.738 L 11.842 8.738 C 12.415 8.738 12.917 8.436 13.175 7.978 L 15.901 3.183 C 15.96 3.08 15.991 2.954 15.991 2.828 C 15.991 2.422 15.65 2.09 15.23 2.09 L 3.972 2.09 L 3.481 1.077 L 3.466 1.043 C 3.343 0.79 3.084 0.612 2.778 0.612 C 2.777 0.612 0.765 0.612 0.765 0.612 C 0.347 0.612 0.009 0.943 0.009 1.349 Z M 3.819 13.911 C 3.819 14.724 4.496 15.389 5.335 15.389 C 6.171 15.389 6.857 14.724 6.857 13.911 C 6.857 13.097 6.171 12.434 5.335 12.434 C 4.496 12.434 3.819 13.097 3.819 13.911 Z M 11.431 13.911 C 11.431 14.724 12.11 15.389 12.946 15.389 C 13.784 15.389 14.469 14.724 14.469 13.911 C 14.469 13.097 13.784 12.434 12.946 12.434 C 12.11 12.434 11.431 13.097 11.431 13.911 Z"></path>
											</svg>
											<span class="is-hidden">Cart</span>
											<span class="header-mini__button-cart-cart-amount is-hidden"> 0 </span>
										</a>
									</div>
									<div class="header-mini__button--account" bis_skin_checked="1">
										<a class="btn btn--square" data-view="offCanvasNavToggle" data-off-canvas="right" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
											<i class="e-icon -icon-person"></i>
											<span class="is-hidden">Account</span>
										</a>
									</div>
									<div class="header-mini__button--categories" bis_skin_checked="1">
										<a class="btn btn--square" data-view="offCanvasNavToggle" data-off-canvas="left" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
											<i class="e-icon -icon-hamburger"></i>
											<span class="is-hidden">Sites, Search &amp; Categories</span>
										</a>
									</div>
									<div class="header-mini__logo" bis_skin_checked="1">
										<a href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
											<img alt="Logo Baru" src="https://jpterus66.calcufast.xyz/JPTERUS66/logo.png" style="height:40px; width:auto; display:inline-block;">
										</a>
									</div>
								</div>
							</div>
							<div class="global-header is-hidden-tablet-and-below" bis_skin_checked="1">
								<div class="grid-container -layout-wide" bis_skin_checked="1">
									<div class="global-header__wrapper" bis_skin_checked="1">
										<div style="display: flex; align-items: center; gap: 10px;">
										<a href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
											<img height="80" alt="Envato Market" class="global-header__logo" src="https://jpterus66.calcufast.xyz/JPTERUS66/logo.png">
										</a>

										
										</div>

										<nav class="global-header-menu" role="navigation">
											<ul class="global-header-menu__list">
												<li class="global-header-menu__list-item">
													<a class="global-header-menu__link" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
														<span class="global-header-menu__link-text"><?php echo $BRANDS ?></span>
													</a>
												</li>
												<li class="global-header-menu__list-item">
													<a class="global-header-menu__link" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
														<span class="global-header-menu__link-text">SITUS <?php echo $BRANDS ?></span>
													</a>
												</li>
												<li data-view="globalHeaderMenuDropdownHandler" class="global-header-menu__list-item--with-dropdown">
													<a data-lazy-load-trigger="mouseover" class="global-header-menu__link" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
														<svg width="16px" height="16px" viewBox="0 0 16 16" class="global-header-menu__icon" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
															<title>Menu</title>
															<path d="M3.5 2A1.5 1.5 0 0 1 5 3.5 1.5 1.5 0 0 1 3.5 5 1.5 1.5 0 0 1 2 3.5 1.5 1.5 0 0 1 3.5 2zM8 2a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 8 5a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 8 2zM12.5 2A1.5 1.5 0 0 1 14 3.5 1.5 1.5 0 0 1 12.5 5 1.5 1.5 0 0 1 11 3.5 1.5 1.5 0 0 1 12.5 2zM3.5 6.5A1.5 1.5 0 0 1 5 8a1.5 1.5 0 0 1-1.5 1.5A1.5 1.5 0 0 1 2 8a1.5 1.5 0 0 1 1.5-1.5zM8 6.5A1.5 1.5 0 0 1 9.5 8 1.5 1.5 0 0 1 8 9.5 1.5 1.5 0 0 1 6.5 8 1.5 1.5 0 0 1 8 6.5zM12.5 6.5A1.5 1.5 0 0 1 14 8a1.5 1.5 0 0 1-1.5 1.5A1.5 1.5 0 0 1 11 8a1.5 1.5 0 0 1 1.5-1.5zM3.5 11A1.5 1.5 0 0 1 5 12.5 1.5 1.5 0 0 1 3.5 14 1.5 1.5 0 0 1 2 12.5 1.5 1.5 0 0 1 3.5 11zM8 11a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 8 14a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 8 11zM12.5 11a1.5 1.5 0 0 1 1.5 1.5 1.5 1.5 0 0 1-1.5 1.5 1.5 1.5 0 0 1-1.5-1.5 1.5 1.5 0 0 1 1.5-1.5z"></path>
														</svg>
														<span class="global-header-menu__link-text">BANDAR TOTO MACAU</span>
													</a>
												<li class="global-header-menu__list-item -background-light -border-radius">
													<a id="spec-link-cart" class="global-header-menu__link h-pr1" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
														<svg width="16px" height="16px" viewBox="0 0 16 16" class="global-header-menu__icon global-header-menu__icon-cart" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
															<title>Cart</title>
															<path d="M 0.009 1.349 C 0.009 1.753 0.347 2.086 0.765 2.086 C 0.765 2.086 0.766 2.086 0.767 2.086 L 0.767 2.09 L 2.289 2.09 L 5.029 7.698 L 4.001 9.507 C 3.88 9.714 3.812 9.958 3.812 10.217 C 3.812 11.028 4.496 11.694 5.335 11.694 L 14.469 11.694 L 14.469 11.694 C 14.886 11.693 15.227 11.36 15.227 10.957 C 15.227 10.552 14.886 10.221 14.469 10.219 L 14.469 10.217 L 5.653 10.217 C 5.547 10.217 5.463 10.135 5.463 10.031 L 5.487 9.943 L 6.171 8.738 L 11.842 8.738 C 12.415 8.738 12.917 8.436 13.175 7.978 L 15.901 3.183 C 15.96 3.08 15.991 2.954 15.991 2.828 C 15.991 2.422 15.65 2.09 15.23 2.09 L 3.972 2.09 L 3.481 1.077 L 3.466 1.043 C 3.343 0.79 3.084 0.612 2.778 0.612 C 2.777 0.612 0.765 0.612 0.765 0.612 C 0.347 0.612 0.009 0.943 0.009 1.349 Z M 3.819 13.911 C 3.819 14.724 4.496 15.389 5.335 15.389 C 6.171 15.389 6.857 14.724 6.857 13.911 C 6.857 13.097 6.171 12.434 5.335 12.434 C 4.496 12.434 3.819 13.097 3.819 13.911 Z M 11.431 13.911 C 11.431 14.724 12.11 15.389 12.946 15.389 C 13.784 15.389 14.469 14.724 14.469 13.911 C 14.469 13.097 13.784 12.434 12.946 12.434 C 12.11 12.434 11.431 13.097 11.431 13.911 Z"></path>
														</svg>
														<span class="global-header-menu__link-cart-amount is-hidden" data-view="headerCartCount" data-test-id="header_cart_count">0</span>
													</a>
												</li>
												<li class="global-header-menu__list-item -background-light -border-radius">
													<a class="global-header-menu__link h-pl1" data-view="modalAjax" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
														<span id="spec-user-username" class="global-header-menu__link-text">BANDAR TOGEL ONLINE</span>
													</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
							<div class="site-header__categories is-hidden-tablet-and-below" bis_skin_checked="1">
								<div class="header-categories" bis_skin_checked="1">
									<div class="grid-container -layout-wide" bis_skin_checked="1">
										<ul class="header-categories__links">
											<li class="header-categories__links-item">
												<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-0-dropdown" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"><?php echo $BRANDS ?></a>
											</li>
											<li class="header-categories__links-item">
												<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-1-dropdown" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>"><?php echo $BRANDS ?> Login</a>
											</li>
											<li class="header-categories__links-item">
												<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-2-dropdown" href="https://bmtarkhis.com/industry/?daftar=<?php echo $randomUrl ?>"><?php echo $randomKeyword ?></a>
											</li>
											<li class="header-categories__links-item">
												<a class="header-categories__main-link header-categories__main-link--empty" href="https://badoom.life/media/?daftar=<?php echo $randomUrl2 ?>"><?php echo $randomKeyword2 ?></a>
											</li>
											<li class="header-categories__links-item">
												<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-5-dropdown" href="https://batdongsantoanquoc.net/property/?daftar=<?php echo $randomUrl3 ?>"><?php echo $randomKeyword3 ?></a>
											</li>
											<li class="header-categories__links-item">
												<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-5-dropdown" href="https://ati.az/storage/trade/?daftar=<?php echo $randomUrl4 ?>"><?php echo $randomKeyword4 ?></a>
											</li>
											<li class="header-categories__links-item">
												<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-5-dropdown" href="https://aveuda.ru/health/?daftar=<?php echo $randomUrl5 ?>"><?php echo $randomKeyword5 ?></a>
											</li>
										</ul>
										<div class="header-categories__search" bis_skin_checked="1">
											<form id="search" data-view="searchField" action="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>" accept-charset="UTF-8" method="get">
												<div class="search-field -border-light h-ml2" bis_skin_checked="1">
													<div class="search-field__input" bis_skin_checked="1">
														<input id="term" name="term" class="js-term search-field__input-field" type="search" placeholder="<?php echo $BRANDS ?>">
													</div>
													<button class="search-field__button" type="submit">
														<i class="e-icon -icon-search">
															<span class="e-icon__alt">Search</span>
														</i>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<style>.n-columns-2{width:100vw;display:grid;grid-template-columns:repeat(2,1fr);font-weight:700}.n-columns-2 a{text-align:center}.login,.register{color:#ffffff;padding:13px 10px}.login,.login-button{background:linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%); border: 3px  solid #000000;}.register,.register-button{background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%); border: 3px  solid #000000;}</style>
							<div class="n-columns-2" style="font-size: 20px;">
								<a href="https://bunbodongba-foodd.pages.dev/amp/" rel="nofollow noreferrer" class="login">DAFTAR</a>
								<a href="https://bunbodongba-foodd.pages.dev/amp/" rel="nofollow noreferrer" class="register">MASUK</a>
							</div>
						</header>
					</div>
					<div class="js-canvas__body canvas__body" bis_skin_checked="1">
						<div class="grid-container" bis_skin_checked="1"></div>
						<div class="context-header " bis_skin_checked="1">
							<div class="grid-container " bis_skin_checked="1">
								<nav class="breadcrumbs h-text-truncate  ">
									<a class="js-breadcrumb-category" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Slot Online</a>
                                    <a class="js-breadcrumb-category" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Daftar Slot Online</a>
									<a href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>" class="js-breadcrumb-category"><?php echo $BRANDS ?></a>
									<a class="js-breadcrumb-category" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Bun Bo Dong Ba Kuliner Tradisional Vietnam</a>
								</nav>
								<div class="item-header" data-view="itemHeader" bis_skin_checked="1">
									<div class="item-header__top" bis_skin_checked="1">
										<div class="item-header__title" bis_skin_checked="1">
											<h1 class="t-heading -color-inherit -size-l h-m0 is-hidden-phone"><?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam</h1>
											<h1 class="t-heading -color-inherit -size-xs h-m0 is-hidden-tablet-and-above"> <?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam </h1>
										</div>
										<div class="item-header__price is-hidden-desktop" bis_skin_checked="1">
											<a class="js-item-header__cart-button e-btn--3d -color-primary -size-m" rel="nofollow" title="Add to Cart" data-view="modalAjax" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
												<span class="item-header__cart-button-icon">
													<i class="e-icon -icon-cart -margin-right"></i>
												</span>
												<span class="t-heading -size-m -color-light -margin-none">
													<b class="t-currency">
														<span class="js-item-header__price">$10</span>
													</b>
												</span>
											</a>
										</div>
									</div>
								</div>
								<!-- Desktop Item Navigation -->
								<div class="is-hidden-tablet-and-below page-tabs" bis_skin_checked="1">
									<ul>
										<li class="selected">
											<a class="js-item-navigation-item-details t-link -decoration-none" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Item Details</a>
										</li>
										<li>
											<a class="js-item-navigation-reviews t-link -decoration-none" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
												<span>Reviews</span>
												<span>
													<div class="rating-detailed-small" bis_skin_checked="1">
														<div class="rating-detailed-small__header" bis_skin_checked="1">
															<div class="rating-detailed-small__stars" bis_skin_checked="1">
																<div class="rating-detailed-small-center__star-rating" bis_skin_checked="1">
																	<i class="e-icon -icon-star"></i>
																	<i class="e-icon -icon-star"></i>
																	<i class="e-icon -icon-star"></i>
																	<i class="e-icon -icon-star"></i>
																	<i class="e-icon -icon-star"></i>
																</div> 5.00 <span class="is-visually-hidden">5.00 stars</span>
															</div>
														</div>
													</div>
												</span>
												<span class="item-navigation-reviews-comments">9,871</span>
											</a>
										</li>
										<li>
											<a class="js-item-navigation-comments t-link -decoration-none" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
												<span>Comments</span>
												<span class="item-navigation-reviews-comments">18,777</span>
											</a>
										</li>
										<li>
											<a class="js-item-navigation-support t-link -decoration-none" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">Support</a>
										</li>
									</ul>
								</div>
								<!-- Tablet or below Item Navigation -->
								<div class="page-tabs--dropdown" data-view="replaceItemNavsWithRemote" data-target=".js-remote" bis_skin_checked="1">
									<div class="page-tabs--dropdown__slt-custom-wlabel" bis_skin_checked="1">
										<div class="slt-custom-wlabel--page-tabs--dropdown" bis_skin_checked="1">
											<label>
												<span class="js-label"> Item Details </span>
												<span class="slt-custom-wlabel__arrow">
													<i class="e-icon -icon-arrow-fill-down"></i>
												</span>
											</label>
											<select class="js-remote">
												<option selected="selected" data-url="/item/marketica-marketplace-wordpress-theme/8988002">Item Details</option>
												<option data-url="/item/marketica-marketplace-wordpress-theme/reviews/8988002"> Reviews (75)</option>
												<option data-url="/item/marketica-marketplace-wordpress-theme/8988002/comments"> Comments (802)</option>
												<option data-url="/item/marketica-marketplace-wordpress-theme/8988002/support"> Support</option>
											</select>
										</div>
									</div>
								</div>
								<div class="page-tabs" bis_skin_checked="1">
									<ul class="right item-bookmarking__left-icons_hidden" data-view="bookmarkStatesLoader">
										<li class="js-favorite-widget item-bookmarking__control_icons--favorite" data-item-id="8988002">
											<a data-view="modalAjax" class="t-link -decoration-none" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
												<span class="item-bookmarking__control--label">Add to Favorites</span>
											</a>
										</li>
										<li class="js-collection-widget item-bookmarking__control_icons--collection" data-item-id="8988002">
											<a data-view="modalAjax" class="t-link -decoration-none" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
												<span class="item-bookmarking__control--label">Add to Collection</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="content-main" id="content" bis_skin_checked="1">
							<div class="grid-container" bis_skin_checked="1">
								<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
									//
									< ![CDATA[window.GtmMeasurements.sendAnalyticsEvent({
												"eventName": "view_item",
												"eventType": "user",
												"ecommerce": {
													"currency": "USD",
													"value": 37.0,
													"items": [{
														"affiliation": "themeforest",
														"item_id": 8988002,
														"item_name": "<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam",
														"item_brand": "tokopress",
														"item_category": "wordpress",
														"item_category2": "ecommerce",
														"item_category3": "woocommerce",
														"price": 37.0,
														"quantity": 1,
														"item_add_on": "bundle_6month",
														"item_variant": "regular"
													}]
												}
											});
											//]]>
								</script>
								<div bis_skin_checked="1">
									<link href="https://jpterus66.calcufast.xyz/JPTERUS66/logo.png">
									<div class="content-s " bis_skin_checked="1">
										<div class="box--no-padding" bis_skin_checked="1">
											<div class="item-preview live-preview-btn--blue -preview-live" bis_skin_checked="1">
												<a target="_blank" href="https://bunbodongba-foodd.pages.dev/amp/" style="text-decoration:none;">
													<img alt="<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam" src="https://jpterus66.calcufast.xyz/image/image9.png" style="width:100%;max-width:500px;height:auto;display:block;margin:20px auto;">
												</a>                                              
												<div class="js- item-preview-image__gallery" data-title="<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam" data-url="marketica-marketplace-wordpress-theme/screenshots/modal/8988002" bis_skin_checked="1">
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/00-marketica-preview-sale37.jpg">MARKETICA_PREVIEW/00-marketica-preview-sale37.jpg</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/01_marketica2_homepage.png">MARKETICA_PREVIEW/01_marketica2_homepage.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/02_marketica2_shop_page.png">MARKETICA_PREVIEW/02_marketica2_shop_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/03_marketica2_single_product_page.png">MARKETICA_PREVIEW/03_marketica2_single_product_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/04_marketica2_cart_page.png">MARKETICA_PREVIEW/04_marketica2_cart_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/05_marketica2_checkout_page.png">MARKETICA_PREVIEW/05_marketica2_checkout_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/06_marketica2_myaccount_login_page.png">MARKETICA_PREVIEW/06_marketica2_myaccount_login_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/07_marketica2_plan_and_pricing_page.png">MARKETICA_PREVIEW/07_marketica2_plan_and_pricing_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/08_marketica2_team_members_page.png">MARKETICA_PREVIEW/08_marketica2_team_members_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/09_marketica2_contact_page_template.png">MARKETICA_PREVIEW/09_marketica2_contact_page_template.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/10_marketica2_blog_page.png">MARKETICA_PREVIEW/10_marketica2_blog_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/11_marketica2_blog_post_formats.png">MARKETICA_PREVIEW/11_marketica2_blog_post_formats.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/12_marketica2_single_product_page.png">MARKETICA_PREVIEW/12_marketica2_single_product_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/13_marketica2_theme_customizer.png">MARKETICA_PREVIEW/13_marketica2_theme_customizer.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/14_marketica2_visualcomposer_templates.png">MARKETICA_PREVIEW/14_marketica2_visualcomposer_templates.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/15_marketica2_tablet_view.png">MARKETICA_PREVIEW/15_marketica2_tablet_view.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/16_marketica2_tablet_view_offcanvas_menu.png">MARKETICA_PREVIEW/16_marketica2_tablet_view_offcanvas_menu.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/17_marketica2_themeoptions_header.png">MARKETICA_PREVIEW/17_marketica2_themeoptions_header.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/18_marketica2_themeoptions_footer.png">MARKETICA_PREVIEW/18_marketica2_themeoptions_footer.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/19_marketica2_themeoptions_contact.png">MARKETICA_PREVIEW/19_marketica2_themeoptions_contact.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/20_marketica2_themeoptions_woocommerce.png">MARKETICA_PREVIEW/20_marketica2_themeoptions_woocommerce.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/21_marketica2_wcvendors_user_page.png">MARKETICA_PREVIEW/21_marketica2_wcvendors_user_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/22_marketica2_wcvendors_vendor_page.png">MARKETICA_PREVIEW/22_marketica2_wcvendors_vendor_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/23_marketica2_wcvendors_vendor_dashboard.png">MARKETICA_PREVIEW/23_marketica2_wcvendors_vendor_dashboard.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/24_marketica2_wcvendors_shop_settings.png">MARKETICA_PREVIEW/24_marketica2_wcvendors_shop_settings.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/25_marketica2_dokan_vendor_store_page.png">MARKETICA_PREVIEW/25_marketica2_dokan_vendor_store_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/26_marketica2_dokan_vendor_review_page.png">MARKETICA_PREVIEW/26_marketica2_dokan_vendor_review_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/27_marketica2_dokan_vendor_dashboard_page.png">MARKETICA_PREVIEW/27_marketica2_dokan_vendor_dashboard_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/28_marketica2_dokan_vendor_dashboard_products_page.png">MARKETICA_PREVIEW/28_marketica2_dokan_vendor_dashboard_products_page.png</a>
													<a class="is-hidden" href="https://s3.envato.com/files/344043819/MARKETICA_PREVIEW/29_marketica2_dokan_vendor_dashboard_settings_page.png">MARKETICA_PREVIEW/29_marketica2_dokan_vendor_dashboard_settings_page.png</a>
												</div>
												<div class="item-preview__actions" bis_skin_checked="1">
													<div id="fullscreen" class="item-preview__preview-buttons" bis_skin_checked="1">
														<div class="promo-under-actions"></div>
													</div>
												</div>
											</div>
										</div>
										<div data-view="toggleItemDescription" bis_skin_checked="1">
											<div class="js-item-togglable-content has-toggle" bis_skin_checked="1">
												<div class="js-item-description-toggle item-description-toggle" bis_skin_checked="1">
													<a class="item-description-toggle__link" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
														<span>Show More <i class="e-icon -icon-chevron-down"></i>
														</span>
														<span class="item-description-toggle__less">Show Less <i class="e-icon -icon-chevron-down -rotate-180"></i>
														</span>
													</a>
												</div>
											</div>
										</div>
                                        <div style="background-color:#000000; padding:20px; border-radius:8px;">
<p style="color: rgb(255, 255, 255);">
  <a style="color: rgb(255, 0, 195);;" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">
    <?php echo $BRANDS ?>
  </a> 
dan Bun Bo Dong Ba menyajikan cita rasa Vietnam asli melalui makanan Hue yang legendaris dan menggugah selera. Restoran ini menggunakan resep tradisional turun-temurun yang menggunakan bahan-bahan segar dan rempah-rempah yang dipilih secara eksklusif. Bun Bo Dong Ba adalah simbol budaya Vietnam yang kaya sejarah dan rasa. Pecinta masakan Asia akan menyukai tempat ini karena suasananya yang hangat dan pelayanan yang ramah.</p>
<p style="color: rgb(255, 255, 255);">Link Alternatif  <a href="https://linkr.bio/jpterus66" style=" color: rgb(255, 0, 195);">JPTERUS66</a> » <strong> <a href="https://linkr.bio/jpterus66" style=" color: rgb(255, 0, 195);">https://linkr.bio/jpterus66</a></strong></p>
										</div><br>
										<style>:root{--blade-cut:14px;--thick:2px}.cta-blade{display:flex;flex-wrap:wrap;gap:16px;margin:28px 0;justify-content:center}.cta-blade .blade{--g1:#5ee7ff;--g2:#8b5cf6;position:relative;isolation:isolate;flex:1 1 48%;min-width:240px;text-decoration:none;text-transform:uppercase;letter-spacing:.6px;font-weight:800;font-size:16px;display:grid;place-items:center;padding:18px 20px;color:#000;background:radial-gradient(120% 180% at 120% -20%,#0d09dd 0%,#0d09dd 40%) , linear-gradient(180deg,rgba(12,12,16,.92),rgba(8,8,12,.92));clip-path:polygon(var(--blade-cut) 0%,100% 0%,100% calc(100% - var(--blade-cut)),calc(100% - var(--blade-cut)) 100%,0% 100%,0% var(--blade-cut));box-shadow:0 12px 30px rgba(0,0,0,.45) , inset 0 0 0 1px rgba(255,255,255,.06);transition:transform .28s ease , box-shadow .28s ease , filter .28s ease;overflow:hidden}.cta-blade .blade::before{content:"";position:absolute;inset:0;z-index:-1;padding:var(--thick);background:conic-gradient(from 0deg,var(--g1),var(--g2),#0fa,#0370ff,var(--g1));background-size:200% 200%;animation:spinGlow 6s linear infinite;clip-path:polygon(var(--blade-cut) 0%,100% 0%,100% calc(100% - var(--blade-cut)),calc(100% - var(--blade-cut)) 100%,0% 100%,0% var(--blade-cut));-webkit-mask:linear-gradient(#000 0 0) content-box , linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.9}.cta-blade .blade::after{content:"";position:absolute;left:-40px;top:-20%;width:120px;height:140%;transform:skewX(-18deg);background:linear-gradient(90deg,rgba(255,255,255,.0),rgba(255,255,255,.18),rgba(255,255,255,0));mix-blend-mode:screen;opacity:.35;transition:opacity .3s ease;pointer-events:none}.cta-blade .blade:hover{transform:translateY(-4px);box-shadow:0 18px 36px rgba(0,0,0,.55) , 0 0 28px rgba(139,92,246,.32);filter:saturate(1.2)}.cta-blade .blade:hover::after{opacity:.55}.cta-blade .masuk{--g1:#22d3ee;--g2:#6366f1}.cta-blade .daftar{--g1:#f59e0b;--g2:#4463ef}.cta-blade .blade:focus-visible{outline:none;box-shadow:0 0 0 3px rgba(255,255,255,.18) , 0 0 0 6px rgba(99,102,241,.35)}@keyframes spinGlow {
												0% {
													background-position: 0% 50%;
												}

												50% {
													background-position: 100% 50%;
												}

												100% {
													background-position: 0% 50%;
												}
											}@media (max-width:600px){.cta-blade{flex-direction:column}.cta-blade .blade{flex:1 1 100%;min-width:unset}}</style>
										<div data-view="itemPageScrollEvents" bis_skin_checked="1"></div>
									</div>
									<div class="sidebar-l sidebar-right" bis_skin_checked="1">
										<div class="pricebox-container" bis_skin_checked="1">
											<div class="purchase-panel" bis_skin_checked="1">
												<div id="purchase-form" class="purchase-form" bis_skin_checked="1">
													<form data-view="purchaseForm" data-analytics-has-custom-click="true" data-analytics-click-payload="{&quot;eventName&quot;:&quot;add_to_cart&quot;,&quot;eventType&quot;:&quot;user&quot;,&quot;quantityUpdate&quot;:false,&quot;ecommerce&quot;:{&quot;currency&quot;:&quot;USD&quot;,&quot;value&quot;:37.0,&quot;items&quot;:[{&quot;affiliation&quot;:&quot;themeforest&quot;,&quot;item_id&quot;:8988002,&quot;item_name&quot;:&quot;<?php echo $BRANDS ?> >> Bun Bo Dong Ba Kuliner Tradisional Vietnam&quot;,&quot;item_brand&quot;:&quot;tokopress&quot;,&quot;item_category&quot;:&quot;wordpress&quot;,&quot;item_category2&quot;:&quot;ecommerce&quot;,&quot;item_category3&quot;:&quot;woocommerce&quot;,&quot;price&quot;:&quot;37&quot;,&quot;quantity&quot;:1}]}}" action="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>" accept-charset="UTF-8" method="post">
														<input type="hidden" name="authenticity_token" value="o7V7LGbBjnF9HgzqsCOek0VUbYNaqFcrL72zjeu3cGTv2_7pn5UklFm7XFtDaDCfkbbeD4zdIzwPzjrUhXtbHQ" autocomplete="off">
														<div bis_skin_checked="1">
															<div data-view="itemVariantSelector" data-id="8988002" data-cookiebot-enabled="true" bis_skin_checked="1">
																<div class="purchase-form__selection" bis_skin_checked="1">
																	<span class="purchase-form__license-type">
																		<span data-view="flyout" class="flyout">
																			<span class="js-license-selector__chosen-license purchase-form__license-dropdown">General License</span>
																			<div class="js-flyout__body flyout__body -padding-side-removed" bis_skin_checked="1">
																				<span class="js-flyout__triangle flyout__triangle"></span>
																				<div class="license-selector" data-view="licenseSelector" bis_skin_checked="1">
																					<div class="js-license-selector__item license-selector__item" data-license="regular" data-name="Regular License" bis_skin_checked="1">
																						<div class="license-selector__license-type" bis_skin_checked="1">
																							<span class="t-heading -size-xxs">Regular License</span>
																							<span class="js-license-selector__selected-label e-text-label -color-green -size-s " data-license="regular">Selected</span>
																						</div>
																						<div class="license-selector__price" bis_skin_checked="1">
																							<span class="t-heading -size-m h-m0">
																								<b class="t-currency">
																									<span class="">$32</span>
																								</b>
																							</span>
																						</div>
																						<div class="license-selector__description" bis_skin_checked="1">
																							<p class="t-body -size-m h-m0"> Use, by you or one client, in a single end product which end users <strong>are not</strong> charged for. The total price includes the item price and a buyer fee. </p>
																						</div>
																					</div>
																				</div>
																				<div class="flyout__link" bis_skin_checked="1">
																					<p class="t-body -size-m h-m0">
																						<a class="t-link -decoration-reversed" target="_blank" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">View license details</a>
																					</p>
																				</div>
																			</div>
																		</span>
																		<input type="hidden" name="license" id="license" value="regular" class="js-purchase-default-license" data-license="regular" autocomplete="off">
																	</span>
																	<div class="js-purchase-heading purchase-form__price t-heading -size-xxl" bis_skin_checked="1">
																		<b class="t-currency">
																			<span class="js-purchase-price">$10</span>
																		</b>
																	</div>
																</div>
																<div class="purchase-form__license js-purchase-license is-active" data-license="regular" bis_skin_checked="1">
																	<price class="js-purchase-license-prices" data-price-prepaid="$57" data-license="regular" data-price-prepaid-upgrade="$46.38" data-support-upgrade-price="$15.83" data-support-upgrade-saving="$12" data-support-extension-price="$15.63" data-support-extension-saving="$6.25" data-support-renewal-price="$41.17"></price>
																</div>
																<div class="purchase-form__support" bis_skin_checked="1">
																	<ul class="t-icon-list -font-size-s -icon-size-s -offset-flush">
																		<li class="t-icon-list__item -icon-ok">
																			<span class="is-visually-hidden">Included:</span> <?php echo $BRANDS ?>
																		</li>
																		<li class="t-icon-list__item -icon-ok">
																			<span class="is-visually-hidden">Included:</span> BANDAR TOTO MACAU
																		</li>
																		<li class="t-icon-list__item -icon-ok">
																			<span class="is-visually-hidden">Included:</span> BANDAR TOGEL ONLINE
																		</li>
																		<li class="t-icon-list__item -icon-ok">
																			<span class="is-visually-hidden">Included:</span> DATA MACAU TERPERCAYA
																		<li class="t-icon-list__item -icon-ok">
																			<span class="is-visually-hidden">Included:</span> TOGEL ONLINE RESMI <span class="purchase-form__author-name"></span>
																			<a class="t-link -decoration-reversed js-support__inclusion-link" data-view="modalAjax">
																				<svg width="12px" height="13px" viewBox="0 0 12 13" class="" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
																					<title>More Info</title>
																					<path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.5a6 6 0 1 0 12 0 6 6 0 0 0-12 0zm7.739-3.17a.849.849 0 0 1-.307.664.949.949 0 0 1-.716.273c-.273 0-.529-.102-.716-.272a.906.906 0 0 1-.307-.665c0-.256.102-.512.307-.682.187-.17.443-.273.716-.273.273 0 .528.102.716.273a.908.908 0 0 1 .307.682zm-.103 6.34-.119.46c-.34.137-.613.24-.818.307a2.5 2.5 0 0 1-.716.103c-.409 0-.733-.103-.954-.307a.953.953 0 0 1-.341-.767c0-.12 0-.256.017-.375.017-.12.05-.273.085-.426l.426-1.517a7.14 7.14 0 0 1 .103-.41c.017-.119.034-.238.034-.357a.582.582 0 0 0-.12-.41c-.085-.068-.238-.119-.46-.119-.12 0-.239.017-.34.051-.069.03-.132.047-.189.064-.042.012-.082.024-.119.038l.12-.46c.234-.102.468-.18.69-.253l.11-.037c.24-.085.478-.119.734-.119.409 0 .733.102.954.307.222.187.341.477.341.784 0 .068 0 .187-.017.34v.003a2.173 2.173 0 0 1-.085.458l-.427 1.534-.102.41v.002c-.017.119-.034.237-.034.356 0 .204.051.34.136.409.137.085.307.119.46.102a1.3 1.3 0 0 0 .359-.051c.085-.051.17-.085.272-.12z" fill="#0084B4"></path>
																				</svg>
																			</a>
																		</li>
																	</ul>
																	<div class="purchase-form__upgrade purchase-form__upgrade--before-after-price" bis_skin_checked="1">
																		<div class="purchase-form__upgrade-checkbox purchase-form__upgrade-checkbox--before-after-price" bis_skin_checked="1">
																			<input type="hidden" name="support" id="support_default" value="bundle_6month" class="js-support__default" autocomplete="off">
																			<input type="checkbox" name="support" id="support" value="bundle_12month" class="js-support__option">
																		</div>
																		<div class="purchase-form__upgrade-info" bis_skin_checked="1">
																			<label class="purchase-form__label purchase-form__label--before-after-price" for="support"> Extend support to 5 months <span class="purchase-form__price purchase-form__price--before-after-price t-heading -size-xs h-pull-right">
																					<span class="js-renewal__price t-currency purchase-form__renewal-price purchase-form__renewal-price--strikethrough">$100</span>
																					<b class="t-currency">
																						<span class="js-support__price">$10</span>
																					</b>
																				</span>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="purchase-form__cta-buttons" bis_skin_checked="1">
																<div class="purchase-form__button" bis_skin_checked="1">
																	<button name="button" type="submit" class="js-purchase__add-to-cart e-btn--3d -color-primary -size-m -width-full">
																		<i class="e-icon -icon-cart -margin-right"></i>
																		<strong>Add to Cart</strong>
																	</button>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div style="background-color:#000000; padding:5px; border-radius:5px; text-align:center; color:#ffffff;">
										© All Rights Reserved <?php echo $BRANDS ?><br>
										Contact the <a href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>" style="color:#ffffff; font-weight:bold;"><?php echo $BRANDS ?></a> Help Team.
									    </div>
                                        <br>
                                        <style>

                                            h2 {
                                              text-align: center;
                                              font-size: 24px;
                                            }                                     
                                            
                                            .<?php echo $BRANDS ?>-faq {
                                              max-width: 700px;
                                              margin: auto;
                                            }                                     
                                            
                                            details {
                                              background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%);
                                              border-radius: 12px;
                                              margin-bottom: 12px;
                                              padding: 14px 18px;
                                              border: 1px solid #ffffff;
                                              box-shadow: 0 4px 10px rgba(0,0,0,0.04);
                                              transition: all .2s ease;
                                              color: #ffffff;
                                            }                                     
                                            
                                            details[open] {
                                              border-color: #3b82f6;
                                              background: #000000;
                                            }                                     
                                            
                                            summary {
                                              cursor: pointer;
                                              font-weight: 600;
                                              font-size: 16px;
                                              list-style: none;
                                            }                                     
                                            
                                            summary::-webkit-details-marker {
                                              display: none;
                                            }                                     
                                            
                                            details p {
                                              margin: 10px 0 0;
                                              line-height: 1.5;
                                              font-size: 14px;
                                              color: #ffffff;
                                            }
                                            </style>
                                            </head>
                                            </div>
										</div>
<div class="testimoni-container">
  <div class="testimoni-wrapper">

    <div class="testimoni-card">
      <p class="testimoni-text">Resep Tradisional Asli: Dipertahankan dari generasi ke generasi untuk menjaga cita rasa orisinal.</p>
      <span class="testimoni-user">— Andra, Semarang <span class="testimoni-date">(20 Okt 2025)</span></span>
    </div>

    <div class="testimoni-card">
      <p class="testimoni-text">Bahan Segar & Alami: Semua bahan dipilih langsung dari petani dan pasar lokal Vietnam.</p>
      <span class="testimoni-user">— Siska, Denpasar <span class="testimoni-date">(21 Okt 2025)</span></span>
    </div>

    <div class="testimoni-card">
      <p class="testimoni-text">Suasana Hangat & Otentik: Menghadirkan pengalaman makan yang kaya budaya dan estetika lokal.</p>
      <span class="testimoni-user">— Kevin, Palembang <span class="testimoni-date">(22 Okt 2025)</span></span>
    </div>

    <div class="testimoni-card">
      <p class="testimoni-text">Dikenal Secara Nasional: Menjadi salah satu ikon kuliner Hue yang diakui secara luas di Vietnam.</p>
      <span class="testimoni-user">— Rara, Balikpapan <span class="testimoni-date">(23 Okt 2025)</span></span>
    </div>
  </div>
</div>
									</div>
									<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
										//
										< ![CDATA[
												// HACK: Google Chrome always scroll the previous page's position on hitting Back button
												// This causes issue with responsive version in which unexpanded item description obscure
												// the scroll position and Chrome will jump to the outer border of bottom
												window.addEventListener('unload', function(e) {
													window.scrollTo(0, 0);
												});
												//]]>
									</script>
								</div>
							</div>
						</div>
						<footer class="footer-cta">
							<div class="cta-footer">
								<a href="https://bunbodongba-foodd.pages.dev/amp/" class="btn login">LOGIN</a>
								<a href="https://bunbodongba-foodd.pages.dev/amp/" class="btn login">DAFTAR</a>
								<a href="https://bunbodongba-foodd.pages.dev/amp/" class="btn login">PROMO</a>
							</div>
						</footer>
						<style>.footer-cta{position:fixed;bottom:0;left:0;right:0;background:#000000;border-top:3px solid #ffffff;padding:12px 18px;z-index:9999}.cta-footer{display:flex;justify-content:space-between;align-items:center;max-width:900px;margin:0 auto;gap:10px}.cta-footer .btn{flex:1;padding:12px 0;font-size:15px;font-weight:700;border-radius:50px;text-decoration:none;text-align:center;color:#ffffff;transition:all .3s ease;margin:0 4px}.cta-footer .login,.cta-footer .daftar,.cta-footer .bonus{background: linear-gradient(to bottom, rgb(255, 0, 195) 0%, rgb(160, 0, 123) 50%, rgb(255, 0, 195) 100%);animation:pulse 1.2s infinite ease-in-out;border-radius:8px;box-shadow:0 0 15px #ffffff;transition:transform .3s ease , box-shadow .3s ease}.cta-footer .login:hover,.cta-footer .daftar:hover,.cta-footer .bonus:hover{transform:scale(1.08);box-shadow:0 0 25px #ffffff}@keyframes pulse {
								0% {
									transform: scale(1);
								}

								50% {
									transform: scale(1.05);
								}

								100% {
									transform: scale(1);
								}
							}</style>
						<div class="is-hidden-phone" bis_skin_checked="1">
							<div id="tooltip-magnifier" class="magnifier" bis_skin_checked="1" style="top: 740.688px; left: 110.562px; display: none;">
								<strong>Portfoliode | Personal CV/Resume &amp; Portfolio Elementor Template Kit</strong>
								<div class="info" bis_skin_checked="1">
									<div class="author-category" bis_skin_checked="1"> by <span class="author">tokopress</span>
									</div>
									<div class="price" bis_skin_checked="1">
										<span class="cost">
											<sup>$</sup>24 </span>
									</div>
								</div>
								<div class="footer" bis_skin_checked="1">
									<span class="category">Template Kits / Elementor / Creative &amp; Design</span>
									<span class="currency-tax-notice">Price is in US dollars and excludes tax and handling fees</span>
								</div>
							</div>
							<div id="landscape-image-magnifier" class="magnifier" bis_skin_checked="1">
								<div class="size-limiter" bis_skin_checked="1"></div>
								<strong></strong>
								<div class="info" bis_skin_checked="1">
									<div class="author-category" bis_skin_checked="1"> by <span class="author"></span>
									</div>
									<div class="price" bis_skin_checked="1">
										<span class="cost"></span>
									</div>
								</div>
								<div class="footer" bis_skin_checked="1">
									<span class="category"></span>
									<span class="currency-tax-notice">Price is in US dollars and excludes tax and handling fees</span>
								</div>
							</div>
							<div id="portrait-image-magnifier" class="magnifier" bis_skin_checked="1">
								<div class="size-limiter" bis_skin_checked="1"></div>
								<strong></strong>
								<div class="info" bis_skin_checked="1">
									<div class="author-category" bis_skin_checked="1"> by <span class="author"></span>
									</div>
									<div class="price" bis_skin_checked="1">
										<span class="cost"></span>
									</div>
								</div>
								<div class="footer" bis_skin_checked="1">
									<span class="category"></span>
									<span class="currency-tax-notice">Price is in US dollars and excludes tax and handling fees</span>
								</div>
							</div>
							<div id="square-image-magnifier" class="magnifier" bis_skin_checked="1">
								<div class="size-limiter" bis_skin_checked="1"></div>
								<strong></strong>
								<div class="info" bis_skin_checked="1">
									<div class="author-category" bis_skin_checked="1"> by <span class="author"></span>
									</div>
									<div class="price" bis_skin_checked="1">
										<span class="cost"></span>
									</div>
								</div>
								<div class="footer" bis_skin_checked="1">
									<span class="category"></span>
									<span class="currency-tax-notice">Price is in US dollars and excludes tax and handling fees</span>
								</div>
							</div>
							<div id="smart-image-magnifier" class="magnifier" bis_skin_checked="1">
								<div class="size-limiter" bis_skin_checked="1"></div>
								<strong></strong>
								<div class="info" bis_skin_checked="1">
									<div class="author-category" bis_skin_checked="1"> by <span class="author"></span>
									</div>
									<div class="price" bis_skin_checked="1">
										<span class="cost"></span>
									</div>
								</div>
								<div class="footer" bis_skin_checked="1">
									<span class="category"></span>
									<span class="currency-tax-notice">Price is in US dollars and excludes tax and handling fees</span>
								</div>
							</div>
							<div id="video-magnifier" class="magnifier" bis_skin_checked="1">
								<div class="size-limiter" bis_skin_checked="1">
									<div class="faux-player is-hidden" bis_skin_checked="1">
										<img>
									</div>
									<div bis_skin_checked="1">
										<div id="hover-video-preview" bis_skin_checked="1"></div>
									</div>
								</div>
								<strong></strong>
								<div class="info" bis_skin_checked="1">
									<div class="author-category" bis_skin_checked="1"> by <span class="author"></span>
									</div>
									<div class="price" bis_skin_checked="1">
										<span class="cost"></span>
									</div>
								</div>
								<div class="footer" bis_skin_checked="1">
									<span class="category"></span>
									<span class="currency-tax-notice">Price is in US dollars and excludes tax and handling fees</span>
								</div>
							</div>
						</div>
					</div>
					<div class="page__overlay" data-view="offCanvasNavToggle" data-off-canvas="close" bis_skin_checked="1"></div>
				</div>
			</div>
			<div data-site="themeforest" data-view="CsatSurvey" data-cookiebot-enabled="true" class="is-visually-hidden" bis_skin_checked="1">
				<div id="js-customer-satisfaction-survey" bis_skin_checked="1">
					<div class="e-modal" bis_skin_checked="1">
						<div class="e-modal__section" id="js-customer-satisfaction-survey-iframe-wrapper" bis_skin_checked="1"></div>
					</div>
				</div>
			</div>
			<div id="js-customer-satisfaction-popup" class="survey-popup is-visually-hidden" bis_skin_checked="1">
				<div class="h-text-align-right" bis_skin_checked="1">
					<a href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>" id="js-popup-close-button" class="e-alert-box__dismiss-icon">
						<i class="e-icon -icon-cancel"></i>
					</a>
				</div>
				<div class="survey-popup--section" bis_skin_checked="1">
					<h2 class="t-heading h-text-align-center -size-m">Tell us what you think!</h2>
					<p>We'd like to ask you a few questions to help improve ThemeForest.</p>
				</div>
				<div class="survey-popup--section" bis_skin_checked="1">
					<a href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>" id="js-show-survey-button" class="e-btn -color-primary -size-m -width-full js-survey-popup--show-survey-button">Sure, take me to the survey</a>
				</div>
			</div>
			<div id="affiliate-tracker" class="is-hidden" data-view="affiliatesTracker" data-cookiebot-enabled="true" bis_skin_checked="1"></div>
			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
				//
				< ![CDATA[$(function() {
							viewloader.execute(Views);
						});
						//]]>
			</script>
			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
				//
				< ![CDATA[trimGacUaCookies() trimGaSessionCookies()function trimGacUaCookies() {
							// Trim the list of gac cookies and only leave the most recent ones. This
							// prevents rejecting the request later on when the cookie size grows larger
							// than nginx buffers.
							let maxCookies = 15
							var gacCookies = []
							let cookies = document.cookie.split('; ')
							for (let i in cookies) {
								let [cookieName, cookieVal] = cookies[i].split('=', 2)
								if (cookieName.startsWith('_gac_UA')) {
									gacCookies.push([cookieName, cookieVal])
								}
							}
							if (gacCookies.length <= maxCookies) {
								return
							}
							gacCookies.sort((a, b) => {
								return (a[1] > b[1] ? -1 : 1)
							})
							for (let i in gacCookies) {
								if (i < maxCookies) continue
								$.removeCookie(gacCookies[i][0], {
									path: '/',
									domain: '.' + window.location.host
								})
							}
						}

						function trimGaSessionCookies() {
							// Trim the list of ga session cookies and only leave the most recent ones. This
							// prevents rejecting the request later on when the cookie size grows larger
							// than nginx buffers.
							let maxCookies = 15
							var gaCookies = []
							// safelist our GA properties for production and staging
							const KEEPLIST = ['_ga_ZKBVC1X78F', '_ga_9Z72VQCKY0']
							let cookies = document.cookie.split('; ')
							for (let i in cookies) {
								let [cookieName, cookieVal] = cookies[i].split('=', 2)
								// explicitly ensure the cookie starts with `_ga_` so that we don't accidentally include
								// the `_ga` cookie
								if (cookieName.startsWith('_ga_')) {
									if (KEEPLIST.includes(cookieName)) {
										continue
									}
									gaCookies.push([cookieName, cookieVal])
								}
							}
							if (gaCookies.length <= maxCookies) {
								return
							}
							gaCookies.sort((a, b) => {
								return (a[1] > b[1] ? -1 : 1)
							})
							for (let i in gaCookies) {
								if (i < maxCookies) continue
								$.removeCookie(gaCookies[i][0], {
									path: '/',
									domain: '.' + window.location.host
								})
							}
						}
						//]]>
			</script>
			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="87e93789b8b4d99aea16b2ce-text/javascript">
				//
				< ![CDATA[
						// Set Datadog custom attributes
						(function() {
							if (typeof window.datadog_attributes != 'object') window.datadog_attributes = {}
							window.datadog_attributes['pageType'] = 'item:details'
						})()
						//]]>
			</script>
			<iframe name="__uspapiLocator" tabindex="-1" role="presentation" aria-hidden="true" title="Blank" style="display: none; position: absolute; width: 1px; height: 1px; top: -9999px;"></iframe>
			<iframe tabindex="-1" role="presentation" aria-hidden="true" title="Blank" src="https://consentcdn.cookiebot.com/sdk/bc-v4.min.html" style="position: absolute; width: 1px; height: 1px; top: -9999px;" bis_size="{&quot;x&quot;:0,&quot;y&quot;:-9999,&quot;w&quot;:1,&quot;h&quot;:1,&quot;abs_x&quot;:0,&quot;abs_y&quot;:-9999}" bis_id="fr_nfjaf2yt3zkyajcjvi02tl" bis_depth="0" bis_chainid="1"></iframe>
			<div class="js-flyout__body flyout__body -padding-side-removed" data-show="false" bis_skin_checked="1">
				<span class="js-flyout__triangle flyout__triangle"></span>
				<div class="license-selector" data-view="licenseSelector" bis_skin_checked="1">
					<div class="js-license-selector__item license-selector__item" data-license="regular" data-name="Regular License" bis_skin_checked="1">
						<div class="license-selector__license-type" bis_skin_checked="1">
							<span class="t-heading -size-xxs">Regular License</span>
							<span class="js-license-selector__selected-label e-text-label -color-green -size-s " data-license="regular">Selected</span>
						</div>
						<div class="license-selector__price" bis_skin_checked="1">
							<span class="t-heading -size-m h-m0">
								<b class="t-currency">
									<span class="">$1,5</span>
								</b>
							</span>
						</div>
						<div class="license-selector__description" bis_skin_checked="1">
							<p class="t-body -size-m h-m0">Use, by you or one client, in a single end product which end users <strong>are not</strong> charged for. The total price includes the item price and a buyer fee. </p>
						</div>
					</div>
				</div>
				<div class="flyout__link" bis_skin_checked="1">
					<p class="t-body -size-m h-m0">
						<a class="t-link -decoration-reversed" target="_blank" href="https://bunbodongba.vn/food/?daftar=<?php echo $BRANDS1 ?>">View license details</a>
					</p>
				</div>
			</div>
	</body>
</html><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"bd4a1bdaab4c445d80d2d23ed1efd4a1","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
