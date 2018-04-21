/*
 * GPIO.c
 *
 *  Created on: Apr 21, 2018
 *      Author: Nestor
 */
#include "ADC.h"
#include "Cpu.h"
#include "Events.h"
#include "mqx_tasks.h"
#include "Componente.h"

LDD_TDeviceData *BTN_PTR = NULL;
LDD_TDeviceData *DeviceDataPtr;

GPIO1_TFieldValue dato[] = {
			SENSOR_GAS,
			CAJON1,
			CAJON2,
			CAJON3,
	};

void inicializarIO()
{
	BTN_PTR = GPIO1_Init((LDD_TUserData *) NULL);
	//LED_PTR = GPIO2_Init((LDD_TUserData *) NULL);
}

int GPIO_inputs(x)
{
if(BTN_PTR)
  {
	dato[0] = obtener_lectura(SENSOR_GAS);
	dato[1] = obtener_lectura(CAJON1);
	dato[2] = obtener_lectura(CAJON2);
	dato[3] = obtener_lectura(CAJON3);
  }
}

GPIO_valvulaIN()
{
	 return(dato[0]);
}

GPIO_cajon1IN()	
{
	 return(dato[1]);
}
	

//int GPIO_ouputs()
//{
	
//}
