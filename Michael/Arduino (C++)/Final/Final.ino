  int light,temp,ones,tens;
  boolean dark=false,on=false,off=false;
void tempLed(int x);
void change(int num,boolean flag);
void setup() {
  // put your setup code here, to run once:
    pinMode(13,OUTPUT);//a-7 segment
    pinMode(12,OUTPUT);//b-7 segment
    pinMode(11,OUTPUT);//c-7 segment
    pinMode(10,OUTPUT);//d-7 segment
    pinMode(9,OUTPUT);//e-7 segment
    pinMode(8,OUTPUT);//f-7 segment
    pinMode(7,OUTPUT);//g-7 segment
    pinMode(6,OUTPUT);//gnd left-7 segmet
    pinMode(5,OUTPUT);//gnd right-7 segmet
    pinMode(4,OUTPUT);//led yellow
    pinMode(3,OUTPUT);//led green
    pinMode(2,OUTPUT);//led red
    pinMode(A0,INPUT);//light
    pinMode(A1,INPUT);//tempture
    pinMode(A2,INPUT);//button
    Serial.begin(9600);
}

void loop() {
  // put your main code here, to run repeatedly:
  light=analogRead(A0);
  while(light<=800&&light>=400&&dark==false){//the sun is good
      digitalWrite(4,HIGH);
      light=analogRead(A0);
      Serial.println(light);
      delay(1000);
  }
  if(light>800&&dark==false){//the sun is too hot
      digitalWrite(4,LOW);
      Serial.println(light);
  }
  if(light<400){//the sun is dark
      dark=true;
  }
  if (dark==true){
    digitalWrite(4,LOW);
    while(analogRead(A2)==0&&on==false){//need to turn on the boiler
       Serial.println("Turn on the boiler");
       digitalWrite(3,HIGH);
       delay(1000);
       digitalWrite(3,LOW);
       delay(1000);
    }
      while(off==false){
        on=true;
        digitalWrite(3,HIGH);
        temp=analogRead(A1);//the tempture is taken
        temp=((5000/1023)*temp)/10;
        Serial.println(temp);
        tens=temp/10;//the tens digit
        ones=temp%10;//the ones digit
        if(tens!=0){
        for(int i=0;i<25;i++){
          if(i==24){
            tempLed(10);
          }
          else{
            change(tens,true);
            delay(10);
            change(ones,false);
            delay(10);
          }
        }
     }
     else{
        change(ones,false);
        delay(480);
        tempLed(10);
     }
     if(temp>24){//the tempture is too hot
        digitalWrite(3,LOW);
        while(analogRead(A2)==0){
            Serial.println("Turn off the boiler");
            for(int i=0;i<25;i++){
              if(i==24){
                tempLed(10);
              }
              else{
                change(tens,true);
                delay(10);
                change(ones,false);
                delay(10);
               }
            }
            digitalWrite(2,HIGH);
            delay(1000);
            digitalWrite(2,LOW);
            delay(1000);
            off=true;
          }
      } 
    }
    if(off==true){//the boiler is turn off
        digitalWrite(2,LOW);
        off=false;
        dark=false;
        on=false;
        tempLed(10);
    }
  }
  delay(3000);
}
void tempLed(int x){//function of the leds 7-segment
  switch(x){
    case 0:
    digitalWrite(13,HIGH);
    digitalWrite(12,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(10,HIGH);
    digitalWrite(9,HIGH);
    digitalWrite(8,HIGH);
    digitalWrite(7,LOW);
    break;
    case 1:
    digitalWrite(13,LOW);
    digitalWrite(12,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(10,LOW);
    digitalWrite(9,LOW);
    digitalWrite(8,LOW);
    digitalWrite(7,LOW);
    break;
    case 2:
    digitalWrite(13,HIGH);
    digitalWrite(12,HIGH);
    digitalWrite(11,LOW);
    digitalWrite(10,HIGH);
    digitalWrite(9,HIGH);
    digitalWrite(8,LOW);
    digitalWrite(7,HIGH);
    break;
    case 3:
    digitalWrite(13,HIGH);
    digitalWrite(12,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(10,HIGH);
    digitalWrite(9,LOW);
    digitalWrite(8,LOW);
    digitalWrite(7,HIGH);
    break;
    case 4:
    digitalWrite(13,LOW);
    digitalWrite(12,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(10,LOW);
    digitalWrite(9,LOW);
    digitalWrite(8,HIGH);
    digitalWrite(7,HIGH);
    break;
    case 5:
    digitalWrite(13,HIGH);
    digitalWrite(12,LOW);
    digitalWrite(11,HIGH);
    digitalWrite(10,HIGH);
    digitalWrite(9,LOW);
    digitalWrite(8,HIGH);
    digitalWrite(7,HIGH);
    break;
    case 6:
    digitalWrite(13,HIGH);
    digitalWrite(12,LOW);
    digitalWrite(11,HIGH);
    digitalWrite(10,HIGH);
    digitalWrite(9,HIGH);
    digitalWrite(8,HIGH);
    digitalWrite(7,HIGH);
    break;
    case 7:
    digitalWrite(13,HIGH);
    digitalWrite(12,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(10,LOW);
    digitalWrite(9,LOW);
    digitalWrite(8,LOW);
    digitalWrite(7,LOW);
    break;
    case 8:
    digitalWrite(13,HIGH);
    digitalWrite(12,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(10,HIGH);
    digitalWrite(9,HIGH);
    digitalWrite(8,HIGH);
    digitalWrite(7,HIGH);
    break;
    case 9:
    digitalWrite(13,HIGH);
    digitalWrite(12,HIGH);
    digitalWrite(11,HIGH);
    digitalWrite(10,HIGH);
    digitalWrite(9,LOW);
    digitalWrite(8,HIGH);
    digitalWrite(7,HIGH);
    break;
    default:
    digitalWrite(13,LOW);
    digitalWrite(12,LOW);
    digitalWrite(11,LOW);
    digitalWrite(10,LOW);
    digitalWrite(9,LOW);
    digitalWrite(8,LOW);
    digitalWrite(7,LOW);
    digitalWrite(6,LOW);
    digitalWrite(5,LOW);
break;
  }
}
void change(int num,boolean flag){//function of the gnd 7-segment
  if (flag==true){
     digitalWrite(5,HIGH);
     digitalWrite(6,LOW);
     tempLed(num);
  }
  else{
     digitalWrite(6,HIGH);
     digitalWrite(5,LOW);
     tempLed(num);
  }
}

