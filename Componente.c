/*
 * Componente.c
 *
 *  Created on: Jun 7, 2017
 *      Author: Nestor
 */
#include "Componente.h"

GPIO1_TFieldValue obtener_lectura(int entrada)
{

  switch (entrada) {                     /* no break */
    case SENSOR_GAS:
    {                  /* bit field #0 */
      return(GPIO1_TFieldValue)((obtener_valor(((FGPIO_MemMapPtr)0xF80FF000u))& (GPIO1_TPortValue)0x1000u)>> 12u);}
    
    case CAJON1:
    {                 /* bit field #1 */
      return(GPIO1_TFieldValue)((obtener_valor(((FGPIO_MemMapPtr)0xF80FF000u))& (GPIO1_TPortValue)0x2000u)>> 13u);
    }
    case CAJON2: 
    {                  /* bit field #2 */
      return(GPIO1_TFieldValue)((obtener_valor(((FGPIO_MemMapPtr)0xF80FF000u))& (GPIO1_TPortValue)0x4000u )>> 14u);
    }
    case CAJON3: 
    {                 /* bit field #3 */
      return(GPIO1_TFieldValue)((obtener_valor(((FGPIO_MemMapPtr)0xF80FF000u))& 0x8000u )>> 15u);
    }
    default:
      break;                           /* Invalid BitField is not treated, result is undefined */
  } /* switch (Field) */
  return (GPIO1_TFieldValue)0U;
}

