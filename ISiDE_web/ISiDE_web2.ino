/* 
ISiDE Web
By Mattia Baroni

Libs:

//http://bar0x.000.pe/ISiDE/ISiDE_web.php?stato=provando&scelta=addrecord
//https://alejandromori.files.wordpress.com/2017/08/esp8266wifi-library.pdf
//telegram https://iotdesignpro.com/projects/telegram-bot-with-esp32-control-gpio-pins-through-telegram-chat


*/
#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

const char *ssid = "dlink tp-link2";  
const char *password = "m5ku581lz";
const char* host = "bar0x.000.pe";   
#define port 80
String httpUrl;


//=======================================================================
//                    Power on setup
//=======================================================================

void setup() {
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  HTTPClient http;    
  WiFiClient client;
  

  if (client.connect(host, port)){
    delay(5000);
    Serial.println("[WiFiClient] connected");
    Serial.println("[WiFiClient] Sending a request");
    
    String stato = "gigi";
    String scelta = "addrecord";
    String httpUrl2 = "GET /ISiDE/ISiDE_web.php?stato=prova&scelta=addrecord HTTP/1.0";

    httpUrl = "GET /ISiDE/ISiDE_web.php?stato=";
    httpUrl += stato;
    httpUrl += "&scelta=";
    httpUrl += scelta;
    httpUrl += " HTTP/1.0";
    
    client.println(String(httpUrl));
    client.println("Host: www.bar0x.000.pe");
    client.println();

    Serial.println("[WiFiClient] Response: ");
    while (client.connected()){
      if (client.available()){
        String line = client.readStringUntil('\n');
        Serial.println(line);
      }
    }
    Serial.println("--------------------");
    Serial.println();
    //client.stop();
    //Serial.println("\n[Disconnected]");
  }
  else{
    Serial.println("[WiFiClient] NOT connected");
  }

  
  
  delay(5000);
}
