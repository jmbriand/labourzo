/*
Script de recherche et affichage des gardes d'enfants sur carte
*/

    var customIcons = {
      gardenf1: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      gardenf2: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      gardenf3: {
        icon: 'squelettes/img/mm_20_green.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(0, 0),
        zoom: 10,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;
      var bounds = new google.maps.LatLngBounds();

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
          	html += "<h3>Assistant(e) maternelle agréé(e)</h3><br/>"; 
          else
          	html += "<h3>Accueil collectif de jeunes enfants</h3><br/>"; 
          if (diplomes.length) 
          	html += "Diplômes: " + diplomes + "<br/>"; 
          if (profpost.length) 
          	html += "Profil: " + profpost + "<br/>";
          html += "<a href='spip.php?page=contactVisit&id_auteur=" + idaut + "&lang=#LANG'>Envoyer un mail</a>";
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

