<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>
<kml xmlns="http://www.opengis.net/kml/2.2">
  <Document>
    <Placemark> 
       <?php echo $walk['Walk']['geometry'] ?>
    </Placemark>
  </Document>
</kml>