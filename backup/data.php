<?php
  include("koneksi.php");
    $query = "INSERT INTO `kopi` (`id`, `rfid`) "
?>

index.php

<?php
   include("koneksi.php");  
?>

<html>
   <head>
      <title>Sensor Data</title>
   </head>
<body>
   <h1>Temperature / moisture sensor readings</h1>

   <table border="1" cellspacing="1" cellpadding="1">
      <tr>
         <td>&nbsp;Timestamp&nbsp;</td>
         <td>&nbsp;Temperature 1&nbsp;</td>
         <td>&nbsp;Moisture 1&nbsp;</td>
      </tr>

      <?php      
       
              printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
               
           
        

#include "DHT.h"
#include <Ethernet.h>
#include <SPI.h>

#define DHTPIN 8     // what pin we're connected to
#define DHTTYPE DHT22   // DHT 22  (AM2302)
DHT dht(DHTPIN, DHTTYPE);

String data;
 
void setup() {

  Serial.begin(9600); 
  dht.begin();

  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP"); 
  }

  
}
 
void loop() {
  
  float h = dht.readHumidity();
  // Read temperature as Celsius
  float t = dht.readTemperature();
  
  // Check if any reads failed and exit early (to try again).
  if (isnan(h) || isnan(t)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  data = "temp1=" + String(t,2) + "&hum1=" + String(h,2);

  if (client.connect("www.automation.sldroid.com",80)) { // REPLACE WITH YOUR SERVER ADDRESS
    client.println("POST /add.php HTTP/1.1"); 
    client.println("Host: automation.sldroid.com"); // SERVER ADDRESS HERE TOO
    client.println("Content-Type: application/x-www-form-urlencoded"); 
    client.print("Content-Length: "); 
    client.println(data.length()); 
    client.println(); 
    client.print(data); 
  } 

  if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }

  if (client.connected()) { 
    client.stop();  // DISCONNECT FROM THE SERVER
  }

  delay(1000);
  
}