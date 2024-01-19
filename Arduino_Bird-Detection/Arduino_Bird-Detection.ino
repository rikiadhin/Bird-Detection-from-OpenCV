#include <WebServer.h>
#include <WiFi.h>
#include <esp32cam.h>
#include <UniversalTelegramBot.h>
#include <WiFiClient.h>
#include <Arduino.h>
#include <WiFiClientSecure.h>
#include <UniversalTelegramBot.h>
#include <ArduinoJson.h>

#define timeSeconds 1

const int motionSensor = 25;
const int relay = 27;

unsigned long now = millis();
unsigned long lastTrigger = 0;
boolean startTimer = false;
boolean motion = false;

void IRAM_ATTR detectsMovement() {
  // digitalWrite(relay, HIGH);
  motion = true;
  startTimer = true;
  lastTrigger = millis();
  // motionDetected = true;
}

const char *WIFI_SSID = "rikiadhin";
const char *WIFI_PASS = "rikiadhin";
const char *serverAddress = "192.168.43.43";
const int serverPort = 8000;

// Initialize Telegram BOT
String BOTtoken = "6921767135:AAGjXgA58OxpboBBQAUIk6Tb5z2KNUAXjv8";
String CHAT_ID = "1836921390";

WiFiClientSecure client;
UniversalTelegramBot bot(BOTtoken, client);

char auth[] = "HdX7q2fA_kLnUKC8_ecoi09yyuiyUzoL";

float temperatureValue = 0.0;
WebServer server(80);

void sendTemperature(float temperature) {
  Serial.println("Running : sendTemperature");
  WiFiClient client;
  // Serial.println("temp=" + String(temperature));
  if (!client.connect(serverAddress, serverPort)) {
    Serial.println("TEMP: Connection to server failed");
    return;
  }

  String url = "/send-data-temp/" + String(temperature);

  // Make an HTTP GET request
  client.print("GET " + url + " HTTP/1.1\r\n");
  client.print("Host: " + String(serverAddress) + "\r\n");
  client.print("Connection: close\r\n\r\n");

  delay(10);

  // Read and print the response
  while (client.available()) {
    Serial.print(client.readStringUntil('\r'));
  }

  client.stop();
}

void sendDetectMovement() {
  Serial.println("Running : sendDetectMovement");
  WiFiClient client;
  if (client.connect(serverAddress, serverPort)) {
    String url = "/send-data-bird/radar";

    client.print("GET " + url + " HTTP/1.1\r\n");
    client.print("Host: " + String(serverAddress) + "\r\n");
    client.print("Connection: close\r\n\r\n");

    delay(10);
    while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }

    client.stop();
  } else {
    Serial.println("MOVE: Connection to server failed");
  }
}

bool getDetectCamera() {
  Serial.println("Running : getDetectCamera");

  WiFiClient client;
  if (!client.connect(serverAddress, serverPort)) {
    Serial.println("CAMERA : Connection to server failed");
    return false;
  }

  String url = "/get-data-camera/";

  // Make an HTTP GET request
  client.print("GET " + url + " HTTP/1.1\r\n");
  client.print("Host: " + String(serverAddress) + "\r\n");
  client.print("Connection: close\r\n\r\n");

  delay(100);  // Increase the delay to 100 milliseconds or more

  String response = "";
  Serial.println("CLIENT AVAILABLE: " + String(client.available()));
  while (client.available()) {
    String line = client.readStringUntil('\r');  // Use readStringUntil('\r') to read lines
    Serial.println(line);
    response += line;
  }
  client.stop();
  Serial.println("Response: " + String(response));

  // Check if the response contains "true"
  if (response.indexOf("true")) {
    Serial.println("Camera: Bird detected!");
    return true;
  } else {
    Serial.println("Camera: Bird not detected.");
    return false;
  }
}

void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  Serial.println();

  pinMode(motionSensor, INPUT_PULLUP);
  attachInterrupt(digitalPinToInterrupt(motionSensor), detectsMovement, RISING);

  // Set LED to LOW
  pinMode(relay, OUTPUT);
  digitalWrite(relay, LOW);
  pinMode(motionSensor, INPUT);

  WiFi.persistent(false);
  WiFi.mode(WIFI_STA);
  WiFi.begin(WIFI_SSID, WIFI_PASS);
  // clientTCP.setCACert(TELEGRAM_CERTIFICATE_ROOT);
  client.setCACert(TELEGRAM_CERTIFICATE_ROOT);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
  }
  bot.sendMessage(CHAT_ID, "Bot started up", "");
}

void loop() {
  // put your main code here, to run repeatedly:
  Serial.println("=============================");
  now = millis();
  delay(500);
  int nilaiRadar = digitalRead(motionSensor);
  Serial.println(nilaiRadar);
  if (nilaiRadar == HIGH) {
    digitalWrite(relay, HIGH);
    delay(3000);
    digitalWrite(relay, LOW);
    bot.sendMessage(CHAT_ID, "Gerakan terdeteksi dari radar!!", "");
    Serial.println("Gerakan terdeteksi dari radar!!");
    sendDetectMovement();
    motion = false;
  } else {
    digitalWrite(relay, LOW);
    Serial.println("Gerakan tidak terdeteksi");
    delay(1000);
    motion = true;
  }

  bool detectFromCamera = getDetectCamera();
  Serial.println("CAMERA : " + String(detectFromCamera));

  if (detectFromCamera == 1) {
    Serial.println("TERDETEKSI DARI CAMERA!!!");
    bot.sendMessage(CHAT_ID, "Motion detected from Camera!!", "");
    digitalWrite(relay, HIGH);
    delay(2000);
    digitalWrite(relay, LOW);
    delay(2000);
  }
  server.handleClient();
  temperatureValue = temperatureRead();
  Serial.println("Temp : " + String(temperatureValue));
  sendTemperature(temperatureValue);

  delay(1000);
}
