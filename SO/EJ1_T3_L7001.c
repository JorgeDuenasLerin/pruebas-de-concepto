#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>
#include <unistd.h>
#include <string.h>

#define NUM 10

int globalN;
pthread_mutex_t mutexG;

typedef struct {
  char nombre[10];
  int par;
} TInfo;

void* imprime(void * arg){
  int continua = 1;

  while (continua){
    pthread_mutex_lock(&mutexG);
    if(globalN>=10){
      continua = 0;
    }
    if(globalN%2 != ((TInfo*)arg)->par){
      printf("%s: %i\n", ((TInfo*)arg)->nombre, globalN);
      globalN++;
    }
    pthread_mutex_unlock(&mutexG);
  }

  return (void *)0;
}

int main (int argc, char* argv[]){
  int err;
  pthread_t mihilo1, mihilo2;
  TInfo i1, i2;

  globalN = 1;
  pthread_mutex_init(&mutexG, NULL);
  strcpy(i1.nombre,"th1");
  i1.par=0;
  strcpy(i2.nombre,"th2");
  i2.par=1;

  err = pthread_create(&mihilo1, NULL, imprime, &i1);
  err = pthread_create(&mihilo2, NULL, imprime, &i2);

  if(err!=0){
    printf("Ocurrió un error\n");
  }

  pthread_join(mihilo1, NULL);
  pthread_join(mihilo2, NULL);

  pthread_mutex_destroy(&mutexG);

  exit(0);
  //printf("%li\n", sizeof(pthread_self()));
}
