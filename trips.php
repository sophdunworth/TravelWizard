<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelWizard - Trips</title>
    <link rel="stylesheet" href="css/Tripmain.css">

    <?php include 'header.php'; ?>
</head>
<body>
<section class="trips">
    <h1>Find Your Perfect Travel Experience with Us</h1>
    <div class="trip-grid">
        <?php 
        // Trips data in an associative array
        $trips = [
            ["name" => "Caribbean Bliss", "locations" => "Jamaica, Bahamas, Dominican Republic", "price" => "€4,700","link" => "carribean.php", "image" => "images/carribean/carribean.png"],
            ["name" => "La Dolce Vita", "locations" => "Venice, Rome, Sicily", "price" => "€1,700", "link" => "italy.php", "image" => "images/italy/italy.png"],
            ["name" => "Gold Coast Gateway", "locations" => "Vancouver, Seattle, Phoenix", "price" => "€3,300", "link" => "la.php", "image" => "images/la/la.png"],
            ["name" => "South East Asia Uncovered", "locations" => "Bali, Malaysia, Thailand", "price" => "€3,750", "link" => "thialand.php", "image" => "images/thialand/thialand.png"],
            ["name" => "Arabian Nights", "locations" => "Dubai, Abu Dhabi, Qatar", "price" => "€3,200", "link" => "dubai.php", "image" => "images/dubai/dubai.png"],
            ["name" => "African Safari", "locations" => "Johannesburg, Cape Town, Durban", "price" => "€6,200", "link" => "africa.php", "image" => "images/africa/africa.png"],
            ["name" => "Tropical Treasures", "locations" => "Maldives, Seychelles & Beyond", "price" => "€3,500", "link" => "maldieves.php", "image" => "images/maldives/maldives.png"],
            ["name" => "Southern Charm", "locations" => "Atlanta, New Orleans, Dallas", "price" => "€5,200", "link" => "texas.php", "image" => "images/texas/texas.png"],
            ["name" => "Central Cities Discovery", "locations" => "Chicago, Detroit, Montreal", "price" => "€2,800", "link" => "chicago.php", "image" => "images/chicago/chicago.png"],
            ["name" => "Greek Island Odyssey", "locations" => "Rhodes, Kos, Mykonos", "price" => "€1,000", "link" => "rhodes.php", "image" => "images/rhodes/rhodes.png"],
            ["name" => "Greek Island Party Cruise", "locations" => "Santorini, Paros, Naxos", "price" => "€2,000", "link" => "greekisland.php", "image" => "images/greekisland/Greek Island Party Cruise.png"],
            ["name" => "Legends of the East", "locations" => "Japan, South Korea, Shanghai", "price" => "€6,500", "link" => "japan.php", "image" => "images/japan/japan.png"],
            ["name" => "Amazon to the Andes", "locations" => "Colombia, Peru, Argentina", "price" => "€4,800", "link" => "southamerica.php", "image" => "images/southamerica/southamerica.png"],
            ["name" => "East Coast Explorer", "locations" => "New York, Boston, Miami", "price" => "€3,500", "link" => "newyork.php", "image" => "images/newyork/newyork.png"],
            ["name" => "Aloha to Adventure", "locations" => "Hawaii, Bali, French Polynesia", "price" => "€4,350", "link" => "hawaii.php", "image" => "images/hawaii/hawaii.png"],
            ["name" => "Aurora & Fjords", "locations" => "Sweden, Norway, Finland", "price" => "€2,800", "link" => "nordic.php", "image" => "images/nordic/nordic.png"],
            ["name" => "Grand European Escapade", "locations" => "France, Germany, Austria", "price" => "€2,000", "link" => "european.php", "image" => "images/european/european.png"],
            ["name" => "The Land Down Under", "locations" => "Australia, New Zealand", "price" => "€4,500", "link" => "australia.php", "image" => "images/australia/australia.png"],
            ["name" => "Costa del Sol & Beyond", "locations" => "Spain, Monaco, Switzerland", "price" => "€2,250", "link" => "spain.php", "image" => "images/spain/spain.png"],
            ["name" => "C'est La Vie dans France", "locations" => "Paris, Lyon, Bordeaux, Marseille", "price" => "€1,800", "link" => "france.php", "image" => "images/paris/paris.png"]
        ];
        
        //Image Link Refs
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qCZjzKfmeyEIMw*ccid_JmPMp%2BZ7&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=944+x+618+%c2%b7+75.58+kB+%c2%b7+png&sbifnm=texas.png&thw=944&thh=618&ptime=38&dlen=103196&expw=741&exph=485&selectedindex=0&id=346577857&ccid=JmPMp%2BZ7&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qCugrIlj2SEIUQ*ccid_K6CsiWPZ&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=930+x+534+%c2%b7+83.88+kB+%c2%b7+png&sbifnm=hawaii.png&thw=930&thh=534&ptime=46&dlen=114524&expw=791&exph=454&selectedindex=0&id=220754825&ccid=K6CsiWPZ&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qCxvxlvm7yEI9w*ccid_LG%2FGW%2Bbv&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=936+x+520+%c2%b7+49.25+kB+%c2%b7+png&sbifnm=la.png&thw=936&thh=520&ptime=68&dlen=67236&expw=804&exph=447&selectedindex=0&id=-30869504&ccid=LG%2FGW%2Bbv&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qJNw4tB0hyEIZg*ccid_k3Di0HSH&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=944+x+590+%c2%b7+63.65+kB+%c2%b7+png&sbifnm=italy.png&thw=944&thh=590&ptime=75&dlen=86908&expw=758&exph=474&selectedindex=0&id=-1151463793&ccid=k3Di0HSH&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qFQ3.zk-2iEISg*ccid_VDf%2FOT7a&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=928+x+608+%c2%b7+56.18+kB+%c2%b7+png&sbifnm=carribean.png&thw=928&thh=608&ptime=41&dlen=76704&expw=741&exph=485&selectedindex=0&id=32430204&ccid=VDf%2FOT7a&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qJgdW81ZcSEIvA*ccid_mB1bzVlx&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=936+x+510+%c2%b7+63.86+kB+%c2%b7+png&sbifnm=japan.png&thw=936&thh=510&ptime=45&dlen=87184&expw=812&exph=442&selectedindex=0&id=-1967139728&ccid=mB1bzVlx&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHaCKfm-DSEIWw*ccid_doIp%2Bb4N&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1282+x+626+%c2%b7+66.79+kB+%c2%b7+png&sbifnm=rhodes.png&thw=1282&thh=626&ptime=72&dlen=91196&expw=858&exph=419&selectedindex=0&id=1249944225&ccid=doIp%2Bb4N&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qELMSXpH6iEI0g*ccid_QsxJekfq&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=932+x+516+%c2%b7+60.21+kB+%c2%b7+png&sbifnm=africa.png&thw=932&thh=516&ptime=52&dlen=82200&expw=806&exph=446&selectedindex=0&id=153139058&ccid=QsxJekfq&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qLpmwHKMeiEIFA*ccid_umbAcox6&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=918+x+506+%c2%b7+46.82+kB+%c2%b7+png&sbifnm=australia.png&thw=918&thh=506&ptime=35&dlen=63928&expw=808&exph=445&selectedindex=0&id=558409970&ccid=umbAcox6&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qJ7VFn0rLiEIGQ*ccid_ntUWfSsu&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=942+x+616+%c2%b7+41.55+kB+%c2%b7+png&sbifnm=chicago.png&thw=942&thh=616&ptime=37&dlen=56736&expw=741&exph=485&selectedindex=0&id=-2142068595&ccid=ntUWfSsu&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qPBW2IBhbiEIqQ*ccid_8FbYgGFu&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=850+x+622+%c2%b7+40.68+kB+%c2%b7+png&sbifnm=dubai.png&thw=850&thh=622&ptime=40&dlen=55544&expw=701&exph=513&selectedindex=0&id=-2012029326&ccid=8FbYgGFu&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qPSmzxBE3yEIqQ*ccid_9KbPEETf&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=926+x+588+%c2%b7+63.95+kB+%c2%b7+png&sbifnm=european.png&thw=926&thh=588&ptime=64&dlen=87308&expw=752&exph=478&selectedindex=0&id=-1876203416&ccid=9KbPEETf&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qLQ3AzTddyEIdA*ccid_tDcDNN13&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1130+x+742+%c2%b7+64.63+kB+%c2%b7+png&sbifnm=Greek+Island+Party+Cruise.png&thw=1130&thh=742&ptime=81&dlen=88236&expw=740&exph=486&selectedindex=0&id=-771171038&ccid=tDcDNN13&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHy1nJiDfyEIrA*ccid_fLWcmIN%2F&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=942+x+618+%c2%b7+58.73+kB+%c2%b7+png&sbifnm=maldives.png&thw=942&thh=618&ptime=61&dlen=80188&expw=740&exph=485&selectedindex=0&id=-6744529&ccid=fLWcmIN%2F&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qG2LsOLLzCEIVQ*ccid_bYuw4svM&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=708+x+644+%c2%b7+26.17+kB+%c2%b7+png&sbifnm=nordic.png&thw=708&thh=644&ptime=58&dlen=35724&expw=629&exph=572&selectedindex=0&id=667691811&ccid=bYuw4svM&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qH57ZNbrUSEI7A*ccid_fntk1utR&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=930+x+614+%c2%b7+69.77+kB+%c2%b7+png&sbifnm=paris.png&thw=930&thh=614&ptime=53&dlen=95260&expw=738&exph=487&selectedindex=0&id=-29926992&ccid=fntk1utR&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qGRLiGlJ.yEIkA*ccid_ZEuIaUn%2F&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=932+x+620+%c2%b7+68.44+kB+%c2%b7+png&sbifnm=southamerica.png&thw=932&thh=620&ptime=52&dlen=93444&expw=735&exph=489&selectedindex=0&id=1729304877&ccid=ZEuIaUn%2F&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qCC9diDMkCEISQ*ccid_IL12IMyQ&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=644+x+636+%c2%b7+50.82+kB+%c2%b7+png&sbifnm=spain.png&thw=644&thh=636&ptime=40&dlen=69380&expw=603&exph=596&selectedindex=0&id=-22985356&ccid=IL12IMyQ&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RLQvvlOiYSEIqxcxoNWLuD9SqbotqVTdP5E&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=926+x+614+%C2%B7+66.73+kB+%C2%B7+png&sbifnm=thialand.png&thw=926&thh=614&ptime=64&dlen=91108&expw=926&exph=614
        

        // Loop through the array and create trip cards dynamically
        foreach ($trips as $trip) {
            echo "<div class='trip-card'>
                    <img src='{$trip['image']}' alt='{$trip['name']}' class='trip-image'>
                    <h3>{$trip['name']}</h3>
                    <p>{$trip['locations']}</p>
                    <p class='price'>{$trip['price']}</p>
                    <a href='{$trip['link']}' class='btn'>View Details</a>
                  </div>";
        }
        ?>
    </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>




