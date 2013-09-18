/*
Script de recherche et affichage des gardes d'enfants sur carte
*/

    var customIcons = {
      gardenf1: {
        icon: 'squelettes/img/nursery.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      gardenf2: {
        icon: 'squelettes/img/nanny.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      gardenf3: {
        icon: 'squelettes/img/daycare.png',
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
      
      var nomAss = (lang == 'fr' ? "Assistant(e) maternelle agréé(e)" : "Skoazellerez-vamm grataet");
      var nomAcc = (lang == 'fr' ? "Accueil collectif de jeunes enfants" : "Magouri");
      var nomDip = (lang == 'fr' ? "Diplômes" : "Diplomoù");
      var nomPrf = (lang == 'fr' ? "Profil" : "Doare den");
      var nomEnv = (lang == 'fr' ? "Envoyer un mail" : "Kas ur gemennadenn");

      // Change this depending on the name of your PHP file
      downloadUrl("squelettes/gestionphp/phpsqlajax_genxmlGarde.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var idaut = markers[i].getAttribute("idaut");
          var prenom = markers[i].getAttribute("prenom");
          var nom = markers[i].getAttribute("nom");
          var cp = markers[i].getAttribute("cp");
          var commune = markers[i].getAttribute("commune");
          var diplomes = markers[i].getAttribute("diplomes");
          var profpost = markers[i].getAttribute("profpost");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + prenom + "  " + nom + "</b> <br/>" + cp + "  " + commune + "<br/>";
          if (type == "gardenf1") 
          	html += "<h3>Baby-Sitter</h3><br/>"; 
          else if (type == "gardenf2") 
          	html += "<h3>" + nomAss + "</h3><br/>"; 
          else
          	html += "<h3>"+nomAcc+"</h3><br/>"; 
          if (diplomes.length) 
          	html += nomDip+"&nbsp;: " + diplomes + "<br/>"; 
          if (profpost.length) 
          	html += nomPrf+"&nbsp;: " + profpost + "<br/>";
          html += "<a href='spip.php?page=contactVisit&id_auteur=" + idaut + "&lang=" + lang + "'>"+nomEnv+"</a>";
          var icon = customIcons[type] || {};
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

