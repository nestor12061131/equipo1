int LDR = A0;

#include <ESP8266WiFi.h>
#include <FirebaseArduino.h>
#include "SoftwareSerial.h"

#define FIREBASE_HOST "prubafire.firebaseio.com" //definimos el HOST al que se conectara el Nodemcu
                                                     //debemos quitar el "https://" y el ultimo "/" de la URL
#define WIFI_SSID "INFINITUM7E9A" //Cambiar por el nombre de tu WIFI
#define WIFI_PASSWORD "nHtGx93QfM" //Cambiar por el Password de tu WIFI

SoftwareSerial mySerial(13, 15, false, 256);  // se asignan los pines el 13 es rx y el 15 es tx para el puerto serie digital
char estado = 'Z'; // se inizializa la variable

void setup() {
  mySerial.begin(9600); // se inizializa la el puerto serie digital 
  Serial.begin(9600);
  // conectamos el wifi.
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi Conectado!");
  Firebase.begin(FIREBASE_HOST); //inicializamos la comunicacion con firebase

  pinMode(16, INPUT); //declaramos el pin de el Sensor como una entrada
  pinMode(5, INPUT); //declaramos el pin de el Sensor como una entrada 
  pinMode(4, INPUT); //declaramos el pin de el Sensor como una entrada
  pinMode(0, INPUT); //declaramos el pin de el Sensor como una entrada
  pinMode(2, INPUT); //declaramos el pin de el Sensor como una entrada
  pinMode(14, INPUT); //declaramos el pin de el Sensor como una entrada
  pinMode(12, INPUT); //declaramos el pin de el Sensor como una entrada
}

void loop() {


 if(mySerial.available()>0){           // Si el puerto serie digital esta habilitado
        estado = mySerial.read();      // Lee lo que llega por el puerto Serie y lo asigna a estado (estado es una variable char)
     }

 switch (estado) {
    case 'A':
         Firebase.setInt("Digital7", 1);   //enviamos el dato  
         estado= 'A';
         delay(1);        // delay in between reads for stability
      break;
    case 'B':
         Firebase.setInt("Digital7", 0);
         estado= 'B';
         delay(1);        // delay in between reads for stability
      break;
    case 'C':
          Firebase.setInt("Digital8", 1);    
          estado= 'C';
          delay(1);        // delay in between reads for stability
      break;
    case 'D':
          Firebase.setInt("Digital8", 0);    
          estado= 'D';
          delay(1);        // delay in between reads for stability
      break;


  }

  int presion = analogRead(A0); //Guardamos el valor de la LDR en la variable luz
  Firebase.setInt("presion", presion); //Mandamos el valor de la variable Luz a firebase como un entero.
  
  if (digitalRead(16) == 0) {
    Firebase.setInt("Digital0", 0);
  } else {
    Firebase.setInt("Digital0", 1);
  }

    if (digitalRead(5) == 0) {
    Firebase.setInt("Digital1", 0);
  } else {
    Firebase.setInt("Digital1", 1);
  }

    if (digitalRead(4) == 0) {
    Firebase.setInt("Digital2", 0);
  } else {
    Firebase.setInt("Digital2", 1);
  }

    if (digitalRead(0) == 0) {
    Firebase.setInt("Digital3", 0);
  } else {
    Firebase.setInt("Digital3", 1);
  }

    if (digitalRead(2) == 0) {
    Firebase.setInt("Digital4", 0);
  } else {
    Firebase.setInt("Digital4", 1);
  }

    if (digitalRead(14) == 0) {
    Firebase.setInt("Digital5", 0);
  } else {
    Firebase.setInt("Digital5", 1);
  }

    if (digitalRead(12) == 0) {
    Firebase.setInt("Digital6", 0);
  } else {
    Firebase.setInt("Digital6", 1);
  }
  delay(500);
}
