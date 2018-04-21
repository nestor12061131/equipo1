/*
 * Componente.h
 *
 *  Created on: Jun 7, 2017
 *      Author: Nestor
 */

#ifndef COMPONENTE_H_
#define COMPONENTE_H_
#include "GPIO1.h"
#include "mqxlite.h"
#include "mqxlite_prv.h"
#include "IO_Map.h"

#define obtener_valor(PeripheralBase) ( \
    (uint32_t)GPIO_PDIR_REG(PeripheralBase) \
  )

#define activar_pin(PeripheralBase, Value) ( \
    GPIO_PDOR_REG(PeripheralBase) = \
     (uint32_t)(Value) \
  )

#define pedir_valor(PeripheralBase) ( \
    (uint32_t)GPIO_PDOR_REG(PeripheralBase) \
  )

GPIO1_TFieldValue obtener_lectura(int entrada);
void activar_salida(int salida_seleccionada,int valor);



#endif /* COMPONENTE_H_ */
