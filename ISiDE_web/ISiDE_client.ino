#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

const char *ssid = "dlink tp-link2";  
const char *password = "m5ku581lz";

//Web/Server address to read/write from 
const char* host = "google.com";   

//http://localhost:8053/sql/SQL/ISiDE_web/ISiDE_web.php?stato=ciao&scelta=addrecord
//https://alejandromori.files.wordpress.com/2017/08/esp8266wifi-library.pdf


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
  

  if (client.connect(host, 80)){
    delay(5000);
    Serial.println("[WiFiClient]connected");
    String stato = "gigi";
    String scelta = "addrecord";
    String Link = "";
    Link += "/sql/SQL/ISiDE_web/ISiDE_web.php?stato="+ stato +"&scelta="+ scelta;
    

    bool sc = http.begin(client, Link);     //Specify request destination
    Serial.print("errCode:");
    Serial.println(sc);

    int httpCode = http.GET();            //Send the request
    String payload = http.getString();    //Get the response payload
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload 
    http.end();  //Close connection
    }
  
  else{
    Serial.println("[WiFiClient] NOT connected");
  }

  
  
  delay(5000);  //GET Data at every 5 seconds
}
