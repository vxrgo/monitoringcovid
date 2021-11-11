#include <Wire.h>
#include <Adafruit_MLX90614.h>
#include <WebServer.h>
#include <HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <WiFi.h>
#include "time.h"

#include <Servo_ESP32.h>


#define SS_PIN 15  //--> SDA / SS is connected to pinout D2
#define RST_PIN 2  //--> RST is connected to pinout D1
MFRC522 mfrc522(SS_PIN, RST_PIN);  //--> Create MFRC522 instance.

#define echoPin 33 // attach pin 4 Arduino to pin Echo of HC-SR04
#define trigPin 32 //attach pin 5 Arduino to pin Trig of HC-SR04

#define red 26
#define sanitizer 27
#define buzzer 25



long duration; // variable for the duration of sound wave travel
int distance; // variable for the distance measurement

const char* ssid = "GM";
const char* password = "tekkom98";

WebServer server(80);  //--> Server on port 80

int readsuccess;
byte readcard[4];
char str[32] = "";
String StrUID;

Adafruit_MLX90614 mlx = Adafruit_MLX90614();

const char* ntpServer = "pool.ntp.org";
const long  gmtOffset_sec = 0;
const int   daylightOffset_sec = 19800;

int noOfEm = 2;
String UserID[2] = {"89 E9 CD B1", "D9 6D DB B2"};


void setup() {
  Serial.begin(115200); //--> Initialize serial communications with the PC
  SPI.begin(); // Init SPI bus
  mfrc522.PCD_Init(); // Init MFRC522
  mfrc522.PCD_DumpVersionToSerial(); // Show details of PCD - MFRC522 Card Reader details
  mlx.begin();
  delay(500);

  WiFi.begin(ssid, password); //--> Connect to your WiFi router
  Serial.println("");

  pinMode(red, OUTPUT);
  pinMode(sanitizer, OUTPUT);
  pinMode(buzzer, OUTPUT);
//  pinMode(gate, OUTPUT);
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an OUTPUT
  pinMode(echoPin, INPUT); // Sets the echoPin as an INPUT

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");

  }
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  Serial.println("Please tag a card or keychain to see the UID !");
  Serial.println("");
}

void loop() {
  digitalWrite(sanitizer, HIGH);
  delay(10);
  // put your main code here, to run repeatedly
  if ( ! mfrc522.PICC_IsNewCardPresent()) {
    return;
  }
  if ( ! mfrc522.PICC_ReadCardSerial()) {
    return;
  }
  //Serial.print("UID tag :");
  String content = "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++)
  {
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  content.toUpperCase();

  for (int i = 0; i < noOfEm; i++) {
    Serial.println(content.substring(1));
    Serial.println(UserID[i]);
    if (content.substring(1) == UserID[i]) //change here the UID of the card/cards that you want to give access
    {
      digitalWrite(red, LOW);
      digitalWrite(buzzer, HIGH);
      //      Serial.print("Ambient = ");
      //      Serial.print(mlx.readAmbientTempC());
      //      Serial.print("*C\tTarget= ");
      //      Serial.print(mlx.readObjectTempC());
      //      Serial.println("*C");
      float(data1) = mlx.readObjectTempC();
      String temp1 = String(data1);
      String  postData;
      //Post Data
      postData = "ldrvalue=" + temp1 + "&id=" + UserID[i];
      HTTPClient http;
      http.begin("http://192.168.137.1/esp32/userdata/InsertDB.php");              //Specify request destination
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
      int httpCode = http.POST(postData);   //Send the request
      String payload = http.getString();    //Get the response payload
      //Serial.println(httpCode);   //Print HTTP return code
      //Serial.println(payload);    //Print request response payload
      //Serial.println("Temp Value=" + temp1);
      http.end();  //Close connection
      delay(3000);
      digitalWrite(buzzer, LOW);
      digitalWrite(red, HIGH);
    }
    else
    {
      digitalWrite(red, HIGH);
      //Serial.println("Access denied");
    }
  }

  if (content.substring(1)) {
    HTTPClient http;    //Declare object of class HTTPClient
    String UIDresultSend, postData;
    UIDresultSend = content.substring(1);
    //Post Data
    postData = "UIDresult=" + UIDresultSend;
    http.begin("http://192.168.137.1/esp32/getUID.php");  //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header
    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload
    //Serial.println(UIDresultSend);
    //Serial.println(httpCode);   //Print HTTP return code
    //Serial.println(payload);    //Print request response payload
    http.end();  //Close connection
  }

  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);    // Sets the trigPin HIGH (ACTIVE) for 10 microseconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);   // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  // Calculating the distance
  distance = duration * 0.034 / 2; // Speed of sound wave divided by 2 (go and back)
  // Displays the distance on the Serial Monitor
  Serial.print("Distance : ");
  Serial.println(distance);
  if (distance < 10) {
    digitalWrite(sanitizer, LOW);
    delay(200);
    digitalWrite(sanitizer, HIGH);
  }
  else {
    digitalWrite(sanitizer, HIGH);
  }
  delay(200);
}
