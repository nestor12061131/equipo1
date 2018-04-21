#include "adc.h"
#include "Cpu.h"
#include "Events.h"
#include "mqx_tasks.h"

AD1_TResultData MeasuredValues[SAMPLE_GROUP_SIZE];
LDD_ADC_TSample SampleGroup[SAMPLE_GROUP_SIZE];
LDD_TDeviceData *MyADCPtr;
LDD_TError Error;

boolean Flag_ADC = 0;
int ADC_leerADC()
	{
	MyADCPtr = AD1_Init((LDD_TUserData *)NULL); 
	SampleGroup[0].ChannelIdx = CANAL_0;
    Error = AD1_CreateSampleGroup(MyADCPtr, (LDD_ADC_TSample *)SampleGroup, SAMPLE_GROUP_SIZE);  /* Set created sample group */
	Error = AD1_StartSingleMeasurement(MyADCPtr);           /* Start continuous measurement */
	while (!Flag_ADC) {}; /* Wait for conversion completeness */
	Error = AD1_GetMeasuredValues(MyADCPtr, (LDD_TData *)MeasuredValues);  /* Read measured values */
	Flag_ADC = 0;
	return(MeasuredValues[0]);
	}

/*int adc_humedad()
	{
	SampleGroup[0].ChannelIdx = CANAL_1;
    Error = AD1_CreateSampleGroup(MyADCPtr, (LDD_ADC_TSample *)SampleGroup, SAMPLE_GROUP_SIZE);  /* Set created sample group */
/*	Error = AD1_StartSingleMeasurement(MyADCPtr);           /* Start continuous measurement */
/*	while (!Flag_ADC) {}; /* Wait for conversion completeness */
/*	Error = AD1_GetMeasuredValues(MyADCPtr, (LDD_TData *)MeasuredValues);  /* Read measured values */
/*	Flag_ADC = 0;
	return(MeasuredValues[0]);
	}*/

