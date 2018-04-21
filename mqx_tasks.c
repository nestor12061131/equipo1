
#include "Cpu.h"
#include "Events.h"
#include "mqx_tasks.h"

int temperatura=10,humedad=5;
char dato_adc1;
inputs[1];
dato[1];
void Task1_task(uint32_t task_init_data)
{

  while(1)

  {	  
	 dato_adc1 = (ADC_leerADC())/7;
		
	  	  	Term1_SendChar( dato_adc1);
	  	  Term1_CRLF();
	  	  	Term2_SendChar( dato_adc1);	  	  

			_time_delay_ticks(1000);

  }

}
