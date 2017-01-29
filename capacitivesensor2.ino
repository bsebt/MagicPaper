#include <CapacitiveSensor.h>
int LEDPINS [4]={10,11,12,13};
bool states[4]={false,false,false,false};
CapacitiveSensor cs[]={CapacitiveSensor(2,3),CapacitiveSensor(4,5),CapacitiveSensor(6,7),CapacitiveSensor(8,9)};
int thresh[4]={8,10,12,8};
int last = 5;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  for (int i=0;i<4;i++)
    pinMode(LEDPINS[i],OUTPUT);
  //cs.set_CS_AutocaL_Millis(0xFFFFFFFF);
}

void loop() {
    // put your main code here, to run repeatedly:
   long start = millis();
   long total[4];
   for (int i=0;i<4;i++)
   {
    total[i]=(cs[i]).capacitiveSensor(10);
   }    
   //***************************************************values******************************
 /* for (int i=0;i<4;i++)
  {
    Serial.print(total[i]);
    Serial.print(",");
  }
  Serial.println();*/
    //**********************************************************LED BLINKING******************
 for (int i=0;i<4;i++)
  {
    if (total[i]>thresh[i])
    {
       if (states[i]==false&&(last!=i))
       {
          last=i;
          states[i]=true;
          //Serial.println(i);
          digitalWrite(LEDPINS[i],HIGH);
          delay(100);
       }
    }
    else
    {
       states[i]=false;
       digitalWrite(LEDPINS[i],LOW);
       delay(100);
    }
  }
}
