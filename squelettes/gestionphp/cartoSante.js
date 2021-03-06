/*
Script de recherche et affichage métiers de la santé sur carte
*/

    var customIcons = {
      sante: {
        icon: 'squelettes/img/medicine.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      gardenf2: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      gardenf3: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(0, 0),
        zoom: 10,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow({
      	maxWidth: 500
      });
      var bounds = new google.maps.LatLngBounds();
      var lang = document.getElementsByTagName('html')[0].getAttribute('lang');
      
      var nomPrf = (lang == 'fr' ? "Profil" : "Doare den");
      var nomEnv = (lang == 'fr' ? "Envoyer un mail" : "Kas ur gemennadenn");

 
      // Change this depending on the name of your PHP file
      downloadUrl("squelettes/gestionphp/phpsqlajax_genxmlSante.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var idaut = markers[i].getAttribute("idaut");
          var prenom = markers[i].getAttribute("prenom");
          var nom = markers[i].getAttribute("nom");
          var cp = markers[i].getAttribute("cp");
          var commune = markers[i].getAttribute("commune");
          var profpost = markers[i].getAttribute("profpost");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + prenom + "  " + nom + "</b> <br/>" + cp + "  " + commune + "<br/>";
          if (profpost.length) 
          	html += nomPrf+"&nbsp;: " + profpost + "<br/>";
          html += "<a href='spip.php?page=contactVisit&id_auteur=" + idaut + "&lang=" + lang + "'>"+nomEnv+"</a>";
          var icon = customIcons["sante"] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow
          });
          bindInfoWindow(marker, map, infoWindow, html);
          bounds.extend(point);
        }
      map.fitBounds(bounds);
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

